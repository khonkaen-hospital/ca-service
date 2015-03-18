<?php
/* @var $this AsthmaFirstVisitController */
/* @var $model AsthmaFirstVisit */

$this->breadcrumbs=array(
	'Asthma First Visits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AsthmaFirstVisit', 'url'=>array('index')),
	array('label'=>'Manage AsthmaFirstVisit', 'url'=>array('admin')),
);
?>

<h1>Easy Asthma Clinic Research On Line</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>