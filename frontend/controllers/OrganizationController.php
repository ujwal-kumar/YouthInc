<?php

namespace frontend\controllers;

use Yii;
use common\models\Organization;
use common\models\OrganizationSearch;
use common\models\Email;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\widgets\Alert;
use yii\widgets\ActiveForm;


/**
 * OrganizationController implements the CRUD actions for Organization model.
 */
class OrganizationController extends Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['index', 'declined', ],
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
     * Lists all Organization models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $userDetails = Yii::$app->user->identity;
        
        if($userDetails->organization->Status == 2)
        {
            return $this->redirect(['declined']);
        }
        
        $model = $this->findModel($userDetails->Organization_Id);
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
        } 
        else if ($model->load(Yii::$app->request->post())) 
        {
            $model->Is_Updated = 1;
            $model->Last_Modified_Date = date('Y-m-d H:i:s');
            
            if($model->save())
            {
                if($model->Status == 3)
                {
                    $email = [];
                    $email['slug'] = 'npo-update';
                    $email['{{email}}'] = Yii::$app->params['adminEmail'];
                    $email['{{npo}}'] = $model->Organization_Name;
                    $mail = new Email();
                    $mail = $mail->sendEmail($email);

                }
                Yii::$app->session->setFlash('success', $model->Organization_Name . ' has been updated successfully!');
            }
            else
            {
                Yii::$app->session->setFlash('error',  'There is error occured during saving information!');
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    public function  actionDeclined()
    {
        return $this->render('declined', [
               
            ]);
    }

    

    /**
     * Updates an existing Organization model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    

    /**
     * Finds the Organization model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Organization the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Organization::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
