<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\PartnerType;
use common\models\OrgStatus;
/* @var $this yii\web\View */
/* @var $searchModel common\models\OrganizationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Organizations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-index   page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Organization'), ['create'], ['class' => 'btn btn-primary  btn-create']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Organization_Id',
            'Organization_Name',
//            'Contact',
//            'Designation',
//            'Initial_Contact_Type_Id',
            // 'Initial_Contact_Date',
            // 'Status_Action_Type_Id',
            // 'Status_Action_Date',
            // 'Budget',
            // 'Youth_Served',
            // 'Staff_Size',
            // 'Board_Size',
            // 'Year_Incorporated',
            // 'Fit',
            // 'Notes',
            // 'Program_Year_Applied',
            // 'Email:email',
            // 'Phone',
            // 'Mailing_Address',
            // 'BADV_Prospects',
//             'Partner_Type_Id',
//            [
//                'attribute' => 'Partner_Type_Id',
//                'label'     => 'Partner Type', 
//                'value'     => function ($model, $index, $widget) { 
//                                if(!empty($model->Partner_Type_Id))
//                                    return $model->partnerType->Partner_Type_Name; 
//                                else
//                                    return '-'; 
//                
//                },
//                'filter'    =>ArrayHelper::map(PartnerType::find()->asArray()->all(), 'Partner_Type_Id', 'Partner_Type_Name'),
//            ],
            // 'Hiring_Type_Id',
//             'Is_Active',
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
            [
                'attribute' => 'Status',
                'label'     =>'NPO Application Status', 
                'value'     =>function ($model, $index, $widget) { 
                                if($model->Status == 1)
                                {
                                    
                                    return Yii::t('yii', 'Approved'); 
                                }
                                else if($model->Status == 2)
                                {
                                    
                                    return Yii::t('yii', 'Declined'); 
                                }
                                else if($model->Status == 3)
                                {
                                    return Yii::t('yii', 'Pending'); 
                                }

                },
                'filter'    =>ArrayHelper::map(OrgStatus::find()->asArray()->all(), 'Org_Status_Id', 'Org_Status_Description'),
             ],
            // 'Created_Date',
            // 'Created_By',
            // 'Last_Modified_Date',

            ['class' => 'yii\grid\ActionColumn',
                                        'template' => ' {view} {update} {status} {approve} {updated}',
                                        'header' => 'Actions',
                'buttons' => [
                    'view' => function ($url, $model) {
                        $updated = '';
                        if($model->Is_Updated == 1 && !in_array($model->Status, [1,2]))
                        {
                            $updated = '<sup class="text-success"><i class="fa fa-bell-o" aria-hidden="true"></i></sup>';
                        }
                        return Html::a($updated.'<span class="glyphicon glyphicon-eye-open text-primary "></span>' , $url, [
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
                            return Html::a('<span class="fa fa-ban text-danger"></span>', $url."?active=". urlencode(base64_encode("no")), [
                                    'title' => Yii::t('yii', 'InActive'),
                                    'target' => '_blank',
                                    'class' => 'model-inactive'
                                ]);
                        }
                        else 
                        {
                            return Html::a('<span class="fa fa-check-circle  text-success"></span>', $url."?active=".urlencode(base64_encode("yes")), [
                                    'title' => Yii::t('yii', 'Active'),
                                    'target' => '_blank',
                                    'class' => 'model-active'
                                ]);
                            

                        }
                    },
                    'approve' => function ($url, $model) {
                        if($model->Status == 1)
                        {
                            return Html::a('<i class="fa fa-times text-danger" aria-hidden="true"></i>', $url.'?decline=yes', [
                                    'title' => Yii::t('yii', 'Decline'),
                                    'target' => '_blank',
                                    'class' => 'model-declined'
                                ]);
                        }
                        else if($model->Status == 2) 
                        {
                            return Html::a('<i class="fa fa-check-square-o text-success" aria-hidden="true"></i>', $url, [
                                    'title' => Yii::t('yii', 'Approve'),
                                    'target' => '_blank',
                                    'class' => 'model-approve'
                                ]);


                        }
                        else if($model->Status == 3) 
                        {
                            if(empty($model->As_Draft))
                            {
                                return  Html::a('<i class="fa fa-times text-danger" aria-hidden="true"></i>', $url.'?decline=yes', [
                                        'title' => Yii::t('yii', 'Declined'),
                                        'target' => '_blank',
                                        'class' => 'model-declined'
                                    ]).' '.Html::a('<i class="fa fa-check-square-o text-success" aria-hidden="true"></i>', $url, [
                                        'title' => Yii::t('yii', 'Approve'),
                                        'target' => '_blank',
                                        'class' => 'model-approve'
                                    ]);
                            }
                                
                            
                            

                        }
                    },
                    

                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>  
    
    
    <!-- Form  Popup Start -->
    <?php
            yii\bootstrap\Modal::begin([
                'id' =>'formPopUp',
                'header' => '<h2>Loading...</h2>',
                'size' => 'modal-dialog modal-lg  ',
                'options' => ['data-keyboard' => "false", 'data-backdrop' => 'static'],
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
                'id' =>'statusPopUp',
                'header' => '<h2>Confirmation</h2>',
                'footer' => '<div class="pull-right">
                            <a  class="btn btn-primary status-button">Ok</a>
                            <a  class="btn btn-primary popup-cancel">Cancel</a>

                        </div>',
                'size' => 'modal-dialog   ',
                
                'options' => ['data-keyboard' => "false", 'data-backdrop' => 'static'],
                
                ]);
                       
    ?>
        <div class="row-fluid ">
            
            <br>
            <span class="">Are you sure you want to <span class="enable hidden">active</span> <span class="disabled hidden">inactive</span>?</span>
            <br>
            <br>
            
            <div class="clearfix"></div>
        </div>    
    <?php
        yii\bootstrap\Modal::end();
    ?>



    <!--Form Popup End -->
    
    <!-- NPO Approval Popup Start -->
    <?php
            yii\bootstrap\Modal::begin([
                'id' =>'npoApprovalPopUp',
                'header' => '<h2>Confirmation</h2>',
                'footer' => '<div class="pull-right">
                            <a  class="btn btn-primary approve-npo">Ok</a>
                            <a  class="btn btn-primary popup-cancel">Cancel</a>
                        </div>',
                'size' => 'modal-dialog   ',
                
                'options' => ['data-keyboard' => "false", 'data-backdrop' => 'static'],
                
                ]);
                       
    ?>
        <div class="row-fluid ">
            
            <br>
            <span class="">Are you sure you want to <span class="enable hidden">approve</span> <span class="disabled hidden">decline</span> <span></span>?</span>
            <br>
            <br>
            <div class="row reject-form hidden">
                <div class="col-lg-12">
                    <div class="form-group field-organization-notes has-success">
                        <label class="control-label" for="organization-notes">Notes</label>
                        <textarea id="organization-notes" class="form-control" name="Organization[Notes]" aria-invalid="false"></textarea>

                        <div class="help-block"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>    
    <?php
        yii\bootstrap\Modal::end();
    ?>



    <!--Form Popup End -->
    <?php
    
    $this->registerJs(''
            
            
            
            
//            .'$("body").on("click", ".model-approve, .model-declined", function(){'
//                . '$("#npoApprovalPopUp").modal("show");'
//                .' var href = $(this).attr("href"); if($(this).hasClass("model-declined"))
//                    {
//                        $("#npoApprovalPopUp").find(".reject-form").removeClass("hidden");
//                        $("#npoApprovalPopUp").find(".disabled").removeClass("hidden");
//                        $("#npoApprovalPopUp").find(".enable").addClass("hidden");
//                    }
//                    else
//                    {
//                        $("#npoApprovalPopUp").find(".reject-form").addClass("hidden");
//                        $("#npoApprovalPopUp").find(".disabled").addClass("hidden");
//                        $("#npoApprovalPopUp").find(".enable").removeClass("hidden");
//                    }'
//                .''
//                . '$("#npoApprovalPopUp").data("href", href);'
//
//                . 'return false;'
//                
//            . '});'
//            
//            
//           
//            
//            .'$("body").on("click",".approve-npo", function(){'
//                
//                .' var href = $("#npoApprovalPopUp").data("href");'
//                .' var notes = $("#organization-notes").val();'
//                .''
//
//                . ''
//            . "$.ajax({
//                method: 'POST',
//                 url: href,
//                 data: { notes : notes },
//                 success: function(data)
//                 {
//                    $('#npoApprovalPopUp').modal('hide');
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
//            
//            
//            .'$(".popup-cancel").click(function(){'
//                . '$("#statusPopUp, #npoApprovalPopUp").modal("hide");'
//                . '$("#statusPopUp, #npoApprovalPopUp").find(".enable, .disabled").addClass("hidden");'
//                . 'return false;'
//                
//            . '});'

            . '', \yii\web\VIEW::POS_READY);
?></div>
