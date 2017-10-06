<?php

$config = [
    'modules' => ['class' => '\kartik\grid\Module'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5Zk5IDKmG3dVvIupNQinFiu-hYG6dfLM',
            'class' => 'common\components\Request',
            'web'=> '/backend/web',
            'adminUrl' => '/admin'
        ],
        'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'rules' => [
                            'login'=>'login/index',
                            'fta/<action:\w+>/<id:\d+>' => 'ftat/<action>',
                            'fta/<action:\w+>' => 'ftat/<action>',
                            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                            
//                            'fta/index' => 'ftat/index',
                            
                            

                ],
        ],
    ],
    
    'defaultRoute' => 'login/index',
];

if (!YII_ENV_TEST) {
//     configuration adjustments for 'dev' environment
//    $config['bootstrap'][] = 'debug';
//    $config['modules']['debug'] = [
//        'class' => 'yii\debug\Module',
//    ];
//
//    $config['bootstrap'][] = 'gii';
//    $config['modules']['gii'] = [
//        'class' => 'yii\gii\Module',
//    ];
}

return $config;
