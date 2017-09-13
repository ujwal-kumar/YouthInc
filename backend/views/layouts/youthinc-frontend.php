<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use mdm\admin\components\MenuHelper;

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
    <script type="text/javascript">
        baseUrl = '<?php echo Yii::$app->request->baseUrl; ?>';
    </script>    
</head>

<body class="no-skin">
    
    
<?php $this->beginBody() ?>
    <div id="navbar" class="navbar navbar-default          ace-save-state">
        <div class="navbar-container ace-save-state" id="navbar-container">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <div class="navbar-header pull-left">
                <a href="<?php echo Yii::$app->request->baseUrl; ?>/dashboard" class="navbar-brand">
                    <small>
                       <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/UPAS_logo_blk2.png" style="width:50%;" /> 
                    </small>
                    
                </a>
            </div>

            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    

                    <li class="light-blue dropdown-modal drop-model-youth">
                        <a data-toggle="dropdown" href="<?php echo Yii::$app->request->baseUrl; ?>/login/logout" class="dropdown-toggle">
<!--                            <img class="nav-user-photo" src="<?php echo Yii::$app->request->baseUrl; ?>/youthinc-ui/assets/images/avatars/user.jpg" alt="Jason's Photo" />-->
                            <span class="user-info-youth">
                                <span>Welcome, <?php echo  \Yii::$app->user->identity['User_Name'] ?></span>
                                
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close ">
<!--                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-cog"></i>
                                    Settings
                                </a>
                            </li>

                            <li>
                                <a href="profile.html">
                                    <i class="ace-icon fa fa-user"></i>
                                    Profile
                                </a>
                            </li>

                            <li class="divider"></li>-->

                            <li>
                                <a href="#">
                                    <div class="row-fluid">
                                    
                                        <div class="col-lg-3">

                                            <?php 
                                                echo Html::beginForm(['/login/logout'], 'post');
                                                echo '<i class="ace-icon fa fa-power-off"></i>';
                                                echo Html::submitButton(
                                                    'Logout',
                                                    ['class' => 'btn btn-link logout']
                                                );
                                                echo  Html::endForm(); 
                                            ?>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.navbar-container -->
    </div>
    
    <div class="main-container ace-save-state" id="main-container" style="p adding-top: 117px;">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {
            }
        </script>

        <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('sidebar')} catch (e) {
                }
            </script>

            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
<!--                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-primary">
                        <i class="ace-icon fa fa-signal"></i>
                    </button>

                    <button class="btn btn-info">
                        <i class="ace-icon fa fa-pencil"></i>
                    </button>

                    <button class="btn btn-warning">
                        <i class="ace-icon fa fa-users"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="ace-icon fa fa-cogs"></i>
                    </button>
                </div>

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-primary"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div>-->
            </div><!-- /.sidebar-shortcuts -->
            
           <?php
//                $menu = MenuHelper::getAssignedMenu(Yii::$app->user->id);
//                $menu[0]['options'] = [
//                                'class' => 'fa fa-clock'
//                            ];
//                
//                prd($menu[0]['label']);
//                 $callback = function ($menu) {
//                    $data = eval($menu['data']);
//                    $total = [
//                        'label' => $menu['name'],
//                        'url' => [$menu['route']],
//                        'options' => $data,
//                        'items' => $menu['children']
//                    ];
//                    return $total;
//                
//                };
               $callback = function ($menu) {
                    return [
                       'label' => $menu['data'].$menu['name'],
                        'url' => [$menu['route']],
                        'options' => ['class' => ' '],
                       'items' => $menu['children']
                       ];
                    
                 };

                $items = MenuHelper::getAssignedMenu(Yii::$app->user->id);
//                prd(MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback, true));
                
                
//                prd($items);
                
