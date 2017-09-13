<?php

namespace frontend\controllers;

use Yii;
use common\models\QuestionMaster;
use common\models\Question;
use common\models\SurveyDetails;
use common\models\SurveyTransaction;
use common\models\AnswerMaster;
use common\models\Survey;
use common\models\UploadForm;
use common\models\OrganizationQuestion;
use common\models\Email;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\httpclient\Client;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;
use frontend\widgets\Alert;

class SurveyController extends \yii\web\Controller {
    public $surveyId;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                  
                    [
                        'actions' => ['index', 'preview', 'survey-submit', 'export', 'take-count', 'program', 'flash'],
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
    public function actionIndex($id = 0) {
        $this->CheckEligibility();
        $userId = Yii::$app->user->identity->User_Id;
        $userOrgId = Yii::$app->user->identity->Organization_Id;
        $survey = Survey::find()->where(['User_Id' => $userId])->all();
        
        $surveyId = 0;
        $total = 0;
        if(empty($survey))
        {
            
            $surveyModel = new Survey();
            $surveyModel->User_Id = $userId;
            $surveyModel->Organization_Id = $userOrgId;
            $surveyModel->Survey_Status = 1;
            $surveyModel->save();
            $survey = \common\models\Survey::find()->where(['User_Id' => $userId])->all();
            $this->surveyId = $surveyId = $survey[0]->Survey_Id;
            
            
            $allQues = QuestionMaster::findAll(['IsActive' => 1]); 
            foreach($allQues as $ques)
            {
                $orgQuesMap = new \common\models\OrgQuestionMapping();
                $orgQuesMap->Question_Id = $ques->Question_Id;
                $orgQuesMap->Organization_Id = $userOrgId;
                $orgQuesMap->save();
                
                $objQues = new SurveyDetails();
                $objQues->Question_Id = $ques->Question_Id;
                $objQues->Survey_Id = $surveyId;
                $objQues->Answers = ' ';
                $objQues->save();
            }
        }
        else
        {
            $survey = \common\models\Survey::find()->where(['User_Id' => $userId])->all();
            $this->surveyId = $surveyId = $survey[0]->Survey_Id;
        }
        
        if (!empty($id)) 
        {
            
            $request = Yii::$app->request->post();
            
            $limit = 3;

            if (Yii::$app->request->isAjax) {
                $this->layout = false;
            }
            
            $questionCount = new QuestionMaster();
//            $questionCount = $questionCount->getQuestionNo($userOrgId, 1);
            $questionCount = 0;
            
            if(is_array($questionCount))
            {
                foreach($questionCount[0] as $tot)
                    $total = $tot;
            }
            
            $offset = (int) ($id - 1) * 3;

            

            if (Yii::$app->request->isPost) {
                
//                prd($request);
                
                $surveyModel =  Survey::findOne($request['SurveyId']);
                
                if($surveyModel->Survey_Status != 3)
                {
                    $surveyModel->Survey_Status = 2;
                    $surveyModel->save();


                    foreach ($request as $quesMasterId => $answerArr) {

                        if ($quesMasterId == 'AnswerOptions') {

                            foreach ($answerArr as $quesId => $ansArr) {
                                $checkboxes = [];
                                if (is_numeric($quesId)) {
                                    $inputText = '';
                                    
//                                    prd($ansArr);
                                    
                                    foreach ($ansArr as $ansId => $ansVal) 
                                    {
                                        /**
                                         * Getting Question Details 
                                         */
                                        $questionObj = Question::findOne(['Question_Id' => $quesId]);
                                        // Question Type details 
                                        $controlType = strtolower($questionObj->controlType->Control_Type_Name); 
                                        
                                        /*
                                         * If Question is grid type 
                                         */
                                        if($controlType == "grid")
                                        {
                                            
                                            if(!empty($ansVal))
                                            {
                                                
                                                foreach($ansVal as $colId => $colVal)
                                                {
//                                                    prd($quesId);
                                                    $condition = [
                                                        'Question_Id' => $quesId,
                                                        'Answer_Id' => $ansId,
                                                        'Survey_Id' => $request['SurveyId']
                                                    ];
                                                    if(($surveyTranObj = SurveyTransaction::findOne($condition)) !== null)
                                                    {

                                                    }    
                                                    else
                                                    {
                                                        $surveyTranObj = new SurveyTransaction();
                                                    }        

                                                    $surveyTranObj->Survey_Id = $request['SurveyId'];
                                                    $surveyTranObj->Question_Id = $quesId;


                                                    $surveyTranObj->Answer_Id = $ansId;
                                                    $surveyTranObj->Answer_Value = $colVal;
                                                    $surveyTranObj->User_Id = $userId;
                                                    $surveyTranObj->Organization_Id = $userOrgId;
                                                    $surveyTranObj->Answer_Type = "grid";
                                                    $surveyTranObj->Category_Id = $questionObj->Category_Id;
                                                    $surveyTranObj->save();
//                                                    prd($surveyTranObj);
                                                }
                                                continue; 
                                            }
                                            else
                                            {
                                                continue;
                                            }
                                            
                                        }
                                        
                                        if($controlType == 'checkbox')
                                        {
                                            $checkboxes[] = $ansId; 
                                        }
                                        
                                        if ($ansId == '"radio"' || $controlType == 'selectbox') 
                                        {
                                            $ansId = $ansVal;
                                            $condition = [
                                                'Question_Id' => $quesId,
                                                'Survey_Id' => $request['SurveyId']
                                            ];
                                        } else {
                                            $condition = [
                                                'Question_Id' => $quesId,
                                                'Answer_Id' => $ansId,
                                                'Survey_Id' => $request['SurveyId']
                                            ];
                                        }

                                        if(($surveyTranObj = SurveyTransaction::findOne($condition)) !== null)
                                        {
                                            
                                        }    
                                        else
                                        {
                                            $surveyTranObj = new SurveyTransaction();
                                        }        
                                        
                                        $surveyTranObj->Survey_Id = $request['SurveyId'];
                                        $surveyTranObj->Question_Id = $quesId;
                                        
                                         
                                        $surveyTranObj->Answer_Id = $ansId;
                                        $surveyTranObj->Answer_Value = $ansVal;
                                        $surveyTranObj->User_Id = $userId;
                                        $surveyTranObj->Organization_Id = $userOrgId;
                                        $surveyTranObj->Answer_Type = ($controlType == "grid") ? 'grid' :  'normal';
                                        $surveyTranObj->Category_Id = $questionObj->Category_Id;
                                        $surveyTranObj->save();
                                    }
                                    
                                    if($controlType == 'checkbox')
                                    {
                                        SurveyTransaction::deleteAll(['and', 'Question_Id = :Question_Id', ['not in', 'Answer_Id', $checkboxes]], [':Question_Id' => $quesId]);
                                    }
                                    
                                }
                            }
                        }
                    }
                }
            }
            
            
            
            

//            echo $userOrgId;
            $questions = Question::find()->where(['Is_Active' => 1])
                    ->limit($limit)
                    ->offset($offset)
                    ->with('answers.surveyTransactions','gridAnswers.gridAnswerColumns')
                    ->all();

            
            $surveyDetails = new SurveyDetails();

            $questionLeft = [];

            return $this->render('questions', [
                        'questions' => $questions,
                        'id' => $id,
                        'limit' => $offset,
                        'total' => 14,
                        'survey' => $survey,
                        'questionLeft' => 0
            ]);

        }
        return $this->render('index');
    }
    
    public function actionProgram($programId = 0, $surveyIndex = 0)
    {
        $this->CheckEligibility();
        $programId = (int) Yii::$app->request->get('id');
        $id = (int) Yii::$app->request->get('program');
        $userId = Yii::$app->user->identity->User_Id;
        $userOrgId = Yii::$app->user->identity->Organization_Id;
      
        $survey = Survey::findone(['Organization_Id' => $userOrgId, 'Program_Id' => $programId ]);
        
        
        if(!empty($survey))
        {
            $this->surveyId = $surveyId = $survey->Survey_Id;
            
            if (!empty($id)) 
            {

                $request = Yii::$app->request->post();

                $limit = 3;

                if (Yii::$app->request->isAjax) {
                    $this->layout = false;
                }

                $questionCount = new QuestionMaster();
    //            $questionCount = $questionCount->getQuestionNo($userOrgId, 1);
                $questionCount = 0;

                if(is_array($questionCount))
                {
                    foreach($questionCount[0] as $tot)
                        $total = $tot;
                }

                $offset = (int) ($id - 1) * 3;



                if (Yii::$app->request->isPost) 
                {

    //                prd($request);

                    $surveyModel =  Survey::findOne($request['SurveyId']);

                    if($surveyModel->Survey_Status != 3)
                    {
                        $surveyModel->Survey_Status = 2;
                        $surveyModel->save();


                        foreach ($request as $quesMasterId => $answerArr) {

                            if ($quesMasterId == 'AnswerOptions') {

                                foreach ($answerArr as $quesId => $ansArr) {
                                    $checkboxes = [];
                                    if (is_numeric($quesId)) {
                                        $inputText = '';

    //                                    prd($ansArr);

                                        foreach ($ansArr as $ansId => $ansVal) 
                                        {
                                            /**
                                             * Getting Question Details 
                                             */
                                            $questionObj = Question::findOne(['Question_Id' => $quesId]);
                                            // Question Type details 
                                            $controlType = strtolower($questionObj->controlType->Control_Type_Name); 

                                            /*
                                             * If Question is grid type 
                                             */
                                            if($controlType == "grid")
                                            {

                                                if(!empty($ansVal))
                                                {

                                                    foreach($ansVal as $colId => $colVal)
                                                    {
    //                                                    prd($quesId);
                                                        $condition = [
                                                            'Question_Id' => $quesId,
                                                            'Answer_Id' => $ansId,
                                                            'Survey_Id' => $request['SurveyId']
                                                        ];
                                                        if(($surveyTranObj = SurveyTransaction::findOne($condition)) !== null)
                                                        {

                                                        }    
                                                        else
                                                        {
                                                            $surveyTranObj = new SurveyTransaction();
                                                        }        

                                                        $surveyTranObj->Survey_Id = $request['SurveyId'];
                                                        $surveyTranObj->Question_Id = $quesId;


                                                        $surveyTranObj->Answer_Id = $ansId;
                                                        $surveyTranObj->Answer_Value = $colVal;
                                                        $surveyTranObj->User_Id = $userId;
                                                        $surveyTranObj->Organization_Id = $userOrgId;
                                                        $surveyTranObj->Answer_Type = "grid";
                                                        $surveyTranObj->Category_Id = $questionObj->Category_Id;
                                                        $surveyTranObj->save();
                                                        Yii::$app->session->setFlash('success', 'Questionnaire have been saved successfully!');
    //                                                    prd($surveyTranObj);
                                                    }
                                                    continue; 
                                                }
                                                else
                                                {
                                                    continue;
                                                }

                                            }

                                            if($controlType == 'checkbox')
                                            {
                                                $checkboxes[] = $ansId; 
                                            }

                                            if ($ansId == '"radio"' || $controlType == 'selectbox') 
                                            {
                                                $ansId = $ansVal;
                                                $condition = [
                                                    'Question_Id' => $quesId,
                                                    'Survey_Id' => $request['SurveyId']
                                                ];
                                            } else {
                                                $condition = [
                                                    'Question_Id' => $quesId,
                                                    'Answer_Id' => $ansId,
                                                    'Survey_Id' => $request['SurveyId']
                                                ];
                                            }

                                            if(($surveyTranObj = SurveyTransaction::findOne($condition)) !== null)
                                            {

                                            }    
                                            else
                                            {
                                                $surveyTranObj = new SurveyTransaction();
                                            }        

                                            $surveyTranObj->Survey_Id = $request['SurveyId'];
                                            $surveyTranObj->Question_Id = $quesId;


                                            $surveyTranObj->Answer_Id = $ansId;
                                            $surveyTranObj->Answer_Value = $ansVal;
                                            $surveyTranObj->User_Id = $userId;
                                            $surveyTranObj->Organization_Id = $userOrgId;
                                            $surveyTranObj->Answer_Type = ($controlType == "grid") ? 'grid' :  'normal';
                                            $surveyTranObj->Category_Id = $questionObj->Category_Id;
                                            $surveyTranObj->save();
                                            Yii::$app->session->setFlash('success', 'Questionnaire have been saved successfully!');
                                        }

                                        if($controlType == 'checkbox')
                                        {
                                            SurveyTransaction::deleteAll(['and', 'Question_Id = :Question_Id', ['not in', 'Answer_Id', $checkboxes]], [':Question_Id' => $quesId]);
                                        }

                                    }
                                }
                            }
                        }
                    }
                }



                
                $questionMaped = OrganizationQuestion::find()->where([ 'Organization_Id' => $userOrgId, 'Program_Id' => $programId  ])->all();
                $questionMaped = ArrayHelper::map($questionMaped, 'Question_Id', 'Question_Id');
                
                
                
                $questions = Question::find()->where(['Is_Active' => 1, 'Question_Id' => $questionMaped])
                        ->limit($limit)
                        ->offset($offset)
                        ->with('organizationQuestions')
                        ->with(['answers.surveyTransactions' => function (\yii\db\ActiveQuery $query) {
                                    $query->andWhere("Survey_Id = $this->surveyId");
                                },'gridAnswers.gridAnswerColumns'])
                        ->all();
                
                

                $surveyDetails = new SurveyDetails();

                $questionLeft = [];

                return $this->render('questions', [
                            'questions' => $questions,
                            'id' => $id,
                            'programId' => $programId, 
                            'limit' => $offset,
                            'total' => count($questionMaped),
                            'survey' => $survey,
                            'questionLeft' => 0
                ]);

            }
        }
        
        return $this->render('index');
    }

    public function actionTakeSurvey() {
        return $this->render('take-survey');
    }

    public function actionViewSurvey() {
        return $this->render('view-survey');
    }
    public function actionSurveySubmit($id = 0) 
    {
        $this->CheckEligibility();
        if (Yii::$app->request->isPost) {
            
            $request = Yii::$app->request->post();
            if(!empty($request['id']))
            {
                $model = Survey::findOne($request['id']);
                $model->Survey_Status = 3;
                $email = [];
                $email['slug'] = 'complete-survey';
                $email['{{npo}}'] = $model->organization->Organization_Name;
                $email['{{program}}'] = $model->program->Program_Name;
                $email['{{email}}'] = Yii::$app->params['adminEmail'];
                $mail = new Email();
                $mail = $mail->sendEmail($email);
                $model->save();
            }
            
                

            return 1;
        } else {
            echo 0;
        }
    }
    

    public function actionPreview($id = 0) 
    {
        $this->CheckEligibility();
        $programId = (int) Yii::$app->request->get('id');
        
        $userId = Yii::$app->user->identity->User_Id;
        $userOrgId = Yii::$app->user->identity->Organization_Id;
      
        $survey = Survey::findone(['Organization_Id' => $userOrgId, 'Program_Id' => $programId ]);
        $limit = 0;
        $offset = 3;
        $surveyId = 0;
        if(!empty($survey))
        {
            $this->surveyId = $surveyId = $survey->Survey_Id;
        }
        else
        {
//            prd($survey);
        }
        
        if (Yii::$app->request->isPost) {
            if (Yii::$app->request->isPost) 
            {

//                prd($request);
                $request = Yii::$app->request->post();
                $surveyModel =  Survey::findOne($request['SurveyId']);

                if($surveyModel->Survey_Status != 3)
                {
                    $surveyModel->Survey_Status = 2;
                    $surveyModel->save();


                    foreach ($request as $quesMasterId => $answerArr) {

                        if ($quesMasterId == 'AnswerOptions') {

                            foreach ($answerArr as $quesId => $ansArr) {
                                $checkboxes = [];
                                if (is_numeric($quesId)) {
                                    $inputText = '';

//                                    prd($ansArr);

                                    foreach ($ansArr as $ansId => $ansVal) 
                                    {
                                        /**
                                         * Getting Question Details 
                                         */
                                        $questionObj = Question::findOne(['Question_Id' => $quesId]);
                                        // Question Type details 
                                        $controlType = strtolower($questionObj->controlType->Control_Type_Name); 

                                        /*
                                         * If Question is grid type 
                                         */
                                        if($controlType == "grid")
                                        {

                                            if(!empty($ansVal))
                                            {

                                                foreach($ansVal as $colId => $colVal)
                                                {
//                                                    prd($quesId);
                                                    $condition = [
                                                        'Question_Id' => $quesId,
                                                        'Answer_Id' => $ansId,
                                                        'Survey_Id' => $request['SurveyId']
                                                    ];
                                                    if(($surveyTranObj = SurveyTransaction::findOne($condition)) !== null)
                                                    {

                                                    }    
                                                    else
                                                    {
                                                        $surveyTranObj = new SurveyTransaction();
                                                    }        

                                                    $surveyTranObj->Survey_Id = $request['SurveyId'];
                                                    $surveyTranObj->Question_Id = $quesId;


                                                    $surveyTranObj->Answer_Id = $ansId;
                                                    $surveyTranObj->Answer_Value = $colVal;
                                                    $surveyTranObj->User_Id = $userId;
                                                    $surveyTranObj->Organization_Id = $userOrgId;
                                                    $surveyTranObj->Answer_Type = "grid";
                                                    $surveyTranObj->Category_Id = $questionObj->Category_Id;
                                                    $surveyTranObj->save();
                                                    Yii::$app->session->setFlash('success', 'Questionnaire have been saved successfully!');
//                                                    prd($surveyTranObj);
                                                }
                                                continue; 
                                            }
                                            else
                                            {
                                                continue;
                                            }

                                        }

                                        if($controlType == 'checkbox')
                                        {
                                            $checkboxes[] = $ansId; 
                                        }

                                        if ($ansId == '"radio"' || $controlType == 'selectbox') 
                                        {
                                            $ansId = $ansVal;
                                            $condition = [
                                                'Question_Id' => $quesId,
                                                'Survey_Id' => $request['SurveyId']
                                            ];
                                        } else {
                                            $condition = [
                                                'Question_Id' => $quesId,
                                                'Answer_Id' => $ansId,
                                                'Survey_Id' => $request['SurveyId']
                                            ];
                                        }

                                        if(($surveyTranObj = SurveyTransaction::findOne($condition)) !== null)
                                        {

                                        }    
                                        else
                                        {
                                            $surveyTranObj = new SurveyTransaction();
                                        }        

                                        $surveyTranObj->Survey_Id = $request['SurveyId'];
                                        $surveyTranObj->Question_Id = $quesId;


                                        $surveyTranObj->Answer_Id = $ansId;
                                        $surveyTranObj->Answer_Value = $ansVal;
                                        $surveyTranObj->User_Id = $userId;
                                        $surveyTranObj->Organization_Id = $userOrgId;
                                        $surveyTranObj->Answer_Type = ($controlType == "grid") ? 'grid' :  'normal';
                                        $surveyTranObj->Category_Id = $questionObj->Category_Id;
                                        $surveyTranObj->save();
                                        Yii::$app->session->setFlash('success', 'Questionnaire have been saved successfully!');
                                    }

                                    if($controlType == 'checkbox')
                                    {
                                        SurveyTransaction::deleteAll(['and', 'Question_Id = :Question_Id', ['not in', 'Answer_Id', $checkboxes]], [':Question_Id' => $quesId]);
                                    }

                                }
                            }
                        }
                    }
                }
            }
        }
        
        $questionMaped = OrganizationQuestion::find()->where([ 'Organization_Id' => $userOrgId, 'Program_Id' => $programId  ])->all();
        $questionMaped = ArrayHelper::map($questionMaped, 'Question_Id', 'Question_Id');



        $questions = Question::find()->where(['Is_Active' => 1, 'Question_Id' => $questionMaped])
                ->with('organizationQuestions')
                ->with(['answers.surveyTransactions' => function (\yii\db\ActiveQuery $query) {
                            $query->andWhere("Survey_Id = $this->surveyId");
                        },'gridAnswers.gridAnswerColumns'])
                ->all();
                        
        $surveyDetails = new SurveyDetails();
//        $questionLeft = $surveyDetails->getUnAttemptedQues($surveyId);
        $questionLeft = [];
        
        return $this->render('preview', [
                    'questions' => $questions,
                    'id' => $id,
                    'limit' => 0,
                    'programId' => $programId, 
                    'total' => count($questionMaped),
                    'survey' => $survey,
                    'questionLeft' => $questionLeft
                    
        ]);

    }

    public function actionExport() {
        $this->CheckEligibility();
        $programId = (int) Yii::$app->request->get('id');
        
        $userId = Yii::$app->user->identity->User_Id;
        $userOrgId = Yii::$app->user->identity->Organization_Id;
      
        $survey = Survey::findone(['Organization_Id' => $userOrgId, 'Program_Id' => $programId ]);
        $surveyId = 0;
        if(!empty($survey))
        {
//            prd($survey);
            $this->surveyId = $surveyId = $survey->Survey_Id;
        }
        $questionMaped = OrganizationQuestion::find()->where([ 'Organization_Id' => $userOrgId, 'Program_Id' => $programId  ])->all();
        $questionMaped = ArrayHelper::map($questionMaped, 'Question_Id', 'Question_Id');
         $questions = Question::find()->where(['Is_Active' => 1, 'Question_Id' => $questionMaped])
                ->with('organizationQuestions')
                ->with(['answers.surveyTransactions' => function (\yii\db\ActiveQuery $query) {
                            $query->andWhere("Survey_Id = $this->surveyId");
                        },'gridAnswers.gridAnswerColumns'])
                ->all();
        
        // get your HTML raw content without any layouts or scripts
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('export', [
                'questions' => $questions,
                'id' => 0,
                'limit' => 0,
                'programId' => $programId, 
                'total' => count($questionMaped),
                'survey' => $survey,
            ]),
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'options' => [
                'title' => 'YouthInc',
                'subject' => 'Survey Report Generation'
            ],
            'methods' => [
                'SetHeader' => ['YouthInc Survey Report||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return @$pdf->render();
                    
         
    }
    
    public function actionCheckSurvey_Status()
    {
        $userId = Yii::$app->user->identity->User_Id;
        $userOrgId = Yii::$app->user->identity->Organization_Id;
        $survey = \common\models\Survey::find()->where(['User_Id' => $userId])->all();
        $surveyId = $survey[0]->Survey_Id;
        $surveyDetails = new SurveyDetails();
        $surveyDetails->getUnAttemptedQues($surveyId);
    }
    
    public function actionTakeCount()
    {
        if (Yii::$app->request->isPost) {
            $request = Yii::$app->request->post();
            $surveyId = $request['surveyId'];
            $surveyDetails = new SurveyDetails();
            $questionLeft = $surveyDetails->getUnAttemptedQues($surveyId);
            echo ($questionLeft['questions']);
        }
        
    }
    
    public  function CheckEligibility()
    {
        $userDetails = Yii::$app->user->identity;
        
        if($userDetails->organization->Status == 2)
        {
            return $this->redirect(['organization/declined']);
        }
    }
    
    /**
     * Status Action
     */
    public function actionFlash() {
        echo Alert::widget();
    }

}

