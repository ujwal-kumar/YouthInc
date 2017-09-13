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
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\filters\AccessControl;
use yii\httpclient\Client;
use kartik\mpdf\Pdf;

class SurveyController extends \yii\web\Controller {
    public $surveyId;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                  
                    [
                        'actions' => ['index', 'preview', 'survey-submit', 'export', 'take-count', 'program'],
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
            $surveyModel->Survey_Status = 'Initiated';
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
                
                if($surveyModel->Survey_Status != 'Completed')
                {
                    $surveyModel->Survey_Status = 'InProgress';
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
                                    
//                                    $inputText = rtrim($inputText, ',');
//
//                                    $answers = rtrim(implode(',', $ansArr), ',');
//    //                                pr($request['AnswerOptions']['DetailsId'][$quesId]);
////                                    prd($inputText);
//                
//                                    $serveyDetails = new SurveyDetails();
//                                    if (!empty($request['AnswerOptions']['DetailsId'][$quesId]))
//                                        $serveyDetails = SurveyDetails::findOne($request['AnswerOptions']['DetailsId'][$quesId]);
//                                    $serveyDetails->Question_Id = $quesId;
//                                    $serveyDetails->Answers = trim((!empty($inputText)) ? $inputText : $answers);
//                                    $serveyDetails->Survey_Id = $request['SurveyId'];
//                                    $serveyDetails->FilePath = NULL;
//                                    $serveyDetails->save();

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
//                    ->joinWith([
//                        'surveyTransactions' => function (\yii\db\ActiveQuery $query) {
//                            $query->where(['Survey_Id' => $this->surveyId]);
//                        }
//                    ], true, 'RIGHT JOIN')
                    ->with('answers.surveyTransactions','gridAnswers.gridAnswerColumns')
                    ->all();
//            prd($questions);
            
//            $questions1 = Question::find()->where(['Is_Active' => 1])
//                    ->limit($limit)
//                    ->offset($offset)
//                    ->with('answers.surveyTransactions','gridAnswers.gridAnswerColumns')
//                    ->all();
//            prd($questions1);
//             echo $questions->createCommand()->sql;
            
//            prd($questions);
            
//            $questions = \common\models\QuestionMaster::find()->where(['IsActive' => 1])
//                    ->limit($limit)
//                    ->offset($offset)
//                    ->joinWith(['orgQuestionMappings oqm'], true, 'INNER JOIN')->where(['oqm.Organization_Id' => $userOrgId])
////                    ->with('surveyDetails')
//                    ->joinWith([
//                        'surveyDetails' => function (\yii\db\ActiveQuery $query) {
//                            $query->where(['Survey_Id' => $this->surveyId]);
//                        }
//                    ])
//
//                    ->with('answerMasters')
//                    ->all();
//            $questions = Question::find()->where(['Is_Active' => 1])
//                    ->limit($limit)
//                    ->offset($offset)
//                    ->joinWith(['orgQuestionMappings oqm'], true, 'INNER JOIN')->where(['oqm.Organization_Id' => $userOrgId])
////                    ->with('surveyDetails')
//                    ->joinWith([
//                        'surveyDetails' => function (\yii\db\ActiveQuery $query) {
//                            $query->where(['Survey_Id' => $this->surveyId]);
//                        }
//                    ])
//
//                    ->with('answerMasters')
//                    ->all();
//            $questions = \common\models\QuestionMaster::find()->where(['IsActive' => 1])
//                    ->limit($limit)
//                    ->offset($offset)
//                    ->joinWith(['orgQuestionMappings oqm'], true, 'INNER JOIN')->where(['oqm.Organization_Id' => $userOrgId])
////                    ->with('surveyDetails')
//                    ->joinWith([
//                        'surveyDetails' => function (\yii\db\ActiveQuery $query) {
//                            $query->where(['Survey_Id' => $this->surveyId]);
//                        }
//                    ])
//
//                    ->with('answerMasters')
//                    ->all();
            
//            echo $this->surveyId;
//            prd($questions);
            
            $surveyDetails = new SurveyDetails();
//            $questionLeft = $surveyDetails->getUnAttemptedQues($surveyId);
            $questionLeft = [];
//            echo $total;
            return $this->render('questions', [
                        'questions' => $questions,
                        'id' => $id,
                        'limit' => $offset,
                        'total' => 14,
                        'survey' => $survey,
                        'questionLeft' => 0
            ]);
//            die($id);
        }
        return $this->render('index');
    }
    
    public function actionProgram($id = 0)
    {
        $userId = Yii::$app->user->identity->User_Id;
        $userOrgId = Yii::$app->user->identity->Organization_Id;
        $programId = $id;
        
        $survey = Survey::find()->where(['Organization_Id' => $userOrgId, 'Program_Id' => $programId ])->all();
        
        if(!empty($survey))
        {
            
        }
        
    }

    public function actionTakeSurvey() {
        return $this->render('take-survey');
    }

