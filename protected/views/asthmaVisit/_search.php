<?php
/* @var $this AsthmaVisitController */
/* @var $model AsthmaVisit */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hn'); ?>
		<?php echo $form->textField($model,'hn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asthma_no'); ?>
		<?php echo $form->textField($model,'asthma_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visitdate'); ?>
		<?php echo $form->textField($model,'visitdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
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
		<?php echo $form->label($model,'ppefr'); ?>
		<?php echo $form->textField($model,'ppefr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q1'); ?>
		<?php echo $form->textField($model,'q1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q2'); ?>
		<?php echo $form->textField($model,'q2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q3'); ?>
		<?php echo $form->textField($model,'q3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q4'); ?>
		<?php echo $form->textField($model,'q4'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q4_detail'); ?>
		<?php echo $form->textField($model,'q4_detail',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q5'); ?>
		<?php echo $form->textField($model,'q5'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q5_admid'); ?>
		<?php echo $form->textField($model,'q5_admid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q5_admid_hosp'); ?>
		<?php echo $form->textField($model,'q5_admid_hosp',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q6'); ?>
		<?php echo $form->textField($model,'q6'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q6_detail'); ?>
		<?php echo $form->textField($model,'q6_detail',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7'); ?>
		<?php echo $form->textField($model,'q7'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_detail'); ?>
		<?php echo $form->textField($model,'q7_detail',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_1_1'); ?>
		<?php echo $form->textField($model,'q7_1_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_1_2'); ?>
		<?php echo $form->textField($model,'q7_1_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_1_3'); ?>
		<?php echo $form->textField($model,'q7_1_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_2_1'); ?>
		<?php echo $form->textField($model,'q7_2_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_2_2'); ?>
		<?php echo $form->textField($model,'q7_2_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_2_3'); ?>
		<?php echo $form->textField($model,'q7_2_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_3_1'); ?>
		<?php echo $form->textField($model,'q7_3_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_3_2'); ?>
		<?php echo $form->textField($model,'q7_3_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_3_3'); ?>
		<?php echo $form->textField($model,'q7_3_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_4_1'); ?>
		<?php echo $form->textField($model,'q7_4_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_5_1'); ?>
		<?php echo $form->textField($model,'q7_5_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_5_2'); ?>
		<?php echo $form->textField($model,'q7_5_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_5_3'); ?>
		<?php echo $form->textField($model,'q7_5_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_6_1'); ?>
		<?php echo $form->textField($model,'q7_6_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_6_2'); ?>
		<?php echo $form->textField($model,'q7_6_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_6_3'); ?>
		<?php echo $form->textField($model,'q7_6_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_7_1'); ?>
		<?php echo $form->textField($model,'q7_7_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_7_2'); ?>
		<?php echo $form->textField($model,'q7_7_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q7_7_3'); ?>
		<?php echo $form->textField($model,'q7_7_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q8'); ?>
		<?php echo $form->textField($model,'q8'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q8_detail'); ?>
		<?php echo $form->textField($model,'q8_detail',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q9'); ?>
		<?php echo $form->textField($model,'q9'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q9_detail'); ?>
		<?php echo $form->textField($model,'q9_detail',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q10'); ?>
		<?php echo $form->textField($model,'q10'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q11'); ?>
		<?php echo $form->textField($model,'q11'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q12'); ?>
		<?php echo $form->textField($model,'q12'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q12_detail'); ?>
		<?php echo $form->textField($model,'q12_detail',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q13'); ?>
		<?php echo $form->textField($model,'q13'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q14_1'); ?>
		<?php echo $form->textField($model,'q14_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q14_2'); ?>
		<?php echo $form->textField($model,'q14_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q14_3'); ?>
		<?php echo $form->textField($model,'q14_3',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q15'); ?>
		<?php echo $form->textField($model,'q15'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q16'); ?>
		<?php echo $form->textField($model,'q16'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q17'); ?>
		<?php echo $form->textField($model,'q17'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q18'); ?>
		<?php echo $form->textField($model,'q18'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q19'); ?>
		<?php echo $form->textField($model,'q19'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q20'); ?>
		<?php echo $form->textField($model,'q20'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q20_detail'); ?>
		<?php echo $form->textField($model,'q20_detail',array('size'=>60,'maxlength'=>200)); ?>
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

	<div class="row">
		<?php echo $form->label($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->