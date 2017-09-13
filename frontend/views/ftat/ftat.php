<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use frontend\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Financial Trends Analysis');
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
        #ftat-form table {
            font-family: "Calibri";
            font-size: 12px;
            width: 100%;
        }

        a.comment-indicator:hover + comment {
            background: #ffd;
            position: absolute;
            display: block;
            border: 1px solid black;
            padding: 0.5em;
        }

        a.comment-indicator {
            background: red;
            display: inline-block;
            border: 1px solid black;
            width: 0.5em;
            height: 0.5em;
        }

        comment {
            display: none;
        }
        div[contenteditable="true"] {
            height: 50px;
          }
        .border1
        {
            border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000
        }
        .border2
        {
            border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000
        }
        .border3
        {
            border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000
        }
        .border4
        {
            border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000
        }
        .font1
        {
            font-family: "Calibri";
            color: #333;
        }
        .font2
        {
            font-size:16px;height:30px;vertical-align:middle;
        }
        table td div {color: #333;}
        #RecentOrganizationalDiv, #FinacialAddressDiv
        {
            overflow-y: scroll;
        }
        
        table.table-borderless div {
            font-family: "Calibri";
            font-size: 14px !important;
            height: 40px;
            padding: 10px;
            line-height: 100%;
        }
        
        table .form-control.hasDatepicker {
            padding: 0;
          }
    </style>
<div class="breadcrumbs ftat ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb ">
        <li>
            <i class="ace-icon fa fa-database home-icon"></i>
            <a href="#"><?= Yii::t('app', 'Financial Trends Analysis') ?></a>
        </li>
        <li class="active"><?= Yii::t('app', 'Financial Trends Analysis') ?></li>
    </ul>
    <div class="page-content  ">
        
            <div class="page-header">
                
                    <h1><?= Yii::t('app', 'Financial Trends Analysis') ?></h1>
                
            </div><!-- /.page-header -->
            
            <?php
//                prd($prevData);
            ?>
            
            <div class="row">
                <div class="col-xs-12">
                    <?php $form = ActiveForm::begin(['id' => 'ftat-form', 'action' => ['ftat/save']]); ?>
                    <table class="table-responsive table-borderless" cellspacing="0" border="0">
                            
                            <tr>
                                <td height="30" align="left" valign=top><b>Organization Name:</b></td>
                                <td align="left" valign=bottom></td>
                                <td class="border1" colspan=2 align="left" valign=middle bgcolor="#FFFF99"><font  ><div id="OrganizationnameDiv" style="font-size:14px;"><?php echo  Yii::$app->user->identity->organization->Organization_Name; ?></div></font></td>
                                <td align="left" valign=bottom></td>
                                <td  rowspan=2 align="center" valign=middle bgcolor=""></td>
                                <td align="left" valign=bottom></td>
                                <td align="left" valign=bottom></td>
                            </tr>
                            <tr>
                                <td height="23" align="left" valign=middle><font  style="font-size:14px;"><b>End of Current Fiscal Year:</b></font></td>
                                <td align="left" valign=middle></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99">
                                    <font  style="font-size:14px;">
                                    <div id="CurrentFinancialyearHeaderDiv" style="font-size:14px;">
                                        <?php 
                                            $currentDate = !empty($ftatObj->Current_Fiscal_Year)? date('d-m-Y', strtotime($ftatObj->Current_Fiscal_Year)) : date('d-m-Y');
                                            
                                            
                                            echo \yii\jui\DatePicker::widget([
                                               'model' => $ftatObj,
                                               'attribute' => 'Current_Fiscal_Year',
                                                'value' => $currentDate,
                                               'options' => ['class' => "form-control", "data-id" => "Current_Fiscal_Year"], 
                                               'dateFormat' => 'dd-MM-yyyy',
                                           ]);
                                        ?>
                                        
                                        
                                        
                                    </div>
                                    </font>
                                </td>
                                <td align="left" valign=bottom></td>
                                <td align="left" valign=bottom></td>
                                <td align="left" valign=bottom></td>
                                <td align="left" valign=bottom></td>
                            </tr>
                            <tr>
                                <td height="7" align="left" valign=bottom><font color="#FFFFFF"><br></font></td>
                                <td align="center" valign=bottom><font color="#FFFFFF">Activity</font></td>
                                <td align="left" valign=bottom><font color="#FFFFFF">blank</font></td>
                                <td align="left" valign=bottom><font color="#FFFFFF">blank</font></td>
                                <td align="left" valign=bottom> <font color="#FFFFFF">Year1</font></td>
                                <td align="left" valign=bottom> <font color="#FFFFFF">Year2</font></td>
                                <td align="left" valign=bottom> <font color="#FFFFFF">Year3</font></td>
                                <td align="left" valign=bottom> <font color="#FFFFFF">Current Year</font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000" rowspan=3 height="68" align="center" valign=middle bgcolor="#0076C0"><b><font  color="#FFFFFF">Audit Section</font></b></td>
                                <td style="border-top: 2px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=middle bgcolor="#0076C0"><b><font  color="#FFFFFF"><br></font></b></td>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#0076C0"><b><font color="#FFFFFF" size="2">1. Three Years Ago</font></b></td>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#0076C0"><b><font color="#FFFFFF" size="2">2. Two Years Ago</font></b></td>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#0076C0"><b><font color="#FFFFFF" size="2">3. Last Year (Actuals)</font></b></td>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#0076C0"><b><font color="#FFFFFF" size="2">4. Current Year (Budget)</font></b></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="right" valign=middle bgcolor="#0076C0"><b><font  color="#FFFFFF">Fiscal Year Ending:</font></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#DCE6F2"><div id="CurrentFinancialyearDiv" data-id="Current_Fiscal_Year" style="font-size:14px;"><?php echo date('d-m-Y', strtotime($currentDate.' -3 year')); ?></div></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#DCE6F2"><div id="LastsFincialyearDiv" data-id="Current_Fiscal_Year" style="font-size:14px;"><?php echo date('d-m-Y', strtotime($currentDate.' -2 year')); ?></div></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#DCE6F2"><div id="TwoYearsagoFincialyearDiv" data-id="Current_Fiscal_Year" style="font-size:14px;"><?php echo date('d-m-Y', strtotime($currentDate.' -1 year')); ?></div></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#DCE6F2"><div id="ThreeYearsagoFincialyearDiv" data-id="Current_Fiscal_Year" style="font-size:14px;"><?php echo date('d-m-Y', strtotime($currentDate)); ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=5 height="145" align="center" valign=middle bgcolor="#0076C0"><b><font face="Franklin Gothic Book"  color="#FFFFFF">Statement of Activities</font></b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=7 align="left" valign=middle bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF">1. Did your organization have an operating surplus or deficit?</font></b></td>
                            </tr>
                            <tr>
                                <td class="border1" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[0]->Question_Name; ?></font></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="1"  id="UnrestrictedRevenueThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[0]->Prev_1yrs_Stat)? $prevData[0]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="1"  id="UnrestrictedRevenueTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[0]->Prev_2yrs_Stat)? $prevData[0]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="1"  id="UnrestrictedRevenueLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[0]->Prev_3yrs_Stat)? $prevData[0]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" align="center" valign=middle bgcolor="#FFFF99"><div data-id="1" id="UnrestrictedRevenueCurrentYearDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[0]->Curr_Yr_Stat)? $prevData[0]->Curr_Yr_Stat: ''  ?></div></td>
                            </tr>

                            <tr>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#DCE6F2"><i><font >Less:</font></i></td>
                                <td class="border3" rowspan=2 align="center" valign=middle bgcolor="#FFFF99"><div data-id="2" id="TotalExpensesThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[1]->Prev_1yrs_Stat)? $prevData[1]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border3" rowspan=2 align="center" valign=middle bgcolor="#FFFF99"><div data-id="2" id="TotalExpensesTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[1]->Prev_2yrs_Stat)? $prevData[1]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border3" rowspan=2 align="center" valign=middle bgcolor="#FFFF99"><div data-id="2" id="TotalExpensesLastYearsDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[1]->Prev_3yrs_Stat)? $prevData[1]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000;" rowspan=2 align="center" valign=middle bgcolor="#FFFF99"><div data-id="2" id="TotalExpensesCurrentYearDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[1]->Curr_Yr_Stat)? $prevData[1]->Curr_Yr_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[1]->Question_Name; ?></font></td>
                            </tr>
                            <tr>
                                <td class="border2" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[2]->Question_Name; ?></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF"><b><font class="font1"><div data-id="3"  id="UnrestrictedChangeThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[2]->Prev_1yrs_Stat)? $prevData[2]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="3"  id="UnrestrictedChangeTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[2]->Prev_2yrs_Stat)? $prevData[2]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="3"  id="UnrestrictedChangeLastYearDiv" class="font2"><?php echo !empty($prevData[2]->Prev_3yrs_Stat)? $prevData[2]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="3" id="UnrestrictedChangeCurrentYearDiv" class="font2"><?php echo !empty($prevData[2]->Curr_Yr_Stat)? $prevData[2]->Curr_Yr_Stat: ''  ?></div></font></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=15 height="460" align="center" valign=middle bgcolor="#0076C0"><b><font face="Franklin Gothic Book"  color="#FFFFFF">Statement of Activities</font></b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=7 align="left" valign=middle bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF">2. What was the mix of unrestricted revenue?</font></b></td>
                            </tr>
                            <tr>
                                <td class="border1" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[3]->Question_Name; ?></font></td>
                                <td class="border3"  align="center" valign=middle bgcolor="#FFFF99"><div  data-id="4"   id="IndividualContributionsThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[3]->Prev_1yrs_Stat)? $prevData[3]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border3"  align="center" valign=middle bgcolor="#FFFF99"><div data-id="4"   id="IndividualContributionsTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[3]->Prev_2yrs_Stat)? $prevData[3]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border3"  align="center" valign=middle bgcolor="#FFFF99"><div  data-id="4"  id="IndividualContributionsLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[3]->Prev_3yrs_Stat)? $prevData[3]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000;"  align="center" valign=middle bgcolor="#FFFF99"><div data-id="4"   id="IndividualContributionsCurrentYearDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[3]->Curr_Yr_Stat)? $prevData[3]->Curr_Yr_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[4]->Question_Name; ?></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF"><b><font class="font1"><div data-id="5"   id="IndividualTotalRevenueThreeyearsAgoDiv" class="font2"><?php echo !empty($prevData[4]->Prev_1yrs_Stat)? $prevData[4]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF"><b><font class="font1"><div data-id="5"  id="IndividualTotalRevenueTwoyearsAgoDiv" class="font2"><?php echo !empty($prevData[4]->Prev_2yrs_Stat)? $prevData[4]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF"><b><font class="font1"><div  data-id="5" id="IndividualTotalRevenueLastYearDiv" class="font2"><?php echo !empty($prevData[4]->Prev_3yrs_Stat)? $prevData[4]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="5"  id="IndividualTotalRevenueCurrentYearDiv" class="font2"><?php echo !empty($prevData[4]->Curr_Yr_Stat)? $prevData[4]->Curr_Yr_Stat: ''  ?></div></font></b></td>
                            </tr>
                            <tr>
                                <td class="border4" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[5]->Question_Name; ?></font></td>
                                <td class="border4" align="center" valign=middle bgcolor="#FFFF99"><div data-id="6"  id="FoundationCorporateThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[5]->Prev_1yrs_Stat)? $prevData[5]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border4" align="center" valign=middle bgcolor="#FFFF99"><div data-id="6"   id="FoundationCorporateTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[5]->Prev_2yrs_Stat)? $prevData[5]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border4" align="center" valign=middle bgcolor="#FFFF99"><div data-id="6"   id="FoundationCorporateLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[5]->Prev_3yrs_Stat)? $prevData[5]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" align="center" valign=middle bgcolor="#FFFF99"><div data-id="6"   id="FoundationCorporateCurrentYearDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[5]->Curr_Yr_Stat)? $prevData[5]->Curr_Yr_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#DCE6F2"><i><font >Plus:</font></i></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" align="center" valign=middle bgcolor="#FFFF99"><div  data-id="7"   id="SatisfactionThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[6]->Prev_1yrs_Stat)? $prevData[6]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" align="center" valign=middle bgcolor="#FFFF99"><div  data-id="7"    id="SatisfactionTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[6]->Prev_2yrs_Stat)? $prevData[6]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" align="center" valign=middle bgcolor="#FFFF99"><div  data-id="7"  id="SatisfactionLastYearsDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[6]->Prev_3yrs_Stat)? $prevData[6]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000;" align="center" rowspan="2" valign=middle bgcolor="#FFFF99"><div  data-id="7"  id="SatisfactionCurrentYearDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[6]->Curr_Yr_Stat)? $prevData[6]->Curr_Yr_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[6]->Question_Name; ?></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[7]->Question_Name; ?></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="8"  id="CorporateRevenueThreeyearsAgoDiv" class="font2"><?php echo !empty($prevData[7]->Prev_1yrs_Stat)? $prevData[7]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="8"  id="CorporateRevenueTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[7]->Prev_2yrs_Stat)? $prevData[7]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="8"  id="CorporateRevenueLastYearDiv" class="font2"><?php echo !empty($prevData[7]->Prev_3yrs_Stat)? $prevData[7]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="8"  id="CorporateRevenueCurrentYearDiv" class="font2"><?php echo !empty($prevData[7]->Curr_Yr_Stat)? $prevData[7]->Curr_Yr_Stat: ''  ?></div></font></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[8]->Question_Name; ?></font></td>
                                <td class="border4"  align="center" valign=middle bgcolor="#FFFF99"><div   data-id="9"  id="GovernmentFundingThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[8]->Prev_1yrs_Stat)? $prevData[8]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border4"  align="center" valign=middle bgcolor="#FFFF99"><div  data-id="9" id="GovernmentFundingTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[8]->Prev_2yrs_Stat)? $prevData[8]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border4"  align="center" valign=middle bgcolor="#FFFF99"><div  data-id="9" id="GovernmentFundingLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[8]->Prev_3yrs_Stat)? $prevData[8]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" align="center"  valign=middle bgcolor="#FFFF99"><div  data-id="9" id="GovernmentFundingCurrentYearDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[8]->Curr_Yr_Stat)? $prevData[8]->Curr_Yr_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[9]->Question_Name; ?></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="10" id="GovernmentRevenueThreeyearsAgoDiv" class="font2"><?php echo !empty($prevData[4]->Prev_1yrs_Stat)? $prevData[9]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="10"  id="GovernmentRevenueTwoyearsAgoDiv" class="font2"><?php echo !empty($prevData[4]->Prev_2yrs_Stat)? $prevData[9]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="10" id="GovernmentRevenueLastyearDiv" class="font2"><?php echo !empty($prevData[4]->Prev_3yrs_Stat)? $prevData[9]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" sdval="0" ><b><font class="font1"><div  data-id="10"  id="GovernmentRevenueCurrentYearDiv" class="font2"><?php echo !empty($prevData[9]->Curr_Yr_Stat)? $prevData[9]->Curr_Yr_Stat: ''  ?></div></font></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[10]->Question_Name; ?></font></td>
                                <td class="border2" align="center" valign=middle bgcolor="#FFFF99"><div data-id="11"  id="EarnedIncomeThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[10]->Prev_1yrs_Stat)? $prevData[10]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border2" align="center" valign=middle bgcolor="#FFFF99"><div data-id="11"  id="EarnedIncomeTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[10]->Prev_2yrs_Stat)? $prevData[10]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border2" align="center" valign=middle bgcolor="#FFFF99"><div data-id="11"  id="EarnedIncomeLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[10]->Prev_3yrs_Stat)? $prevData[10]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" align="center" valign=middle bgcolor="#FFFF99"><div data-id="11"  id="EarnedIncomeCurrentYearDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[10]->Prev_1yrs_Stat)? $prevData[10]->Prev_1yrs_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[11]->Question_Name; ?></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="12"  id="EarnedTotalRevenueThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[11]->Prev_1yrs_Stat)? $prevData[11]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="12"  id="EarnedTotalRevenueTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[11]->Prev_2yrs_Stat)? $prevData[11]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="12"  id="EarnedTotalRevenueLastYearsDiv" class="font2"><?php echo !empty($prevData[11]->Prev_3yrs_Stat)? $prevData[11]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="12"  id="EarnedTotalRevenueCurrentYearDiv" class="font2"><?php echo !empty($prevData[11]->Curr_Yr_Stat)? $prevData[11]->Curr_Yr_Stat: ''  ?></div></font></b></td>
                            </tr>
                            
                            <!--New Rows Start-->
                            <tr>
		  
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font><?php echo $ftat[44]->Question_Name; ?></font></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div id="InKindRevenueThreeyearsAgoDiv" data-id="45" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[44]->Prev_1yrs_Stat)? $prevData[44]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div id="InKindRevenueTwoYearsAgoDiv" data-id="45"  contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[44]->Prev_2yrs_Stat)? $prevData[44]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div id="InKindRevenueLastYearsDiv" data-id="45"  contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[44]->Prev_3yrs_Stat)? $prevData[44]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" align="center" valign=middle bgcolor="#FFFF99"><div id="InKindRevenueCurrentYearDiv" contentEditable="true"  data-id="45"  style="font-size:16px;"><?php echo !empty($prevData[44]->Curr_Yr_Stat)? $prevData[44]->Curr_Yr_Stat: ''  ?></div></td>
                            </tr>
                                    <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font><?php echo $ftat[45]->Question_Name; ?></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font face="Franklin Gothic Medium" size=3 color="#BFBFBF"><div  data-id="46"  id="InKindTotalRevenueThreeYearsAgoDiv" style="font-size:16px;height:30px;vertical-align:middle;"><?php echo !empty($prevData[45]->Prev_1yrs_Stat)? $prevData[45]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font face="Franklin Gothic Medium" size=3 color="#BFBFBF"><div data-id="46"  id="InKindTotalRevenueTwoYearsAgoDiv" style="font-size:16px;height:30px;vertical-align:middle;"><?php echo !empty($prevData[45]->Prev_2yrs_Stat)? $prevData[45]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font face="Franklin Gothic Medium" size=3 color="#BFBFBF"><div data-id="46"  id="InKindTotalRevenueLastYearsDiv" style="font-size:16px;height:30px;vertical-align:middle;"><?php echo !empty($prevData[45]->Prev_3yrs_Stat)? $prevData[45]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font face="Franklin Gothic Medium" size=3 color="#BFBFBF"><div id="InKindTotalRevenueCurrentYearDiv"  data-id="46"  style="font-size:16px;height:30px;vertical-align:middle;"><?php echo !empty($prevData[45]->Curr_Yr_Stat)? $prevData[45]->Curr_Yr_Stat: ''  ?></div></font></b></td>
                            </tr>
                            <!-- New Rows Ends -->
                            
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[12]->Question_Name; ?></font></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><font > <div data-id="13"  id="OtherIncomeThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[12]->Prev_1yrs_Stat)? $prevData[12]->Prev_1yrs_Stat: ''  ?></div></font></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><font > <div data-id="13"  id="OtherIncomeTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[12]->Prev_2yrs_Stat)? $prevData[12]->Prev_2yrs_Stat: ''  ?></div></font></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9"><font > <div data-id="13"  id="OtherIncomeLastYearDiv" class="font2"><?php echo !empty($prevData[12]->Prev_3yrs_Stat)? $prevData[12]->Prev_3yrs_Stat: ''  ?></div></font></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><font > <div  data-id="13"  id="OtherIncomeCurrentYearDiv" class="font2"><?php echo !empty($prevData[12]->Curr_Yr_Stat)? $prevData[12]->Curr_Yr_Stat: ''  ?></div></font></td>
                            </tr>
                            <tr>
                                <td class="border2" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[13]->Question_Name; ?></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="14"  id="OtherIncomerevenueThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[13]->Prev_1yrs_Stat)? $prevData[13]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="14" id="OtherIncomerevenueTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[13]->Prev_2yrs_Stat)? $prevData[13]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="14"  id="OtherIncomerevenueLastYearDiv" class="font2"><?php echo !empty($prevData[13]->Prev_3yrs_Stat)? $prevData[13]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="14" id="OtherIncomerevenueCurrentYearDiv" class="font2"><?php echo !empty($prevData[13]->Curr_Yr_Stat)? $prevData[13]->Curr_Yr_Stat: ''  ?></div></font></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=7 height="257" align="center" valign=middle bgcolor="#0076C0"><b><font face="Franklin Gothic Book"  color="#FFFFFF">Statement of Functional Expenses</font></b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=7 align="left" valign=middle bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF">3. How are resources allocated across programs and supporting services?</font></b></td>
                            </tr>
                            <tr>
                                <td class="border3" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[14]->Question_Name; ?></font></td>
                                <td style="border-top: 1px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div data-id="15"  id="TotalprogramExpenseThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[14]->Prev_1yrs_Stat)? $prevData[14]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div data-id="15"  id="TotalprogramExpenseTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[14]->Prev_2yrs_Stat)? $prevData[14]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div data-id="15"  id="TotalprogramExpenseLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[14]->Prev_3yrs_Stat)? $prevData[14]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000;" align="center" valign=middle bgcolor="#FFFF99"><div data-id="15"  id="TotalprogramExpenseCurrentYearDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[14]->Curr_Yr_Stat)? $prevData[14]->Curr_Yr_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[15]->Question_Name; ?> </font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="16"  id="ProgramTotalThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[15]->Prev_1yrs_Stat)? $prevData[15]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="16"  id="ProgramTotalTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[15]->Prev_2yrs_Stat)? $prevData[15]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="16"  id="ProgramTotalLastYearDiv" class="font2"><?php echo !empty($prevData[15]->Prev_3yrs_Stat)? $prevData[15]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="16"  id="ProgramTotalCurrentYearDiv" class="font2"><?php echo !empty($prevData[15]->Curr_Yr_Stat)? $prevData[15]->Curr_Yr_Stat: ''  ?></div></font></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[16]->Question_Name; ?></font></td>
                                <td class="border2" align="center" valign=middle bgcolor="#FFFF99"><div data-id="17"  id="TotalManagementThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[16]->Prev_1yrs_Stat)? $prevData[16]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border2" align="center" valign=middle bgcolor="#FFFF99"><div data-id="17"  id="TotalManagementTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[16]->Prev_2yrs_Stat)? $prevData[16]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border2" align="center" valign=middle bgcolor="#FFFF99"><div data-id="17"  id="TotalManagementLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[16]->Prev_3yrs_Stat)? $prevData[16]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" align="center" valign=middle bgcolor="#FFFF99"><div data-id="17"  id="TotalManagementCurrentYearDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[16]->Curr_Yr_Stat)? $prevData[16]->Curr_Yr_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[17]->Question_Name; ?></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="18"  id="ManagementTotalPrecentageThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[17]->Prev_1yrs_Stat)? $prevData[17]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="18"  id="ManagementTotalPrecentageTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[17]->Prev_2yrs_Stat)? $prevData[17]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="18"  id="ManagementTotalPrecentageLastYearDiv" class="font2"><?php echo !empty($prevData[17]->Prev_3yrs_Stat)? $prevData[17]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="18" id="ManagementTotalPrecentageCurrentYearDiv" class="font2"><?php echo !empty($prevData[17]->Curr_Yr_Stat)? $prevData[17]->Curr_Yr_Stat: ''  ?></div></font></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[18]->Question_Name; ?></font></td>
                                <td class="border2" align="center" valign=middle bgcolor="#FFFF99"><div  data-id="19"  id="TotalFundRaisingThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[18]->Prev_1yrs_Stat)? $prevData[18]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border2" align="center" valign=middle bgcolor="#FFFF99"><div  data-id="19"  id="TotalFundRaisingTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[18]->Prev_2yrs_Stat)? $prevData[18]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border2" align="center" valign=middle bgcolor="#FFFF99"><div data-id="19"  id="TotalFundRaisingLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[18]->Prev_3yrs_Stat)? $prevData[18]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" align="center" valign=middle bgcolor="#FFFF99"><div data-id="19"  id="TotalFundRaisingCurrentYearDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[18]->Curr_Yr_Stat)? $prevData[18]->Curr_Yr_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td class="border2" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[19]->Question_Name; ?></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF"><b><font class="font1"><div data-id="20"  id="FundRaisingExpensePercentageThreeYearAgosDiv" class="font2"><?php echo !empty($prevData[19]->Prev_1yrs_Stat)? $prevData[19]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF"><b><font class="font1"><div  data-id="20" id="FundRaisingExpensePercentageTwoYearAgosDiv" class="font2"><?php echo !empty($prevData[19]->Prev_2yrs_Stat)? $prevData[19]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td class="border2" align="center" valign=middle bgcolor="#BFBFBF"><b><font class="font1"><div  data-id="20" id="FundRaisingExpensePercentageLastYearDiv" class="font2"><?php echo !empty($prevData[19]->Prev_3yrs_Stat)? $prevData[19]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF"><b><font class="font1"><div data-id="20" id="FundRaisingExpensePercentageCurrentYearDiv" class="font2"><?php echo !empty($prevData[19]->Curr_Yr_Stat)? $prevData[19]->Curr_Yr_Stat: ''  ?></div></font></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=8 height="258" align="center" valign=middle bgcolor="#0076C0"><b><font face="Franklin Gothic Book"  color="#FFFFFF">Balance Sheet</font></b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=7 align="left" valign=middle bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF">4. How liquid are the organization&rsquo;s reserves?</font></b></td>
                            </tr>
                            <tr>
                                <td class="border1" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[20]->Question_Name; ?></font></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="21"  id="UnrestrictedNetThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[20]->Prev_1yrs_Stat)? $prevData[20]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="21" id="UnrestrictedNetTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[20]->Prev_2yrs_Stat)? $prevData[20]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="21"  id="UnrestrictedNetLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[20]->Prev_3yrs_Stat)? $prevData[20]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-left: 1px solid #000000" align="center" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td class="border1" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[21]->Question_Name; ?></font></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="22"  id="BoardDesignatedThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[21]->Prev_1yrs_Stat)? $prevData[21]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="22"  id="BoardDesignatedTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[21]->Prev_2yrs_Stat)? $prevData[21]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="22"  id="BoardDesignatedLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[21]->Prev_3yrs_Stat)? $prevData[21]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td class="border1" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[22]->Question_Name; ?></font></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="23"  id="DepreciationFixedAssetsThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[22]->Prev_1yrs_Stat)? $prevData[22]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="23"  id="DepreciationFixedAssetsTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[22]->Prev_2yrs_Stat)? $prevData[22]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div  data-id="23" id="DepreciationFixedAssetsLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[22]->Prev_3yrs_Stat)? $prevData[22]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#DCE6F2"><i><font >Less:</font></i></td>
                                <td style="border-top: 1px double #000000; border-bottom: 1px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle rowspan="2" bgcolor="#FFFF99"><div data-id="24"  id="MortgagesThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[23]->Prev_1yrs_Stat)? $prevData[23]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px double #000000; border-bottom: 1px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle rowspan="2" bgcolor="#FFFF99"><div data-id="24"  id="MortgagesTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[23]->Prev_2yrs_Stat)? $prevData[23]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px double #000000; border-bottom: 1px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle rowspan="2" bgcolor="#FFFF99"><div data-id="24"  id="MortgagesLastYearsDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[23]->Prev_3yrs_Stat)? $prevData[23]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[23]->Question_Name; ?></font></td>
                                <td style="border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[24]->Question_Name; ?></font></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><b><font  color="#D9D9D9"><div data-id="25"  id="DebtRelatedThreeYearAgosDiv" class="font2"><?php echo !empty($prevData[24]->Prev_1yrs_Stat)? $prevData[24]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><b><font  color="#D9D9D9"><div data-id="25"  id="DebtRelatedTwoYearAgosDiv" class="font2"><?php echo !empty($prevData[24]->Prev_2yrs_Stat)? $prevData[24]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><b><font  color="#D9D9D9"><div data-id="25"  id="DebtRelatedLastYearDiv" class="font2"><?php echo !empty($prevData[24]->Prev_3yrs_Stat)? $prevData[24]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td class="border2" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[25]->Question_Name; ?></font></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="26"  id="LUNAThreeYearAgosDiv" class="font2"><?php echo !empty($prevData[25]->Prev_1yrs_Stat)? $prevData[25]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="26"  id="LUNATwoYearAgosDiv" class="font2"><?php echo !empty($prevData[25]->Prev_2yrs_Stat)? $prevData[25]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="26"  id="LUNALastYearDiv" class="font2"><?php echo !empty($prevData[25]->Prev_3yrs_Stat)? $prevData[25]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=10 height="323" align="center" valign=middle bgcolor="#0076C0"><b><font face="Franklin Gothic Book"  color="#FFFFFF">Income Statement &amp; Balance Sheet</font></b></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=7 align="left" valign=middle bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF">5. How many months of operations can be covered with liquid operating reserves?</font></b></td>
                            </tr>
                            <tr>
                                <td class="border1" colspan=3 align="left" valign=middle><font ><?php echo $ftat[26]->Question_Name; ?></font></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><font  color="#D9D9D9"><div data-id="27"  id="AvailableLUNAThreeYearAgosDiv" class="font2"><?php echo !empty($prevData[26]->Prev_1yrs_Stat)? $prevData[26]->Prev_1yrs_Stat: ''  ?></div></font></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><font  color="#D9D9D9"><div data-id="27"  id="AvailableLUNATwoYearAgosDiv" class="font2"><?php echo !empty($prevData[26]->Prev_2yrs_Stat)? $prevData[26]->Prev_2yrs_Stat: ''  ?></div></font></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><font  color="#D9D9D9"><div data-id="27"  id="AvailableLUNALastYearDiv" class="font2"><?php echo !empty($prevData[26]->Prev_3yrs_Stat)? $prevData[26]->Prev_3yrs_Stat: ''  ?></div></font></td>
                                <td style="border-left: 1px solid #000000" align="center" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#DCE6F2"><i><font >Divided by Average Monthly Expenses:</font></i></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#D9D9D9" ><font  color="#D9D9D9"><div data-id="28"  id="CashAverageMonthlyThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[27]->Prev_1yrs_Stat)? $prevData[27]->Prev_1yrs_Stat: ''  ?></div></font></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#D9D9D9" ><font  color="#D9D9D9"><div data-id="28" id="CashAverageMonthlyTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[27]->Prev_2yrs_Stat)? $prevData[27]->Prev_2yrs_Stat: ''  ?></div></font></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#D9D9D9" ><font  color="#D9D9D9"><div data-id="28"  id="CashAverageMonthlyLastYearDiv" class="font2"><?php echo !empty($prevData[27]->Prev_3yrs_Stat)? $prevData[27]->Prev_3yrs_Stat: ''  ?></div></font></td>
                                <td style="border-left: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[27]->Question_Name; ?></font></td>
                            </tr>
                            <tr>
                                <td class="border2" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[28]->Question_Name; ?></font></b></td>
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="29"  id="MonthCoveredThreeYearAgosDiv" class="font2"><?php echo !empty($prevData[28]->Prev_1yrs_Stat)? $prevData[28]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="29"  id="MonthCoveredTwoYearAgosDiv" class="font2"><?php echo !empty($prevData[28]->Prev_2yrs_Stat)? $prevData[28]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="29"  id="MonthCoveredLastYearDiv" class="font2"><?php echo !empty($prevData[28]->Prev_3yrs_Stat)? $prevData[28]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=7 align="left" valign=middle bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF">6. How many months of operations can be covered with the available cash?</font></b></td>
                            </tr>
                            <tr>
                                <td class="border1" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[29]->Question_Name; ?></font></td>
                                <td class="border1" align="center" valign=middle  bgcolor="#FFFF99"><div data-id="30"  id="CashEquivalentsThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[29]->Prev_1yrs_Stat)? $prevData[29]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle  bgcolor="#FFFF99"><div data-id="30"  id="CashEquivalentsTwoYearsAgoDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[29]->Prev_2yrs_Stat)? $prevData[29]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle  bgcolor="#FFFF99"><div data-id="30"  id="CashEquivalentsLastYearsDiv" contentEditable="true" style="font-size:16px;"><?php echo !empty($prevData[29]->Prev_1yrs_Stat)? $prevData[29]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td style="border-left: 1px solid #000000" align="center" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#DCE6F2"><i><font >Divided by Average Monthly Expenses:</font></i></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#D9D9D9" ><font ><div data-id="31"  id="TotalAverageMonthlyThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[30]->Prev_1yrs_Stat)? $prevData[30]->Prev_1yrs_Stat: ''  ?></div></font></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#D9D9D9" ><font ><div data-id="31"  id="TotalAverageMonthlyTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[30]->Prev_2yrs_Stat)? $prevData[30]->Prev_2yrs_Stat: ''  ?></div> </font></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#D9D9D9" ><font ><div data-id="31"  id="TotalAverageMonthlyLastYearsDiv" class="font2"><?php echo !empty($prevData[30]->Prev_3yrs_Stat)? $prevData[30]->Prev_3yrs_Stat: ''  ?></div> </font></td>
                                <td style="border-left: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[30]->Question_Name; ?></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[31]->Question_Name; ?></font></b></td>
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="32"  id="MonthCashOnHandThreeYearAgosDiv" class="font2"><?php echo !empty($prevData[31]->Prev_1yrs_Stat)? $prevData[31]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="32"  id="MonthCashOnHandTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[31]->Prev_2yrs_Stat)? $prevData[31]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="32"  id="MonthCashOnHandLastYearsDiv" class="font2"><?php echo !empty($prevData[31]->Prev_3yrs_Stat)? $prevData[31]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=6 height="235" align="center" valign=middle bgcolor="#0076C0"><b><font face="Franklin Gothic Book"  color="#FFFFFF"> Board Metrics</font></b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=7 align="left" valign=bottom bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF">7. How engaged is your board?</font></b></td>
                            </tr>
                            <tr>
                                <td class="border1" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[32]->Question_Name; ?></font></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="33"  id="TotalBoardMembersThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[32]->Prev_1yrs_Stat)? $prevData[32]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="33"  id="TotalBoardMembersTwoyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[32]->Prev_2yrs_Stat)? $prevData[32]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="33"  id="TotalBoardMembersLastyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[32]->Prev_3yrs_Stat)? $prevData[32]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-left: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td class="border3" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[33]->Question_Name; ?></font></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div  data-id="34"  id="NoOfmembersMembersThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[33]->Prev_1yrs_Stat)? $prevData[33]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div  data-id="34" id="NoOfmembersMembersTwoyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[33]->Prev_2yrs_Stat)? $prevData[33]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div  data-id="34" id="NoOfmembersMembersLastyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[33]->Prev_3yrs_Stat)? $prevData[33]->Prev_3yrs_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[34]->Question_Name; ?></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="35" id="PercentageBoardContributingThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[34]->Prev_1yrs_Stat)? $prevData[34]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="35"  id="PercentageBoardContributingTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[34]->Prev_2yrs_Stat)? $prevData[34]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="35"  id="PercentageBoardContributingLastYearsDiv" class="font2"><?php echo !empty($prevData[34]->Prev_3yrs_Stat)? $prevData[34]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-left: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[35]->Question_Name; ?></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  align="center" valign=middle  bgcolor="#FFFF99"><div data-id="36"  id="TotalBoardAmountThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[35]->Prev_1yrs_Stat)? $prevData[35]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div data-id="36"  id="TotalBoardAmountTwoyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[35]->Prev_2yrs_Stat)? $prevData[35]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div data-id="36"  id="TotalBoardAmountLastyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[35]->Prev_3yrs_Stat)? $prevData[35]->Prev_3yrs_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[36]->Question_Name; ?> </font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="37"  id="BoardContributionsThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[36]->Prev_1yrs_Stat)? $prevData[36]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="37"  id="BoardContributionsTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[36]->Prev_2yrs_Stat)? $prevData[36]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" bgcolor="#BFBFBF"><b><font class="font1"><div  data-id="37"  id="BoardContributionsLastYearsDiv" class="font2"><?php echo !empty($prevData[36]->Prev_3yrs_Stat)? $prevData[36]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            
                            <!-- New Row Starts-->
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=5 height="235" align="center" valign=middle bgcolor="#0076C0"><b> <font color="#FFFFFF" face="Franklin Gothic Book">Special Events</font></b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=7 align="left" valign=bottom bgcolor="#54B948"><b><font color="#FFFFFF" face="Franklin Gothic Book"> 8. How profitable are your special events? </font></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font><?php echo $ftat[40]->Question_Name; ?></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div id="GrossSpecialRevenueThreeyearsAgoDiv" contentEditable="true" data-id="41" style="font-size:16px;height:30px;"><?php echo !empty($prevData[40]->Prev_1yrs_Stat)? $prevData[40]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div id="GrossSpecialRevenueTwoyearsAgoDiv" contentEditable="true" data-id="41" style="font-size:16px;height:30px;"><?php echo !empty($prevData[40]->Prev_2yrs_Stat)? $prevData[40]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div id="GrossSpecialRevenueLastyearsAgoDiv" contentEditable="true" data-id="41" style="font-size:16px;height:30px;"><?php echo !empty($prevData[40]->Prev_3yrs_Stat)? $prevData[40]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-left: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#9D9D9E"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font><?php echo $ftat[41]->Question_Name; ?></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div id="DirectEventExpenseThreeyearsAgoDiv" contentEditable="true"  data-id="42"  style="font-size:16px;height:30px;"><?php echo !empty($prevData[41]->Prev_1yrs_Stat)? $prevData[41]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div id="DirectEventExpenseTwoyearsAgoDiv" contentEditable="true" data-id="42"  style="font-size:16px;height:30px;"><?php echo !empty($prevData[41]->Prev_2yrs_Stat)? $prevData[41]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><div id="DirectEventExpenseLastyearsAgoDiv" contentEditable="true" data-id="42"  style="font-size:16px;height:30px;"><?php echo !empty($prevData[41]->Prev_3yrs_Stat)? $prevData[41]->Prev_3yrs_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font><?php echo $ftat[42]->Question_Name; ?></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font face="Franklin Gothic Medium" size=3 color="#BFBFBF"><div id="NetSpecialRevenueThreeYearsAgoDiv"  data-id="43"  style="font-size:16px;height:30px;vertical-align:middle;"><?php echo !empty($prevData[42]->Prev_1yrs_Stat)? $prevData[42]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font face="Franklin Gothic Medium" size=3 color="#BFBFBF"><div id="NetSpecialRevenueTwoYearsAgoDiv"   data-id="43" style="font-size:16px;height:30px;vertical-align:middle;"><?php echo !empty($prevData[42]->Prev_2yrs_Stat)? $prevData[42]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font face="Franklin Gothic Medium" size=3 color="#BFBFBF"><div id="NetSpecialRevenueLastYearsDiv"  data-id="43" style="font-size:16px;height:30px;vertical-align:middle;"><?php echo !empty($prevData[42]->Prev_3yrs_Stat)? $prevData[42]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-left: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#9D9D9E"></td>
                            </tr>
                            
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font><?php echo $ftat[43]->Question_Name; ?></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font face="Franklin Gothic Medium" size=3 color="#BFBFBF"><div  data-id="44" id="FundRaisingefficencyThreeyearsAgoDiv" style="font-size:16px;height:30px;vertical-align:middle;"><?php echo !empty($prevData[43]->Prev_1yrs_Stat)? $prevData[43]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font face="Franklin Gothic Medium" size=3 color="#BFBFBF"><div data-id="44" id="FundRaisingefficencyTwoyearsAgoDiv" style="font-size:16px;height:30px;vertical-align:middle;"><?php echo !empty($prevData[43]->Prev_2yrs_Stat)? $prevData[43]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font face="Franklin Gothic Medium" size=3 color="#BFBFBF"><div data-id="44" id="FundRaisingefficencyLastyearsAgoDiv" style="font-size:16px;height:30px;vertical-align:middle;"><?php echo !empty($prevData[43]->Prev_3yrs_Stat)? $prevData[41]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-left: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#9D9D9E"></td>
                            </tr>
                            <!-- New Row Ends -->
                            
                            <tr>
                                <td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=6 height="215" align="center" valign=middle bgcolor="#0076C0"><b><font face="Franklin Gothic Book"  color="#FFFFFF">Other Questions</font></b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=7 align="left" valign=bottom bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF">8. How are you using available resources?</font></b></td>
                            </tr>
                            <tr>
                                <td class="border3" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[37]->Question_Name; ?></font></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div  data-id="38"  id="FiscalAuditThreeyearsAgoDiv" contentEditable="true" style="font-size:14px;height:30px;"><?php echo !empty($prevData[37]->Prev_1yrs_Stat)? $prevData[37]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div  data-id="38" id="FiscalAuditTwoyearsAgoDiv" contentEditable="true" style="font-size:14px;height:30px;"><?php echo !empty($prevData[37]->Prev_2yrs_Stat)? $prevData[37]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><div data-id="38"  id="FiscalAuditLastyearsDiv" contentEditable="true" style="font-size:14px;height:30px;"><?php echo !empty($prevData[37]->Prev_3yrs_Stat)? $prevData[37]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=7 align="left" valign=bottom bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF"><?php echo $ftat[38]->Question_Name; ?></font></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #808080; border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" colspan=7 align="left" valign=middle bgcolor="#FFFF99" ><div  data-id="39"  id="RecentOrganizationalDiv" contentEditable="true" style="font-size:14px;"><?php echo !empty($prevData[38]->Description)? $prevData[38]->Description: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=7 align="left" valign=bottom bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF"><?php echo $ftat[39]->Question_Name; ?></font></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #808080; border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" colspan=7 align="left" valign=middle bgcolor="#FFFF99"><div  data-id="40"  id="FinacialAddressDiv" contentEditable="true" style="font-size:14px;"><?php echo !empty($prevData[39]->Description)? $prevData[39]->Description: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td height="20" align="left" valign=bottom></td>
                                <td align="left" valign=bottom></td>
                                <td align="left" valign=bottom></td>
                                <td align="left" valign=bottom></td>
                                <td align="left" valign=bottom></td>
                                <td align="left" valign=bottom></td>
                                <td align="left" valign=bottom></td>
                                <td align="left" valign=bottom></td>
                            </tr>
                        </table>
                    <div class="form-group ">
                        <div class="row clearfix">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <?php 
                                    $submited = '';
                                    
                                    
                                ?>
                                <?php if($ftatObj->Ftat_Status != 1): ?>
                                
                                <?php
                                    
                                    echo Html::a('Save', ['#'], ['class'=>'btn btn-primary save-btn']);
                                ?>
                                <?php
                                    $options['class'] = 'btn  btn-primary submit-btn';
                                    $disabled = '';
                                    if (empty($prevData[0])) {
                                        $disabled = ' disabled ';
                                        $options['disabled'] = 'disabled';
                                    }
                                    
                                    echo Html::a('Submit', ['#'], $options);
                                ?>
                                <?php else: ?>
                                <?php 
                                    $submited = "$('table div[id]').attr('contenteditable', false);"
                                ?>
                                <?php endif; ?>
                            </div>

                            
                        </div>

                    </div>
                    <?php ActiveForm::end(); ?>
                    
                    
                </div>
            </div>
    </div>
