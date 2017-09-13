<?php

namespace backend\controllers;

use Yii;
use common\models\Category;
use common\models\CategoryType;
use common\models\CategorySearch;
use common\models\Question;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
        $categoryList = Category::find()->where(['Parent_Category_Id' => null])->all();
        $categoryTypeList = CategoryType::find()->all();


        if (Yii::$app->request->isAjax) {
             if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {
                 return $this->renderAjax('create', [
                        'model' => $model,
                        'categoryList' => $categoryList,
                        'categoryTypeList' => $categoryTypeList,
                    ]);
            }
           
        }  

        else if ($model->load(Yii::$app->request->post())) 
        {
            $model->Created_Date = date('Y-m-d H:i:s');
            $model->Last_Modified_Date = date('Y-m-d H:i:s');
            if(empty($model->Is_Child))
                $model->Parent_Category_Id = null;
            else
                $model->Category_Type_Id = null;
            if($model->save())
            {
                Yii::$app->session->setFlash('success', $model->Category_Name.' has been created successfully!');
                return $this->redirect(['index']);
            }
            
        } else {
            Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categoryList = Category::find()->where(['Parent_Category_Id' => null])->all();
        $categoryTypeList = CategoryType::find()->all();
        if (Yii::$app->request->isAjax) {
             if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            } else {
                 return $this->renderAjax('update', [
                        'model' => $model,
                        'categoryList' => $categoryList,
                        'categoryTypeList' => $categoryTypeList,
                     
                    ]);
            }
           
        } 
        elseif ($model->load(Yii::$app->request->post())) 
        {
//            $model->Created_Date = date('Y-m-d H:i:s');
            $model->Last_Modified_Date = date('Y-m-d H:i:s');
            if(empty($model->Is_Child))
                $model->Parent_Category_Id = null;
            else
                $model->Category_Type_Id = null;
            if($model->save())
            {
                Yii::$app->session->setFlash('success', $model->Category_Name.' has been updated successfully!');
                return $this->redirect(['index']);
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
                $active = 'Deactivated';
            }
            
            Yii::$app->session->setFlash('success', $model->Category_Name.'  has been '.$active.' successfully!');
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
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $recordExist = Question::findOne(['Category_Id' => $id]);
        $model = $this->findModel($id);  
        if(empty($recordExist))
        {
            
            if(!$this->findModel($id)->delete())
            {
                Yii::$app->session->setFlash('error', "The requested Item could not be found.");
            }
            else
            {
                Yii::$app->session->setFlash('success', 'Record has been deleted successfully!');
            }
            
        }
        else
        {
            Yii::$app->session->setFlash('error', "Record is assoiciated with Question.");
        }
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
