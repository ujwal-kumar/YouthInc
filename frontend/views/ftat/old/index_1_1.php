<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Financial Trends Analysis Tool');
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
        #ftat-form table {
            font-family: 	"Open Sans";
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
            font-family: "Franklin Gothic Medium" ;
            color: #333;
        }
        .font2
        {
            font-size:16px;height:30px;vertical-align:middle;
        }
        table td div {color: #333;}
    </style>
    

<div class="breadcrumbs ftat ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb ">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#"><?= Yii::t('app', 'Financial Trends Analysis Tool') ?></a>
        </li>
        <li class="active"><?= Yii::t('app', 'Financial Trends Analysis Tool') ?></li>
    </ul>
    <div class="page-content  ">
        
            <div class="page-header">
                
                    <h1><?= Yii::t('app', 'Financial Trends Analysis Tool') ?></h1>
                
            </div><!-- /.page-header -->
            
            <?php
//                prd($prevData);
            ?>
            
            <div class="row">
                <div class="col-xs-12">
                    <?php $form = ActiveForm::begin(['id' => 'ftat-form',]); ?>
                    <table class="table-responsive table-borderless" cellspacing="0" border="0">
                            
                            <tr>
                                <td height="30" align="left" valign=top><b>Organization Name:</b></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td class="border1" colspan=2 align="left" valign=middle bgcolor="#FFFF99"><font  ><div id="OrganizationnameDiv" style="font-size:14px;"><?php echo  Yii::$app->user->identity->organization->Organization_Name; ?></div></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td  rowspan=2 align="center" valign=middle bgcolor=""></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                            </tr>
                            <tr>
                                <td height="23" align="left" valign=middle><font  style="font-size:14px;">End of Current Fiscal Year:</font></td>
                                <td align="left" valign=middle><font ><br></font></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><font  style="font-size:14px;"><div id="CurrentFinancialyearHeaderDiv" style="font-size:14px;">9/30/2017</div></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
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
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#DCE6F2"><div id="CurrentFinancialyearDiv" style="font-size:14px;">9/30/2017</div></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#DCE6F2"><div id="LastsFincialyearDiv" style="font-size:14px;">9/30/2016</div></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#DCE6F2"><div id="TwoYearsagoFincialyearDiv" style="font-size:14px;">9/30/2015</div></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#DCE6F2"><div id="ThreeYearsagoFincialyearDiv" style="font-size:14px;">9/30/2014</div></td>
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
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=13 height="460" align="center" valign=middle bgcolor="#0076C0"><b><font face="Franklin Gothic Book"  color="#FFFFFF">Statement of Activities</font></b></td>
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
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000;" align="center" rowspan="2" valign=middle bgcolor="#FFFF99"><div  data-id="7"  id="SatisfactionCurrentYearDiv" contentEditable="true" style="font-size:16px;height:30px;"></div><?php echo !empty($prevData[6]->Curr_Yr_Stat)? $prevData[6]->Curr_Yr_Stat: ''  ?></td>
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
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[12]->Question_Name; ?></font></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><font > <div data-id="13"  id="OtherIncomeThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[12]->Prev_1yrs_Stat)? $prevData[12]->Prev_1yrs_Stat: ''  ?></div></font></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><font > <div data-id="13"  id="OtherIncomeTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[12]->Prev_2yrs_Stat)? $prevData[12]->Prev_2yrs_Stat: ''  ?></div></font></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9"><font > <div data-id="13"  id="OtherIncomeLastYearDiv" class="font2"><?php echo !empty($prevData[12]->Prev_3yrs_Stat)? $prevData[12]->Prev_3yrs_Stat: ''  ?></div></font></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#D9D9D9" ><font > <div id="OtherIncomeCurrentYearDiv" class="font2"><?php echo !empty($prevData[12]->Curr_Yr_Stat)? $prevData[12]->Curr_Yr_Stat: ''  ?></div></font></td>
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
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"<div data-id="32"  id="MonthCashOnHandLastYearsDiv" class="font2"><?php echo !empty($prevData[31]->Prev_3yrs_Stat)? $prevData[31]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=6 height="235" align="center" valign=middle bgcolor="#0076C0"><b><font face="Franklin Gothic Book"  color="#FFFFFF"> Board Metrics</font></b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=7 align="left" valign=bottom bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF">7. How engaged is your board?</font></b></td>
                            </tr>
                            <tr>
                                <td class="border1" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[32]->Question_Name; ?></font></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><font ><br></font><div data-id="33"  id="TotalBoardMembersThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[32]->Prev_1yrs_Stat)? $prevData[32]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><font ><br></font><div data-id="33"  id="TotalBoardMembersTwoyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[32]->Prev_2yrs_Stat)? $prevData[32]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><font ><br></font><div data-id="33"  id="TotalBoardMembersLastyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[32]->Prev_3yrs_Stat)? $prevData[32]->Prev_3yrs_Stat: ''  ?></div></td>
                                <td style="border-left: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td class="border3" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[33]->Question_Name; ?></font></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><font ><br></font><div  data-id="34"  id="NoOfmembersMembersThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[33]->Prev_1yrs_Stat)? $prevData[33]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><font ><br></font><div  data-id="34" id="NoOfmembersMembersTwoyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[33]->Prev_2yrs_Stat)? $prevData[33]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><font ><br></font><div  data-id="34" id="NoOfmembersMembersLastyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[33]->Prev_3yrs_Stat)? $prevData[33]->Prev_3yrs_Stat: ''  ?></div></td>
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
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  align="center" valign=middle  bgcolor="#FFFF99"><font ><br></font><div data-id="36"  id="TotalBoardAmountThreeyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[35]->Prev_1yrs_Stat)? $prevData[35]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><font ><br></font><div data-id="36"  id="TotalBoardAmountTwoyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[35]->Prev_2yrs_Stat)? $prevData[35]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99"><font ><br></font><div data-id="36"  id="TotalBoardAmountLastyearsAgoDiv" contentEditable="true" style="font-size:16px;height:30px;"><?php echo !empty($prevData[35]->Prev_3yrs_Stat)? $prevData[35]->Prev_3yrs_Stat: ''  ?></div></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle bgcolor="#BFBFBF"><b><font  ><?php echo $ftat[36]->Question_Name; ?> </font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div  data-id="37"  id="BoardContributionsThreeYearsAgoDiv" class="font2"><?php echo !empty($prevData[36]->Prev_1yrs_Stat)? $prevData[36]->Prev_1yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFBF" ><b><font class="font1"><div data-id="37"  id="BoardContributionsTwoYearsAgoDiv" class="font2"><?php echo !empty($prevData[36]->Prev_2yrs_Stat)? $prevData[36]->Prev_2yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" bgcolor="#BFBFBF"><b><font class="font1"><div  data-id="37"  id="BoardContributionsLastYearsDiv" class="font2"><?php echo !empty($prevData[36]->Prev_3yrs_Stat)? $prevData[36]->Prev_3yrs_Stat: ''  ?></div></font></b></td>
                                <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="left" valign=middle bgcolor="#9D9D9E"><font  ><br></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=6 height="215" align="center" valign=middle bgcolor="#0076C0"><b><font face="Franklin Gothic Book"  color="#FFFFFF">Other Questions</font></b></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=7 align="left" valign=bottom bgcolor="#54B948"><b><font face="Franklin Gothic Book"  color="#FFFFFF">8. How are you using available resources?</font></b></td>
                            </tr>
                            <tr>
                                <td class="border3" colspan=3 align="left" valign=middle><font  ><?php echo $ftat[37]->Question_Name; ?></font></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><font ><br></font><div  data-id="38"  id="FiscalAuditThreeyearsAgoDiv" contentEditable="true" style="font-size:14px;height:30px;"><?php echo !empty($prevData[37]->Prev_1yrs_Stat)? $prevData[37]->Prev_1yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><font ><br></font><div  data-id="38" id="FiscalAuditTwoyearsAgoDiv" contentEditable="true" style="font-size:14px;height:30px;"><?php echo !empty($prevData[37]->Prev_2yrs_Stat)? $prevData[37]->Prev_2yrs_Stat: ''  ?></div></td>
                                <td class="border1" align="center" valign=middle bgcolor="#FFFF99"><font ><br></font><div data-id="38"  id="FiscalAuditLastyearsDiv" contentEditable="true" style="font-size:14px;height:30px;"><?php echo !empty($prevData[37]->Prev_3yrs_Stat)? $prevData[37]->Prev_3yrs_Stat: ''  ?></div></td>
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
                                <td height="20" align="left" valign=bottom><font ><br></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                                <td align="left" valign=bottom><font ><br></font></td>
                            </tr>
                        </table>
                    <div class="form-group ">
                        <div class="row clearfix">
                            <div class="col-sm-12 col-md-6 col-lg-1">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-primary log-btn', 'name' => 'save-button']) ?>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-1" >
                                <?= Html::resetButton('Submit', ['class' => 'btn btn-primary log-btn', 'name' => 'submit-button']) ?>
                            </div>
                        </div>

                    </div>
                    <?php ActiveForm::end(); ?>
                    
                    
                </div>
            </div>
    </div>
