<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Program_Partner}}".
 *
 * @property integer $Program_Partner_Id
 * @property integer $Program_Id
 * @property integer $Partner_Type_Id
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property ProgramPartner $programPartner
 * @property ProgramPartner $programPartner0
 * @property Program $program
 * @property ProgramPartner $programPartner1
 * @property ProgramPartner $programPartner2
 * @property ProgramPartner[] $programPartners
 * @property ProgramPartner[] $programPartners0
 */
class ProgramPartner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Program_Partner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Program_Id', 'Partner_Type_Id'], 'required'],
            [['Program_Id', 'Partner_Type_Id'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Program_Partner_Id'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramPartner::className(), 'targetAttribute' => ['Program_Partner_Id' => 'Program_Partner_Id']],
            [['Program_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['Program_Id' => 'Program_Id']],
            [['Program_Partner_Id'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramPartner::className(), 'targetAttribute' => ['Program_Partner_Id' => 'Program_Partner_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Program_Partner_Id' => Yii::t('app', 'Program  Partner '),
            'Program_Id' => Yii::t('app', 'Program '),
            'Partner_Type_Id' => Yii::t('app', 'Partner  Type '),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramPartner()
    {
        return $this->hasOne(ProgramPartner::className(), ['Program_Partner_Id' => 'Program_Partner_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramPartner0()
    {
        return $this->hasOne(ProgramPartner::className(), ['Program_Partner_Id' => 'Program_Partner_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['Program_Id' => 'Program_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramPartner1()
    {
        return $this->hasOne(ProgramPartner::className(), ['Program_Partner_Id' => 'Program_Partner_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramPartner2()
    {
        return $this->hasOne(ProgramPartner::className(), ['Program_Partner_Id' => 'Program_Partner_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramPartners()
    {
        return $this->hasMany(ProgramPartner::className(), ['Program_Partner_Id' => 'Program_Partner_Id'])->viaTable('{{%Program_Partner}}', ['Program_Partner_Id' => 'Program_Partner_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramPartners0()
    {
        return $this->hasMany(ProgramPartner::className(), ['Program_Partner_Id' => 'Program_Partner_Id'])->viaTable('{{%Program_Partner}}', ['Program_Partner_Id' => 'Program_Partner_Id']);
    }

    /**
     * @inheritdoc
     * @return ProgramPartnerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProgramPartnerQuery(get_called_class());
    }
}
