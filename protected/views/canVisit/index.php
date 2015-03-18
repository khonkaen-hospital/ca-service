<?php
/* @var $this CanVisitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Can Visits',
);

$this->menu = array(
    array('label' => ' บันทึกข้อมูล', 'url' => array('create'), 'itemOptions' => array('class' => 'glyphicon glyphicon-plus')),
    array('label' => ' จัดการข้อมูล', 'url' => array('admin'), 'itemOptions' => array('class' => 'glyphicon glyphicon-folder-open')),
);
?>

<h1>ข้อมูลทั้งหมด <span class="glyphicon glyphicon-list" aria-hidden="true"></span></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
