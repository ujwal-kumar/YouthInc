<?php
/* @var $this yii\web\View */
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use frontend\widgets\Alert;
?>
<div class="login-form">
    <h1>
        <a href="<?php echo Yii::$app->request->baseUrl; ?>" title="">
            <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/UPAS_logo_blk2.png" width="60%" height="60%" />
        </a>
    </h1>
    <?php Pjax::begin([]); ?> 
    <?php $form = ActiveForm::begin(['id' => 'login-form',
                
        ]); ?>

        
        
        <?php 
            
            
            
        
            echo $form->field($model, 'email', [
           'inputOptions' => [
               'autofocus' => 'autofocus', 
               'class' => 'form-control transparent' , 
               'autocomplete' => "new-password"
               ],
            'template' => '<div class="form-group log-status">{input}<i class="fa fa-user"></i>{error}{hint}</div>',
     ])->textInput()->input('email', ['placeholder' => "Email", 'maxlength' => "50",  'class' => "form-control"])->label(false); ?>
    
        <?php echo $form->field($model, 'password', [
           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent', 'autocomplete' => "new-password"],
            'template' => '<div class="form-group log-status">{input}<i class="fa fa-lock"></i>{error}{hint}</div>',
     ])->passwordInput()->input('password', ['placeholder' => "Password",'maxlength' => "100",  'class' => "form-control"])->label(false); ?>

        

        <?php // echo  $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="row-fluid clearfix">
            <div class="pull-right">
                <?= Html::a('Forgot password?', ['/login/forgot-password'], ['class'=>'link']) ?><br>
                <?= Html::a('Unlock account?', ['/login/unlock-account'], ['class'=>'link']) ?>
            </div>
            <!--<a class="link" href="#"></a>-->
        </div>
        <div class="form-group ">
            <div class="row clearfix">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary log-btn', 'name' => 'login-button']) ?>
                </div>
                
                <div class="col-sm-12 col-md-6 col-lg-6" >
                    <?= Html::resetButton('Cancel', ['class' => 'btn btn-primary log-btn', 'name' => 'reset-button']) ?>
                </div>
            </div>
            
        </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
    <?php
        $this->registerJs("
                $('button[name=reset-button').click(function(){
                    $('form').find('input, textarea').val('');
                })
                
                ", \yii\web\VIEW::POS_READY);
    ?>
        
</div><!-- END CONTENT -->