//                echo Nav::widget([
//                    'encodeLabels' => false,
//                    'options' => ['class' => 'nav nav-list'],
//                    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback, true)
//                ]);
                $controllerList = [
                    'dashboard' => ['dashboard', ],
                    'program' => ['program', 'program-type', 'program-application' ],
                    'category' => ['category-type', 'category' ],
                    'role' => ["role", "route", "permission", "menu", "assignment", "permission", 'rule'],
                    'questionnaire' => ["questionnaire", "control-type"],
                    'npo' => ['npo', 'initial-contact-type', 'partner-type', 'status-action-type',  'hiring-type', 'org-status'],
                    'ftat' => ["ftat-question", "ftat"],
                    'reports' => ["report-users", "report-npo", "reports", "report-organization"],
                    'document' => ["document"],
                    'notification' => ["notification"],
                    'mail-template' => ["mail-template"],
                    'users' => ["users"],
                    
                ];
                $iconList = [
                    'dashboard' => '<i class="menu-icon fa fa-tachometer"></i>',
                    'users' => '<i class="menu-icon fa fa-users"></i>',
                    'program' =>  '<i class="menu-icon fa fa-tasks"></i>',
                    'category' =>  '<i class="menu-icon fa fa-list"></i>',
                    'role' =>  '<i class="menu-icon fa  fa-user-o"></i>',
                    'questionnaire' =>  '<i class="menu-icon fa fa-question-circle-o"></i>',
                    'npo' =>  '<i class="menu-icon fa fa-building-o"></i>',
                    'ftat' =>  '<i class="menu-icon fa fa-database"></i>',
                    'reports' =>  '<i class="menu-icon fa fa-bar-chart"></i>',
                    'document' =>  '<i class="menu-icon fa fa-file"></i>',
                    'notification' =>  '<i class="menu-icon fa fa-bell"></i>',
                    'mail-template' =>  '<i class="menu-icon fa fa-envelope"></i>',
                    
                ];
                echo '<ul class="nav nav-list ">';
                
                foreach($items as $index => $menu)
                {
                    if($index == 3)
                    {
//                        pr($menu);
                    }
                    
                    ?>
                    <?php 
                        $controllerId = explode('/', $menu['url'][0]);
                        $controllerId = (!empty($controllerId[1])) ? $controllerId[1] : '';
                        $active = 'active';
                        if(!empty($menu['items']))
                        {
                            $active = 'open active';
                        }
                        
                        
                    ?>
                    
                    <li class="<?php echo (Yii::$app->controller->id == $controllerId)?" $active ": ""; ?>">
                        
                        
                        <a class="<?php echo  !empty($menu['items'])? "dropdown-toggle" : "" ?>" href="<?php echo Yii::$app->request->baseUrl.$menu['url'][0] ?>">
                            <?php echo  (in_array($controllerId, $controllerList[$controllerId]))? $iconList[$controllerId]:'' ?>
                            <span class="menu-text"> <?php echo $menu['label'] ?> </span>
                            <?php 
                            if(!empty($menu['items']))
                            {
                                echo '<b class="arrow fa fa-angle-down"></b>';
                            }
                            ?>
                        </a>

                        <b class="arrow"></b>
                        
                        <?php 
                            if(!empty($menu['items']))
                            {
                                echo '<ul class="submenu">';
                                foreach($menu['items'] as $submenu)
                                {
                                    $controllerId = explode('/', $submenu['url'][0]);
                                    $controllerId = (!empty($controllerId[1])) ? $controllerId[1] : 0;
                                    ?>
                                        <li class="<?php echo (Yii::$app->controller->id == $controllerId)?" active":'' ?>">
                                            <a href="<?php echo Yii::$app->request->baseUrl.$submenu['url'][0] ?>">
                                                <!--<i class="menu-icon menu-icon fa fa-user-o"></i>-->
                                                <?php echo $submenu['label'] ?>
                                            </a>

                                            <b class="arrow"></b>
                                        </li>
                                    <?php
                                }
                                echo '</ul>';
                            }
                        ?>
                    </li>
                    <?php
                    
                    
                    
                }
                echo '</ul>';
                 
           ?>
            <ul class="nav nav-list hidden">
                <li class="<?php echo (Yii::$app->controller->id == "dashboard")?"active":'' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/dashboard/">
                        <i class="menu-icon fa fa-tachometer"></i>
                        <span class="menu-text"> Dashboard </span>
                    </a>

                    <b class="arrow"></b>
                </li>
                
                

                <li class="<?php echo (Yii::$app->controller->id == "users")?"active":'' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                        <i class="menu-icon fa fa-users" aria-hidden="true"></i>
                        <span class="menu-text">	Manage Users</span>
                    </a>
                </li>
                <li class="<?php echo  (in_array(Yii::$app->controller->id, ["role", "route", "permission", "menu", "assignment", "permission", 'rule']) )?"open":'' ?>">
                    <a class="dropdown-toggle" href="<?php echo Yii::$app->request->baseUrl; ?>/role/">
                        <i class="menu-icon fa fa-user-o" aria-hidden="true"></i>
                        <span class="menu-text">	Manage Role</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    
                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="<?php echo  (Yii::$app->controller->id == "role")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/role/">
                                <i class="menu-icon menu-icon fa fa-user-o"></i>
                                Roles
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
                        
                        
                        <li class="<?php echo  (Yii::$app->controller->id == "route")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/admin/route/">
                                <i class="menu-icon menu-icon fa fa-user-o"></i>
                                Route
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
                        <li class="<?php echo  (Yii::$app->controller->id == "permission")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/admin/permission/">
                                <i class="menu-icon menu-icon fa fa-user-o"></i>
                                Permissions
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
                        
                        <li class="<?php echo  (Yii::$app->controller->id == "menu")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/admin/menu">
                                <i class="menu-icon menu-icon fa fa-user-o"></i>
                                Menu
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
                        
                        <li class="<?php echo  (Yii::$app->controller->id == "assignment" )?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/admin/assignment">
                                <i class="menu-icon menu-icon fa fa-user-o"></i>
                                Assignment
                            </a>
                            <b class="arrow"></b>
                        </li>
                        
                        <li class="<?php echo  (Yii::$app->controller->id == "role")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/admin/role">
                                <i class="menu-icon menu-icon fa fa-user-o"></i>
                                Role
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
                        <li class="<?php echo  (Yii::$app->controller->id == "rule")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/admin/rule">
                                <i class="menu-icon menu-icon fa fa-user-o"></i>
                                Rule
                            </a>

                            <b class="arrow"></b>
                        </li>

                        
                    </ul>
                </li>
                
                <li class="<?php echo  (in_array(Yii::$app->controller->id, ["program", "program-type", "program-application"]) )?"open":'' ?>">
                    <a class="dropdown-toggle" href="<?php echo Yii::$app->request->baseUrl; ?>/program/">
                        <i class="menu-icon fa fa-tasks" aria-hidden="true"></i>
                        <span class="menu-text">	Manage Program</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    
                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="<?php echo  (Yii::$app->controller->id == "program")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/program/">
                                <i class="menu-icon menu-icon "></i>
                                Programs
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="<?php echo  (Yii::$app->controller->id == "program-application")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/program-application/">
                                <i class="menu-icon menu-icon "></i>
                                Programs Application
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="<?php echo  (Yii::$app->controller->id == "program-type")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/program-type/">
                                <i class="menu-icon menu-icon "></i>
                                Program Types
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                
                
                <li class="<?php echo  ( in_array(Yii::$app->controller->id, ['category', 'category-type']))?"open":'' ?>">
                    <a  class="dropdown-toggle"  href="<?php echo Yii::$app->request->baseUrl; ?>/category/">
                        <i class="menu-icon fa fa-list" aria-hidden="true"></i><span class="menu-text">	Manage Categories</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    
                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="<?php echo  (Yii::$app->controller->id == "category")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/category/">
                                <i class="menu-icon menu-icon "></i>
                                Categories
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
                        <li class="<?php echo  (Yii::$app->controller->id == "category-type")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/category-type/">
                                <i class="menu-icon menu-icon "></i>
                                Category Type
                            </a>

                            <b class="arrow"></b>
                        </li>

                        
                    </ul>
                </li>
                
                
                
                
                
                <li class="<?php echo  (in_array(Yii::$app->controller->id, ["questionnaire", "control-type"]) )?"open active ":'' ?>">
                    <a class="dropdown-toggle" href="<?php echo Yii::$app->request->baseUrl; ?>/questionnaire/">
                        <i class="menu-icon fa fa-question-circle-o" aria-hidden="true"></i>
                        <span class="menu-text">	Manage Questionnaire</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    
                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="<?php echo  (Yii::$app->controller->id == "questionnaire")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/questionnaire/">
                                <i class="menu-icon menu-icon fa "></i>
                                Questionnaire
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="<?php echo  (Yii::$app->controller->id == "control-type")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/control-type/">
                                <i class="menu-icon menu-icon fa "></i>
                                Control Types
                            </a>

                            <b class="arrow"></b>
                        </li>

                        
                    </ul>
                </li>
                
                <li class="<?php echo  ( in_array(Yii::$app->controller->id, ['npo', 'initial-contact-type', 'partner-type', 'status-action-type',  'hiring-type', 'org-status']))?"open":'' ?>">
                    <a class="dropdown-toggle"  href="<?php echo Yii::$app->request->baseUrl; ?>/organization/">
                        <i class="menu-icon fa fa-building-o" aria-hidden="true"></i><span class="menu-text">Manage NPO</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    
                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="<?php echo  (Yii::$app->controller->id == "npo")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/npo/">
                                <i class="menu-icon fa fa-caret-right"></i>
                                NPOs
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li  class="<?php echo  (Yii::$app->controller->id == "org-status")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/org-status/">
                                <i class="menu-icon fa fa-caret-right"></i>
                                NPO Status
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li  class="<?php echo  (Yii::$app->controller->id == "initial-contact-type")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/initial-contact-type/">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Initial Contact
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="<?php echo  (Yii::$app->controller->id == "partner-type")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/partner-type/">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Partner type
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="<?php echo  (Yii::$app->controller->id == "status-action-type")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/status-action-type/">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Status Action
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="<?php echo  (Yii::$app->controller->id == "hiring-type")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/hiring-type/">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Hiring Type
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
<!--                <li>
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                        <i class="menu-icon fa fa-wpforms" aria-hidden="true"></i><span class="menu-text">Assign Questions</span>
                    </a>
                </li>-->
                
                <li class="<?php echo  (in_array(Yii::$app->controller->id, ["ftat-question", "ftat"]) )?"open active ":'' ?>">
                    <a class="dropdown-toggle" href="<?php echo Yii::$app->request->baseUrl; ?>/ftat/">
                        <i class="menu-icon fa fa-database" aria-hidden="true"></i>
                        <span class="menu-text">	Manage FTA</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    
                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="<?php echo  (Yii::$app->controller->id == "ftat")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/ftat/">
                                <i class="menu-icon menu-icon fa fa-wrench "></i>
                                FTA
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="<?php echo  (Yii::$app->controller->id == "ftat-question")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/ftat-question/">
                                <i class="menu-icon menu-icon fa "></i>
                                FTA Description
                            </a>

                            <b class="arrow"></b>
                        </li>

                        
                    </ul>
                </li>

                <li class="<?php echo  (in_array(Yii::$app->controller->id, ["report-users", "report-npo", "reports"]) )?"open active ":'' ?>">
                    <a class="dropdown-toggle" href="<?php echo Yii::$app->request->baseUrl; ?>/reports/">
                        <i class="menu-icon fa fa-bar-chart" aria-hidden="true"></i><span class="menu-text">Reports</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    
                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="<?php echo  (Yii::$app->controller->id == "report-users")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/report-users/">
                                <i class="menu-icon menu-icon fa fa-wrench "></i>
                                Users 
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
                        <li class="<?php echo  (Yii::$app->controller->action->id == "index" && Yii::$app->controller->id == "report-npo" )?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/report-npo/index">
                                <i class="menu-icon menu-icon fa fa-wrench "></i>
                                NPO 
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="<?php echo  (Yii::$app->controller->action->id == "authorize")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/report-npo/authorize">
                                <i class="menu-icon menu-icon fa fa-wrench "></i>
                                NPO Status
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="<?php echo  (Yii::$app->controller->action->id == "ftat")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/report-npo/ftat">
                                <i class="menu-icon menu-icon fa fa-wrench "></i>
                                FTA  
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
                        <li class="<?php echo (Yii::$app->controller->id == "reports")?"active":'' ?>">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/reports/">
                                <i class="menu-icon fa fa-book" aria-hidden="true"></i><span class="menu-text">View Survey</span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                       

                        
                    </ul>
                    
                </li>
                
                
                
                <li class="<?php echo (Yii::$app->controller->id == "document")?"active":'' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/document/">
                        <i class="menu-icon fa fa-file" aria-hidden="true"></i>
                        <span class="menu-text">Manage Document</span>
                    </a>
                </li>
                <li class="<?php echo (Yii::$app->controller->id == "notification")?"active":'' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/notification/">
                        <i class="menu-icon fa fa-bell" aria-hidden="true"></i>
                        <span class="menu-text">Manage Notification</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/">
                        <i class="menu-icon fa fa-home" aria-hidden="true"></i><span class="menu-text">Home</span>
                    </a>
                </li>
                
                
                <li class="<?php echo (Yii::$app->controller->id == "mail-template")?"active":'' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/mail-template/">
                        <i class="menu-icon fa fa-envelope" aria-hidden="true"></i><span class="menu-text">Mail Template</span>
                    </a>
                </li>
            </ul><!-- /.nav-list -->

            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>
        </div>

        <div class="main-content">
            <div class="main-content-inner">
                
                <div class="alert-message-cnt page-content">
                    <?= Alert::widget() ?>
                </div>
                    
                <?= $content ?>
                
                <div class="footer">
                    <div class="footer-inner">
                        <div class="footer-content">
                            <span class="bigger-120">

                                Powered By   <span class="blue bolder"><a class="blue bolder" href="https://www.alphaserveit.com/">Alphaserve Technologies</a></span> 
                            </span>

                            &nbsp; &nbsp;
    <!--                        <span class="action-buttons">
                                <a href="#">
                                    <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                                </a>
                            </span>-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.main-content -->
        
        <div class="clear clearfix"></div>
        

