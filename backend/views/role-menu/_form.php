<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RoleMenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Role_Id')->textInput() ?>

    <?= $form->field($model, 'Menu_Id')->textInput() ?>

    <?= $form->field($model, 'Created_Date')->textInput() ?>

    <?= $form->field($model, 'Modified_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
