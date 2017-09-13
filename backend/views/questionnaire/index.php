<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\ControlType;
/* @var $this yii\web\View */
/* @var $searchModel common\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Questions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Question'), ['create'], ['class' => 'btn btn-primary btn-create']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Question_Id',
//            'Question_Name',
            [
                'attribute' => 'Question_Name',
                 
                'value'     => function ($model, $index, $widget) { 
                                if(!empty($model->Question_Name))
                                {
                                    return substr($model->Question_Name, 0, 50).'...';
                                }
                
                },
                
            ],
//            'Category_Id',
            [
                'attribute' => 'Category_Id',
                'label'     => 'Category', 
                'value'     => function ($model, $index, $widget) { 
                                if(!empty($model->Category_Id))
                                    return $model->category->Category_Name; 
                                else
                                    return '-'; 
                
                },
                'filter'    =>ArrayHelper::map(Category::find()->asArray()->all(), 'Category_Id', 'Category_Name'),
            ],
            [
                'attribute' => 'Control_Type_Id',
                'label'     => 'Control Type', 
                'value'     => function ($model, $index, $widget) { 
                                if(!empty($model->Control_Type_Id))
                                    return $model->controlType->Control_Type_Name; 
                                else
                                    return '-'; 
                
                },
                'filter'    =>ArrayHelper::map(ControlType::find()->asArray()->all(), 'Control_Type_Id', 'Control_Type_Name'),
            ],
//            'Control_Type_Id',
            [
                'attribute' => 'Is_Active',
                'label'     =>'Status', 
                'value'     =>function ($model, $index, $widget) { 
                                if(!empty($model->Is_Active))
                                    return Yii::t('yii', 'Active'); 
                                else
                                    return Yii::t('yii', 'InActive'); 

                },
                'filter'    =>array(0 =>Yii::t('yii', 'InActive'),1 =>Yii::t('yii', 'Active')),
             ],
            // 'Created_Date',
            // 'Created_By',
            // 'Last_Modified_Date',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {view} {update} {status} {delete}',
                'header' => 'Actions',
                
                'buttons' => 
                [
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
                    'status' => function ($url, $model) {
                        if(!empty($model->Is_Active))
                        {
                            return Html::a('<span class="fa fa-ban text-danger"></span>', $url, [
                                    'title' => Yii::t('yii', 'InActive'),
                                    'target' => '_blank',
                                    'class' => 'model-inactive'
                                ]);
                        }
                        else 
                        {
                            return Html::a('<span class="fa fa-check-circle text-success"></span>', $url, [
                                    'title' => Yii::t('yii', 'Active'),
                                    'target' => '_blank',
                                    'class' => 'model-active'
                                ]);
                            

                        }
                    }

                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
    
    <?= $this->render('/common/popup') ?>
    
    <?php
    
    $this->registerJs(''
            . '
               


                $("body").on("change", "#question-control_type_id, #question-category_id", function(){
                
                    var control_type = $("#question-control_type_id option:selected").text().toLowerCase();

                    if($("#question-control_type_id").val() != "" && $("#question-category_id").val() != "")
                    {
                        if(control_type == "textarea")
                        {
                            $(".add-button").addClass("hidden");
                            $(".add-answer-btn-grid, .add-answer-btn-cnt-grid ").addClass("hidden");
                            $(".add-answer-btn-cnt").not(".add-answer-btn-cnt:first").addClass("hidden");
                            $("#is-text-area").val($(".add-answer-btn-cnt:first").find("#answer-answer_name").data("id"));
                            if($(".textbox-new").length >= 1)
                                $(".textbox-new").remove();

                        }
                        else if(control_type == "grid")
                        {
                            $(".add-answer-btn").addClass("hidden");
                            $(".add-answer-btn-grid").not(".add-answer-btn-cnt:first").removeClass("hidden");
                            $(" .add-answer-btn-cnt-grid ").removeClass("hidden");
                            if($(".new-grid").length >= 1)
                                $(".new-grid").remove();
                        }
                        else
                        {
                            $(".add-answer-btn-grid, .add-answer-btn-cnt-grid ").addClass("hidden");
                            $(".add-answer-btn").not(".add-answer-btn-cnt:first, .add-answer-btn-new").removeClass("hidden");
                            $(".add-button").removeClass("hidden");
                            $("#is-text-area").val("");
                            
                            if($(".textbox-new").length >= 1)
                                $(".textbox-new").remove();
                                
//                            jQuery("#create-question-form").yiiActiveForm("add", {
//                                "id": "answer-answer_name",
//                                "name": "Answer[Answer_Name][]",
//                                "container": ".field-answer-answer_name",
//                                "input": "#answer-answer_name",
//                                "validate": function(attribute, value, messages, deferred, $form) {
//                                    yii.validation.string(value, messages, {
//                                        "message": "Question  Name must be a string.",
//                                        "skipOnEmpty": 1
//                                    });
//                                    yii.validation.required(value, messages, {
//                                        "message": "Question  Name cannot be blank."
//                                    });
//                                }
//                            });
                        }
                        //$(".add-answer-btn").removeClass("hidden");
                    }
                    else
                    {
                        $(".add-answer-btn, .add-answer-btn-grid").addClass("hidden");
                    }
                });'
            
            .''
            
            . '$("body").on("click", ".add-button", function(){
                var control_type = "#question-control_type_id";
                
                var row_last = $(".add-answer-btn-cnt:last");
                var row = row_last.clone();
                var label = row.find(".col-lg-11  .ans-lable strong");
                var inputId = row.find(".col-lg-11 .form-control");
                label.text(parseInt(parseInt(label.text()) + 1) + "."); 
                
                inputId.attr("id", inputId.attr("id") + parseInt(label.text()) );
                inputId.attr("name", "Answer[Answer_Name][]" );
                inputId.attr("data-id", "" );
                inputId.attr("value", "" );
                inputId.prop("value", "" );
                row_last.after(row);
                alert(inputId.attr("id"));
                $("#create-question-form").yiiActiveForm("add", {
                    id: inputId.attr("id"),
                    name: inputId.attr("name"),
                    container: " .add-answer-btn .form-group",
                    input: "#" + inputId.attr("id"),
                    error: ".help-block",
                    validate:  function (attribute, value, messages, deferred, $form) {
                        yii.validation.required(value, messages, {message: "This field can not be blank"});
                    }
                });

                inputId.focus();
                

            
                return false;'
            . '});'
            
            // Grid Add Block
            . '$("body").on("click", ".add-button-grid", function()
               {
                    var rows_no = $("#grid-ans-rows").val();
                    var cols_no = $("#grid-ans-columns").val();
                    $(this).parents(".row-column-creator-cnt").remove();
                    
                    for(i = 1; i <= rows_no -1; i++)
                    {
                        var row_last = $(".add-answer-rows-repeater:last");
                        var row = row_last.clone();
                        var label = row.find(".col-lg-11  .ans-lable strong");
                        var inputId = row.find(".col-lg-11 .form-control");
                        label.text(parseInt(parseInt(label.text()) + 1) + "."); 

                        inputId.attr("id", inputId.attr("id") + parseInt(label.text()) );
                        inputId.attr("name", "GridAnswer[Rows][]" );
                        inputId.attr("data-id", "" );
                        inputId.attr("value", "" );
                        inputId.prop("value", "" );
                        row_last.after(row);

                        inputId.focus();
                    }
                    
                    for(i = 1; i <= cols_no -1 ; i++)
                    {
                        var row_last = $(".add-answer-columns-repeater:last");
                        var row = row_last.clone();
                        var label = row.find(".col-lg-11  .ans-lable strong");
                        var inputId = row.find(".col-lg-11 .form-control");
                        label.text(parseInt(parseInt(label.text()) + 1) + "."); 

                        inputId.attr("id", inputId.attr("id") + parseInt(label.text()) );
                        inputId.attr("name", "GridAnswer[Columns][]" );
                        inputId.attr("data-id", "" );
                        inputId.attr("value", "" );
                        inputId.prop("value", "" );
                        row_last.after(row);

                        inputId.focus();
                    }
                
                    $(".add-answer-rows-cnt, .add-answer-columns-cnt").removeClass("hidden");

            
                return false;'
            . '});'
            
            // Add single row 
            . '$("body").on("click", ".add-button-row", function(){
                var row_last = $(".add-answer-rows-repeater:last");
                var row = row_last.clone();
                var label = row.find(".col-lg-11  .ans-lable strong");
                var inputId = row.find(".col-lg-11 .form-control");
                label.text(parseInt(parseInt(label.text()) + 1) + "."); 

                inputId.attr("id", inputId.attr("id") + parseInt(label.text()) );
                inputId.attr("name", "GridAnswer[Rows][]" );
                inputId.attr("data-id", "" );
                inputId.attr("value", "" );
                inputId.prop("value", "" );
                row_last.after(row);

                inputId.focus();
                

            
                return false;'
            . '});'
           
            
            // Add single row 
            . '$("body").on("click", ".add-button-column", function(){
                var row_last = $(".add-answer-columns-repeater:last");
                var row = row_last.clone();
                var label = row.find(".col-lg-11  .ans-lable strong");
                var inputId = row.find(".col-lg-11 .form-control");
                label.text(parseInt(parseInt(label.text()) + 1) + "."); 

                inputId.attr("id", inputId.attr("id") + parseInt(label.text()) );
                inputId.attr("id", "required" );
                inputId.attr("name", "GridAnswer[Columns][]" );
                inputId.attr("data-id", "" );
                inputId.attr("value", "" );
                inputId.prop("value", "" );
                row_last.after(row);

                inputId.focus();
                

            
                return false;'
            . '});'
            
            // Delete Answer
            . '$("body").on("click", ".delete-answer", function(){
                if($(".delete-answer").length > 1)
                {
                    var inputId = $(this).parents(".add-answer-btn-cnt").find(".col-lg-11 .form-control");
                    var index = $(this).parents(".add-answer-btn-cnt").index();
                    var label = $(this).parents(".add-answer-btn-cnt").find(".col-lg-11  .ans-lable strong");
                    var indexId = inputId.data("id");
                    $(".add-answer-btn-cnt").each(function(){
                        var currIndex = $(this).index();
                        if(index < currIndex)
                        {
                            var label = $(this).find(".col-lg-11  .ans-lable strong");
                            label.text(parseInt(parseInt(label.text()) - 1) + "."); 
                        }
                    });
                    if(inputId.data("id"))
                    {
                        $.post("'.Yii::$app->request->baseUrl."/questionnaire/deleteans/".'" + indexId, function(data, status){
                            $(".alert-message-cnt").html(data);
                            setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
                        });
                    }
                    $(this).parents(".add-answer-btn-cnt").remove();
                    
                }
                else
                {
                    //alert($(this).parents(".add-answer-btn-cnt").index());
                }
                

            
                return false;'
            . '});'
            

            // Delete row
            . '$("body").on("click", ".delete-row, .delete-column", function()
               {
                var className = "."+$(this).data("class");
                
                var containerName = ".add-answer-columns-repeater, .add-answer-rows-repeater";
                
                if($(this).data("class") == "delete-row")
                    containerName = " .add-answer-rows-repeater";
                else
                    containerName = ".add-answer-columns-repeater";

                if($(className).length > 1)
                {
                   
                    
                    var inputId = $(this).parents(containerName).find(".col-lg-11 .form-control");
                    var index = $(this).parents(containerName).index();
                    var indexId = inputId.data("id");
                    var label = $(this).parents(containerName).find(".col-lg-11  .ans-lable strong");
                    $(containerName).each(function(){
//                        alert(className);
                        var currIndex = $(this).index();
                        if(index < currIndex)
                        {
                            var label = $(this).find(".col-lg-11  .ans-lable strong");
                            label.text(parseInt(parseInt(label.text()) - 1) + "."); 
                        }
                    });
//                    if(inputId.data("id"))
//                    {
//                        $.post("'.Yii::$app->request->baseUrl."/questionnaire/deleteans/".'" + indexId, function(data, status){
//                            $(".alert-message-cnt").html(data);
//                            setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
//                        });
//                    }
                    $(this).parents(containerName).remove();
                    
                }
                
                

            
                return false;'
            . '});'
            
            . ''
            
            
            . ''
            
           

            . '', \yii\web\VIEW::POS_READY);
?></div>
