<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Mail_Templates}}".
 *
 * @property integer $Mail_Id
 * @property string $Template_Name
 * @property string $Template_Slug
 * @property string $Mail_Sender
 * @property string $Mail_Subject
 * @property string $Mail_Body
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 */
class MailTemplates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Mail_Templates}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Template_Name', 'Template_Slug', 'Mail_Sender', 'Mail_Subject', 'Mail_Body'], 'string'],
            [['Mail_Sender', 'Mail_Subject'], 'required'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Mail_Id' => Yii::t('app', 'Mail  ID'),
            'Template_Name' => Yii::t('app', 'Template  Name'),
            'Template_Slug' => Yii::t('app', 'Template  Slug'),
            'Mail_Sender' => Yii::t('app', 'Mail  Sender'),
            'Mail_Subject' => Yii::t('app', 'Mail  Subject'),
            'Mail_Body' => Yii::t('app', 'Mail  Body'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @inheritdoc
     * @return MailTemplatesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MailTemplatesQuery(get_called_class());
    }
}
