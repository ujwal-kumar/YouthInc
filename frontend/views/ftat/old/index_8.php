<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
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
                <h1>
                    <h1><?= Yii::t('app', 'Financial Trends Analysis Tool') ?></h1>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">

                    <table class="table-responsive table-borderless" cellspacing="0" border="0">
            
                        <tbody>
                            <tr class="table-space">
                                <td valign="middle" align="right" heig ht="30"><b><span size="3" >Organization Name: </span></b></td>
                                <td colspan="1" width="7%">&nbsp;</td>
                                <td  colspan="8" valign="middle" bgcolor="#FFFF99" align="center">
                                    <input id="users-firstname" class="form-control" name="Users[FirstName]" type="text">
                                </td>


                            </tr>
                            <tr>
                                <td class="table-space">&nbsp;</td>   
                            </tr>
                            <tr>
                                <td valign="middle" align="right" heig ht="23"><b><span >End of Current Fiscal Year: </span></b></td>
                                <td colspan="1" width="7%">&nbsp;</td>
                                <td   colspan="8"  valign="middle" bgcolor="#FFFF99" align="center">
                                    <input id="users-firstname" class="form-control" name="Users[FirstName]" type="text">
                                </td>


                            </tr>
                            <tr>
                                <td class="table-space">&nbsp;</td>   
                            </tr>    
                            <tr class="table-row">
                                <td class="table-col" valign="bottom" align="left" heig ht="7"><span ><br></span></td>
                                <td valign="bottom" align="center"><span >Activity</span></td>
                                <td valign="bottom" align="left"><span >&nbsp;</span></td>
                                <td valign="bottom" align="left"><span >&nbsp;</span></td>
                                <td  valign="bottom" align="left"><span >Year1</span></td>
                                <td  valign="bottom" align="left"><span >Year2</span></td>
                                <td  valign="bottom" align="left"><span >Year3</span></td>
                                <td  valign="bottom" align="left"><span >Current Year</span></td>
                            </tr>
                            <tr>
                                <td class="table-space">&nbsp;</td>   
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" rowspan="3" valign="middle" bgcolor="#0076C0" align="center" heig ht="68"><b><span size="3" >Audit Section</span></b></td>
                                <td style="border-top: 2px solid #000000; border-right: 1px solid #000000" colspan="3" rowspan="2" valign="middle" bgcolor="#0076C0" align="center"><b><span size="3" ><br></span></b></td>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" valign="middle" bgcolor="#0076C0" align="center"><b><span >1. Three Years Ago</span></b></td>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" valign="middle" bgcolor="#0076C0" align="center"><b><span >2. Two Years Ago</span></b></td>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" valign="middle" bgcolor="#0076C0" align="center"><b><span >3. Last Year (Actuals)</span></b></td>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000" rowspan="2" valign="middle" bgcolor="#0076C0" align="center"><b><span >4. Current Year (Budget)</span></b></td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#0076C0" align="right"><b><span size="3" >Fiscal Year Ending:</span></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="41455"  valign="middle" bgcolor="#DCE6F2" align="center"><b>6/30/2013</b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="41820"  valign="middle" bgcolor="#DCE6F2" align="center"><b>6/30/2014</b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="42185"  valign="middle" bgcolor="#DCE6F2" align="center"><b>6/30/2015</b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="42551"  valign="middle" bgcolor="#DCE6F2" align="center"><b>6/30/2016</b></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" rowspan="5" valign="middle" bgcolor="#0076C0" align="center" heig ht="145"><b><span size="3" face="Franklin Gothic Book" >Statement of Activities</span></b></td>
                                <td   class="form-control-green"   style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan="7" valign="middle" bgcolor="#54B948" align="left"><b><span size="3" face="Franklin Gothic Book" >1. Did your organization have an operating surplus or deficit?</span></b></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Unrestricted Revenue &amp; Support</span></td>
                                <td style=" border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#DCE6F2" align="left"><i><span >Less:</span></i></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000" rowspan="2"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Total Expenses</span></td>
                            </tr>
                            <tr>
                                <td  style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Change in Unrestricted Net Assets or “Operating Surplus or (Deficit)”</span></b></td>
                                <td class="form-control-grey" style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" rowspan="13" valign="middle" bgcolor="#0076C0" align="center" heig ht="459"><b><span size="3" face="Franklin Gothic Book" >Statement of Activities</span></b></td>
                                <td  class="form-control-green"  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan="7" valign="middle" bgcolor="#54B948" align="left"><b><span size="3" face="Franklin Gothic Book" >2. What was the mix of unrestricted revenue?</span></b></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Individual Contributions Revenue</span></td>
                                <td   style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Individual Contributions Revenue as % of Total Revenue</span></b></td>
                                <td  class="form-control-grey"  style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Foundation/Corporate Revenue</span></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#DCE6F2" align="left"><i><span >Plus:</span></i></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000" rowspan="2"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Satisfaction of Restrictions</span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Foundation/Corporate Revenue as % of Total Revenue</span></b></td>
                                <td class="form-control-grey"  style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Government Funding</span></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Government Funding as % of Total Revenue</span></b></td>
                                <td  class="form-control-grey"  style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Earned Income</span></td>
                                <td  style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Earned Income as % of Total Revenue</span></b></td>
                                <td  class="form-control-grey"  style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Other Income (self calculating)</span></td>
                                <td  class="form-control-grey"  style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#D9D9D9" align="center"><span size="3"> $-   </span></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#D9D9D9" align="center"><span size="3"> $-   </span></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#D9D9D9" align="center"><span size="3"> $-   </span></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#D9D9D9" align="center"><span size="3"> $-   </span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Other Income as % of Total Revenue</span></b></td>
                                <td  class="form-control-grey"  style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" rowspan="7" valign="middle" bgcolor="#0076C0" align="center" heig ht="257"><b><span size="3" face="Franklin Gothic Book" >Statement of Functional Expenses</span></b></td>
                                <td  class="form-control-green"  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan="7" valign="middle" bgcolor="#54B948" align="left"><b><span size="3" face="Franklin Gothic Book" >3. How are resources allocated across programs and supporting services?</span></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Total Program Expense</span></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Program Expense as % of Total Expense </span></b></td>
                                <td  class="form-control-grey"  style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Total Management &amp; General Expense</span></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Management &amp; General Expense as % of Total Expense</span></b></td>
                                <td  class="form-control-grey"  style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Total Fundraising Expense</span></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Fundraising Expense as % of Total Expense</span></b></td>
                                <td  class="form-control-grey"  style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" rowspan="8" valign="middle" bgcolor="#0076C0" align="center" heig ht="257"><b><span size="3" face="Franklin Gothic Book" >Balance Sheet</span></b></td>
                                <td  class="form-control-green"  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan="7" valign="middle" bgcolor="#54B948" align="left"><b><span size="3" face="Franklin Gothic Book" >4. How liquid are the organization’s reserves?</span></b></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Unrestricted Net Assets (A)</span></td>
                                <td  style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="center"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Board Designated Net Assets (B)</span></td>
                                <td style=" border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="left"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Fixed Assets, net of depreciation</span></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="left"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#DCE6F2" align="left"><i><span >Less:</span></i></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2"  valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="left"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Mortgages or other debt associated with fixed assets</span></td>
                                <td style="border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="left"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Fixed Assets, net of related debt (C)</span></td>
                                <td  class="form-control-grey"  style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#D9D9D9" align="center"><b><span size="3" color="#D9D9D9">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#D9D9D9" align="center"><b><span size="3" color="#D9D9D9">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#D9D9D9" align="center"><b><span size="3" color="#D9D9D9">#N/A</span></b></td>
                                <td style="border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="left"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >LUNA: Liquid Unrestricted Net Assets (A-B-C)</span></b></td>
                                <td  class="form-control-grey"  style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0"  valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="left"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" rowspan="10" valign="middle" bgcolor="#0076C0" align="center" heig ht="323"><b><span size="3" face="Franklin Gothic Book" >Income Statement &amp; Balance Sheet</span></b></td>
                                <td  class="form-control-green "  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan="7" valign="middle" bgcolor="#54B948" align="left"><b><span size="3" face="Franklin Gothic Book" >5. How many months of operations can be covered with liquid operating reserves?</span></b></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span >Available LUNA from above calcuation</span></td>
                                <td class="form-control-grey"  style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#D9D9D9" align="center"><span size="3" color="#D9D9D9">#N/A</span></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#D9D9D9" align="center"><span size="3" color="#D9D9D9">#N/A</span></td>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#D9D9D9" align="center"><span size="3" color="#D9D9D9">#N/A</span></td>
                                <td style="border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="center"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#DCE6F2" align="left"><i><span >Divided by Average Monthly Expenses:</span></i></td>
                                <td  class="form-control-grey" style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" sdval="0" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#D9D9D9" align="center"><span size="3" color="#D9D9D9">#N/A</span></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" sdval="0" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#D9D9D9" align="center"><span size="3" color="#D9D9D9">#N/A</span></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" sdval="0" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#D9D9D9" align="center"><span size="3" color="#D9D9D9">#N/A</span></td>
                                <td style="border-left: 1px solid #000000" rowspan="2" valign="middle" bgcolor="#9D9D9E" align="center"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Total Annual Expenses ÷ 12</span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Months Covered by Liquid Reserves</span></b></td>
                                <td  class="form-control-grey"  style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;#,##0.0_);[RED](#,##0.0)" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;#,##0.0_);[RED](#,##0.0)" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;#,##0.0_);[RED](#,##0.0)" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="left"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td  class="form-control-green" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan="7" valign="middle" bgcolor="#54B948" align="left"><b><span size="3" face="Franklin Gothic Book" >6. How many months of operations can be covered with the available cash?</span></b></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Cash &amp; Cash Equivalents</span></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="center"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#DCE6F2" align="left"><i><span >Divided by Average Monthly Expenses:</span></i></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" sdval="0" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#D9D9D9" align="center"><span size="3">$0 </span></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" sdval="0" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#D9D9D9" align="center"><span size="3">$0 </span></td>
                                <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" sdval="0" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#D9D9D9" align="center"><span size="3">$0 </span></td>
                                <td style="border-left: 1px solid #000000" rowspan="2" valign="middle" bgcolor="#9D9D9E" align="center"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Total Annual Expenses ÷ 12</span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Months of Cash on Hand</span></b></td>
                                <td  class="form-control-grey"  style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;#,##0.0_);[RED](#,##0.0)" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;#,##0.0_);[RED](#,##0.0)" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;#,##0.0_);[RED](#,##0.0)" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="left"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="6" valign="middle" bgcolor="#0076C0" align="center" heig ht="236"><b><span size="3" face="Franklin Gothic Book" > Board Metrics</span></b></td>
                                <td  class="form-control-green"  style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="7" valign="bottom" bgcolor="#54B948" align="left"><b><span size="3" face="Franklin Gothic Book" >7. How engaged is your board?</span></b></td>
                            </tr>
                            <tr>
                                <td style=" border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Total number board members</span></td>
                                <td style=" border-right: 1px solid #000000" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-left: 1px solid #000000" rowspan="2" valign="middle" bgcolor="#9D9D9E" align="center"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Number of members who gave</span></td>
                                <td style=" border-right: 1px solid #000000" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >% of Board Contributing</span></b></td>
                                <td  class="form-control-grey" style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-left: 1px solid #000000" rowspan="2" valign="middle" bgcolor="#9D9D9E" align="center"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Total amount of board giving</span></td>
                                <td style=" border-right: 1px solid #000000" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000" sdnum="1033;0;&quot;$&quot;#,##0_);[RED](&quot;$&quot;#,##0)" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" bgcolor="#BFBFBF" align="left"><b><span size="3" >Board Contributions % of revenue  </span></b></td>
                                <td  class="form-control-grey"  style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" sdval="0" sdnum="1033;0;0%" valign="middle" bgcolor="#BFBFBF" align="center"><b><span size="3" face="Franklin Gothic Medium" color="#BFBFBF">#N/A</span></b></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="left"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="6" valign="middle" bgcolor="#0076C0" align="center" heig ht="214"><b><span size="3" face="Franklin Gothic Book" >Other Questions</span></b></td>
                                <td  class="form-control-green" style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="7" valign="bottom" bgcolor="#54B948" align="left"><b><span size="3" face="Franklin Gothic Book" >8. How are you using available resources?</span></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" valign="middle" align="left"><span size="3" >Number of months from close of fiscal year to audit being issued</span></td>
                                <td style=" border-right: 1px solid #000000" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style=" border-right: 1px solid #000000" valign="middle" bgcolor="#FFFF99" align="center"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" valign="middle" bgcolor="#9D9D9E" align="left"><span size="3" ><br></span></td>
                            </tr>
                            <tr>
                                <td  class="form-control-green"  style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="7" valign="bottom" bgcolor="#54B948" align="left"><b><span size="3" face="Franklin Gothic Book" >9. Have there been any recent organizational events or activities that have impacted your financial results?</span></b></td>
                            </tr>
                            <tr>
                                <td  style="border-top: 1px solid #808080; border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" colspan="7" valign="middle" bgcolor="#FFFF99" align="left"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td  class="form-control-green" style="border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="7" valign="bottom" bgcolor="#54B948" align="left"><b><span size="3" face="Franklin Gothic Book" >10. What steps, if any, have you taken to address your financial health in recent years, if necessary?</span></b></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #808080; border-bottom: 1px solid #808080; border-left: 1px solid #808080; border-right: 1px solid #808080" colspan="7" valign="middle" bgcolor="#FFFF99" align="left"><input id="users-firstname" class="form-control" name="Users[FirstName]" type="text"></td>
                            </tr>
                            <tr>
                                <td valign="bottom" align="left" heig ht="19"><span ><br></span></td>
                                <td valign="bottom" align="left"><span ><br></span></td>
                                <td valign="bottom" align="left"><span ><br></span></td>
                                <td valign="bottom" align="left"><span ><br></span></td>
                                <td valign="bottom" align="left"><span ><br></span></td>
                                <td valign="bottom" align="left"><span ><br></span></td>
                                <td valign="bottom" align="left"><span ><br></span></td>
                                <td valign="bottom" align="left"><span ><br></span></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
    </div>
</div>
