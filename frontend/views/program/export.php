<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Take Survey');
$this->params['breadcrumbs'][] = $this->title;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
                                                    {
                                                        $options['checked'] = 'chekced';
                                                        
                                                ?>
                                                    <div class="checkbox">
                                                        <label class="line-height-1 ">
                                                            <?php 
                                                                $controlType = strtolower($question->ControlType);
                                                            ?>
                                                            <?php //Html::input($controlType, 'AnswerOptions['.$questionId.']['.$answerId.']', $answerId, $options) ?>
                                                            <span class="lbl"><?php echo $answer->AnswerName ?></span>
                                                        </label>
<!--                                                                <input name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->ControlType ?>" value=""><?php echo $answer->AnswerName ?></label>-->
                                                    </div>
                                                <?php
                                                }
                                                }
                                                else if($question->ControlType == "Radio" )
                                                {
                                                    
                                                    $options = ['class' => 'ace'];
                                                    
                                                    if(!empty($answers[0]))
                                                    {
                                                        if($answers[0] == $answerId)
                                                        {
                                                            $options['checked'] = 'chekced';
                                                ?>
                                                    <div class="radio">
                                                            <label class="line-height-1 ">
                                                                <?php 
                                                                    $controlType = strtolower($question->ControlType);
                                                                ?>
                                                                <?php //Html::input('radio', 'AnswerOptions['.$questionId.']["radio"]', $answerId, $options) ?>
                                                                <span class="lbl"><?php echo $answer->AnswerName ?></span>
                                                            </label>
<!--                                                                <input name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" type="<?php echo $question->ControlType ?>" value=""><?php echo $answer->AnswerName ?></label>-->
                                                    </div>
                                                <?php
                                                        }
                                                    }
                                                }
                                                else if($question->ControlType == 'TextBox' )
                                                {
                                                    
                                                    $textAns = '';
//                                                    echo $dropdownFlag;
                                                     if(!empty($question->surveyDetails[0]) && !empty($answers[$dropdownFlag-1]))
                                                    {
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
                                                            <?php echo $textAns ?>
                                                        </div>
                                                            
                                                    </div>
                                                <?php   
                                                    }
                                                }
                                                
                                                else if($question->ControlType == 'TextArea' )
                                                {
                                                    $textAns = '';
//                                                    echo $dropdownFlag;
                                                    if(!empty($question->surveyDetails[0]) && !empty($answers[$dropdownFlag-1]))
                                                    {
                                                    if($answers[$dropdownFlag-1] == $answerId)
                                                    {
                                                        $textAnsArr = (explode('-', $answers[$dropdownFlag-1]));
                                                        if(!empty($textAnsArr[1]))
                                                            $textAns = $textAnsArr[1];
                                                    
                                                ?>
                                                    <div class="input- clear clearfix">
<!--                                                        <label><?php echo $answer->AnswerName ?></label><br>-->
                                                        <!--<textarea class="comment input-xlarge col-xs-12 col-sm-8" name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>-]">-->
                                                            <?php echo $textAns; ?>
                                                        <!--</textarea>-->
                                                    </div>
                                                <?php  
                                                    }
                                                    
                                                }}
                                                
                                                else if($question->ControlType == 'Dropdown' )
                                                {
                                                   
                                                    $selected = '';
                                                    if(!empty($answers[0]))
                                                        if($answers[0] == $answerId)
                                                        {
                                                            $selected = 'selected="selected"';
                                                    
                                                 ?>
                                                    
                                                        <?php if($dropdownFlag == 1) : ?>
                                                        
                                                            <div class="input-lg">
                                                                <!--<select name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" class="input-medium">-->
                                                        <?php endif; ?>
                                                                    <?php echo $answer->AnswerName ?>
                                                        <?php if($dropdownFlag == count(ArrayHelper::toArray($question->answerMasters))) : ?>
                                                                <!--</select>-->
                                                            </div>
                                                        
                                                        <?php endif; ?>
                                                    
                                                <?php  
                                                        }
                                                        
                                                        
                                                        
                                                    
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
                   
            </div>
      </div>  

        <div class="row-fluid">
            <div class="pull-right">
<!--                <a  class="btn btn-primary svy-next" href="<?php echo Yii::$app->request->baseUrl; ?>/survey/index/1/">Next</a>-->
            </div>
        </div>
    </div>
</div>




