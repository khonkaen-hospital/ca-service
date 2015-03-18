
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'changepassword-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <?php echo $form->labelEx($model, 'username'); ?>
    <?php echo $form->textField($model, 'username'); ?>
    <?php //echo $form->error($model, 'username'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'oldPassword'); ?>
    <?php echo $form->textField($model, 'oldPassword'); ?>
    <?php //echo $form->error($model, 'oldPassword'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'password'); ?>
    <?php echo $form->textField($model, 'password'); ?>
    <?php //echo $form->error($model, 'password'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'verifyPassword'); ?>
    <?php echo $form->textField($model, 'verifyPassword'); ?>
    <?php //echo $form->error($model, 'verifyPassword'); ?>
</div>
<input type="submit" value="submit" />

<?php $this->endWidget(); ?>
