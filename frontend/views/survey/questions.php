<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Take Survey');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- BREADCRUMBS -->
<div class="page-content">
    <div class="contai ner">
      <div class="row">
            <div class="col-xs-12">  <br>
                <h2 style="text-align: center"><?php echo $survey->program->Program_Name ?></h2>
                    <br>
                    <br>
                    <br>
                    <?php Pjax::begin([
                            'id' => 'questions',
                            'enablePushState' => true        
                        ]); ?>  
                    <?= Html::beginForm([Yii::$app->request->pathInfo], 'post',['data-pjax' => '', 'id' => 'surveyForm'], ['enctype' => 'multipart/form-data']) ?>
                    <div class="row-fluid servey-form">
                        <?php
                        /* @var $this yii\web\View */

                        
                        $count = 1;
                        $questionCount = 0;
                        $categoryId = '';
                        foreach($questions as $question)
                        {
                            $categoryName = $question->category->Category_Name;
                            $questionId = $question->Question_Id;
                            $questionCount = $count + $limit;
                            ?>
                            <?php
                                if($question->Category_Id != $categoryId)
                                {
                                    echo "<h4 class='cat-heading col-sm-12'><b>$categoryName<b></h4><br><br>";
//                                    $questionCount = 0;
//                                    $count = 1;
                                }
                            ?>
                            <div class="control-group clearfix">
                                    <label class="control-label bolder col-sm-12"><?php  echo '<b>Q'. ( $questionCount ).'. '. $question->Question_Name.'</b>' ?></label>
                                    <?php
                                        
                                        
                                        if(!empty($question->gridAnswers))
                                        {
                                            $tempArray = (array)$question->answers;
                                            $dropdownFlag = 1;
                                            $options = ['class' => 'ace'];
                                            $disabled = '';
                                            
                                            if($survey->Survey_Status == 3)
                                            {
                                                $disabled = ' disabled ';
                                                $options['disabled'] = 'disabled';
                                            }
//                                            
                                            
                                            echo  Html::input('hidden', 'SurveyId', $survey->Survey_Id, ['class' => '']) ;
                                            $questionType = strtolower($question->controlType->Control_Type_Name);
                                            
                                            echo '<div class="col-sm-12 clearfix">';
                                            $count = 1;
                                            
                                            $gridAns = (array)$question->gridAnswers;
                                            
                                            $flag = 1;
                                            foreach($question->gridAnswers as $ansKey => $answer)
                                            {
//                                                ?>
                                                    
<!--                                                        <label class="col-sm-2 control-label no-padding-left">
                                                            <?php
                                                                echo $answer->Answer_Name;
                                                            ?>
                                                        </label><br>-->
                                                    <div class="col-sm-12 clearfix">
                                                        <label class="col-sm-3 control-label no-padding-left"><?php echo $answer->Answer_Name ?></label>
                                                        <div class="col-sm-9">
                                                    <?php
                                                    $answerId = $answer->Grid_Answer_Id;
                                                    $rowId = $answerId;
                                                    $textAns = '';
                                                    
                                                    foreach($answer->gridAnswerColumns as $subAnsKey => $subAnswer)
                                                    { 
                                                        if($flag == 1)
                                                        {
//                                                            echo '<br><label class="col-sm-2 control-label no-padding-left pull-left">';
//                                                            echo $subAnswer->Answer_Name;
//                                                            echo '</label><br>';
                                                        }
                                                        foreach($subAnswer->surveyTransactions as $surveyTransaction)
                                                        {
                                                            if($surveyTransaction->Answer_Id == $subAnswer->Grid_Answer_Column_Id && $surveyTransaction->Question_Id == $questionId)
                                                            {
                                                                $textAns = $surveyTransaction->Answer_Value;
                                                                break;
                                                            }
                                                        }
                                                        ?>
                                                            <input  <?php echo $disabled ?> name="AnswerOptions[<?php echo $questionId ?>][<?php echo $subAnswer->Grid_Answer_Column_Id; ?>][<?php echo $answerId ?>]"  value="<?php echo $textAns ?>" class="col-xs-10 col-sm-3">
                                                        <?php
                                    
                                                    }
//                                                ?>
                                                  </div>
                                                    <br>
                                                    <br>
                                                </div>
                                                <?php
                                                  
                                                $flag++;      
                                            }
                                            echo '</div>';
                                            
                                            
                                            
//                                            foreach($question->gridAnswers as $ansKey => $answer)
//                                            {  
//                                               
////                                                prd($question->gridAnswers);
//
//                                                if($answer->Field_Type == "row")
//                                                {
//                                                    $answerId = $answer->Grid_Answer_Id;
//                                                    $rowId = $answerId;
//                                                    $inputType = ['Checkbox', 'Radio'];
//                                                    $inputText = ['Checkbox', 'Radio'];
//                                                    $inputDropDown = ['Checkbox', 'Radio'];
//
//                                                    unset($options['checked']);
//
//                                                    $textAns = '';
//                                                    foreach($answer->surveyTransactions as $surveyTransaction)
//                                                    {
//                                                        if($surveyTransaction->Answer_Id == $answerId && $surveyTransaction->Question_Id == $questionId)
//                                                        {
//                                                            $textAns = $surveyTransaction->Answer_Value;
//                                                            break;
//                                                        }
//                                                    }
                                            
                                    ?>
<!--                                            <div class="col-sm-12 clearfix">
                                                <label class="col-sm-3 control-label no-padding-left"><?php echo $answer->Answer_Name ?></label>
                                                <div class="col-sm-9">
                                                    <?php 
                                                        foreach($question->gridAnswers as $ansKey => $column)
                                                        {  
                                                            $answerId = $column->Grid_Answer_Id;
                                                            if($column->Field_Type == "column")
                                                            {
                                                    ?>
                                                                
                                                                <input  <?php echo $disabled ?> name="AnswerOptions[<?php echo $questionId ?>][<?php echo $rowId; ?>][<?php echo $answerId ?>]" type="<?php echo $question->controlType->Control_Type_Name ?>" value="<?php echo $textAns ?>" class="col-xs-10 col-sm-3">
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                                <br>
                                                <br>
                                            </div>
                                    -->
                                    <?php
//                                                }
//                                            }
                                    }
                                    ?>
                                    
                                    <?php
                                        
                                        if(!empty($question->answers))
                                        {
                                            
                                            $tempArray = (array)$question->answers;
                                            $dropdownFlag = 1;
                                            $options = ['class' => 'ace'];
                                            $disabled = '';
                                            
                                            if($survey->Survey_Status == 3)
                                            {
                                                $disabled = ' disabled ';
                                                $options['disabled'] = 'disabled';
                                            }
//                                            prd($question);
//                                            if(!empty($answer->surveyTransactions[0]))
//                                            {
//                                                $answers = explode(',', $answer->surveyTransactions[0]->Answers);
//                                                echo  Html::input('hidden', 'AnswerOptions[DetailsId]['.$questionId.']', $answer->surveyTransactions[0]->SurveyDetail_ID, ['class' => '']) ;
//                                                
//                                            }
                                            
                                            echo  Html::input('hidden', 'SurveyId', $survey->Survey_Id, ['class' => '']) ;
                                            $questionType = strtolower($question->controlType->Control_Type_Name);
                                            
                                            
                                            
                                            foreach($question->answers as $ansKey => $answer)
                                            {    
                                                
                                                
                                                
                                                $answerId = $answer->Answer_Id;
                                                $inputType = ['Checkbox', 'Radio'];
                                                $inputText = ['Checkbox', 'Radio'];
                                                $inputDropDown = ['Checkbox', 'Radio'];
                                                
                                                unset($options['checked']);
                                                
                                                
                                                if( $questionType == "checkbox")
                                                {
                                                    
                                                    foreach($answer->surveyTransactions as $surveyTransaction)
                                                    {
                                                        if($surveyTransaction->Answer_Id == $answerId && $surveyTransaction->Question_Id == $questionId)
                                                        {
                                                            $options['checked'] = 'chekced';
                                                            break;
                                                        }
                                                    }
                                                    
//                                                    if(!empty($answer->surveyTransactions[$ansKey]))
//                                                    {
//                                                        $surveyObj = $answer->surveyTransactions[$ansKey];
//                                                        if($surveyObj->Answer_Id == $answerId && $surveyObj->Question_Id == $questionId)
//                                                            $options['checked'] = 'chekced';
//                                                    }
                                                        
                                                        
                                                ?>
                                                    <div class="checkbox clearfix">
                                                        <label class="line-height-1 ">
                                                            <?php 
                                                                $controlType = strtolower($question->controlType->Control_Type_Name);
                                                            ?>
                                                            <?= Html::input($controlType, 'AnswerOptions['.$questionId.']['.$answerId.']', $answerId, $options) ?>
                                                            <span class="lbl"> <?php echo $answer->Answer_Name ?></span>
                                                        </label>
<!--                                                                <input name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->controlType->Control_Type_Name ?>" value=""><?php echo $answer->Answer_Name ?></label>-->
                                                    </div>
                                                <?php
                                                }
                                                else if($questionType == "radio button" )
                                                {
                                                    
                                                    
                                                    foreach($answer->surveyTransactions as $surveyTransaction)
                                                    {
                                                        
                                                        if($surveyTransaction->Answer_Id == $answerId && $surveyTransaction->Question_Id == $questionId)
                                                        {
                                                            $options['checked'] = 'chekced';
                                                            break;
                                                        }
                                                    }
                                                ?>
                                                    <div class="radio clearfix">
                                                            <label class="line-height-1 ">
                                                                <?php 
                                                                    $controlType = strtolower($question->controlType->Control_Type_Name);
                                                                ?>
                                                                <?= Html::input('radio', 'AnswerOptions['.$questionId.']["radio"]', $answerId, $options) ?>
                                                                <span class="lbl"> <?php echo $answer->Answer_Name ?></span>
                                                            </label>
<!--                                                                <input name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->controlType->Control_Type_Name ?>" value=""><?php echo $answer->Answer_Name ?></label>-->
                                                    </div>
                                                <?php
                                                }
                                                else if($questionType == "radio buttons with no textbox" )
                                                {
                                                    
                                                    
                                                    foreach($answer->surveyTransactions as $surveyTransaction)
                                                    {
                                                        
                                                        if($surveyTransaction->Answer_Id == $answerId && $surveyTransaction->Question_Id == $questionId)
                                                        {
                                                            $options['checked'] = 'chekced';
                                                            break;
                                                        }
                                                    }
                                                ?>
                                                    <div class="radio clearfix">
                                                            <label class="line-height-1 ">
                                                                <?php 
                                                                    $controlType = strtolower($question->controlType->Control_Type_Name);
                                                                ?>
                                                                <?= Html::input('radio', 'AnswerOptions['.$questionId.']["radio"]', $answerId, $options) ?>
                                                                <span class="lbl"> <?php echo $answer->Answer_Name ?></span>
                                                            </label>
<!--                                                                <input name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->controlType->Control_Type_Name ?>" value=""><?php echo $answer->Answer_Name ?></label>-->
                                                    </div>
                                                <?php
                                                }
                                                else if($questionType == 'textbox' )
                                                {
                                                    $textAns = '';
                                                    
                                                    foreach($answer->surveyTransactions as $surveyTransaction)
                                                    {
                                                        if($surveyTransaction->Answer_Id == $answerId && $surveyTransaction->Question_Id == $questionId)
                                                        {
                                                            $textAns = $surveyTransaction->Answer_Value;
                                                            break;
                                                        }
                                                    }
                                                ?>
                                                    <div class="col-sm-12 clearfix">
                                                        <label class="col-sm-3 control-label no-padding-left"><?php echo $answer->Answer_Name ?></label>
                                                        <div class="col-sm-9">
                                                            <input  <?php echo $disabled ?> name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->controlType->Control_Type_Name ?>" value="<?php echo $textAns ?>" class="col-xs-10 col-sm-5">
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>
                                                <?php   
                                                }
                                                else if($questionType == 'gridasdf' )
                                                {
                                                    
                                                    
                                                    $textAns = '';
                                                    foreach($answer->surveyTransactions as $surveyTransaction)
                                                    {
                                                        if($surveyTransaction->Answer_Id == $answerId && $surveyTransaction->Question_Id == $questionId)
                                                        {
                                                            $textAns = $surveyTransaction->Answer_Value;
                                                            break;
                                                        }
                                                    }
                                                ?>
                                                    <div class="col-sm-12 clearfix">
                                                        <label class="col-sm-3 control-label no-padding-left"><?php echo $answer->Answer_Name ?></label>
                                                        <div class="col-sm-9">
                                                            <input  <?php echo $disabled ?> name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->controlType->Control_Type_Name ?>" value="<?php echo $textAns ?>" class="col-xs-10 col-sm-5">
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>
                                                <?php   
                                                }
                                                
                                                else if($questionType == 'textarea' )
                                                {
                                                    $textAns = '';
                                                     $textAns = '';
                                                    foreach($answer->surveyTransactions as $surveyTransaction)
                                                    {
                                                        if($surveyTransaction->Answer_Id == $answerId && $surveyTransaction->Question_Id == $questionId)
                                                        {
                                                            $textAns = $surveyTransaction->Answer_Value;
                                                            break;
                                                        }
                                                    }
                                                ?>
                                                    <div class="input- clear clearfix">
<!--                                                        <label><?php echo $answer->Answer_Name ?></label><br>-->
                                                        <div class="col-sm-4 clear clearfix">
                                                            <textarea <?php echo $disabled ?>  class="autosize-transition form-control" name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]"><?php echo trim($textAns); ?></textarea>
                                                            <br>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                <?php    
                                                }
                                                
                                                else if($questionType == 'selectbox' )
                                                {
                                                    $selected = '';
//                                                    prd($answer->surveyTransactions);
                                                    foreach($answer->surveyTransactions as $surveyTransaction)
                                                    {
//                                                        echo $answerId;
//                                                        echo $surveyTransaction->Answer_Id;
//                                                        echo '<br>'.$surveyTransaction->Question_Id;
//                                                        echo ''.$questionId;
                                                        
                                                        if($surveyTransaction->Answer_Id == $answerId && $surveyTransaction->Question_Id == $questionId)
                                                        {
                                                            
                                                            
                                                            $selected = 'selected="selected"';
                                                            break;
                                                        }
                                                    }
                                                            
                                                    
                                                 ?>
                                                    
                                                        <?php if($dropdownFlag == 1) : ?>
                                                        
                                                            <div class="col-sm-6 clear clearfix">
                                                                <select <?php echo $disabled ?>  name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" class="input-medium col-sm-4 checkbox">
                                                        <?php endif; ?>
                                                                    <option value="<?php echo $answerId ?>" <?= $selected ?>><?php echo $answer->Answer_Name ?></option>
                                                        <?php if($dropdownFlag == count(ArrayHelper::toArray($question->answers))) : ?>
                                                                </select>
                                                                
                                                               
                                                            </div>
                                                            
                                                        <?php endif; ?>
                                                    
                                                <?php   
                                                    
                                                }
                                                $dropdownFlag++;
                                            }
                                        }
                                    ?>
                                    <?php Html::input('hidden', 'Question['.$questionId.']', $questionId, ['class' => '']) ?>
                                    <?php Html::input('hidden', 'Answer['.$questionId.']', '', ['class' => '']) ?>
                                    <?php echo  Html::input('hidden', 'Next[] ', $id + 1, ['class' => 'int-next']) ?>
                                    <?php
                                        
                                        if(!empty($id) && $id  != '1')
                                        {
                                           echo  Html::input('hidden', 'Prev[] ', $id - 1, ['class' => 'int-prev']) ;
                                        }
                                    ?>
                            </div>
                                <?php
                                $count++;
                                $categoryId = $question->Category_Id;
                            }
                            ?>
                        <?php
//                            echo $survey->Survey_Status;
//                            echo $total.'<br>';
//                            echo $questionCount;
//                            prd($questionLeft['questions']);
                            
                        ?>
                        <?php if(!empty($questionLeft['questions']) && $questionCount == $total && $survey->Survey_Status != 3 ): ?>
                        <div class="alert alert-warning col-xs-12" data-hide='hide'>
                            <strong>*</strong> Please answer all unanswered questions.
                        </div>
                        <br>
                        <br>
                        <?php endif; ?>
                    </div>
                    <br>
                    <br>
                    <br>
                    <!--Button Area Start-->
                    <div class="row-fluid">
                        <div class="pull-left">
                            <?php if(!empty($id) && $id  != '1'): ?>  
                            <a  class="btn btn-primary svy-prev">Prev </a>
                            <span class="hidden">
                                <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                            </span> 
                            <?php endif; ?>
                        </div>
                        <?php 

                        ?>
                        <?php if($questionCount == $total ): ?>
                        <?php
                            $submitDis = 'disabled="disabled"';
                            if(empty($questionLeft['questions']))
                            {
                                $submitDis = '';
                            }
                        ?>
                        <div class="pull-right">
                            <span class="hidden">
                                <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                            </span> 
                            <?php if($survey->Survey_Status != 3): ?>
                            <span class="save-btn-cnt">
                                <span class="hidden">
                                    <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                                </span>
                                <a  class="btn btn-primary svy-save">Save </a>
                            </span>
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/survey/preview/<?php echo $programId ?>" class="btn btn-primary svy-preview ">Preview</a>
                            <?php endif; ?>
                            <?php if($survey->Survey_Status != 3): ?>
                            <button <?php // echo $submitDis; ?>   class="btn btn-primary svy-submit">Submit</button>
                            <?php endif; ?>
                            <?php if($survey->Survey_Status == 3): ?>
                            <a target="_blank"  href="<?php echo Yii::$app->request->baseUrl; ?>/survey/export/<?php echo $programId ?>" class="btn btn-primary svy-export">Export</a>
                            <?php endif; ?>
                            
                        </div>
                        
                        <?php endif; ?>
                        <?php if(!empty($id) && $questionCount != $total): ?>
                                   
                        <div class="pull-right">
                            <span class="hidden">
                                <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                            </span> 
                            <a  class="btn btn-primary svy-next">Next</a>
                        </div>
                        
                        <?php endif; ?>
                    </div>
                    <?= Html::endForm() ?>
                    <?php Pjax::end(); ?>
                    
                    
                    

                    <br>
                    <br>
                    <br>
                    <!-- Popup Start -->
                    <?php
                            yii\bootstrap\Modal::begin([
                                'id' =>'confirmPopup',
                                'header' => '<h2>Confirmation?</h2>',
                                ]);
//                            yii\bootstrap\Modal::
                    ?>
                        <div class="row-fluid">
                            <h4>Are you sure you want to submit the survey? once submitted, you will not be allowed to update any information.</h4>
                            <br>
                            <br>
                             <div class="pull-">
                                <a  class="btn btn-primary svy-submit-save">Ok</a>
                                <a  class="btn btn-primary svy-cancel">Cancel</a>
                                
                            </div>
                            <div class="clearfix clear"></div>
                        </div>    
                    <?php
                        yii\bootstrap\Modal::end();
                    ?>
                    
                    
                    <!-- Popup End -->
            </div>
      </div>  

        <div class="row-fluid">
            <div class="pull-right">
<!--                <a  class="btn btn-primary svy-next" href="<?php echo Yii::$app->request->baseUrl; ?>/survey/index/1/">Next</a>-->
            </div>
        </div>
    </div>
</div>

<?php
    
    $this->registerJs(''
            . '$(".dropdown-modal").click(function(){ $(this).toggleClass("open")});'
            . '$("body").on("click", ".svy-next", function(){'
                . '
                    $(this).parents(".pull-right").find("span").removeClass("hidden");
                    $(".svy-next, .svy-prev").attr("disabled", true);
                    var action = $(".int-next").parents("form").attr("action");
//                    $(".int-next").parents("form").attr("action", action + "/" + $(".int-next").val())
                    $(".int-next").parents("form").attr("action", action.slice(0,-1)  + $(".int-next").val())
                    $(".int-next").parents("form").submit();
                    '."flashMsg();"
                    
            
            . '}); '
            
            . '$("body").on("click", ".svy-save", function(){'
                . '
                    $(this).parents(".save-btn-cnt").find("span").removeClass("hidden");
                    $(".svy-next, .svy-prev, .svy-submit, .svy-preview, .svy-save").attr("disabled", true);
                    var id =   parseInt( $(".int-prev").val()) + 1;
                    var action = $(".int-next").parents("form").attr("action");
                    $(".int-next").parents("form").attr("action", action)
                    $(".int-next").parents("form").submit();
                    flashMsg();
                    return false;
                   '
            . '}); '
            
            . '$("body").on("click", ".svy-prev", function(){'
                . '
                    $(this).parents(".pull-left").find("span").removeClass("hidden");
                    $(".svy-next, .svy-prev").attr("disabled", true); 
                    var action = $(".int-next").parents("form").attr("action");
//                    $(".int-next").parents("form").attr("action", action + "/" + $(".int-prev").val())
                    $(".int-next").parents("form").attr("action", action.slice(0,-1) + $(".int-prev").val())
                    $(".int-next").parents("form").submit();
                    flashMsg();
                   '
            . '}); '
            
            . " $('body').on('click','.svy-submit',function(e) {
                    
                    e.preventDefault();
                    ".''
            . 'var error_msg = $("div[data-hide=hide]").length;
                    var surveyId = $("input[name=SurveyId]").val();
                    if(error_msg == 1)
                    {
                        $.ajax({
                            method: "POST",
                            url: "'.Yii::$app->request->baseUrl.'/survey/take-count/",
                            data: { surveyId: surveyId },
                            success: function(data)
                            {
                                if(data >= 1)
                                {
                                    $("div[data-hide=hide]").slideDown();
                                }
                                else
                                {
                                   '
                                . "".'
                                }
                            }
                        });
                        
                        return false;
                    }
                    else
                    {
                        $("#confirmPopup").modal("show");
                    }'
            . ''."
//                    
                }); 
                
                $('.svy-cancel').click(function(e) {
                    e.preventDefault();
                    $('#confirmPopup').modal('hide');
                }); 
                $('.svy-export').click(function(e) {
                    e.preventDefault();
                    window.open($(this).attr('href'), '_blank'); 
                    return false;
                     
                }); 
                
                
                   $('body').on('click', '.svy-submit-save', function(){
                   ".'
                        var $this = $(this);
                        $this.parent().find(".hidden-spinner").remove();
                        var spinner = \'<span class="hidden-spinner"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>\';

                        $this.before(spinner);
                        $this.attr("disabled", true);'."
                        var surveyId = $('input[name=SurveyId]').val();
                        $.ajax({
                           method: 'POST',
                            url: '".Yii::$app->request->baseUrl."/survey/survey-submit/',
                            data: { id:  surveyId},
                            success: function(data)
                            {
                                window.location = window.location.href;
                               
                            },
                            
                            error: function(err) {
                                alert('there is error occured during saving data. Please contact to Admin.');
                                 window.location = window.location.href;
                            },
                        });
                  }); 
                  function flashMsg()
                  {
                    $.get('".Yii::$app->request->baseUrl."/survey/flash"."', function(data, status){
                        $('.alert-message-cnt').html(data);
                        setTimeout(function(){
                            $('.alert').find('.close').trigger('click')
                        }, 2000);
                    });
                  }
                "
            . '', \yii\web\VIEW::POS_READY);
?>


