<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Role_Menu}}".
 *
 * @property integer $Role_Menu_Id
 * @property integer $Role_Id
 * @property integer $Menu_Id
 * @property string $Created_Date
 * @property string $Modified_Date
 *
 * @property MenuList $menu
 * @property Role $role
 */
class RoleMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Role_Menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Role_Id', 'Menu_Id'], 'required'],
            [['Role_Id', 'Menu_Id'], 'integer'],
            [['Created_Date', 'Modified_Date'], 'safe'],
            [['Menu_Id'], 'exist', 'skipOnError' => true, 'targetClass' => MenuList::className(), 'targetAttribute' => ['Menu_Id' => 'Menu_Id']],
            [['Role_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['Role_Id' => 'Role_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Role_Menu_Id' => Yii::t('app', 'Role  Menu '),
            'Role_Id' => Yii::t('app', 'Role '),
            'Menu_Id' => Yii::t('app', 'Menu '),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Modified_Date' => Yii::t('app', 'Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(MenuList::className(), ['Menu_Id' => 'Menu_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['Role_Id' => 'Role_Id']);
    }

    /**
     * @inheritdoc
     * @return RoleMenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RoleMenuQuery(get_called_class());
    }
}
