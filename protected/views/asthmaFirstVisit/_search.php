<?php
/* @var $this AsthmaFirstVisitController */
/* @var $model AsthmaFirstVisit */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'hn'); ?>
		<?php echo $form->textField($model,'hn',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'citizen_id'); ?>
		<?php echo $form->textField($model,'citizen_id',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asthma_no'); ?>
		<?php echo $form->textField($model,'asthma_no',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'surname'); ?>
		<?php echo $form->textField($model,'surname',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender_id'); ?>
		<?php echo $form->textField($model,'gender_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthdate'); ?>
		<?php echo $form->textField($model,'birthdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weight'); ?>
		<?php echo $form->textField($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height'); ?>
		<?php echo $form->textField($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asthma_start'); ?>
		<?php echo $form->textField($model,'asthma_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asthma_duration'); ?>
		<?php echo $form->textField($model,'asthma_duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asthma_cure'); ?>
		<?php echo $form->textField($model,'asthma_cure'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tw_month'); ?>
		<?php echo $form->textField($model,'tw_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tw_month_number'); ?>
		<?php echo $form->textField($model,'tw_month_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tw_month_night'); ?>
		<?php echo $form->textField($model,'tw_month_night'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tw_emer'); ?>
		<?php echo $form->textField($model,'tw_emer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tw_emer_number'); ?>
		<?php echo $form->textField($model,'tw_emer_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_b2agonisitinhaler'); ?>
		<?php echo $form->textField($model,'curr_b2agonisitinhaler'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_b2agonisitinhaler_detail'); ?>
		<?php echo $form->textField($model,'curr_b2agonisitinhaler_detail',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_agonisttab'); ?>
		<?php echo $form->textField($model,'curr_agonisttab'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_agonisttab_detail'); ?>
		<?php echo $form->textField($model,'curr_agonisttab_detail',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_theophylline'); ?>
		<?php echo $form->textField($model,'curr_theophylline'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_theophylline_detail'); ?>
		<?php echo $form->textField($model,'curr_theophylline_detail',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_steroidinhaler'); ?>
		<?php echo $form->textField($model,'curr_steroidinhaler'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_steroidinhaler_detail'); ?>
		<?php echo $form->textField($model,'curr_steroidinhaler_detail',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_oralsteroid'); ?>
		<?php echo $form->textField($model,'curr_oralsteroid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_oralsteroid_detail'); ?>
		<?php echo $form->textField($model,'curr_oralsteroid_detail',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_b2lpratropium'); ?>
		<?php echo $form->textField($model,'curr_b2lpratropium'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_b2lpratropium_detail'); ?>
		<?php echo $form->textField($model,'curr_b2lpratropium_detail',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_b2icsinhaler'); ?>
		<?php echo $form->textField($model,'curr_b2icsinhaler'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_b2icsinhaler_detail'); ?>
		<?php echo $form->textField($model,'curr_b2icsinhaler_detail',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_antilenkotriene'); ?>
		<?php echo $form->textField($model,'curr_antilenkotriene'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_antilenkotriene_detail'); ?>
		<?php echo $form->textField($model,'curr_antilenkotriene_detail',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_icspluslaba'); ?>
		<?php echo $form->textField($model,'curr_icspluslaba'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_icspluslaba_detail'); ?>
		<?php echo $form->textField($model,'curr_icspluslaba_detail',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_tiotropium'); ?>
		<?php echo $form->textField($model,'curr_tiotropium'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curr_tiotropium_detail'); ?>
		<?php echo $form->textField($model,'curr_tiotropium_detail',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lung_test'); ?>
		<?php echo $form->textField($model,'lung_test'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'smoke'); ?>
		<?php echo $form->textField($model,'smoke'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'smoke_curr'); ?>
		<?php echo $form->textField($model,'smoke_curr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'smoke_start'); ?>
		<?php echo $form->textField($model,'smoke_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'smoke_stop'); ?>
		<?php echo $form->textField($model,'smoke_stop'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'smoking'); ?>
		<?php echo $form->textField($model,'smoking'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->