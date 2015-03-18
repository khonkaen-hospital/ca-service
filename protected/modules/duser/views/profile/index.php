<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3> รายละเอียดบัญชี</h3>
<?php
$office = Office::model()->findByPk($model->department)->name;
?>

<?php
$this->widget(
    'bootstrap.widgets.TbDetailView', array(
    'type' => 'bordered condensed',
    'data' => $model,
    'attributes' => array(
        array('name' => 'code', 'label' => 'Code'),
        array('name' => 'no', 'label' => 'No.'),
        array('name' => 'person_id', 'label' => 'Person ID'),
        array('label' => 'ชื่อ-นามสกุล', 'value' => $model->title . $model->name . ' ' . $model->surname . ' ' . ($model->nicname ? "({$model->nicname})" : '')),
        'position',
        array('label' => 'ประเภทตำแหน่ง', 'value' => $model->getPositionType()),
        array('label' => 'แผนก', 'value' => $office ? $office : ''),
        'bank_id',
        'email',
        array('label' => 'วันที่ปรับปรุงข้อมูล', 'value' => $model->lastupdate),
    ),
        )
)
?>