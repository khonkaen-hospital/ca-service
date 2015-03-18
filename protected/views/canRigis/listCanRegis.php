
<h1>รายชื่อผู้ป่วยลงทะเบียน <span class="glyphicon glyphicon-folder-open"></span></h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'canRegis-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'hn',
        'rn',
        'patient.name',
//        array(
//            'header' => 'ชื่อ-นามสกุล',
//            'value' => 'CanRegis::getPatientName($data["name"])',
//        ),
        'address',
        'create_date'
//        array(
//            'class' => 'bootstrap.widgets.BsButtonColumn',
//            'template' => '{view} {update} {delete}',
//            'viewButtonUrl' => 'Yii::app()->createUrl("/inv/bidding/view", array("id" => $data[\'bidding_key\']))',
//            'deleteButtonUrl' => 'Yii::app()->createUrl("/inv/bidding/delete", array("id" => $data[\'bidding_key\']))',
//            'updateButtonUrl' => 'Yii::app()->createUrl("/inv/bidding/update", array("id" => $data[\'bidding_key\']))',
//        ),
    ),
));
?>
