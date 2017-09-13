<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Org_Status}}".
 *
 * @property integer $Org_Status_Id
 * @property string $Org_Status_Description
 */
class OrgStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Org_Status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Org_Status_Description'], 'required'],
            [['Org_Status_Description'], 'string'],
            [['Org_Status_Description'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Org_Status_Id' => Yii::t('app', 'Org  Status  ID'),
            'Org_Status_Description' => Yii::t('app', 'Org  Status  Description'),
        ];
    }

    /**
     * @inheritdoc
     * @return OrgStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrgStatusQuery(get_called_class());
    }
}
