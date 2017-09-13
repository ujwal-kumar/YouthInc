<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\httpclient\Client;

/**
 * Menu 
 */

use yii\bootstrap\Nav;


class DashboardController extends \yii\web\Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['index', 'barchart'],
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
        
        $host  = Yii::$app->params['apiHost'];
        $baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
        $client = new Client();
        $response = $client->createRequest()
                ->setMethod('get')
                ->setUrl($host . '/youthinc/api/web/v1/dashboard/data')
                ->send();

        

        return $this->render('index', [
                    'data' => $response->content,
        ]);
    }

    public function actionBarchart() {
        $host  = Yii::$app->params['apiHost'];
        $baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
        $client = new Client();
        $response = $client->createRequest()
                ->setMethod('get')
                ->setUrl($host . '/youthinc/api/web/v1/dashboard/data')
                ->send();

        return $this->render('barchart', [
                    'data' => $response->content,
        ]);
    }

}
