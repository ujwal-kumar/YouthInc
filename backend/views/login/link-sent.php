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
    <h4>Password reset link has been sent to your email id. Please check your email.</h4>
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