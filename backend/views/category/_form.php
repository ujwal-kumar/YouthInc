<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
$categoryList = ArrayHelper::map($categoryList, 'Category_Id', 'Category_Name');
$categoryTypeList = ArrayHelper::map($categoryTypeList, 'Category_Type_Id', 'Category_Type_Name');

?>

<div class="category-form">

    <?php $form = ActiveForm::begin([
                'options' => [
                    'id' => 'create-category-form'
                ],
                'validateOnChange'     => true,
                'enableAjaxValidation' => true,
                'validateOnSubmit'     => true,
                'enableClientValidation' => false
    ]); ?>

    <?= $form->field($model, 'Category_Name')->textInput() ?>
    
    <?= $form->field($model, 'Is_Child')->checkbox(['value' => "1"]) ?>
    
    <div class="categoryTypeId">
        <?= $form->field($model, 'Category_Type_Id')->dropDownList($categoryTypeList,['prompt'=>'Select']) ?>
    </div>
    
    <div class="parenetCategoryId" style="display: none;">
        <?= $form->field($model, 'Parent_Category_Id')->dropDownList($categoryList,['prompt'=>'Select']) ?>
    </div>
    
    
    

    <?php $form->field($model, 'Created_Date')->textInput() ?>

    <?php $form->field($model, 'Last_Modified_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
