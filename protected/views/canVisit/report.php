<?php

$this->breadcrumbs = array(
    'Can Visits' => array('report'),
    'Report',
);

$this->menu = array(
    array('label' => 'รายงานจำนวนผู้ป่วยทั้งหมด', 'url' => array('report?id=1')),
    array('label' => 'รายงานจำนวนผู้ป่วยจำแนกตามประเภท', 'url' => array('report?id=2')),
    array('label' => 'รายงานค่ารักษาทั้งหมด', 'url' => array('report?id=3')),
    array('label' => 'รายงานค่ารักษาจำแนกตามประเภท', 'url' => array('report?id=4')),
);

?>
<h1>รายงาน</h1>
