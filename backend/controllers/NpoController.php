<?php

namespace backend\controllers;

use Yii;
use common\models\Organization;
use common\models\OrganizationSearch;
use common\models\OrganizationProgramType;
use common\models\InitialContactType;
use common\models\StatusActionType;
use common\models\PartnerType;
use common\models\HiringType;
use common\models\Users;
use common\models\OrgStatus;
use common\models\Email;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\widgets\Alert;
use yii\widgets\ActiveForm;

/**
 * NpoController implements the CRUD actions for Organization model.
 */
class NpoController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'status', 'flash', 'approve'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Organization models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new OrganizationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Organization model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view', [
                        'model' => $this->findModel($id),
            ]);
        } else {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Creates a new Organization model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()         
    {
        
        
        
        $model = new Organization();
        $partner = new OrganizationProgramType();
        $intialsTypeList = InitialContactType::find()->orderBy(['Initial_Contact_Type_Name'=>SORT_ASC])->all();
        $partnerTypeList = PartnerType::find()->orderBy(['Partner_Type_Name'=>SORT_ASC])->all();
        $statusTypeList = StatusActionType::find()->orderBy(['Status_Action_Type_Name'=>SORT_ASC])->all();
        $hiringTypeList = HiringType::find()->orderBy(['Hiring_Type_Name'=>SORT_ASC])->all();
        $request = Yii::$app->request->post('OrganizationProgramType');
        

        if ($model->load(Yii::$app->request->post())) {


            $model->Initial_Contact_Date = date('Y-m-d H:i:s', strtotime($model->Initial_Contact_Date));
            $model->Status_Action_Date = date('Y-m-d H:i:s', strtotime($model->Status_Action_Date));
            $model->Status = 3;
            $model->Created_Date = date('Y-m-d H:i:s');
            $model->Last_Modified_Date = date('Y-m-d H:i:s');
            
            if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
              } 

            elseif ($model->save())
            {
                foreach($request['Partner_Type_Id'] as $partnerId)
                {
                    $partner = new OrganizationProgramType();
                    $partner->Organization_Id = $model->Organization_Id;
                    $partner->Partner_Type_Id = $partnerId;
                    $partner->save();
                }
                if(empty($model->As_Draft))
                {
                    /**
                    * User Registration @todo
                    */
                   $user = new Users();
                   $userName = explode('@', $model->Email);

                   if(is_array($userName))
                   {
                       $user->User_Name = $userName[0];
                   }
                   $user->Email_Id = $model->Email;
                   $user->Role_Id = 2;
                   $user->Login_Attempt = 0;
                   $length = 10;
                   $chars = array_merge(range(0,9), range('a','z'), range('A','Z'), ['@','#', '$', '%', '!', '(', ')']);
                   shuffle($chars);
                   $password = implode(array_slice($chars, 0, $length));
                   $user->Password = Yii::$app->security->generatePasswordHash($password);
                   $user->Organization_Id = $model->Organization_Id;
                   $user->Created_Date = date('Y-m-d H:i:s');
                   $user->Last_Modified_Date = date('Y-m-d H:i:s');
                   if($user->save())
                   {
                       $email = [];
                       $email['slug'] = 'new-npo';
                       $email['{{email}}'] = $model->Email;
                       $email['{{password}}'] = $password;
                       $email['{{npo}}'] = $model->Organization_Name;
                       $mail = new Email();
                       $mail = $mail->sendEmail($email);
                   }
                }
                
//                if(1)
//                {
////                    prd($model);
//                    $email = [];
//                    $email['{{email}}'] = $model->Email;
//                    $email['{{password}}'] = $password;
//                    $email['{{npo}}'] = $model->Organization_Name;
//                    $mail = new Email();
//                    $mail = $mail->sendEmail($email);
//                }
                 
                Yii::$app->session->setFlash('success', $model->Organization_Name . ' NPO has been created successfully!');
                return $this->redirect(['index']);
            }
        } elseif (Yii::$app->request->isAjax) {
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {

                return $this->renderAjax('create', [
                            'model' => $model,
                            'partner' => $partner,
                            'intialsTypeList' => $intialsTypeList,
                            'partnerTypeList' => $partnerTypeList,
                            'statusTypeList' => $statusTypeList,
                            'hiringTypeList' => $hiringTypeList,
                ]);
            }
        } else {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Organization model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) 
    {
        $model = $this->findModel($id);
        $model->Initial_Contact_Date = date('Y-m-d', strtotime($model->Initial_Contact_Date));
        $model->Status_Action_Date = date('Y-m-d', strtotime($model->Status_Action_Date));
        $requestNpo = Yii::$app->request->post('Organization');
        $prevEmail = $model->Email;
        /**
         * Previous Partner Type
         */
        $partner = new OrganizationProgramType();
        $partnerPrevSelect = OrganizationProgramType::find()->where(['Organization_Id' => $model->Organization_Id])->all();
//        prd($partnerPrevSelect);
        $partner->Partner_Type_Id = ArrayHelper::map($partnerPrevSelect, 'Organization_Program_Type_Id', 'Partner_Type_Id');
        
        $intialsTypeList = InitialContactType::find()->orderBy(['Initial_Contact_Type_Name'=>SORT_ASC])->all();
        $partnerTypeList = PartnerType::find()->orderBy(['Partner_Type_Name'=>SORT_ASC])->all();
        $statusTypeList = StatusActionType::find()->orderBy(['Status_Action_Type_Name'=>SORT_ASC])->all();
        $hiringTypeList = HiringType::find()->orderBy(['Hiring_Type_Name'=>SORT_ASC])->all();
        $request = Yii::$app->request->post('OrganizationProgramType');
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
          } 

        elseif ($model->load(Yii::$app->request->post())) 
        {
            $model->Last_Modified_Date = date('Y-m-d H:i:s');
            
            
            if ($model->save())
            {
                if($prevEmail != $model->Email)
                {
                    $userData = Users::findOne(['Email_Id' => $prevEmail]);
                    
                    if(!empty($userData))
                    {
                        $userData->Email_Id = $model->Email;
                        $userData->save();
                    }
                    
                }
                
                $previousPartner = OrganizationProgramType::deleteAll(['Organization_Id' => $id]);
                
                foreach($request['Partner_Type_Id'] as $partnerId)
                {
                    $partner = new OrganizationProgramType();
                    $partner->Organization_Id = $model->Organization_Id;
                    $partner->Partner_Type_Id = $partnerId;
                    $partner->save();
                }
                
                
                if(isset($requestNpo['As_Draft']) && empty($requestNpo['As_Draft']))
                {
                    
                    /**
                    * User Registration @todo
                    */
                   $user = new Users();
                   $userName = explode('@', $model->Email);

                   if(is_array($userName))
                   {
                       $user->User_Name = $userName[0];
                   }
                   $user->Email_Id = $model->Email;
                   $user->Role_Id = 2;
                   $user->Login_Attempt = 0;
                   $length = 10;
                   $chars = array_merge(range(0,9), range('a','z'), range('A','Z'), ['@','#', '$', '%', '!', '(', ')']);
                   shuffle($chars);
                   $password = implode(array_slice($chars, 0, $length));
                   $user->Password = Yii::$app->security->generatePasswordHash($password);
                   $user->Organization_Id = $model->Organization_Id;
                   $user->Created_Date = date('Y-m-d H:i:s');
                   $user->Last_Modified_Date = date('Y-m-d H:i:s');
                   if($user->save())
                   {
                       $email = [];
                       $email['slug'] = 'new-npo';
                       $email['{{email}}'] = $model->Email;
                       $email['{{password}}'] = $password;
                       $email['{{npo}}'] = $model->Organization_Name;
                       $mail = new Email();
                       $mail = $mail->sendEmail($email);
                   }
                }
                
            }
                Yii::$app->session->setFlash('success', $model->Organization_Name . ' NPO has been updated successfully!');
                return $this->redirect(['index']);
        }
        elseif (Yii::$app->request->isAjax) {
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {
                return $this->renderAjax('update', [
                            'model' => $model,
                            'partner' => $partner,
                            'intialsTypeList' => $intialsTypeList,
                            'partnerTypeList' => $partnerTypeList,
                            'statusTypeList' => $statusTypeList,
                            'hiringTypeList' => $hiringTypeList,
                ]);
            }
        } else {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }
    
    

    /**
     * Deletes an existing Organization model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
            try{
                $model->save(); 
            
                Yii::$app->session->setFlash('success', $model->Organization_Name.'  has been '.$active.' successfully!');
                echo true;
            } catch (\yii\db\Exception $e) 
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
     * Status Action
     */
    public function actionApprove($id) {
        
        if (!Yii::$app->request->isAjax) 
        {
            return $this->redirect(['index']);
        }
        
        if (!empty($id)) 
        {
            

            try
            {
                
                $active = 'Accepted';
                
                $model = $this->findModel($id);
                
                $notes = Yii::$app->request->post('notes');
                
                if($model->Is_Active == 0)
                {
                    Yii::$app->session->setFlash('error', $model->Organization_Name . " is not active.!");
                    echo true;
                    return true;
                }
                $decline = Yii::$app->getRequest()->getQueryParam('decline');
                
                
                if($decline)
                {
                    $active = 'Rejected';
                    $email = [];
                    $email['slug'] = 'rejection-mail';
                    $email['{{email}}'] = $model->Email;
                    $email['{{npo}}'] = $model->Organization_Name;
                    $email['{{notes}}'] = $notes;
                    $mail = new Email();
                    $mail = $mail->sendEmail($email);
                    $model->Status = 2;
                }
                else
                {
                    $email = [];
                    $email['slug'] = 'acceptance-mail';
                    $email['{{email}}'] = $model->Email;
                    $email['{{npo}}'] = $model->Organization_Name;
                    $mail = new Email();
                    $mail = $mail->sendEmail($email);
                    $model->Status = 1;
                }
                
                Yii::$app->session->setFlash('success', $model->Organization_Name . " NPO has been $active successfully!");
                
//                $model->Status = (($model->Status == 2)) ? OrgStatus::findOne(1)->Org_Status_Id : OrgStatus::findOne(2)->Org_Status_Id;
                $model->Notes = $notes;
                if ($model->save()) 
                {
                    echo true;
                    
                } 
                else
                {
                    
                    echo false;
                }
            }
            catch(Exception $e)
            {
                Yii::$app->session->setFlash('error', "$e->getMessage()" );
                echo true;
            }
        } else {
           
            return $this->redirect(['index']);
        }
    }

    /**
     * Status Action
     */
    public function actionFlash() {
        echo Alert::widget();
    }

    /**
     * Finds the Organization model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Organization the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Organization::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
