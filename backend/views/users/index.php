<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\Role;
use common\models\Organization;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index  page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-primary  btn-create']) ?>
    </p>
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'User_Id',
            'User_Name',
            'Email_Id:email',
//            'Password',
//            'Is_Locked',
            // 'Login_Attempt',
            // 'Is_Active',
             
            [
                'attribute' => 'Role_Id',
                'label'     => 'Role', 
                'value'     => function ($model, $index, $widget) { 
                                    return $model->role->Role_Name; 
                },
                'filter'    =>ArrayHelper::map(Role::find()->where(['Is_Active' => 1])->orderBy(['Role_Name'=>SORT_ASC])->asArray()->all(), 'Role_Id', 'Role_Name'),
            ],
//             'Organization_Id',
            [
                'attribute' => 'Organization_Id',
                'label'     =>'Organization', 
                'value'     =>function ($model, $index, $widget) { 
                                if(!empty($model->Organization_Id))
                                    return $model->organization->Organization_Name;
                                else
                                    return ''; 

                },
                'filter'    =>ArrayHelper::map(Organization::find()->where(['Is_Active' => 1])->orderBy(['Organization_Name'=>SORT_ASC])->asArray()->all(), 'Organization_Id', 'Organization_Name'),
             ],
            // 'Auth_Key',
            // 'Access_Token',
            // 'Created_Date',
            // 'Last_Modified_Date',
            [
                'attribute' => 'Is_Active',
                'label'     =>'Status', 
                'value'     =>function ($model, $index, $widget) { 
                                if(!empty($model->Is_Active))
                                    return Yii::t('yii', 'Active'); 
                                else
                                    return Yii::t('yii', 'InActive'); 

                },
                'filter'    =>array( "" =>Yii::t('yii', 'All'), 0 =>Yii::t('yii', 'InActive'),1 =>Yii::t('yii', 'Active')),
             ],
            ['class' => 'yii\grid\ActionColumn',
                            'template' => Helper::filterActionColumn(' {view} {update} {status} {lock}'),
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
                    },
                    'lock' => function ($url, $model) {
                        if(!empty($model->Is_Locked))
                        {
                            return Html::a('<span class="fa fa-unlock text-danger"></span>', $url, [
                                    'title' => Yii::t('yii', 'Unlock'),
                                    'target' => '_blank',
                                    'class' => 'model-unlock'
                                ]);
                        }
                        else 
                        {
                            return Html::a('<span class="fa fa-lock text-success"></span>', $url, [
                                    'title' => Yii::t('yii', 'Lock'),
                                    'target' => '_blank',
                                    'class' => 'model-lock'
                                ]);


                        }
                    }
                    

                ]
            ],
        ],
    ]); ?>

    
    <!-- NPO Approval Popup Start -->
    <?php
            yii\bootstrap\Modal::begin([
                'id' =>'accountLockPopUp',
                'header' => '<h2>Confirmation</h2>',
                'footer' => '<div class="pull-right">
                            <a  class="btn btn-primary user-lock">Ok</a>
                            <a  class="btn btn-primary popup-cancel">Cancel</a>

                        </div>',
                'size' => 'modal-dialog   ',
                
                'options' => ['data-keyboard' => "false", 'data-backdrop' => 'static'],
                
                ]);
                       
    ?>
        <div class="row-fluid ">
            
            <br>
            <span class="">
                <span class="enable hidden">Do you want block the User?</span> 
                <span class="disabled hidden">Do you want to unlock the blocked User?</span>  
            </span>
            <br>
            <br>
            
            <div class="clearfix"></div>
        </div>    
    <?php
        yii\bootstrap\Modal::end();
    ?>



    <!--Form Popup End -->
