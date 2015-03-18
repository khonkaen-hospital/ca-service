<?php
/* @var $this CanVisitController */
/* @var $model CanVisit */

$this->breadcrumbs = array(
    'Can Visits' => array('index'),
    'Create',
);
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">บันทึกข้อมูลหัตถการ</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php
        echo $this->renderPartial('_form', array('model' => $model,
            'dataProvider' => $dataProvider,
            'gridDataProvider' => $gridDataProvider));
        ?>
    </div>
</div>