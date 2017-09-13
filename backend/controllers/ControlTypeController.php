<?php

namespace backend\controllers;

use Yii;
use common\models\ControlType;
use common\models\ControlTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ControlTypeController implements the CRUD actions for ControlType model.
 */
class ControlTypeController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['index', 'create', 'update', 'lock', 'status', 'view', 'delete'],
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

    /**
     * Lists all ControlType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ControlTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ControlType model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->request->isAjax)
        {
            return $this->renderAjax('view', [
                        'model' => $this->findModel($id),
            ]);
        }
        else
        {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Creates a new ControlType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new ControlType();
//
//        if ($model->load(Yii::$app->request->post()) ) 
//        {
//            $model->Created_Date = date('Y-m-d H:i:s');
//            $model->Last_Modified_Date = date('Y-m-d H:i:s');
//            if($model->save())
//            {
//                Yii::$app->session->setFlash('success', $model->Control_Type_Name.'  has been created successfully!');
//                return $this->redirect(['index']);
//            }
//            
//        } 
//        elseif (Yii::$app->request->isAjax) 
//        {
//             if ($model->load(Yii::$app->request->post())) 
//            {
//                Yii::$app->response->format = Response::FORMAT_JSON;
//                return \yii\widgets\ActiveForm::validate($model);
//            } 
//            else 
//            {
//                 return $this->renderAjax('create', [
//                        'model' => $model
//                    ]);
//            }
//           
//        } else {
//            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
//            return $this->redirect(['index']);
//        }
//    }

    /**
     * Updates an existing ControlType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) 
        {
            $model->Last_Modified_Date = date('Y-m-d H:i:s');
            if($model->save())
            {
                Yii::$app->session->setFlash('success', $model->Control_Type_Name.'  has been updated successfully!');
                return $this->redirect(['index']);
            }
        } 
        elseif (Yii::$app->request->isAjax) 
        {
             if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {
                 return $this->renderAjax('update', [
                        'model' => $model
                    ]);
            }
           
        } else {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }
    
     
    
    
    /**
     * Deletes an existing ControlType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ControlType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ControlType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ControlType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
