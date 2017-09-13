<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
    
    $roles = ArrayHelper::map($roles, 'Role_Id', 'Role_Name');

    $organizations = ArrayHelper::map($organizations, 'Organization_Id', 'Organization_Name');
    
?>

<div class="users-form">

    <?php $form = ActiveForm::begin([
                'options' => [
                    'id' => 'create-user-form',
                    'options'              => ['accept-charset'=>'utf-8'],
                    
                    
                ],
                'validateOnChange'     => true,
                'enableAjaxValidation' => true,
                'validateOnSubmit'     => true,
                'enableClientValidation' => false
    ]); ?>

    <?= $form->field($model, 'User_Name')->textInput() ?>
    
    <?php
        $model->Password =  '';
    ?>
    <?php $form->field($model, 'Password')->passwordInput() ?>
    <?php
        $diabled = false;
        if(!$model->isNewRecord)
        {
           $diabled = true; 
        }
    ?>
    <?= $form->field($model, 'Email_Id')->textInput(['disabled' => $diabled ]) ?>
    

    <?= $form->field($model, 'Role_Id')->dropDownList($roles, ['prompt'=>'Select']) ?>

    <?= $form->field($model, 'Organization_Id')->dropDownList($organizations, ['prompt'=>'Select']) ?>
    
    <?php 
        $checked = false;
        if($model->Is_Active == 1)
        {
            $checked = true;
        }
        $checkboxTemplate = '<div class="checkbox i-checks">{beginLabel}{input}{labelTitle}{endLabel}{error}{hint}</div>'; 
    ?>
    
    <?php echo $form->field($model, 'Is_Active')->hiddenInput(['value'=> 0, 'id' => false])->label(false); ?><?= $form->field($model, 'Is_Active', ['template' => "<div class=\"radio\">\n{input}\n<span class='lbl is-active-lbl'>{label}</span>\n{error}\n{hint}\n</div>"])->input("checkbox",['value' => "1", "class" => "ace", "checked" => $model->isNewRecord ? true : $checked ], false) ?>
    
    <?php $form->field($model, 'Auth_Key')->textInput() ?>

    <?php $form->field($model, 'Access_Token')->textInput() ?>

    <?php $form->field($model, 'Created_Date')->textInput() ?>

    <?php $form->field($model, 'Last_Modified_Date')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
