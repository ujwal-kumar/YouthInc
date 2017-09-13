<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\MailTemplate;
use yii\helpers\Url;

/**
 * Email
 */
class Email extends Model
{


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
        ];
    }

    

    
    public function sendEmail($email = [])
    {
        if(!empty($email))
        {
//            $slug  = $email['slug'];
            $password = '';
            $mailTemplate = MailTemplate::findOne(['Template_Slug' => $email['slug']]);
            if(!empty($mailTemplate))
            {
                
                $msg = $mailTemplate['Mail_Body'];
                
                foreach($email as $key => $value)
                {
                    
                    $msg = str_replace($key, $value, $msg);
                    
                }
                
                $msg = str_replace('{{year}}', date('Y'), $msg);
                
                $to = (!empty($email['{{email}}']))? $email['{{email}}'] : Yii::$app->params['adminEmail'];
                
                $from = $mailTemplate['Mail_Sender'];
                $subject = $mailTemplate['Mail_Subject'];
                
                if(Yii::$app->params['mailTrigger'])
                {
                    Yii::$app->mailer->compose()
                    ->setFrom(Yii::$app->params['noReplyEmail'])
                    ->setTo($to)
                    ->setSubject($subject)
                    ->setHtmlBody($msg)
                    ->send();
                }
            }
        }
        
    }
    
   
}
