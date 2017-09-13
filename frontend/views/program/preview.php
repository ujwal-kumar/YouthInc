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
                    <?= Html::beginForm(['survey/preview'], 'post',['id' => 'surveyForm'], ['enctype' => 'multipart/form-data']) ?>
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
                            <div class="control-group">
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
                                                $disabled = 'disabled="disabled"';
                                                $options['disabled'] = 'disabled';
                                            }
                                            if(!empty($question->surveyDetails[0]))
                                            {
                                                $answers = explode(',', $question->surveyDetails[0]->Answers);
                                                echo  Html::input('hidden', 'AnswerOptions[DetailsId]['.$questionId.']', $question->surveyDetails[0]->SurveyDetail_ID, ['class' => '']) ;
                                                echo  Html::input('hidden', 'SurveyId', $question->surveyDetails[0]->Survey_ID, ['class' => '']) ;
                                            }
                                            
                                            foreach($question->answerMasters as $answer)
                                            {    
                                                $answerId = $answer->Answer_ID;
                                                $inputType = ['Checkbox', 'Radio'];
                                                $inputText = ['Checkbox', 'Radio'];
                                                $inputDropDown = ['Checkbox', 'Radio'];
                                                
                                                unset($options['checked']);
//                                                $options = ['class' => ''];
                                                
                                                if( $question->ControlType == "Checkbox")
                                                {
                                                    
                                                    
                                                    if(!empty($answers) && in_array($answerId, $answers))
                                                    {
                                                        $options['checked'] = 'chekced';
//                                                        $options['disabled'] = 'disabled';
                                                    }
                                                        
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
//                                                    echo $dropdownFlag;
                                                    if($answers[$dropdownFlag-1] == $answerId)
                                                    {
                                                        $textAnsArr = (explode('-', $answers[$dropdownFlag-1]));
                                                        if(!empty($textAnsArr[1]))
                                                            $textAns = $textAnsArr[1];
                                                    }
                                                ?>
                                                    <div class="col-sm-12 clearfix">
                                                        <label class="col-sm-3 control-label no-padding-left"><?php echo $answer->AnswerName ?></label>
                                                        <div class="col-sm-9">
                                                            <input <?php echo $disabled ?> name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>-]" type="<?php echo $question->ControlType ?>" value="<?php echo $textAns ?>" class="col-xs-10 col-sm-5">
                                                        </div>
                                                        <br>
                                                        <br>    
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
                                                        <div class="col-sm-4 clear clearfix">
                                                            <textarea <?php echo $disabled ?>  class="autosize-transition form-control" name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>-]"><?php echo trim($textAns); ?></textarea>
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
                                                                <select <?php echo $disabled ?> name="AnswerOptions[<?php echo $questionId ?>][<?php echo $answerId ?>]" class="input-medium">
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
  
                        <?php if(!empty($questionLeft['questions']) ): ?>
                        <div class="alert alert-warning col-xs-12" data-hide='hide'>
                                <strong>*</strong> Please answer all unanswered questions.
                            </div>
                            <br>
                            <br>
                        <?php endif; ?>

                    </div>
                    <?= Html::endForm() ?>
                    <br>
                    <br>
                    <br>

                    <div class="row-fluid">
                        
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
                            <?php endif; ?>
                            <a targe<a target="_blank"  href="<?php echo Yii::$app->request->baseUrl; ?>/survey/export" class="btn btn-primary svy-export">Export</a>
                            <?php if($survey[0]->SurveyStatus != 'Completed'): ?>
                            <button <?php // echo $submitDis; ?>    class="btn btn-primary svy-submit">Submit</button>
                            <?php endif; ?>
                        </div>
                        
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
            .' '
            . '$("body").on("click", ".svy-save", function(){'
                . '
                    var action = $(".int-next").parents("form").attr("action");
                    $(".int-next").parents("form").attr("action", action  )
                    $(".int-next").parents("form").submit();
                   '
            . '}); '
            . " $('.svy-submit').click(function(e) {
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
                            },
                            error: function(err) {
                                alert("there is error occured during saving data. Please contact to Admin.");
                                location.reload();
                            },
                        });
                        
                        return false;
                    }
                    else
                    {
                        $("#confirmPopup").modal("show");
                    }'
            . ''." 
            }); 
                $('.svy-cancel').click(function(e) {
                    e.preventDefault();
                    $('#confirmPopup').modal('hide');
                  });"
            . " $('body').on('click', '.svy-submit-save', function(){
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
                  }); "
            . '', \yii\web\VIEW::POS_READY);
?>


