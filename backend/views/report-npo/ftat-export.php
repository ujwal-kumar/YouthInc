<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ReportFtatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'FTA Report');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftat-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php 

            echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

    //            'Ftat_Id',
                [
                    'attribute' => 'Organization_Id',
                    'label'     =>'Organization', 
                    'value'     =>function ($model, $index, $widget) { 
                                    if(!empty($model->Organization_Id))
                                        return ($model->organization->Organization_Name);
                                    else
                                        return ''; 

                    },
                    'filter'    =>false,
                 ],
    //            'Current_Fiscal_Year',
//                'Ftat_Status',
                [
                    'attribute' => 'Ftat_Status',
                    'label'     =>'Status', 
                    'value'     =>function ($model, $index, $widget) { 
                                    if(!empty($model->Ftat_Status))
                                        return Yii::t('yii', 'Submited'); 
                                    else
                                        return Yii::t('yii', 'Pending'); 

                    },
                    'filter'    => false,
                 ],

                // 'Last_Modified_Date',


                ],
            ]); 
          
     ?>
</div>

