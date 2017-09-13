<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Message}}".
 *
 * @property integer $Message_Id
 * @property string $Message_Content
 * @property integer $User_Id
 * @property string $Status
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property User $user
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Message_Content', 'Status'], 'string'],
            [['User_Id'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['User_Id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_Id' => 'User_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Message_Id' => Yii::t('app', 'Message '),
            'Message_Content' => Yii::t('app', 'Message  Content'),
            'User_Id' => Yii::t('app', 'User '),
            'Status' => Yii::t('app', 'Status'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['User_Id' => 'User_Id']);
    }

    /**
     * @inheritdoc
     * @return MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    }
}
