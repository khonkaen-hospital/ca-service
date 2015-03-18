<?php $this->beginContent('//layouts/main'); ?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::app()->user->name?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="<?php echo Yii::app()->createUrl('/site/index/');?>">
                    <i class="fa fa-dashboard"></i> <span>หน้าหลัก</span></i>
                </a>
            </li>
            <li><a href="<?php echo Yii::app()->createUrl('/canVisit/createVisit/');?>"><i class="fa fa-plus"></i> ลงทะเบียน / บันทึกหัตการ</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('/canVisit/admin/');?>"><i class="fa fa-list"></i> รายการผู้ป่วยรับหัตถการ</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('/canVisit/ListCanRegis/');?>"><i class="fa fa-list"></i> รายชื่อผู้ป่วงลงทะเบียน</a></li>

            <li class="header">SETTING</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> เพิ่ม / แก้ไขหัตถการ</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $content; ?>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php $this->endWidget(); ?>