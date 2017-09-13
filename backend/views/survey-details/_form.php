<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SurveyDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Survey_ID')->textInput() ?>

    <?= $form->field($model, 'Question_ID')->textInput() ?>

    <?= $form->field($model, 'Answer_ID')->textInput() ?>

    <?= $form->field($model, 'FilePath')->textInput() ?>

    <?= $form->field($model, 'CreatedDate')->textInput() ?>

    <?= $form->field($model, 'ModifiedDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
