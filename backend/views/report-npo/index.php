<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ReportNpoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Organizations Report');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-index page-content">

    <?php 
    if(!Yii::$app->request->isAjax)
    {?>
    <h1><?php echo  $this->title;  ?> </h1>
    <?php } ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php  Html::a(Yii::t('app', 'Create Organization'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
     <?php 
    if(Yii::$app->request->isAjax)
    {
        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Organization_Id',
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
                    'attribute' => 'Is_Active',
                    'label'     =>'Status', 
                    'value'     =>function ($model, $index, $widget) { 
                                    if(!empty($model->Is_Active))
                                        return Yii::t('yii', 'Active'); 
                                    else
                                        return Yii::t('yii', 'InActive'); 

                    },
                    'filter'    => false,
                 ],
            // 'Status',
            // 'Is_Updated',
            // 'Created_Date',
            // 'Created_By',
            // 'Last_Modified_Date',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);  
    
    }
    else
    {
        echo $this->render('_search', ['model' => $searchModel, 'orgList' => $orgList]);
    }
?>
<?php Pjax::end(); ?>
</div>
<?php
        $this->registerJs('$(".drop-model-youth").click(function(){ 
        $(this).toggleClass("open")
    });'
                . " $('body').on('click', '.btn-submit', function(){
                    
                    var form = $('#npo-report').serialize();
                    
                    $.ajax({
//                       method: 'POST',
                        url: '".Yii::$app->request->baseUrl."/report-npo/index/?'+form,
                        data: { form },
                        success: function(data)
                        {
                            $('.grid-data').html(data);
                            
                        }
                    });
                    return false;
                  }); 
                  $('body').on('click', '.btn-export', function(){
                    
                    var form = $('#npo-report').serialize();
                    window.open('".Yii::$app->request->baseUrl."/report-npo/export/?'+form, '_blank');
                    
                    
                    return false;
                  });
                    "
                . '', \yii\web\VIEW::POS_READY);
    ?>
