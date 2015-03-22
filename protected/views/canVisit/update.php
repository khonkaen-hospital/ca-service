<?php
/* @var $this CanVisitController */
/* @var $model CanVisit */

$this->breadcrumbs = array(
    'Can Visits' => array('index'),
    $model->rn => array('view', 'id' => $model->rn),
    'Update',
);

$this->menu = array(
    array('label' => ' List CanVisit', 'url' => array('index')),
    array('label' => ' เพิ่มข้อมูล', 'url' => array('create'), 'itemOptions' => array('class' => 'glyphicon glyphicon-plus')),
    array('label' => ' View CanVisit', 'url' => array('view', 'id' => $model->rn)),
    array('label' => ' จัดการข้อมูล', 'url' => array('admin'), 'itemOptions' => array('class' => 'glyphicon glyphicon-folder-open')),
);
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">แก้ไขหัตถการ HN: <?php echo $model->hn; ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        
        <?php
        $patient = Patient::model()->findByAttributes(array('hn' => $model->hn));
        $fullName = $patient->title . " " . $patient->name . " " . $patient->surname;
        ?>

        <?php
        echo $this->renderPartial('_form', array('model' => $model,
            'dataProvider' => $dataProvider,
            'fullName' => $fullName,
            'gridDataProvider' => $gridDataProvider
        ));
        ?>

    </div>
</div>