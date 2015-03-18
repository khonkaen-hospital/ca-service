<?php
/* @var $this AsthmaVisitController */
/* @var $model AsthmaVisit */

$this->breadcrumbs=array(
	'Asthma Visits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AsthmaVisit', 'url'=>array('index')),
	array('label'=>'Manage AsthmaVisit', 'url'=>array('admin')),
);
?>

<h1>Create AsthmaVisit</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'AllVisit' => $AllVisit)); ?>