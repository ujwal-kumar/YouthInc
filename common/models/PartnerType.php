<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Partner_Type}}".
 *
 * @property integer $Partner_Type_Id
 * @property string $Partner_Type_Name
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property Organization[] $organizations
 * @property Program[] $programs
 */
class PartnerType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Partner_Type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Partner_Type_Name'], 'required'],
            [['Partner_Type_Name'], 'string'],
            [['Partner_Type_Name'], 'unique'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Partner_Type_Id' => Yii::t('app', 'Partner  Type '),
            'Partner_Type_Name' => Yii::t('app', 'Partner  Type  Name'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['Partner_Type_Id' => 'Partner_Type_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Program::className(), ['Partner_Type_Id' => 'Partner_Type_Id']);
    }

    /**
     * @inheritdoc
     * @return PartnerTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartnerTypeQuery(get_called_class());
    }
}
