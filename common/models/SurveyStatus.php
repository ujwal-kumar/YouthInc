<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Survey_Status}}".
 *
 * @property integer $Survey_Status_Id
 * @property string $Status_Description
 */
class SurveyStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Survey_Status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Status_Description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Survey_Status_Id' => Yii::t('app', 'Survey  Status  ID'),
            'Status_Description' => Yii::t('app', 'Status  Description'),
        ];
    }

    /**
     * @inheritdoc
     * @return SurveyStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyStatusQuery(get_called_class());
    }
}
