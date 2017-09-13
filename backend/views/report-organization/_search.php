<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReportOrganizationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-search">

    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                
                <div class="space-6"></div>
                <div class="space-6"></div>
                
                <div class="col-sm-12 ">

                    <div class="form-group">
                        <?php $form = ActiveForm::begin([
                            'action' => ['index'],
                            'id' => 'npo-report',
                            'method' => 'get',
                        ]); ?>
                        
                        <div class="form-group col-xs-12 col-sm-3">
                            <div>
                                <?= $form->field($model, 'Organization_Name') ?>
                            </div>
                        </div>
                        
<!--                        <div class="form-group col-xs-12 col-sm-2">
                            <div>
                                
                            </div>
                        </div>-->
                        
                        
                        <div class="form-group col-xs-12 col-sm-2">
                            <div>
                                <?php echo $form->field($model, 'Is_Active')->dropDownList([1 => 'Active', 0 => 'InActive'],['prompt'=>'All'])->label("Status") ?>
                            </div>
                        </div>
                        
                        
                        <div class="form-group col-xs-12 col-sm-4">
                                        
                            <div>
                                <label for="form-field-select-1">&nbsp; </label><br>
                                <div class="col-sm-12">
                                    <a type="submit" class="btn  btn-submit btn-primary"> <i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                    <button type="submit" class="btn  btn-export btn-primary"> <i class="fa fa-download" aria-hidden="true"></i></button>
                                    <a type="submit" class="btn  btn-print btn-primary"> <i class="fa fa-print" aria-hidden="true"></i></a>
                                    <a type="submit" class="btn  btn-print btn-primary"> <i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                </div>


                            </div>
                        </div>
                        

                        <?php ActiveForm::end(); ?>
                    </div>


                </div>
                <div class="space-6"></div>
                <div class="space-6"></div>
                <div class="col-sm-12 ">
                    <div class="grid-data">

                    </div>
                </div>
            </div>



        </div><!-- /.row -->
    </div>
    <?php 
//        $form = ActiveForm::begin([
//            'action' => ['index'],
//            'method' => 'get',
//        ]); 
    ?>

    <?php $form->field($model, 'Organization_Id') ?>

    <?php $form->field($model, 'Organization_Name') ?>

    <?php $form->field($model, 'Contact') ?>

    <?php $form->field($model, 'Designation') ?>

    <?php $form->field($model, 'Initial_Contact_Type_Id') ?>

    <?php // echo $form->field($model, 'Initial_Contact_Date') ?>

    <?php // echo $form->field($model, 'Status_Action_Type_Id') ?>

    <?php // echo $form->field($model, 'Status_Action_Date') ?>

    <?php // echo $form->field($model, 'Budget') ?>

    <?php // echo $form->field($model, 'Youth_Served') ?>

    <?php // echo $form->field($model, 'Staff_Size') ?>

    <?php // echo $form->field($model, 'Board_Size') ?>

    <?php // echo $form->field($model, 'Year_Incorporated') ?>

    <?php // echo $form->field($model, 'Fit') ?>

    <?php // echo $form->field($model, 'Notes') ?>

    <?php // echo $form->field($model, 'Program_Year_Applied') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Phone') ?>

    <?php // echo $form->field($model, 'Mailing_Address') ?>

    <?php // echo $form->field($model, 'BADV_Prospects') ?>

    <?php // echo $form->field($model, 'Partner_Type_Id') ?>

    <?php // echo $form->field($model, 'Hiring_Type_Id') ?>

    <?php // echo $form->field($model, 'Is_Active') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Is_Updated') ?>

    <?php // echo $form->field($model, 'Created_Date') ?>

    <?php // echo $form->field($model, 'Created_By') ?>

    <?php // echo $form->field($model, 'Last_Modified_Date') ?>

    <div class="form-group">
        <?php Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php // ActiveForm::end(); ?>

</div>
