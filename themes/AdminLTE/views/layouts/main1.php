<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Yii::app()->name ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
<!--        <link href="<?php //echo Yii::app()->theme->baseUrl;   ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
        <?php
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        //$cs->registerScriptFile($baseUrl . '/js/jquery.tablescroll.js');
        $cs->registerCssFile($baseUrl . '/css/jquery.tablescroll.css');
        ?>

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <i class="fa fa-plus-square"> </i> <span><?php echo Yii::app()->name; ?></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo Yii::app()->user->name; ?><i class="caret"></i></span>
                            </a>
                            <?php if (!Yii::app()->user->isGuest): ?>
                                <ul class="dropdown-menu">
                                    <li class="user-header bg-light-blue">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar3.png" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo Yii::app()->user->name; ?>
                                            <small>Member since Jul. 2014</small>
                                        </p>
                                    </li>

                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Frends</a>
                                        </div>
                                    </li>

                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo Yii::app()->createUrl('duser/logout'); ?>" class="btn btn-default btn-flat">Sign Out</a>
                                        </div>
                                    </li>
                                </ul>
                            <?php endif; ?>
                            <?php if (Yii::app()->user->isGuest): ?>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="<?php echo Yii::app()->createUrl('duser/login'); ?>"><i class="fa fa-lock fa-fw"></i> Login</a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">

            <?php echo $content; ?>

        </div><!-- ./wrapper -->

        <!-- jQuery 2.0.2 -->
<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <!-- Bootstrap -->
<!--        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>-->
        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>
        <!--<script src="<?php //echo Yii::app()->theme->baseUrl;   ?>/js/mixitup-master/jquery.mixitup.min.js" type="text/javascript"></script>-->


    </body>
</html>

<script>
    $(function() {
        var loc = window.location.href;
        $('.sidebar-menu li').each(function() {
            var link = $(this).find('a:first').attr('href');
            if (loc.indexOf(link) >= 0)
                $(this).addClass('active');
        });
    });

    $(".refresh-btn").on('click', function() {
        location.reload();
    });
</script>

<style>
    /* grid border */
    .grid-view table.items th, .grid-view table.items td {
        border: 1px solid gray !important;
    } 

    /* disable selection for extrarows */     
    .grid-view td.extrarow {
        background: none repeat scroll 0 0 #F8F8F8; 
    }  

    .subtotal {
        font-size: 14px;
        color: brown;
        font-weight: bold;   
    }  
</style>