<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Question}}".
 *
 * @property integer $Question_Id
 * @property string $Question_Name
 * @property integer $Category_Id
 * @property integer $Control_Type_Id
 * @property integer $Is_Active
 * @property string $Created_Date
 * @property integer $Created_By
 * @property string $Last_Modified_Date
 *
 * @property Answer[] $answers
 * @property Category $category
 * @property ControlType $controlType
 * @property User $createdBy
 * @property SurveyTransaction[] $surveyTransactions
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Question}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Question_Name'], 'string'],
            [['Question_Name', 'Category_Id', 'Control_Type_Id'], 'required'],
            [['Category_Id', 'Control_Type_Id', 'Is_Active', 'Created_By'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Category_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Category_Id' => 'Category_Id']],
            [['Control_Type_Id'], 'exist', 'skipOnError' => true, 'targetClass' => ControlType::className(), 'targetAttribute' => ['Control_Type_Id' => 'Control_Type_Id']],
            [['Created_By'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Created_By' => 'User_Id']],
        ];
    }
    
    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getOrganizationQuestions() 
    { 
        return $this->hasMany(OrganizationQuestion::className(), ['Question_Id' => 'Question_Id']); 
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Question_Id' => Yii::t('app', 'Question '),
            'Question_Name' => Yii::t('app', 'Question  Name'),
            'Category_Id' => Yii::t('app', 'Category '),
            'Control_Type_Id' => Yii::t('app', 'Control  Type '),
            'Is_Active' => Yii::t('app', 'Is  Active'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Created_By' => Yii::t('app', 'Created  By'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['Question_Id' => 'Question_Id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGridAnswers()
    {
        return $this->hasMany(GridAnswer::className(), ['Question_Id' => 'Question_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['Category_Id' => 'Category_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControlType()
    {
        return $this->hasOne(ControlType::className(), ['Control_Type_Id' => 'Control_Type_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['User_Id' => 'Created_By']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyTransactions()
    {
        return $this->hasMany(SurveyTransaction::className(), ['Question_Id' => 'Question_Id']);
    }

    /**
     * @inheritdoc
     * @return QuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuestionQuery(get_called_class());
    }
}
