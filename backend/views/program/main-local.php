<?php
return [
    'layout' => 'youthinc-frontend',
    'components' => [
//        'db' => [
//            'class' => 'yii\db\Connection',
//            'dsn' => 'mysql:host=localhost;dbname=yii2',
//            'username' => 'root',
//            'password' => 'admin',
//            'charset' => 'utf8',
//        ],
//        'db' => [
//            'class' => 'yii\db\Connection',
////            'dsn' => 'dblib:host=LOC6-LAP60\SQLEXPRESS;dbname=serveyDB',
//            'dsn' => 'sqlsrv:Server=LOC6-LAP60\SQLEXPRESS;Database=surveyDB',
////            'username' => 'youthinc',
////            'password' => 'admin',
//            'charset' => 'utf8',
//        ],
        /*'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'dblib:host=LOC6-LAP60\SQLEXPRESS;dbname=serveyDB',
            'dsn' => 'sqlsrv:Server=LOC6-LAP60\SQLEXPRESS;Database=surveyDB_DEV',
            'username' => 'youthinc',
            'password' => 'admin',
            'charset' => 'utf8',
        ],*/
        'db' => [
            'class' => 'yii\db\Connection',
            
            'dsn' => 'sqlsrv:Server=10.243.30.52;Database=SurveyDB',
            'username' => 'YI_User',
            'password' => 'User@123',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        
    ],
];
