<?php
/* @var $this CanVisitController */
/* @var $model CanVisit */

$this->breadcrumbs=array(
	'Can Visits'=>array('index'),
	$model->rn=>array('view','id'=>$model->rn),
	'Update',
);

$this->menu=array(
	array('label'=>' List CanVisit', 'url'=>array('index')),
	array('label'=>' เพิ่มข้อมูล', 'url'=>array('create'), 'itemOptions' => array('class' => 'glyphicon glyphicon-plus')),
	array('label'=>' View CanVisit', 'url'=>array('view', 'id'=>$model->rn)),
	array('label'=>' จัดการข้อมูล', 'url'=>array('admin'), 'itemOptions' => array('class' => 'glyphicon glyphicon-folder-open')),
);
?>

<h1>แก้ไขข้อมูลผู้ป่วย รหัส: <?php echo $model->rn; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model , 'dataProvider' => $dataProvider,
        'gridDataProvider' => $gridDataProvider)); ?>