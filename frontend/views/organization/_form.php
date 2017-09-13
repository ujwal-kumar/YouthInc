<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
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
    
   
    
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Organization_Name')->textInput() ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'Contact')->textInput() ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Designation')->textInput() ?></div>
        <div class="col-lg-6"><?php echo  $form->field($model, 'Year_Incorporated')->dropDownList(range(date('Y'), 1900), ['prompt'=>'Select']); ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            
        </div>
        <div class="col-lg-6">
            
           
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
        <div class="col-lg-6"></div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php 
                
            ?>
        </div>
        <div class="col-lg-6">
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Email')->textInput(['disabled' => 'disabled']) ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'Phone')->textInput() ?></div>
    </div>
    <div class="row">
        <div class="col-lg-12"><?= $form->field($model, 'Mailing_Address')->textarea() ?></div>
        
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
