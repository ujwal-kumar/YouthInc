<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\PartnerType;
use common\models\ProgramType;
use common\models\ProgramCategory;
use common\models\Category;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProgramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Programs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Program'), ['create'], ['class' => 'btn btn-primary   btn-create']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Program_Id',
            'Program_Name',
//            'Program_Type',
            [
                'attribute' => 'Program_Type',
                'label'     =>'Program Type', 
                'value'     =>function ($model, $index, $widget) { 
                                if(!empty($model->Program_Type))
                                {
                                    
                                    return $model->programType->Program_Type_Name;
                                }
                                else
                                {
                                    return ''; 
                                }

                },
                'filter'    =>ArrayHelper::map(ProgramType::find()->asArray()->all(), 'Program_Type_Id', 'Program_Type_Name'),
             ],

            [
                'attribute' => 'Is_Active',
                'label'     =>'Status', 
                'value'     =>function ($model, $index, $widget) { 
                                if(!empty($model->Is_Active))
                                    return Yii::t('yii', 'Active'); 
                                else
                                    return Yii::t('yii', 'InActive'); 

                },
                'filter'    =>array(0 =>Yii::t('yii', 'InActive'),1 =>Yii::t('yii', 'Active')),
             ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => ' {view} {update} {status}  {delete}',
                'header' => 'Actions',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'target' => '_blank',
                                    'class' => 'model-delete'
                                ]);
                    },
                    'view' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-eye-open text-primary"></span>', $url, [
                                    'title' => Yii::t('yii', 'View'),
                                    'target' => '_blank',
                                    'class' => 'model-view'
                                ]);
                    },
                    'update' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                    'title' => Yii::t('yii', 'Update'),
                                    'target' => '_blank',
                                    'class' => 'model-update'
                                ]);
                    },
                    'status' => function ($url, $model) {
                        if(!empty($model->Is_Active))
                        {
                            return Html::a('<span class="fa fa-ban text-danger"></span>', $url, [
                                    'title' => Yii::t('yii', 'InActive'),
                                    'target' => '_blank',
                                    'class' => 'model-inactive'
                                ]);
                        }
                        else 
                        {
                            return Html::a('<span class="fa fa-check-circle text-success"></span>', $url, [
                                    'title' => Yii::t('yii', 'Active'),
                                    'target' => '_blank',
                                    'class' => 'model-active'
                                ]);
                            

                        }
                    }

                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
<!-- Popup Start -->
    <?= $this->render('/common/popup') ?> 
    
    <?php
    
    $this->registerJs(''
            

            . '', \yii\web\VIEW::POS_READY);
?></div>
