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
    <title><?= Html::encode($this->title) ?></title>
    
    <?php $this->head() ?>
</head>
<body class='formbackground'>
    
    
<?php $this->beginBody() ?>
    <div class="outter-container">
           
            <!-- END WRAP-->
            <div style="background-color:#FFD300;text-align:right;padding-top:0.5%;padding-right:0.5%;">
                
                
                
                
                <?php 
//                echo Yii::$app->user->identity->username;
                    if (!\Yii::$app->user->isGuest) {
                        ?>
                        <div class="user-icon"><i class="fa fa-user"></i></div>
                        <span style="font-family:'Franklin Gothic Book'"><?php echo  \Yii::$app->user->identity['UserName'] ?></span>
                        <span style="width:2%;"> &nbsp;</span>
                <?php
                
                            echo Html::beginForm(['/login/logout'], 'post');
                            echo Html::submitButton(
                                'Logout',
                                ['class' => 'btn btn-link logout']
                            );
                            echo  Html::endForm();
                            
                    }
                ?>
            </div>
        <div style="border:0px solid black;text-align:right;background-color:#FFD300;padding-top:4%;">

        </div>
        <div class="nav-side-menu">
            <div class="brand"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/youth_logo1.png" style="width:80%;" /></div>
            <div class="brand" style="padding-top:40px;"></div>
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">
                <?php
//                    NavBar::begin(['brandLabel' => 'NavBar Test']);
//                    echo Nav::widget([
//                        'items' => [
//                            ['label' => 'Home', 'url' => ['/site/index']],
//                            ['label' => 'About', 'url' => ['/site/about']],
//                        ],
//                        'options' => ['class' => 'navbar-nav'],
//                    ]);
//                    NavBar::end();
                ?>
                <ul id="menu-content" class="menu-content collapse out">
                    <li>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/dashboard/">
                            <i class="fa fa-tachometer" aria-hidden="true"></i><span style="padding-left:8px;vertical-align:middle;">Dashboard</span> 
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                            <i class="fa fa-users" aria-hidden="true"></i><span style="padding-left:8px;vertical-align:middle;">	Manage Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                            <i class="fa fa-user-o" aria-hidden="true"></i><span style="padding-left:8px;vertical-align:middle;">	Manage Role</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                            <i class="fa fa-list" aria-hidden="true"></i><span style="padding-left:8px;vertical-align:middle;">	Manage Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                            <i class="fa fa-question-circle-o" aria-hidden="true"></i><span style="padding-left:8px;vertical-align:middle;">Manage Questionnaire</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                            <i class="fa fa-building-o" aria-hidden="true"></i><span style="padding-left:8px;vertical-align:middle;">Manage NPO</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                            <i class="fa fa-wpforms" aria-hidden="true"></i><span style="padding-left:8px;vertical-align:middle;">Assign Questions</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i><span style="padding-left:8px;vertical-align:middle;">Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                            <i class="fa fa-book" aria-hidden="true"></i><span style="padding-left:8px;vertical-align:middle;">View Servey</span>
                        </a>
                    </li>

                </ul>
                
            </div>
        </div>
        <div class="InnerDiv">
            <div id="content">
            <div id="breadcrumbs-banner">
                    <div class="container">
                        
                        <?= $content ?>

                    </div>
                </div>

                
            </div><!-- END CONTENT -->
        </div>
            </div><!-- END CONTENT -->
        </div>

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