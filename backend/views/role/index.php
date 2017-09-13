<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Roles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index  page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>    
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Role'), ['create'], ['class' => 'btn btn-primary btn-create']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            //            'Role_Id',
            'Role_Name',
            'Description',
            [
                'attribute' => 'Is_Active',
                'label'     =>'Status', 
                'value'     =>function ($model, $index, $widget) { 
                                if(!empty($model->Is_Active))
                                    return Yii::t('yii', 'Active'); 
                                else
                                    return Yii::t('yii', 'InActive'); 

                },
                'filter'    =>array( 0 =>Yii::t('yii', 'InActive'), 1 =>Yii::t('yii', 'Active')),
             ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {access} {view} {update} {status}',
                'header' => 'Actions',
                
                'buttons' => 
                [
                    'delete' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('yii', 'View'),
                                    'target' => '_blank',
                                    'class' => 'model-delete'
                                ]);
                    },
                    'access' => function ($url, $model) {
                        $new_url = Yii::$app->request->baseUrl.'/admin/role/view?id='.$model->Role_Id;
                        return Html::a('<span class="glyphicon fa fa-user"></span>', $new_url, [
                                    'title' => Yii::t('yii', 'Access'),
                                    'target' => '_blank',
                                    'class' => 'model-update text-success'
                                ]);
                    },
                    'update' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                    'title' => Yii::t('yii', 'Update'),
                                    'target' => '_blank',
                                    'class' => 'model-update'
                                ]);
                    },
                    'view' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-eye-open text-primary"></span>', $url, [
                                    'title' => Yii::t('yii', 'View'),
                                    'target' => '_blank',
                                    'class' => 'model-view'
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
            ]
        ],
    ]);
    ?>
    
    <?php Pjax::end(); ?>
    
<?= $this->render('/common/popup') ?>



    <!--Form Popup End -->
    <?php
    
    $this->registerJs(''
//            .'$("body").on("click", ".btn-create, .model-update, .model-view, .btn-edit-popup", function(){'
//                . '$("#formPopUp").find(".modal-header h2").text($(".pop-up-dummy").find("h2").text());'
//                . '$("#formPopUp").find(".modal-body").find(".form-ajax-content").html($(".pop-up-dummy").find(".dummy-content").html());'
//                . '$("#formPopUp").modal("show");'
//                .' var href = $(this).attr("href");'
//                . '$.get(href, function(data, status){
//                    $(".form-ajax-content").html(data);
//                    
//                    $(".form-ajax-content").parents(".modal-content").find(".modal-header h2").text($(".form-ajax-content").find("h1").hide().text());
//                });'
//                
//                
//                . 'return false;'
//                
//            . '});'
//            
//            .'$("body").on("click", ".model-inactive, .model-active", function(){'
//                . '$("#statusPopUp").modal("show");
//                    var href = $(this).attr("href");
//                    var className = $(this).attr("class");
//                    if($(this).hasClass("model-inactive"))
//                    {   
//                        
//                        $("#statusPopUp").find(".disabled").removeClass("hidden");
//                        $("#statusPopUp").find(".enable").addClass("hidden");
//                    }
//                    else
//                    {
//                        
//                        $("#statusPopUp").find(".disabled").addClass("hidden");
//                        $("#statusPopUp").find(".enable").removeClass("hidden");
//                    }
//                '
//                .''
//                . '$("#statusPopUp").data("href", href);'
//                
//                
//                . 'return false;'
//                
//            . '});'
//            
//            .'$("body").on("click",".status-button", function(){'
//                
//                .' var href = $("#statusPopUp").data("href");'
//                .''
//                . '$.get(href, function(data, status){
//                    $("#statusPopUp").modal("hide");
//                    
//                    $.get("'.Yii::$app->request->baseUrl."/npo/flash".'", function(data, status){
//                        $(".alert-message-cnt").html(data);
////                        setTimeout(function(){$(".alert").slideUp()}, 3000);
//                        setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
//                    });
//                    $.pjax.reload({container:"#p0"});
//                    
//                });'
//                . ''
//
//                . 'return false;'
//                
//            . '});'
            
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
