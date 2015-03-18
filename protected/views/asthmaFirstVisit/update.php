<?php
/* @var $this AsthmaFirstVisitController */
/* @var $model AsthmaFirstVisit */

$this->breadcrumbs=array(
	'Asthma First Visits'=>array('index'),
	$model->name=>array('view','id'=>$model->hn),
	'Update',
);

$this->menu=array(
	array('label'=>'List AsthmaFirstVisit', 'url'=>array('index')),
	array('label'=>'Create AsthmaFirstVisit', 'url'=>array('create')),
	array('label'=>'View AsthmaFirstVisit', 'url'=>array('view', 'id'=>$model->asthma_no)),
	array('label'=>'Manage AsthmaFirstVisit', 'url'=>array('admin')),
);
?>

<h1>Update AsthmaFirstVisit asthma no is: <?php echo $model->asthma_no; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>