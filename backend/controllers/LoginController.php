<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\ForgotPassword;
use common\models\User;
use common\models\ResetPassword;
use common\models\Email;
use yii\httpclient\Client;
use yii\widgets\ActiveForm;


class LoginController extends \yii\web\Controller
{
    /*
     * Behavior Method
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [ 'error', 'index', 'forgot-password', 'reset-password', 'unlock-account'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        Yii::$app->user->logout();
        $this->layout = 'login';
        
        
//        
//        print_r($response->content);
//        print_r(\Yii::$app->request->post());die;
        $model = new LoginForm();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
        } 
        elseif ($model->load(Yii::$app->request->post()) && $model->login(1)) {
//            echo "<pre>";
//            print_r((\Yii::$app->session));
//            print_r((\Yii::$app->user->identity));
//            die;
//            
//            die('adsf');
//            $client = new Client();
//            $response = $client->createRequest()
//            ->setMethod('post')
//            ->setUrl('http://localhost/youthinc/api/web/v1/login/login')
//            ->setData(Yii::$app->request->post())
    //        ->setOptions([
    //            'proxy' => 'tcp://proxy.example.com:5100', // use a Proxy
    //            'timeout' => 5, // set timeout to 5 seconds for the case server is not responding
    //        ])
//            ->send();
//            echo '<pre>';
//                    print_r($response->content);
//                    die();
            
            return $this->redirect(['/dashboard']);
//            return $this->goBack();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
    
    
    /**
     * Login action.
     *
     * @return string
     */
    public function actionForgotPassword()
    {
        
        Yii::$app->user->logout();
        $this->layout = 'login';
        
        $model = new ForgotPassword();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
        } 
        elseif ($model->load(Yii::$app->request->post())) 
        {
            $request = Yii::$app->request->post('ForgotPassword');
            $emailId = $request['email'];
            $user = new User();
            $userDetails = User::findOne(['Email_Id' => $emailId]);
            $userDetails->generatePasswordResetToken();
            
            $resetToken = base64_encode($userDetails->Password_Reset_Token);
            
            $url = Yii::$app->params['baseUrl'].'/'.Url::toRoute(['login/reset-password', 'token' => $resetToken]);
            if($userDetails->save())
            {
                $email = [];
                $email['slug'] = 'forgot-password';
                $email['{{email}}'] = $emailId;
                $email['{{link}}'] = $url;
                $mail = new Email();
                $mail = $mail->sendEmail($email);
                
                return $this->render('link-sent' );
            }
            else
            {
                
            }
            
            //return $this->goBack();
        } else {
            return $this->render('forgot', [
                'model' => $model,
            ]);
        }
    }
    
    
    
    public function actionResetPassword()
    {
        Yii::$app->user->logout();
        $this->layout = 'login';
        $request = Yii::$app->request->get();
        
        $user = new User();
        $resetPassword = new ResetPassword();
        if($user->isPasswordResetTokenValid(base64_decode($request['token'])))
        {
            $user = ($user->findByPasswordResetToken(base64_decode($request['token'])));
            
            
            
            if(($resetPassword->load(Yii::$app->request->post())) )
            {
                $request = Yii::$app->request->post('ResetPassword');
                $user->Password = Yii::$app->security->generatePasswordHash($request['password']);
                $user->Password_Reset_Token = null;
                if($user->save())
                {
                    Yii::$app->session->setFlash('success',   'Your account password has been reset successfully!');
                    return $this->redirect(['login/index']);
                }
            }
            
            return $this->render('reset-password', [
                'model' => $resetPassword,
            ]);
            
        }
        
        else
        {
            echo 'Given url is not valid ';
        }
        
    }
    
    public function actionUnlockAccount()
    {
        Yii::$app->user->logout();
        $request = Yii::$app->request->get();
        
        $user = new User();
        $this->layout = 'login';
        
        $model = new ForgotPassword();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
        } 
        elseif ($model->load(Yii::$app->request->post())) 
        {
            $request = Yii::$app->request->post('ForgotPassword');
            $email = $request['email'];
            $user = new User();
            $userDetails = User::findOne(['Email_Id' => $email]);
            $userDetails->Is_Locked = 0;
            $userDetails->Login_Attempt = 0;
            
            if($userDetails->save())
            {
                Yii::$app->session->setFlash('success',   'Your account has been unlocked successfully!');
                return $this->redirect(['login/index']);
            }
        }
        else
        {
            return $this->render('unlock', [
                'model' => $model,
            ]);
        }
        
        
//        if($user->isPasswordResetTokenValid(base64_decode($request['token'])))
//        {
//            $user = ($user->findByPasswordResetToken(base64_decode($request['token'])));
//            
//            $user->Is_Locked = 0;
//            $user->Login_Attempt = 0;
//            
//            if($user->save())
//            {
//                Yii::$app->session->setFlash('success',   'Your account has been unlocked successfully!');
//                return $this->redirect(['login/index']);
//            }
//            
//        }
//        else
//        {
//            echo 'Given url is not valid ';
//        }
        
    }
    
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return  $this->goHome();
    }

}
