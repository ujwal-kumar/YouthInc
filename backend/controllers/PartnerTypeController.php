<?php

namespace backend\controllers;

use Yii;
use common\models\PartnerType;
use common\models\PartnerTypeSearch;
use common\models\Organization;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;

/**
 * PartnerTypeController implements the CRUD actions for PartnerType model.
 */
class PartnerTypeController extends Controller
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
     * Lists all PartnerType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PartnerTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PartnerType model.
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
     * Creates a new PartnerType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PartnerType();

        if (Yii::$app->request->isAjax) 
        {
            if ($model->load(Yii::$app->request->post())) 
            {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {
                 return $this->renderAjax('create', [
                        'model' => $model
                    ]);
            }
           
        }
        
        else if ($model->load(Yii::$app->request->post())) 
        {
            if($model->save())
                Yii::$app->session->setFlash('success', $model->Partner_Type_Name.' has been created successfully!');
            else
                Yii::$app->session->setFlash('error', "something went wrong!");
            return $this->redirect(['index']);
        } 
        else
        {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing PartnerType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax) 
        {
            if ($model->load(Yii::$app->request->post())) 
            {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {
                 return $this->renderAjax('create', [
                        'model' => $model
                    ]);
            }
           
        }
        
        else if ($model->load(Yii::$app->request->post())) 
        {
            if($model->save())
                Yii::$app->session->setFlash('success', $model->Partner_Type_Name.' has been created successfully!');
            else
                Yii::$app->session->setFlash('error', "something went wrong!");
            return $this->redirect(['index']);
        } 
        else
        {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing PartnerType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $recordExist = Organization::findOne(['Partner_Type_Id' => $id]);
        $model = $this->findModel($id);  
        if(empty($recordExist))
        {
            
            if(!$this->findModel($id)->delete())
            {
                Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            }
            else
            {
                Yii::$app->session->setFlash('success', 'Record has been deleted successfully!');
            }
            
        }
        else
        {
            Yii::$app->session->setFlash('error', "Record is assoiciated with NPP.");
        }
    }

    /**
     * Finds the PartnerType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PartnerType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PartnerType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
