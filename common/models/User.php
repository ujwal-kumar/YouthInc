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
 * @property string $Password_Reset_Token
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
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
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
            [['User_Name', 'Email_Id', 'Password', 'Login_Attempt'], 'required'],
            [['User_Name', 'Email_Id', 'Password', 'Auth_Key', 'Access_Token', 'Password_Reset_Token'], 'string'],
            [['Is_Locked', 'Login_Attempt', 'Is_Active', 'Role_Id', 'Organization_Id'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Email_Id'], 'unique'],
            [['User_Name'], 'unique'],
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
            'Password_Reset_Token' => Yii::t('app', 'Password Reset Token'),
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
    
    public function getMenu()
    {
        $programObj = OrganizationProgram::find()->where(['Organization_Id' => Yii::$app->user->identity['Organization_Id'] ])->all();
        return $programObj;
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['User_Id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username, $role)
    {
        return static::findOne(['User_Name' => $username, 'Role_Id' => $role]);
    }
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email, $role)
    {
        return static::findOne(['Email_Id' => $email, 'Role_Id' => $role]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'Password_Reset_Token' => $token,
            'Is_Active' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->User_Id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->Auth_Key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        

//        prd(Yii::$app->security->generatePasswordHash('admin'));
        return Yii::$app->security->validatePassword($password, $this->Password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->Password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->AuthKey = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->Password_Reset_Token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->Password_Reset_Token = null;
    }
}
