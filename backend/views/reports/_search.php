<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\ReportOrganizationSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="page-content">


            <div class="page-header">
                <h1>
                    <b>Nonprofit Organization Survey Reports</b>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        
                        <div class="col-sm-12 ">
                            <?php
//                            $form = Html::beginForm([
//                                'method' => 'post',
//                            ]); 
                            ?>
                            
                            <div class="form-group">
                                 <?php // Pjax::begin(); ?>
                                <?= Html::beginForm(['reports/export-report'], 'get', ['data-pjax' => '', 'id' => 'surveyForm'], ['enctype' => 'multipart/form-data']) ?>
                                    <div class="form-group col-xs-12 col-sm-3">
                                        <div>
                                            <label for="form-field-select-1">Survey Status</label>

                                            <select class="form-control" id="survey-status" name="SurveySearch[Survey_Status]">
                                                <option value=""></option>
                                                <option value="All">All</option>
                                                <option value="3">Completed</option>
                                                <option value="2">Application Sent</option>
                                                <option value="1">InProgress</option>
                                                
                                                    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-3">
                                        <div>
                                            <label for="form-field-select-1">Quarter</label>

                                            <select class="form-control" id="form-field-select-1">
                                                <option value=""></option>
                                                <option value="Quarter1">Quarter1</option>
                                                <option value="Quarter2">Quarter2</option>
                                                <option value="Quarter3">Quarter3</option>
                                                <option value="Quarter4">Quarter4</option>
                                                    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-1">
                                        <div>
                                            <label for="form-field-select-1">Year</label>

                                            <select class="form-control" id="form-field-select-1">
                                                <option value=""></option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                    
                                            </select>
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
                                    
                                <?php Html::endForm(); ?>
                                <?php // Pjax::end(); ?>
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
        </div><!-- /.page-content -->
        </div>