<?php
/* @var $this AsthmaVisitController */
/* @var $model AsthmaVisit */

$this->breadcrumbs = array(
    'Asthma Visits' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List AsthmaVisit', 'url' => array('index')),
    array('label' => 'Create AsthmaVisit', 'url' => array('create')),
    array('label' => 'Update AsthmaVisit', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete AsthmaVisit', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage AsthmaVisit', 'url' => array('admin')),
);
?>

<h1>View AsthmaVisit #<?php echo $model->id; ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php

//$this->widget('bootstrap.widgets.TbDetailView', array(
//    'data' => $model,
//    'attributes' => array(
//        'id',
//        'hn',
//        'asthma_no',
//        'visitdate',
//        'age',
//        'weight',
//        'height',
//        'ppefr',
//        array('name' => 'q1', 'value' =>''),
//        array('name' => 'q2', 'value' => ($model->q2 != 0 ? '' : 'ไม่มี')),
//        array('name' => 'q3', 'value' => ($model->q3 != 0 ? '' : 'ไม่ใช้')),
//        array('name' => 'q4', 'value' => ($model->q4 != 0 ? '' : 'ไม่เคย')),
//        'q4_detail',
//        'q5',
//        'q5_admid',
//        'q5_admid_hosp',
//        'q6',
//        'q6_detail',
//        'q7',
//        'q7_detail',
//        'q7_1_1',
//        'q7_1_2',
//        'q7_1_3',
//        'q7_2_1',
//        'q7_2_2',
//        'q7_2_3',
//        'q7_3_1',
//        'q7_3_2',
//        'q7_3_3',
//        'q7_4_1',
//        'q7_5_1',
//        'q7_5_2',
//        'q7_5_3',
//        'q7_6_1',
//        'q7_6_2',
//        'q7_6_3',
//        'q7_7_1',
//        'q7_7_2',
//        'q7_7_3',
//        'q8',
//        'q8_detail',
//        'q9',
//        'q9_detail',
//        'q10',
//        'q11',
//        'q12',
//        'q12_detail',
//        'q13',
//        'q14_1',
//        'q14_2',
//        'q14_3',
//        'q15',
//        'q16',
//        'q17',
//        'q18',
//        'q19',
//        'q20',
//        'q20_detail',
//        'create_date',
//        'update_date',
//        'user_id',
//        'status_id',
//    ),
//));
?>
