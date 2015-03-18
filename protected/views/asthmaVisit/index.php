<?php
/* @var $this AsthmaVisitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Asthma Visits',
);

$this->menu=array(
	array('label'=>'Create AsthmaVisit', 'url'=>array('create')),
	array('label'=>'Manage AsthmaVisit', 'url'=>array('admin')),
);
?>

<h1>Asthma Visits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
