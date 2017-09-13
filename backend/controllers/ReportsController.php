<?php

namespace backend\controllers;

use Yii;
use common\models\Users;
use common\models\UserSearch;
use common\models\Survey;
use common\models\SurveySearch;
use common\models\UserRole;
use common\models\Question;
use common\models\OrganizationQuestion;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\httpclient\Client;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;

class ReportsController extends \yii\web\Controller
{
    public $surveyId;
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                  
                    [
                        'actions' => ['index', 'report', 'export','search', 'export-report'],
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
    
    public function actionIndex()
    {
        $searchModel = new SurveySearch();
        $query = Survey::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);;
        
        $statusName = Yii::$app->request->post('status');
        if( Yii::$app->request->isAjax)
        {
            $this->layout = false;
        }
        if(Yii::$app->request->isPost && $statusName != "All" && !empty($statusName))
        {
            $query->where(['Survey_Status' => $statusName]);
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
        ]);
       
        
    }
    
    public function actionSearch()
    {
        
        if(Yii::$app->request->post())
        {
            $searchModel = new SurveySearch();
            $query = Survey::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);;
            
            $statusName = Yii::$app->request->post('status');
            if(Yii::$app->request->isPost && $statusName != "All" && !empty($statusName))
            {
                $query->where(['Survey_Status' => $statusName]);
            }
            if(Yii::$app->request->isAjax)
            {
                $this->layout = false;
            }

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            
            return $this->render('search', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }
    /**
     * 
     * @param type $id
     * @return type
     */
    public function actionReport($id = 0)
    {
        $this->surveyId = $id;
        $survey = \common\models\Survey::findOne($id);
        
        $questionMaped = OrganizationQuestion::find()->where([ 'Organization_Id' => $survey->Organization_Id, 'Program_Id' => $survey->Program_Id  ])->all();
        $questionMaped = ArrayHelper::map($questionMaped, 'Question_Id', 'Question_Id');
        $questions = Question::find()->where(['Is_Active' => 1, 'Question_Id' => $questionMaped])

                        ->with('organizationQuestions')
                        ->with(['answers.surveyTransactions' => function (\yii\db\ActiveQuery $query) {
                                    $query->andWhere("Survey_Id = $this->surveyId");
                                },'gridAnswers.gridAnswerColumns'])
                        ->all();
//        $questions = \common\models\QuestionMaster::find()->where(['IsActive' => 1])->with('answerMasters')->with('surveyDetails')->all();
        
        return $this->render('preview', [
                    'questions' => $questions,
                    'id' => $id,
                    'limit' => 0,
                    'total' => 12,
                    'survey' => $survey,
                    
        ]);
    }
    
    /**
     * 
     */
    public function actionExport($id = 0) {
        $this->surveyId = $id;
        $survey = \common\models\Survey::findOne($id);
        $programId = $survey->Program_Id;
        
        $orgName = $survey->organization->Organization_Name;
      
        
        $surveyId = 0;
        if(!empty($survey))
        {
//            prd($survey);
            $this->surveyId = $surveyId = $survey->Survey_Id;
        }
        $questionMaped = OrganizationQuestion::find()->where([ 'Organization_Id' => $survey->Organization_Id, 'Program_Id' => $survey->Program_Id  ])->all();
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
                'SetHeader' => [" $orgName ||Generated On: " . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return @$pdf->render();
    }
    
    public function actionExportReport($id = 0) 
    {
        if(Yii::$app->request->get())
        {
            $searchModel = new SurveySearch();
            $query = Users::find()->joinWith('surveys', false, 'LEFT JOIN');
           
            if(Yii::$app->request->isAjax)
            {
                $this->layout = false;
            }

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
           
            
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'content' => $this->renderPartial('survey-export', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
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
            return $pdf->render();
        }
        // get your HTML raw content without any layouts or scripts
        
    }
    
    
    
    
    
    

}
