<?php 
 use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
$this->title = Yii::t('app', 'Survey Report');
$this->params['breadcrumbs'][] = $this->title;
?>


                        <div class="col-sm-12 ">
                            <?php //Pjax::begin(); ?>   
                            <h1><?= Html::encode($this->title) ?></h1>
                            <?=
                            GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                    [
                                        'label'=>'Orginiation', 
                                        'value'=>function ($model, $index, $widget) { 
                                            return $model->organization->Organization_Name; 
                                        

                                        },
                                        'filter' => true,
                                    ],
//                                     ['label'=>'User_Id', 'value'=>function ($model, $index, $widget) { 
//                                        if(!empty($model->User_Id))
//                                         return $model->user->User_Name; 
//
//                                     }],        
                                     ['label'=>'Program', 'value'=>function ($model, $index, $widget) { 
                                         if(!empty($model->Program_Id))
                                            return $model->program->Program_Name; 
                                     },
                                             'filter' => true,],        
                                    [
                                        'attribute'=> 'Status', 
                                        'value'=>function ($model, $index, $widget) 
                                        { 
                                            if($model->Survey_Status)
                                            {
                                                return $model->surveyStatus->Status_Description; 
                                            }
                                            else 
                                            {
                                                return '';
                                            }
                                        }, 
                                        'filter' => true,
                                    ],

                                    // 'Phone',
//                                         'IsActive',
//                                         'IsLocked',
//                                         'CreatedDate',
                                    // 'LastDateModified',
                        //            ['class' => 'yii\grid\ActionColumn'],
//                                    ['class' => 'yii\grid\ActionColumn',
//                                        'template' => '{atinek}',
//                                        'header' => 'Actions',
//                                        'buttons' => [
//                                            'atinek' => function ($url, $model) {
////                                                $id = implode(\yii\helpers\ArrayHelper::map($model->surveys, 'User_Id', 'Survey_Status'));
////                                                $userId = $id = implode(\yii\helpers\ArrayHelper::map($model->surveys, 'User_Id', 'User_Id'));
////                                                $serveyStatus = implode(\yii\helpers\ArrayHelper::map($model->surveys, 'User_Id', 'Survey_Status'));
////                                                $surveyId = implode(\yii\helpers\ArrayHelper::map($model->surveys, 'User_Id', 'Survey_Id'));
//                                                $id = $model->Survey_Status;
//                                                
//                                                $serveyStatus = $model->Survey_Status;
//                                                $surveyId = $model->Survey_Id;
//                                                if(!empty($id) && $serveyStatus == 3)
//                                                {
//                                                    $id = Yii::$app->request->baseUrl.'/reports/report/'.$surveyId;
//                                                    return Html::a('<span class="glyphicon glyphicon-eye-open text-primary"></span>', $id, [
//                                                            'title' => Yii::t('yii', 'View Submited Survey'),
//                                                            'target' => '_blank',
//                                                        ]);
//                                                }
//                                            }
//                                        ]
//                                    ]
                                ],
                            ]);
                            ?>
                        <?php // Pjax::end(); ?>
                        </div>
                    
