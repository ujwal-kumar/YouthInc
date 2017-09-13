<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Organization}}".
 *
 * @property integer $Organization_Id
 * @property string $Organization_Name
 * @property string $Contact
 * @property string $Designation
 * @property integer $Initial_Contact_Type_Id
 * @property string $Initial_Contact_Date
 * @property integer $Status_Action_Type_Id
 * @property string $Status_Action_Date
 * @property string $Budget
 * @property integer $Youth_Served
 * @property integer $Staff_Size
 * @property integer $Board_Size
 * @property integer $Year_Incorporated
 * @property integer $Fit
 * @property string $Notes
 * @property integer $Program_Year_Applied
 * @property string $Email
 * @property string $Phone
 * @property string $Mailing_Address
 * @property string $BADV_Prospects
 * @property integer $Partner_Type_Id
 * @property integer $Hiring_Type_Id
 * @property integer $Is_Active
 * @property integer $As_Draft
 * @property integer $Status
 * @property integer $Is_Updated
 * @property string $Created_Date
 * @property integer $Created_By
 * @property string $Last_Modified_Date
 *
 * @property FMARating[] $fMARatings
 * @property HiringType $hiringType
 * @property InitialContactType $initialContactType
 * @property PartnerType $partnerType
 * @property StatusActionType $statusActionType
 * @property User $createdBy
 * @property OrganizationProgram[] $organizationPrograms
 * @property OrganizationQuestion[] $organizationQuestions
 * @property Survey[] $surveys
 * @property SurveyTransaction[] $surveyTransactions
 * @property User[] $users
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Organization}}';
    }
    
    public function behaviors()
    {
        return [
                  [
                      'class' => \yii\behaviors\TimestampBehavior::className(),
                      'createdAtAttribute' => 'Created_Date',
                      'updatedAtAttribute' => 'Last_Modified_Date',
                      'value' => new \yii\db\Expression('NOW()'),
                  ],
              ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Organization_Name', 'Email', 'Phone', 'Contact', 'Designation'], 'required'],
//            [['Organization_Name', 'Email', 'Phone', 'Contact', 'Designation'], 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/'],
            [['Organization_Name', 'Contact', 'Designation', 'Notes', 'Email', 'Phone', 'Mailing_Address', 'BADV_Prospects'], 'string'],
            [['Initial_Contact_Type_Id', 'Status_Action_Type_Id', 'Youth_Served', 'Staff_Size', 'Board_Size', 'Year_Incorporated', 'Fit', 'Program_Year_Applied', 'Partner_Type_Id', 'Hiring_Type_Id', 'Is_Active','As_Draft',  'Status', 'Is_Updated', 'Created_By'], 'integer'],
            [['Initial_Contact_Date', 'Status_Action_Date', 'Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Budget'], 'number'],
            [['Email'], 'unique'],
            [['Email'], 'email'],
            [['Hiring_Type_Id'], 'exist', 'skipOnError' => true, 'targetClass' => HiringType::className(), 'targetAttribute' => ['Hiring_Type_Id' => 'Hiring_Type_Id']],
            [['Initial_Contact_Type_Id'], 'exist', 'skipOnError' => true, 'targetClass' => InitialContactType::className(), 'targetAttribute' => ['Initial_Contact_Type_Id' => 'Initial_Contact_Type_Id']],
            [['Partner_Type_Id'], 'exist', 'skipOnError' => true, 'targetClass' => PartnerType::className(), 'targetAttribute' => ['Partner_Type_Id' => 'Partner_Type_Id']],
            [['Status_Action_Type_Id'], 'exist', 'skipOnError' => true, 'targetClass' => StatusActionType::className(), 'targetAttribute' => ['Status_Action_Type_Id' => 'Status_Action_Type_Id']],
            [['Created_By'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Created_By' => 'User_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Organization_Id' => Yii::t('app', 'Organization '),
            'Organization_Name' => Yii::t('app', 'Organization  Name'),
            'Contact' => Yii::t('app', 'Contact'),
            'Designation' => Yii::t('app', 'Designation'),
            'Initial_Contact_Type_Id' => Yii::t('app', 'Initial  Contact  Type '),
            'Initial_Contact_Date' => Yii::t('app', 'Initial  Contact  Date'),
            'Status_Action_Type_Id' => Yii::t('app', 'Status  Action  Type '),
            'Status_Action_Date' => Yii::t('app', 'Status  Action  Date'),
            'Budget' => Yii::t('app', 'Budget'),
            'Youth_Served' => Yii::t('app', 'Youth  Served'),
            'Staff_Size' => Yii::t('app', 'Staff  Size'),
            'Board_Size' => Yii::t('app', 'Board  Size'),
            'Year_Incorporated' => Yii::t('app', 'Year  Incorporated'),
            'Fit' => Yii::t('app', 'Fit'),
            'Notes' => Yii::t('app', 'Notes'),
            'Program_Year_Applied' => Yii::t('app', 'Program  Year  Applied'),
            'Email' => Yii::t('app', 'Email'),
            'Phone' => Yii::t('app', 'Phone'),
            'Mailing_Address' => Yii::t('app', 'Mailing  Address'),
            'BADV_Prospects' => Yii::t('app', 'Badv  Prospects'),
            'Partner_Type_Id' => Yii::t('app', 'Partner  Type '),
            'Hiring_Type_Id' => Yii::t('app', 'Hiring  Type '),
            'Is_Active' => Yii::t('app', 'Is  Active'),
            'Status' => Yii::t('app', 'Is  Approved'),
            'Is_Updated' => Yii::t('app', 'Is  Updated'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Created_By' => Yii::t('app', 'Created  By'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasMany(OrgStatus::className(), ['Org_Status_Id' => 'Status']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramType()
    {
        return $this->hasMany(ProgramType::className(), ['Program_Type_Id' => 'Program_Type_Id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrganizationQuestions() 
   { 
       return $this->hasMany(OrganizationQuestion::className(), ['Organization_Id' => 'Organization_Id']); 
   } 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFMARatings()
    {
        return $this->hasMany(FMARating::className(), ['Organization_Id' => 'Organization_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHiringType()
    {
        return $this->hasOne(HiringType::className(), ['Hiring_Type_Id' => 'Hiring_Type_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInitialContactType()
    {
        return $this->hasOne(InitialContactType::className(), ['Initial_Contact_Type_Id' => 'Initial_Contact_Type_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartnerType()
    {
        return $this->hasOne(PartnerType::className(), ['Partner_Type_Id' => 'Partner_Type_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusActionType()
    {
        return $this->hasOne(StatusActionType::className(), ['Status_Action_Type_Id' => 'Status_Action_Type_Id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgStatus()
    {
        return $this->hasOne(OrgStatus::className(), ['Status' => 'Org_Status_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['User_Id' => 'Created_By']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationPrograms()
    {
        return $this->hasMany(OrganizationProgram::className(), ['Organization_Id' => 'Organization_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveys()
    {
        return $this->hasMany(Survey::className(), ['Organization_Id' => 'Organization_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyTransactions()
    {
        return $this->hasMany(SurveyTransaction::className(), ['Organization_Id' => 'Organization_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['Organization_Id' => 'Organization_Id']);
    }

    /**
     * @inheritdoc
     * @return OrganizationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrganizationQuery(get_called_class());
    }
    
    public function getDashboardData()
    {
        $result = \Yii::$app->db->createCommand("select srvs.Status_Description SURVEYSTATUS, COUNT(*) [COUNT] from SURVEY srv
           -- inner join [user] usr on usr.User_ID = srv.User_ID
           -- inner join Organization org on org.Organization_Id = usr.Organization_Id
           Inner join Survey_Status srvs on srvs.Survey_Status_Id = srv.Survey_Status
            GROUP BY srvs.Status_Description");

        if ($result->query())
            $result = $result->query()->readAll();
        else
            $result = "no result";
        return $result;
    }
}
