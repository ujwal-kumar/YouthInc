<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
$orgList = ArrayHelper::map($orgList, 'Organization_Id', 'Organization_Name');

/* @var $this yii\web\View */
/* @var $model common\models\ReportFtatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ftat-search">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                
                <div class="space-6"></div>
                <div class="space-6"></div>
                
                <div class="col-sm-12 ">

                    <div class="form-group">
                        <?php $form = ActiveForm::begin([
                            'action' => ['index'],
                            'id' => 'ftat-report',
                            'method' => 'get',
                        ]); ?>
                        

                        
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
                                    ])->label("Organization Name");
                                ?>
                                <?php // echo $form->field($model, 'Organization_Id')->dropDownList($orgList,['prompt'=>'All']) ?>
                            </div>
                        </div>
                        

                        
                        <div class="form-group col-xs-12 col-sm-2">
                            <div>
                                <?php echo $form->field($model, 'Ftat_Status')->dropDownList([1 => 'Submited', 0 => 'Pending'],['prompt'=>'All'])->label("Status") ?>
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
        
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php $form->field($model, 'Ftat_Id') ?>

    <?php $form->field($model, 'Organization_Id') ?>

    <?php $form->field($model, 'Current_Fiscal_Year') ?>

    <?php $form->field($model, 'Ftat_Status') ?>

    <?php $form->field($model, 'Created_By') ?>

    <?php // echo $form->field($model, 'Last_Modified_Date') ?>

    <div class="form-group">
        <?php Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
