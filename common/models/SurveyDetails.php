<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%SurveyDetails}}".
 *
 * @property integer $SurveyDetail_ID
 * @property integer $Survey_ID
 * @property integer $Question_ID
 * @property string $Answers
 * @property string $FilePath
 * @property string $CreatedDate
 * @property string $ModifiedDate
 *
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
        return '{{%SurveyDetails}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Survey_ID', 'Question_ID'], 'required'],
            [['Survey_ID', 'Question_ID'], 'integer'],
            [['Answers', 'FilePath'], 'string'],
            [['CreatedDate', 'ModifiedDate'], 'safe'],
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
            'SurveyDetail_ID' => Yii::t('app', 'Survey Detail '),
            'Survey_ID' => Yii::t('app', 'Survey '),
            'Question_ID' => Yii::t('app', 'Question '),
            'Answers' => Yii::t('app', 'Answers'),
            'FilePath' => Yii::t('app', 'File Path'),
            'CreatedDate' => Yii::t('app', 'Created Date'),
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
    
    public function getUnAttemptedQues($surveyId) {
        $result = \Yii::$app->db->createCommand("SELECT count(*) as questions
             FROM [SurveyDetails] where 
             ([Answers]  in('', null) and Survey_ID = $surveyId) or ([Answers] like '%-' and  Survey_ID = $surveyId)");

        if ($result->query())
            $result = $result->query()->read();
        else
            $result = "no result";
        return $result;
    }

}
