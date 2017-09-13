
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Rating Worksheet');
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    td {
  border: 1px solid grey;
  padding: 4px 10px;
}
.worksheet-border1
 {
     border-top: 1px solid #808080; border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080
 }
 
 body  .yellow
 {
     background-color: yellow;
     color: #000 !important;
 }
 body .red
 {
     background-color: red;
     color: #fff !important;
 }
 body .green
 {
     background-color: #54B948;
     color: #fff !important;
 }
</style>
<div class="breadcrumbs  ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb ">
        <li>
            <i class="ace-icon fa fa-database home-icon"></i>
            <a href="#"><?= Yii::t('app', 'Financial Trends Analysis Tool') ?></a>
        </li>
        <li class="active"> <?= Yii::t('app', 'Rating Worksheet') ?></li>
    </ul>
</div>



    <div class="page-content  clearfix ">
        
            <div class="page-header">
                
                    <h1><b><?= Yii::t('app', 'Youth INC Financial Due Diligence Rating Worksheet') ?></b></h1>
                
            </div><!-- /.page-header -->
            
            <?php
//                prd($prevData);
            ?>
            <?php $form = ActiveForm::begin(['id' => 'ftat-rating-form',]); ?>
            <div class="row">
                <div class="col-xs-12">
                    <table  class="table-responsive table-borderless"  cellspacing="0" border="0" style="border:1px solid #333; width:100%;">
                        <colgroup width="352"></colgroup>
                        <colgroup width="96"></colgroup>
                        <colgroup width="25"></colgroup>
                        <colgroup width="60"></colgroup>
                        <colgroup width="69"></colgroup>
                        <colgroup span="2" width="67"></colgroup>
                        <colgroup width="163"></colgroup>
                        <colgroup span="3" width="137"></colgroup>
                        <tbody>
                       
                        <tr>
                                <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" colspan="2" align="center" valign="bottom" bgcolor="#54B948"><b><font face="Franklin Gothic Book" color="#FFFFFF">Green Light</font></b></td>
                                <td class="worksheet-border1" align="center" valign="bottom" bgcolor="#FFFF00"><b><font face="Franklin Gothic Book" color="#000000">Yellow Light</font></b></td>
                                <td class="worksheet-border1" align="center" valign="bottom" bgcolor="#FF0000"><b><font face="Franklin Gothic Book" color="#FFFFFF">Red Light</font></b></td>
                        </tr>
                        <tr>
                                <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" align="center" valign="bottom" bgcolor="#D9D9D9"><b><font face="Franklin Gothic Book">ORG*</font></b></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td class="worksheet-border1" align="center" valign="bottom" bgcolor="#54B948"><b><font face="Franklin Gothic Book" color="#FFFFFF">SCORE</font></b></td>
                                <td class="worksheet-border1" align="center" valign="bottom" bgcolor="#54B948"><b><font face="Franklin Gothic Book" color="#FFFFFF">WEIGHT</font></b></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#D9D9D9" sdval="3" sdnum="1033;"><b><font face="Franklin Gothic Book">3</font></b></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#D9D9D9" sdval="2" sdnum="1033;"><b><font face="Franklin Gothic Book">2</font></b></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#D9D9D9" sdval="1" sdnum="1033;"><b><font face="Franklin Gothic Book">1</font></b></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#D9D9D9" sdval="0" sdnum="1033;"><b><font face="Franklin Gothic Book">0</font></b></td>
                        </tr>
                        <tr>
                                <td class="worksheet-border1" colspan="5" height="22" align="left" valign="bottom" bgcolor="#0076C0"><b><font face="Franklin Gothic Medium" size="3" color="#FFFFFF">1. OPERATING RESULTS</font></b></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                        </tr>
                        <tr>
                                <td class="worksheet-border1" height="54" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" size="3" color="#000000">Trends in Unrestricted Deficits or Surpluses</font></b></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#D9D9D9"><font face="Franklin Gothic Book" color="#000000">
                                    <?php
                                        $year1 = (float)removeDollar( $prevData[2]->Prev_1yrs_Stat);;
                                        $year2 = (float)removeDollar( $prevData[2]->Prev_2yrs_Stat);
                                        $year3 = (float)removeDollar( $prevData[2]->Prev_3yrs_Stat);
                                        $year4 = (float)removeDollar( $prevData[2]->Curr_Yr_Stat);

                                        $b5 =  ($year1 + $year2 + $year3 + $year4)/4
                                    ?>
                                    <div id="b5" ><?php echo $b5; ?></div>
                                    </font>
                                </td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">

                                </font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFCC">
                                    <font face="Franklin Gothic Book" color="#000000">
                                    <?php
                                        $d5 = 0;
                                        /**
                                        * Revenue Growth or Decline
                                        */
                                       if($b5 == "" )
                                       {
                                           $d5 = 0;

                                       }
                                       else if($b5 >= 25000)
                                       {
                                           $d5 = 3;
                                       }
                                       else if($b5 >= 0)
                                       {
                                           $d5 = 2;
                                       }

                                       else if($b5 >= -25000)
                                       {
                                           $d5 = 1;
                                       }
                                       else 
                                       {
                                           $d5 = 0;
                                       }
                                    ?>
                                    <input type="text" disabled="" id="d5" contentEditable="true" style="font-size:14px;height:30px; width:100%; background: none; border:none" max="10" value="<?php echo $d5; ?>">
                                    </font>
                                </td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF" sdval="0.2" ><font face="Franklin Gothic Book" color="#000000">20%</font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Stable or increasing surpluses</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Narrowly balanced operating results</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Stable low deficits or mixed results</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Substantial and/or steadily increasing deficits</font></td>
                        </tr>
                        <tr>
                                <td class="worksheet-border1" height="36" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" size="3" color="#000000">Revenue Growth or Decline</font></b></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#D9D9D9"><font face="Franklin Gothic Book" color="#000000">
                                    <?php
                                        $year1 = (float)removeDollar( $prevData[0]->Prev_1yrs_Stat);;
                                        $year2 = (float)removeDollar( $prevData[0]->Prev_2yrs_Stat);
                                        $year3 = (float)removeDollar( $prevData[0]->Prev_3yrs_Stat);
                                        $year4 = (float)removeDollar( $prevData[0]->Curr_Yr_Stat);

                                        $b6 =  ($year1 + $year2 + $year3 + $year4)/4
                                    ?>
                                    <div id="b6" ><?php echo $b6; ?></div>

                                    </font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFCC">
                                    <font face="Franklin Gothic Book" color="#000000">
                                        <?php 
                                        $currYrRevenue = 0;
                                        $yr1Revenue = 0;
                                        
                                        foreach($prevData as $data)
                                        {
//                                            prd($data);
                                            if($data->Ftat_Question_Id ==  1)
                                            {
                                                 $currYrRevenue = (float) removeDollar($data->Curr_Yr_Stat);
                                                 $yr1Revenue = (float)removeDollar($data->Prev_3yrs_Stat);
                                            }
                                            
                                        }
                                        
                                        try
                                        {
                                            $d6 = (+$currYrRevenue - $yr1Revenue)/$yr1Revenue;
                                        }
                                        catch (Exception $e)
                                        {
                                            $d6 = 0;
                                        }
                                        
                                        
                                        /**
                                        * Trends in Unrestricted Deficits or Surpluses
                                        */
                                       if($d6 == "")
                                       {
                                           $d6 = 0;
                                       }
                                       else if($d6 >= 30/100 )
                                       {
                                           $d6 = 3;
                                       }
                                       else if($d6 >= 0 )
                                       {
                                           $d6 = 2;
                                       }    
                                       else if($d6 >= -20/100)
                                       {
                                           $d6 = 1;
                                       }
                                       else 
                                       {
                                           $d6 = 0;
                                       }
                                       
                                        ?>
                                    <input disabled="" type="text" id="d6" contentEditable="true" style="font-size:14px;height:30px; width:100%; background: none; border:none" max="10" value="<?php echo $d6 ; ?>">
                                    </font>
                                </td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF" sdval="0.1" ><font face="Franklin Gothic Book" color="#000000">10%</font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Steady revenue growth</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Stable or slight increase in revenues</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Narrowly decreasing revenues</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Sharply decreasing revenues</font></td>
                        </tr>
                        <tr>
                                <td height="21" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                        </tr>
                        <tr>
                                <td class="worksheet-border1" colspan="5" height="22" align="left" valign="bottom" bgcolor="#0076C0"><b><font face="Franklin Gothic Medium" size="3" color="#FFFFFF">2. STRENGTH OF BALANCE SHEET / LIQUIDITY</font></b></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                        </tr>
                        <tr>
                                <td class="worksheet-border1" height="108" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" size="3" color="#000000">Liquid Reserves (Months of LUNA)</font></b></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#D9D9D9" sdnum="1033;1033;#,##0.00_);(#,##0.00)"><font face="Franklin Gothic Book" color="#000000">
                                    <?php 
                                         $b9 = round(removeDollar($prevData[28]->Prev_3yrs_Stat, 2));
                                    ?>
                                    <div id="b9" ><?php echo $b9; ?></div>
                                </font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#D9D9D9" sdval="0" sdnum="1033;"><font face="Franklin Gothic Book" color="#000000">
                                    <?php
                                        $d9 = 0;
                                        if(empty($b9))
                                        {
                                            $d9 =  0;
                                        }
                                        else if($b9 > 0 && $b9 < 1 )
                                        {
                                            $d9 =  1.00;
                                        }
                                        else if( $b9 >= 1 && $b9 < 3 )
                                        {
                                            $d9 =  2.00;
                                        }
                                        else if( $b9 >=3 )
                                        {
                                            $d9 =  3.00;
                                        }
                                    ?>
                                    <div id="d9" ><?php echo $d9; ?></div>
                                </font></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#FFFFFF" sdval="0.2" ><font face="Franklin Gothic Book" color="#000000">20%</font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">3 months or more of LUNA</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">1-3 months of LUNA: organization is able to meet operating expenses as well as have some reserves available</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Less than 1 month of LUNA</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Negative LUNA balance (no liquid reserves available)</font></td>
                        </tr>
                        <tr>
                                <td class="worksheet-border1" height="90" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" size="3" color="#000000">Months of Cash</font></b></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#D9D9D9" sdnum="1033;1033;#,##0.00_);(#,##0.00)"><font face="Franklin Gothic Book" color="#000000">
                                    <?php 
                                        
                                         $b10 = round($prevData[31]->Prev_3yrs_Stat, 2);
                                    ?>
                                    <div id="b10" ><?php echo $b10; ?></div>
                                </font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#D9D9D9" sdval="0" sdnum="1033;"><font face="Franklin Gothic Book" color="#000000">
                                    <?php
                                        $d10 = 0;
                                        if(empty($b10))
                                        {
                                            $d10 = 0.00;
                                        }                       
                                        else if( $b10 >= 1 && $b10 <=3 )
                                        {
                                            $d10 =  2.00;
                                        }
                                        else if( $b10 >3 )
                                        {
                                            $d10 =  3.00;
                                        }
                                    ?>
                                    <div id="d10" ><?php echo round($d10, 2); ?></div>
                                    </font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF" sdval="0.2" ><font face="Franklin Gothic Book" color="#000000">20%</font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Highly liquid with available cash reserves of over 3 months of operating expenses</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Liquid with available cash reserves of between 1 and 3 months of operating expenses</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">N/A</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Less than 1 month of available cash</font></td>
                        </tr>
                        <tr>
                                <td height="21" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                        </tr>
                        <tr>
                                <td class="worksheet-border1" colspan="5" height="22" align="left" valign="bottom" bgcolor="#0076C0"><b><font face="Franklin Gothic Medium" size="3" color="#FFFFFF">3. MANAGEMENT OF RESOURCES</font></b></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                        </tr>
                        <tr>
                                <td class="worksheet-border1" height="108" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" size="3" color="#000000">% Administrative Costs over Total Expenses</font></b></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#D9D9D9" ><font face="Franklin Gothic Book" color="#000000">
                                    <?php
                                        
                                        $year1 = (float)removePercentage( $prevData[17]->Prev_1yrs_Stat);;
                                        $year2 = (float)removePercentage( $prevData[17]->Prev_2yrs_Stat);
                                        $year3 = (float)removePercentage( $prevData[17]->Prev_3yrs_Stat);
                                        $year4 = (float)removePercentage( $prevData[17]->Curr_Yr_Stat);

                                         $b13 = round(($year1 + $year2 + $year3 + $year4)/4, 2);
                                        
                                    ?>
                                    <div id="b13" ><?php echo $b13.'%'; ?></div>
                                    </font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#D9D9D9" sdval="0" sdnum="1033;"><font face="Franklin Gothic Book" color="#000000">
                                    <?php
                                        $d13 = 0;
                                        $b13 =  $b13/100;
                                         if( $b13 >= 0.099 && $b13 <= 0.3)
                                        {
                                            $d13 =  3.00;
                                        }
                                        else if( $b13 >=3 )
                                        {
                                            $d13 =  0.00;
                                        }

                                    ?>
                                    <div id="d13" ><?php echo round($d13, 2); ?></div>
                                    </font>
                                </td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#FFFFFF" sdval="0.15" ><font face="Franklin Gothic Book" color="#000000">15%</font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Administrative expenses between 10 and 30%: clear ability to balance administrative, program, and fundraising resources</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">N/A</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">N/A</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Administrative expenses dangerously low (&lt;10%) or excessively high (&gt;30%)</font></td>
                        </tr>
                        <tr>
                                <td class="worksheet-border1" height="54" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" size="3" color="#000000">Months to Complete Audit</font></b></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#D9D9D9" sdnum="1033;0;0.0"><font face="Franklin Gothic Book" color="#000000">
                                    <?php
                                        $year1 = (float)removePercentage( $prevData[37]->Prev_1yrs_Stat);;
                                        $year2 = (float)removePercentage( $prevData[37]->Prev_2yrs_Stat);
                                        $year3 = (float)removePercentage( $prevData[37]->Prev_3yrs_Stat);

                                        $b14 = (float)(($year1 + $year2 + $year3)/3);
                //                        echo $b14.'%';
                                    ?>
                                    <div id="b14" ><?php echo round($b14, 2); ?></div>
                                    </font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#D9D9D9" sdval="0" sdnum="1033;"><font face="Franklin Gothic Book" color="#000000">
                                    <?php
                                        $d14 = 0;
                                         if( $b14 <= 6)
                                        {
                                            $d14 =  3.00;
                                        }
                                        else if( $b14 >=3 )
                                        {
                                            $d14 = 0.00;
                                        }
                                    ?>
                                    <div id="d14" ><?php echo round($d14, 2) ; ?></div>
                                </font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF" sdval="0.05" ><font face="Franklin Gothic Book" color="#000000">5%</font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Audit issued within 6 months after fiscal year end</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">N/A</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">N/A</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Audit issued more than 6 months after fiscal year end</font></td>
                        </tr>
                        <tr>
                                <td height="21" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                        </tr>
                        <tr>
                                <td class="worksheet-border1" colspan="5" height="22" align="left" valign="bottom" bgcolor="#0076C0"><b><font face="Franklin Gothic Medium" size="3" color="#FFFFFF">4. BOARD ENGAGEMENT</font></b></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                        </tr>
                        <tr>
                                <td class="worksheet-border1" height="36" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" size="3" color="#000000">% of Board Members that Give</font></b></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#D9D9D9" ><font face="Franklin Gothic Book" color="#000000">
                                    <?php
                                         $year1 = (float)removePercentage( $prevData[34]->Prev_1yrs_Stat);;
                                         $year2 = (float)removePercentage($prevData[34]->Prev_2yrs_Stat);
                                        $year3 = (float)removePercentage($prevData[34]->Prev_3yrs_Stat);

                                        $b17 = (float)(($year1 + $year2 + $year3)/3);

                                    ?>
                                    <div id="b17" ><?php echo round($b17, 2).'%'; ?></div>
                                    </font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#D9D9D9" sdval="0" sdnum="1033;"><font face="Franklin Gothic Book" color="#000000">
                                    <?php
                                        $d17 = 0;
                                        $b17 = $b17/100;
                                         if( $b17 > 0 && $b17 < 0.5 )
                                        {
                                            $d17 =  1.00;
                                        }
                                        else if ( $b17 >= 0.5 && $b17 < 1 )
                                        {
                                            $d17 =  2.00;
                                        }
                                        else if ( $b17 == 1 )
                                        {
                                            $d17 =  3.00;
                                        }
                                        else
                                        {
                                            $d17 =  0.00;
                                        }
                                    ?>
                                    <div id="d17" ><?php echo $d17 ; ?></div>
                                </font></td>
                                <td style="border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#FFFFFF" sdval="0.1" ><font face="Franklin Gothic Book" color="#000000">10%</font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">100% of Board members give</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">50% or more Board members give</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">Less than 50% of Board members give</font></td>
                                <td class="worksheet-border1" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000">No Board members give</font></td>
                        </tr>
                        <tr>
                                <td height="21" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                        </tr>
                        <tr>
                                <td style="border-top: 1px solid #808080; border-bottom: 1px solid #808080; border-left: 1px solid #808080" height="22" align="left" valign="middle" bgcolor="#54B948"><b><font face="Franklin Gothic Medium" size="3" color="#FFFFFF">TOTAL SCORE</font></b></td>
                                <td style="border-top: 1px solid #808080; border-bottom: 1px solid #808080; border-right: 1px solid #808080" align="center" valign="middle" bgcolor="#54B948"><font face="Franklin Gothic Medium" size="3" color="#FFFFFF"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Medium" size="3" color="#000000"><br></font></td>
                                        <td class="worksheet-border1" colspan="2" align="center" valign="middle" bgcolor="#FF0000" sdval="0" sdnum="1033;1033;#,##0.00_);(#,##0.00)"><b><font face="Franklin Gothic Medium" size="3" >
                                                <div id="d19">
                                                    <?php
                                                        $d5 = 0;
                                                        $d6 = 0;
