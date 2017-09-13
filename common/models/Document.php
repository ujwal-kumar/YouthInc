<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Document}}".
 *
 * @property integer $Document_Id
 * @property string $Document_Name
 * @property string $Document_Path
 * @property integer $Uploaded_By
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property User $uploadedBy
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Document}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Document_Name', 'Document_Path'], 'required'],
            [['Document_Name', 'Document_Path'], 'string'],
            [['Uploaded_By'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Uploaded_By'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Uploaded_By' => 'User_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Document_Id' => Yii::t('app', 'Document '),
            'Document_Name' => Yii::t('app', 'Document  Name'),
            'Document_Path' => Yii::t('app', 'Document  Path'),
            'Uploaded_By' => Yii::t('app', 'Uploaded  By'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUploadedBy()
    {
        return $this->hasOne(User::className(), ['User_Id' => 'Uploaded_By']);
    }

    /**
     * @inheritdoc
     * @return DocumentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DocumentQuery(get_called_class());
    }
}
