<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Survey".
 *
 * @property integer $Survey_ID
 * @property integer $Recipient_ID
 * @property string $SurveyStatus
 * @property string $CreatedDate
 * @property string $ModifiedDate
 *
 * @property Recipient $recipient
 * @property SurveyDetails[] $surveyDetails
 */
class Survey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Survey';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Survey_ID', 'Recipient_ID'], 'required'],
            [['Survey_ID', 'Recipient_ID'], 'integer'],
            [['SurveyStatus'], 'string'],
            [['CreatedDate', 'ModifiedDate'], 'safe'],
            [['Recipient_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Recipient::className(), 'targetAttribute' => ['Recipient_ID' => 'Recipient_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Survey_ID' => Yii::t('app', 'Survey  ID'),
            'Recipient_ID' => Yii::t('app', 'Recipient  ID'),
            'SurveyStatus' => Yii::t('app', 'Survey Status'),
            'CreatedDate' => Yii::t('app', 'Created Date'),
            'ModifiedDate' => Yii::t('app', 'Modified Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipient()
    {
        return $this->hasOne(Recipient::className(), ['Recipient_ID' => 'Recipient_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyDetails()
    {
        return $this->hasMany(SurveyDetails::className(), ['Survey_ID' => 'Survey_ID']);
    }

    /**
     * @inheritdoc
     * @return SurveyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyQuery(get_called_class());
    }
}
