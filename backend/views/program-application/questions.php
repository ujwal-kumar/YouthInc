<?php
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Question;

$this->title = Yii::t('app', 'Take Survey');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- BREADCRUMBS -->
<div class="page-content">
    <div class="contai ner">
      <div class="row">
            <div class="col-xs-12">  
                <?php
//                Pjax::begin([
//                    'id' => 'image-list',
//                    'enablePushState' => true
//                ]);
                ?>  
                    <?php // $form = ActiveForm::begin(); ?>
                    <?php echo Html::beginForm(['program-application/question-map'], 'post',['data-pjax' => '', 'id' => 'questionMap'], ['enctype' => 'multipart/form-data']) ?>
                    <div class="row-fluid servey-form">
                        <?php
                        /* @var $this yii\web\View */
                        $id = 0;
                        $limit = 1;
                        $count = 0;
                        $total = 1;
                        $questionCount = 0;
                        $questionList = [];
                        
                        
                        
                        if(!empty($mapquestions))
                        {
                            $questionList = ArrayHelper::map($mapquestions, 'Question_Id', 'Question_Id');
                            
                        }
                        ?>
                        <h1>
                            <!--<span>Map Questions to</span>--> 
                            <?php 
                                
                                
                                    echo !empty($organizationDetails)? $organizationDetails->Organization_Name : '';
                                    echo ' : ';
                                    echo !empty($programDetails)? $programDetails->Program_Name : '';
                                
                            ?>
                        </h1>
                        <?php
                            if(empty($surveyInitated))
                            {
                                ?>
                                 <div class="control-group checkbox clearfix">
                                    <label class="control-label  bolder col-sm-12">
                                        <?php echo  Html::input('checkbox', 'SelectAll[]', '', ['class' => 'select-all ace']) ?>
                                        <span class="lbl"> Select All</span>
                                    </label>
                                </div>   
                                <?php
                            }
                            else
                            {
                        ?>
                                <div class="alert alert-info">
                                    NPO has stated the survey hence you cannot edit the questions
                                </div>

                        <?php
                            }
                        ?>
                            
                        <?php // echo $form->checkboxList($questions, 'categories', ArrayHelper::map(Question::find()->asArray()->all(), 'Question_Id', 'Question_Name'), array('template' => '<li>{input} {label}</li>', 'separator' => '<br><br>', 'checkAll' => 'Select All')); ?>
                        <?php // echo Html::checkboxList('Questions', ArrayHelper::map($questions, 'Question_Id', 'Question_Name'), ArrayHelper::map($questions, 'Question_Id', 'Question_Name', ['options' => ['checkAll' => 'Select All']])); ?>
                        <?php
                        
//                        prd($questions);
                        $categoryId = '';
                        foreach($questions as $question)
                        {
//                            pr($question->category->Category_Name);
                            $questionId = $question->Question_Id;
//                            echo $question->category->Category_Name;
                            $options = [ ];
                            $options['class'] = 'ace';
                            
                            $categoryName = $question->category->Category_Name;
                            if(in_array($questionId, $questionList))
                            {
                                $options['checked'] = 'checked';
                                
                                $options['class'] = 'ace';
                                
                            }
                            
                            if(!empty($surveyInitated))
                            {
                                $options['disabled'] = 'disabled';
                            }
                            $questionCount = $count + $limit;
                        ?>
                            <?php
                                if($question->Category_Id != $categoryId)
                                {
                                    echo "<h4> <b>$categoryName</b></h4>";
//                                    $questionCount = 0;
//                                    $count = 1;
                                }
                            ?>
                            <div class="control-group checkbox clearfix">
                                    <label class="control-label bolder col-sm-12">
                                        <?php echo Html::input('checkbox', 'Question['.$questionId.']', $questionId, $options) ?>
                                        <?php  echo ' <span class="lbl"> Q'. ( $questionCount ).'. '. $question->Question_Name.'</span>' ?>
                                    </label>
                                    
                                    <?php Html::input('hidden', 'Question['.$questionId.']', $questionId, ['class' => '']) ?>
                                    <?php echo  Html::input('hidden', 'OrgId', $org_id, ['class' => '']) ?>
                                    <?php echo  Html::input('hidden', 'ProgramId', $program, ['class' => '']) ?>
                                   
                                    
                            </div>
                                <?php
                                $count++;
                                $categoryId = $question->Category_Id;
                            }
                            ?>
                        <?php
//                            echo $survey[0]->Survey_Status;
//                            echo $total.'<br>';
//                            echo $questionCount;
//                            prd($questionLeft['questions']);
                            
                        ?>
                        
                    </div>
                    
                    <!--Button Area Start-->
                   <?php
                        if(empty($surveyInitated))
                        {
                            ?> 
                   <div class="pull-right">
                            
                        <button class="btn btn-primary question-org-map-submit">Submit</button>
      
                    </div> 
                            <?php
                        }
                    ?>
                    <?= Html::endForm() ?>
                    <?php // Pjax::end(); ?>
                    
                    
                    

                   
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
                <!--<a  class="btn btn-primary svy-next" href="<?php echo Yii::$app->request->baseUrl; ?>/survey/index/1/">Next</a>-->
            </div>
        </div>
    </div>
</div>




