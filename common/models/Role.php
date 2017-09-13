<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Role}}".
 *
 * @property integer $Role_Id
 * @property string $Role_Name
 * @property string $Description
 * @property integer $Is_Active
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property RoleMenu[] $roleMenus
 * @property User[] $users
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Role_Name', ], 'required'],
            [['Role_Name', ], 'unique'],
            [['Role_Name', 'Description'], 'string'],
            [['Is_Active'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Role_Id' => Yii::t('app', 'Role '),
            'Role_Name' => Yii::t('app', 'Role  Name'),
            'Description' => Yii::t('app', 'Description'),
            'Is_Active' => Yii::t('app', 'Is  Active'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleMenus()
    {
        return $this->hasMany(RoleMenu::className(), ['Role_Id' => 'Role_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['Role_Id' => 'Role_Id']);
    }

    /**
     * @inheritdoc
     * @return RoleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RoleQuery(get_called_class());
    }
}
