<?php

namespace api\modules\v1\controllers;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;
use common\models\InitialContactType;
use common\models\InitialContactTypeSearch;



/**
 * InitialContactTypeController implements the CRUD actions for InitialContactType model.
 */
class InitialContactTypeController extends ActiveController
{
    public $modelClass = 'common\models\InitialContactType';
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class' => HttpBasicAuth::className(),
//        ];
        
        $behaviors['verbs'] = [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'index' => ['post'],
                ],
            ]; 
        
        return $behaviors;
    }
    
    protected function verb(){
        
    }


//    public function actions()
//    {
//        $actions = parent::actions();
//        unset($actions['create'], $actions['update'], $actions['view']);
//        return $actions;
//    }

    

    /**
     * Displays a single InitialContactType model.
     * @param integer $id
     * @return mixed
     */
//    public function actionView($id)
//    {
//        return InitialContactType::findOne($id);
//    }
//
//    /**
//     * Creates a new InitialContactType model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        $model = new InitialContactType();
////        prd(Yii::$app->request->post());
//
//        if ($model->load(Yii::$app->request->post()) ) 
//        {
//            return  $model->save();
//        }
//        else
//        {
////            Yii::$app->response->format = Response::FORMAT_JSON;
//            return \yii\widgets\ActiveForm::validate($model);
//        }
//    }
//
//    /**
//     * Updates an existing InitialContactType model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionUpdate($id)
//    {
//        $model = InitialContactType::findOne($id);
//
//        if ($model->load(Yii::$app->request->post()) ) 
//        {
//            return  $model->save();
//        }
//        else
//        {
//            Yii::$app->response->format = Response::FORMAT_JSON;
//            return \yii\widgets\ActiveForm::validate($model);
//        }
//    }

    
}
