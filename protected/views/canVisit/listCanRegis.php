<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - List Register RN';
$this->breadcrumbs = array(
    'List Register RN',
);
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">รายชื่อผู้ป่วยลงทะเบียน</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'id' => 'canRegis-grid',
            'type' => 'striped bordered condensed',
            'dataProvider' => $dataProvider,
            'summaryText' => 'Display {start} - {end} of {count} ',
            'columns' => array(
        array(
            'header' => 'No',
            'value' => '$row+1+($this->grid->dataProvider->pagination->currentPage
                                        * $this->grid->dataProvider->pagination->pageSize)'
        ),
                array(
                    'header' => 'HN',
                    'value' => '$data["hn"]',
                ),
                array(
                    'header' => 'RN',
                    'value' => '$data["rn"]',
                ),
                array(
                    'header' => 'ชื่อ-นามสกุล',
                    'type' => 'raw',
                    'value' => '$data["title"]." ".$data["name"]." ".$data["surname"]',
                ),
                array(
                    'header' => 'ที่อยู่',
                    'value' => '$data["address"]'
                ),
                array(
                    'header' => 'วันที่ลงทะเบียน',
                    'value' => 'CanRegis::setDateTh(Yii::app()->dateFormatter->formatDateTime($data["create_date"] ,"medium",False))'
                ),
                array(
                    'htmlOptions' => array('nowrap' => 'nowrap'),
                    'class' => 'booster.widgets.TbButtonColumn',
                    'template' => '{print} พิมพ์ | {delete} ลบ',
                    'buttons' => array(
                        'print' => array(
                            'icon' => 'print',
                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'พิมพ์สติกเกอร์ RN'), 'target' => '_blank'),
                            'url' => 'Yii::app()->createUrl("/canVisit/printRn", array("id"=>$data["rn"]))',
                        )),
                    'viewButtonUrl' => 'Yii::app()->createUrl("/inv/bidding/view", array("id" => $data[\'rn\']))',
                    'deleteButtonUrl' => 'Yii::app()->createUrl("/canVisit/deleteRegis", array("id" => $data[\'rn\']))',
                    'updateButtonUrl' => 'Yii::app()->createUrl("/inv/bidding/update", array("id" => $data[\'rn\']))',
                ),
            ),
        ));
        ?>
    </div><!-- /.box-body -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#txtHn').keyup(function () {
            if ($(this).val().length == 8) {
                var data = $('#txtHn').val();
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: '<?php echo Yii::app()->createAbsoluteUrl("canVisit/getPatientByHn"); ?>',
                    data: {hn: data},
                    success: function (data) {
                        $('#txtVn').val(data.vn);
                        $('#txtDateIn').val(data.date);
                        $('#txtPttType').val(data.pttype);
                        $('#txtNoPtt').val(data.no_ptt);
                        $('#txtFullname').val(data.fullname);
                    },
                    error: function (data) { // if error occured
                        alert('เกิดข้อผิดพลาด ไม่พบข้อมูล');
                    }
                });
            } else {

                $('#txtVn').val('');
                $('#txtDateIn').val('');
                $('#txtPttType').val('');
                $('#txtNoPtt').val('');
            }
            ;
        });
    });
</script>