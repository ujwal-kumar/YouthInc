<?php

namespace backend\controllers;

use Yii;
use common\models\Role;
use common\models\RoleSearch;
use common\models\AuthAssignment;
use common\models\AuthItem;
use common\models\AuthChild;
use common\models\Users;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends Controller
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
     * Lists all Role models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Role model.
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
     * Creates a new Role model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
           $model = new Role();

            if (Yii::$app->request->isAjax) 
            {
               if ($model->load(Yii::$app->request->post())) {
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
                {
                    $auth = new AuthItem();
                     $auth->name = "$model->Role_Id";
                     $auth->type = 1;
                     $auth->description = $model->Role_Name;
                     $auth->created_at = strtotime(date('Y-m-d H:i:s'));
                     $auth->updated_at = strtotime(date('Y-m-d H:i:s'));
                     if($auth->save())
                     {
                         Yii::$app->session->setFlash('success', $model->Role_Name . ' Role has been created successfully!');
                     }
                     else
                     {
                         Yii::$app->session->setFlash('error',  'error occured !');
                     }
                    
                    
                }   

               return $this->redirect(['index']);
           }  else {
               Yii::$app->session->setFlash('error', "The requested Item could not be found.");
                return $this->redirect(['index']);
           }
    }

    /**
     * Updates an existing Role model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);
        

        if (Yii::$app->request->isAjax) 
        {
               if ($model->load(Yii::$app->request->post())) {
                   Yii::$app->response->format = Response::FORMAT_JSON;
                   return \yii\widgets\ActiveForm::validate($model);
               } else {
                   return $this->renderAjax('update', [
                               'model' => $model
                   ]);
               }
        }
        else if ($model->load(Yii::$app->request->post())) 
        {
             if($model->save())
             {
                 $roleFind = AuthItem::findOne(['name' => "$model->Role_Id", 'type' => 1 ]);
                 if(empty($roleFind))
                 {
                     $auth = new AuthItem();
                     $auth->name = "$model->Role_Id";
                     $auth->type = 1;
                     $auth->description = $model->Role_Name;
                     $auth->created_at = strtotime(date('Y-m-d H:i:s'));
                     $auth->updated_at = strtotime(date('Y-m-d H:i:s'));
                     if($auth->save())
                     {
                         Yii::$app->session->setFlash('success', $model->Role_Name . ' Role has been updated successfully!');
                     }
                     else
                     {
                         Yii::$app->session->setFlash('error',  'error occured during role update!');
                     }
                 }
                 else
                 {
                     $auth = $roleFind;
                     $auth->description = $model->Role_Name;
                     $auth->updated_at = strtotime(date('Y-m-d H:i:s'));
                     if($auth->save())
                     {
                         Yii::$app->session->setFlash('success', $model->Role_Name . ' Role has been updated successfully!');
                     }
                     else
                     {
                         Yii::$app->session->setFlash('error',  'error occured during role update!');
                     }
                 }
                 
             }   
            return $this->redirect(['index']);
        }  else {
             Yii::$app->session->setFlash('error', "The requested Item could not be found.");
             return $this->redirect(['index']);
        }
    }
    
    /**
     * Status Action
     */
    public function actionStatus($id) 
    {
        if (Yii::$app->request->isAjax && !empty($id) )
        {
            

            $active = 'Activated';

            $model = $this->findModel($id);
            if($model->Is_Active == 1)
            {
                $users = Users::findOne(['Role_Id' => $id]);
                if(empty($users))
                {
                    $active = 'Deactivated';
                }
                else
                {
                    Yii::$app->session->setFlash('error', "Role is associated with User!");
                    echo false;
                    return false;
                }
                
            }
            
            Yii::$app->session->setFlash('success', $model->Role_Name.'  has been '.$active.' successfully!');
            $model->Is_Active = (empty($model->Is_Active)) ? 1 : 0;
            if ($model->save()) 
            {
                echo true;
            } 
            else 
            {
                Yii::$app->session->setFlash('error', "Something went wrong!");
                echo false;
            }
            
        }
        else
        {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Role model.
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
     * Finds the Role model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Role the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Role::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
