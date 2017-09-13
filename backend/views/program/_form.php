<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Program */
/* @var $form yii\widgets\ActiveForm */
$partnerTypeList = ArrayHelper::map($partnerTypeList, 'Partner_Type_Id', 'Partner_Type_Name');
$programTypeList = ArrayHelper::map($programTypeList, 'Program_Type_Id', 'Program_Type_Name');

$categoryList = ArrayHelper::map($categoryList, 'Category_Id', 'Category_Name');

?>

<div class="program-form">

    <?php $form = ActiveForm::begin([
                'options' => [
                    'id' => 'create-program-form'
                ]
    ]); ?>
    
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Program_Name')->textInput() ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'Program_Type')->dropDownList($programTypeList, ['prompt'=>'Select']) ?></div>
    </div>
    
    <div class="row">
        
        <div class="col-lg-6">
            <?php 
//            $form->field($prgmCat, 'Category_Id', ['template' => "
//                
//<div class='dropdown'>
//    <button
//    class=' dropdown-toggle'
//    data-toggle='dropdown'
//    type='button'>
//        <span>Select languages</span>
//        <span class='caret'></span>
//    </button>
//    {input}
//</div>"])->checkboxList(
//$categoryList,
//[
//    'tag' => 'ul',
//    'class' => 'dropdown-menu',
//    'item' => function ($index, $label, $name, $checked, $value) {
//        return '<li>' . Html::checkbox($name, $checked, [
//            'value' => $value,
//            'label' => Html::encode($label),
//        ]) . '</li>';
//    }
//]); 
?>
            <?php echo  $form->field($prgmCat, 'Category_Id')->checkboxList($categoryList, ['prompt'=>'Select', 'multiple' => true, ]) ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'Org_No_Of_Times')->input('number')->label('No of times NPO can apply'); ?></div>
    </div>
    

    

    

    

    <?php echo $form->field($model, 'Comments')->textarea() ?>

    <div class="row">
        <div class="col-lg-6"><?php echo $form->field($partner, 'Partner_Type_Id')->checkboxList($partnerTypeList) ?></div>
        <div class="col-lg-6"><?php 
        $checked = false;
        if($model->Is_Active == 1)
        {
            $checked = true;
        }
        $checkboxTemplate = '<div class="checkbox i-checks">{beginLabel}{input}{labelTitle}{endLabel}{error}{hint}</div>'; 
    ?>
    <?php echo $form->field($model, 'Is_Active')->hiddenInput(['value'=> 0, 'id' => false])->label(false); ?><?= $form->field($model, 'Is_Active', ['template' => "<div class=\"radio\">\n{input}\n<span class='lbl is-active-lbl'>{label}</span>\n{error}\n{hint}\n</div>"])->input("checkbox",['value' => "1", "class" => "ace", "checked" => $model->isNewRecord ? true : $checked ], false) ?></div>
    </div>

    <?php $form->field($model, 'Is_Active')->checkbox(['value' => "1"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
