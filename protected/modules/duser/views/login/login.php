



<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>KKH</b> CANCER</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">ใช้ Username และ Password เดียวกันกับที่ใช้ Login ตรวจสอบเงินเดือนหรือเข้าใช้อินเตอร์เน็ต</p>
            <div class="form">
                <?php
                $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                    'id' => 'login-form',
                    'type' => 'horizontal',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));
                ?>
                <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => 'Username')); ?>
                <span class="glyphicon glyphicon-grain form-control-feedback"></span>
                <br>
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Password')); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <br>
                <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary btn-block btn-flat')); ?>

            </div>
        </div>
    </div><!-- /.login-box-body -->
    <?php $this->endWidget(); ?>
