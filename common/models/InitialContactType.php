<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Initial_Contact_Type}}".
 *
 * @property integer $Initial_Contact_Type_Id
 * @property string $Initial_Contact_Type_Name
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property Organization[] $organizations
 */
class InitialContactType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Initial_Contact_Type}}';
    }
    
    public function fields()
    {
        

        return [
            'Initial_Contact_Type_Id',
            'Initial_Contact_Type_Name',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Initial_Contact_Type_Name'], 'required'],
            [['Initial_Contact_Type_Name'], 'string'],
            [['Initial_Contact_Type_Name'], 'unique'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Initial_Contact_Type_Id' => Yii::t('app', 'Initial  Contact  Type '),
            'Initial_Contact_Type_Name' => Yii::t('app', 'Initial  Contact  Type  Name'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['Initial_Contact_Type_Id' => 'Initial_Contact_Type_Id']);
    }

    /**
     * @inheritdoc
     * @return InitialContactTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InitialContactTypeQuery(get_called_class());
    }
}
