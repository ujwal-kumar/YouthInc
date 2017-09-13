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
use common\models\SurveyDetails;
use common\models\QuestionMaster;
/**
 * UsersController implements the CRUD actions for User model.
 */
class SurveyController extends ActiveController
{
    public $modelClass = 'common\models\SurveyDetails';  
    
   
    public function actionSurvey(){
        
        
        $answers = new QuestionMaster();
            
        $questions = \common\models\QuestionMaster::find()->where(['IsActive' => 1])->limit(5)->with('answerMasters')->all();
        
        return $questions;
    }
//    
}
