<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrganizationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Organization_Id') ?>

    <?= $form->field($model, 'Organization_Name') ?>

    <?= $form->field($model, 'Contact') ?>

    <?= $form->field($model, 'Designation') ?>

    <?= $form->field($model, 'Initial_Contact_Type_Id') ?>

    <?php // echo $form->field($model, 'Initial_Contact_Date') ?>

    <?php // echo $form->field($model, 'Status_Action_Type_Id') ?>

    <?php // echo $form->field($model, 'Status_Action_Date') ?>

    <?php // echo $form->field($model, 'Budget') ?>

    <?php // echo $form->field($model, 'Youth_Served') ?>

    <?php // echo $form->field($model, 'Staff_Size') ?>

    <?php // echo $form->field($model, 'Board_Size') ?>

    <?php // echo $form->field($model, 'Year_Incorporated') ?>

    <?php // echo $form->field($model, 'Fit') ?>

    <?php // echo $form->field($model, 'Notes') ?>

    <?php // echo $form->field($model, 'Program_Year_Applied') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Phone') ?>

    <?php // echo $form->field($model, 'Mailing_Address') ?>

    <?php // echo $form->field($model, 'BADV_Prospects') ?>

    <?php // echo $form->field($model, 'Partner_Type_Id') ?>

    <?php // echo $form->field($model, 'Hiring_Type_Id') ?>

    <?php // echo $form->field($model, 'Is_Active') ?>

    <?php // echo $form->field($model, 'Created_Date') ?>

    <?php // echo $form->field($model, 'Created_By') ?>

    <?php // echo $form->field($model, 'Last_Modified_Date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
