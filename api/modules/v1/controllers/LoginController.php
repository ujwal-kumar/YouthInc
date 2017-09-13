<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

use Yii;
//use yii\rest\Controller;
use yii\web\Response;
//use app\models\User;
//use app\models\UserSearch;
//use app\models\UserRole;
use yii\web\Controller;
//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;
//use yii\rest\ActiveController;
use common\models\LoginForm;
/**
 * UsersController implements the CRUD actions for User model.
 */
class LoginController extends ActiveController
{
    public $modelClass = 'common\models\UserRole';  
    
   
    public function actionLogin(){
        
        $request = Yii::$app->request->post();
        $username = $request['LoginForm']['username'];
        $password = $request['LoginForm']['password'];
        
        $loginForm = new LoginForm();
        
        $result = $loginForm->restLogin($username, $password);
        
        echo '<pre>';
        print_r($result);
//        die('inside');
        return 5;
    }
//    public function login(){
//        return UserMaster::find()->all();
//    }    
    
    
//    protected function verbs()
//    {
//       return [
//           'login' => 'GET',
//       ];
//    }
//    public function actions()
//    {
//        $actions = parent::actions();
//
//        // disable the "delete" and "create" actions
//        unset($actions['view'], $actions['create']);
//        $actions['pop'] = [$this, 'pop'];
//        $actions['login'] = [$this, 'login'];
//        // customize the data provider preparation with the "prepareDataProvider()" method
////        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
//
//        return $actions;
//    }
//
//    
////    public function behaviors()
////    {
////        $behaviors = parent::behaviors();
////        return [
////            'access' => [
////                'class' => \yii\filters\AccessControl::className(),
////                'rules' => [
////                    [
////                        'allow' => true,
////                        'actions' => ['pop'],
////                        'verbs' => ['GET']
////                    ],
////                ]
////            ],
////        ];
////    }
////    
//    public function actionView($id)
//    {
//        return 5;
//    }
    
    
    
    
//    public function actionLogin()
//    {
//        die('SADFSADF');
//    }
}
