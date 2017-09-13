<?php

namespace backend\controllers;

use Yii;
use common\models\Organization;
use common\models\ReportNpoSearch;
use common\models\ReportFtatSearch;
use common\models\OrganizationSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;
/**
 * ReportNpoController implements the CRUD actions for Organization model.
 */
class ReportNpoController extends Controller
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
                        'actions' => ['index', 'authorize', 'ftat', 'export', 'ftat-export', 'authorize-export'],
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
        $searchModel = new ReportNpoSearch();
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
     * Lists all Organization models.
     * @return mixed
     */
    public function actionAuthorize()
    {
        $searchModel = new ReportNpoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $orgList = Organization::find()->all();
        
        if(Yii::$app->request->isGet && Yii::$app->request->isAjax)
        {
            $this->layout = false;
//            $request = Yii::$app->request->get();
//            unset($request['form']);
//            $dataProvider = $searchModel->search($request);
        }
        
        return $this->render('authorize', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'orgList' => $orgList
        ]);
    }
    
    /**
     * Lists all Organization models.
     * @return mixed
     */
    public function actionFtat()
    {
        $searchModel = new ReportFtatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $orgList = Organization::find()->all();
        
        if(Yii::$app->request->isGet && Yii::$app->request->isAjax)
        {
            $this->layout = false;
//            $request = Yii::$app->request->get();
//            unset($request['form']);
//            $dataProvider = $searchModel->search($request);
        }
        
        return $this->render('ftat', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'orgList' => $orgList
        ]);
    }

    public function actionExport($id = 0) {
        $searchModel = new ReportNpoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        
        
        // get your HTML raw content without any layouts or scripts
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('export', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]),
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'options' => [
                'title' => 'YouthInc',
                'subject' => 'Organization Report Generation'
            ],
            'methods' => [
                'SetHeader' => [" Organization Report ||Generated On: " . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return @$pdf->render();
    }
    
    public function actionAuthorizeExport($id = 0) {
        $searchModel = new ReportNpoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        
        
        // get your HTML raw content without any layouts or scripts
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('authorize-export', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]),
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'options' => [
                'title' => 'YouthInc',
                'subject' => 'Organzation Report Generation'
            ],
            'methods' => [
                'SetHeader' => [" Organization Report ||Generated On: " . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return @$pdf->render();
    }
    
    public function actionFtatExport($id = 0) {
        $searchModel = new ReportFtatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        
        
        // get your HTML raw content without any layouts or scripts
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->renderPartial('ftat-export', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]),
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'options' => [
                'title' => 'YouthInc',
                'subject' => 'FTAT Report Generation'
            ],
            'methods' => [
                'SetHeader' => [" FTAT Report ||Generated On: " . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return @$pdf->render();
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
