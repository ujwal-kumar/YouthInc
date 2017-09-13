<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MailTemplateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mail-template-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Mail_Id') ?>

    <?= $form->field($model, 'Template_Name') ?>

    <?= $form->field($model, 'Template_Slug') ?>

    <?= $form->field($model, 'Mail_Sender') ?>

    <?= $form->field($model, 'Mail_Subject') ?>

    <?php // echo $form->field($model, 'Mail_Body') ?>

    <?php // echo $form->field($model, 'Created_Date') ?>

    <?php // echo $form->field($model, 'Last_Modified_Date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
