<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\OrgStatus;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ReportNpoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Organizations Report');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

     <?php 
    
        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Organization_Id',
//            'Organization_Name',
             [
                'attribute' => 'Organization_Name',
              
                'filter'    =>false,
             ],
//            'Contact',
//            'Designation',
//            'Initial_Contact_Type_Id',
            // 'Initial_Contact_Date',
            // 'Status_Action_Type_Id',
            // 'Status_Action_Date',
            // 'Budget',
            // 'Youth_Served',
            // 'Staff_Size',
            // 'Board_Size',
            // 'Year_Incorporated',
            // 'Fit',
            // 'Notes',
            // 'Program_Year_Applied',
            // 'Email:email',
            // 'Phone',
            // 'Mailing_Address',
            // 'BADV_Prospects',
            // 'Partner_Type_Id',
            // 'Hiring_Type_Id',
             [
                'attribute' => 'Status',
                'label'     =>'Npo Application Status', 
                'value'     =>function ($model, $index, $widget) { 
                                if($model->Status == 1)
                                {
                                    
                                    return Yii::t('yii', 'Approved'); 
                                }
                                else if($model->Status == 2)
                                {
                                    
                                    return Yii::t('yii', 'Declined'); 
                                }
                                else if($model->Status == 3)
                                {
                                    return Yii::t('yii', 'Pending'); 
                                }

                },
                'filter'    =>false,
             ],
            // 'Status',
            // 'Is_Updated',
            // 'Created_Date',
            // 'Created_By',
            // 'Last_Modified_Date',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);  
    
   
?>

</div>

