<?php

namespace backend\controllers;

use Yii;
use common\models\QuestionMaster;
use common\models\SurveyDetails;
use common\models\AnswerMaster;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\httpclient\Client;
use kartik\mpdf\Pdf;

class SurveyController extends \yii\web\Controller 
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['index', 'create', 'update', 'preview', 'report', 'preview', 'export', 'take-survey', 'view-survey'],
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
        if (!empty($id)) {
            $request = Yii::$app->request->post();
            $limit = 3;

            if (Yii::$app->request->isAjax) {
                $this->layout = false;
            }

            $offset = (int) ($id - 1) * 3;



            if (Yii::$app->request->isPost) {

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


                                $serveyDetails = new SurveyDetails();
                                if (!empty($request['AnswerOptions']['DetailsId'][$quesId]))
                                    $serveyDetails = SurveyDetails::findOne($request['AnswerOptions']['DetailsId'][$quesId]);
                                $serveyDetails->Question_ID = $quesId;
                                $serveyDetails->Answers = (!empty($inputText)) ? $inputText : $answers;
                                $serveyDetails->Survey_ID = 3;
                                $serveyDetails->FilePath = NULL;
                                $serveyDetails->save();
                            }
                        }
                    }
                }
            }

            $questions = \common\models\QuestionMaster::find()->where(['IsActive' => 1])->limit($limit)->offset($offset)->with('answerMasters')->with('surveyDetails')->all();

//            prd($questions);

            return $this->render('questions', [
                        'questions' => $questions,
                        'id' => $id,
                        'limit' => $limit,
            ]);
//            die($id);
        }
        return $this->render('index');
    }

    public function actionTakeSurvey() {
        return $this->render('take-survey');
    }

    public function actionViewSurvey() {
        return $this->render('view-survey');
    }

    public function actionPreview($id = 0) {
        if (!empty($id)) {
            $request = Yii::$app->request->post();
            $limit = 3;

            if (Yii::$app->request->isAjax) {
                $this->layout = false;
            }

//            $answers = new QuestionMaster();
            $offset = (int) ($id - 1) * 3;



            if (Yii::$app->request->isPost) {
//                prd($request);

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
                                $serveyDetails->Question_ID = $quesId;
                                $serveyDetails->Answers = (!empty($inputText)) ? $inputText : $answers;
                                $serveyDetails->Survey_ID = 3;
                                $serveyDetails->FilePath = NULL;
                                $serveyDetails->save();
                            }
                        }
                    }
                }
            }


//            die($id);
        }
        $questions = \common\models\QuestionMaster::find()->where(['IsActive' => 1])->with('answerMasters')->with('surveyDetails')->all();

//            prd($questions);

        return $this->render('questions', [
                    'questions' => $questions,
                    'id' => $id,
                    'limit' => 1,
        ]);
//        return $this->render('index');
    }

    public function actionReport() {
        $questions = \common\models\QuestionMaster::find()->where(['IsActive' => 1])->with('answerMasters')->with('surveyDetails')->all();
        // get your HTML raw content without any layouts or scripts
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('questions', [
                'questions' => $questions,
                'id' => 4,
                'limit' => 3,
            ]),
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'options' => [
                'title' => 'YouthInc',
                'subject' => 'Survey Report Generation'
            ],
            'methods' => [
                'SetHeader' => ['questions||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return $pdf->render();
    }

}
