<?php

namespace backend\controllers;

use Yii;
use common\models\Ftat;
use common\models\FtatSearch;
use common\models\FtatTransaction;
use common\models\FtatQuestion;
use common\models\Email;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * FtatController implements the CRUD actions for Ftat model.
 */
class FtatController extends Controller
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
                        'actions' => ['index', 'cr eate', 'up date', 'fta', 'rating', 'status', 'view', 'delete', 'dashboard'],
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
     * Lists all Ftat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FtatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ftat model.
     * @param integer $id
     * @return mixed
     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }

    /**
     * Creates a new Ftat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new Ftat();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) 
//        {
//            
//            return $this->redirect(['index']);
//        } elseif (Yii::$app->request->isAjax) {
//             if ($model->load(Yii::$app->request->post())) {
//                Yii::$app->response->format = Response::FORMAT_JSON;
//                return \yii\widgets\ActiveForm::validate($model);
//            } else {
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
     * Updates an existing Ftat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->Ftat_Id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }
    
    public function actionFta($id)
    {
        if(!empty($id))
        {
            $ftat = FtatQuestion::find()->all();
            
            $ftatObj = Ftat::findOne(['Organization_Id' => (int)$id]);
            $prevData = FtatTransaction::find()->where(['Ftat_Id' => $ftatObj->Ftat_Id])->orderBy(['Ftat_Question_Id' => SORT_ASC])->all();
            
            return $this->render('ftat',
                [
                    'ftat' => $ftat,
                    'ftatObj' => $ftatObj,
                    'prevData' => $prevData
                ]);
        }
        else
        {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }
    
    
    public function actionRating($id)
    {
        if(!empty($id))
        {
            $ftat = FtatQuestion::find()->all();
            $ftatObj = Ftat::findOne(['Organization_Id' => (int)$id]);
            $prevData = FtatTransaction::find()->where(['Ftat_Id' => $ftatObj->Ftat_Id])->orderBy(['Ftat_Question_Id' => SORT_ASC])->all();
            
            return $this->render('rating-worksheet',
                [
                    'ftat' => $ftat,
                    'prevData' => $prevData
                ]);
        }
        else
        {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }
    public function actionDashboard($id)
    {
        if(!empty($id))
        {
            $ftat = FtatQuestion::find()->all();
            $ftatObj = Ftat::findOne(['Organization_Id' => (int)$id]);
            $fiscalYrs = [];
            if(!empty($ftatObj->Current_Fiscal_Year))
            {
                $fiscalYrs['currentYr'] =  date('Y', strtotime($ftatObj->Current_Fiscal_Year));
                $fiscalYrs['prev1'] =  date('Y', strtotime($ftatObj->Current_Fiscal_Year)) - 1;
                $fiscalYrs['prev2'] =  date('Y', strtotime($ftatObj->Current_Fiscal_Year)) - 2;
                $fiscalYrs['prev3'] =  date('Y', strtotime($ftatObj->Current_Fiscal_Year)) - 3;
            }
            
            
            $prevData = FtatTransaction::find()->where(['Ftat_Id' => $ftatObj->Ftat_Id])->orderBy(['Ftat_Question_Id' => SORT_ASC])->all();
            
            return $this->render('dashboard',
                [
                    'ftat' => $ftat,
                    'prevData' => $prevData,
                    'fiscalYrs' => $fiscalYrs,
                ]);
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
        
        if (!Yii::$app->request->isAjax) 
        {
            return $this->redirect(['index']);
        }
        
        if (!empty($id)) {
            
            $active = 'Accepted';
            
            $reject = Yii::$app->getRequest()->getQueryParam('reassign');
            $notes = Yii::$app->request->post('notes');
            $model = $this->findModel($id);

            if($reject)
            {
                $active = 'Reassigned';
                $model->Ftat_Status = 0;
                $model->Is_Accepted = 0;
                
            }
            else
            {
                $model->Is_Accepted = 1;
                $model->Ftat_Status = 1;
//                $calVal = (+$CurrYrRevenue - $Yr1Revenue)/$Yr1Revenue;
//                
////                =IF(
////                        (+CurrYrRevenue-Yr1Revenue)/Yr1Revenue="","",IF(
////                                (+CurrYrRevenue-Yr1Revenue)/Yr1Revenue>=P$3,O$3,IF((
////                                        +CurrYrRevenue-Yr1Revenue)/Yr1Revenue>=P$4,O$4,IF(
////                                                (+CurrYrRevenue-Yr1Revenue)/Yr1Revenue>=P$5,O$5,O$6)
////                                                )
////                                                )
////                                                )
//                
//                /**
//                 * Trends in Unrestricted Deficits or Surpluses
//                 */
//                if($calVal == "")
//                {
//                    echo 0;
//                }
//                else if($calVal >= 30/100 )
//                {
//                    echo 3;
//                }
//                else if($calVal >= 0 )
//                {
//                    echo 2;
//                }    
//                else if($calVal >= -20/100)
//                {
//                    echo 1;
//                }
//                else 
//                {
//                    echo 0;
//                }
//                
//                //                =IF(B8="","",IF(B8>=N$3,O$3,IF(B8>=N$4,O$4,IF(B8>=N$5,O$5,O$6))))
//                /**
//                 * Revenue Growth or Decline
//                 */
//                if($b8 == "" )
//                {
//                    echo "";
//                    
//                }
//                else if($b8 >= 25000)
//                {
//                    echo 3;
//                }
//                else if($b8 >= 0)
//                {
//                    echo 2;
//                }
//                
//                else if($b8 >= -25000)
//                {
//                    echo 1;
//                }
//                else 
//                {
//                    echo 0;
//                }
                

                
//                
            }

            
            
            
            if ($model->save()) 
            {
                if($reject)
                {
                    $email = [];
                    $email['slug'] = 'ftat-reassign-mail';
                    $email['{{npo}}'] = $model->organization->Organization_Name;
                    $email['{{email}}'] = $model->organization->Email;
                    $email['{{notes}}'] = $notes;
                    $mail = new Email();
                    $mail = $mail->sendEmail($email);
                }
                else
                {
                    $email = [];
                    $email['slug'] = 'ftat-accept-mail';
                    $email['{{npo}}'] = $model->organization->Organization_Name;
                    $email['{{email}}'] = $model->organization->Email;
                    $mail = new Email();
                    $mail = $mail->sendEmail($email);
                }
                Yii::$app->session->setFlash('success', $model->organization->Organization_Name . " FTAT has been $active successfully!");
                echo true;
            } else {
                echo false;
            }
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Ftat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }

    /**
     * Finds the Ftat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ftat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ftat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
