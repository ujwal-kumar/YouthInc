<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use kartik\date\DatePicker;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Organization */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="organization-form">

    <?php $form = ActiveForm::begin([
                'options' => [
                    'id' => 'create-npo-form',
                    
                ],
                'validateOnChange'     => false,
                'enableAjaxValidation' => true,
                'validateOnSubmit'     => true,
    ]); ?>
    
    <?php
        $intialsTypeList = ArrayHelper::map($intialsTypeList, 'Initial_Contact_Type_Id', 'Initial_Contact_Type_Name');
        $partnerTypeList = ArrayHelper::map($partnerTypeList, 'Partner_Type_Id', 'Partner_Type_Name');
        $statusTypeList = ArrayHelper::map($statusTypeList, 'Status_Action_Type_Id', 'Status_Action_Type_Name');
        $hiringTypeList = ArrayHelper::map($hiringTypeList, 'Hiring_Type_Id', 'Hiring_Type_Name');
    ?>
    
    <?php
        $dateRange = array_flip(range(date('Y'), 1900));
        $dateRange = array_combine(range(date('Y'), 1900), range(date('Y'), 1900))
    ?>
    
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Organization_Name')->textInput() ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'Contact')->textInput() ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Designation')->textInput() ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'Initial_Contact_Type_Id')->dropDownList($intialsTypeList,['prompt'=>'Select']) ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php   $form->field($model, 'Initial_Contact_Date')->textInput() ?>
            
            <div class="form-group field-organization-initial_contact_date">
                <label class="control-label" for="organization-initial_contact_date">Initial  Contact  Date <i class="fa fa-calendar" aria-hidden="true"></i></label>
                    <?= 
                        
                        $form->field($model, 'Initial_Contact_Date')->widget(DatePicker::className(),[
                            'options' => ['class' => "form-control datepicker", ], 
                            'dateFormat' => 'yyyy-MM-dd',
                       ])->label(false);
                   ?>

                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'Status_Action_Type_Id')->dropDownList($statusTypeList, ['prompt'=>'Select']) ?>
           
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Budget')->textInput() ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'Youth_Served')->textInput() ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Staff_Size')->textInput() ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'Board_Size')->textInput() ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="hidden">
                
            </div>
            <div class="form-group field-organization-status_action_date">
                <label class="control-label" for="organization-status_action_date">Status Action Date <i class="fa fa-calendar" aria-hidden="true"></i></label>
                <?= 
                    \yii\jui\DatePicker::widget([
                       'model' => $model,
                       'attribute' => 'Status_Action_Date',
                       'options' => ['class' => "form-control datepicker", ], 
                       'dateFormat' => 'yyyy-MM-dd',
                   ]);
               ?>
                <div class="help-block"></div>
            </div>
            
            <?php   $form->field($model, 'Status_Action_Date')->textInput(['class' => "form-control hasDatepicker"])->label("Initial Contact Date <i class=\"fa fa-calendar\" aria-hidden=\"true\"></i>"); ?>
            
        </div>
        <div class="col-lg-6"><?php echo  $form->field($model, 'Year_Incorporated')->dropDownList($dateRange, ['prompt'=>'Select']); ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php 
               
                echo $form->field($partner, 'Partner_Type_Id')->checkboxList($partnerTypeList) 
