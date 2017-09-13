<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%User}}".
 *
 * @property integer $User_Id
 * @property string $User_Name
 * @property string $Email_Id
 * @property string $Password
 * @property integer $Is_Locked
 * @property integer $Login_Attempt
 * @property integer $Is_Active
 * @property integer $Role_Id
 * @property integer $Organization_Id
 * @property string $Auth_Key
 * @property string $Access_Token
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property Answer[] $answers
 * @property Document[] $documents
 * @property FMARating[] $fMARatings
 * @property Message[] $messages
 * @property Organization[] $organizations
 * @property OrganizationProgram[] $organizationPrograms
 * @property Program[] $programs
 * @property Question[] $questions
 * @property Survey[] $surveys
 * @property SurveyTransaction[] $surveyTransactions
 * @property Organization $organization
 * @property Role $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%User}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [[ 'Organization_Id'], 'required',  'when' => function($model) {
                return $model->Role_Id != 1 && !empty($model->Role_Id);
            }],
            [[ 'Email_Id', 'Role_Id', 'User_Name',], 'required'],
            [['User_Name', 'Email_Id', 'Password', 'Auth_Key', 'Access_Token'], 'string'],
            [['Is_Locked', 'Login_Attempt', 'Is_Active', 'Role_Id', 'Organization_Id'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Email_Id'], 'email'],
            [['Email_Id'], 'unique' , 'targetClass' => '\common\models\Users'],
            [['User_Name'], 'unique', 'targetClass' => '\common\models\Users'],
            [['Organization_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['Organization_Id' => 'Organization_Id']],
            [['Role_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['Role_Id' => 'Role_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'User_Id' => Yii::t('app', 'User '),
            'User_Name' => Yii::t('app', 'User  Name'),
            'Email_Id' => Yii::t('app', 'Email '),
            'Password' => Yii::t('app', 'Password'),
            'Is_Locked' => Yii::t('app', 'Is  Locked'),
            'Login_Attempt' => Yii::t('app', 'Login  Attempt'),
            'Is_Active' => Yii::t('app', 'Is  Active'),
            'Role_Id' => Yii::t('app', 'Role '),
            'Organization_Id' => Yii::t('app', 'Organization '),
            'Auth_Key' => Yii::t('app', 'Auth  Key'),
            'Access_Token' => Yii::t('app', 'Access  Token'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['Created_By' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['Uploaded_By' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFMARatings()
    {
        return $this->hasMany(FMARating::className(), ['Created_By' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['User_Id' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['Created_By' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationPrograms()
    {
        return $this->hasMany(OrganizationProgram::className(), ['Created_By' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Program::className(), ['Created_By' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['Created_By' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveys()
    {
        return $this->hasMany(Survey::className(), ['User_Id' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyTransactions()
    {
        return $this->hasMany(SurveyTransaction::className(), ['User_Id' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['Organization_Id' => 'Organization_Id']);
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
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
