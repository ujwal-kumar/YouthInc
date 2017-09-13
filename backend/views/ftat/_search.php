<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FtatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ftat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Ftat_Id') ?>

    <?= $form->field($model, 'Organization_Id') ?>

    <?= $form->field($model, 'Ftat_Status') ?>

    <?= $form->field($model, 'Created_By') ?>

    <?= $form->field($model, 'Last_Modified_Date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
