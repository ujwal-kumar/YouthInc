<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\OrganizationProgram;

/**
 * Login form
 */
class ForgotPassword extends Model
{
    public $email;
    public $rememberMe = true;

    private $_user;
    public $role;
    public $_menu;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['email'], 'required',],
            [['email'], 'email',],
            [['email'], 'string', 'max' => 50],
            
            [['email'], 'exist',  'targetClass' => User::className(), 'targetAttribute' => ['email' => 'Email_Id']],
//            ['email', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/', 'message' => 'Your email can only contain alphanumeric characters, underscores and dashes.'],
            
            
            // password is validated by validatePassword()
            
        ];
    }

    

    /**
     * Logs in a user using the provided email and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login($role)
    {
        $this->role = $role;
        if ($this->validate()) {
            
          return   Yii::$app->user->login($this->getUser($role));
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }
    
    public function getUserByEmail($email)
    {
        $result = User::findByEmail($email);
        if(empty($result))
        {
            $this->addError('email', 'email id does not exist ');
            return false;
        }
        else
        {
            return true;
        }
    }


   
    
    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    protected function getUser($role)
    {
        
//        if ($this->_user === null) {
//            $this->_user = User::findByEmail($this->email, $role);
//        }
        
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->email, $role);
            
        }
        
        
        if(empty($this->_user))
        {
            $this->addError('password', 'Username does not exist ');
            return $this->_user;
        }
        if(!$this->_user->Is_Active)
            $this->addError('password', 'Your account is not activated.');

        
        if($this->_user->Is_Locked)
            $this->addError('password', 'Your account is locked.');

        return $this->_user;
    }
    
    public function restLogin($email, $password)
    {
        
//        $result = \Yii::$app->db->createCommand("CALL usp_UserLogin :paramName1, :paramName2") 
        $result = \Yii::$app->db->createCommand(" usp_UserLogin @UserName =:paramName1, @password =:paramName2") 
                    ->bindValue(':paramName1' , $email, \PDO::PARAM_STR )
                    ->bindValue(':paramName2', $password,  \PDO::PARAM_STR);
                    //->execute();
        if($result->query())
           $result = $result->query()->readAll();
        else
            $result = "no result";
        return $result;
    }
}
