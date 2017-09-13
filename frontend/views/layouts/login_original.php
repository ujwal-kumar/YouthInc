<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="outter-container">
           <?= $content ?>
            <!-- END WRAP-->

            <div id="footer" class="affix-bottom small">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 copyright">
                            <p id="footer_address">535 8th Avenue<br>Suite 1400<br>New York, NY 10018</p>
                            <p class="text-right">Copyright <span class="glyphicon glyphicon-copyright-mark"></span> 2017 Youth INC All Rights Reserved</p>
                        </div>
                    </div>
                </div>
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