//                                                        
                                                         $sumProduct = round(((double)((($d5 * 20/100) +  ($d6 * 10/100) + ($d9 * 20/100) + ($d10 * 20/100) +  ($d13 * 15/100) + ($d14 * 5/100) + ($d17 * 10/100))/1)), 2);
                                                        
                                                        if($sumProduct > (float)3)
                                                        {
                                                            echo 3;
                                                        }
                                                        else if($sumProduct == (float)2)
                                                        {
                                                            echo $sumProduct;

                                                        }
                                                        else if($sumProduct == 1.00 || $sumProduct == 1)
                                                        {
                                                            echo $sumProduct;

                                                        }

                                                        else
                                                        {
                                                            echo $sumProduct;

                                                        } 
                                                    ?>
                                                </div>
                                        </b></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                        </tr>
                        <tr>
                                <td height="21" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><!--RATING NOTES--></font></b></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                        </tr>
                        <tr>
                                <td colspan="2" height="49" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000">* Average used for income statement metrics (e.g. operating results); most recent year used for balance sheet metrics</font></b></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td class="worksheet-border1" colspan="4" rowspan="6" align="left" valign="middle" >
                                    <font face="Franklin Gothic Book" color="#000000">
                                    <!--<textarea id="rating-notes" style="font-size:14px;height:100%; width:100%; background: none; border:none" max="10" type="text" contenteditable="true"></textarea>-->
                                    </font></td>
                                </tr>
                        <tr>
                                <td height="21" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                </tr>
                        <tr>
                                <td height="21" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                </tr>
                        <tr>
                                <td height="21" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                </tr>
                        <tr>
                                <td height="21" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                </tr>
                        <tr>
                                <td height="21" align="left" valign="middle" bgcolor="#FFFFFF"><b><font face="Franklin Gothic Book" color="#000000"><br></font></b></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="center" valign="middle" bgcolor="#FFFFFF" ><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Franklin Gothic Book" color="#000000"><br></font></td>
                                </tr>
                </tbody>
                    
            </table>

                   <br>
                   <br>
                   
                    <div class="form-group ">
                        <div class="row clearfix">
