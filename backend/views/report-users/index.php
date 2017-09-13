<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;


use common\models\Organization;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ReportUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users Report');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index page-content">
    <?php 
    if(!Yii::$app->request->isAjax)
    {?>
    <h1><?php echo  $this->title;  ?> </h1>
    <?php } ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
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
                    'attribute' => 'User_Name',
                    'label'     =>'User Name', 
                    'filter'    =>false,
                 ],

                [
                    'attribute' => 'Email_Id',
                    'label'     =>'Email', 
                    'filter'    =>false,
                 ],

    //            'Email_Id:email',
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
    //            'Password',
    //            'Password_Reset_Token',
                // 'Is_Locked',
                // 'Login_Attempt',
                // 'Is_Active',
                // 'Role_Id',
                // 'Organization_Id',
                // 'Auth_Key',
                // 'Access_Token',
                // 'Created_Date',
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
<?php Pjax::end(); ?></div>
<?php
        $this->registerJs('$(".drop-model-youth").click(function(){ 
        $(this).toggleClass("open")
    });'
                . " $('body').on('click', '.btn-submit', function(){
                    var status = $('[name=survey-status]').val();
                    var form = $('#user-report').serialize();
                    
                    $.ajax({
//                       method: 'POST',
                        url: '".Yii::$app->request->baseUrl."/report-users/index/?'+form,
                        data: { form },
                        success: function(data)
                        {
                            $('.grid-data').html(data);
                            
                        }
                    });
                    return false;
                  }); 
                  $('body').on('click', '.btn-export', function(){
                    
                    var form = $('#user-report').serialize();
                    window.open('".Yii::$app->request->baseUrl."/report-users/export/?'+form, '_blank');
   
                    
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
                  
                    "
                . '', \yii\web\VIEW::POS_READY);
    ?>
