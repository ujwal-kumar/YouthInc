<?php 
 use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
$this->title = Yii::t('app', 'Nonprofit Organization Survey Reports');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php  if(!Yii::$app->request->isAjax) { ?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
        </li>
        <li class="active">Reports</li>
    </ul><!-- /.breadcrumb -->



</div>
<?php  } ?>

        <?php Pjax::begin(); ?>    
     <?php 
    if(Yii::$app->request->isAjax)
    {
        echo GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                    [
                                        'label'=>'Orginiation', 
                                        'value'=>function ($model, $index, $widget) { 
                                            return $model->organization->Organization_Name; 
                                        

                                        },
                                        'filter' => true,
                                    ],
//                                     ['label'=>'User_Id', 'value'=>function ($model, $index, $widget) { 
//                                        if(!empty($model->User_Id))
//                                         return $model->user->User_Name; 
//
//                                     }],        
                                     ['label'=>'Program', 'value'=>function ($model, $index, $widget) { 
                                         if(!empty($model->Program_Id))
                                            return $model->program->Program_Name; 
                                     },
                                             'filter' => true,],        
                                    [
                                        'attribute'=> 'Status', 
                                        'value'=>function ($model, $index, $widget) 
                                        { 
                                            if($model->Survey_Status)
                                            {
                                                return $model->surveyStatus->Status_Description; 
                                            }
                                            else 
                                            {
                                                return '';
                                            }
                                        }, 
                                        'filter' => true,
                                    ],

                                    // 'Phone',
//                                         'IsActive',
//                                         'IsLocked',
//                                         'CreatedDate',
                                    // 'LastDateModified',
                        //            ['class' => 'yii\grid\ActionColumn'],
                                    ['class' => 'yii\grid\ActionColumn',
                                        'template' => '{atinek}',
                                        'header' => 'Actions',
                                        'buttons' => [
                                            'atinek' => function ($url, $model) {
//                                                $id = implode(\yii\helpers\ArrayHelper::map($model->surveys, 'User_Id', 'Survey_Status'));
//                                                $userId = $id = implode(\yii\helpers\ArrayHelper::map($model->surveys, 'User_Id', 'User_Id'));
//                                                $serveyStatus = implode(\yii\helpers\ArrayHelper::map($model->surveys, 'User_Id', 'Survey_Status'));
//                                                $surveyId = implode(\yii\helpers\ArrayHelper::map($model->surveys, 'User_Id', 'Survey_Id'));
                                                $id = $model->Survey_Status;
                                                
                                                $serveyStatus = $model->Survey_Status;
                                                $surveyId = $model->Survey_Id;
                                                if(!empty($id) && $serveyStatus == 3)
                                                {
                                                    $id = Yii::$app->request->baseUrl.'/reports/report/'.$surveyId;
                                                    return Html::a('<span class="glyphicon glyphicon-eye-open text-primary "></span>', $id, [
                                                            'title' => Yii::t('yii', 'View Submited Survey'),
                                                            'target' => '_blank',
                                                            'class' => 'suvey-report-link'
                                                        ]);
                                                }
                                            }
                                        ]
                                    ]
                                ],
                            ]); 
    
    }
    else
    {
        echo $this->render('_search', ['model' => $searchModel]);
    }
?>
<?php Pjax::end(); ?>
        
    
<?php
        $this->registerJs(''
                . " $('body').on('click', '.btn-submit', function(){
//                    var status = $('#survey-status').val();
                   var form = $('#surveyForm').serialize();
                    $.ajax({
                       method: 'get',
                        url: '".Yii::$app->request->baseUrl."/reports/index/?'+form,
//                        data: { status:  status},
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
                    
                    var form = $('#surveyForm').serialize();
                    window.open('".Yii::$app->request->baseUrl."/reports/export-report/?'+form, '_blank');
                    
                    
                    return false;
                  });
                  
                   $('body').on('click', '.suvey-report-link', function(){
                    
                    var href = $(this).attr('href');
                    window.open(href, '_blank');
                    
                    
                    return false;
                  });
                  

                  
                "
                . '', \yii\web\VIEW::POS_READY);
    ?>
<!--<div class="row clearfix">
    <div class="col-sm-12 col-md-6 col-lg-6">
         <div id="Sarah_chart_div" ></div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6" >
       <div id="Anthony_chart_div" ></div>
    </div>
</div>-->