</div>
<?php
        $this->registerJs(''
                . '
                    $("table div[id]").each(function(){
                        var name = $(this).attr("id");
                        var index =  ($(this).parents("td").index());
                        var id =  ($(this).attr("data-id"));
                        
                        var inputBox = "<input type=\"hidden\" name=\"FTAT["+id+"]["+index+"]\">";
                        
                        $(this).after(inputBox)
                        
                    });
                    
                    $("table div[id]").on("DOMSubtreeModified", function(){
                        $(this).parents("td").find("input").val($(this).text())
                    });
                    
                    $("table div[id]").trigger("DOMSubtreeModified");
                        
                        AllowNumeric();
                        //1. Did your organization have an operating surplus or deficit?
                        SurplusBlur();
                        //2.Unrestricted Revenue
                        RevenueBlur();
                        //3.FoundationBlur
                        FoundationBlur();
                        //4.Government Funding
                        GovernmentFunding();
                        //5.EarnedIncome
                        EarnedIncome();
                        //6.Total program
                        TotalProgram();
                        //7.Total Management
                        TotalManagement();
                        //8.Total FundRaising
                        TotalFundraising();
                        //9.FixedAssets
                        FixedAssets();
                        //10.LUNA
                        LUNA();
                        //11.Total Annual Expense
                        CashAnnualExpense();
                        //12.Board Contributing
                        BoardContributing();
                        //13.Board Contributions Revenue
                        BoardContributionFinal();

                   

                    function AllowNumeric()
                    {
                        Numeric("#UnrestrictedRevenueThreeyearsAgoDiv");
                        Numeric("#TotalExpensesThreeyearsAgoDiv");
                        Numeric("#UnrestrictedRevenueTwoYearsAgoDiv");
                        Numeric("#TotalExpensesTwoYearsAgoDiv");
                        Numeric("#UnrestrictedRevenueLastYearsDiv");
                        Numeric("#TotalExpensesLastYearsDiv");
                        Numeric("#UnrestrictedRevenueCurrentYearDiv");
                        Numeric("#TotalExpensesCurrentYearDiv");
                        Numeric("#IndividualContributionsThreeyearsAgoDiv");
                        Numeric("#IndividualContributionsTwoYearsAgoDiv");
                        Numeric("#IndividualContributionsLastYearsDiv");
                        Numeric("#IndividualContributionsCurrentYearDiv");
                        Numeric("#FoundationCorporateThreeyearsAgoDiv");
                        Numeric("#FoundationCorporateTwoYearsAgoDiv");
                        Numeric("#FoundationCorporateLastYearsDiv");
                        Numeric("#FoundationCorporateCurrentYearDiv");
                        Numeric("#SatisfactionThreeyearsAgoDiv");
                        Numeric("#SatisfactionTwoYearsAgoDiv");
                        Numeric("#SatisfactionLastYearsDiv");
                        Numeric("#SatisfactionCurrentYearDiv");
                        Numeric("#CorporateRevenueThreeyearsAgoDiv");
                        Numeric("#CorporateRevenueTwoYearsAgoDiv");
                        Numeric("#CorporateRevenueLastYearDiv");
                        Numeric("#CorporateRevenueCurrentYearDiv");

                        Numeric("#GovernmentFundingThreeyearsAgoDiv");
                        Numeric("#GovernmentFundingTwoYearsAgoDiv");
                        Numeric("#GovernmentFundingLastYearsDiv");
                        Numeric("#GovernmentFundingCurrentYearDiv");



                        Numeric("#GovernmentRevenueThreeyearsAgoDiv");
                        Numeric("#GovernmentRevenueTwoyearsAgoDiv");
                        Numeric("#GovernmentRevenueLastyearDiv");
                        Numeric("#GovernmentRevenueCurrentYearDiv");

                        Numeric("#EarnedIncomeThreeyearsAgoDiv");
                        Numeric("#EarnedIncomeTwoYearsAgoDiv");
                        Numeric("#EarnedIncomeLastYearsDiv");
                        Numeric("#EarnedIncomeCurrentYearDiv");

                        Numeric("#EarnedTotalRevenueThreeYearsAgoDiv");
                        Numeric("#EarnedTotalRevenueTwoYearsAgoDiv");
                        Numeric("#EarnedTotalRevenueLastYearsDiv");
                        Numeric("#EarnedTotalRevenueCurrentYearDiv");

                        Numeric("#OtherIncomeThreeYearsAgoDiv");
                        Numeric("#OtherIncomeTwoYearsAgoDiv");
                        Numeric("#OtherIncomeLastYearDiv");
                        Numeric("#OtherIncomeCurrentYearDiv");

                        Numeric("#OtherIncomerevenueThreeYearsAgoDiv");
                        Numeric("#OtherIncomerevenueTwoYearsAgoDiv");
                        Numeric("#OtherIncomerevenueLastYearDiv");
                        Numeric("#OtherIncomerevenueCurrentYearDiv");


                        Numeric("#TotalprogramExpenseThreeyearsAgoDiv");
                        Numeric("#TotalprogramExpenseTwoYearsAgoDiv");
                        Numeric("#TotalprogramExpenseLastYearsDiv");
                        Numeric("#TotalprogramExpenseCurrentYearDiv");

                        Numeric("#ProgramTotalThreeYearsAgoDiv");
                        Numeric("#ProgramTotalTwoYearsAgoDiv");
                        Numeric("#ProgramTotalLastYearDiv");
                        Numeric("#ProgramTotalCurrentYearDiv");

                        Numeric("#TotalManagementThreeyearsAgoDiv");
                        Numeric("#TotalManagementTwoYearsAgoDiv");
                        Numeric("#TotalManagementLastYearsDiv");
                        Numeric("#TotalManagementCurrentYearDiv");

                        Numeric("#ManagementTotalPrecentageThreeYearsAgoDiv");
                        Numeric("#ManagementTotalPrecentageTwoYearsAgoDiv");
                        Numeric("#ManagementTotalPrecentageLastYearDiv");
                        Numeric("#ManagementTotalPrecentageCurrentYearDiv");

                        Numeric("#TotalFundRaisingThreeyearsAgoDiv");
                        Numeric("#TotalFundRaisingTwoYearsAgoDiv");
                        Numeric("#TotalFundRaisingLastYearsDiv");
                        Numeric("#TotalFundRaisingCurrentYearDiv");

                        Numeric("#FundRaisingExpensePercentageThreeYearAgosDiv");
                        Numeric("#FundRaisingExpensePercentageTwoYearAgosDiv");
                        Numeric("#FundRaisingExpensePercentageLastYearDiv");
                        Numeric("#FundRaisingExpensePercentageCurrentYearDiv");


                        Numeric("#UnrestrictedNetThreeyearsAgoDiv");
                        Numeric("#UnrestrictedNetTwoYearsAgoDiv");
                        Numeric("#UnrestrictedNetLastYearsDiv");

                        Numeric("#BoardDesignatedThreeyearsAgoDiv");
                        Numeric("#BoardDesignatedTwoYearsAgoDiv");
                        Numeric("#BoardDesignatedLastYearsDiv");

                        Numeric("#DepreciationFixedAssetsThreeyearsAgoDiv");
                        Numeric("#DepreciationFixedAssetsTwoYearsAgoDiv");
                        Numeric("#DepreciationFixedAssetsLastYearsDiv");

                        Numeric("#MortgagesThreeyearsAgoDiv");
                        Numeric("#MortgagesTwoYearsAgoDiv");
                        Numeric("#MortgagesLastYearsDiv");


                        Numeric("#DebtRelatedThreeYearAgosDiv");
                        Numeric("#DebtRelatedTwoYearAgosDiv");
                        Numeric("#DebtRelatedLastYearDiv");



                        Numeric("#LUNAThreeYearAgosDiv");
                        Numeric("#LUNATwoYearAgosDiv");
                        Numeric("#LUNALastYearDiv");

                        Numeric("#AvailableLUNAThreeYearAgosDiv");
                        Numeric("#AvailableLUNATwoYearAgosDiv");
                        Numeric("#AvailableLUNALastYearDiv");

                        Numeric("#CashAverageMonthlyThreeYearsAgoDiv");
                        Numeric("#CashAverageMonthlyTwoYearsAgoDiv");
                        Numeric("#CashAverageMonthlyLastYearDiv");

                        Numeric("#MonthCoveredThreeYearAgosDiv");
                        Numeric("#MonthCoveredTwoYearAgosDiv");
                        Numeric("#MonthCoveredLastYearDiv");

                        Numeric("#CashEquivalentsThreeyearsAgoDiv");
                        Numeric("#CashEquivalentsTwoYearsAgoDiv");
                        Numeric("#CashEquivalentsLastYearsDiv");


                        Numeric("#TotalAverageMonthlyThreeYearsAgoDiv");
                        Numeric("#TotalAverageMonthlyTwoYearsAgoDiv");
                        Numeric("#TotalAverageMonthlyLastYearsDiv");

                        Numeric("#MonthCashOnHandThreeYearAgosDiv");
                        Numeric("#MonthCashOnHandTwoYearsAgoDiv");
                        Numeric("#MonthCashOnHandLastYearsDiv");


                        Numeric("#TotalBoardMembersThreeyearsAgoDiv");
                        Numeric("#TotalBoardMembersTwoyearsAgoDiv");
                        Numeric("#TotalBoardMembersLastyearsAgoDiv");

                        Numeric("#NoOfmembersMembersThreeyearsAgoDiv");
                        Numeric("#NoOfmembersMembersTwoyearsAgoDiv");
                        Numeric("#NoOfmembersMembersLastyearsAgoDiv");

                        Numeric("#PercentageBoardContributingThreeYearsAgoDiv");
                        Numeric("#PercentageBoardContributingTwoYearsAgoDiv");
                        Numeric("#PercentageBoardContributingLastYearsDiv");


                        Numeric("#TotalBoardAmountThreeyearsAgoDiv");
                        Numeric("#TotalBoardAmountTwoyearsAgoDiv");
                        Numeric("#TotalBoardAmountLastyearsAgoDiv");

                        Numeric("#BoardContributionsThreeYearsAgoDiv");
                        Numeric("#BoardContributionsTwoYearsAgoDiv");
                        Numeric("#BoardContributionsLastYearsDiv");

                        Numeric("#FiscalAuditThreeyearsAgoDiv");
                        Numeric("#FiscalAuditTwoyearsAgoDiv");
                        Numeric("#FiscalAuditLastyearsDiv");

                    }
                    
                    function TotalRevenueThreeyearsAgo()
                    {
                        CompleteTotalRevenue("UnrestrictedRevenueThreeyearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "FoundationCorporateThreeyearsAgoDiv", "SatisfactionThreeyearsAgoDiv", "GovernmentFundingThreeyearsAgoDiv", "EarnedIncomeThreeyearsAgoDiv", "OtherIncomeThreeYearsAgoDiv", "OtherIncomerevenueThreeYearsAgoDiv","EarnedTotalRevenueThreeYearsAgoDiv")
                    }
                    function TotalRevenueTwoyearsAgo() {
                        CompleteTotalRevenue("UnrestrictedRevenueTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "FoundationCorporateTwoYearsAgoDiv", "SatisfactionTwoYearsAgoDiv", "GovernmentFundingTwoYearsAgoDiv", "EarnedIncomeTwoYearsAgoDiv", "OtherIncomeTwoYearsAgoDiv", "OtherIncomerevenueTwoYearsAgoDiv","EarnedTotalRevenueTwoYearsAgoDiv")
                    }
                    function TotalRevenueLastYear() {
                        CompleteTotalRevenue("UnrestrictedRevenueLastYearsDiv", "IndividualContributionsLastYearsDiv", "FoundationCorporateLastYearsDiv", "SatisfactionLastYearsDiv", "GovernmentFundingLastYearsDiv", "EarnedIncomeLastYearsDiv", "OtherIncomeLastYearDiv", "OtherIncomerevenueLastYearDiv","EarnedTotalRevenueLastYearsDiv")
                    }
                    function TotalRevenueCurrentYear() {
                        CompleteTotalRevenue("UnrestrictedRevenueCurrentYearDiv", "IndividualContributionsCurrentYearDiv", "FoundationCorporateCurrentYearDiv", "SatisfactionCurrentYearDiv", "GovernmentFundingCurrentYearDiv", "EarnedIncomeCurrentYearDiv", "OtherIncomeCurrentYearDiv", "OtherIncomerevenueCurrentYearDiv","EarnedTotalRevenueCurrentYearDiv")
                    }

                    function SurplusBlur()
                    {
                        $("#UnrestrictedRevenueThreeyearsAgoDiv, #TotalExpensesThreeyearsAgoDiv, #UnrestrictedRevenueTwoYearsAgoDiv, #TotalExpensesTwoYearsAgoDiv").trigger("blur");
                        $("#UnrestrictedRevenueThreeyearsAgoDiv").blur(function () {
                            OperatingSurplus("UnrestrictedRevenueThreeyearsAgoDiv", "TotalExpensesThreeyearsAgoDiv", "UnrestrictedChangeThreeYearsAgoDiv", "OtherIncomeThreeYearsAgoDiv", "OtherIncomerevenueThreeYearsAgoDiv", "CashAverageMonthlyThreeYearsAgoDiv", "TotalAverageMonthlyThreeYearsAgoDiv", "TotalBoardAmountThreeyearsAgoDiv", "CashEquivalentsThreeyearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "FoundationCorporateThreeyearsAgoDiv", "SatisfactionThreeyearsAgoDiv", "GovernmentFundingThreeyearsAgoDiv", "EarnedIncomeThreeyearsAgoDiv", "TotalprogramExpenseThreeyearsAgoDiv", "TotalManagementThreeyearsAgoDiv","TotalFundRaisingThreeyearsAgoDiv");
                            TotalRevenueThreeyearsAgo();
                        });
                        $("#TotalExpensesThreeyearsAgoDiv").blur(function () {
                            OperatingSurplus("UnrestrictedRevenueThreeyearsAgoDiv", "TotalExpensesThreeyearsAgoDiv", "UnrestrictedChangeThreeYearsAgoDiv", "OtherIncomeThreeYearsAgoDiv", "OtherIncomerevenueThreeYearsAgoDiv", "CashAverageMonthlyThreeYearsAgoDiv", "TotalAverageMonthlyThreeYearsAgoDiv", "TotalBoardAmountThreeyearsAgoDiv", "CashEquivalentsThreeyearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "FoundationCorporateThreeyearsAgoDiv", "SatisfactionThreeyearsAgoDiv", "GovernmentFundingThreeyearsAgoDiv", "EarnedIncomeThreeyearsAgoDiv", "TotalprogramExpenseThreeyearsAgoDiv", "TotalManagementThreeyearsAgoDiv","TotalFundRaisingThreeyearsAgoDiv");
                            TotalRevenueThreeyearsAgo();
                        });

                        $("#UnrestrictedRevenueTwoYearsAgoDiv").blur(function () {
                            OperatingSurplus("UnrestrictedRevenueTwoYearsAgoDiv", "TotalExpensesTwoYearsAgoDiv", "UnrestrictedChangeTwoYearsAgoDiv", "OtherIncomeTwoYearsAgoDiv", "OtherIncomerevenueTwoYearsAgoDiv", "CashAverageMonthlyTwoYearsAgoDiv", "TotalAverageMonthlyTwoYearsAgoDiv", "TotalBoardAmountTwoyearsAgoDiv", "CashEquivalentsTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "FoundationCorporateTwoYearsAgoDiv", "SatisfactionTwoYearsAgoDiv", "GovernmentFundingTwoYearsAgoDiv", "EarnedIncomeTwoYearsAgoDiv", "TotalprogramExpenseTwoYearsAgoDiv", "TotalManagementTwoYearsAgoDiv","TotalFundRaisingTwoYearsAgoDiv");
                            TotalRevenueTwoyearsAgo();
                        });
                        $("#TotalExpensesTwoYearsAgoDiv").blur(function () {
                            OperatingSurplus("UnrestrictedRevenueTwoYearsAgoDiv", "TotalExpensesTwoYearsAgoDiv", "UnrestrictedChangeTwoYearsAgoDiv", "OtherIncomeTwoYearsAgoDiv", "OtherIncomerevenueTwoYearsAgoDiv", "CashAverageMonthlyTwoYearsAgoDiv", "TotalAverageMonthlyTwoYearsAgoDiv", "TotalBoardAmountTwoyearsAgoDiv", "CashEquivalentsTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "FoundationCorporateTwoYearsAgoDiv", "SatisfactionTwoYearsAgoDiv", "GovernmentFundingTwoYearsAgoDiv", "EarnedIncomeTwoYearsAgoDiv", "TotalprogramExpenseTwoYearsAgoDiv", "TotalManagementTwoYearsAgoDiv","TotalFundRaisingTwoYearsAgoDiv");
                            TotalRevenueTwoyearsAgo();
                        });

                        $("#UnrestrictedRevenueLastYearsDiv").blur(function () {
                            OperatingSurplus("UnrestrictedRevenueLastYearsDiv", "TotalExpensesLastYearsDiv", "UnrestrictedChangeLastYearDiv", "OtherIncomeLastYearDiv", "OtherIncomerevenueLastYearDiv", "CashAverageMonthlyLastYearDiv", "TotalAverageMonthlyLastYearsDiv", "TotalBoardAmountLastyearsAgoDiv", "CashEquivalentsLastYearsDiv", "IndividualContributionsLastYearsDiv", "FoundationCorporateLastYearsDiv", "SatisfactionLastYearsDiv", "GovernmentFundingLastYearsDiv", "EarnedIncomeLastYearsDiv", "TotalprogramExpenseLastYearsDiv", "TotalManagementLastYearsDiv","TotalFundRaisingLastYearsDiv");
                            TotalRevenueLastYear();
                        });
                        $("#TotalExpensesLastYearsDiv").blur(function () {
                            OperatingSurplus("UnrestrictedRevenueLastYearsDiv", "TotalExpensesLastYearsDiv", "UnrestrictedChangeLastYearDiv", "OtherIncomeLastYearDiv", "OtherIncomerevenueLastYearDiv", "CashAverageMonthlyLastYearDiv", "TotalAverageMonthlyLastYearsDiv", "TotalBoardAmountLastyearsAgoDiv", "CashEquivalentsLastYearsDiv", "IndividualContributionsLastYearsDiv", "FoundationCorporateLastYearsDiv", "SatisfactionLastYearsDiv", "GovernmentFundingLastYearsDiv", "EarnedIncomeLastYearsDiv", "TotalprogramExpenseLastYearsDiv", "TotalManagementLastYearsDiv","TotalFundRaisingLastYearsDiv");
                            TotalRevenueLastYear();
                        });

                        $("#UnrestrictedRevenueCurrentYearDiv").blur(function () {
                            OperatingSurplus("UnrestrictedRevenueCurrentYearDiv", "TotalExpensesCurrentYearDiv", "UnrestrictedChangeCurrentYearDiv", "OtherIncomeCurrentYearDiv", "OtherIncomerevenueCurrentYearDiv", null, null, "IndividualContributionsCurrentYearDiv", "FoundationCorporateCurrentYearDiv", "SatisfactionCurrentYearDiv", "GovernmentFundingCurrentYearDiv", "EarnedIncomeCurrentYearDiv", "TotalprogramExpenseCurrentYearDiv", "TotalManagementCurrentYearDiv","TotalFundRaisingCurrentYearDiv");
                            TotalRevenueCurrentYear();
                        });
                        $("#TotalExpensesCurrentYearDiv").blur(function () {
                            OperatingSurplus("UnrestrictedRevenueCurrentYearDiv", "TotalExpensesCurrentYearDiv", "UnrestrictedChangeCurrentYearDiv", "OtherIncomeCurrentYearDiv", "OtherIncomerevenueCurrentYearDiv", null, null, "IndividualContributionsCurrentYearDiv", "FoundationCorporateCurrentYearDiv", "SatisfactionCurrentYearDiv", "GovernmentFundingCurrentYearDiv", "EarnedIncomeCurrentYearDiv", "TotalprogramExpenseCurrentYearDiv", "TotalManagementCurrentYearDiv","TotalFundRaisingCurrentYearDiv");
                            TotalRevenueCurrentYear();
                        });
                    }
                    function RevenueBlur()
                    {
                        $("#IndividualContributionsThreeyearsAgoDiv, #IndividualContributionsTwoYearsAgoDiv, #IndividualContributionsLastYearsDiv, #IndividualContributionsCurrentYearDiv").trigger("blur");
                        $("#IndividualContributionsThreeyearsAgoDiv").blur(function () {
                            UnRestrictedRevenue("UnrestrictedRevenueThreeyearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "IndividualTotalRevenueThreeyearsAgoDiv", "OtherIncomeThreeYearsAgoDiv");
                            TotalRevenueThreeyearsAgo();
                        });

                        $("#IndividualContributionsTwoYearsAgoDiv").blur(function () {
                            UnRestrictedRevenue("UnrestrictedRevenueTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "IndividualTotalRevenueTwoyearsAgoDiv", "OtherIncomeTwoYearsAgoDiv");
                            TotalRevenueTwoyearsAgo();
                        });

                        $("#IndividualContributionsLastYearsDiv").blur(function () {
                            UnRestrictedRevenue("UnrestrictedRevenueLastYearsDiv", "IndividualContributionsLastYearsDiv", "IndividualTotalRevenueLastYearDiv", "OtherIncomeLastYearDiv");
                            TotalRevenueLastYear();
                        });

                        $("#IndividualContributionsCurrentYearDiv").blur(function () {
                            UnRestrictedRevenue("UnrestrictedRevenueCurrentYearDiv", "IndividualContributionsCurrentYearDiv", "IndividualTotalRevenueCurrentYearDiv", "OtherIncomeCurrentYearDiv");
                            TotalRevenueCurrentYear();
                        });
                    }

                    function FoundationBlur()
                    {
                        $("#FoundationCorporateThreeyearsAgoDiv, #SatisfactionThreeyearsAgoDiv, #FoundationCorporateTwoYearsAgoDiv, #SatisfactionTwoYearsAgoDiv, #FoundationCorporateLastYearsDiv, #SatisfactionLastYearsDiv").trigger("blur");
                        $("#FoundationCorporateThreeyearsAgoDiv").blur(function () {
                            FoundationRevenue("FoundationCorporateThreeyearsAgoDiv", "SatisfactionThreeyearsAgoDiv", "UnrestrictedRevenueThreeyearsAgoDiv", "CorporateRevenueThreeyearsAgoDiv", "OtherIncomeThreeYearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "OtherIncomerevenueThreeYearsAgoDiv");
                            TotalRevenueThreeyearsAgo();
                        });
                        $("#SatisfactionThreeyearsAgoDiv").blur(function () {
                            FoundationRevenue("FoundationCorporateThreeyearsAgoDiv", "SatisfactionThreeyearsAgoDiv", "UnrestrictedRevenueThreeyearsAgoDiv", "CorporateRevenueThreeyearsAgoDiv", "OtherIncomeThreeYearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "OtherIncomerevenueThreeYearsAgoDiv");
                            TotalRevenueThreeyearsAgo();
                        });


                        $("#FoundationCorporateTwoYearsAgoDiv").blur(function () {
                            FoundationRevenue("FoundationCorporateTwoYearsAgoDiv", "SatisfactionTwoYearsAgoDiv", "UnrestrictedRevenueTwoYearsAgoDiv", "CorporateRevenueTwoYearsAgoDiv", "OtherIncomeTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "OtherIncomerevenueTwoYearsAgoDiv");
                            TotalRevenueTwoyearsAgo();
                        });
                        $("#SatisfactionTwoYearsAgoDiv").blur(function () {
                            FoundationRevenue("FoundationCorporateTwoYearsAgoDiv", "SatisfactionTwoYearsAgoDiv", "UnrestrictedRevenueTwoYearsAgoDiv", "CorporateRevenueTwoYearsAgoDiv", "OtherIncomeTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "OtherIncomerevenueTwoYearsAgoDiv");
                            TotalRevenueTwoyearsAgo();
                        });

                        $("#FoundationCorporateLastYearsDiv").blur(function () {
                            FoundationRevenue("FoundationCorporateLastYearsDiv", "SatisfactionLastYearsDiv", "UnrestrictedRevenueLastYearsDiv", "CorporateRevenueLastYearDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "OtherIncomerevenueLastYearDiv");
                            TotalRevenueLastYear();
                        });
                        $("#SatisfactionLastYearsDiv").blur(function () {
                            FoundationRevenue("FoundationCorporateLastYearsDiv", "SatisfactionLastYearsDiv", "UnrestrictedRevenueLastYearsDiv", "CorporateRevenueLastYearDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "OtherIncomerevenueLastYearDiv");
                            TotalRevenueLastYear();
                        });

                        $("#FoundationCorporateCurrentYearDiv").blur(function () {
                            FoundationRevenue("FoundationCorporateCurrentYearDiv", "SatisfactionCurrentYearDiv", "UnrestrictedRevenueCurrentYearDiv", "CorporateRevenueCurrentYearDiv", "OtherIncomeCurrentYearDiv", "IndividualContributionsCurrentYearDiv", "OtherIncomerevenueCurrentYearDiv");
                            TotalRevenueCurrentYear();
                        });
                        $("#SatisfactionCurrentYearDiv").blur(function () {
                            FoundationRevenue("FoundationCorporateCurrentYearDiv", "SatisfactionCurrentYearDiv", "UnrestrictedRevenueCurrentYearDiv", "CorporateRevenueCurrentYearDiv", "OtherIncomeCurrentYearDiv", "IndividualContributionsCurrentYearDiv", "OtherIncomerevenueCurrentYearDiv");
                            TotalRevenueCurrentYear();
                        });

                    }

                    function GovernmentFunding()
                    {
                        $("#GovernmentFundingThreeyearsAgoDiv, #GovernmentFundingTwoYearsAgoDiv, #GovernmentFundingLastYearsDiv, #GovernmentFundingCurrentYearDiv").trigger("blur");
                        $("#GovernmentFundingThreeyearsAgoDiv").blur(function () {
                            GovernmentRevenue("GovernmentFundingThreeyearsAgoDiv", "UnrestrictedRevenueThreeyearsAgoDiv", "GovernmentRevenueThreeyearsAgoDiv", "OtherIncomeThreeYearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "FoundationCorporateThreeyearsAgoDiv", "OtherIncomerevenueThreeYearsAgoDiv");
                            TotalRevenueThreeyearsAgo();
                        });

                        $("#GovernmentFundingTwoYearsAgoDiv").blur(function () {
                            GovernmentRevenue("GovernmentFundingTwoYearsAgoDiv", "UnrestrictedRevenueTwoYearsAgoDiv", "GovernmentRevenueTwoyearsAgoDiv", "OtherIncomeTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "FoundationCorporateTwoYearsAgoDiv", "OtherIncomerevenueTwoYearsAgoDiv");
                            TotalRevenueTwoyearsAgo();
                        });

                        $("#GovernmentFundingLastYearsDiv").blur(function () {
                            GovernmentRevenue("GovernmentFundingLastYearsDiv", "UnrestrictedRevenueLastYearsDiv", "GovernmentRevenueLastyearDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "FoundationCorporateLastYearsDiv", "OtherIncomerevenueLastYearDiv");
                            TotalRevenueLastYear();
                        });

                        $("#GovernmentFundingCurrentYearDiv").blur(function () {
                            GovernmentRevenue("GovernmentFundingCurrentYearDiv", "UnrestrictedRevenueCurrentYearDiv", "GovernmentRevenueCurrentYearDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "FoundationCorporateCurrentYearDiv", "OtherIncomerevenueCurrentYearDiv");
                            TotalRevenueCurrentYear();
                        });
                    }
                    function EarnedIncome()
                    {
                        $("#EarnedIncomeThreeyearsAgoDiv, #EarnedIncomeTwoYearsAgoDiv, #EarnedIncomeLastYearsDiv, #EarnedIncomeCurrentYearDiv").trigger("blur");
                        $("#EarnedIncomeThreeyearsAgoDiv").blur(function () {
                            EarnedRevenue("EarnedIncomeThreeyearsAgoDiv", "UnrestrictedRevenueThreeyearsAgoDiv", "EarnedTotalRevenueThreeYearsAgoDiv", "OtherIncomeThreeYearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "GovernmentFundingThreeyearsAgoDiv", "FoundationCorporateThreeyearsAgoDiv", "OtherIncomerevenueThreeYearsAgoDiv");
                            TotalRevenueThreeyearsAgo();
                        });

                        $("#EarnedIncomeTwoYearsAgoDiv").blur(function () {
                            EarnedRevenue("EarnedIncomeTwoYearsAgoDiv", "UnrestrictedRevenueTwoYearsAgoDiv", "EarnedTotalRevenueTwoYearsAgoDiv", "OtherIncomeTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "GovernmentFundingTwoYearsAgoDiv", "FoundationCorporateTwoYearsAgoDiv", "OtherIncomerevenueTwoYearsAgoDiv");
                            TotalRevenueTwoyearsAgo();
                        });

                        $("#EarnedIncomeLastYearsDiv").blur(function () {
                            EarnedRevenue("EarnedIncomeLastYearsDiv", "UnrestrictedRevenueLastYearsDiv", "EarnedTotalRevenueLastYearsDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "GovernmentFundingLastYearsDiv", "FoundationCorporateLastYearsDiv", "OtherIncomerevenueLastYearDiv");
                            TotalRevenueLastYear();
                        });

                        $("#EarnedIncomeCurrentYearDiv").blur(function () {
                            EarnedRevenue("EarnedIncomeCurrentYearDiv", "UnrestrictedRevenueCurrentYearDiv", "EarnedTotalRevenueCurrentYearDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "GovernmentFundingCurrentYearDiv", "FoundationCorporateCurrentYearDiv", "OtherIncomerevenueCurrentYearDiv");
                            TotalRevenueCurrentYear();
                        });
                        
                    }


                    function TotalProgram()
                    {
                        $("#TotalprogramExpenseThreeyearsAgoDiv").blur(function () {
                            TotalEarnedRevenue("TotalprogramExpenseThreeyearsAgoDiv", "ProgramTotalThreeYearsAgoDiv","TotalExpensesThreeyearsAgoDiv");
                        });

                        $("#TotalprogramExpenseTwoYearsAgoDiv").blur(function () {
                            TotalEarnedRevenue("TotalprogramExpenseTwoYearsAgoDiv", "ProgramTotalTwoYearsAgoDiv", "TotalExpensesTwoYearsAgoDiv");
                        });

                        $("#TotalprogramExpenseLastYearsDiv").blur(function () {
                            TotalEarnedRevenue("TotalprogramExpenseLastYearsDiv", "ProgramTotalLastYearDiv", "TotalExpensesLastYearsDiv");
                        });

                        $("#TotalprogramExpenseCurrentYearDiv").blur(function () {
                            TotalEarnedRevenue("TotalprogramExpenseCurrentYearDiv", "ProgramTotalCurrentYearDiv", "TotalExpensesCurrentYearDiv");
                        });



                    }
                    function TotalManagement()
                    {
                        $("#TotalManagementThreeyearsAgoDiv").blur(function () {
                            TotalManagementRevenue("TotalManagementThreeyearsAgoDiv", "ManagementTotalPrecentageThreeYearsAgoDiv", "TotalExpensesThreeyearsAgoDiv");
                        });

                        $("#TotalManagementTwoYearsAgoDiv").blur(function () {
                            TotalManagementRevenue("TotalManagementTwoYearsAgoDiv", "ManagementTotalPrecentageTwoYearsAgoDiv", "TotalExpensesTwoYearsAgoDiv");
                        });

                        $("#TotalManagementLastYearsDiv").blur(function () {
                            TotalManagementRevenue("TotalManagementLastYearsDiv", "ManagementTotalPrecentageLastYearDiv", "TotalExpensesLastYearsDiv");
                        });

                        $("#TotalManagementCurrentYearDiv").blur(function () {
                            TotalManagementRevenue("TotalManagementCurrentYearDiv", "ManagementTotalPrecentageCurrentYearDiv", "TotalExpensesCurrentYearDiv");
                        });


                    }
                    function TotalFundraising()
                    {
                        $("#TotalFundRaisingThreeyearsAgoDiv").blur(function () {
                            TotalFundraisingRevenue("TotalFundRaisingThreeyearsAgoDiv", "FundRaisingExpensePercentageThreeYearAgosDiv", "TotalExpensesThreeyearsAgoDiv");
                        });

                        $("#TotalFundRaisingTwoYearsAgoDiv").blur(function () {
                            TotalFundraisingRevenue("TotalFundRaisingTwoYearsAgoDiv", "FundRaisingExpensePercentageTwoYearAgosDiv", "TotalExpensesTwoYearsAgoDiv");
                        });

                        $("#TotalFundRaisingLastYearsDiv").blur(function () {
                            TotalFundraisingRevenue("TotalFundRaisingLastYearsDiv", "FundRaisingExpensePercentageLastYearDiv", "TotalExpensesLastYearsDiv");
                        });

                        $("#TotalFundRaisingCurrentYearDiv").blur(function () {
                            TotalFundraisingRevenue("TotalFundRaisingCurrentYearDiv", "FundRaisingExpensePercentageCurrentYearDiv", "TotalExpensesCurrentYearDiv");
                        });


                    }
                    function FixedAssets()
                    {
                        $("#DepreciationFixedAssetsThreeyearsAgoDiv").blur(function () {
                            FixedAssetsRevenue("DepreciationFixedAssetsThreeyearsAgoDiv", "MortgagesThreeyearsAgoDiv", "DebtRelatedThreeYearAgosDiv");
                        });
                        $("#DepreciationFixedAssetsTwoYearsAgoDiv").blur(function () {
                            FixedAssetsRevenue("DepreciationFixedAssetsTwoYearsAgoDiv", "MortgagesTwoYearsAgoDiv", "DebtRelatedTwoYearAgosDiv");
                        });
                        $("#DepreciationFixedAssetsLastYearsDiv").blur(function () {
                            FixedAssetsRevenue("DepreciationFixedAssetsLastYearsDiv", "MortgagesLastYearsDiv", "DebtRelatedLastYearDiv");
                        });

                        $("#MortgagesThreeyearsAgoDiv").blur(function () {
                            FixedAssetsRevenue("DepreciationFixedAssetsThreeyearsAgoDiv", "MortgagesThreeyearsAgoDiv", "DebtRelatedThreeYearAgosDiv");
                        });
                        $("#MortgagesTwoYearsAgoDiv").blur(function () {
                            FixedAssetsRevenue("DepreciationFixedAssetsTwoYearsAgoDiv", "MortgagesTwoYearsAgoDiv", "DebtRelatedTwoYearAgosDiv");
                        });
                        $("#MortgagesLastYearsDiv").blur(function () {
                            FixedAssetsRevenue("DepreciationFixedAssetsLastYearsDiv", "MortgagesLastYearsDiv", "DebtRelatedLastYearDiv");
                        });
                    }
                    function LUNA()
                    {
                        $("#UnrestrictedNetThreeyearsAgoDiv").blur(function () {
                            LUNARevenue("UnrestrictedNetThreeyearsAgoDiv", "BoardDesignatedThreeyearsAgoDiv", "DebtRelatedThreeYearAgosDiv", "LUNAThreeYearAgosDiv", "AvailableLUNAThreeYearAgosDiv", "MonthCoveredThreeYearAgosDiv","CashAverageMonthlyThreeYearsAgoDiv");
                        });
                        $("#UnrestrictedNetTwoYearsAgoDiv").blur(function () {
                            LUNARevenue("UnrestrictedNetTwoYearsAgoDiv", "BoardDesignatedTwoYearsAgoDiv", "DebtRelatedTwoYearAgosDiv", "LUNATwoYearAgosDiv", "AvailableLUNATwoYearAgosDiv", "MonthCoveredThreeYearAgosDiv","CashAverageMonthlyThreeYearsAgoDiv");
                        });
                        $("#UnrestrictedNetLastYearsDiv").blur(function () {
                            LUNARevenue("UnrestrictedNetLastYearsDiv", "BoardDesignatedLastYearsDiv", "DebtRelatedLastYearDiv", "LUNALastYearDiv", "AvailableLUNALastYearDiv", "MonthCoveredTwoYearAgosDiv","CashAverageMonthlyTwoYearsAgoDiv");
                        });

                        $("#BoardDesignatedThreeyearsAgoDiv").blur(function () {
                            LUNARevenue("UnrestrictedNetThreeyearsAgoDiv", "BoardDesignatedThreeyearsAgoDiv", "DebtRelatedThreeYearAgosDiv", "LUNAThreeYearAgosDiv", "AvailableLUNAThreeYearAgosDiv", "MonthCoveredTwoYearAgosDiv","CashAverageMonthlyTwoYearsAgoDiv");
                        });
                        $("#BoardDesignatedTwoYearsAgoDiv").blur(function () {
                            LUNARevenue("UnrestrictedNetTwoYearsAgoDiv", "BoardDesignatedTwoYearsAgoDiv", "DebtRelatedTwoYearAgosDiv", "LUNATwoYearAgosDiv", "AvailableLUNATwoYearAgosDiv", "MonthCoveredLastYearDiv","CashAverageMonthlyLastYearDiv");
                        });
                        $("#BoardDesignatedLastYearsDiv").blur(function () {
                            LUNARevenue("UnrestrictedNetLastYearsDiv", "BoardDesignatedLastYearsDiv", "DebtRelatedLastYearDiv", "LUNALastYearDiv", "AvailableLUNALastYearDiv", "MonthCoveredLastYearDiv","CashAverageMonthlyLastYearDiv");
                        });
                    }
                    function CashAnnualExpense()
                    {
                        $("#CashEquivalentsThreeyearsAgoDiv").blur(function () {
                            CashAnnualRevenue("CashEquivalentsThreeyearsAgoDiv", "TotalAverageMonthlyThreeYearsAgoDiv", "MonthCashOnHandThreeYearAgosDiv");
                        });

                        $("#CashEquivalentsTwoYearsAgoDiv").blur(function () {
                            CashAnnualRevenue("CashEquivalentsTwoYearsAgoDiv", "TotalAverageMonthlyTwoYearsAgoDiv", "MonthCashOnHandTwoYearsAgoDiv");
                        });

                        $("#CashEquivalentsLastYearsDiv").blur(function () {
                            CashAnnualRevenue("CashEquivalentsLastYearsDiv", "TotalAverageMonthlyLastYearsDiv", "MonthCashOnHandLastYearsDiv");
                        });


                    }
                    function BoardContributing()
                    {
                        $("#TotalBoardMembersThreeyearsAgoDiv").blur(function () {
                            BoardContributingRevenue("TotalBoardMembersThreeyearsAgoDiv", "NoOfmembersMembersThreeyearsAgoDiv", "PercentageBoardContributingThreeYearsAgoDiv");
                        });

                        $("#TotalBoardMembersTwoyearsAgoDiv").blur(function () {
                            BoardContributingRevenue("TotalBoardMembersTwoyearsAgoDiv", "NoOfmembersMembersTwoyearsAgoDiv", "PercentageBoardContributingTwoYearsAgoDiv");
                        });

                        $("#TotalBoardMembersLastyearsAgoDiv").blur(function () {
                            BoardContributingRevenue("TotalBoardMembersLastyearsAgoDiv", "NoOfmembersMembersLastyearsAgoDiv", "PercentageBoardContributingLastYearsDiv");
                        });

                        $("#NoOfmembersMembersThreeyearsAgoDiv").blur(function () {
                            BoardContributingRevenue("TotalBoardMembersThreeyearsAgoDiv", "NoOfmembersMembersThreeyearsAgoDiv", "PercentageBoardContributingThreeYearsAgoDiv");
                        });

                        $("#NoOfmembersMembersTwoyearsAgoDiv").blur(function () {
                            BoardContributingRevenue("TotalBoardMembersTwoyearsAgoDiv", "NoOfmembersMembersTwoyearsAgoDiv", "PercentageBoardContributingTwoYearsAgoDiv");
                        });

                        $("#NoOfmembersMembersLastyearsAgoDiv").blur(function () {
                            BoardContributingRevenue("TotalBoardMembersLastyearsAgoDiv", "NoOfmembersMembersLastyearsAgoDiv", "PercentageBoardContributingLastYearsDiv");
                        });
                    }
                    function BoardContributionFinal()
                    {
                        $("#TotalBoardAmountThreeyearsAgoDiv").blur(function () {
                            BoardContributionFinalRevenue("TotalBoardAmountThreeyearsAgoDiv", "UnrestrictedRevenueThreeyearsAgoDiv", "BoardContributionsThreeYearsAgoDiv");
                        });

                        $("#TotalBoardAmountTwoyearsAgoDiv").blur(function () {
                            BoardContributionFinalRevenue("TotalBoardAmountTwoyearsAgoDiv", "UnrestrictedRevenueTwoYearsAgoDiv", "BoardContributionsTwoYearsAgoDiv");
                        });

                        $("#TotalBoardAmountLastyearsAgoDiv").blur(function () {
                            BoardContributionFinalRevenue("TotalBoardAmountLastyearsAgoDiv", "UnrestrictedRevenueLastYearsDiv", "BoardContributionsLastYearsDiv");
                        });
                    }

                    //Reverse Calculation
                    function ReverseCheck(id) {
                        switch (id) {
                            case "TotalBoardAmountThreeyearsAgoDiv":
                                BoardContributionFinalRevenue("TotalBoardAmountThreeyearsAgoDiv", "UnrestrictedRevenueThreeyearsAgoDiv", "BoardContributionsThreeYearsAgoDiv");
                                break;
                            case "TotalBoardAmountTwoyearsAgoDiv":
                                BoardContributionFinalRevenue("TotalBoardAmountTwoyearsAgoDiv", "UnrestrictedRevenueTwoYearsAgoDiv", "BoardContributionsTwoYearsAgoDiv");
                                break;
                            case "TotalBoardAmountLastyearsAgoDiv":
                                BoardContributionFinalRevenue("TotalBoardAmountLastyearsAgoDiv", "UnrestrictedRevenueLastYearsDiv", "BoardContributionsLastYearsDiv");
                                break;
                            case "CashEquivalentsThreeyearsAgoDiv":
                                CashAnnualRevenue("CashEquivalentsThreeyearsAgoDiv", "TotalAverageMonthlyThreeYearsAgoDiv", "MonthCashOnHandThreeYearAgosDiv");
                                break;
                            case "CashEquivalentsTwoYearsAgoDiv":
                                CashAnnualRevenue("CashEquivalentsTwoYearsAgoDiv", "TotalAverageMonthlyTwoYearsAgoDiv", "MonthCashOnHandTwoYearsAgoDiv");
                                break;
                            case "CashEquivalentsLastYearsDiv":
                                CashAnnualRevenue("CashEquivalentsLastYearsDiv", "TotalAverageMonthlyLastYearsDiv", "MonthCashOnHandLastYearsDiv");
                                break;
                            case "IndividualContributionsThreeyearsAgoDiv":
                                UnRestrictedRevenue("UnrestrictedRevenueThreeyearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "IndividualTotalRevenueThreeyearsAgoDiv", "OtherIncomeThreeYearsAgoDiv");
                                break;
                            case "IndividualContributionsTwoYearsAgoDiv":
                                UnRestrictedRevenue("UnrestrictedRevenueTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "IndividualTotalRevenueTwoyearsAgoDiv", "OtherIncomeTwoYearsAgoDiv");
                                break;
                            case "IndividualContributionsLastYearsDiv":
                                UnRestrictedRevenue("UnrestrictedRevenueLastYearsDiv", "IndividualContributionsLastYearsDiv", "IndividualTotalRevenueLastYearDiv", "OtherIncomeLastYearDiv");
                                break;
                            case "IndividualContributionsCurrentYearDiv":
                                UnRestrictedRevenue("UnrestrictedRevenueCurrentYearDiv", "IndividualContributionsCurrentYearDiv", "IndividualTotalRevenueCurrentYearDiv", "OtherIncomeCurrentYearDiv");
                                break;

                            case "FoundationCorporateThreeyearsAgoDiv":
                                FoundationRevenue("FoundationCorporateThreeyearsAgoDiv", "SatisfactionThreeyearsAgoDiv", "UnrestrictedRevenueThreeyearsAgoDiv", "CorporateRevenueThreeyearsAgoDiv", "OtherIncomeThreeYearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "OtherIncomerevenueThreeYearsAgoDiv");
                                break;
                            case "FoundationCorporateTwoYearsAgoDiv":
                                FoundationRevenue("FoundationCorporateTwoYearsAgoDiv", "SatisfactionTwoYearsAgoDiv", "UnrestrictedRevenueTwoYearsAgoDiv", "CorporateRevenueTwoYearsAgoDiv", "OtherIncomeTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "OtherIncomerevenueTwoYearsAgoDiv");
                                break;
                            case "FoundationCorporateLastYearsDiv":
                                FoundationRevenue("FoundationCorporateLastYearsDiv", "SatisfactionLastYearsDiv", "UnrestrictedRevenueLastYearsDiv", "CorporateRevenueLastYearDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "OtherIncomerevenueLastYearDiv");
                                break;
                            case "FoundationCorporateCurrentYearDiv":
                                FoundationRevenue("FoundationCorporateCurrentYearDiv", "SatisfactionCurrentYearDiv", "UnrestrictedRevenueCurrentYearDiv", "CorporateRevenueCurrentYearDiv", "OtherIncomeCurrentYearDiv", "IndividualContributionsCurrentYearDiv", "OtherIncomerevenueCurrentYearDiv");
                                break;

                            case "SatisfactionThreeyearsAgoDiv":
                                FoundationRevenue("FoundationCorporateThreeyearsAgoDiv", "SatisfactionThreeyearsAgoDiv", "UnrestrictedRevenueThreeyearsAgoDiv", "CorporateRevenueThreeyearsAgoDiv", "OtherIncomeThreeYearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "OtherIncomerevenueThreeYearsAgoDiv");
                                break;
                            case "SatisfactionTwoYearsAgoDiv":
                                FoundationRevenue("FoundationCorporateTwoYearsAgoDiv", "SatisfactionTwoYearsAgoDiv", "UnrestrictedRevenueTwoYearsAgoDiv", "CorporateRevenueTwoYearsAgoDiv", "OtherIncomeTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "OtherIncomerevenueTwoYearsAgoDiv");
                                break;
                            case "SatisfactionLastYearsDiv":
                                FoundationRevenue("FoundationCorporateLastYearsDiv", "SatisfactionLastYearsDiv", "UnrestrictedRevenueLastYearsDiv", "CorporateRevenueLastYearDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "OtherIncomerevenueLastYearDiv");
                                break;
                            case "SatisfactionCurrentYearDiv":
                                FoundationRevenue("FoundationCorporateCurrentYearDiv", "SatisfactionCurrentYearDiv", "UnrestrictedRevenueCurrentYearDiv", "CorporateRevenueCurrentYearDiv", "OtherIncomeCurrentYearDiv", "IndividualContributionsCurrentYearDiv", "OtherIncomerevenueCurrentYearDiv");
                                break;

                            case "GovernmentFundingThreeyearsAgoDiv":
                                GovernmentRevenue("GovernmentFundingThreeyearsAgoDiv", "UnrestrictedRevenueThreeyearsAgoDiv", "GovernmentRevenueThreeyearsAgoDiv", "OtherIncomeThreeYearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "FoundationCorporateThreeyearsAgoDiv", "OtherIncomerevenueThreeYearsAgoDiv");
                                break;
                            case "GovernmentFundingTwoYearsAgoDiv":
                                GovernmentRevenue("GovernmentFundingTwoYearsAgoDiv", "UnrestrictedRevenueTwoYearsAgoDiv", "GovernmentRevenueTwoyearsAgoDiv", "OtherIncomeTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "FoundationCorporateTwoYearsAgoDiv", "OtherIncomerevenueTwoYearsAgoDiv");
                                break;
                            case "GovernmentFundingLastYearsDiv":
                                GovernmentRevenue("GovernmentFundingLastYearsDiv", "UnrestrictedRevenueLastYearsDiv", "GovernmentRevenueLastyearDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "FoundationCorporateLastYearsDiv", "OtherIncomerevenueLastYearDiv");
                                break;
                            case "GovernmentFundingCurrentYearDiv":
                                GovernmentRevenue("GovernmentFundingCurrentYearDiv", "UnrestrictedRevenueCurrentYearDiv", "GovernmentRevenueCurrentYearDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "FoundationCorporateCurrentYearDiv", "OtherIncomerevenueCurrentYearDiv");
                                break;

                            case "EarnedIncomeThreeyearsAgoDiv":
                                EarnedRevenue("EarnedIncomeThreeyearsAgoDiv", "UnrestrictedRevenueThreeyearsAgoDiv", "EarnedTotalRevenueThreeYearsAgoDiv", "OtherIncomeThreeYearsAgoDiv", "IndividualContributionsThreeyearsAgoDiv", "GovernmentFundingThreeyearsAgoDiv", "FoundationCorporateThreeyearsAgoDiv", "OtherIncomerevenueThreeYearsAgoDiv");
                                break;
                            case "EarnedIncomeTwoYearsAgoDiv":
                                EarnedRevenue("EarnedIncomeTwoYearsAgoDiv", "UnrestrictedRevenueTwoYearsAgoDiv", "EarnedTotalRevenueTwoYearsAgoDiv", "OtherIncomeTwoYearsAgoDiv", "IndividualContributionsTwoYearsAgoDiv", "GovernmentFundingTwoYearsAgoDiv", "FoundationCorporateTwoYearsAgoDiv", "OtherIncomerevenueTwoYearsAgoDiv");
                                break;
                            case "EarnedIncomeLastYearsDiv":
                                EarnedRevenue("EarnedIncomeLastYearsDiv", "UnrestrictedRevenueLastYearsDiv", "EarnedTotalRevenueLastYearsDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "GovernmentFundingLastYearsDiv", "FoundationCorporateLastYearsDiv", "OtherIncomerevenueLastYearDiv");
                                break;
                            case "EarnedIncomeCurrentYearDiv":
                                EarnedRevenue("EarnedIncomeCurrentYearDiv", "UnrestrictedRevenueCurrentYearDiv", "EarnedTotalRevenueCurrentYearDiv", "OtherIncomeLastYearDiv", "IndividualContributionsLastYearsDiv", "GovernmentFundingCurrentYearDiv", "FoundationCorporateCurrentYearDiv", "OtherIncomerevenueCurrentYearDiv");
                                break;
                            case "TotalprogramExpenseThreeyearsAgoDiv":
                                TotalEarnedRevenue("TotalprogramExpenseThreeyearsAgoDiv", "ProgramTotalThreeYearsAgoDiv", "TotalExpensesThreeyearsAgoDiv");
                                break;
                            case "TotalprogramExpenseTwoYearsAgoDiv":
                                TotalEarnedRevenue("TotalprogramExpenseTwoYearsAgoDiv", "ProgramTotalTwoYearsAgoDiv", "TotalExpensesTwoYearsAgoDiv");
                                break;
                            case "TotalprogramExpenseLastYearsDiv":
                                TotalEarnedRevenue("TotalprogramExpenseLastYearsDiv", "ProgramTotalLastYearDiv", "TotalExpensesLastYearsDiv");
                                break;
                            case "TotalprogramExpenseCurrentYearDiv":
                                TotalEarnedRevenue("TotalprogramExpenseCurrentYearDiv", "ProgramTotalCurrentYearDiv", "TotalExpensesCurrentYearDiv");
                                break;
                            case "TotalManagementThreeyearsAgoDiv":
                                TotalManagementRevenue("TotalManagementThreeyearsAgoDiv", "ManagementTotalPrecentageThreeYearsAgoDiv", "TotalExpensesThreeyearsAgoDiv");
                                break;
                            case "TotalManagementTwoYearsAgoDiv":
                                TotalManagementRevenue("TotalManagementTwoYearsAgoDiv", "ManagementTotalPrecentageTwoYearsAgoDiv", "TotalExpensesTwoYearsAgoDiv");
                                break;
                            case "TotalManagementLastYearsDiv":
                                TotalManagementRevenue("TotalManagementLastYearsDiv", "ManagementTotalPrecentageLastYearDiv", "TotalExpensesLastYearsDiv");
                                break;
                            case "TotalManagementCurrentYearDiv":
                                TotalManagementRevenue("TotalManagementCurrentYearDiv", "ManagementTotalPrecentageCurrentYearDiv", "TotalExpensesCurrentYearDiv");
                                break;
                            case "TotalFundRaisingThreeyearsAgoDiv":
                                TotalFundraisingRevenue("TotalFundRaisingThreeyearsAgoDiv", "FundRaisingExpensePercentageThreeYearAgosDiv", "TotalExpensesThreeyearsAgoDiv");
                                break;
                            case "TotalFundRaisingTwoYearsAgoDiv":
                                TotalFundraisingRevenue("TotalFundRaisingTwoYearsAgoDiv", "FundRaisingExpensePercentageTwoYearAgosDiv", "TotalExpensesTwoYearsAgoDiv");
                                break;
                            case "TotalFundRaisingLastYearsDiv":
                                TotalFundraisingRevenue("TotalFundRaisingLastYearsDiv", "FundRaisingExpensePercentageLastYearDiv", "TotalExpensesLastYearsDiv");
                                break;
                            case "TotalFundRaisingCurrentYearDiv":
                                TotalFundraisingRevenue("TotalFundRaisingCurrentYearDiv", "FundRaisingExpensePercentageCurrentYearDiv", "TotalExpensesCurrentYearDiv");
                                break;

                            default:
                                return;
                        }
                    }

                    //Definition

                    function CompleteTotalRevenue(id1, id2, id3, id4, id5, id6,id7,id8,id9)
                    {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        var id4 = "#" + id4;
                        var id5 = "#" + id5;
                        var id6 = "#" + id6;
                        var id7 = "#" + id7;
                        var id8 = "#" + id8;
                        var id9 = "#" + id9;

                        if ($(id9).text() != "" && $(id9).text().indexOf("$") != 0) {
                            if ($(id1).text() != "" && $(id1).text().replace("$", "") > 0) {
                                $(id9).text(Math.round((parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", ""))) / ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")))) * 100) + "%");
                            }
                        }
                        else {
                            if ($(id1).text() != "" && $(id1).text().replace("$", "") > 0) {
                                $(id9).text(Math.round((parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", ""))) / ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")))) * 100) + "%");
                            }
                        }

                        $(id6).text($(id6).text().replace("-", ""));
                        $(id6).css("color", "black");

                        if ($(id7).text() != "" && $(id7).text().indexOf("$") != 0) {
                            $(id7).text("$" + (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - ((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")) + (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", "")) + (parseInt($(id4).text() == "" ? 0 : $(id4).text().replace("$", ""))) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", "")) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", "")))))))));
                        }
                        else {
                            $(id7).text("$" + (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - ((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")) + (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", "")) + (parseInt($(id4).text() == "" ? 0 : $(id4).text().replace("$", ""))) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", "")) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", "")))))))));
                        }

                        $(id7).text($(id7).text().replace("-", ""));
                        $(id7).css("color", "black");

                        if ($(id8).text() != "" && $(id8).text().indexOf("$") != 0) {
                            if ($(id2).text() != "" && $(id2).text().replace("$", "") > 0) {
                                $(id8).text(Math.round((parseInt($(id7).text() == "" ? 0 : $(id7).text().replace("$", ""))) / ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")))) * 100) + "%");
                            }
                        }
                        else {
                            if ($(id2).text() != "" && $(id2).text().replace("$", "") > 0) {
                                $(id8).text(Math.round((parseInt($(id7).text() == "" ? 0 : $(id7).text().replace("$", ""))) / ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")))) * 100) + "%");
                            }
                        }

                    }

                    function OperatingSurplus(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11,id12,id13,id14,id15,id16,id17)
                    {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        var id4 = "#" + id4;
                        var id5 = "#" + id5;
                        var id6 = "#" + id6;
                        var id7 = "#" + id7;
                        var id8 = "#" + id8;
                        var id9 = "#" + id9;
                        var id10 = "#" + id10;
                        var id11 = "#" + id11;
                        var id12 = "#" + id12;
                        var id13 = "#" + id13;
                        var id14 = "#" + id14;
                        var id15 = "#" + id15;
                        var id16 = "#" + id16;
                        var id17 = "#" + id17;

                        if ($(id1).text() !="" && $(id1).text().indexOf("$") != 0)
                        {
                            $(id1).text("$" + $(id1).text());
                        }
                        else
                        {
                            $(id1).text($(id1).text());
                        }
                        if ($(id2).text() !="" && $(id2).text().indexOf("$") != 0) {
                            $(id2).text("$" + $(id2).text());
                        }
                        else {
                            $(id2).text($(id2).text());
                        }
                        if ($(id3).text() != "" && $(id3).text().indexOf("$") != 0) {
                            $(id3).text("$" + (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))));
                        }
                        else {
                            $(id3).text(parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - parseInt(($(id2).text() == "") ? 0 : $(id2).text().replace("$", "")));
                        }

                        if ($(id3).text() != "" && $(id3).text().indexOf("$") != 0) {
                            $(id3).text("$" + ($(id3).text().replace("-", "")));
                        }
                        else {
                            $(id3).text($(id3).text().replace("-", ""));
                        }
                        $(id3).css("color", "black");

                        if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
                            $(id4).text("$" + ($(id1).text()));
                        }
                        else {
                            $(id4).text($(id1).text());
                        }
                        $(id4).css("color", "black");

                        if ($(id5).text() != "" && $(id5).text().indexOf("$") != 0) {
                            if ($(id1).text() != "" && $(id1).text().replace("$", "") > 0) {
                                $(id5).text((parseInt($(id4).text() == "" ? 0 : $(id4).text().replace("$", ""))) / (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        else {
                            if ($(id1).text() != "" && $(id1).text().replace("$", "") > 0) {
                                $(id5).text((parseInt($(id4).text() == "" ? 0 : $(id4).text().replace("$", ""))) / (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        $(id5).text($(id5).text().replace("-", ""));
                        $(id5).css("color", "black");

                        if ($(id6).text() != "" && $(id6).text().indexOf("$") != 0) {
                            $(id6).text("$" + Math.round((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) / (12)));
                        }
                        else {
                            $(id6).text("$" + Math.round((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) / (12)));
                        }
                        $(id6).text($(id6).text().replace("-", ""));
                        $(id6).css("color", "black");

                        if ($(id7).text() != "" && $(id7).text().indexOf("$") != 0) {
                            $(id7).text("$" + Math.round((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) / (12)));
                        }
                        else {
                            $(id7).text("$" + Math.round((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) / (12)));
                        }
                        $(id7).text($(id6).text().replace("-", ""));
                        $(id7).css("color", "black");

                        //reverse process
                        if ($(id8).text() != null && $(id8).text() != "")
                        {
                            ReverseCheck($(id8).attr("id"));
                        }

                        if ($(id9).text() != null && $(id9).text() != "") {
                            ReverseCheck($(id9).attr("id"));
                        }

                        if ($(id10).text() != "") {
                            ReverseCheck($(id10).attr("id"));
                        }

                        if ($(id11).text() != "" || $(id12).text() != "") {
                            ReverseCheck($(id11).attr("id"));
                            ReverseCheck($(id12).attr("id"));
                        }

                        if ($(id13).text() != "") {
                            ReverseCheck($(id13).attr("id"));
                        }
                        if ($(id14).text() != "") {
                            ReverseCheck($(id14).attr("id"));
                        }
                        if ($(id15).text() != "") {
                            ReverseCheck($(id15).attr("id"));
                        }
                        if ($(id16).text() != "") {
                            ReverseCheck($(id16).attr("id"));
                        }
                        if ($(id17).text() != "") {
                            ReverseCheck($(id17).attr("id"));
                        }




                    }
                    function EarnedRevenue(id1, id2, id3, id4, id5, id6, id7, id8) {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        var id4 = "#" + id4;
                        var id5 = "#" + id5;
                        var id6 = "#" + id6;
                        var id7 = "#" + id7;
                        var id8 = "#" + id8;



                        if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
                            $(id1).text("$" + $(id1).text());
                        }
                        else {
                            $(id1).text($(id1).text());
                        }
                        if ($(id2).text() != "" && $(id2).text().replace("$", "") > 0) {
                            $(id3).text(Math.round(parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) * 100);
                        }

                        if ($(id3).text() != "") {
                            $(id3).text(Math.round($(id3).text()) + "%");
                        }
                        $(id3).css("color", "black");


                        //if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
                        //    $(id4).text("$" + (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", "")) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", "")) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", ""))))))));
                        //}
                        //else {
                        //    $(id4).text("$" + (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", "")) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", "")) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", ""))))))));
                        //}
                        //$(id4).text($(id4).text().replace("-", ""));
                        //$(id4).css("color", "black");

                        if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
                            $(id4).text("$" + (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", "")) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", ""))) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace("$", ""))))))));
                        }
                        else {
                            $(id4).text("$" + (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", "")) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", ""))) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace("$", ""))))))));
                        }
                        $(id4).text($(id4).text().replace("-", ""));
                        $(id4).css("color", "black");

                        if ($(id8).text() != "" && $(id8).text().indexOf("$") != 0) {
                            if ($(id2).text() != "" && $(id2).text().replace("$", "") > 0)
                            {
                                $(id8).text((parseInt($(id4).text() == "" ? 0 : $(id4).text().replace("$", ""))) / ((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")))) * 100 + "%");
                            }
                        }
                        else {
                            if ($(id2).text() != "" && $(id2).text().replace("$", "") > 0)
                            {
                                $(id8).text((parseInt($(id4).text() == "" ? 0 : $(id4).text().replace("$", ""))) / ((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")))) * 100 + "%");
                            }
                        }
                        $(id8).text($(id8).text().replace("-", ""));
                        $(id8).css("color", "black");


                    }
                    function GovernmentRevenue(id1, id2, id3, id4, id5, id6, id7) {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        var id4 = "#" + id4;
                        var id5 = "#" + id5;
                        var id6 = "#" + id6;
                        var id7 = "#" + id7;



                        if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
                            $(id1).text("$" + $(id1).text());
                        }
                        else {
                            $(id1).text($(id1).text());
                        }
                        if ($(id2).text() != "" && $(id2).text().replace("$", "") > 0) {
                            $(id3).text((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) * 100);
                        }

                        if ($(id3).text() != "") {
                            $(id3).text(Math.round($(id3).text()) + "%");
                        }
                        $(id3).css("color", "black");
                        if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
                            $(id4).text("$" + (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")) - (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", "")) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", "")))))));
                        }
                        else {
                            $(id4).text("$" + (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")) - (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", "")) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", "")))))));
                        }
                        $(id4).text($(id4).text().replace("-", ""));
                        $(id4).css("color", "black");

                        if ($(id7).text() != "" && $(id7).text().indexOf("$") != 0) {
                            if ($(id2).text() != "" && $(id2).text().replace("$", "") > 0) {
                                $(id7).text((parseInt($(id4).text() == "" ? 0 : $(id4).text().replace("$", ""))) / (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        else {
                            if ($(id2).text() != "" && $(id2).text().replace("$", "") > 0) {
                                $(id7).text((parseInt($(id4).text() == "" ? 0 : $(id4).text().replace("$", ""))) / (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        $(id7).text($(id7).text().replace("-", ""));
                        $(id7).css("color", "black");

                    }
                    function FoundationRevenue(id1, id2, id3, id4, id5, id6, id7) {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        var id4 = "#" + id4;
                        var id5 = "#" + id5;
                        var id6 = "#" + id6;
                        var id7 = "#" + id7;

                        if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
                            $(id1).text("$" + $(id1).text());
                        }
                        else {
                            $(id1).text($(id1).text());
                        }

                        if ($(id2).text() != "" && $(id2).text().indexOf("$") != 0) {
                            $(id2).text("$" + $(id2).text());
                        }
                        else {
                            $(id2).text($(id2).text());
                        }

                        if ($(id3).text() != "" && $(id3).text().replace("$", "") > 0) {
                            $(id4).text(Math.round(parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) + parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) / (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", ""))) * 100);
                        }

                        if ($(id4).text() != "") {
                            $(id4).text(Math.round($(id4).text()) + "%");
                        }
                        $(id4).css("color", "black");
                        if ($(id5).text() != "" && $(id5).text().indexOf("$") != 0) {
                            $(id5).text("$" + (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", "")) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", "")))))));
                        }
                        else {
                            $(id5).text("$" + (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", "")) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace("$", "")))))));
                        }
                        $(id5).text($(id5).text().replace("-", ""));
                        $(id5).css("color", "black");

                        if ($(id7).text() != "" && $(id7).text().indexOf("$") != 0) {
                            if($(id3).text() != "" && $(id3).text().replace("$", "") > 0) {
                                $(id7).text((parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", ""))) / (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        else {
                            if ($(id3).text() != "" && $(id3).text().replace("$", "") > 0) {
                                $(id7).text((parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", ""))) / (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        $(id7).text($(id7).text().replace("-", ""));
                        $(id7).css("color", "black");
                    }
                    function UnRestrictedRevenue(id1, id2, id3, id4, id5) {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        var id4 = "#" + id4;
                        var id5 = "#" + id5;

                        if ($(id2).text() != "" && $(id2).text().indexOf("$") != 0) {
                            $(id2).text("$" + $(id2).text());
                        }
                        else {
                            $(id2).text($(id2).text());
                        }
                        if ($(id1).text() != "" && $(id1).text().replace("$", "") > 0) {
                            $(id3).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")) / parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", ""))) * 100);
                        }

                        if ($(id3).text() != "") {
                            $(id3).text(Math.round($(id3).text()) + "%");
                        }


                        if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
                            $(id4).text("$" + (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))));
                        }
                        else {
                            $(id4).text("$" + (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))));
                        }
                        $(id4).text($(id4).text().replace("-", ""));
                        $(id3).css("color", "black");
                        $(id4).css("color", "black");


                        if ($(id5).text() != "" && $(id5).text().indexOf("$") != 0) {
                            if ($(id1).text() != "" && $(id1).text().replace("$", "") > 0) {
                                $(id5).text((parseInt($(id4).text() == "" ? 0 : $(id4).text().replace("$", ""))) / (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        else {
                            if ($(id1).text() != "" && $(id1).text().replace("$", "") > 0) {
                                $(id5).text((parseInt($(id4).text() == "" ? 0 : $(id4).text().replace("$", ""))) / (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        $(id5).text($(id5).text().replace("-", ""));
                        $(id5).css("color", "black");

                    }
                    function TotalEarnedRevenue(id1,id2,id3)
                    {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
                            $(id1).text("$" + ($(id1).text()));
                        }
                        else {
                            $(id1).text($(id1).text());
                        }

                        if ($(id2).text() != "" && $(id2).text().indexOf("$") != 0) {
                            if ($(id3).text() != "" && $(id3).text().replace("$", "") > 0) {
                                $(id2).text((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        else {
                            if ($(id3).text() != "" && $(id3).text().replace("$", "") > 0) {
                                $(id2).text((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        $(id2).text($(id2).text().replace("-", ""));
                        $(id2).css("color", "black");
                    }
                    function TotalManagementRevenue(id1, id2, id3) {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
                            $(id1).text("$" + ($(id1).text()));
                        }
                        else {
                            $(id1).text($(id1).text());
                        }

                        if ($(id2).text() != "" && $(id2).text().indexOf("$") != 0) {
                            if ($(id3).text() != "" && $(id3).text().replace("$", "") > 0) {
                                $(id2).text((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        else {
                            if ($(id3).text() != "" && $(id3).text().replace("$", "") > 0) {
                                $(id2).text((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        $(id2).text($(id2).text().replace("-", ""));
                        $(id2).css("color", "black");
                    }
                    function TotalFundraisingRevenue(id1, id2, id3) {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
                            $(id1).text("$" + ($(id1).text()));
                        }
                        else {
                            $(id1).text($(id1).text());
                        }

                        if ($(id2).text() != "" && $(id2).text().indexOf("$") != 0) {
                            if ($(id3).text() != "" && $(id3).text().replace("$", "") > 0) {
                                $(id2).text((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        else {
                            if ($(id3).text() != "" && $(id3).text().replace("$", "") > 0) {
                                $(id2).text((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", ""))) * 100 + "%");
                            }
                        }
                        $(id2).text($(id2).text().replace("-", ""));
                        $(id2).css("color", "black");
                    }
                    function FixedAssetsRevenue(id1, id2, id3) {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
                            $(id1).text("$" + $(id1).text());
                        }
                        else {
                            $(id1).text($(id1).text());
                        }
                        if ($(id2).text() != "" && $(id2).text().indexOf("$") != 0) {
                            $(id2).text("$" + $(id2).text());
                        }
                        else {
                            $(id2).text($(id2).text());
                        }

                        if ($(id3).text() != "" && $(id3).text().indexOf("$") != 0) {
                            $(id3).text("$" + (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))));
                        }
                        else {

                            $(id3).text("$" + (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))));
                        }
                        $(id3).text($(id3).text().replace("-", ""));
                        $(id3).css("color", "black");
                    }
                    function LUNARevenue(id1, id2, id3,id4,id5,id6,id7) {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        var id4 = "#" + id4;
                        var id5 = "#" + id5;
                        var id6 = "#" + id6;
                        var id7 = "#" + id7;

                        if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
                            $(id1).text("$" + $(id1).text());
                        }
                        else {
                            $(id1).text($(id1).text());
                        }
                        if ($(id2).text() != "" && $(id2).text().indexOf("$") != 0) {
                            $(id2).text("$" + $(id2).text());
                        }
                        else {
                            $(id2).text($(id2).text());
                        }
                        if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
                            $(id4).text("$" + (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) - (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", "")))));
                        }
                        else {

                            $(id4).text("$" + (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) - (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) - (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace("$", "")))));
                        }
                        $(id4).text($(id4).text().replace("-", ""));
                        $(id4).css("color", "black");
                        $(id5).text($(id4).text().replace("-", ""));
                        $(id5).css("color", "black");


                        if ($(id6).text() != "" && $(id6).text().indexOf("$") != 0) {
                            if ($(id5).text() != "" && $(id7).text() != "" && $(id7).text().replace("$", "") > 0) {
                                $(id6).text(Math.round(parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", "")) / (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace("$", "")))));
                            }
                        }
                        else {
                            if ($(id5).text() != "" && $(id7).text() != "" && $(id7).text().replace("$", "") > 0) {
                                $(id6).text(Math.round(parseInt($(id5).text() == "" ? 0 : $(id5).text().replace("$", "")) / (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace("$", "")))));
                            }
                        }
                        $(id6).text($(id6).text().replace("-", ""));
                        $(id6).css("color", "black");

                    }
                    function CashAnnualRevenue(id1,id2,id3)
                    {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
                            $(id1).text("$" + $(id1).text());
                        }
                        else {
                            $(id1).text($(id1).text());
                        }

                        if ($(id3).text() != "" && $(id3).text().indexOf("$") != 0 ) {
                            if ($(id1).text() != "" && $(id2).text() != "" && $(id2).text().replace("$", "") > 0) {
                                $(id3).text(Math.round(parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")))));
                            }
                        }
                        else {
                            if ($(id1).text() != "" && $(id2).text() != "" && $(id2).text().replace("$", "")  > 0 ) {
                                $(id3).text(Math.round(parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")))));
                            }
                        }
                        $(id3).text($(id3).text().replace("-", ""));
                        $(id3).css("color", "black");



                    }
                    function BoardContributingRevenue(id1,id2,id3)
                    {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
                            $(id1).text($(id1).text());
                        }
                        else {
                            $(id1).text($(id1).text());
                        }

                        if ($(id2).text() != "" && $(id2).text().indexOf("$") != 0) {
                            $(id2).text($(id2).text());
                        }
                        else {
                            $(id2).text($(id2).text());
                        }
                        if ($(id3).text() != "" && $(id3).text().indexOf("$") != 0) {
                            if ($(id2).text() != "" && $(id1).text() != "" && $(id1).text().replace("$","") > 0) {
                                $(id3).text(Math.round(parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")) / (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", ""))) * 100) + "%");
                            }
                        }
                        else {
                            if ($(id2).text() != "" && $(id1).text() != "" && $(id1).text().replace("$","") > 0) {
                                $(id3).text(Math.round(parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", "")) / (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", ""))) * 100) + "%");
                            }
                        }
                        $(id3).text($(id3).text().replace("-", ""));
                        $(id3).css("color", "black");
                    }
                    function BoardContributionFinalRevenue(id1, id2, id3) {
                        var id1 = "#" + id1;
                        var id2 = "#" + id2;
                        var id3 = "#" + id3;
                        if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
                            $(id1).text("$" + $(id1).text());
                        }
                        else {
                            $(id1).text($(id1).text());
                        }


                        if ($(id3).text() != "" && $(id3).text().indexOf("$") != 0) {
                            if ($(id1).text() != "" && $(id2).text() != "" && $(id2).text().replace("$", "") > 0) {
                                $(id3).text(Math.round(parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) * 100) + "%");
                            }
                        }
                        else {
                            if ($(id1).text() != "" && $(id2).text() != "" && $(id2).text().replace("$", "") > 0) {
                                $(id3).text(Math.round(parseInt($(id1).text() == "" ? 0 : $(id1).text().replace("$", "")) / (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace("$", ""))) * 100) + "%");
                            }
                        }
                        $(id3).text($(id3).text().replace("-", ""));
                        $(id3).css("color", "black");


                    }
                    function Numeric(id)
                    {
                        $(id).keydown(function (event) {

                            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||

                                (event.ctrlKey == true && (event.which == "118" || event.which == "86")) ||

                                (event.ctrlKey == true && (event.which == "99" || event.which == "67")) ||

                                (event.keyCode == 65 && event.ctrlKey === true) ||

                                (event.keyCode >= 35 && event.keyCode <= 39)) {

                                return;
                            }
                            else {

                                if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                                    event.preventDefault();
                                }
                            }
                        });
                    }










                    '
                . '', \yii\web\VIEW::POS_READY);
    ?>