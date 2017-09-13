<?php

namespace backend\controllers;

use Yii;
use common\models\Users;
use common\models\Organization;
use common\models\ReportUsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;

/**
 * ReportUsersController implements the CRUD actions for Users model.
 */
class ReportUsersController extends Controller
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
                        'actions' => ['index', 'export'],
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReportUsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $orgList = Organization::find()->all();
        if(Yii::$app->request->isGet && Yii::$app->request->isAjax)
        {
            $this->layout = false;
//            $request = Yii::$app->request->get();
//            unset($request['form']);
//            $dataProvider = $searchModel->search($request);
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'orgList' => $orgList
        ]);
    }

    /**
     * 
     */
    public function actionExport($id = 0) {
        $searchModel = new ReportUsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $orgList = Organization::find()->all();
        
        // get your HTML raw content without any layouts or scripts
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('export', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'orgList' => $orgList
            ]),
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'options' => [
                'title' => 'YouthInc',
                'subject' => 'Survey Report Generation'
            ],
            'methods' => [
                'SetHeader' => [" Users Report ||Generated On: " . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return @$pdf->render();
    }
    
    

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
