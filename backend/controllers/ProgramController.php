<?php

namespace backend\controllers;

use Yii;
use common\models\Program;
use common\models\ProgramPartner;
use common\models\ProgramCategory;
use common\models\ProgramType;
use common\models\ProgramSearch;
use common\models\PartnerType;
use common\models\Category;
use common\models\Survey;
use common\models\SurveyTransaction;
use common\models\OrganizationProgram;





use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\helpers\ArrayHelper;

/**
 * ProgramController implements the CRUD actions for Program model.
 */
class ProgramController extends Controller
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
     * Lists all Program models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProgramSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Program model.
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
     * Creates a new Program model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Program();
        $partner = new ProgramPartner();
        $prgmCat = new ProgramCategory();
        $categoryList = Category::find()->orderBy(['Category_Name'=>SORT_ASC])->all();
        $partnerTypeList = PartnerType::find()->orderBy(['Partner_Type_Name'=>SORT_ASC])->all();
        $programTypeList = ProgramType::find()->orderBy(['Program_Type_Name'=>SORT_ASC])->all();

        if ($model->load(Yii::$app->request->post())) 
        {
            $model->Created_Date = date('Y-m-d H:i:s');
            $model->Last_Modified_Date = date('Y-m-d H:i:s');
            
            if($model->save())
            {
                $programPartner  = Yii::$app->request->post('ProgramPartner');
                /**
                 * Program Partner Type
                 */
                foreach($programPartner['Partner_Type_Id'] as $partnerTypeId )
                {
                    $partner = new ProgramPartner();
                    $partner->Program_Id = $model->Program_Id;
                    $partner->Partner_Type_Id = $partnerTypeId;
//                    prd($partner);
                    $partner->save();
                }
                
                $programCategory   = Yii::$app->request->post('ProgramCategory');
                
                foreach($programCategory['Category_Id'] as $catId)
                {
                    $prgmCat = new ProgramCategory();
                    $prgmCat->Program_Id = $model->Program_Id;
                    $prgmCat->Category_Id = $catId;
                    if(!$prgmCat->save())
                    {
                        Yii::$app->session->setFlash('error', $model->Program_Name.' Category did not save correctly!');
                        return $this->redirect(['index']);
                    }
                }
                
                
                Yii::$app->session->setFlash('success', $model->Program_Name.' has been created successfully!');
                return $this->redirect(['index']);
            }
        } elseif (Yii::$app->request->isAjax) 
        {
             if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {
                 return $this->renderAjax('create', [
                        'model' => $model,
                        'partner' => $partner,
                        'prgmCat' => $prgmCat,
                        'categoryList' => $categoryList,
                        'partnerTypeList' => $partnerTypeList,
                        'programTypeList' => $programTypeList,
                    ]);
            }
           
        } else {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Program model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);
        
        
        $partner = new ProgramPartner();
        $partnerPrevSelect = ProgramPartner::find()->where(['Program_Id' => $id])->all();
//        prd($partnerPrevSelect);
        $partner->Partner_Type_Id = ArrayHelper::map($partnerPrevSelect, 'Program_Partner_Id', 'Partner_Type_Id');
        
        
        
        
        $prgmCat =  ProgramCategory::find()->where(['Program_Id' => $id])->all();
        
        

        
        if(!empty($prgmCat))
        {
            $listedCat = ArrayHelper::map($prgmCat, 'Category_Id', 'Category_Id');
        }
        else
        {
            $listedCat = [];
        }
        
        
        $prgmCat = new  ProgramCategory();
        $prgmCat->Category_Id = $listedCat;
        $categoryList = Category::find()->all();
        

        $partnerTypeList = PartnerType::find()->all();
        $programTypeList = ProgramType::find()->all();

        if ($model->load(Yii::$app->request->post())) {
//            $model->Created_Date = date('Y-m-d H:i:s');
            $model->Last_Modified_Date = date('Y-m-d H:i:s');
            if($model->save())
            {
                $programPartner  = Yii::$app->request->post('ProgramPartner');
                $previousPartner = ProgramPartner::deleteAll(['Program_Id' => $id]);
                $previousCategory = ProgramCategory::deleteAll(['Program_Id' => $id]);
                
                /**
                 * Program Partner Type
                 */
                foreach($programPartner['Partner_Type_Id'] as $partnerTypeId )
                {
                    $partner = new ProgramPartner();
                    $partner->Program_Id = $model->Program_Id;
                    $partner->Partner_Type_Id = $partnerTypeId;
                    
                    if(!$partner->save())
                    {
                        Yii::$app->session->setFlash('error', $model->Program_Name.' Partner type did not save correctly!');
                        return $this->redirect(['index']);
                    }
                    
                }
                
                $programCategory   = Yii::$app->request->post('ProgramCategory');
                
                foreach($programCategory['Category_Id'] as $catId)
                {
                    
                    $prgmCat = new ProgramCategory();
                    $prgmCat->Program_Id = $model->Program_Id;
                    $prgmCat->Category_Id = $catId;
                    if(!$prgmCat->save())
                    {
                        Yii::$app->session->setFlash('error', $model->Program_Name.' Category did not save correctly!');
                        return $this->redirect(['index']);
                    }
                }
                
                
                
                
                
                Yii::$app->session->setFlash('success', $model->Program_Name.' has been updated successfully!');
                return $this->redirect(['index']);
            }
        } elseif (Yii::$app->request->isAjax) {
             if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {
                 return $this->renderAjax('update', [
                        'model' => $model,
                        'partner' => $partner,
                        'prgmCat' => $prgmCat,
                        'categoryList' => $categoryList,
                        'partnerPrevSelect' => $partnerPrevSelect,
                        'partnerTypeList' => $partnerTypeList,
                        'programTypeList' => $programTypeList,
                    ]);
            }
           
        } else {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Program model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $recordExist = OrganizationProgram::findOne(['Program_Id' => $id]);
        
        if(empty($recordExist))
        {
            $prgCatDelete = ProgramCategory::deleteAll(['Program_Id' => $id]);
            $prgPartnerDelete = ProgramPartner::deleteAll(['Program_Id' => $id]);
            
            if($prgCatDelete && $prgPartnerDelete)
            {
                if(!$this->findModel($id)->delete())
                {
                    Yii::$app->session->setFlash('error', "An error occured during program deletion .");
                    return false;
                }
                else
                {
                    Yii::$app->session->setFlash('success', 'Record has been deleted successfully!');
                    return true;
                }
            }
            else
            {
                Yii::$app->session->setFlash('error', "An error occured during program deletion.");
                return false;
            }
            
        }
        else
        {
            Yii::$app->session->setFlash('error', "Record is assoiciated with NPO.");
            return false;
        }
        
        

        return $this->redirect(['index']);
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
                $programApplied = OrganizationProgram::findOne(['Program_Id' => $id]);
                if(empty($programApplied))
                {
                    $active = 'Deactivated';
                }
                else
                {
                    Yii::$app->session->setFlash('error', "Program is associated with NPO!");
                    echo false;
                    return false;
                }
            }
            
            Yii::$app->session->setFlash('success', $model->Program_Name.'  has been '.$active.' successfully!');
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
     * Finds the Program model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Program the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Program::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
