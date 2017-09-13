<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrganizationProgram */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-program-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Organization_Id')->textInput() ?>

    <?= $form->field($model, 'Program_Id')->textInput() ?>

    <?= $form->field($model, 'Year')->textInput() ?>

    <?= $form->field($model, 'Is_Approved')->textInput() ?>

    <?= $form->field($model, 'Created_Date')->textInput() ?>

    <?= $form->field($model, 'Created_By')->textInput() ?>

    <?= $form->field($model, 'Last_Modified_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
