<?php

namespace backend\controllers;

use Yii;
use common\models\Question;
use common\models\Answer;
use common\models\ControlType;
use common\models\Category;
use common\models\QuestionSearch;
use common\models\SurveyTransaction;
use common\models\GridAnswer;
use common\models\GridAnswerColumn;
use common\models\OrganizationQuestion;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * QuestionnaireController implements the CRUD actions for Question model.
 */
class QuestionnaireController extends Controller
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
                        'actions' => ['index', 'create', 'update', 'lock', 'status', 'add-answer', 'deleteans', 'view', 'delete'],
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
     * Lists all Question models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Question model.
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
     * Creates a new Question model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Question();
        
        $controlTypeList = ControlType::find()->all();
        $categoryTypeList = Category::find()->all();
        
        if ($model->load(Yii::$app->request->post())) 
        {
            
            if( $model->save())
            {
                $answers = Yii::$app->request->post('Answer');
                $gridAnswers = Yii::$app->request->post('GridAnswer');
                
                if(!empty($answers['Answer_Name'][1]))
                {
                    
                    foreach($answers['Answer_Name'] as $answer)
                    {
                        if(!empty($answer))
                        {
                            $answerObj = new Answer();
                            $answerObj->Answer_Name = $answer;
                            $answerObj->Question_Id = $model->Question_Id;
                            $answerObj->Is_Active = 1;
                            $answerObj->save();
                        }
                        
                    }
                    
                    
                }
                elseif(!empty ($gridAnswers['Rows'][1]))
                {
                    foreach($gridAnswers['Rows'] as $row)
                    {
                        if(!empty($row))
                        {
                            $gridObj = new GridAnswer();
                            $gridObj->Answer_Name = $row;
                            $gridObj->Question_Id = $model->Question_Id;
                            $gridObj->Field_Type = 'row';
                            $gridObj->save();
                        }
                        
                    }
                    
                    $gridAnswerTblObj =  GridAnswer::find()->where(['Question_Id' => $model->Question_Id])->all();
                    
                    if(!empty($gridAnswerTblObj))
                    {
                        foreach($gridAnswerTblObj as $row)
                        {
                            foreach($gridAnswers['Columns'] as $column)
                            {
                                if(!empty($column))
                                {
                                    $gridObj = new GridAnswerColumn();
                                    $gridObj->Answer_Name = $column;
                                    $gridObj->Grid_Answer_Id = $row->Grid_Answer_Id;
                                    $gridObj->save();
                                }

                            }
                        }
                    }
                    
                    
                    
                }
                Yii::$app->session->setFlash('success', ' Question has been created successfully!');
                $this->redirect(['index']);
                
            }
        } 
        elseif (Yii::$app->request->isAjax) 
        {
             if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {
                 return $this->renderAjax('create', [
                        'model' => $model,
                        'controlTypeList' => $controlTypeList,
                        'categoryTypeList' => $categoryTypeList,
                    ]);
            }
           
        } else {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Question model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $control = $model = $this->findModel($id);
        $controlType = $model->controlType->Control_Type_Name;
        if(strtolower($controlType) == "grid")
        {
            $answers = GridAnswer::find()
                    ->where(['Question_Id' => $id])
                    ->with('gridAnswerColumns')
                    ->all();
            
        }
        else
        {
            $answers =  Answer::find()->where(['Question_Id' => $id])->all();
        }
        
        $initiated = $this->HasInitiated($id);
        
        $controlTypeList = ControlType::find()->all();
        $categoryTypeList = Category::find()->all();
        $gridAnswers = Yii::$app->request->post('GridAnswer');
        $request = Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post()) ) 
        {
            if( $model->save())
            {
                $control  = $this->findModel($id);
                
                $controlType = $control->controlType->Control_Type_Name;
                $answers = Yii::$app->request->post('Answer');
            
                
                if(strtolower($controlType) != "grid" && !empty($answers['Answer_Name']))
                {
                            
                    
                    $previousAns = (!empty($answers['Answer_Id'])) ? $answers['Answer_Id'] : '';
                    $textAreaAnsId = $answers['Is_Text_Area'];
                    
                    if(!empty($gridAnswers['Rows']))
                    {
                        foreach($gridAnswers['Rows'] as $gridId => $row)
                        {
                            
                            if(!empty($row))
                            {
                                if(GridAnswer::findOne(['Grid_Answer_Id' => $gridId , 'Question_Id' => $model->Question_Id, 'Field_Type' => 'row' ]) !== null)
                                {
                                    $gridObj = GridAnswer::findOne($gridId)->delete();
                                }
                                
                            }

                        }
                        
                    }
                    
                    if(!empty($gridAnswers['Columns']))
                    {
                        foreach($gridAnswers['Columns'] as  $gridId => $column)
                        {
                            if(!empty($column))
                            {
                                if(GridAnswer::findOne(['Grid_Answer_Id' => $gridId , 'Question_Id' => $model->Question_Id, 'Field_Type' => 'column' ]) !== null)
                                {
                                    $gridObj = GridAnswer::findOne($gridId)->delete();
                                }
                                
                            }

                        }
                    }
                    
                    foreach($answers['Answer_Name'] as $answerId => $answer)
                    {
                        if(!empty($textAreaAnsId) )
                        {
                            
                            if($textAreaAnsId != $answerId && (Answer::findOne($answerId) !== null) )
                            {
                                Answer::findOne($answerId)->delete();
                            }
                            else
                            {
                                $answerObj =  Answer::findOne($textAreaAnsId);
                                $answerObj->Answer_Name = $answer;
                                $answerObj->Question_Id = $model->Question_Id;
                                $answerObj->Is_Active = 1;
                                $answerObj->save();
                            }
                            
                        }
                        else
                        {
                            if( Answer::findOne($answerId) !== null)
                            {
                                $answerObj =  Answer::findOne($answerId);
                            }
                            else
                            {
                                $answerObj = new  Answer();

                            }

                            $answerObj->Answer_Name = $answer;
                            $answerObj->Question_Id = $model->Question_Id;
                            $answerObj->Is_Active = 1;
                            $answerObj->save();
                        }
                        
                        
                    }
                }
                elseif(strtolower($controlType) == "grid" )
                {
                    
                    if(!empty($answers['Answer_Name']))
                    {
                        foreach($answers['Answer_Name'] as $answerId => $answer)
                        {
                            if((Answer::findOne($answerId) !== null) )
                            {
                                Answer::findOne($answerId)->delete();
                            }

                        }
                    }
                    if(!empty($gridAnswers['Rows']))
                    {
                        foreach($gridAnswers['Rows'] as $gridId => $row)
                        {
                            
                            if(!empty($row))
                            {
                                if(GridAnswer::findOne(['Grid_Answer_Id' => $gridId , 'Question_Id' => $model->Question_Id, 'Field_Type' => 'row' ]) !== null)
                                {
                                    $gridObj = GridAnswer::findOne($gridId);
                                }
                                else 
                                {
                                    $gridObj = new GridAnswer();
                                }

                                $gridObj->Answer_Name = $row;
                                $gridObj->Question_Id = $model->Question_Id;
                                $gridObj->Field_Type = 'row';
                                $gridObj->save();
                            }

                        }
                        
                    }
                    
                    if(!empty($gridAnswers['Columns']))
                    {
                        
                        foreach($gridAnswers['Columns'] as  $columnId => $column)
                        {
                            if(!empty($column))
                            {
                                
                                
                                if(GridAnswerColumn::findOne(['Grid_Answer_Column_Id' => $columnId  ]) !== null)
                                {
                                    $gridObj = GridAnswerColumn::findOne($columnId);
                                }
                                else 
                                {
                                    $gridObj = new GridAnswerColumn();
                                }
//                                prd($gridObj);
                                $gridObj->Answer_Name = $column;
                                $gridObj->save();
                            }

                        }
                    }
                    
                }
                Yii::$app->session->setFlash('success', ' Question has been updated successfully!');
                $this->redirect(['index']);
            }
        } elseif (Yii::$app->request->isAjax) {
             if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {
                 return $this->renderAjax('update', [
                        'model' => $model,
                        'answers' => $answers,
                        'initiated' => $initiated,
                        'controlTypeList' => $controlTypeList,
                        'categoryTypeList' => $categoryTypeList,
                         
                    ]);
            }
           
        } else {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
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
                $questionStatus = OrganizationQuestion::findOne([
                        'Question_Id' => $id,
                        
                    ]);
                
                if(!empty($questionStatus))
                {
                    Yii::$app->session->setFlash('error', "Question is associated with Survey.");
                    return $this->redirect(['index']);
                }
                $active = 'Deactivated';
            }
            
            
            Yii::$app->session->setFlash('success', $model->Question_Name.'  has been '.$active.' successfully!');
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
    
    public function HasInitiated($id)
    {
        if(!empty($id))
        {
             $count = SurveyTransaction::find()->where(['Question_Id'=> $id] )->count();  
             
             if(!empty($count))
                 return true;
             else
                 return false;
        }
        else
        {
            return false;
        }
    }
    
    public function actionAddAnswer()
    {
        if (Yii::$app->request->post()) 
        {
            return $this->render('answser', [
                        
            ]);
        }
    }
    
    public function actionDeleteans($id)
    {
        if (($model = Answer::findOne($id)) !== null) {
            $model->delete();
            return true;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    

    /**
     * Deletes an existing Question model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $questionStatus = OrganizationQuestion::findOne([
                        'Question_Id' => $id,
                        
                    ]);
        
        if(empty($questionStatus))
        {
            $gridDelete = false;
            $ansDelete = false;
            if(1003 == $this->findModel($id)->controlType->Control_Type_Id)
            {
                $gridDelete = GridAnswer::findOne(['Question_Id' => $id]);
                if(!empty($gridDelete))
                {
                    $gridDelete = GridAnswerColumn::deleteAll(['Grid_Answer_Id' => $gridDelete->Grid_Answer_Id]);
                    $gridDelete = GridAnswer::deleteAll(['Question_Id' => $id]);
                }
            }
            else 
            {
                $ansDelete = Answer::deleteAll(['Question_Id' => $id]);
            }
            
            if($gridDelete || $ansDelete)
            {
                if(!$this->findModel($id)->delete())
                {
                    Yii::$app->session->setFlash('error', "The requested Item could not be found.");
                }
                else
                {
                    Yii::$app->session->setFlash('success', ' has been deleted successfully!');
                }
            }
            else
            {
                Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            }
            
        }
        else
        {
            Yii::$app->session->setFlash('error', "Record is assoiciated with the Survey.");
        }
    }
    
    

    /**
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
