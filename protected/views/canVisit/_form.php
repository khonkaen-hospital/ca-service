



<?php
//foreach (Yii::app()->user->getFlashes() as $key => $message) {
//    echo '<div style="color: red;" class="flash-' . $key . '">' . $message . "</div>\n";
//}
?>

<div class="row">
    <?php //echo CHtml::label('เคยมารับบริการที่ศูนย์มะเร็งหรือไม่', '') ?>
    <?php
    //   echo CHtml::radioButtonList('rdRN', '', array(1 => 'เคย (ใช้เลขที่ RN)', 0 => 'ไม่เคย (ใช้เลขที่ HN)'), array(
//        'labelOptions' => array('style' => 'display:inline'),
//        'separator' => '',
//        'onclick' => 'handleClick(this)',
//        'disabled' => (Yii::app()->controller->action->id == 'update') ? true : false,
//    ));
    ?>
</div>
<?php
$form = $this->beginWidget(
        'booster.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'action' => Yii::app()->createUrl('canvisit/createVisit'),
    'htmlOptions' => array(), // for inset effect
        )
);
?>
<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtHn">HN</label>
            <?php echo CHtml::textField('txtHn', '', array('class' => 'form-control', 'id' => 'txtHn', 'maxlength' => 8, 'placeholder' => 'กรอก HN ผู้ป่วย')) ?>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtRn">RN</label>
            <?php echo CHtml::textField('txtRn', '', array('class' => 'form-control', 'id' => 'txtRn', 'readonly' => true)) ?>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtVn">VN</label>
            <?php echo CHtml::textField('txtVn', '', array('class' => 'form-control', 'id' => 'txtVn', 'readonly' => true)) ?>
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtAn">AN</label>
            <?php echo CHtml::textField('txtAn', '', array('class' => 'form-control', 'id' => 'txtAn', 'readonly' => true)) ?>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtFullname">ชื่อนามสกุล</label>
            <?php echo CHtml::textField('txtFullname', '', array('class' => 'form-control', 'id' => 'txtFullname', 'readonly' => true)) ?>
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtDateIn">วันที่เข้ารับการรักษาล่าสุด</label>
            <?php echo CHtml::textField('txtDateIn', '', array('class' => 'form-control', 'id' => 'txtDateIn', 'readonly' => true)) ?>
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtNoPtt">เลขที่สิทธิ์</label>
            <?php echo CHtml::textField('txtNoPtt', '', array('class' => 'form-control', 'id' => 'txtNoPtt', 'readonly' => true)) ?>
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtPttType">ประเภทสิทธิ์</label>
            <?php echo CHtml::textField('txtPttType', '', array('class' => 'form-control', 'id' => 'txtPttType', 'readonly' => true)) ?>
        </div>
    </div>
</div>

<?php
$this->widget('booster.widgets.TbGroupGridView', array(
    'id' => 'gridcust',
    'type' => 'striped bordered condensed',
    'dataProvider' => $gridDataProvider,
    'template' => '{items}',
    'columns' => array(
        array(
            'header' => 'ประเภท',
            'name' => 'gname',
        //'headerHtmlOptions' => array('style' => 'text-align:center'),
        ),
        array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => 2,
            'id' => 'ids',
            'value' => '$data["code_rtx"].":".$data["price"]',
            'checked' => '$data["chk"] != null?1:0',
        ),
        array(
            'header' => 'จำนวน',
            'type' => 'raw',
            'value' => 'CHtml::numberField("txtQty"."[".$data[\'code_rtx\']."]", "1", array("style" => "height: 30px; width: 50px;", "class" => "form-control"))?>'
        ),
        array(
            'header' => 'รหัส',
            'name' => 'code_rtx',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
        ),
        array(
            'header' => 'ชื่อ',
            'name' => 'op_name',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
        ),
        array(
            'header' => 'ราคา/ครั้ง',
            'name' => 'price',
            'type' => 'number',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
            'htmlOptions' => array('style' => 'text-align: right;')
        )
    ),
    'mergeColumns' => array('gname'),
    'htmlOptions' => array('class' => 'control-group')
));
?>

<hr>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <?php
        $this->widget(
                'booster.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'บันทึก', 'htmlOptions' => array('class' => 'btn-block btn-primary btn-flat'))
        );
        ?>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">

        <?php
        $this->widget(
                'booster.widgets.TbButton', array(
            'buttonType' => 'reset',
            'label' => 'ยกเลิก',
            'htmlOptions' => array('class' => 'btn-block btn-danger btn-flat')
                )
        );
        ?>
    </div>
</div>

<?php $this->endWidget(); ?>

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
                        $('#txtRn').val(data.rn);
                        $('#txtAn').val(data.an);
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
                $('#txtRn').val('');
                $('#txtFullname').val('');
                $('#txtAn').val('');


            }
            ;
        });
    });

    jQuery(function ($) {

        jQuery('#CargoespecSearch').on('removed', function (e) {
            var rdValue = document.getElementById("chkSelect").value;
            //$('#can-visit-form')[0].reset();
            $(':input', '#can-visit-form')
                    .not(':button, :submit, :reset, #rdRN_1, #rdRN_0')
                    .val('');
            //.removeAttr('checked');
            //.removeAttr('selected');
            $.fn.yiiGridView.update("posts-grid", {
                data: {'hn': ''}
            });

        });

        $("#CargoespecSearch").on("selected", function (e) {

            $('#posts-grid').yiiGridView('update', {
                data: {hn: $("#CargoespecSearch").val()},
            });

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '<?php echo Yii::app()->createUrl('canVisit/FiltroCargoByHN') ?>',
                data: {hn: e.val},
                success: function (data) {

                }
                //                error: function(xhr, status, error){
                //                    alert(error);
                //                },
            })
                    .done(function (data) {
                        console.log(data);
                        $('#CanVisit_rn').val(data[0]['rn']);
                        $('#CanVisit_hn').val(data[0]['hn']);
                        $('#CanVisit_vn').val(data[0]['vn']);
                        $('#CanVisit_date_in').val(data[0]['date']);
                        $('#CanVisit_an').val(data[0]['an']);
                        $('#CanVisit_pttype').val(data[0]['text']);
                        $('#CanVisit_no_ptt').val(data[0]['no_ptt']);
                        $('#CanVisit_expire').val(data[0]['expire']);
                    });
        }).on("change", function (e) {

        });
    });

</script>