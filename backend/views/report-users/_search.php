<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
$orgList = ArrayHelper::map($orgList, 'Organization_Id', 'Organization_Name');
/* @var $this yii\web\View */
/* @var $model common\models\ReportUsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
    $dateRange = array_flip(range(date('Y'), 1900));
    $dateRange = array_combine(range(date('Y'), 1900), range(date('Y'), 1900))
?>

<div class="users-search">

    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                
                <div class="space-6"></div>
                <div class="space-6"></div>
                
                <div class="col-sm-12 ">

                    <div class="form-group">
                        <?php $form = ActiveForm::begin([
                            'action' => ['index'],
                            'id' => 'user-report',
                            'method' => 'get',
                        ]); ?>
                        
<!--                        <div class="form-group col-xs-12 col-sm-2">
                            <div>
                                <?= $form->field($model, 'User_Name') ?>
                            </div>
                        </div>-->
                        
<!--                        <div class="form-group col-xs-12 col-sm-2">
                            <div>
                                <?= $form->field($model, 'Email_Id') ?>
                            </div>
                        </div>-->
                        
                        <div class="form-group col-xs-12 col-sm-3">
                            <div>
                                <?php
                                    echo $form->field($model, 'Organization_Id')->widget(Select2::classname(), [
                                        'data' => $orgList,
                                        'size' => 'lg',
                                        'options' => ['placeholder' => 'All'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]);
                                ?>
                                <?php // echo $form->field($model, 'Organization_Id')->dropDownList($orgList,['prompt'=>'All']) ?>
                            </div>
                        </div>
                        
<!--                        <div class="form-group col-xs-12 col-sm-1">
                            <div>
                                <?php
                                     
//                                    echo $form->field($model, 'Created_Date')->widget(Select2::classname(), [
//                                        'data' => $dateRange,
//                                        'size' => 'lg',
//                                        'options' => ['placeholder' => ''],
//                                        'pluginOptions' => [
//                                            'allowClear' => true
//                                        ],
//                                    ]);
//                                
//                                    $form->field($model, 'Created_Date')->dropDownList($dateRange, ['prompt'=>'Select'])->label("Year") 
                                ?>
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
    
    
    
    <?php $form->field($model, 'User_Id') ?>

    <?php $form->field($model, 'User_Name') ?>

    <?php $form->field($model, 'Email_Id') ?>

    <?php $form->field($model, 'Password') ?>

    <?php $form->field($model, 'Password_Reset_Token') ?>

    <?php // echo $form->field($model, 'Is_Locked') ?>

    <?php // echo $form->field($model, 'Login_Attempt') ?>

    <?php // echo $form->field($model, 'Is_Active') ?>

    <?php // echo $form->field($model, 'Role_Id') ?>

    <?php // echo $form->field($model, 'Organization_Id') ?>

    <?php // echo $form->field($model, 'Auth_Key') ?>

    <?php // echo $form->field($model, 'Access_Token') ?>

    <?php // echo $form->field($model, 'Created_Date') ?>

    <?php // echo $form->field($model, 'Last_Modified_Date') ?>

    <div class="form-group">
        <?php Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    

</div>
