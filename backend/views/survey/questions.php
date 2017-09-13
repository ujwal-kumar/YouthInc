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
                        foreach($questions as $question)
                        {
                            $questionId = $question->Question_ID;
                            ?>
                            <div class="form-group ">
                                    <label for="comment"><?php  echo '<b>Q'. ( $count + $limit + $id).'. '. $question->QuestionName.'</b>' ?></label>
                                    <?php
                                        if(!empty($question->answerMasters))
                                        {
                                            $tempArray = (array)$question->answerMasters;
                                            $dropdownFlag = 1;
//                                            prd($question->surveyDetails[0]);
                                            if(!empty($question->surveyDetails[0]))
                                            {
                                                $answers = explode(',', $question->surveyDetails[0]->Answers);
                                                echo  Html::input('hidden', 'AnswerOptions[DetailsId]['.$questionId.']', $question->surveyDetails[0]->SurveyDetail_ID, ['class' => '']) ;
                                            }
                                            foreach($question->answerMasters as $answer)
                                            {    
                                                $answerId = $answer->Answer_ID;
                                                $inputType = ['Checkbox', 'Radio'];
                                                $inputText = ['Checkbox', 'Radio'];
                                                $inputDropDown = ['Checkbox', 'Radio'];
                                                
                                                
                                                $options = ['class' => ''];
                                                
                                                if( $question->ControlType == "Checkbox")
                                                {
                                                    $options = ['class' => 'ace'];
                                                    
                                                    if(!empty($answers) && in_array($answerId, $answers))
                                                        $options['checked'] = 'chekced';
                                                        
                                                ?>
                                                    <div class="checkbox">
                                                        <label class="line-height-1 ">
                                                            <?php 
                                                                $controlType = strtolower($question->ControlType);
                                                            ?>
                                                            <!--<span style="background: #000"> &#x2610;</span>--> 
                                                                <?= Html::input($controlType, 'AnswerOptions['.$questionId.']['.$answerId.']', $answerId, $options) ?>
                                                            <span class="lbl"><?php echo $answer->AnswerName ?></span>
                                                        </label>
<!--                                                                <input name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->ControlType ?>" value=""><?php echo $answer->AnswerName ?></label>-->
                                                    </div>
                                                <?php
                                                }
                                                else if($question->ControlType == "Radio" )
                                                {
                                                    $options = ['class' => 'ace'];
                                                    
                                                    if(!empty($answers[0]))
                                                        if($answers[0] == $answerId)
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
//                                                    echo $dropdownFlag;
                                                    if($answers[$dropdownFlag-1] == $answerId)
                                                    {
                                                        $textAnsArr = (explode('-', $answers[$dropdownFlag-1]));
                                                        if(!empty($textAnsArr[1]))
                                                            $textAns = $textAnsArr[1];
                                                    }
                                                ?>
                                                    <div class="input-lg">
                                                        <label class="col-sm-3 control-label no-padding-right"><?php echo $answer->AnswerName ?></label>
                                                        <div class="col-sm-9">
                                                            <input name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>-]" type="<?php echo $question->ControlType ?>" value="<?php echo $textAns ?>" class="col-xs-10 col-sm-5">
                                                        </div>
                                                            
                                                    </div>
                                                <?php   
                                                }
                                                
                                                else if($question->ControlType == 'TextArea' )
                                                {
                                                    $textAns = '';
//                                                    echo $dropdownFlag;
                                                    if($answers[$dropdownFlag-1] == $answerId)
                                                    {
                                                        $textAnsArr = (explode('-', $answers[$dropdownFlag-1]));
                                                        if(!empty($textAnsArr[1]))
                                                            $textAns = $textAnsArr[1];
                                                    }
                                                ?>
                                                    <div class="input- clear clearfix">
<!--                                                        <label><?php echo $answer->AnswerName ?></label><br>-->
                                                        <textarea cols="5" rows="10" class="comment input-xlarge col-xs-12 col-sm-8" name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>-]">
                                                            <?php echo $textAns; ?>
                                                        </textarea>
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
                                                        
                                                            <div class="input-lg">
                                                                <select name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" class="input-medium">
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
                        
                        <?php if(!empty($id)): ?>
                                   
                        <div class="pull-right">
                            <a  class="btn btn-primary svy-next">Next</a>
                        </div>
                        
                        <?php endif; ?>
                    </div>

                    <br>
                    <br>
                    <br>
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
            . '}) '
            . '', \yii\web\VIEW::POS_READY);
?>


