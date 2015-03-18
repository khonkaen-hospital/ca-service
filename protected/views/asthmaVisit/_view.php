<?php
/* @var $this AsthmaVisitController */
/* @var $data AsthmaVisit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hn')); ?>:</b>
	<?php echo CHtml::encode($data->hn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asthma_no')); ?>:</b>
	<?php echo CHtml::encode($data->asthma_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visitdate')); ?>:</b>
	<?php echo CHtml::encode($data->visitdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ppefr')); ?>:</b>
	<?php echo CHtml::encode($data->ppefr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q1')); ?>:</b>
	<?php echo CHtml::encode($data->q1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q2')); ?>:</b>
	<?php echo CHtml::encode($data->q2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q3')); ?>:</b>
	<?php echo CHtml::encode($data->q3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q4')); ?>:</b>
	<?php echo CHtml::encode($data->q4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q4_detail')); ?>:</b>
	<?php echo CHtml::encode($data->q4_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q5')); ?>:</b>
	<?php echo CHtml::encode($data->q5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q5_admid')); ?>:</b>
	<?php echo CHtml::encode($data->q5_admid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q5_admid_hosp')); ?>:</b>
	<?php echo CHtml::encode($data->q5_admid_hosp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q6')); ?>:</b>
	<?php echo CHtml::encode($data->q6); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q6_detail')); ?>:</b>
	<?php echo CHtml::encode($data->q6_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7')); ?>:</b>
	<?php echo CHtml::encode($data->q7); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_detail')); ?>:</b>
	<?php echo CHtml::encode($data->q7_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_1_1')); ?>:</b>
	<?php echo CHtml::encode($data->q7_1_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_1_2')); ?>:</b>
	<?php echo CHtml::encode($data->q7_1_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_1_3')); ?>:</b>
	<?php echo CHtml::encode($data->q7_1_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_2_1')); ?>:</b>
	<?php echo CHtml::encode($data->q7_2_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_2_2')); ?>:</b>
	<?php echo CHtml::encode($data->q7_2_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_2_3')); ?>:</b>
	<?php echo CHtml::encode($data->q7_2_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_3_1')); ?>:</b>
	<?php echo CHtml::encode($data->q7_3_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_3_2')); ?>:</b>
	<?php echo CHtml::encode($data->q7_3_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_3_3')); ?>:</b>
	<?php echo CHtml::encode($data->q7_3_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_4_1')); ?>:</b>
	<?php echo CHtml::encode($data->q7_4_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_5_1')); ?>:</b>
	<?php echo CHtml::encode($data->q7_5_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_5_2')); ?>:</b>
	<?php echo CHtml::encode($data->q7_5_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_5_3')); ?>:</b>
	<?php echo CHtml::encode($data->q7_5_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_6_1')); ?>:</b>
	<?php echo CHtml::encode($data->q7_6_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_6_2')); ?>:</b>
	<?php echo CHtml::encode($data->q7_6_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_6_3')); ?>:</b>
	<?php echo CHtml::encode($data->q7_6_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_7_1')); ?>:</b>
	<?php echo CHtml::encode($data->q7_7_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_7_2')); ?>:</b>
	<?php echo CHtml::encode($data->q7_7_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q7_7_3')); ?>:</b>
	<?php echo CHtml::encode($data->q7_7_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q8')); ?>:</b>
	<?php echo CHtml::encode($data->q8); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q8_detail')); ?>:</b>
	<?php echo CHtml::encode($data->q8_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q9')); ?>:</b>
	<?php echo CHtml::encode($data->q9); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q9_detail')); ?>:</b>
	<?php echo CHtml::encode($data->q9_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q10')); ?>:</b>
	<?php echo CHtml::encode($data->q10); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q11')); ?>:</b>
	<?php echo CHtml::encode($data->q11); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q12')); ?>:</b>
	<?php echo CHtml::encode($data->q12); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q12_detail')); ?>:</b>
	<?php echo CHtml::encode($data->q12_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q13')); ?>:</b>
	<?php echo CHtml::encode($data->q13); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q14_1')); ?>:</b>
	<?php echo CHtml::encode($data->q14_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q14_2')); ?>:</b>
	<?php echo CHtml::encode($data->q14_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q14_3')); ?>:</b>
	<?php echo CHtml::encode($data->q14_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q15')); ?>:</b>
	<?php echo CHtml::encode($data->q15); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q16')); ?>:</b>
	<?php echo CHtml::encode($data->q16); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q17')); ?>:</b>
	<?php echo CHtml::encode($data->q17); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q18')); ?>:</b>
	<?php echo CHtml::encode($data->q18); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q19')); ?>:</b>
	<?php echo CHtml::encode($data->q19); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q20')); ?>:</b>
	<?php echo CHtml::encode($data->q20); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q20_detail')); ?>:</b>
	<?php echo CHtml::encode($data->q20_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_id); ?>
	<br />

	*/ ?>

</div>