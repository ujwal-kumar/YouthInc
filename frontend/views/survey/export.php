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
                                    echo "<br><h4 class='cat-heading col-sm-12'><b>$categoryName<b></h4>";
//                                    $questionCount = 0;
//                                    $count = 1;
                                }
                            ?>
                            
                            <div class="control-group clearfix">
                                    <div class="control-label bolder col-sm-12"><br> <br><?php  echo '<b>Q'. ( $questionCount ).'. '. $question->Question_Name.'</b>' ?></div>
                                    <?php
                                        
                                        
                                        if(!empty($question->gridAnswers))
                                        {
                                            $tempArray = (array)$question->answers;
                                            $dropdownFlag = 1;
                                            $options = ['class' => 'ace'];
                                            $disabled = '';
                                            
                                            if($survey->Survey_Status == 'Completed')
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
                                                                echo $textAns = $surveyTransaction->Answer_Value;
                                                                break;
                                                            }
                                                        }
                                                        ?>
                                                            
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
                                            
                                            if($survey->Survey_Status == 'Completed')
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
                                                            echo  '<div class="col-sm-12 clearfix"><span class="lbl">'.$answer->Answer_Name.' </span></div>';
                                                            
                                                            break;
                                                        }
                                                    }
                                                    
//                                                   
                                                        
                                                        
                                                ?>
                                                   
                                                <?php
                                                }
                                                else if($questionType == "radio button" )
                                                {
                                                    
                                                    
                                                    foreach($answer->surveyTransactions as $surveyTransaction)
                                                    {
                                                        
                                                        if($surveyTransaction->Answer_Id == $answerId && $surveyTransaction->Question_Id == $questionId)
                                                        {
                                                            echo  '<div class="col-sm-12 clearfix"><span class="lbl">'.$answer->Answer_Name.' </span></div>';
                                                            $options['checked'] = 'chekced';
                                                            break;
                                                        }
                                                    }
                                                ?>
                                                   
                                                    </div>
                                                <?php
                                                }
                                                else if($questionType == "radio buttons with no textbox" )
                                                {
                                                    
                                                    
                                                    foreach($answer->surveyTransactions as $surveyTransaction)
                                                    {
                                                        
                                                        if($surveyTransaction->Answer_Id == $answerId && $surveyTransaction->Question_Id == $questionId)
                                                        {
                                                            echo  '<div class="col-sm-12 clearfix"><span class="lbl">'.$answer->Answer_Name.' </span></div>';
                                                            $options['checked'] = 'chekced';
                                                            break;
                                                        }
                                                    }
                                                ?>
                                                   
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
                                                        <label class="col-sm-3 control-label no-padding-left" style="float:left"><?php echo $answer->Answer_Name ?> : <b><?php echo $textAns ?></b></label>
                                                        
                                                        
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
                                                             
                                                             echo  '<div class="col-sm-12 clearfix"><span class="lbl">'.$surveyTransaction->Answer_Value.' </span></div>';
                                                            break;
                                                        }
                                                    }
                                                ?>
                                                
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
                                                            
                                                            echo  '<div class="col-sm-12 clearfix"><span class="lbl">'.$answer->Answer_Name.' </span></div>';
                                                            $selected = 'selected="selected"';
                                                            break;
                                                        }
                                                    }
                                                            
                                                    
                                                 ?>
                                                    
                                                        
                                                    
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
                                    if(!empty($id))
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

                            
                        ?>
                        
                    </div>
                    <br>
                    <br>
                    <br>
                    
                    </div>
                    <?= Html::endForm() ?>
                    <?php Pjax::end(); ?>
                    
                    
                    

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




