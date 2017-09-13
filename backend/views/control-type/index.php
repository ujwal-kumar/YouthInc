<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ControlTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Control Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="control-type-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php Html::a(Yii::t('app', 'Create Control Type'), ['create'], ['class' => 'btn btn-primary  btn-create']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Control_Type_Id',
            'Control_Type_Name',
//            'Created_Date',
//            'Last_Modified_Date',

            ['class' => 'yii\grid\ActionColumn',
                        'template' => ' {view} {update} ',
                        'header' => 'Actions',
                'buttons' => [
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


    <!-- Popup End -->
    <?php
    
    $this->registerJs(''
             
//            .'$(".model-update").click(function(){'
//                .' var href = $(this).attr("href");'
//                . ' var content = $(".form-ajax-content").load(href); content.find(".role-form").remove();'
//                . '$(".form-ajax-content").parents(".modal-content").find(".modal-header h2").text($(".form-ajax-content").find("h1").show().text());'
//                . '$("#formPopUp").modal("show");'
//                
//                
//                . 'return false;'
//                
//            . '})'
            . '', \yii\web\VIEW::POS_READY);
?></div>
