<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
//use common\models\Category;
//use common\models\ControlType;
/* @var $this yii\web\View */
/* @var $searchModel common\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Programs');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$programsArray = $programs;
$staffTypeProg = [];
$boardTypeProg = [];
$otherTypeProg = [];

foreach($programs as $program)
{
    $programTypeName = strtolower(trim($program->programType->Program_Type_Name));
    
    if($programTypeName == "board")
    {
        $staffTypeProg[$program->Program_Id] = $program->Program_Name;
    }
    else if($programTypeName == "staff") {
        $boardTypeProg[$program->Program_Id] = $program->Program_Name;
    }
    else if($programTypeName == "other") {
        $otherTypeProg[$program->Program_Id] = $program->Program_Name;
    }
    
}

$programs = ArrayHelper::map($programs, 'Program_Id', 'Program_Name');

$applied = ArrayHelper::map($applied, 'Program_Id', 'Program_Id');

?>

<div class="question-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['id' => 'program-selection-form']); ?>
    
    <div class="row">
        <div class="col-lg-4">
            <h2>Board Based Program</h2>
            <?php
                $programsSelected = implode(',', $applied);
                
                $model->Program_Id = $applied;
//                pr($applied);
                echo
                $form->field($model, 'Program_Id')->checkboxList($staffTypeProg,  [
                         'item'=>function ($index, $label, $name, $checked, $value){
                            
                        $checkedOpt = "";
                        $disabled = "";
                        
                        
                        if($checked)
                        {
                            
                           $disabled = "disabled='disabled'";
                           $checkedOpt = "checked='checked'";
                        }
                        else
                        {
                           
                        }
                            
                            return '<div class="col-md-12 form-group">
                                         <label><input name="OrganizationProgramBoard[Program_Id][]" type="checkbox" '.$disabled.'  '.$checkedOpt.'  value="'.$value.'" /> <span>'.$label.'</span></label>
                                    </div>';
                                    }
                      ])->label(false) 
            ?>
        </div>
        <div class="col-lg-4">    
            <h2>Staff Based Program</h2>
            <?php 
            echo 
                $form->field($model, 'Program_Id')->checkboxList($boardTypeProg, [
                    'item' => function ($index, $label, $name, $checked, $value) {
                        $checkedOpt = "";
                        if($checked)
                        {
                            
                           $disabled = "disabled='disabled'";
                           $checkedOpt = "checked='checked'";
                        }
                        else
                        {
                           
                        }
                        return '<div class="col-md-12 form-group">
                                    <label><input name="OrganizationProgramStaff[Program_Id][]" type="checkbox" '.$checkedOpt.' value="' . $value . '" /> <span>' . $label . '</span><label>
                                </div>';
                    }
                ])->label(false)
            ?>
        </div>
        
        <div class="col-lg-4">    
            <h2>Others</h2>
            <?php 
            echo 
                $form->field($model, 'Program_Id')->checkboxList($otherTypeProg, [
                    'item' => function ($index, $label, $name, $checked, $value) {
                        $checkedOpt = "";
                        if($checked)
                        {
                            
                           $disabled = "disabled='disabled'";
                           $checkedOpt = "checked='checked'";
                        }
                        else
                        {
                           
                        }
                        return '<div class="col-md-12 form-group">
                                    <label><input name="OrganizationProgramOther[Program_Id][]" type="checkbox" '.$checkedOpt.' value="' . $value . '" /> <span>' . $label . '</span><label>
                                </div>';
                    }
                ])->label(false)
            ?>
        </div>
        
    </div>
    
    
    <div class="form-group">
        <?php
            if(empty($applied))
                echo Html::submitButton(Yii::t('app', 'Submit'), ['class' => $model->isNewRecord ? 'btn btn-primary program-smt' : 'btn btn-primary']) 
        ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <!-- Form  Popup Start -->
    <?php
            yii\bootstrap\Modal::begin([
                'id' =>'statusPopUp',
                'header' => '<h2>Confirmation</h2>',
                'footer' => '<div class="pull-right">
                            <a  class="btn btn-primary status-button">Ok</a>
                            <a  class="btn btn-primary popup-cancel ">Cancel</a>

                        </div>',
                'size' => 'modal-dialog   ',
                
                'options' => ['data-keyboard' => "false", 'data-backdrop' => 'static'],
                
                ]);
                       
    ?>
        <div class="row-fluid ">
            
            <br>
            <span class="">Are you sure you want to apply for selected Programs?</span>
            <br>
            <br>
            
            <div class="clearfix"></div>
        </div>    
    <?php
        yii\bootstrap\Modal::end();
    ?>


    
    
    
    
    
    <?php
    $disabled ='';
    if(!empty($applied))
        $disabled = '$("input[type=checkbox]").attr("disabled", true);';
    $this->registerJs(''
            . '$(".dropdown-modal").click(function(){ $(this).toggleClass("open")});'
            .'$("body").on("click", ".program-smt", function(){'
            . '
                var $form = $("#program-selection-form");
                var data = $form.data("yiiActiveForm");
                    $.each(data.attributes, function() {
                        this.status = 3;
                    });
                    $form.yiiActiveForm("validate");

                    if ($form.find(".has-error").length  == 0) {
                        $("#statusPopUp").modal("show");
                        var href = $(this).attr("href");
                        $("#statusPopUp").data("href", href);
                        return false;
                    }
'
                . ''
                .' '
                .''
                . ''

                . 'return false;'
                
            . '});'
            . '$("input[name=\'OrganizationProgramBoard[Program_Id][]\']").change(function(){'
            . '     $("input[name=\'OrganizationProgramBoard[Program_Id][]\']").not(this).attr("checked", false);'
            . '});'
            . "$('.popup-cancel').click(function(e) {
                    e.preventDefault();
                    $('#statusPopUp').modal('hide');
                }); 
                $('body').on('click', '.status-button', function(){
                     $('#program-selection-form').submit();  
                        
                });
"
            
            
//            .'$("body").on("click", ".program-smt", function(){'
//                . '$("#statusPopUp").modal("show");'
//                .' var href = $(this).attr("href");'
//                .''
//                . '$("#statusPopUp").data("href", href);'
//
//                . 'return false;'
//                
//            . '});'
//            .'$("body").on("click", ".status-button", function(){'
//                .'$("#program-selection-form").submit();'
//
//                . 'return false;'
//                
//            . '});'
            . ''.$disabled
            
            
            
            . '', \yii\web\VIEW::POS_READY);
?></div>