    public function actionViewSurvey() {
        return $this->render('view-survey');
    }
    public function actionSurveySubmit($id = 0) 
    {
        if (Yii::$app->request->isPost) {
            
            $request = Yii::$app->request->post();
            if(!empty($request['id']))
            {
                $model = Survey::findOne($request['id']);
                $model->Survey_Status = 'Completed';

                $model->save();
            }
            
                

            return 1;
        } else {
            echo 0;
        }
    }
    

    public function actionPreview($id = 0) {
        $limit = 3;
        $total = 0;
        $userId = Yii::$app->user->identity->User_Id;
        $userOrgId = Yii::$app->user->identity->Organization_Id;
        $survey = \common\models\Survey::find()->where(['User_Id' => $userId])->all();
        $surveyId = 0;
        if(!empty($survey))
        {
//            prd($survey);
            $this->surveyId = $surveyId = $survey[0]->Survey_Id;
        }
        else
        {
//            prd($survey);
        }
        
        if (Yii::$app->request->isPost) {
            $request = Yii::$app->request->post();

            $limit = 3;

            if (Yii::$app->request->isAjax) {
                $this->layout = false;
            }
            $total = 0;
            $questionCount = new QuestionMaster();
            $questionCount = $questionCount->getQuestionNo(1, 1);

            if(is_array($questionCount))
            {
                foreach($questionCount[0] as $tot)
                    $total = $tot;
            }

            $offset = (int) ($id - 1) * 3;



            if (Yii::$app->request->isPost) {
//                    prd($this->surveyId);

                foreach ($request as $quesMasterId => $answerArr) {

                    if ($quesMasterId == 'AnswerOptions') {

                        foreach ($answerArr as $quesId => $ansArr) {
                            if (is_numeric($quesId)) {
                                $inputText = '';
                                foreach ($ansArr as $ansType => $ansVal) {
                                    if (!is_numeric($ansType) && $ansType != '"radio"') {
                                        $inputText .= $ansType . $ansVal . ',';
                                    }
                                }
                                $inputText = rtrim($inputText, ',');

                                $answers = rtrim(implode(',', $ansArr), ',');
    //                                pr($request['AnswerOptions']['DetailsId'][$quesId]);
    //                                prd($answers);

                                $serveyDetails = new SurveyDetails();
                                if (!empty($request['AnswerOptions']['DetailsId'][$quesId]))
                                    $serveyDetails = SurveyDetails::findOne($request['AnswerOptions']['DetailsId'][$quesId]);
                                $serveyDetails->Question_Id = $quesId;
                                $serveyDetails->Answers = trim((!empty($inputText)) ? $inputText : $answers);
                                $serveyDetails->Survey_Id = $this->surveyId;
                                $serveyDetails->FilePath = NULL;
                                $serveyDetails->save();
                            }
                        }
                    }
                }
            }
        }
        
        $questions = \common\models\QuestionMaster::find()->where(['IsActive' => 1])
                    
                    ->joinWith(['orgQuestionMappings oqm'], true, 'INNER JOIN')->where(['oqm.Organization_Id' => $userOrgId])
//                    ->with('surveyDetails')
                    ->joinWith([
                        'surveyDetails' => function (\yii\db\ActiveQuery $query) {
                            $query->where(['Survey_Id' => $this->surveyId]);
                        }
                    ])

                    ->with('answerMasters')
                    ->all();
        $survey = \common\models\Survey::find()->where(['User_Id' => Yii::$app->user->identity->User_Id])->all();
        $surveyDetails = new SurveyDetails();
        $questionLeft = $surveyDetails->getUnAttemptedQues($surveyId);
        return $this->render('preview', [
                    'questions' => $questions,
                    'id' => $id,
                    'limit' => 0,
                    'total' => $total,
                    'survey' => $survey,
                    'questionLeft' => $questionLeft
                    
        ]);

    }

    public function actionExport() {
        $userId = Yii::$app->user->identity->User_Id;
        $userOrgId = Yii::$app->user->identity->Organization_Id;
        $survey = \common\models\Survey::find()->where(['User_Id' => $userId])->all();
        $surveyId = 0;
        if(!empty($survey))
        {
//            prd($survey);
            $this->surveyId = $surveyId = $survey[0]->Survey_Id;
        }
        $questions = \common\models\QuestionMaster::find()->where(['IsActive' => 1])
                    
                    ->joinWith(['orgQuestionMappings oqm'], true, 'INNER JOIN')->where(['oqm.Organization_Id' => $userOrgId])
//                    ->with('surveyDetails')
                    ->joinWith([
                        'surveyDetails' => function (\yii\db\ActiveQuery $query) {
                            $query->where(['Survey_Id' => $this->surveyId]);
                        }
                    ])

                    ->with('answerMasters')
                    ->all();
        
        // get your HTML raw content without any layouts or scripts
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('export', [
                'questions' => $questions,
                'id' => 0,
                'limit' => 0,
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

}

