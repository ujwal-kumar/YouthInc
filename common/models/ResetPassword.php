<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\OrganizationProgram;

/**
 * Login form
 */
class ResetPassword extends Model
{
    public $password;
    public $re_password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['password', 're_password'], 'required',],
            [['password', 're_password'], 'string', 'max' => 50],
            ['password', 'compare', 'compareAttribute' => 're_password'],
            
            
        ];
    }

    

    
}
