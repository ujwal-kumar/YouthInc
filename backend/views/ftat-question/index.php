<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FtatQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Financial Trends Analysis Questions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftat-question-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php  Html::a(Yii::t('app', 'Create Financial Trends Analysis Question'), ['create'], ['class' => 'btn btn-primary  btn-create']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Ftat_Question_Id',
            'Question_Name',
//            'Created_By',
//            'Last_Modified_Date',

            ['class' => 'yii\grid\ActionColumn',
                                        'template' => ' {view} {update} {delte}',
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
            
            .'$("body").on("click", ".model-inactive, .model-active", function(){'
                . '$("#statusPopUp").modal("show");'
                .' var href = $(this).attr("href");'
                .''
                . '$("#statusPopUp").data("href", href);'

                . 'return false;'
                
            . '});'
            
            .'$("body").on("click",".status-button", function(){'
                
                .' var href = $("#statusPopUp").data("href");'
                .''
                . '$.get(href, function(data, status){
                    $("#statusPopUp").modal("hide");
                    
                    $.get("'.Yii::$app->request->baseUrl."/npo/flash".'", function(data, status){
                        $(".alert-message-cnt").html(data);
//                        setTimeout(function(){$(".alert").slideUp()}, 3000);
                        setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
                    });
                    $.pjax.reload({container:"#p0"});
                    
                });'
                . ''

                . 'return false;'
                
            . '});'
            
            .'$(".popup-cancel").click(function(){'
                . '$("#statusPopUp").modal("hide");'
                
                . 'return false;'
                
            . '});'
            
            . '$("body").on("change", "#users-role_id", function(){'
                . '
                    if($(this).val() == 1 ) {
                        $("body").find(".field-users-organization_id").slideUp();
                        
                    }
                    else
                    {
                        
                        $("body").find(".field-users-organization_id").slideDown();
                    }
                    '
            . '});'

            . '', \yii\web\VIEW::POS_READY);
?></div>

