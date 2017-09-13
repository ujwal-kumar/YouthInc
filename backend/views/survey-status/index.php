<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\SurveyStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Survey Statuses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-status-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Survey Status'), ['create'], ['class' => 'btn btn-primary btn-create']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Survey_Status_Id',
            'Status_Description',

            ['class' => 'yii\grid\ActionColumn',
                        'template' => ' {view} {update}{delete} ',
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
<!-- Popup Start -->
    <?php
            yii\bootstrap\Modal::begin([
                'id' =>'formPopUp',
                'header' => '<h2>Loading...</h2>',
                'size' => 'modal-dialog modal-lg  ',
                
                ]);
                       
    ?>
        <div class="row-fluid form-ajax-content">
            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </div>    
    <?php
        yii\bootstrap\Modal::end();
    ?>


    <!-- Popup End -->
    <?php
    
    $this->registerJs(''
             .'$("body").on("click", ".btn-create, .model-update, .model-view, .btn-edit-popup", function(){'
                . '$("#formPopUp").find(".modal-header h2").text($(".pop-up-dummy").find("h2").text());'
                . '$("#formPopUp").find(".modal-body").find(".form-ajax-content").html($(".pop-up-dummy").find(".dummy-content").html());'
                . '$("#formPopUp").modal("show");'
                .' var href = $(this).attr("href");'
                . '$.get(href, function(data, status){
                    $(".form-ajax-content").html(data);
                    
                    $(".form-ajax-content").parents(".modal-content").find(".modal-header h2").text($(".form-ajax-content").find("h1").hide().text());
                });'
                
                
                . 'return false;'
                
            . '});'
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


