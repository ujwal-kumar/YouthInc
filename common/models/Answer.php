<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Answer}}".
 *
 * @property integer $Answer_Id
 * @property string $Answer_Name
 * @property integer $Question_Id
 * @property integer $Is_Active
 * @property string $Created_Date
 * @property integer $Created_By
 * @property string $Last_Modified_Date
 *
 * @property Question $question
 * @property User $createdBy
 * @property SurveyTransaction[] $surveyTransactions
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Answer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Answer_Name'], 'string'],
            [['Question_Id', 'Is_Active', 'Created_By'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
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
            'Answer_Id' => Yii::t('app', 'Answer '),
            'Answer_Name' => Yii::t('app', 'Answer  Name'),
            'Question_Id' => Yii::t('app', 'Question '),
            'Is_Active' => Yii::t('app', 'Is  Active'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Created_By' => Yii::t('app', 'Created  By'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
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
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyTransactions()
    {
        return $this->hasMany(SurveyTransaction::className(), ['Answer_Id' => 'Answer_Id']);
    }

    /**
     * @inheritdoc
     * @return AnswerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnswerQuery(get_called_class());
    }
}
