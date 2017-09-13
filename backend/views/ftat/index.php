<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FtatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Financial Trends Analysis');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftat-index page-content">

    <h1>Financial Trends Analysis</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php Html::a(Yii::t('app', 'Create Ftat'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Ftat_Id',
//            'Organization_Id',
            [
                'attribute' => 'Organization_Id',
                'label'     =>'Organization', 
                'value'     =>function ($model, $index, $widget) { 
                                if(!empty($model->Organization_Id))
                                    return Yii::t('yii', $model->organization->Organization_Name); 
                                else
                                    return '-'; 

                },
//                'filter'    =>array(0 =>Yii::t('yii', 'InActive'),1 =>Yii::t('yii', 'Active')),
             ],
            [
                'attribute' => 'Ftat_Status',
                'label'     =>'Status', 
                'value'     =>function ($model, $index, $widget) { 
                                
                                if(!empty($model->Ftat_Status))
                                    return Yii::t('yii', 'Completed'); 
                                else
                                    return Yii::t('yii', 'In-Progress'); 

                },
                'filter'    =>array(0 =>Yii::t('yii', 'In-Progress'),1 =>Yii::t('yii', 'Completed')),
             ],
//            'Ftat_Status',
//            'Created_By',
//            'Last_Modified_Date',

            ['class' => 'yii\grid\ActionColumn',
                                        'template' => '   {ftat} {status} {dashboard}',
                                        'header' => 'Actions',
                'buttons' => [
                    'view' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-eye-open text-primary "></span>', $url, [
                                    'title' => Yii::t('yii', 'View'),
                                    'target' => '_blank',
                                    'class' => 'model-view'
                                ]);
                    },
                    'dashboard' => function ($url, $model) {
                        
                        if(!empty($model->Is_Accepted))
                        {
                            $url = Yii::$app->request->baseUrl.'/fta/dashboard/'.($model->Organization_Id);
                            return Html::a('<span class="glyphicon fa fa-tachometer text-primary "></span>', $url, [
                                    'title' => Yii::t('yii', 'Dashboard'),
                                    'target' => '_blank',
                                    'class' => 'model-dahboard'
                                ]);
                        }
                    },
                    'ftat' => function ($url, $model) {
                        $url = Yii::$app->request->baseUrl.'/fta/fta/'.($model->Organization_Id);
                        return Html::a('<span class="fa fa-calculator text-success "></span>', $url, [
                                    'title' => Yii::t('yii', 'FTA'),
                                    'target' => '_blank',
                                    'class' => 'model-ftat'
                                ]);
                    },
                    'status' => function ($url, $model) {
                        if(!empty($model->Is_Accepted))
                        {
                             $buttons =  Html::a('<span class="fa fa-ban text-danger"></span>', $url.'?reassign=yes', [
                                    'title' => Yii::t('yii', 'Reassign'),
//                                    'target' => '_blank',
                                    'class' => 'model-declined'
                            ]);
                            
                            $buttons .= ' '. '<span disabled="disabled" class="fa fa-ban text-muted"></span>';
                            return $buttons;
                        }
                        else 
                        {
                            $buttons =  Html::a('<span class="fa fa-ban text-danger"></span>', $url.'?reassign=1', [
                                    'title' => Yii::t('yii', 'Reassign'),
//                                    'target' => '_blank',
                                    'class' => 'model-declined'
                            ]);
                            
                            $buttons .= ' '. Html::a('<span class="fa fa-check-circle  text-success"></span>', $url, [
                                    'title' => Yii::t('yii', 'Accept'),
//                                    'target' => '_blank',
                                    'class' => 'model-accept'
                                ]);
                            
                            return $buttons;
                            

                        }
                    },
                    
                    

                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

    <!-- NPO Approval Popup Start -->
    <?php
            yii\bootstrap\Modal::begin([
                'id' =>'ftatApprovalPopUp',
                'header' => '<h2>Confirmation</h2>',
                'footer' => '<div class="pull-right">
                            <a  class="btn btn-primary approve-fta">Ok</a>
                            <a  class="btn btn-primary popup-cancel">Cancel</a>
                        </div>',
                'size' => 'modal-dialog modal-lg  ',
                
                'options' => ['data-keyboard' => "false", 'data-backdrop' => 'static'],
                
                ]);
                       
    ?>
    <div class="row-fluid ">
            
            <br>
            <span class="">Are you sure you want to <span class="enable hidden">Accept</span> <span class="disabled hidden">Reassign</span>  this <span>FTA</span>?</span>
            <br>
            <br>
            <div class="row reject-form hidden">
                <div class="col-lg-12">
                    <div class="form-group field-organization-notes ">
                        <label class="control-label" for="organization-notes"><b>Notes</b></label>
                        <!--<textarea id="organization-notes" class="form-control" name="Organization[Notes]" aria-invalid="false"></textarea>-->
                        <?php
                            echo TinyMce::widget(  [
                                    'options' => ['rows' => 20],
                                    'name' => "Organization[Notes]",

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
                        <div class="help-block"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>    
    <?php
        yii\bootstrap\Modal::end();
    ?>
    
    <?php
    
    $this->registerJs(''
            . ''
            
            
           
            
            .'$("body").on("click", ".model-accept, .model-declined", function(){'
                . '$("#ftatApprovalPopUp").modal("show");'
                .' var href = $(this).attr("href"); if($(this).hasClass("model-declined"))
                    {
                        $("#ftatApprovalPopUp").find(".reject-form").removeClass("hidden");
                        $("#ftatApprovalPopUp").find(".disabled").removeClass("hidden");
                        $("#ftatApprovalPopUp").find(".enable").addClass("hidden");
                    }
                    else
                    {
                        $("#ftatApprovalPopUp").find(".reject-form").addClass("hidden");
                        $("#ftatApprovalPopUp").find(".disabled").addClass("hidden");
                        $("#ftatApprovalPopUp").find(".enable").removeClass("hidden");
                    }'
                .''
                . '$("#ftatApprovalPopUp").data("href", href);'

                . 'return false;'
                
            . '});'
            
            
            
            
//            .'$("body").on("click",".approve-fta", function(){'
//                
//                .' var href = $("#ftatApprovalPopUp").data("href");'
//            .'tinyMCE.triggerSave();'
//                . ''
//                .' var notes = $("textarea[name=\'Organization[Notes]\']").val();'
//            . ''
//                
//            . "$.ajax({
//                method: 'POST',
//                 url: href,
//                 data: { notes : notes },
//                 success: function(data)
//                 {
//                    $('#ftatApprovalPopUp').modal('hide');
//	
//                        $.get('".Yii::$app->request->baseUrl."/npo/flash"."', function(data, status){
//                                $('.alert-message-cnt').html(data);
//                                setTimeout(function(){
//                                    $('.alert').find('.close').trigger('click')
//                                }, 2000);
//                        });
//
//                        $.pjax.reload({container:'#p0'});
//
//                 }, 
//                 error: function(e)
//                 {
//                    
//                 }
//             });"
//
//                . 'return false;'
//                
//            . '});'
            
            
            .'$(".popup-cancel").click(function(){'
                . '$("#statusPopUp, #ftatApprovalPopUp").modal("hide");'
                . '$("#statusPopUp, #ftatApprovalPopUp").find(".enable, .disabled").addClass("hidden");'
                . 'return false;'
                
            . '});'

            . '', \yii\web\VIEW::POS_READY);
?>
    
</div>
