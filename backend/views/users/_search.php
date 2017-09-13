<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'User_Id') ?>

    <?= $form->field($model, 'User_Name') ?>

    <?= $form->field($model, 'Email_Id') ?>

    <?= $form->field($model, 'Password') ?>

    <?= $form->field($model, 'Is_Locked') ?>

    <?php // echo $form->field($model, 'Login_Attempt') ?>

    <?php // echo $form->field($model, 'Is_Active') ?>

    <?php // echo $form->field($model, 'Role_Id') ?>

    <?php // echo $form->field($model, 'Organization_Id') ?>

    <?php // echo $form->field($model, 'Auth_Key') ?>

    <?php // echo $form->field($model, 'Access_Token') ?>

    <?php // echo $form->field($model, 'Created_Date') ?>

    <?php // echo $form->field($model, 'Last_Modified_Date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
