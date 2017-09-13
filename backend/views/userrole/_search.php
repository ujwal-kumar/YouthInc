<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserRoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-role-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Role_ID') ?>

    <?= $form->field($model, 'Role_Name') ?>

    <?= $form->field($model, 'Description') ?>

    <?= $form->field($model, 'CreatedDate') ?>

    <?= $form->field($model, 'ModifiedDate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
