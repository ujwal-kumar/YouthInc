<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\Organization;
use common\models\Program;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $searchModel common\models\OrganizationProgramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'NPO Program Applications');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-program-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php Html::a(Yii::t('app', 'Create Organization Program'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'Organization_Id',
                'label'     => 'Organization', 
                'value'     => function ($model, $index, $widget) { 
                                if(!empty($model->Organization_Id))
                                    return $model->organization->Organization_Name; 
                                else
                                    return '-'; 
                
                },
                'filter'    =>ArrayHelper::map(Organization::find()->asArray()->orderBy(['Organization_Name'=>SORT_ASC])->all(), 'Organization_Id', 'Organization_Name'),
            ],
//            'Org_Program_Id',
//            'Organization_Id',
//            'Program_Id',
            [
                'attribute' => 'Program_Id',
                'label'     => 'Program', 
                'value'     => function ($model, $index, $widget) { 
                                if(!empty($model->Program_Id))
                                    return $model->program->Program_Name; 
                                else
                                    return '-'; 
                
                },
                'filter'    =>ArrayHelper::map(Program::find()->asArray()->orderBy(['Program_Name'=>SORT_ASC, 'Is_Active' => 1])->all(), 'Program_Id', 'Program_Name'),
            ],
            [
                'attribute' => 'Is_Approved',
                'label'     =>'Status', 
                'value'     =>function ($model, $index, $widget) { 
                                if(empty($model->Is_Approved))
                                    return Yii::t('yii', 'Applied'); 
                                else if ($model->Is_Approved == 1)
                                    return Yii::t('yii', 'Approved'); 
                                else if ($model->Is_Approved == 2)
                                    return Yii::t('yii', 'Rejected'); 

                },
                'filter'    =>array(0 =>Yii::t('yii', 'Applied'),1 =>Yii::t('yii', 'Approved'), 2 =>Yii::t('yii', 'Rejected')),
             ],
            'Year',
//            'Is_Approved',
            
            // 'Created_Date',
            // 'Created_By',
            // 'Last_Modified_Date',

            ['class' => 'yii\grid\ActionColumn',
                                        'template' => ' {view} {reject} {status} {question-map}',
                                        'header' => 'Actions',
                'buttons' => [
                    'view' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-eye-open text-primary text-primary"></span>', $url, [
                                    'title' => Yii::t('yii', 'View'),
                                    'target' => '_blank',
                                    'class' => 'model-view'
                                ]);
                    },
                    'reject' => function ($url, $model) {
                        
                        if($model->Is_Approved == 2 || $model->Is_Approved == 1)
                        {
//                            return '<span disabled="disabled" class="fa fa-ban text-muted"></span>';
                        }
                        else 
                        {
                            $url = $url .'&program='.$model->Program_Id.'&org='.$model->Organization_Id;
                            return Html::a('<span class="fa fa-ban text-danger "></span>', $url, [
                                    'title' => Yii::t('yii', 'Reject'),
                                    'target' => '_blank',
                                    'class' => 'model-reject',
                                    'data-program' => $model->Organization_Id,
                                    'data-org' => $model->Program_Id,
                                ]);
                            

                        }
                      
                    },
                    'status' => function ($url, $model) 
                    {
                        $url = $url .'&program='.$model->Program_Id.'&org='.$model->Organization_Id;
                        if($model->Is_Approved == 1)
                        {
//                            return '<span disabled="disabled" class="fa fa-check-circle text-muted"></span>';
                        }
                        else 
                        {
                            return Html::a('<span disabled="disabled" class="fa fa-check-circle text-success"></span>', $url, [
                                    'title' => Yii::t('yii', 'Approve'),
                                    'target' => '_blank',
                                    'class' => 'model-approve',
                                    'data-program' => $model->Organization_Id,
                                    'data-org' => $model->Program_Id,
                                
                                ]);
                            

                        }
                    },
                    'question-map' => function ($url, $model) 
                    {
                        $url = $url .'&program='.$model->Program_Id.'&org='.$model->Organization_Id;
                        if( $model->Is_Approved == 1)
                        {
                            return Html::a('<span disabled="disabled" class="menu-icon fa fa-question-circle-o"></span>', $url, [
                                    'title' => Yii::t('yii', 'Questions'),
                                    'target' => '_blank',
                                    'class' => 'model-question-map text-danger',
                                    'data-program' => $model->Organization_Id,
                                    'data-org' => $model->Program_Id,
                                
                                ]);
                        }
                        
                    }

                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
    
    
    

    <!-- Form  Popup Start -->
    <?php
            yii\bootstrap\Modal::begin([
                'id' =>'statusPopUp',
                'header' => '<h2>Confirmation</h2>',
                'footer' => '<div class="pull-right">
                            <a  class="btn btn-primary reject-button">Ok</a>
                            <a  class="btn btn-primary popup-cancel">Cancel</a>

                        </div>',
                'size' => 'modal-dialog modal-lg ',
                
                'options' => ['data-keyboard' => "false", 'data-backdrop' => 'static'],
                
                ]);
                       
    ?>
        <div class="row-fluid ">
            
            <br>
            <span class="">Do you want to reject the Application?</span>
            <br>
            <br>
            <div class="row reject-form">
                <div class="col-lg-12">
                    <div class="form-group field-organization-notes has-success">
                        <label class="control-label" for="organization-notes">Notes</label>
                        <?php
                            echo TinyMce::widget(  [
                                    'options' => ['rows' => 20],
                                    
                                    'name' => "OrganizationProgram[Notes]",
                                    'value' => '',
                                    'language' => 'en',
                                    'clientOptions' => [
                                        'plugins' => [
                                            "advlist autolink lists link charmap print preview anchor",
                                            "searchreplace visualblocks code fullscreen",
                    //                        "insertdatetime media table contextmenu paste"
                                        ],
                                        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                                        'menubar' => false,
                                        'required' => 'required'

                                    ]
                                ]);
                        ?>
                        <!--<textarea id="organization-notes" class="form-control" name="OrganizationProgram[Notes]" aria-invalid="false"></textarea>-->

                        <div class="help-block"></div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>
        </div>    
    <?php
        yii\bootstrap\Modal::end();
    ?>
    
    <div class="pop-up-dummy hidden">
        <h2>Loading...</h2>
        
        <div class="row-fluid dummy-content">
            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </div> 
    </div>
    
    
    <!-- Form  Popup Start -->
    <?php
            yii\bootstrap\Modal::begin([
                'id' =>'approvePopUp',
                'header' => '<h2>Confirmation</h2>',
                'footer' => '<div class="pull-right">
                                <a  class="btn btn-primary approval-button">Ok</a>
                                <a  class="btn btn-primary popup-cancel">Cancel</a>
                            </div>',
                'size' => 'modal-dialog   ',
                
                'options' => ['data-keyboard' => "false", 'data-backdrop' => 'static'],
                
                ]);
                       
    ?>
        <div class="row-fluid popup-content">
            
            <br>
            <span class="">Do you want to Approve the Application?</span>
            <br>
            <br>
            
            <div class="clearfix"></div>
        </div>
    
        <div class="row-fluid loading-cnt hidden pull-left">
            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </div>
        
    <?php
        yii\bootstrap\Modal::end();
    ?>
    
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

