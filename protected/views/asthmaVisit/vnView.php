<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'hn',
        'asthma_no',
        'visitdate',
        'age')));
?>