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
                    <?= Html::beginForm(['survey/index'], 'post',['id' => 'surveyForm'], ['enctype' => 'multipart/form-data']) ?>
                    <div class="row-fluid servey-form">
                        <?php
                        /* @var $this yii\web\View */

//                        prd($questions);
                        $count = 1;
                        $questionCount = 0;
                        foreach($questions as $question)
                        {
//                            prd($question);
                            $questionId = $question->Question_ID;
                            $questionCount = $count + $limit;
                            ?>
                            <div class="form-group ">
                                    <label for="comment"><?php  echo '<b>Q'. ( $questionCount ).'. '. $question->QuestionName.'</b>' ?></label>
                                    <?php
                                        if(!empty($question->answerMasters))
                                        {
                                            $tempArray = (array)$question->answerMasters;
                                            $dropdownFlag = 1;
                                            $options = ['class' => 'ace'];
                                            $disabled = '';
                                            
                                            if($survey[0]->SurveyStatus == 'Completed')
                                            {
                                                $disabled = 'disabled="disabled"';
                                                $options['disabled'] = 'disabled';
                                            }
                                            $serveyId = 0;
                                            $recordServeyId = 0;
                                            if(!empty($question->surveyDetails[0]))
                                            {
                                                $answers = explode(',', $question->surveyDetails[0]->Answers);
                                                
                                                
                                                
                                                $recordServeyId =  $survey[0]->Survey_ID;
                                                $serveyId = (int)($question->surveyDetails[0]->Survey_ID);
                                                echo $recordServeyId;
                                                echo $serveyId;
                                                if($serveyId == $recordServeyId)
                                                    echo  Html::input('hidden', 'AnswerOptions[DetailsId]['.$questionId.']', $question->surveyDetails[0]->SurveyDetail_ID, ['class' => '']) ;
                                                
                                            }
                                             
                                            echo  Html::input('hidden', 'SurveyId', $survey[0]->Survey_ID, ['class' => '']) ;
                                            foreach($question->answerMasters as $answer)
                                            {    
//                                                prd($answer);
                                                $answerId = $answer->Answer_ID;
                                                $inputType = ['Checkbox', 'Radio'];
                                                $inputText = ['Checkbox', 'Radio'];
                                                $inputDropDown = ['Checkbox', 'Radio'];
                                                
                                                unset($options['checked']);
                                                
                                                
                                                if( $question->ControlType == "Checkbox")
                                                {
                                                    
                                                    
                                                    if(!empty($answers) && in_array($answerId, $answers) && $recordServeyId == $serveyId )
                                                        $options['checked'] = 'chekced';
                                                        
                                                ?>
                                                    <div class="checkbox">
                                                        <label class="line-height-1 ">
                                                            <?php 
                                                                $controlType = strtolower($question->ControlType);
                                                            ?>
                                                            <?= Html::input($controlType, 'AnswerOptions['.$questionId.']['.$answerId.']', $answerId, $options) ?>
                                                            <span class="lbl"><?php echo $answer->AnswerName ?></span>
                                                        </label>
<!--                                                                <input name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->ControlType ?>" value=""><?php echo $answer->AnswerName ?></label>-->
                                                    </div>
                                                <?php
                                                }
                                                else if($question->ControlType == "Radio" )
                                                {
                                                    
                                                    
                                                    if(!empty($answers[0]))
                                                        if($answers[0] == $answerId && $recordServeyId == $serveyId)
                                                            $options['checked'] = 'chekced';
                                                ?>
                                                    <div class="radio">
                                                            <label class="line-height-1 ">
                                                                <?php 
                                                                    $controlType = strtolower($question->ControlType);
                                                                ?>
                                                                <?= Html::input('radio', 'AnswerOptions['.$questionId.']["radio"]', $answerId, $options) ?>
                                                                <span class="lbl"><?php echo $answer->AnswerName ?></span>
                                                            </label>
<!--                                                                <input name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->ControlType ?>" value=""><?php echo $answer->AnswerName ?></label>-->
                                                    </div>
                                                <?php
                                                }
                                                else if($question->ControlType == 'TextBox' )
                                                {
                                                    $textAns = '';
                                                   if(!empty($question->surveyDetails[0]))
                                                    {
                                                        if($answers[$dropdownFlag-1] == $answerId && $recordServeyId == $serveyId)
                                                        {
                                                            $textAnsArr = (explode('-', $answers[$dropdownFlag-1]));
                                                            if(!empty($textAnsArr[1]))
                                                                $textAns = $textAnsArr[1];
                                                        }
                                                    }
                                                ?>
                                                    <div class="input-lg">
                                                        <label class="col-sm-3 control-label no-padding-right"><?php echo $answer->AnswerName ?></label>
                                                        <div class="col-sm-9">
                                                            <input  <?php echo $disabled ?> name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>-]" type="<?php echo $question->ControlType ?>" value="<?php echo $textAns ?>" class="col-xs-10 col-sm-5">
                                                        </div>
                                                            
                                                    </div>
                                                <?php   
                                                }
                                                
                                                else if($question->ControlType == 'TextArea' )
                                                {
                                                    $textAns = '';
                                                  if(!empty($question->surveyDetails[0]))
                                                    {
                                                        if($answers[$dropdownFlag-1] == $answerId && $recordServeyId == $serveyId)
                                                        {
                                                            $textAnsArr = (explode('-', $answers[$dropdownFlag-1]));
                                                            if(!empty($textAnsArr[1]))
                                                                $textAns = $textAnsArr[1];
                                                        }
                                                    }
                                                ?>
                                                    <div class="input- clear clearfix">
<!--                                                        <label><?php echo $answer->AnswerName ?></label><br>-->
                                                        <textarea <?php echo $disabled ?>  class="comment input-xlarge col-xs-12 col-sm-8" name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>-]">
                                                            <?php echo $textAns; ?>
                                                        </textarea>
                                                    </div>
                                                <?php    
                                                }
                                                
                                                else if($question->ControlType == 'Dropdown' )
                                                {
                                                    $selected = '';
                                                    if(!empty($answers[0]))
                                                        if($answers[0] == $answerId && $recordServeyId == $serveyId)
                                                            $selected = 'selected="selected"';
                                                    
                                                 ?>
                                                    
                                                        <?php if($dropdownFlag == 1) : ?>
                                                        
                                                            <div class="input-lg">
                                                                <select <?php echo $disabled ?>  name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" class="input-medium">
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
  


                    </div>
                    <?= Html::endForm() ?>
                    <br>
                    <br>
                    <br>

                    <div class="row-fluid">
                        <div class="pull-left">
                            <a  class="btn btn-primary svy-prev">Prev</a>
                        </div>
                        
                        <?php if($questionCount == $total ): ?>
                                   
                        <div class="pull-right">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/survey/preview" class="btn btn-primary ">Preview</a>
                            <?php if($survey[0]->SurveyStatus != 'Completed'): ?>
                            <a   class="btn btn-primary svy-submit">Submit</a>
                            <?php endif; ?>
                        </div>
                        
                        <?php endif; ?>
                        <?php if(!empty($id) && $questionCount != $total): ?>
                                   
                        <div class="pull-right">
                            <a  class="btn btn-primary svy-next">Next</a>
                        </div>
                        
                        <?php endif; ?>
                    </div>

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
            . '$("body").on("click", ".svy-prev", function(){'
                . '
                    var action = $(".int-next").parents("form").attr("action");
                    $(".int-next").parents("form").attr("action", action + "/" + $(".int-prev").val())
                    $(".int-next").parents("form").submit();
                   '
            . '}); '
            . '$("body").on("click", ".svy-save", function(){'
                . '
                    var action = $(".int-next").parents("form").attr("action");
                    $(".int-next").parents("form").attr("action", action  )
                    $(".int-next").parents("form").submit();
                   '
            . '}); '
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


