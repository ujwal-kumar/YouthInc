<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Status_Action_Type}}".
 *
 * @property integer $Status_Action_Type_Id
 * @property string $Status_Action_Type_Name
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property Organization[] $organizations
 */
class StatusActionType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Status_Action_Type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Status_Action_Type_Name'], 'required'],
            [['Status_Action_Type_Name'], 'string'],
            [['Status_Action_Type_Name'], 'unique'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Status_Action_Type_Id' => Yii::t('app', 'Status  Action  Type '),
            'Status_Action_Type_Name' => Yii::t('app', 'Status  Action  Type  Name'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['Status_Action_Type_Id' => 'Status_Action_Type_Id']);
    }

    /**
     * @inheritdoc
     * @return StatusActionTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StatusActionTypeQuery(get_called_class());
    }
}