<!--Form Popup End -->
    <?php
    
    $this->registerJs(''
            
            
//            .'$("body").on("click", ".model-reject", function(){'
//                . '$("#statusPopUp").modal("show");'
//                .' var href = $(this).attr("href");'
//                .''
//                . '$("#statusPopUp").data("href", href);'
//                . '$("#statusPopUp").find(".enable").removeClass("hidden");'
//                
//                . 'return false;'
//                
//            . '});'
//           
//            .'$("body").on("click", ".model-approve", function(){'
//                . '$("#approvePopUp").modal("show");'
//                .' var href = $(this).attr("href");'
//                .''
//                . '$("#approvePopUp").data("href", href);'
//                
//                . 'return false;'
//                
//            . '});'
//            
//            .'$("body").on("click",".reject-button", function(){'
//                
//                .' var href = $("#statusPopUp").data("href");'
//                . 'var notes = $("#organization-notes").val();'
//                . '
//                    var $this = $(this);
//                    submitButtonDisable($this);
//                    '
//   
//                    . "$.ajax({
//                        method: 'POST',
//                         url: href,
//                         data: { notes : notes },
//                         success: function(data)
//                         {
//                            submitButtonEnable(".'$this'.");
//                            $('#statusPopUp').modal('hide');
//
//                                ".'
//                                $.ajax({
//                                    url: baseUrl+"/npo/flash",
//                                    type: "GET",
//                                    success: function(data){ 
//                                        $(".alert-message-cnt").html(data);
//                                        setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
//                                        $.pjax.reload({container:"#p0"});
//                                    },
//                                    error: function(data) {
//                                        alert("woops!"); //or whatever
//                                    }
//                                });
//                            '."
//
//                                
//
//                         }, 
//                         error: function(e)
//                         {
//
//                         }
//                     });"
//
//                . 'return false;'
//                
//            . '});'
//            .'$("body").on("click",".approval-button", function(){'
//                .'
//                    $(".loading-cnt").removeClass("hidden");
//                    $(".popup-content").addClass("hidden");
//                    $("#formPopUp").find(".modal-header h2").text($(".pop-up-dummy").find("h2").text());
//                    $("#formPopUp").find(".modal-body").find(".form-ajax-content").html($(".pop-up-dummy").find(".dummy-content").html());
//                    var $this = $(this);
//                    submitButtonDisable($this);
//                '
//                .' var href = $("#approvePopUp").data("href");'
//                . '$.ajax({
//                        url: href,
//                        type: "GET",
//                        success: function(data){ 
//                            $(".loading-cnt").addClass("hidden");
//                            $(".popup-content").removeClass("hidden");
//                            $("#approvePopUp").modal("hide");
//                            $("#formPopUp").modal("show");
//                            $("#formPopUp").find(".form-ajax-content").html(data);
//
//                            $(".form-ajax-content").parents(".modal-content").find(".modal-header h2").text($(".form-ajax-content").find("h1").hide().text());
//                            
//                        },
//                        error: function(data) {
//                            alert("woops!"); //or whatever
//                        }
//                    });
//                    
//                    '
//                
//                . ''
//
//                . 'return false;'
//                
//            . '});'
//            
//            .'$("body").on("click",".model-question-map", function(){'
//                .'
//                    $(".loading-cnt").removeClass("hidden");
//                    $(".popup-content").addClass("hidden");
//                    $("#formPopUp").find(".modal-header h2").text($(".pop-up-dummy").find("h2").text());
//                    $("#formPopUp").find(".modal-body").find(".form-ajax-content").html($(".pop-up-dummy").find(".dummy-content").html());
//                    $("#formPopUp").modal("show");
//                '
//                .' var href = $(this).attr("href");'
//                . '$.ajax({
//                        url: href,
//                        type: "GET",
//                        success: function(data){ 
//                            $(".loading-cnt").addClass("hidden");
//                            $(".popup-content").removeClass("hidden");
//                            $("#approvePopUp").modal("hide");
//                            $("#formPopUp").modal("show");
//                            $("#formPopUp").find(".form-ajax-content").html(data);
//
//                            $(".form-ajax-content").parents(".modal-content").find(".modal-header h2").text($(".form-ajax-content").find("h1").hide().text());
//                        },
//                        error: function(data) {
//                            alert("woops!"); //or whatever
//                        }
//                    });
//                    
//                    '
//                
//                . ''
//                . ''
//
//                . 'return false;'
//                
//            . '});'
//            
//            .'$("body").on("click",".question-org-map-submit", function(){'
//                .'
//                    var data = $("#questionMap").serialize();
//                    var href = $("#questionMap").attr("action");
//                    var $this = $(this);
//                    submitButtonDisable($this);
//                    $.ajax({
//                        url: href,
//                        type: "POST",
//                        data : data,
//                        success: function(data){ 
//                            $("#formPopUp").modal("hide");
//
//                            $.ajax({
//                                url: baseUrl+"/npo/flash",
//                                type: "GET",
//                                success: function(data){ 
//                                    $(".alert-message-cnt").html(data);
//                                    setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
//                                    $.pjax.reload({container:"#p0"});
//                                },
//                                error: function(data) {
//                                    alert("woops!"); //or whatever
//                                }
//                            });
//                            
//                        },
//                        error: function(data) {
//                            alert("woops!"); //or whatever
//                        }
//                    });
////                    $.post( href, data , function( data ) {
////                        $("#formPopUp").modal("hide");
//////                        $("#formPopUp").html(data);
////                    
////                        $.get("'.Yii::$app->request->baseUrl."/npo/flash".'", function(data, status){
////                            $(".alert-message-cnt").html(data);
////
////                            setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
////                        });
////                        $.pjax.reload({container:"#p0"});
////                    });
//                '
//                
//
//                . 'return false;'
//                
//            . '});'
//            
//            .'$(".popup-cancel").click(function(){'
//                . '$("#statusPopUp").modal("hide");'
//                . '$("#approvePopUp").modal("hide");'
//                
//                . 'return false;'
//                
//            . '});'
//            
//            ."$('body').on('click', '.select-all',function(){
//                if(this.checked){
//                    $('.ace').each(function(){
//                        this.checked = true;
//                    });
//                }else{
//                     $('.ace').each(function(){
//                        this.checked = false;
//                    });
//                }
//            });
//
//            $('body').on('click', '.ace',function(){
//                if($('.ace:checked').length == $('.ace').length){
//                    $('.select-all').prop('checked',true);
//                }else{
//                    $('.select-all').prop('checked',false);
//                }
//            });"

            . '', \yii\web\VIEW::POS_READY);
?></div>
