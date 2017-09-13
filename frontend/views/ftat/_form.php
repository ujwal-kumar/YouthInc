<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FtatQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ftat-question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Question_Name')->textInput() ?>

    <?= $form->field($model, 'Created_By')->textInput() ?>

    <?= $form->field($model, 'Last_Modified_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
