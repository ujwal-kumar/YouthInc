<?php

namespace backend\controllers;

use Yii;
use common\models\MailTemplate;
use common\models\MailTemplateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MailTemplateController implements the CRUD actions for MailTemplate model.
 */
class MailTemplateController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MailTemplate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MailTemplateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MailTemplate model.
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
     * Creates a new MailTemplate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MailTemplate();
        
        if (Yii::$app->request->isAjax) 
        {
            if ($model->load(Yii::$app->request->post())) 
            {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } 
            else 
            {
                return $this->renderAjax('create', [
                    'model' => $model,
                ]);
            }
           
        }  
        else if ($model->load(Yii::$app->request->post()) ) 
        {
            if($model->save())
            {
                $model->Created_Date = date('Y-m-d H:i:s');
                $model->Last_Modified_Date = date('Y-m-d H:i:s');
                Yii::$app->session->setFlash('success', $model->Template_Name.' has been created successfully!');
                return $this->redirect(['index']);
            }
        } else {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing MailTemplate model.
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
            } 
            else 
            {
                return $this->renderAjax('update', [
                    'model' => $model,
                ]);
            }
           
        }  
        else if ($model->load(Yii::$app->request->post()) ) 
        {
            if($model->save())
            {
                $model->Last_Modified_Date = date('Y-m-d H:i:s');
                Yii::$app->session->setFlash('success', $model->Template_Name.' has been updated successfully!');
                return $this->redirect(['index']);
            }
        } 
        else 
        {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing MailTemplate model.
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
     * Finds the MailTemplate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MailTemplate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MailTemplate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
