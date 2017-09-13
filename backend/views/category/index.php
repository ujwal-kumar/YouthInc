<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-primary  btn-create']) ?>
    </p>
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Category_Id',
            'Category_Name',
//            'Is_Child',
//            'Category_Type_Id',
             ['label'=>'Category Type', 'value'=>function ($model, $index, $widget) { 
                if(!empty($model->categoryType))
                    return $model->categoryType->Category_Type_Name; 
                else
                    return '-'; 
                
             }],
            ['label'=>'Parent Category', 'value'=>function ($model, $index, $widget) { 
                if(!empty($model->parentCategory))
                    return $model->parentCategory->Category_Name; 
                else
                    return '-'; 
                
             }],
//            'Parent_Category_Id',
            
            // 'Created_Date',
            // 'Last_Modified_Date',
            
            ['class' => 'yii\grid\ActionColumn',
                            'template' => ' {view} {update} {status} {delete}',
                            'header' => 'Actions',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'target' => '_blank',
                                    'class' => 'model-delete'
                                ]);
                    },
                    'view' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-eye-open text-primary"></span>', $url, [
                                    'title' => Yii::t('yii', 'View'),
                                    'target' => '_blank',
                                    'class' => 'model-view'
                                ]);
                    },
                    'update' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                    'title' => Yii::t('yii', 'Update'),
                                    'target' => '_blank',
                                    'class' => 'model-update'
                                ]);
                    },
//                    'status' => function ($url, $model) {
//                        if(!empty($model->Is_Active))
//                        {
//                            return Html::a('<span class="fa fa-ban"></span>', $url, [
//                                    'title' => Yii::t('yii', 'InActive'),
//                                    'target' => '_blank',
//                                    'class' => 'model-inactive'
//                                ]);
//                        }
//                        else 
//                        {
//                            return Html::a('<span class="fa fa-check-circle"></span>', $url, [
//                                    'title' => Yii::t('yii', 'Active'),
//                                    'target' => '_blank',
//                                    'class' => 'model-active'
//                                ]);
//                            
//
//                        }
//                    }

                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
    
<?= $this->render('/common/popup') ?>
    
<?php
    
    $this->registerJs(''
            
            . '$("body").on("change", "#category-is_child", function(){'
                . '
                    if($(this).is(":checked")) {
                        $("body").find(".parenetCategoryId").slideDown();
                        $(".categoryTypeId").slideUp();
                    }
                    else
                    {
                        
                        $(".parenetCategoryId").slideUp();
                        $(".categoryTypeId").slideDown();
                    }
                    '
            . '});'
            . '$("#category-is_child").trigger("change");'
            .'$("body").on("click hover ", "button[type=reset]", function(){'
            . '  setTimeout(function(){$("#category-is_child").trigger("change");}, 300);'
            . ' '
            . ''
            . '});'

            . '', \yii\web\VIEW::POS_READY);
?></div>
