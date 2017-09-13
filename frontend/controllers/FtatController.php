<?php

namespace frontend\controllers;

use Yii;

use yii\web\Controller;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


use frontend\widgets\Alert;
use yii\widgets\ActiveForm;


use common\models\Program;
use common\models\ProgramPartner;
use common\models\OrganizationProgram;
use common\models\OrganizationProgramType;
use common\models\Ftat;
use common\models\FtatTransaction;
use common\models\FtatQuestion;
use common\models\Email;





class FtatController extends Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['index', 'ftat-submit', 'save'],
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
    public function actionIndex($id = 0)
    {

        $currentUser = Yii::$app->user->identity;
        $orgId = $currentUser->Organization_Id;
        $ftat = FtatQuestion::find()->all();
        $ftatObj = Ftat::findOne(['Organization_Id' => $orgId]);
        
        if(!empty($ftatObj))
            $prevData = FtatTransaction::find()->where(['Ftat_Id' => $ftatObj->Ftat_Id])->orderBy(['Ftat_Question_Id' => SORT_ASC])->all();
        else
        {
            $prevData = [];
            if(empty($ftatObj))
            {

                $ftatObj = new Ftat();
                $ftatObj->Organization_Id = $orgId;
                $ftatObj->Ftat_Status = 0; // "save"
                $ftatObj->save();
                $ftatObj = Ftat::findOne(['Organization_Id' => $orgId]);
            }
                
        }
        
        $request = Yii::$app->request->post('FTAT');
        if (Yii::$app->request->isPost) 
        {
            if(is_array($request))
            {
                /**
                 * First time initiated
                 */
                
                
                
                foreach($request as $rowId => $values)
                {
                    
                    
                    if(is_numeric($rowId))
                    {
                        
                        if(($oldFtatTranction = FtatTransaction::findOne(['Ftat_Id' => $ftatObj->Ftat_Id, 'Ftat_Question_Id' => $rowId])) !== null)
                        {
                            $ftatTranction = $oldFtatTranction;
                            
                        }
                        else
                        {
                            $ftatTranction = new FtatTransaction();
                        }
                        
                        
                        $ftatTranction->Ftat_Id = $ftatObj->Ftat_Id;
                        $ftatTranction->Ftat_Question_Id = $rowId;
                        
                        foreach($values as $columnNo => $index)
                        {
                            
                            $yearProp = 'Prev_'.$columnNo.'yrs_Stat';
                            
                            
                            if($columnNo <= 3 && !empty($columnNo))
                            {
                                $ftatTranction->$yearProp  = $index;
                            }
                            elseif(empty($columnNo))
                            {
                                $ftatTranction->Description  = $index;
                            }
                            else
                            {
                                $ftatTranction->Curr_Yr_Stat  = $index;
                            }
                            
                            
                        }
                        
                        if(!$ftatTranction->save())
                        {
                            Yii::$app->session->setFlash('error', ' There is error occurred durign saving of data!');
                        }
                    }
                    else
                    {
                        if($rowId =='Current_Fiscal_Year')
                        {
                            $ftatObj = Ftat::findOne(['Organization_Id' => $orgId]);
                            $ftatObj->Current_Fiscal_Year = date('Y-m-d', strtotime($values[4])); // "save"
                            $ftatObj->save();
                            
                        }
                    }
                    
                }
                
                Yii::$app->session->setFlash('success', ' Financial Trends Analysis Tool has been saved successfully!');
                
                
                $this->redirect(['ftat/index']);
            }
        }
  
        return  $this->render('ftat', [
                    'ftat' => $ftat,
                    'prevData' => $prevData,
                    'ftatObj' => $ftatObj,
                ]);
    }
    
    /**
     * This method will save FTA data and after saving data 
     * it will redirect to FTA page 
     */
    public function actionSave()
    {
        $currentUser = Yii::$app->user->identity;
        $orgId = $currentUser->Organization_Id;
        $ftat = FtatQuestion::find()->all();
        $ftatObj = Ftat::findOne(['Organization_Id' => $orgId]);
        
        if(!empty($ftatObj))
            $prevData = FtatTransaction::find()->where(['Ftat_Id' => $ftatObj->Ftat_Id])->orderBy(['Ftat_Question_Id' => SORT_ASC])->all();
        else
        {
            $prevData = [];
            if(empty($ftatObj))
            {

                $ftatObj = new Ftat();
                $ftatObj->Organization_Id = $orgId;
                $ftatObj->Ftat_Status = 0; // "save"
                $ftatObj->Created_Date = date('Y-m-d H:i:s');
                $ftatObj->Last_Modified_Date = date('Y-m-d H:i:s');
                $ftatObj->save();
                $ftatObj = Ftat::findOne(['Organization_Id' => $orgId]);
            }
                
        }
        
        
        $request = Yii::$app->request->post('FTAT');
        if (Yii::$app->request->isPost) 
        {
            if(is_array($request))
            {
                /**
                 * First time initiated
                 */
                
                
                foreach($request as $rowId => $values)
                {
                    
                    
                    if(is_numeric($rowId))
                    {
                        
                        if(($oldFtatTranction = FtatTransaction::findOne(['Ftat_Id' => $ftatObj->Ftat_Id, 'Ftat_Question_Id' => $rowId])) !== null)
                        {
                            $ftatTranction = $oldFtatTranction;
                            
                        }
                        else
                        {
                            $ftatTranction = new FtatTransaction();
                        }
                        
                        
                        $ftatTranction->Ftat_Id = $ftatObj->Ftat_Id;
                        $ftatTranction->Ftat_Question_Id = $rowId;
                        
                        foreach($values as $columnNo => $index)
                        {
                            
                            $yearProp = 'Prev_'.$columnNo.'yrs_Stat';
                            
                            
                            if($columnNo <= 3 && !empty($columnNo))
                            {
                                $ftatTranction->$yearProp  = $index;
                            }
                            elseif(empty($columnNo))
                            {
                                $ftatTranction->Description  = $index;
                            }
                            else
                            {
                                $ftatTranction->Curr_Yr_Stat  = $index;
                            }
                            
                            
                        }
                        
                        if(!$ftatTranction->save())
                        {
                            Yii::$app->session->setFlash('error', ' There is error occurred durign saving of data!');
                        }
                    }
                    else
                    {
                        if($rowId =='Current_Fiscal_Year')
                        {
                            $ftatObj = Ftat::findOne(['Organization_Id' => $orgId]);
                            $ftatObj->Current_Fiscal_Year = date('Y-m-d', strtotime($values[4])); // "save"
                            $ftatObj->save();
                            
                        }
                    }
                    
                }
                
                Yii::$app->session->setFlash('success', ' Financial Trends Analysis Tool has been saved successfully!');
                
                
                $this->redirect(['ftat/index']);
            }
        }
        $this->redirect(['ftat/index']);
    }
    
    
    public function actionFtatSubmit()
    {
        $currentUser = Yii::$app->user->identity;
        $orgId = $currentUser->Organization_Id;
        $ftatObj = Ftat::findOne(['Organization_Id' => $orgId]);
        $ftatObj->Ftat_Status = 1; // "save"
        $ftatObj->Last_Modified_Date = date('Y-m-d H:i:s');
        if($ftatObj->save())
        {
            Yii::$app->session->setFlash('success', ' Financial Trends Analysis Tool has been submited successfully!');
            $email = [];
            $email['slug'] = 'ftat-submit';
            $email['{{npo}}'] = $currentUser->organization->Organization_Name;
            $email['{{email}}'] = Yii::$app->params['adminEmail'];
            $mail = new Email();
            $mail = $mail->sendEmail($email);
        }
        
        echo 1;
    }
    
}
