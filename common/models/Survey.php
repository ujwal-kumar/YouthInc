<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Survey}}".
 *
 * @property integer $Survey_Id
 * @property integer $User_Id
 * @property integer $Organization_Id
 * @property integer $Program_Id
 * @property string $Survey_Status
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property Organization $organization
 * @property Program $program
 * @property User $user
 * @property SurveyTransaction[] $surveyTransactions
 */
class Survey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Survey}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['User_Id', 'Organization_Id', 'Program_Id'], 'integer'],
            [['User_Id', 'Organization_Id', 'Program_Id', 'Survey_Status'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Survey_Status'], 'exist', 'skipOnError' => true, 'targetClass' => SurveyStatus::className(), 'targetAttribute' => ['Survey_Status' => 'Survey_Status_Id']], 
            [['Organization_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['Organization_Id' => 'Organization_Id']],
            [['Program_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['Program_Id' => 'Program_Id']],
            [['User_Id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_Id' => 'User_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Survey_Id' => Yii::t('app', 'Survey '),
            'User_Id' => Yii::t('app', 'User '),
            'Organization_Id' => Yii::t('app', 'Organization '),
            'Program_Id' => Yii::t('app', 'Program '),
            'Survey_Status' => Yii::t('app', 'Survey  Status'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }
    
    
    /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getSurveyStatus() 
    { 
        return $this->hasOne(SurveyStatus::className(), ['Survey_Status_Id' => 'Survey_Status']); 
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['Organization_Id' => 'Organization_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['Program_Id' => 'Program_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['User_Id' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyTransactions()
    {
        return $this->hasMany(SurveyTransaction::className(), ['Survey_Id' => 'Survey_Id']);
    }

    /**
     * @inheritdoc
     * @return SurveyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyQuery(get_called_class());
    }
}