//                echo $form->field($partner, 'Partner_Type_Id')->checkboxList($partnerTypeList, [
//                         'item'=>function ($index, $label, $name, $checked, $value){
//                            
//                        $checkedOpt = "";
//                        $disabled = "";
//                        
//                       
//                        
//                        if("new" == strtolower($label))
//                        {
//                            
//                           $disabled = "disabled='disabled'";
//                           $checkedOpt = "checked='checked'";
//                        }
//                        else
//                        {
//                           
//                        }
//                            
//                            return '
//                                         <label><input name="OrganizationProgramBoard[Program_Id][]" type="checkbox" '.$disabled.'  '.$checkedOpt.'  value="'.$value.'" /> <span>'.$label.'</span></label>
//                                    ';
//                                    }
//                      ]) 
            ?>
        </div>
        <div class="col-lg-6">
            
            <?= $form->field($model, 'Program_Year_Applied')->dropDownList($dateRange, ['prompt'=>'Select']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Email')->textInput() ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'Phone')->textInput() ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Mailing_Address')->textInput() ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'BADV_Prospects')->textInput() ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Fit')->dropDownList(["Yes", "No"], ['prompt'=>'Select']) ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'Hiring_Type_Id')->dropDownList($hiringTypeList, ['prompt'=>'Select']) ?></div>
    </div>
    
    <div class="row">
        <div class="col-lg-12"><?= $form->field($model, 'Notes')->textarea() ?></div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class=" ">
                <label class="control-label" for="organization-fit">&nbsp;</label>
                <div class="col-lg-4">
                    <?php 
                        $checked = false;
                        if($model->Is_Active == 1)
                        {
                            $checked = true;
                        }
                        $checkboxTemplate = '<div class="checkbox i-checks">{beginLabel}{input}{labelTitle}{endLabel}{error}{hint}</div>'; 
                     ?>
                    <?php echo $form->field($model, 'Is_Active')->hiddenInput(['value'=> 0, 'id' => false])->label(false); ?>
                    <?= $form->field($model, 'Is_Active', ['template' => "<div class=\"radio\">\n{input}\n<span class='lbl is-active-lbl'>{label}</span>\n{error}\n{hint}\n</div>"])->input("checkbox",['value' => "1", "class" => "ace", "checked" => $model->isNewRecord ? true : $checked ], false) ?>
                </div>
                <div class="col-lg-4">
                    <!-- As Draft -->
                <?php 
                
                    if(!empty($model->As_Draft) || $model->isNewRecord) {
                    $checked = false;
                    if($model->As_Draft == 1)
                    {
                        $checked = true;
                    }
                    else 
                    {

                    }
                     $checkboxTemplate = '<div class="checkbox i-checks">'
                                 . '{beginLabel}'
                                 . '{input}'
                                 . '{labelTitle}'
                                 . '{endLabel}'
                                 . '{error}'
                                 . '{hint}'
                             . '</div>'; 
                    ?>
                    <?php echo $form->field($model, 'As_Draft')->hiddenInput(['value'=> 0, 'id' => false])->label(false); ?>
                    <?php
                        if(empty($model->As_Draft))
                        {
                            echo $form->field($model, 'As_Draft', [
                            'template' => "<div class=\"radio \">\n{input}\n"
                            . "<span class='lbl is-active-lbl'>{label}</span>"
                            . "\n{error}\n{hint}\n</div>"])->input("checkbox",[
                                'value' => "1", "class" => "ace", 
                                "checked" => $checked ,

                                ], false) ;
                        }
                        else
                        {
                            echo $form->field($model, 'As_Draft', [
                                        'template' => "<div class=\"radio \">\n{input}\n"
                                        . "<span class='lbl is-active-lbl'>{label}</span>"
                                        . "\n{error}\n{hint}\n</div>"])->input("checkbox",[
                                            'value' => "1", "class" => "ace", 
                                            "checked" => $checked ,
                                            
                                            ], false) ;
                        }
                        
                      }      
                    ?>
                </div>
                
                

                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class=" ">
                <label class="control-label" for="-fit">&nbsp;</label>
                

                <div class="help-block"></div>
            </div>
            
        </div>
    </div>

    <?php $form->field($model, 'Organization_Name')->textInput() ?>

    <?php $form->field($model, 'Contact')->textInput() ?>

    <?php $form->field($model, 'Designation')->textInput() ?>

    <?php $form->field($model, 'Initial_Contact_Type_Id')->textInput() ?>

    <?php $form->field($model, 'Initial_Contact_Date')->textInput() ?>

    <?php $form->field($model, 'Status_Action_Type_Id')->textInput() ?>

    <?php $form->field($model, 'Status_Action_Date')->textInput() ?>

    <?php $form->field($model, 'Budget')->textInput() ?>

    <?php $form->field($model, 'Youth_Served')->textInput() ?>

    <?php $form->field($model, 'Staff_Size')->textInput() ?>

    <?php $form->field($model, 'Board_Size')->textInput() ?>

    <?php $form->field($model, 'Year_Incorporated')->textInput() ?>

    <?php $form->field($model, 'Fit')->textInput() ?>

    <?php $form->field($model, 'Notes')->textInput() ?>

    <?php $form->field($model, 'Program_Year_Applied')->textInput() ?>

    <?php $form->field($model, 'Email')->textInput() ?>

    <?php $form->field($model, 'Phone')->textInput() ?>

    <?php $form->field($model, 'Mailing_Address')->textInput() ?>

    <?php $form->field($model, 'BADV_Prospects')->textInput() ?>

    <?php $form->field($model, 'Partner_Type_Id')->textInput() ?>

    <?php $form->field($model, 'Hiring_Type_Id')->textInput() ?>

    <?php $form->field($model, 'Hiring_Type_Id')->textInput() ?>

    <?php $form->field($model, 'Created_Date')->textInput() ?>

    <?php $form->field($model, 'Created_By')->hiddenInput() ?>

    <?php $form->field($model, 'Last_Modified_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