<!--                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <?= Html::a('Save', ['/ftat/rating/'], ['class'=>'btn btn-primary']) ?>
                                <?= Html::a('Submit', ['/ftat/rating/'], ['class'=>'btn btn-primary']) ?>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-1" >
                                
                            </div>-->
                        </div>

                    </div>
                    
                </div>
            </div>
            <?php ActiveForm::end(); ?>
    </div>

<?php
function removeDollar($num)
{
    $num = str_replace(')', '', $num);
    $num = str_replace('(', '-', $num);
    return str_replace('$', '', $num);
}

function removePercentage($num)
{
    $num = str_replace(')', '', $num);
    $num = str_replace('(', '-', $num);
    return str_replace('%', '', $num);
}

?>
<?php
    $this->registerJs(''
            . '
                $("table div[id]").each(function(){

//                        $(this).prop("contenteditable",false)

                });

                $("#d5, #d6").on("blur",function(){
                    var d5 = $("#d5").val();
                    var d6 = $("#d6").val();
                    var d9 = $("#d9").text();
                    var d10 = $("#d10").text();
                    var d13 = $("#d13").text();
                    var d14 = $("#d14").text();
                    var d17 = $("#d17").text();
                    var sumProduct = parseFloat(((d5 * .2) +  (d6 * .1) + (d9 * .2)+ (d10 * .2) + (d13 * .15)  + (d14 * .05) + (d17 * .1))/1).toFixed(2);

                    if(sumProduct > parseFloat(3))
                    {
                        $("#d19").text(3).parents("td").addClass("green").removeClass("yellow").removeClass("red");
                    }
                    else if(sumProduct >=  parseFloat(2)  )
                    {

                        $("#d19").text(sumProduct).parents("td").addClass("green").removeClass("yellow").removeClass("red")
                    }
                    else if(sumProduct == 1.00 || sumProduct == 1 || sumProduct < 2)
                    {

                        $("#d19").text(sumProduct).parents("td").addClass("yellow").removeClass("green").removeClass("red")
                    }

                    else
                    {
                        $("#d19").text(sumProduct).parents("td").addClass("red").removeClass("green").removeClass("yellow")
                    }

                });
                
                $("#d5, #d6").trigger("blur")

                Numeric(d5);
                Numeric(d6);
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