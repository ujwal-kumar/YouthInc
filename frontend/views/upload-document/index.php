<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\Users;
use common\models\Organization;
/* @var $this yii\web\View */
/* @var $searchModel common\models\DocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Documents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('app', 'Upload Document'), ['upload'], ['class' => 'btn btn-primary btn-cr eate']) ?>
    </p>
<?php Pjax::begin(); ?>    
<?php 
//    prd(Users::find()->asArray()->all());
?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Document_Id',
//            [
//                'attribute' => 'Document_Id',
//                'label'     => 'Organization', 
//                'value'     => function ($model, $index, $widget) { 
//                                
//                                    return $model->uploadedBy->organization->Organization_Name; 
//                                
//                
//                },
//                'filter'    =>ArrayHelper::map(Organization::find()->asArray()->all(), 'Organization_Id', 'Organization_Name'),
//            ],
            'Document_Name',
//            'Document_Path',
            
//            'Uploaded_By',
//            [
//                'attribute' => 'Uploaded_By',
//                'label'     => 'Upload By', 
//                'value'     => function ($model, $index, $widget) { 
//                                if(!empty($model->Uploaded_By))
//                                    return $model->uploadedBy->User_Name; 
//                                else
//                                    return '-'; 
//                
//                },
//                'filter'    =>ArrayHelper::map(Users::find()->asArray()->all(), 'User_Id', 'User_Name'),
//            ],
//            'Created_Date',
            // 'Last_Modified_Date',

            ['class' => 'yii\grid\ActionColumn',
                                        'template' => '  {download} {status}',
                                        'header' => 'Actions',
                'buttons' => [
                   
                    'download' => function ($url, $model) {
                        $newUrl =  Yii::$app->request->baseUrl.'/'.$model->Document_Path;
                        return Html::a('<span class="fa fa-download text-primary"></span>', $newUrl, [
                                    'title' => Yii::t('yii', 'Update'),
                                    'target' => '_blank',
                                    'class' => 'model-download'
                                ]);
                    },


                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
<?= $this->render('/common/popup') ?>
    <?php
    
    $this->registerJs(''
            . '$(".dropdown-modal").click(function(){ $(this).toggleClass("open")});'
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
            ." $('.model-download').click(function(e) {
                    e.preventDefault();
                    window.open($(this).attr('href'), '_blank'); 
                    return false;
                     
                }); "
            
            .'$("body").on("click", ".model-inactive, .model-active", function(){'
                . '$("#statusPopUp").modal("show");'
                .' var href = $(this).attr("href");'
                .''
                . '$("#statusPopUp").data("href", href);'

                . 'return false;'
                
            . '});'
            
            .'$("body").on("click", ".model-unlock, .model-lock", function(){'
                . '$("#accountLockPopUp").modal("show");
                    var href = $(this).attr("href");
                    var className = $(this).attr("class");
                    if($(this).hasClass("model-unlock"))
                    {
                        
                        $("#accountLockPopUp").find(".enable").removeClass("hidden");
                    }
                    else
                    {
                       
                        $("#accountLockPopUp").find(".disabled").removeClass("hidden");
                    }
                '
                .''
                . '$("#accountLockPopUp").data("href", href);'
                
                
                . 'return false;'
                
            . '});'
            
            .'$("body").on("click",".user-lock", function(){'
                
                .' var href = $("#accountLockPopUp").data("href");'
                .''
                . '$.get(href, function(data, status){
                    $("#accountLockPopUp").modal("hide");
                    
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
                . '$("#statusPopUp, #accountLockPopUp").modal("hide");'
                . '$("#statusPopUp, #accountLockPopUp").find(".enable, .disabled").addClass("hidden");'
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

