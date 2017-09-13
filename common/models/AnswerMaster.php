<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%AnswerMaster}}".
 *
 * @property integer $Answer_ID
 * @property integer $Question_ID
 * @property string $AnswerName
 * @property string $CreateDate
 * @property string $ModifiedDate
 *
 * @property QuestionMaster $question
 * @property SurveyDetails[] $surveyDetails
 */
class AnswerMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%AnswerMaster}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Question_ID', 'AnswerName'], 'required'],
            [['Question_ID'], 'integer'],
            [['AnswerName'], 'string'],
            [['CreateDate', 'ModifiedDate'], 'safe'],
            [['Question_ID'], 'exist', 'skipOnError' => true, 'targetClass' => QuestionMaster::className(), 'targetAttribute' => ['Question_ID' => 'Question_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Answer_ID' => Yii::t('app', 'Answer '),
            'Question_ID' => Yii::t('app', 'Question '),
            'AnswerName' => Yii::t('app', 'Answer Name'),
            'CreateDate' => Yii::t('app', 'Create Date'),
            'ModifiedDate' => Yii::t('app', 'Modified Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(QuestionMaster::className(), ['Question_ID' => 'Question_ID']);
    }
    
    public function getQuestionName()
    {
        return $this->hasOne(QuestionMaster::className(), ['Question_ID' => 'Question_ID']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyDetails()
    {
        return $this->hasMany(SurveyDetails::className(), ['Answer_ID' => 'Answer_ID']);
    }

    /**
     * @inheritdoc
     * @return AnswerMasterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnswerMasterQuery(get_called_class());
    }
}