<?= $this->render('/common/popup') ?>
<?php Pjax::end(); ?>
    <?php
    
    $this->registerJs(''
//            .'$("body").on("click", ".btn-create, .model-update, .model-view, .btn-edit-popup", function(){'
//                . '$("#formPopUp").find(".modal-header h2").text($(".pop-up-dummy").find("h2").text());'
//                . '$("#formPopUp").find(".modal-body").find(".form-ajax-content").html($(".pop-up-dummy").find(".dummy-content").html());'
//                . '$("#formPopUp").modal("show");'
//                .' var href = $(this).attr("href");'
//                . '
//                    
//                $.ajax({
//                    url: href,
//                    type: "GET",
//                    success: function(data){ 
//                        $(".form-ajax-content").html(data);
//                        $(".form-ajax-content").parents(".modal-content").find(".modal-header h2").text($(".form-ajax-content").find("h1").hide().text());
//                    },
//                    
//                });
//
//                return false;
//                
//            });'
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
//                $("#statusPopUp").data("href", href);'
//                
//                
//                . 'return false;'
//                
//            . '});'
//            
//            .'$("body").on("click", ".model-unlock, .model-lock", function(){'
//                . '$("#accountLockPopUp").modal("show");
//                    var href = $(this).attr("href");
//                    var className = $(this).attr("class");
//                    if($(this).hasClass("model-unlock"))
//                    {
//                        $("#accountLockPopUp").find(".disabled").removeClass("hidden");
//                        $("#accountLockPopUp").find(".enable").addClass("hidden");
//                    }
//                    else
//                    {
//                       
//                        $("#accountLockPopUp").find(".disabled").addClass("hidden");
//                        $("#accountLockPopUp").find(".enable").removeClass("hidden");
//                    }
//                '
//                .''
//                . '$("#accountLockPopUp").data("href", href);'
//                
//                
//                . 'return false;'
//                
//            . '});'
//            
//
//            
//            // User Actinve/Inactive
//            .'$("body").on("click",".status-button", function(){'
//                
//                .' var href = $("#statusPopUp").data("href");'
//                .'
//                    $.ajax({
//                        url: href,
//                        type: "GET",
//                        success: function(data){ 
//                            $("#statusPopUp").modal("hide");
//                            $.pjax.reload({container:"#p0"});
//                            
//                            $.ajax({
//                                url: "'.Yii::$app->request->baseUrl."/npo/flash".'",
//                                type: "GET",
//                                success: function(data){ 
//                                    $(".alert-message-cnt").html(data);
//                                    setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
//                                },
//                                error: function(data) {
//                                    alert("woops!"); //or whatever
//                                }
//                            });
//                        },
//                        error: function(data) {
//                            alert("woops!"); //or whatever
//                        }
//                    });
//                    '
//
//                . ''
//
//                . 'return false;'
//                
//            . '});'
//            
//            // User Actinve/Inactive
//            .'$("body").on("click",".user-lock", function(){'
//                
//                .' var href = $("#accountLockPopUp").data("href");'
//                .'
//                    $.ajax({
//                        url: href,
//                        type: "GET",
//                        success: function(data){ 
//                            $("#accountLockPopUp").modal("hide");
//                            $.pjax.reload({container:"#p0"});
//                            
//                            $.ajax({
//                                url: "'.Yii::$app->request->baseUrl."/npo/flash".'",
//                                type: "GET",
//                                success: function(data){ 
//                                    $(".alert-message-cnt").html(data);
//                                    setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
//                                },
//                                error: function(data) {
//                                    alert("woops!"); //or whatever
//                                }
//                            });
//                        },
//                        error: function(data) {
//                            alert("woops!"); //or whatever
//                        }
//                    });
//                    '
//
//                . 'return false;'
//                
//            . '});'
//            
//            .'$(".popup-cancel").click(function(){'
//                . '$("#statusPopUp").modal("hide");'
//                . '$("#statusPopUp, #accountLockPopUp").modal("hide");'
//                . '$("#statusPopUp, #accountLockPopUp").find(".enable, .disabled").addClass("hidden");'
//                . 'return false;'
//                
//            . '});'
//            
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
