<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */
/* @var $form yii\widgets\ActiveForm */

$partnerTypeList = ArrayHelper::map($partnerTypeList, 'Partner_Type_Id', 'Partner_Type_Name');
?>

<div class="organization-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'OrganizationName')->textInput() ?>

    <?= $form->field($model, 'MarketingOrgName')->textInput() ?>

    <?= $form->field($model, 'Website')->textInput() ?>

    <?= $form->field($model, 'MailingAddress')->textInput() ?>

    <?= $form->field($model, 'MailingSuite_FloorNumber')->textInput() ?>

    <?= $form->field($model, 'MailingCity')->textInput() ?>

    <?= $form->field($model, 'MailingState')->textInput() ?>

    <?= $form->field($model, 'Zipcode')->textInput() ?>

    <?= $form->field($model, 'YearOfInc')->textInput() ?>

    <?= $form->field($model, 'BoroughLocated')->textInput() ?>

    <?php 
        $checked = false;
        if($model->Is_Active == 1)
        {
            $checked = true;
        }
        $checkboxTemplate = '<div class="checkbox i-checks">{beginLabel}{input}{labelTitle}{endLabel}{error}{hint}</div>'; 
    ?>
    <?php echo $form->field($model, 'Is_Active')->hiddenInput(['value'=> 0, 'id' => false])->label(false); ?><?= $form->field($model, 'Is_Active', ['template' => "<div class=\"radio\">\n{input}\n<span class='lbl is-active-lbl'>{label}</span>\n{error}\n{hint}\n</div>"])->input("checkbox",['value' => "1", "class" => "ace", "checked" => $model->isNewRecord ? true : $checked ], false) ?>

    <?= $form->field($model, 'CreatedDate')->textInput() ?>

    <?= $form->field($model, 'ModifiedDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
