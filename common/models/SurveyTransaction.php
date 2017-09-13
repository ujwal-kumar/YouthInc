<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Survey_Transaction}}".
 *
 * @property integer $Survey_Transaction_Id
 * @property integer $Survey_Id
 * @property integer $Question_Id
 * @property integer $Answer_Id
 * @property string $Answer_Value
 * @property integer $Organization_Id
 * @property string $Answer_Others
 * @property integer $User_Id
 * @property string $Answer_Type
 * @property integer $Category_Id
 * @property string $Prev_3yrs_Stat
 * @property string $Prev_2yrs_Stat
 * @property string $Prev_1yr_Stat
 * @property string $Curr_Yr_Stat
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property Category $category
 * @property Organization $organization
 * @property Question $question
 * @property Survey $survey
 * @property User $user
 */
class SurveyTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Survey_Transaction}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Survey_Id', 'Question_Id', 'Organization_Id', 'User_Id', 'Answer_Type', 'Category_Id'], 'required'],
            [['Survey_Id', 'Question_Id', 'Answer_Id', 'Organization_Id', 'User_Id', 'Category_Id'], 'integer'],
            [['Answer_Value', 'Answer_Others', 'Answer_Type', 'Prev_3yrs_Stat', 'Prev_2yrs_Stat', 'Prev_1yr_Stat', 'Curr_Yr_Stat'], 'string'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Category_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Category_Id' => 'Category_Id']],
            [['Organization_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['Organization_Id' => 'Organization_Id']],
            [['Question_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['Question_Id' => 'Question_Id']],
            [['Survey_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Survey::className(), 'targetAttribute' => ['Survey_Id' => 'Survey_Id']],
            [['User_Id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_Id' => 'User_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Survey_Transaction_Id' => Yii::t('app', 'Survey  Transaction '),
            'Survey_Id' => Yii::t('app', 'Survey '),
            'Question_Id' => Yii::t('app', 'Question '),
            'Answer_Id' => Yii::t('app', 'Answer '),
            'Answer_Value' => Yii::t('app', 'Answer  Value'),
            'Organization_Id' => Yii::t('app', 'Organization '),
            'Answer_Others' => Yii::t('app', 'Answer  Others'),
            'User_Id' => Yii::t('app', 'User '),
            'Answer_Type' => Yii::t('app', 'Answer  Type'),
            'Category_Id' => Yii::t('app', 'Category '),
            'Prev_3yrs_Stat' => Yii::t('app', 'Prev 3yrs  Stat'),
            'Prev_2yrs_Stat' => Yii::t('app', 'Prev 2yrs  Stat'),
            'Prev_1yr_Stat' => Yii::t('app', 'Prev 1yr  Stat'),
            'Curr_Yr_Stat' => Yii::t('app', 'Curr  Yr  Stat'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
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
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['Organization_Id' => 'Organization_Id']);
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
    public function getSurvey()
    {
        return $this->hasOne(Survey::className(), ['Survey_Id' => 'Survey_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['User_Id' => 'User_Id']);
    }

    /**
     * @inheritdoc
     * @return SurveyTransactionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyTransactionQuery(get_called_class());
    }
}
