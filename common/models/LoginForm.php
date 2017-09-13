<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\OrganizationProgram;
use yii\helpers\Url;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
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
            [['email', 'password'], 'required',],
            [['email'], 'email',],
            [['email'], 'string', 'max' => 50],
//            ['email', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/', 'message' => 'Your email can only contain alphanumeric characters, underscores and dashes.'],
            [['password'], 'string', 'max' => 100],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword', ],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            
            $user = $this->getUser($this->role);
            
            if (!$user || !$user->validatePassword($this->password)) {
                
                if($this->_user)
                {
                    
                    $this->_user->Login_Attempt = $this->_user->Login_Attempt ? ($this->_user->Login_Attempt + 1) : 1;
                    if($this->_user->Login_Attempt > 3)
                    {
                        $this->_user->Is_Locked = 1;
//                        $url = Yii::$app->request->baseUrl.'/'.Url::toRoute(['login/unlock-account']);;
                        $this->addError('password', "Your account has been locked. ");
                    }
                    else
                    {
                        $this->addError($attribute, 'Incorrect email or password.');
                    }
                    $this->_user->save();
                }
            }
        }
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
            
//          return   Yii::$app->user->login($this->getUser($role));
            return Yii::$app->user->login($this->getUser($role), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }
    
    protected function getUserByEmail($email)
    {
        $result = User::findByEmail($email);
    }


    protected function getUser($role)
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email, $role);
            
            
        }
        
        
        if(empty($this->_user))
        {
            $this->addError('password', 'Email does not exist ');
            return $this->_user;
        }
        if(!$this->_user->Is_Active)
            $this->addError('password', 'Your account is not activated.');

        
        if($this->_user->Is_Locked)
        {
            
            $this->addError('password', "Your account is locked.");
        }    
            
        return $this->_user;
    }
    
    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    
    
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
