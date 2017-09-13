<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Recipient".
 *
 * @property integer $Recipient_ID
 * @property integer $Org_ID
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property string $Email
 * @property string $ExternatlRefernce
 * @property string $CreatedDate
 * @property string $LastModifiedDate
 *
 * @property Organization $org
 * @property Survey[] $surveys
 */
class Recipient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Recipient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Recipient_ID', 'Org_ID', 'FirstName', 'MiddleName', 'LastName', 'CreatedDate', 'LastModifiedDate'], 'required'],
            [['Recipient_ID', 'Org_ID'], 'integer'],
            [['FirstName', 'MiddleName', 'LastName', 'Email', 'ExternatlRefernce'], 'string'],
            [['CreatedDate', 'LastModifiedDate'], 'safe'],
            [['Org_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['Org_ID' => 'Org_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Recipient_ID' => Yii::t('app', 'Recipient  ID'),
            'Org_ID' => Yii::t('app', 'Org  ID'),
            'FirstName' => Yii::t('app', 'First Name'),
            'MiddleName' => Yii::t('app', 'Middle Name'),
            'LastName' => Yii::t('app', 'Last Name'),
            'Email' => Yii::t('app', 'Email'),
            'ExternatlRefernce' => Yii::t('app', 'Externatl Refernce'),
            'CreatedDate' => Yii::t('app', 'Created Date'),
            'LastModifiedDate' => Yii::t('app', 'Last Modified Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organization::className(), ['Org_ID' => 'Org_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveys()
    {
        return $this->hasMany(Survey::className(), ['Recipient_ID' => 'Recipient_ID']);
    }

    /**
     * @inheritdoc
     * @return RecipientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecipientQuery(get_called_class());
    }
}
