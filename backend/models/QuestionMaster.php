<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "QuestionMaster".
 *
 * @property integer $Question_ID
 * @property integer $Org_ID
 * @property string $QuestionName
 * @property string $SurveySection
 * @property integer $IsActive
 * @property string $ControlType
 * @property integer $DisplayOrder
 * @property string $CreatedDate
 * @property string $LastDateModified
 *
 * @property AnswerMaster[] $answerMasters
 * @property SurveyDetails[] $surveyDetails
 */
class QuestionMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'QuestionMaster';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Question_ID', 'Org_ID', 'QuestionName', 'SurveySection', 'ControlType', 'DisplayOrder', 'CreatedDate', 'LastDateModified'], 'required'],
            [['Question_ID', 'Org_ID', 'IsActive', 'DisplayOrder'], 'integer'],
            [['QuestionName', 'SurveySection', 'ControlType'], 'string'],
            [['CreatedDate', 'LastDateModified'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Question_ID' => Yii::t('app', 'Question  ID'),
            'Org_ID' => Yii::t('app', 'Org  ID'),
            'QuestionName' => Yii::t('app', 'Question Name'),
            'SurveySection' => Yii::t('app', 'Survey Section'),
            'IsActive' => Yii::t('app', 'Is Active'),
            'ControlType' => Yii::t('app', 'Control Type'),
            'DisplayOrder' => Yii::t('app', 'Display Order'),
            'CreatedDate' => Yii::t('app', 'Created Date'),
            'LastDateModified' => Yii::t('app', 'Last Date Modified'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswerMasters()
    {
        return $this->hasMany(AnswerMaster::className(), ['Question_ID' => 'Question_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyDetails()
    {
        return $this->hasMany(SurveyDetails::className(), ['Question_ID' => 'Question_ID']);
    }

    /**
     * @inheritdoc
     * @return QuestionMasterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuestionMasterQuery(get_called_class());
    }
}