</div>
     <!-- Popup Start -->
    <?php
            yii\bootstrap\Modal::begin([
                'id' =>'confirmPopup',
                'header' => '<h2>Confirmation?</h2>',
                ]);
//                            yii\bootstrap\Modal::
    ?>
        <div class="row-fluid">
            <h4>Are you sure you want to submit the FTA? once submitted, you will not be allowed to update any information.</h4>
            <br>
            <br>
             <div class="pull-">
                <a  class="btn btn-primary ftat-submit">Ok</a>
                <a  class="btn btn-primary ftat-cancel">Cancel</a>

            </div>
            <div class="clearfix clear"></div>
        </div>    
    <?php
        yii\bootstrap\Modal::end();
    ?>
     <?php
        $this->registerJsFile('@web/youthinc-ui/assets/js/fta.js');
     ?>
<?php
        $this->registerJs(''
                . '$(".dropdown-modal").click(function(){ $(this).toggleClass("open")});'
                . "
                    $('body').on('click','.submit-btn',function(e) {
                    $('#confirmPopup').modal('show');
                        return false;
                }); 
                
                $submited
                
                $('.ftat-cancel').click(function(e) {
                    e.preventDefault();
                    $('#confirmPopup').modal('hide');
                }); 
                
                $('body').on('click', '.ftat-submit', function(){
                        ".'
                        var $this = $(this);
                        $this.parent().find(".hidden-spinner").remove();
                        var spinner = \'<span class="hidden-spinner"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>\';

                        $this.before(spinner);
                        $this.attr("disabled", true);'."
                        $.ajax({
                           method: 'POST',
                            url: '".Yii::$app->request->baseUrl."/ftat/ftat-submit/',
                            
                            success: function(data)
                            {
                                
                                window.location = window.location.href;
                            },
                            error: function(err) {
                                alert('there is error occured during saving data. Please contact to Admin.');
                                 window.location = window.location.href;
                            },
                        });
                }); 

                "
                . '
                    
                        

                    $("table div[id]").not("#CurrentFinancialyearHeaderDiv").each(function(){
                        var name = $(this).attr("id");
                        var index =  ($(this).parents("td").index());
                        var id =  ($(this).attr("data-id"));
                        
                        var inputBox = "<input type=\"hidden\" name=\"FTAT["+id+"]["+index+"]\">";
                        
                        $(this).after(inputBox)
                        
                    });
                    
                    $("table div[id]").on("DOMSubtreeModified", function(){
                        $(this).parents("td").find("input").not("#ftat-current_fiscal_year").val($(this).text())
                    });
                    

                    $("table div[id]").trigger("DOMSubtreeModified");
                        
                    $("#ftat-current_fiscal_year").change(function(){
                        var currentDate = $(this).val();
                        if(currentDate != "")
                        {
                            var dates = currentDate.split("-");
                            var date1 = dates[0] + "-" + dates[1] + "-" + (dates[2] -3)
                            var date2 = dates[0] + "-" + dates[1] + "-" + (dates[2] -2)
                            var date3 = dates[0] + "-" + dates[1] + "-" + (dates[2] -1)
                            $("#CurrentFinancialyearDiv").text(date1);
                            $("#LastsFincialyearDiv").text(date2);
                            $("#TwoYearsagoFincialyearDiv").text(date3);
                            $("#ThreeYearsagoFincialyearDiv").text(currentDate);

                        }
                    });
                    
                    /* Btn Css */
                    $(".save-btn").click(function(){
                        $(this).parents("form").submit();
                        return false;
                    });
                  
                                
                    


                    '."function flashMsg()
                  {
                    $.get('".Yii::$app->request->baseUrl."/survey/flash"."', function(data, status){
                        $('.alert-message-cnt').html(data);
                        setTimeout(function(){
                            $('.alert').find('.close').trigger('click')
                        }, 2000);
                    });
                  }"
                . '', \yii\web\VIEW::POS_READY);
    ?>