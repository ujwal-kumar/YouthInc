<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property integer $User_ID
 * @property string $Password
 * @property integer $RoleID
 * @property string $FirstName
 * @property string $LastName
 * @property string $Email
 * @property string $Phone
 * @property integer $IsActive
 * @property integer $IsLocked
 * @property string $CreatedDate
 * @property string $LastDateModified
 *
 * @property UserRole $role
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'Password', 'RoleID'], 'required'],
            [['User_ID', 'RoleID', 'IsActive', 'IsLocked'], 'integer'],
            [['Password', 'FirstName', 'LastName', 'Email', 'Phone'], 'string'],
            [['CreatedDate', 'LastDateModified'], 'safe'],
            [['RoleID'], 'exist', 'skipOnError' => true, 'targetClass' => UserRole::className(), 'targetAttribute' => ['RoleID' => 'Role_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'User_ID' => Yii::t('app', 'User  ID'),
            'Password' => Yii::t('app', 'Password'),
            'RoleID' => Yii::t('app', 'User Role'),
            'FirstName' => Yii::t('app', 'First Name'),
            'LastName' => Yii::t('app', 'Last Name'),
            'Email' => Yii::t('app', 'Email'),
            'Phone' => Yii::t('app', 'Phone'),
            'IsActive' => Yii::t('app', 'Is Active'),
            'IsLocked' => Yii::t('app', 'Is Locked'),
            'CreatedDate' => Yii::t('app', 'Created Date'),
            'LastDateModified' => Yii::t('app', 'Last Date Modified'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(UserRole::className(), ['Role_ID' => 'RoleID']);
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
