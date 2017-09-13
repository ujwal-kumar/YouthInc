<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Organization_Name')->textInput() ?>

    <?= $form->field($model, 'Contact')->textInput() ?>

    <?= $form->field($model, 'Designation')->textInput() ?>

    <?= $form->field($model, 'Initial_Contact_Type_Id')->textInput() ?>

    <?= $form->field($model, 'Initial_Contact_Date')->textInput() ?>

    <?= $form->field($model, 'Status_Action_Type_Id')->textInput() ?>

    <?= $form->field($model, 'Status_Action_Date')->textInput() ?>

    <?= $form->field($model, 'Budget')->textInput() ?>

    <?= $form->field($model, 'Youth_Served')->textInput() ?>

    <?= $form->field($model, 'Staff_Size')->textInput() ?>

    <?= $form->field($model, 'Board_Size')->textInput() ?>

    <?= $form->field($model, 'Year_Incorporated')->textInput() ?>

    <?= $form->field($model, 'Fit')->textInput() ?>

    <?= $form->field($model, 'Notes')->textInput() ?>

    <?= $form->field($model, 'Program_Year_Applied')->textInput() ?>

    <?= $form->field($model, 'Email')->textInput() ?>

    <?= $form->field($model, 'Phone')->textInput() ?>

    <?= $form->field($model, 'Mailing_Address')->textInput() ?>

    <?= $form->field($model, 'BADV_Prospects')->textInput() ?>

    <?= $form->field($model, 'Partner_Type_Id')->textInput() ?>

    <?= $form->field($model, 'Hiring_Type_Id')->textInput() ?>

    <?php 
        $checked = false;
        if($model->Is_Active == 1)
        {
            $checked = true;
        }
        $checkboxTemplate = '<div class="checkbox i-checks">{beginLabel}{input}{labelTitle}{endLabel}{error}{hint}</div>'; 
    ?>
    <?php echo $form->field($model, 'Is_Active')->hiddenInput(['value'=> 0, 'id' => false])->label(false); ?><?= $form->field($model, 'Is_Active', ['template' => "<div class=\"radio\">\n{input}\n<span class='lbl is-active-lbl'>{label}</span>\n{error}\n{hint}\n</div>"])->input("checkbox",['value' => "1", "class" => "ace", "checked" => $model->isNewRecord ? true : $checked ], false) ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Is_Updated')->textInput() ?>

    <?= $form->field($model, 'Created_Date')->textInput() ?>

    <?= $form->field($model, 'Created_By')->textInput() ?>

    <?= $form->field($model, 'Last_Modified_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
