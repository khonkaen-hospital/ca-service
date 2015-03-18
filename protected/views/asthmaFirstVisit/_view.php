<?php
/* @var $this AsthmaFirstVisitController */
/* @var $data AsthmaFirstVisit */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('asthma_no')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->asthma_no), array('view', 'id'=>$data->asthma_no)); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('hn')); ?>:</b>
	<?php echo CHtml::encode($data->hn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('citizen_id')); ?>:</b>
	<?php echo CHtml::encode($data->citizen_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surname')); ?>:</b>
	<?php echo CHtml::encode($data->surname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender_id')); ?>:</b>
	<?php echo CHtml::encode($data->gender_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthdate')); ?>:</b>
	<?php echo CHtml::encode($data->birthdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asthma_start')); ?>:</b>
	<?php echo CHtml::encode($data->asthma_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asthma_duration')); ?>:</b>
	<?php echo CHtml::encode($data->asthma_duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asthma_cure')); ?>:</b>
	<?php echo CHtml::encode($data->asthma_cure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tw_month')); ?>:</b>
	<?php echo CHtml::encode($data->tw_month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tw_month_number')); ?>:</b>
	<?php echo CHtml::encode($data->tw_month_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tw_month_night')); ?>:</b>
	<?php echo CHtml::encode($data->tw_month_night); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tw_emer')); ?>:</b>
	<?php echo CHtml::encode($data->tw_emer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tw_emer_number')); ?>:</b>
	<?php echo CHtml::encode($data->tw_emer_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_b2agonisitinhaler')); ?>:</b>
	<?php echo CHtml::encode($data->curr_b2agonisitinhaler); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_b2agonisitinhaler_detail')); ?>:</b>
	<?php echo CHtml::encode($data->curr_b2agonisitinhaler_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_agonisttab')); ?>:</b>
	<?php echo CHtml::encode($data->curr_agonisttab); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_agonisttab_detail')); ?>:</b>
	<?php echo CHtml::encode($data->curr_agonisttab_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_theophylline')); ?>:</b>
	<?php echo CHtml::encode($data->curr_theophylline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_theophylline_detail')); ?>:</b>
	<?php echo CHtml::encode($data->curr_theophylline_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_steroidinhaler')); ?>:</b>
	<?php echo CHtml::encode($data->curr_steroidinhaler); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_steroidinhaler_detail')); ?>:</b>
	<?php echo CHtml::encode($data->curr_steroidinhaler_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_oralsteroid')); ?>:</b>
	<?php echo CHtml::encode($data->curr_oralsteroid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_oralsteroid_detail')); ?>:</b>
	<?php echo CHtml::encode($data->curr_oralsteroid_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_b2lpratropium')); ?>:</b>
	<?php echo CHtml::encode($data->curr_b2lpratropium); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_b2lpratropium_detail')); ?>:</b>
	<?php echo CHtml::encode($data->curr_b2lpratropium_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_b2icsinhaler')); ?>:</b>
	<?php echo CHtml::encode($data->curr_b2icsinhaler); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_b2icsinhaler_detail')); ?>:</b>
	<?php echo CHtml::encode($data->curr_b2icsinhaler_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_antilenkotriene')); ?>:</b>
	<?php echo CHtml::encode($data->curr_antilenkotriene); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_antilenkotriene_detail')); ?>:</b>
	<?php echo CHtml::encode($data->curr_antilenkotriene_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_icspluslaba')); ?>:</b>
	<?php echo CHtml::encode($data->curr_icspluslaba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_icspluslaba_detail')); ?>:</b>
	<?php echo CHtml::encode($data->curr_icspluslaba_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_tiotropium')); ?>:</b>
	<?php echo CHtml::encode($data->curr_tiotropium); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curr_tiotropium_detail')); ?>:</b>
	<?php echo CHtml::encode($data->curr_tiotropium_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lung_test')); ?>:</b>
	<?php echo CHtml::encode($data->lung_test); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('smoke')); ?>:</b>
	<?php echo CHtml::encode($data->smoke); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('smoke_curr')); ?>:</b>
	<?php echo CHtml::encode($data->smoke_curr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('smoke_start')); ?>:</b>
	<?php echo CHtml::encode($data->smoke_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('smoke_stop')); ?>:</b>
	<?php echo CHtml::encode($data->smoke_stop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('smoking')); ?>:</b>
	<?php echo CHtml::encode($data->smoking); ?>
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

	*/ ?>

</div>