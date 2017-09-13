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

    <?php 
    if(!Yii::$app->request->isAjax)
    {?>
    <h1><?php echo  $this->title;  ?> </h1>
    <?php } ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php Html::a(Yii::t('app', 'Create Fta'), ['create'], ['class' => 'btn btn-success']) ?>
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

    //            'Ftat_Id',
                [
                    'attribute' => 'Organization_Id',
                    'label'     =>'Organization', 
                    'value'     =>function ($model, $index, $widget) { 
                                    if(!empty($model->Organization_Id))
                                        return $model->organization->Organization_Name;
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
          }
    else
    {
        echo $this->render('_search-ftat', ['model' => $searchModel, 'orgList' => $orgList]);
    }  
        ?>
<?php Pjax::end(); ?>
</div>
<?php
        $this->registerJs('$(".drop-model-youth").click(function(){ 
        $(this).toggleClass("open")
    });'
                . " $('body').on('click', '.btn-submit', function(){
                    
                    var form = $('#ftat-report').serialize();
                    
                    $.ajax({
//                       method: 'POST',
                        url: '".Yii::$app->request->baseUrl."/report-npo/ftat/?'+form,
                        data: { form },
                        success: function(data)
                        {
                            $('.grid-data').html(data);
                            
                        }
                    });
                    return false;
                  }); 
                  $('body').on('click', '.pagination li a', function(){
                    
                    var form = $(this).attr('href');
                    
                    $.ajax({
//                       method: 'POST',
                        url: form,
                        data: { form },
                        success: function(data)
                        {
                            $('.grid-data').html(data);
                            
                        }
                    });
                    return false;
                  }); 

                  $('body').on('click', '.btn-export', function(){
                    
                    var form = $('#ftat-report').serialize();
                    window.open('".Yii::$app->request->baseUrl."/report-npo/ftat-export/?'+form, '_blank');
                    
                    
                    return false;
                  });
                    "
                . '', \yii\web\VIEW::POS_READY);
    ?>

