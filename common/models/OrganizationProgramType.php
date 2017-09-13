<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Organization_Program_Type}}".
 *
 * @property integer $Organization_Program_Type_Id
 * @property integer $Organization_Id
 * @property integer $Partner_Type_Id
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property Organization $organization
 * @property PartnerType $partnerType
 */
class OrganizationProgramType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Organization_Program_Type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Organization_Id', 'Partner_Type_Id'], 'required'],
            [['Organization_Id', 'Partner_Type_Id'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Organization_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['Organization_Id' => 'Organization_Id']],
            [['Partner_Type_Id'], 'exist', 'skipOnError' => true, 'targetClass' => PartnerType::className(), 'targetAttribute' => ['Partner_Type_Id' => 'Partner_Type_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Organization_Program_Type_Id' => Yii::t('app', 'Organization  Program  Type '),
            'Organization_Id' => Yii::t('app', 'Organization '),
            'Partner_Type_Id' => Yii::t('app', 'Partner  Type '),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['Organization_Id' => 'Organization_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartnerType()
    {
        return $this->hasOne(PartnerType::className(), ['Partner_Type_Id' => 'Partner_Type_Id']);
    }

    /**
     * @inheritdoc
     * @return OrganizationProgramTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrganizationProgramTypeQuery(get_called_class());
    }
}
