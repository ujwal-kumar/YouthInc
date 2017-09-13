<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Answer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Answer_Name')->textInput() ?>

    <?= $form->field($model, 'Question_Id')->textInput() ?>

    <?php 
        $checked = false;
        if($model->Is_Active == 1)
        {
            $checked = true;
        }
        $checkboxTemplate = '<div class="checkbox i-checks">{beginLabel}{input}{labelTitle}{endLabel}{error}{hint}</div>'; 
    ?>
    <?php echo $form->field($model, 'Is_Active')->hiddenInput(['value'=> 0, 'id' => false])->label(false); ?><?= $form->field($model, 'Is_Active', ['template' => "<div class=\"radio\">\n{input}\n<span class='lbl is-active-lbl'>{label}</span>\n{error}\n{hint}\n</div>"])->input("checkbox",['value' => "1", "class" => "ace", "checked" => $model->isNewRecord ? true : $checked ], false) ?>

    <?= $form->field($model, 'Created_Date')->textInput() ?>

    <?= $form->field($model, 'Created_By')->textInput() ?>

    <?= $form->field($model, 'Last_Modified_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
