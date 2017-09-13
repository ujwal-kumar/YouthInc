<?php

namespace backend\controllers;

use Yii;
use common\models\OrganizationProgram;
use common\models\Organization;
use common\models\OrganizationProgramSearch;
use common\models\Question;
use common\models\OrganizationQuestion;
use common\models\Survey;
use common\models\SurveyTransaction;
use common\models\ProgramCategory;
use common\models\Email;
use common\models\Program;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProgramApplicationController implements the CRUD actions for OrganizationProgram model.
 */
class ProgramApplicationController extends Controller
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
                        'actions' => ['index', 'create', 'update', 'lock', 'status', 'question-map', 'reject', 'view'],
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
     * Lists all OrganizationProgram models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrganizationProgramSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrganizationProgram model.
     * @param integer $id
     * @return mixed
     */
    
    public function actionView($id) {

        
        if(Yii::$app->request->isAjax)
        {
            return $this->renderAjax('view', [
                        'model' => Organization::findOne($this->findModel($id)->Organization_Id),
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
    public function actionStatus($id) 
    {
        if (Yii::$app->request->isAjax) 
        {
            $request = Yii::$app->request->get();

            if (!empty($id)) {

                $active = 'Accepted';

                $model = $this->findModel($id);
                if($model->Is_Approved == 1)
                {
                    $active = 'Rejected';
                }
                else
                {

                }
                Yii::$app->session->setFlash('success', ' Program has been '.$active.' successfully!');
                $model->Is_Approved = 1;
                if ($model->save()) 
                {
                    $categories = ProgramCategory::find()->where(['Program_Id' => $request['program']])->all();
                    $organizationDetails = Organization::findOne(['Organization_Id' => $request['org']]);
                    $programDetails = Program::findOne(['Program_Id' => $request['program']]);
                    
                    $questionCat = [];
                    foreach($categories as $cat)
                    {
                        $questionCat[] = $cat->Category_Id;
                    }

                    $questions = Question::find()->where(['Category_Id' => $questionCat] )->all();

                    return $this->renderAjax('questions', [
                            'questions' => $questions,
                            'org_id' => $request['org'],
                            'program' => $request['program'],
                            'mapquestions' => '',
                            'organizationDetails' => $organizationDetails,
                            'programDetails' => $programDetails,

                    ]);
                } 
                else
                {
                    echo false;
                }
            } 
            else 
            {
                return $this->redirect(['index']);
            }
        }
        else
        {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }
    
    public function actionReject($id) {
        $request = Yii::$app->request->get();
        
        if (Yii::$app->request->isAjax) 
        {
        
            if (!empty($id)) 
            {
                $surveyStatus = Survey::findOne([
                        'Program_Id' => $request['program'],
                        'Organization_Id' => $request['org']
                    ]);
                
                if(!empty($surveyStatus))
                {
                    Yii::$app->session->setFlash('error', "Survey has been initiated. ");
                    return $this->redirect(['index']);
                }

                $active = 'Rejected';

                $model = $this->findModel($id);
                $notes = Yii::$app->request->post('notes');
                $model->Notes = $notes;
                $model->Is_Approved = 2;
                if ($model->save()) 
                {
                    /**
                     * Program Acceptance Email
                     */
                    $email = [];
                    $email['slug'] = 'program-rejection';
                    $email['{{npo}}'] = $model->organization->Organization_Name;
                    $email['{{email}}'] = $model->organization->Email;
                    $email['{{program}}'] = $model->program->Program_Name;
                    $email['{{notes}}'] = $notes;

                    $mail = new Email();
                    $mail = $mail->sendEmail($email);
                    Yii::$app->session->setFlash('success', ' Program has been '.$active.' successfully!');
                    echo false;
                } 
                else
                {
                    echo false;
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
    
    public function actionQuestionMap()
    {
        if(Yii::$app->request->isGet && Yii::$app->request->isAjax)
        {
            $request = Yii::$app->request->get();
            $categories = ProgramCategory::find()->where(['Program_Id' => $request['program']])->all();
            $organizationDetails = Organization::findOne(['Organization_Id' => $request['org']]);
            $programDetails = Program::findOne(['Program_Id' => $request['program']]);
            
            $surveyStatus = Survey::findOne([
                        'Program_Id' => $request['program'],
                        'Organization_Id' => $request['org']
                    ]);
            $surveyInitated = false;
            $applicationDetails = [];
            
            if(!empty($surveyStatus))
            {
                $surveyId = $surveyStatus->Survey_Id;
                $surveyInitated = SurveyTransaction::findOne([
                        'Survey_Id' => $surveyId,
                        'Organization_Id' => $request['org']
                    ]);
                if(!empty($surveyInitated))
                {
                    $surveyInitated = true;
                }
            }
            $orgQuesObj = OrganizationQuestion::find()->where([
                'Program_Id' => $request['program'],
                'Organization_Id' => $request['org']
            ])->all();
            $questionCat = [];
            foreach($categories as $cat)
            {
                $questionCat[] = $cat->Category_Id;
            }

            $questions = Question::find()->where(['Category_Id' => $questionCat, 'Is_Active' => 1] )->all();
            
            return $this->renderAjax('questions', [
                    'questions' => $questions,
                    'org_id' => $request['org'],
                    'program' => $request['program'],
                    'mapquestions' => $orgQuesObj,
                    'surveyInitated' => $surveyInitated,
                    'organizationDetails' => $organizationDetails,
                    'programDetails' => $programDetails,
                    

            ]);
        }
        else if(Yii::$app->request->isPost)
        {
            
            $request = Yii::$app->request->post();

            if(!empty($request['OrgId']) && !empty($request['ProgramId']))
            {
                $orgId = $request['OrgId'];
                $programId = $request['ProgramId'];
                $surveyStatus = Survey::findOne([
                        'Program_Id' => $programId,
                        'Organization_Id' => $orgId
                    ]);
                
                
                
                if(empty($surveyStatus))
                {
                    $surveyObj = new Survey();
                    $surveyObj->Program_Id = $programId;
                    $surveyObj->Organization_Id = $orgId;
                    $surveyObj->User_Id = Null;
                    $surveyObj->Survey_Status = 1;
                    /**
                     * Program Acceptance Email
                     */
                    $email = [];
                    $email['slug'] = 'program-approval';
                    $email['{{npo}}'] = $surveyObj->organization->Organization_Name;
                    $email['{{email}}'] = $surveyObj->organization->Email;
                    $email['{{program}}'] = $surveyObj->program->Program_Name;

                    if($surveyObj->save())
                    {

                        foreach($request['Question'] as $questionId)
                        {
                            $orgQuesObj = new OrganizationQuestion();
                            $orgQuesObj->Program_Id = $programId;
                            $orgQuesObj->Organization_Id = $orgId;
                            $orgQuesObj->Question_Id = $questionId;
                            $orgQuesObj->save();
                        }


                        $mail = new Email();
                        $mail = $mail->sendEmail($email);

                        Yii::$app->session->setFlash('success', ' Organization questions  has been maped successfully!');
                    }
                    else
                    {
                        Yii::$app->session->setFlash('error', ' There is error occured during question mappingt !');
                    } 
                }
                else
                {
                    $orgId = $request['OrgId'];
                    $programId = $request['ProgramId'];
                    
                    $orgQuesObj = OrganizationQuestion::deleteAll([
                        'Program_Id' => $programId,
                        'Organization_Id' => $orgId
                    ]);
                    
                    
                    foreach($request['Question'] as $questionId)
                    {
                        $orgQuesObj = new OrganizationQuestion();
                        $orgQuesObj->Program_Id = $programId;
                        $orgQuesObj->Organization_Id = $orgId;
                        $orgQuesObj->Question_Id = $questionId;
                        $orgQuesObj->save();
                    }
                    
                    Yii::$app->session->setFlash('success', ' Organization questions  has been updated successfully!');
                }
                
            }
            echo true;
        }
        
        else
        {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
        
    }
    
    

    /**
     * Deletes an existing OrganizationProgram model.
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
     * Finds the OrganizationProgram model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrganizationProgram the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrganizationProgram::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
