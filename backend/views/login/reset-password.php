<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
?>
<div class="login-form">
    <h1>
        <a href="<?php echo Yii::$app->request->baseUrl; ?>" title="">
            <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/UPAS_logo_blk2.png" width="60%" height="60%" />
        </a>
    </h1>
    <?php Pjax::begin([]); ?> 
    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

        
        
        <?php 
            echo $form->field($model, 'password', [
            'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent', 'autocomplete' => "off"] ,
            'template' => '<div class="form-group log-status">{input}{error}{hint}</div>',
            ])->textInput()->input('password', ['placeholder' => "Password", 'maxlength' => 50,  'class' => "form-control"])->label(false); 
        ?>
    
        <?php 
//        prd($model);
        echo $form->field($model, 're_password', [
           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent', 'autocomplete' => "off"] ,
            'template' => '<div class="form-group log-status">{input}{error}{hint}</div>',
     ])->passwordInput()->input('password', ['placeholder' => "Repeat Password",'maxlength' => 50,  'class' => "form-control"])->label(false); ?>

        

        <?php // echo  $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="row-fluid clearfix">
            <?= Html::a('Login?', ['/login/index'], ['class'=>'link']) ?>
            <!--<a class="link" href="#"></a>-->
        </div>
        <div class="form-group ">
            <div class="row clearfix">
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <?= Html::submitButton('Reset Password', ['class' => 'btn btn-primary log-btn', 'name' => 'login-button']) ?>
                </div>
                
                <div class="col-sm-12 col-md-5 col-lg5" >
                    <?= Html::resetButton('Reset', ['class' => 'btn btn-primary log-btn', 'name' => 'reset-button']) ?>
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
        
<!--    <div class="form-group ">
        <input type="text" class="form-control" placeholder="Email " id="UserName">
        <i class="fa fa-user"></i>
    </div>
    <div class="form-group log-status">
        <input type="password" class="form-control" placeholder="Password" id="Passwod">
        <i class="fa fa-lock"></i>
    </div>-->
<!--    <span class="alert">Invalid Credentials</span>
    <a class="link" href="#">Lost your password?</a>
    <button type="button" class="log-btn" >Log in</button>-->
</div><!-- END CONTENT -->