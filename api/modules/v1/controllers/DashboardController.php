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
use common\models\Organization;
/**
 * UsersController implements the CRUD actions for User model.
 */
class DashboardController extends ActiveController
{
    public $modelClass = 'common\models\Organization';  
    
   
    public function actionData(){
        
        $dashboard = new Organization();
        
        $result = $dashboard->getDashboardData();
        
        return $result;
    }
//    
}
