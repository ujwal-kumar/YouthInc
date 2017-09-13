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
                <h2 style="text-align: center">ORGANIZATIONAL PROFILE</h2>
                    <br>
                    <br>
                    <br>
                    <?php // Pjax::begin(); ?>
                    <?= Html::beginForm(['survey/index'], 'post',['data-pjax' => '', 'id' => 'surveyForm'], ['enctype' => 'multipart/form-data']) ?>
                    <div class="row-fluid servey-form">
                        <?php
                        /* @var $this yii\web\View */

//                        prd($questions);
                        $count = 1;
                        $questionCount = 0;
                        foreach($questions as $question)
                        {
                            $questionId = $question->Question_ID;
                            $questionCount = $count + $limit;
                            ?>
                            <div class="control-group clearfix">
                                    <label class="control-label bolder col-sm-12"><?php  echo '<b>Q'. ( $questionCount ).'. '. $question->QuestionName.'</b>' ?></label>
                                    <?php
                                        if(!empty($question->answerMasters))
                                        {
                                            $tempArray = (array)$question->answerMasters;
                                            $dropdownFlag = 1;
                                            $options = ['class' => 'ace'];
                                            $disabled = '';
                                            
                                            if($survey[0]->SurveyStatus == 'Completed')
                                            {
                                                $disabled = ' disabled ';
                                                $options['disabled'] = 'disabled';
                                            }
//                                            prd($question);
                                            if(!empty($question->surveyDetails[0]))
                                            {
                                                $answers = explode(',', $question->surveyDetails[0]->Answers);
                                                echo  Html::input('hidden', 'AnswerOptions[DetailsId]['.$questionId.']', $question->surveyDetails[0]->SurveyDetail_ID, ['class' => '']) ;
                                                
                                            }
                                             
                                            echo  Html::input('hidden', 'SurveyId', $survey[0]->Survey_ID, ['class' => '']) ;
                                            foreach($question->answerMasters as $answer)
                                            {    
                                                $answerId = $answer->Answer_ID;
                                                $inputType = ['Checkbox', 'Radio'];
                                                $inputText = ['Checkbox', 'Radio'];
                                                $inputDropDown = ['Checkbox', 'Radio'];
                                                
                                                unset($options['checked']);
                                                
                                                
                                                if( $question->ControlType == "Checkbox")
                                                {
                                                    
                                                    
                                                    if(!empty($answers) && in_array($answerId, $answers))
                                                        $options['checked'] = 'chekced';
                                                        
                                                ?>
                                                    <div class="checkbox clearfix">
                                                        <label class="line-height-1 ">
                                                            <?php 
                                                                $controlType = strtolower($question->ControlType);
                                                            ?>
                                                            <?= Html::input($controlType, 'AnswerOptions['.$questionId.']['.$answerId.']', $answerId, $options) ?>
                                                            <span class="lbl"> <?php echo $answer->AnswerName ?></span>
                                                        </label>
<!--                                                                <input name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->ControlType ?>" value=""><?php echo $answer->AnswerName ?></label>-->
                                                    </div>
                                                <?php
                                                }
                                                else if($question->ControlType == "Radio" )
                                                {
                                                    
                                                    
                                                    if(!empty($answers[0]))
                                                        if($answers[0] == $answerId)
                                                            $options['checked'] = 'chekced';
                                                ?>
                                                    <div class="radio clearfix">
                                                            <label class="line-height-1 ">
                                                                <?php 
                                                                    $controlType = strtolower($question->ControlType);
                                                                ?>
                                                                <?= Html::input('radio', 'AnswerOptions['.$questionId.']["radio"]', $answerId, $options) ?>
                                                                <span class="lbl"> <?php echo $answer->AnswerName ?></span>
                                                            </label>
<!--                                                                <input name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->ControlType ?>" value=""><?php echo $answer->AnswerName ?></label>-->
                                                    </div>
                                                <?php
                                                }
                                                else if($question->ControlType == 'TextBox' )
                                                {
                                                    $textAns = '';
                                                   if(!empty($question->surveyDetails[0]) && !empty($answers[$dropdownFlag-1]))
                                                    {
                                                        if($answers[$dropdownFlag-1] == $answerId)
                                                        {
                                                            $textAnsArr = (explode('-', $answers[$dropdownFlag-1]));
                                                            if(!empty($textAnsArr[1]))
                                                                $textAns = $textAnsArr[1];
                                                        }
                                                    }
                                                ?>
                                                    <div class="col-sm-12 clearfix">
                                                        <label class="col-sm-3 control-label no-padding-right"><?php echo $answer->AnswerName ?></label>
                                                        <div class="col-sm-9">
                                                            <input  <?php echo $disabled ?> name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>-]" type="<?php echo $question->ControlType ?>" value="<?php echo $textAns ?>" class="col-xs-10 col-sm-5">
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div>
                                                <?php   
                                                }
                                                
                                                else if($question->ControlType == 'TextArea' )
                                                {
                                                    $textAns = '';
                                                  if(!empty($question->surveyDetails[0]))
                                                    {
                                                        if($answers[$dropdownFlag-1] == $answerId)
                                                        {
                                                            $textAnsArr = (explode('-', $answers[$dropdownFlag-1]));
                                                            if(!empty($textAnsArr[1]))
                                                                $textAns = $textAnsArr[1];
                                                        }
                                                    }
                                                ?>
                                                    <div class="input- clear clearfix">
<!--                                                        <label><?php echo $answer->AnswerName ?></label><br>-->
                                                        <div class="col-sm-4 clear clearfix">
                                                            <textarea <?php echo $disabled ?>  class="autosize-transition form-control" name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>-]"><?php echo trim($textAns); ?></textarea>
                                                             
                                                            <br>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                <?php    
                                                }
                                                
                                                else if($question->ControlType == 'Dropdown' )
                                                {
                                                    $selected = '';
                                                    if(!empty($answers[0]))
                                                        if($answers[0] == $answerId)
                                                            $selected = 'selected="selected"';
                                                    
                                                 ?>
                                                    
                                                        <?php if($dropdownFlag == 1) : ?>
                                                        
                                                            <div class="col-sm-6 clear clearfix">
                                                                <select <?php echo $disabled ?>  name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" class="input-medium col-sm-4 checkbox">
                                                        <?php endif; ?>
                                                                    <option value="<?php echo $answerId ?>" <?= $selected ?>><?php echo $answer->AnswerName ?></option>
                                                        <?php if($dropdownFlag == count(ArrayHelper::toArray($question->answerMasters))) : ?>
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
                                    <?php echo  Html::input('hidden', 'Next[]', $id + 1, ['class' => 'int-next']) ?>
                                    <?php
                                    if(!empty($id))
                                    {
                                       echo  Html::input('hidden', 'Prev[]', $id - 1, ['class' => 'int-prev']) ;
                                    }
                                    ?>
                            </div>
                                <?php
                                $count++;
                            }
                            ?>
                        <?php
//                            echo $survey[0]->SurveyStatus;
//                            echo $total.'<br>';
//                            echo $questionCount;
//                            prd($questionLeft['questions']);
                            
                        ?>
                        <?php if(!empty($questionLeft['questions']) && $questionCount == $total && $survey[0]->SurveyStatus != 'Completed' ): ?>
                        <div class="alert alert-warning col-xs-12" data-hide='hide' style="">
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
                            <a  class="btn btn-primary svy-prev">Prev</a>
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
                            <?php if($survey[0]->SurveyStatus != 'Completed'): ?>
                            <a  class="btn btn-primary svy-save">Save</a>
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/survey/preview" class="btn btn-primary ">Preview</a>
                            <?php endif; ?>
                            <?php if($survey[0]->SurveyStatus != 'Completed'): ?>
                            <button <?php echo $submitDis; ?>   class="btn btn-primary svy-submit">Submit</button>
                            <?php endif; ?>
                        </div>
                        
                        <?php endif; ?>
                        <?php if(!empty($id) && $questionCount != $total): ?>
                                   
                        <div class="pull-right">
                            <a  class="btn btn-primary svy-next">Next</a>
                        </div>
                        
                        <?php endif; ?>
                    </div>
                    <?= Html::endForm() ?>
                    <?php // Pjax::end(); ?>
                    
                    
                    

                    <br>
                    <br>
                    <br>
                    <!-- Popup Start -->
                    <?php
                            yii\bootstrap\Modal::begin([
                                'id' =>'confirmPopup',
                                'header' => '<h2>Are you sure you want to submit the survey?</h2>',
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
                    var action = $(".int-next").parents("form").attr("action");
                    $(".int-next").parents("form").attr("action", action + "/" + $(".int-next").val())
                    $(".int-next").parents("form").submit();
                    $.ajax({
                        method: "POST",
                        url: "'.Yii::$app->request->baseUrl.'/survey/index/3",
                        data: { id: 2, surveyData: $("#surveyForm").serializeArray() },
                        success: function(data)
                        {
//                            $(".page-content").parent().html(data);
                        }
                    }); '
            . '}); '
            . '$("body").on("click", ".svy-save", function(){'
                . '
                    var error_msg = $("div[data-hide=hide]").length;
                    if(error_msg == 1)
                    {
                        $("div[data-hide=hide]").slideDown();
                        return false;
                    }
                    else
                    {
                        var id =   parseInt( $(".int-prev").val()) + 1;
                        var action = $(".int-next").parents("form").attr("action");
                        $(".int-next").parents("form").attr("action", action + "/" + id)
                        $(".int-next").parents("form").submit();
                    }
                    return false;
                   '
            . '}); '
            . '$("body").on("click", ".svy-prev", function(){'
                . '
                    var action = $(".int-next").parents("form").attr("action");
                    $(".int-next").parents("form").attr("action", action + "/" + $(".int-prev").val())
                    $(".int-next").parents("form").submit();
                   '
            . '}); '
//            . '$("body").on("click", ".svy-save", function(){'
//                . '
//                    var action = $(".int-next").parents("form").attr("action");
//                    $(".int-next").parents("form").attr("action", action  )
//                    $(".int-next").parents("form").submit();
//                   '
//            . '}); '
            . " $('.svy-submit').click(function(e) {
                    e.preventDefault();
                    $('#confirmPopup').modal('show');
                  }); $('.svy-cancel').click(function(e) {
                    e.preventDefault();
                    $('#confirmPopup').modal('hide');
                  }); 
                
                   $('body').on('click', '.svy-submit-save', function(){
                        var surveyId = $('input[name=SurveyId]').val();
                        $.ajax({
                           method: 'POST',
                            url: '".Yii::$app->request->baseUrl."/survey/survey-submit/',
                            data: { id:  surveyId},
                            success: function(data)
                            {
                                location.reload();
                            }
                        });
                  }); 

                "
            . '', \yii\web\VIEW::POS_READY);
?>


