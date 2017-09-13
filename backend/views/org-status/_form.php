<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrgStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="org-status-form">

    <?php $form = ActiveForm::begin([
                'options' => [
                    'id' => 'create-org-status-form'
                ],
                'validateOnChange'     => true,
                'enableAjaxValidation' => true,
                'validateOnSubmit'     => true,
                'enableClientValidation' => false
    ]); ?>

    <?= $form->field($model, 'Org_Status_Description')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
