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

    <?= $form->field($model, 'Org_ID') ?>

    <?= $form->field($model, 'OrganizationName') ?>

    <?= $form->field($model, 'MarketingOrgName') ?>

    <?= $form->field($model, 'Website') ?>

    <?= $form->field($model, 'MailingAddress') ?>

    <?php // echo $form->field($model, 'MailingSuite_FloorNumber') ?>

    <?php // echo $form->field($model, 'MailingCity') ?>

    <?php // echo $form->field($model, 'MailingState') ?>

    <?php // echo $form->field($model, 'Zipcode') ?>

    <?php // echo $form->field($model, 'YearOfInc') ?>

    <?php // echo $form->field($model, 'BoroughLocated') ?>

    <?php // echo $form->field($model, 'IsActive') ?>

    <?php // echo $form->field($model, 'CreatedDate') ?>

    <?php // echo $form->field($model, 'ModifiedDate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
