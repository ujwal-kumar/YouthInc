<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'class' => '\kartik\grid\Module',
        'admin' => [
                'class' => 'mdm\admin\Module',
                 'controllerMap' => [
                                        'assignment' => [
                                           'class' => 'mdm\admin\controllers\AssignmentController',
                                           /* 'userClassName' => 'app\models\User', */
                                           'idField' => 'User_Id',
                                           'usernameField' => 'User_Name',
//                                           'fullnameField' => 'profile.full_name',
//                                           'extraColumns' => [
//                                               [
//                                                   'attribute' => 'full_name',
//                                                   'label' => 'Full Name',
//                                                   'value' => function($model, $key, $index, $column) {
//                                                       return $model->profile->full_name;
//                                                   },
//                                               ],
//                                               [
//                                                   'attribute' => 'dept_name',
//                                                   'label' => 'Department',
//                                                   'value' => function($model, $key, $index, $column) {
//                                                       return $model->profile->dept->name;
//                                                   },
//                                               ],
//                                               [
//                                                   'attribute' => 'post_name',
//                                                   'label' => 'Post',
//                                                   'value' => function($model, $key, $index, $column) {
//                                                       return $model->profile->post->name;
//                                                   },
//                                               ],
//                                           ],
                                           'searchClass' => 'common\models\UserSearch'
                                       ],
                                       'menu' => [
                                           'class' => 'backend\controllers\MenuController',
                                       ],
                                       'role' => [
                                           'class' => 'backend\components\RoleController',
                                       ],
                ],
//            'modelMap' => [
//                    'Menu' => 'common\models\Menu',
//            ],

            ]
            
        ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];

function prd($ob, $f=1)
{
        print "<pre>";
        print_r($ob);
        print "</pre>";
        die();
}

function pr($ob, $f=1)
{
        print "<pre>";
        print_r($ob);
        print "</pre>";
        
}