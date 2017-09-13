<?php

namespace backend\controllers;

use Yii;
use common\models\Users;
use common\models\UserSearch;
use common\models\Role;
use common\models\UserRole;
use common\models\Organization;
use common\models\AuthAssignment;
use common\models\Email;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
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
            return $this->render('view', [
                        'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();
        $roles =  UserRole::find()->where(['Is_Active' => 1])->orderBy(['Role_Name'=>SORT_ASC])->all();
        $organizations = Organization::find()->where(['Is_Active' => 1])->orderBy([
            'Organization_Name'=>SORT_ASC, 
            
            ])->all();
        
        
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        } 
        else if  ($model->load(Yii::$app->request->post()) ) 
        {
            $request = Yii::$app->request->post('Users');
            $model->Login_Attempt = 0;
            $model->Is_Locked = 0;
            $length = 10;
            $chars = array_merge(range(0,9), range('a','z'), range('A','Z'), ['@','#', '$', '%', '!', '(', ')']);
            shuffle($chars);
            $password = implode(array_slice($chars, 0, $length));
            $model->Password = Yii::$app->security->generatePasswordHash($password);
            $model->Created_Date = date('Y-m-d H:i:s');
            $model->Last_Modified_Date = date('Y-m-d H:i:s');
            
            if($model->save())
            {
                $assingment = new AuthAssignment();
                $assingment->item_name = "$model->Role_Id";
                $assingment->user_id = "$model->User_Id";
                $assingment->created_at = strtotime(date('Y-m-d H:i:s'));
                
                if($assingment->save())
                {
                
                    $email = [];
                    $email['slug'] = 'new-user';
                    $email['{{email}}'] = $model->Email_Id;
                    $email['{{password}}'] = $password;
                    
                    $mail = new Email();
                    $mail = $mail->sendEmail($email);
                    Yii::$app->session->setFlash('success', $model->User_Name.'  has been created successfully!');
                }
                else 
                {
                    Yii::$app->session->setFlash('error', '  Error occured !');
                }
                return $this->redirect(['index']);
            }
            else
            {
                return $this->render('create', [
                    'model' => $model,
                    'roles' => $roles,
                    'organizations' => $organizations,

                ]);
            }
        }
        elseif (Yii::$app->request->isAjax) {
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {

                return $this->renderAjax('create', [
                'model' => $model,
                'roles' => $roles,
                'organizations' => $organizations,
                
            ]);
            }
        } else {
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldPass = $model->Password ;
        $isLock = $model->Is_Locked; 
        $roles =  UserRole::find()->where(['Is_Active' => 1])->orderBy(['Role_Name'=>SORT_ASC])->all();
        $organizations = Organization::find()->where(['Is_Active' => 1])->orderBy([
            'Organization_Name'=>SORT_ASC, 
            ])->all();
        $request = Yii::$app->request->post('Users');
        $oldRole = $model->Role_Id;
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          } 
        else if ($model->load(Yii::$app->request->post()) ) 
        {
            $request = Yii::$app->request->post('Users');
            
            
            $model->Last_Modified_Date = date('Y-m-d H:i:s');
            $newRole = $model->Role_Id;
            
            $model->Is_Locked = $isLock;
            if($model->Role_Id == 1)
            {
                $model->Organization_Id = null;
            }
            
            if($model->save() && $model->validate())
            {
                $assingment = AuthAssignment::findOne(['item_name' => $oldRole, 'user_id' => $model->User_Id]);
                
                if(empty($assingment))
                {
                    $assingment = new AuthAssignment();
                    $assingment->item_name = "$newRole";
                    $assingment->user_id = "$model->User_Id";
                    $assingment->created_at = strtotime(date('Y-m-d H:i:s'));
                }
                else
                {
                    AuthAssignment::deleteAll(['item_name' => $oldRole, 'user_id' => $model->User_Id]);
                    $assingment = new AuthAssignment();
                    $assingment->item_name = "$newRole";
                    $assingment->user_id = "$model->User_Id";
                    $assingment->created_at = strtotime(date('Y-m-d H:i:s'));
                }
                
                if($assingment->save())
                {
                    Yii::$app->session->setFlash('success', $model->User_Name.'  has been updated successfully!');
                }
                else {
                    Yii::$app->session->setFlash('error', '  Error occured !');
                }
                return $this->redirect(['index']);
            }
            else
            {
                return $this->render('update', [
                    'model' => $model,
                    'roles' => $roles,
                    'organizations' => $organizations,

                ]);
            }
        }
        elseif (Yii::$app->request->isAjax) {
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {

                return $this->renderAjax('update', [
                'model' => $model,
                'roles' => $roles,
                'organizations' => $organizations,
                
            ]);
            }
        } else {
            return $this->redirect(['index']);
        }
    }
    
    /**
     * Status Action
     */
    public function actionLock($id) {
        if (Yii::$app->request->isAjax) 
        {
            if (!empty($id)) {

                $active = 'Locked';

                $model = $this->findModel($id);
                if($model->Is_Locked == 1)
                {
                    $active = 'Unlocked';
                }
                Yii::$app->session->setFlash('success', $model->User_Name. "  has been $active successfully!");

                $model->Is_Locked = (empty($model->Is_Locked)) ? 1 : 0;
                if ($model->save()) 
                {
                    echo true;
                    
                } else {
                    Yii::$app->session->setFlash('error', '  Error occured !');
                }
            } else {
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
     * Status Action
     */
    public function actionStatus($id) {
        if (Yii::$app->request->isAjax && !empty($id) )
        {
            

            $active = 'Activated';

            $model = $this->findModel($id);
            if($model->Is_Active == 1)
            {
                $active = 'Deactivated';
            }
            
            
            $model->Is_Active = (empty($model->Is_Active)) ? 1 : 0;
            if ($model->save()) 
            {
                Yii::$app->session->setFlash('success', $model->User_Name.'  has been '.$active.' successfully!');
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
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
