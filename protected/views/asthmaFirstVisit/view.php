<?php
/* @var $this AsthmaFirstVisitController */
/* @var $model AsthmaFirstVisit */

$this->breadcrumbs=array(
	'Asthma First Visits'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AsthmaFirstVisit', 'url'=>array('index')),
	array('label'=>'Create AsthmaFirstVisit', 'url'=>array('create')),
	array('label'=>'Update AsthmaFirstVisit', 'url'=>array('update', 'id'=>$model->asthma_no)),
	array('label'=>'Delete AsthmaFirstVisit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->hn),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AsthmaFirstVisit', 'url'=>array('admin')),
);
?>

<h1>View AsthmaFirstVisit #<?php echo $model->hn; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'hn',
		'citizen_id',
		'asthma_no',
		'name',
		'surname',
		'gender_id',
		'address',
		'phone',
		'birthdate',
		'weight',
		'height',
		'asthma_start',
		'asthma_duration',
		'asthma_cure',
		'tw_month',
		'tw_month_number',
		'tw_month_night',
		'tw_emer',
		'tw_emer_number',
		'curr_b2agonisitinhaler',
		'curr_b2agonisitinhaler_detail',
		'curr_agonisttab',
		'curr_agonisttab_detail',
		'curr_theophylline',
		'curr_theophylline_detail',
		'curr_steroidinhaler',
		'curr_steroidinhaler_detail',
		'curr_oralsteroid',
		'curr_oralsteroid_detail',
		'curr_b2lpratropium',
		'curr_b2lpratropium_detail',
		'curr_b2icsinhaler',
		'curr_b2icsinhaler_detail',
		'curr_antilenkotriene',
		'curr_antilenkotriene_detail',
		'curr_icspluslaba',
		'curr_icspluslaba_detail',
		'curr_tiotropium',
		'curr_tiotropium_detail',
		'lung_test',
		'smoke',
		'smoke_curr',
		'smoke_start',
		'smoke_stop',
		'smoking',
                'lastyear_lungtest',
		'create_date',
		'update_date',
		'user_id',
	),
)); ?>
