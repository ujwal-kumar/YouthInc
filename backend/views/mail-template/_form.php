<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\MailTemplate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mail-template-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'Template_Name')->textInput() ?>

    <?= $form->field($model, 'Template_Slug')->textInput() ?>
    
    <?= $form->field($model, 'Mail_Sender')->textInput() ?>

    <?= $form->field($model, 'Mail_Subject')->textInput() ?>

    <?php $form->field($model, 'Mail_Body')->textarea(['rows' => 6]) ?>
    <?= 
            $form->field($model, 'Mail_Body')->widget(TinyMce::className(), [
                'options' => ['rows' => 20],
                'language' => 'en',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
//                        "insertdatetime media table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                ]
            ]);
    ?>

    <?php $form->field($model, 'Created_Date')->textInput() ?>

    <?php $form->field($model, 'Last_Modified_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
