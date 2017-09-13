<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Ftat}}".
 *
 * @property integer $Ftat_Id
 * @property integer $Organization_Id
 * @property string $Current_Fiscal_Year
 * @property integer $Is_Accepted
 * @property integer $Ftat_Status
 * @property integer $Created_By
 * @property string $Last_Modified_Date
 *
 * @property Organization $organization
 */
class Ftat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Ftat}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Organization_Id'], 'required'],
            [['Organization_Id', 'Ftat_Status','Is_Accepted', 'Created_By'], 'integer'],
            [['Current_Fiscal_Year', 'Last_Modified_Date'], 'safe'],
            [['Organization_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['Organization_Id' => 'Organization_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Ftat_Id' => Yii::t('app', 'Ftat  ID'),
            'Organization_Id' => Yii::t('app', 'Organization  ID'),
            'Current_Fiscal_Year' => Yii::t('app', 'Current  Fiscal  Year'),
            'Ftat_Status' => Yii::t('app', 'Ftat  Status'),
            'Created_By' => Yii::t('app', 'Created  By'),
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
     * @inheritdoc
     * @return FtatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FtatQuery(get_called_class());
    }
}
