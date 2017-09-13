<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Organization_Program}}".
 *
 * @property integer $Org_Program_Id
 * @property integer $Organization_Id
 * @property integer $Program_Id
 * @property integer $Year
 * @property string $Notes 
 * @property integer $Is_Approved
 * @property string $Created_Date
 * @property integer $Created_By
 * @property string $Last_Modified_Date
 *
 * @property Organization $organization
 * @property Program $program
 * @property User $createdBy
 */
class OrganizationProgram extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Organization_Program}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Organization_Id', 'Program_Id', 'Year', 'Is_Approved', 'Created_By'], 'required'],
            [['Organization_Id', 'Program_Id', 'Year', 'Is_Approved', 'Created_By'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Notes'], 'string'], 
            [['Organization_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['Organization_Id' => 'Organization_Id']],
            [['Program_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['Program_Id' => 'Program_Id']],
            [['Created_By'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Created_By' => 'User_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Org_Program_Id' => Yii::t('app', 'Org  Program'),
            'Organization_Id' => Yii::t('app', 'Organization'),
            'Program_Id' => Yii::t('app', 'Program'),
            'Year' => Yii::t('app', 'Year'),
            'Is_Approved' => Yii::t('app', 'Is  Approved'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['Program_Id' => 'Program_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['User_Id' => 'Created_By']);
    }

    /**
     * @inheritdoc
     * @return OrganizationProgramQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrganizationProgramQuery(get_called_class());
    }
}
