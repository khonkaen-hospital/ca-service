<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" >
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/ico/favicon.png">

        <?php
        $cs = Yii::app()->clientScript;
        $themePath = Yii::app()->theme->baseUrl;
        $cs->registerCssFile($themePath . '/assets/css/bootstrap.min.css');
        $cs->registerCssFile($themePath . '/assets/css/bootstrap-theme.css');
        $cs->registerCssFile($themePath . '/assets/css/font-awesome.min.css');
        $cs->registerCssFile($themePath . '/assets/css/sb-admin.css');
        $cs->registerCoreScript('jquery', CClientScript::POS_END);
        $cs->registerCoreScript('jquery.ui', CClientScript::POS_END);
        $cs->registerScriptFile($themePath . '/assets/js/bootstrap.min.js', CClientScript::POS_END);
        $cs->registerScriptFile($themePath . '/assets/js/jquery.metisMenu.js', CClientScript::POS_END);
        $cs->registerScriptFile($themePath . '/assets/js/init.js', CClientScript::POS_END);

        $cs->registerScript('tooltip', "$('[data-toggle=\"tooltip\"]').tooltip();$('[data-toggle=\"popover\"]').tooltip()", CClientScript::POS_READY);
        ?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="<?php
        echo Yii::app()->theme->baseUrl . '/assets/js/html5shiv.js';
        ?>"></script>
            <script src="<?php
        echo Yii::app()->theme->baseUrl . '/assets/js/ie8-responsive-file-warning.js';
        ?>"></script>
        <![endif]-->

    </head>

    <body>

        <div  id="wrapper">
            <div class="line-haeder"></div>

            <?php
            $this->widget('bootstrap.widgets.BsNavbar', array(
                'collapse' => true,
                //'position' => BSHtml::NAVBAR_POSITION_FIXED_TOP,
                'color' => 'ihos',
                'navbarDataTarget' => '.sidebar-collapse',
                'collapseOptions' => array('class' => 'sidebar-collapse'),
                'brandLabel' => 'KKH JHCIS Data Operation Center',
                'brandUrl' => Yii::app()->homeUrl,
                'brandOptions' => array(),
                'htmlOptions' => array('class' => 'pos-nav', 'style' => 'margin-bottom:0;'),
                'items' => array(
                    '<form class="navbar-form navbar-right" role="form">
                                <input type="text" placeholder="Search" class="form-control">
                            </form>',
                    array(
                        'class' => 'bootstrap.widgets.BsNav',
                        'type' => 'navbar',
                        'encodeLabel' => FALSE,
                        'activateParents' => true,
                        'items' => array(
                            //array('label' => 'Dashboard', 'icon' => 'dashboard', 'url' => array('/dashboard/dashboard/index')),
                            //array('label' => 'Sale', 'icon' => 'shopping-cart', 'url' => '#'),
                            array(
                                'label' => ' ( <strong >' . Yii::app()->user->name . '</strong> )',
                                'icon' => 'user',
                                'url' => '#',
                                'visible' => !Yii::app()->user->isGuest,
                                'items' => array(
                                    array('url' => Yii::app()->getModule('user')->loginUrl, 'label' => Yii::app()->getModule('user')->t("Login"), 'visible' => Yii::app()->user->isGuest),
                                    array('url' => Yii::app()->getModule('user')->registrationUrl, 'label' => Yii::app()->getModule('user')->t("Register"), 'visible' => Yii::app()->user->isGuest),
                                    array('url' => Yii::app()->getModule('user')->profileUrl, 'label' => Yii::app()->getModule('user')->t("Profile"), 'visible' => !Yii::app()->user->isGuest),
                                    array('url' => Yii::app()->getModule('user')->logoutUrl, 'label' => Yii::app()->getModule('user')->t("Logout") . ' (' . Yii::app()->user->name . ')', 'visible' => !Yii::app()->user->isGuest),
                                )
                            ),
                        ),
                        'htmlOptions' => array(
                            'pull' => BSHtml::NAVBAR_NAV_PULL_RIGHT
                        )
                    )
                )
            ));
            ?>

            <!--            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
                            </div>
                             /.navbar-header 
            
                            <ul class="nav navbar-top-links navbar-right">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-messages">
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <strong>John Smith</strong>
                                                    <span class="pull-right text-muted">
                                                        <em>Yesterday</em>
                                                    </span>
                                                </div>
                                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <strong>John Smith</strong>
                                                    <span class="pull-right text-muted">
                                                        <em>Yesterday</em>
                                                    </span>
                                                </div>
                                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <strong>John Smith</strong>
                                                    <span class="pull-right text-muted">
                                                        <em>Yesterday</em>
                                                    </span>
                                                </div>
                                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a class="text-center" href="#">
                                                <strong>Read All Messages</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                     /.dropdown-messages 
                                </li>
                                 /.dropdown 
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-tasks">
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <p>
                                                        <strong>Task 1</strong>
                                                        <span class="pull-right text-muted">40% Complete</span>
                                                    </p>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                            <span class="sr-only">40% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <p>
                                                        <strong>Task 2</strong>
                                                        <span class="pull-right text-muted">20% Complete</span>
                                                    </p>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <p>
                                                        <strong>Task 3</strong>
                                                        <span class="pull-right text-muted">60% Complete</span>
                                                    </p>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                            <span class="sr-only">60% Complete (warning)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <p>
                                                        <strong>Task 4</strong>
                                                        <span class="pull-right text-muted">80% Complete</span>
                                                    </p>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                            <span class="sr-only">80% Complete (danger)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a class="text-center" href="#">
                                                <strong>See All Tasks</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                     /.dropdown-tasks 
                                </li>
                                 /.dropdown 
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-alerts">
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a class="text-center" href="#">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                     /.dropdown-alerts 
                                </li>
                                 /.dropdown 
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                        </li>
                                    </ul>
                                     /.dropdown-user 
                                </li>
                                 /.dropdown 
                            </ul>
                             /.navbar-top-links 
            
                        </nav>-->

            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <!--                        <li class="sidebar-search">
                                                    <div class="input-group custom-search-form">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default" type="button">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                     /input-group 
                                                </li>-->
                        <li>
                            <a href="<?php echo $this->createUrl('/site/index') ?>"><i class="fa fa-dashboard fa-fw"></i>หน้าแรก</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i></i>รายงาน<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <?php
                                echo ChartData::getMenus();
                                //CVarDumper::dump(ChartData::getMenus());
                                ?>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $this->createUrl('/forum') ?>"><i class="fa fa-adjust"></i>เว็บบอร์ด</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->createUrl('site/about') ?>"><i class="fa fa-adjust fa-fw"></i>เกี่ยวกับโครงการ</a>
                        </li>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </nav>


            <div id="page-wrapper">
                <?php echo $content; ?>
            </div>
            <!-- /#page-wrapper -->

        </div>

    </body>
</html>
