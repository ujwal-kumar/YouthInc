<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RoleMenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Role_Menu_Id') ?>

    <?= $form->field($model, 'Role_Id') ?>

    <?= $form->field($model, 'Menu_Id') ?>

    <?= $form->field($model, 'Created_Date') ?>

    <?= $form->field($model, 'Modified_Date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
