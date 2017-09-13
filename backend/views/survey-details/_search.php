<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SurveyDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SurveyDetail_ID') ?>

    <?= $form->field($model, 'Survey_ID') ?>

    <?= $form->field($model, 'Question_ID') ?>

    <?= $form->field($model, 'Answer_ID') ?>

    <?= $form->field($model, 'FilePath') ?>

    <?php // echo $form->field($model, 'CreatedDate') ?>

    <?php // echo $form->field($model, 'ModifiedDate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
