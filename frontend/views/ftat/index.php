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
                            
                        </tbody>
                    </table>
                    
                    
                    <div class="row-fluid">
                        <div class="pull-right">
                            <a  class="btn btn-primary svy-next" href="<?php echo Yii::$app->request->baseUrl; ?>/ftat/index/1">Next</a>
                        </div>
                    </div>
                    
                </div>
            </div>
    </div>
</div>