<!--            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>-->
    </div><!-- /.main-container -->
    
<!--        <div class="outter-container">


            <div class="nav-side-menu">
                <div class="brand"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/youth_logo1.png" style="width:80%;" /></div>
                <div class="brand" style="padding-top:40px;"></div>
                <i class="menu-icon fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

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
                                <i class="menu-icon fa fa-tachometer" aria-hidden="true"></i><span class="menu-text">Dashboard</span> 
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                                <i class="menu-icon fa fa-users" aria-hidden="true"></i><span class="menu-text">	Manage Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                                <i class="menu-icon fa fa-user-o" aria-hidden="true"></i><span class="menu-text">	Manage Role</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                                <i class="menu-icon fa fa-list" aria-hidden="true"></i><span class="menu-text">	Manage Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                                <i class="menu-icon fa fa-question-circle-o" aria-hidden="true"></i><span class="menu-text">Manage Questionnaire</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                                <i class="menu-icon fa fa-building-o" aria-hidden="true"></i><span class="menu-text">Manage NPO</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                                <i class="menu-icon fa fa-wpforms" aria-hidden="true"></i><span class="menu-text">Assign Questions</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                                <i class="menu-icon fa fa-bar-chart" aria-hidden="true"></i><span class="menu-text">Reports</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/users/">
                                <i class="menu-icon fa fa-book" aria-hidden="true"></i><span class="menu-text">View Servey</span>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="InnerDiv">
                <div id="content">
                    <div id="breadcrumbs-banner">
                        <div class="container">

                            

                        </div>
                    </div>


                </div> END CONTENT 
            </div>
        </div> END CONTENT -->
    <!--</div>-->

<!--            <div id="footer" class="affix-bottom small">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 copyright">
                            <p id="footer_address">535 8th Avenue<br>Suite 1400<br>New York, NY 10018</p>
                            <p class="text-right">Copyright <span class="glyphicon glyphicon-copyright-mark"></span> 2017 Youth INC All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>-->
            
            <!-- End Newsletter BAR -->
            


        <!--</div>-->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
     
    
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>