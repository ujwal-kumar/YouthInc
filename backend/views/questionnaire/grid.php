<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>
<div class=" add-answer-btn-cnt-grid">
    <div class="row">
         <div class="form-group field-answer-answer_name has-success clearfix">


            <?php
//                if($answer->Field_Type == "row") :

            ?>

            <div class="col-lg-12 add-answer-rows-cnt ">
                <div class="row"> 
                    <h3 class="col-lg-12">Rows</h3>
                    <?php  
                    $count = 1;
//                    prd($answers);
                        foreach ($answers as $answer)
                        {
                            if($answer->Field_Type == "row") :
                    ?>
                                <div class="form-group add-answer-rows-repeater has-success clearfix">
                                   <div class="col-lg-11">
                                       <label class="control-label ans-lable" for="answer-answer_name"><strong><?php echo $count; ?>. </strong> Row  Name</label>
                                       &nbsp;<input id="answer-answer_name" data-id="<?php echo $answer->Grid_Answer_Id; ?>" class="form-control" name="GridAnswer[Rows][<?php echo $answer->Grid_Answer_Id; ?>]" value="<?php echo $answer->Answer_Name; ?>" aria-invalid="false" type="text">
                                   </div>
                                    <?php if(empty($initiated)): ?>
                                   <span class="pull-left">
                                       <label class="control-label" for="answer-answer_name">&nbsp;</label><br>
                                       <span class="btn btn-primary delete-row" data-class="delete-row">
                                           <i class="fa fa-trash-o" aria-hidden="true"></i>
                                       </span>
                                   </span>
                                    <?php endif; ?> 
                                   <div class="help-block"></div>
                               </div>
                    <?php 
                        
                            $count++;
                            endif;
                        }
                    ?>
                </div>
                <?php if(empty($initiated)): ?>
                <div class="row">
                     <div class="col-lg-4">
                        <label class="control-label ans-lable" for="answer-answer_name">&nbsp;</label><br>
                       <?= Html::submitButton( Yii::t('app', 'Add Row <i class="fa fa-plus-square" aria-hidden="true"></i>') , ['class' =>  'btn btn-primary add-button-row']) ?>

                   </div>
                </div>
                <?php endif; ?>

            </div>
            <?php // endif; ?>


            <?php
//                if($answer->Field_Type == "column") :
            ?>

            <div class="col-lg-12 add-answer-columns-cnt ">
                <div class="row"> 
                    <h3 class="col-lg-12">Columns</h3>
                    <?php  
                    $count = 1;
                        foreach ($answers as $answer)
                        {
                            if($count > 1)
                                break;
                            
                            foreach ($answer->gridAnswerColumns as $column)
                            {
                                
//                                prd($column);
                            
                    ?>
                                <div class="form-group add-answer-columns-repeater has-success clearfix">
                                    <div class="col-lg-11">
                                        <label class="control-label ans-lable" for="answer-answer_name"><strong><?php echo $count; ?>. </strong> Column  Name</label>
                                        &nbsp;<input id="answer-answer_name" data-id="<?php echo $answer->Grid_Answer_Id; ?>" class="form-control" name="GridAnswer[Columns][<?php echo $column->Grid_Answer_Column_Id; ?>]" value="<?php echo $column->Answer_Name; ?>" aria-invalid="false" type="text">
                                    </div>
                                    <?php if(empty($initiated)): ?>
                                    <span class="pull-left">
                                        <label class="control-label" for="answer-answer_name">&nbsp;</label><br>
                                        <span class="btn btn-primary delete-column" data-class="delete-column">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </span>
                                    </span>
                                    <?php endif; ?> 
                                    <div class="help-block"></div>
                                </div>
                    <?php 
                        
                            $count++;
                            }
                        }
                    ?>
                </div>
                <?php if(empty($initiated)): ?>
                <div class="row">
                     <div class="col-lg-4">
                        <label class="control-label ans-lable" for="answer-answer_name">&nbsp;</label><br>
                       <?= Html::submitButton( Yii::t('app', 'Add Column <i class="fa fa-plus-square" aria-hidden="true"></i>') , ['class' =>  'btn btn-primary add-button-column']) ?>

                   </div>
                </div>
                <?php endif; ?> 

            </div>

             <?php // endif; ?>


            <div class="help-block"></div>
        </div>
    </div>

</div>