<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProgramTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Program Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-type-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php Html::a(Yii::t('app', 'Create Program Type'), ['create'], ['class' => 'btn btn-primary btn-create']) ?>
    </p>
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Program_Type_Id',
            'Program_Type_Name',
//            'Created_Date',
//            'Last_Modified_Date',

            ['class' => 'yii\grid\ActionColumn',
                                        'template' => ' {view} {update} ',
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
                    }

                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
<?= $this->render('/common/popup') ?>   
    
    <?php
    
    $this->registerJs(''
            
            . '', \yii\web\VIEW::POS_READY);
?></div>
