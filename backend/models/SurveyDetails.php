<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SurveyDetails".
 *
 * @property integer $SurveyDetail_ID
 * @property integer $Survey_ID
 * @property integer $Question_ID
 * @property integer $Answer_ID
 * @property string $FilePath
 * @property string $CreatedDate
 * @property string $LastModifiedDate
 *
 * @property AnswerMaster $answer
 * @property QuestionMaster $question
 * @property Survey $survey
 */
class SurveyDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SurveyDetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SurveyDetail_ID', 'Survey_ID', 'Question_ID', 'Answer_ID'], 'required'],
            [['SurveyDetail_ID', 'Survey_ID', 'Question_ID', 'Answer_ID'], 'integer'],
            [['FilePath'], 'string'],
            [['CreatedDate', 'LastModifiedDate'], 'safe'],
            [['Answer_ID'], 'exist', 'skipOnError' => true, 'targetClass' => AnswerMaster::className(), 'targetAttribute' => ['Answer_ID' => 'Answer_ID']],
            [['Question_ID'], 'exist', 'skipOnError' => true, 'targetClass' => QuestionMaster::className(), 'targetAttribute' => ['Question_ID' => 'Question_ID']],
            [['Survey_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Survey::className(), 'targetAttribute' => ['Survey_ID' => 'Survey_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SurveyDetail_ID' => Yii::t('app', 'Survey Detail  ID'),
            'Survey_ID' => Yii::t('app', 'Survey  ID'),
            'Question_ID' => Yii::t('app', 'Question  ID'),
            'Answer_ID' => Yii::t('app', 'Answer  ID'),
            'FilePath' => Yii::t('app', 'File Path'),
            'CreatedDate' => Yii::t('app', 'Created Date'),
            'LastModifiedDate' => Yii::t('app', 'Last Modified Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswer()
    {
        return $this->hasOne(AnswerMaster::className(), ['Answer_ID' => 'Answer_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(QuestionMaster::className(), ['Question_ID' => 'Question_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurvey()
    {
        return $this->hasOne(Survey::className(), ['Survey_ID' => 'Survey_ID']);
    }

    /**
     * @inheritdoc
     * @return SurveyDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyDetailsQuery(get_called_class());
    }
}
