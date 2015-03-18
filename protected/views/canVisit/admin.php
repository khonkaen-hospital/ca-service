
<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Manage';
$this->breadcrumbs = array(
    'Manage',
);
?>
<?php
$this->menu = array(
    array('label' => ' ข้อมูลทั้งหมด', 'url' => array('index'), 'itemOptions' => array('class' => 'glyphicon glyphicon-list')),
    array('label' => ' บันทึกข้อมูล', 'url' => array('create'), 'itemOptions' => array('class' => 'glyphicon glyphicon-plus')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#can-visit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">จัดการข้อมูฃลหัตถการ</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'id' => 'can-visit-grid',
            'type' => 'striped bordered condensed',
            'dataProvider' => $dataProvider,
            'columns' => array(
                array(
                    'header' => 'No',
                    'value' => '$row+1+($this->grid->dataProvider->pagination->currentPage
                                        * $this->grid->dataProvider->pagination->pageSize)'
                ),
                array(
                    'header' => 'RN',
                    'value' => '$data["rn"]'
                ),
                array(
                    'header' => 'HN',
                    'value' => '$data["hn"]'
                ),
                array(
                    'header' => 'VN',
                    'value' => '$data["vn"]'
                ),
                array(
                    'header' => 'ชื่อ-นามสกุล',
                    'value' => '$data["title"]." ". $data["name"]. " ". $data["surname"]'
                ),
                array(
                    'header' => 'อายุ',
                    'value' => '$data["age"]'
                ),
                array(
                    'header' => 'วันที่',
                    'value' => 'CanRegis::setDateTh(Yii::app()->dateFormatter->formatDateTime($data["date_in"] ,"medium",False))'
                ),
                array(
                    'class' => 'booster.widgets.TbButtonColumn',
                    'htmlOptions' => array('nowrap' => 'nowrap'),
                    'template' => '{view} แสดง | {update} แก้ไข',
                    'viewButtonUrl' => 'Yii::app()->createUrl("canVisit/view/", array("id" => $data[\'id\']))',
                    'deleteButtonUrl' => 'Yii::app()->createUrl("canVisit/delete/", array("id" => $data[\'id\']))',
                    'updateButtonUrl' => 'Yii::app()->createUrl("canVisit/update/", array("id" => $data[\'id\']))',
                ),
//        'code_rtx',
//        'nhso',
            )
        ));
        ?>
    </div><!-- /.box-body -->
</div>


