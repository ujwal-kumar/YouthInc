<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Organization".
 *
 * @property integer $Org_ID
 * @property string $Organization_Name
 * @property string $Website
 * @property string $MailingSuite_FloorNumber
 * @property string $MailingCity
 * @property string $MailingState
 * @property string $Zipcode
 * @property string $YearOfInc
 * @property string $BoroughLocated
 * @property integer $IsActive
 * @property string $CreatedDate
 * @property string $LastModifiedDate
 *
 * @property Recipient[] $recipients
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Org_ID', 'Organization_Name', 'CreatedDate', 'LastModifiedDate'], 'required'],
            [['Org_ID', 'IsActive'], 'integer'],
            [['Organization_Name', 'Website', 'MailingSuite_FloorNumber', 'MailingCity', 'MailingState', 'Zipcode', 'YearOfInc', 'BoroughLocated'], 'string'],
            [['CreatedDate', 'LastModifiedDate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Org_ID' => Yii::t('app', 'Org  ID'),
            'Organization_Name' => Yii::t('app', 'Organization  Name'),
            'Website' => Yii::t('app', 'Website'),
            'MailingSuite_FloorNumber' => Yii::t('app', 'Mailing Suite  Floor Number'),
            'MailingCity' => Yii::t('app', 'Mailing City'),
            'MailingState' => Yii::t('app', 'Mailing State'),
            'Zipcode' => Yii::t('app', 'Zipcode'),
            'YearOfInc' => Yii::t('app', 'Year Of Inc'),
            'BoroughLocated' => Yii::t('app', 'Borough Located'),
            'IsActive' => Yii::t('app', 'Is Active'),
            'CreatedDate' => Yii::t('app', 'Created Date'),
            'LastModifiedDate' => Yii::t('app', 'Last Modified Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipients()
    {
        return $this->hasMany(Recipient::className(), ['Org_ID' => 'Org_ID']);
    }
    
    

    /**
     * @inheritdoc
     * @return OrganizationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrganizationQuery(get_called_class());
    }
}
