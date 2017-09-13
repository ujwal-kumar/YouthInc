<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
    $controlTypeList = ArrayHelper::map($controlTypeList, 'Control_Type_Id', 'Control_Type_Name');
    $categoryTypeList = ArrayHelper::map($categoryTypeList, 'Category_Id', 'Category_Name');

    if(!empty($initiated))
    {
//        echo $initiated;
    }
?>

<div class="question-form">

    <?php $form = ActiveForm::begin([
                'options' => [
                    'id' => 'create-question-form'
                ]
    ]); ?>

    <?= $form->field($model, 'Question_Name')->textInput() ?>
    
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'Category_Id')->dropDownList($categoryTypeList,['prompt'=>'Select','disabled' => !empty($initiated) ? 'disabled' : false]) ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'Control_Type_Id')->dropDownList($controlTypeList,['prompt'=>'Select', 'disabled' => !empty($initiated) ? 'disabled' : false]) ?></div>
    </div>

    <div class="row">
        <div class="col-lg-12"><?php 
        $checked = false;
        if($model->Is_Active == 1)
        {
            $checked = true;
        }
        $checkboxTemplate = '<div class="checkbox i-checks">{beginLabel}{input}{labelTitle}{endLabel}{error}{hint}</div>'; 
    ?>
    <?php echo $form->field($model, 'Is_Active')->hiddenInput(['value'=> 0, 'id' => false])->label(false); ?><?= $form->field($model, 'Is_Active', ['template' => "<div class=\"radio\">\n{input}\n<span class='lbl is-active-lbl'>{label}</span>\n{error}\n{hint}\n</div>"])->input("checkbox",['value' => "1", "class" => "ace", "checked" => $model->isNewRecord ? true : $checked ], false) ?></div>
        <input id="is-text-area" name="Answer[Is_Text_Area]" value=""  type="hidden">
    </div>
    <?php
        if(!$model->isNewRecord)
            $controlType = $model->controlType->Control_Type_Name;
        $gridType = '';
        $count = 1;
        if(!empty($answers) )
        {
            
            

                ?>
                
                <?php 
                    if(strtolower($controlType) == "grid" || 1003 == $model->controlType->Control_Type_Id)
                    {
                        $gridType = 'new-grid';
                         echo  $this->render('grid', [
                            'model' => $model,
                            'answers' => $answers,
                            'initiated' => $initiated,
                        ]); 

                    }
                    else
                    {
                        ?>
                        
                        <div class="row add-answer-btn ">
                            <?php if(empty($initiated)): ?>
                            <div class="col-lg-12">
                                <?= Html::submitButton( Yii::t('app', 'Add Answer <i class="fa fa-plus-square" aria-hidden="true"></i>') , ['class' =>  'btn btn-primary add-button']) ?>
                                <div class="help-block"></div>
                            </div>
                            <?php endif; ?>
                        <?php
                        foreach ($answers as $answer)
                        {
                ?>
                            
                            <div class="col-lg-12 add-answer-btn-cnt">


                                <div class="row">
                                     <div class="form-group field-answer-answer_name  clearfix">
                                        <div class="col-lg-11">
                                            <label class="control-label ans-lable" for="answer-answer_name"><strong><?php echo $count; ?>. </strong> Answer  Name</label>
                                            &nbsp;<input id="answer-answer_name"  data-id="<?php echo $answer->Answer_Id; ?>" class="form-control" name="Answer[Answer_Name][<?php echo $answer->Answer_Id; ?>]" value="<?php echo $answer->Answer_Name ?>" aria-invalid="false" type="text">
                                                  <input name="Answer[Answer_Id][<?php echo $answer->Answer_Id; ?>]" value="<?php echo $answer->Answer_Id ?>"  type="hidden">

                                        </div>
                                        <?php if(empty($initiated)): ?>
                                        <span class="pull-left">
                                            <label class="control-label" for="answer-answer_name">&nbsp;</label><br>
                                            <span class="btn btn-primary delete-answer">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </span>
                                        </span>
                                        <?php endif; ?> 
                                        <div class="help-block"></div>
                                    </div>
                                </div>


                            </div>
                    <?php
                            $count++;
                        }
                        ?>
                        </div>
                        <?php
                    } 
                ?>
                    
                
            
            <?php  
            
            
        }
        else 
        {
       
        }
    ?>
    <?php // if($model->isNewRecord) : 
        $newClass = '';
        if(!$model->isNewRecord)
        {
            $newClass = 'textbox-new';
        }
    ?>
    
    <div class="row add-answer-btn hidden <?php echo $newClass; ?>">
        <div class="col-lg-12">
            <?= Html::submitButton( Yii::t('app', 'Add Answer <i class="fa fa-plus-square" aria-hidden="true"></i>') , ['class' =>  'btn btn-primary add-button']) ?>
            <div class="help-block"></div>
        </div>
        <div class="col-lg-12 add-answer-btn-cnt">
            <div class="row">
                 <div class="form-group field-answer-answer_name  clearfix">
                    <div class="col-lg-11">
                        <label class="control-label ans-lable" for="answer-answer_name"><strong><?php echo 1; ?>. </strong> Answer  Name</label>
                        &nbsp;<input id="answer-answer_name" data-id="1" class="form-control required" name="Answer[Answer_Name][1]" value="" aria-invalid="false" type="text">
                        <input name="Answer[Answer_Id][]" value=""  type="hidden">

                    </div>

                    <span class="pull-left">
                        <label class="control-label" for="answer-answer_name">&nbsp;</label><br>
                        <span class="btn btn-primary delete-answer">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </span>
                    </span>
                    <div class="help-block"></div>
                </div>
            </div>

        </div>
    </div>
    
    <div class="row add-answer-btn-grid hidden <?php echo $gridType; ?>">
                
        <div class="col-lg-12 add-answer-btn-cnt-grid">
            <div class="row">
                 <div class="form-group field-answer-answer_name  clearfix">
                    
                     
                    <div class="row-column-creator-cnt">
                         <div class="col-lg-4">
                            <label class="control-label ans-lable" for="answer-answer_name">No of Rows</label>
                            &nbsp;<input id="grid-ans-rows" data-id="1" class="form-control" name="GridAnswer[Rows]" value="" aria-invalid="false" type="text">
                        </div>

                        <div class="col-lg-4">
                            <label class="control-label ans-lable" for="answer-answer_name">No of Columns</label>
                            &nbsp;<input id="grid-ans-columns" data-id="1" class="form-control" name="GridAnswer[Columns]" value="" aria-invalid="false" type="text">
                        </div>

                         <div class="col-lg-4">
                             <label class="control-label ans-lable" for="answer-answer_name">&nbsp;</label><br>
                            <?= Html::submitButton( Yii::t('app', 'Add Answer Grid <i class="fa fa-plus-square" aria-hidden="true"></i>') , ['class' =>  'btn btn-primary add-button-grid']) ?>

                        </div>
                    </div>
                    

                    <div class="col-lg-12 add-answer-rows-cnt hidden">
                        <div class="row"> 
                            <h3 class="col-lg-12">Rows</h3>
                             <div class="form-group add-answer-rows-repeater  clearfix">
                                <div class="col-lg-11">
                                    <label class="control-label ans-lable" for="answer-answer_name"><strong><?php echo 1; ?>. </strong> Row  Name</label>
                                    &nbsp;<input id="answer-answer_name" data-id="1" class="form-control" name="GridAnswer[Rows][1]" value="" aria-invalid="false" type="text">
                                </div>

                                <span class="pull-left">
                                    <label class="control-label" for="answer-answer_name">&nbsp;</label><br>
                                    <span class="btn btn-primary delete-row" data-class="delete-row">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </span>
                                </span>
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-lg-4">
                                <label class="control-label ans-lable" for="answer-answer_name">&nbsp;</label><br>
                               <?= Html::submitButton( Yii::t('app', 'Add Row <i class="fa fa-plus-square" aria-hidden="true"></i>') , ['class' =>  'btn btn-primary add-button-row']) ?>

                           </div>
                        </div>

                    </div>

                     <div class="col-lg-12 add-answer-columns-cnt hidden">
                        <div class="row"> 
                            <h3 class="col-lg-12">Columns</h3>
                            <div class="form-group add-answer-columns-repeater  clearfix">
                                <div class="col-lg-11">
                                    <label class="control-label ans-lable" for="answer-answer_name"><strong><?php echo 1; ?>. </strong> Column  Name</label>
                                    &nbsp;<input id="answer-answer_name" data-id="1" class="form-control" name="GridAnswer[Columns][1]" value="" aria-invalid="false" type="text">
                                </div>

                                <span class="pull-left">
                                    <label class="control-label" for="answer-answer_name">&nbsp;</label><br>
                                    <span class="btn btn-primary delete-column" data-class="delete-column">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </span>
                                </span>
                                <div class="help-block"></div>
                            </div>
                        </div>

                        <div class="row">
                             <div class="col-lg-4">
                                <label class="control-label ans-lable" for="answer-answer_name">&nbsp;</label><br>
                               <?= Html::submitButton( Yii::t('app', 'Add Column <i class="fa fa-plus-square" aria-hidden="true"></i>') , ['class' =>  'btn btn-primary add-button-column']) ?>

                           </div>
                        </div>

                    </div>


                    <div class="help-block"></div>
                    <?php // endif; ?>
                </div>
            </div>

        </div>
    </div>
    <?php // endif; ?>

    <?php $form->field($model, 'Created_Date')->textInput() ?>

    <?php $form->field($model, 'Created_By')->textInput() ?>

    <?php $form->field($model, 'Last_Modified_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
