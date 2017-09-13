<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%SurveyDetailsHistory}}".
 *
 * @property integer $SurveyDetail_ID
 * @property integer $Survey_ID
 * @property integer $Question_ID
 * @property integer $Answer_ID
 * @property string $QuestionStatus
 * @property string $CreatedDate
 * @property string $ModifiedDate
 */
class SurveyDetailsHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%SurveyDetailsHistory}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Survey_ID', 'Question_ID', 'Answer_ID', 'QuestionStatus'], 'required'],
            [['Survey_ID', 'Question_ID', 'Answer_ID'], 'integer'],
            [['QuestionStatus'], 'string'],
            [['CreatedDate', 'ModifiedDate'], 'safe'],
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
            'Answer_ID' => Yii::t('app', 'Answer '),
            'QuestionStatus' => Yii::t('app', 'Question Status'),
            'CreatedDate' => Yii::t('app', 'Created Date'),
            'ModifiedDate' => Yii::t('app', 'Modified Date'),
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
