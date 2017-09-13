<?php

namespace frontend\controllers;

use Yii;
use common\models\UploadForm;
use common\models\Document;
use common\models\DocumentSearch;
use common\models\Email;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;


/**
 * OrganizationController implements the CRUD actions for Organization model.
 */
class UploadDocumentController extends Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['index', 'upload', ],
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
        $searchModel = new DocumentSearch();
        $userDetails = Yii::$app->user->identity;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $userDetails->User_Id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }
    public function actionUpload()
    {
        $userDetails = Yii::$app->user->identity;
        $model = new UploadForm();
        $document = new Document();
        
        if(Yii::$app->request->isAjax && Yii::$app->request->isPost)
        {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
        } 
        elseif (Yii::$app->request->isPost) 
        {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            
             if ($model->validate()) 
            { 
                foreach ($model->imageFiles as $file) 
                {
                    $serverPath = Yii::getAlias('@common').'/../';
                    $path = 'uploads/' .$userDetails->Organization_Id.'/'.$userDetails->User_Id.'/';
                    if(!is_dir($serverPath.$path))
                    {
                        mkdir($serverPath.$path, 0777, true);
                    }
                    $uploadedFile =  $file->baseName . '.' . $file->extension;
                    
                    $document = new Document();
                    $document->Document_Name = $file->baseName; 
                    $document->Document_Path = $path.$uploadedFile; 
                    $path = $serverPath.$path.$uploadedFile;
                    $document->Uploaded_By = $userDetails->User_Id; 
                    $file->saveAs($path);
                    $document->save();
                }
                Yii::$app->session->setFlash('success', 'Your document has been uploaded successfully!');
                return $this->redirect(['index']);
            }

        }
        if(Yii::$app->request->isAjax)
        {
            return $this->renderAjax('upload', ['model' => $model]);
        }
        else
        {
            return $this->render('upload', ['model' => $model]);
        }
        
    }
    
    
}
