<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SurveyDetailsHistory".
 *
 * @property integer $SurveyDetail_ID
 * @property integer $Survey_ID
 * @property integer $Question_ID
 * @property integer $Answer_ID
 * @property string $QuestionStatus
 * @property string $CreatedDate
 * @property string $LastModifiedDate
 */
class SurveyDetailsHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SurveyDetailsHistory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SurveyDetail_ID', 'Survey_ID', 'Question_ID', 'Answer_ID', 'QuestionStatus'], 'required'],
            [['SurveyDetail_ID', 'Survey_ID', 'Question_ID', 'Answer_ID'], 'integer'],
            [['QuestionStatus'], 'string'],
            [['CreatedDate', 'LastModifiedDate'], 'safe'],
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
            'QuestionStatus' => Yii::t('app', 'Question Status'),
            'CreatedDate' => Yii::t('app', 'Created Date'),
            'LastModifiedDate' => Yii::t('app', 'Last Modified Date'),
        ];
    }

    /**
     * @inheritdoc
     * @return SurveyDetailsHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyDetailsHistoryQuery(get_called_class());
    }
}
