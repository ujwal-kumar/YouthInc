<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Hiring_Type}}".
 *
 * @property integer $Hiring_Type_Id
 * @property string $Hiring_Type_Name
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property Organization[] $organizations
 */
class HiringType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Hiring_Type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Hiring_Type_Name'], 'required'],
            [['Hiring_Type_Name'], 'string'],
            [['Hiring_Type_Name'], 'unique'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Hiring_Type_Id' => Yii::t('app', 'Hiring  Type '),
            'Hiring_Type_Name' => Yii::t('app', 'Hiring  Type  Name'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['Hiring_Type_Id' => 'Hiring_Type_Id']);
    }

    /**
     * @inheritdoc
     * @return HiringTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HiringTypeQuery(get_called_class());
    }
}
