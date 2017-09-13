<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Organization_Question}}".
 *
 * @property integer $Org_Question_Id
 * @property integer $Program_Id
 * @property integer $Organization_Id
 * @property integer $Question_Id
 * @property string $Created_Date
 * @property integer $Created_By
 *
 * @property Organization $organization
 * @property Program $program
 * @property Question $question
 * @property User $createdBy
 */
class OrganizationQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Organization_Question}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Program_Id', 'Organization_Id', 'Question_Id', 'Created_By'], 'integer'],
            [['Created_Date'], 'safe'],
            [['Organization_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['Organization_Id' => 'Organization_Id']],
            [['Program_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['Program_Id' => 'Program_Id']],
            [['Question_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['Question_Id' => 'Question_Id']],
            [['Created_By'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Created_By' => 'User_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Org_Question_Id' => Yii::t('app', 'Org  Question '),
            'Program_Id' => Yii::t('app', 'Program '),
            'Organization_Id' => Yii::t('app', 'Organization '),
            'Question_Id' => Yii::t('app', 'Question '),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Created_By' => Yii::t('app', 'Created  By'),
        ];
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
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['Question_Id' => 'Question_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['User_Id' => 'Created_By']);
    }

    /**
     * @inheritdoc
     * @return OrganizationQuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrganizationQuestionQuery(get_called_class());
    }
    
    
}
