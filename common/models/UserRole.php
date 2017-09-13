<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%UserRole}}".
 *
 * @property integer $Role_ID
 * @property string $Role_Name
 * @property string $Description
 * @property string $CreatedDate
 * @property string $ModifiedDate
 *
 * @property User[] $users
 */
class UserRole extends \yii\db\ActiveRecord
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
            [['Role_Name', 'Description'], 'string'],
            [['CreatedDate', 'ModifiedDate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Role_ID' => Yii::t('app', 'Role '),
            'Role_Name' => Yii::t('app', 'Role  Name'),
            'Description' => Yii::t('app', 'Description'),
            'CreatedDate' => Yii::t('app', 'Created Date'),
            'ModifiedDate' => Yii::t('app', 'Modified Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['RoleID' => 'Role_ID']);
    }

    /**
     * @inheritdoc
     * @return UserRoleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserRoleQuery(get_called_class());
    }
}
