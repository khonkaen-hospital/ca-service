<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
    'Contact',
);
?>

<h1>Contact Us</h1>

<?php if (Yii::app()->user->hasFlash('contact')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

<?php else: ?>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="form">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'contact-form',
            'enableAjaxValidation' => true,
            //'htmlOptions' => array('class' => 'well'),
            'type' => 'horizontal',
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textFieldRow($model, 'name', array('class' => 'span6')); ?>

        <?php echo $form->textFieldRow($model, 'email', array('class' => 'span6')); ?>  

        <?php echo $form->textFieldRow($model, 'subject', array('size' => 60, 'maxlength' => 128, 'class' => 'span6')); ?>

        <?php echo $form->textAreaRow($model, 'body', array('rows' => 6, 'cols' => 50, 'class' => 'span6')); ?>


        <?php if (CCaptcha::checkRequirements()): ?>
            <div class="row">
                <?php echo $form->labelEx($model, 'verifyCode'); ?>
                <div>
                    <?php $this->widget('CCaptcha'); ?>
                    <?php echo $form->textField($model, 'verifyCode'); ?>
                </div>
                <div class="hint">Please enter the letters as they are shown in the image above.
                    <br/>Letters are not case-sensitive.</div>
                <?php echo $form->error($model, 'verifyCode'); ?>
            </div>
        <?php endif; ?>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->

<?php endif; ?>