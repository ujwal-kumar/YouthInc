<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

use Yii;
//use app\models\User;
//use app\models\UserSearch;
//use app\models\UserRole;
//use yii\web\Controller;
//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;
//use yii\rest\ActiveController;
/**
 * UsersController implements the CRUD actions for User model.
 */
class UsersController extends ActiveController
{
    public $modelClass = 'backend\models\User';  
}
