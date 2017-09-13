<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);

/* @var $this yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <?= Html::csrfMetaTags() ?>
        <title>YouthInc | Login</title>

        <?php $this->head() ?>
        <style>
            .form-group .fa {
  position: absolute;
  right: 15px;
  top: 17px;
  color: #999;
}
        </style>
    </head>
    <body class='home'>


        <?php $this->beginBody() ?>
        <?= $content ?>
    </div>

    

    <!-- End Newsletter BAR -->



</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>