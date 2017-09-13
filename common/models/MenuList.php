<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Menu_List}}".
 *
 * @property integer $Menu_Id
 * @property string $Menu
 * @property integer $Is_Active
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property RoleMenu[] $roleMenus
 */
class MenuList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Menu_List}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Menu'], 'string'],
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
            'Menu_Id' => Yii::t('app', 'Menu '),
            'Menu' => Yii::t('app', 'Menu'),
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
        return $this->hasMany(RoleMenu::className(), ['Menu_Id' => 'Menu_Id']);
    }

    /**
     * @inheritdoc
     * @return MenuListQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MenuListQuery(get_called_class());
    }
}
