<?php
/* @var $this AsthmaVisitController */
/* @var $model AsthmaVisit */

$this->breadcrumbs=array(
	'Asthma Visits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AsthmaVisit', 'url'=>array('index')),
	array('label'=>'Create AsthmaVisit', 'url'=>array('create')),
	array('label'=>'View AsthmaVisit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AsthmaVisit', 'url'=>array('admin')),
);
?>

<h1>Update AsthmaVisit <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>