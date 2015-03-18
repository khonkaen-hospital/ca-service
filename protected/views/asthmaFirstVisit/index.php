<?php
/* @var $this AsthmaFirstVisitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Asthma First Visits',
);

$this->menu=array(
	array('label'=>'Create AsthmaFirstVisit', 'url'=>array('create')),
	array('label'=>'Manage AsthmaFirstVisit', 'url'=>array('admin')),
);
?>

<h1>Asthma First Visits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
