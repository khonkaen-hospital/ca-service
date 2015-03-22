



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
            <?php echo CHtml::textField('txtHn', $model->hn != null ? $model->hn : "", array('class' => 'form-control', 'id' => 'txtHn', 'maxlength' => 8, 'placeholder' => 'กรอก HN ผู้ป่วย')) ?>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtRn">RN</label>
            <?php echo CHtml::textField('txtRn', $model->rn != null ? $model->rn : "", array('class' => 'form-control', 'id' => 'txtRn', 'readonly' => true)) ?>
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtAn">AN</label>
            <?php echo CHtml::textField('txtAn', $model->rn != null ? $model->rn : "", array('class' => 'form-control', 'id' => 'txtAn', 'readonly' => true)) ?>
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtVn">VN</label>
            <?php echo CHtml::textField('txtVn', $model->vn != null ? $model->vn : "", array('class' => 'form-control', 'id' => 'txtVn', 'readonly' => true)) ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtFullname">ชื่อนามสกุล</label>
            <?php echo CHtml::textField('txtFullname', $fullName != null ? $fullName : "", array('class' => 'form-control', 'id' => 'txtFullname', 'readonly' => true)) ?>
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtDateIn">วันที่เข้ารับการรักษาล่าสุด</label>
            <?php echo CHtml::textField('txtDateIn', $model->date_in, array('class' => 'form-control', 'id' => 'txtDateIn', 'readonly' => true)) ?>
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtNoPtt">เลขที่สิทธิ์</label>
            <?php echo CHtml::textField('txtNoPtt', $model->no_ptt, array('class' => 'form-control', 'id' => 'txtNoPtt', 'readonly' => true)) ?>
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <label class="control-label" for="txtPttType">ประเภทสิทธิ์</label>
            <?php echo CHtml::textField('txtPttType', $model->pttype, array('class' => 'form-control', 'id' => 'txtPttType', 'readonly' => true)) ?>
        </div>
    </div>
</div>
<?php ob_start(); ?>
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
            'header' => 'จำนวนครั้ง',
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
            'value' => 'CHtml::hiddenField("txtPrice", $data["price"], array("class" => "txtPrice")).$data["price"]',
            'type' => 'raw',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
            'htmlOptions' => array('style' => 'text-align: right;')
        ),
        array(
            'header' => 'ราคารวม',
            'type' => 'raw',
            'value' => 'CHtml::textField("txtTotal", "0", array("class" => "from-control txtTotal", "readonly" => true, "style" => "color: green; text-align:right;"))',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
        ),
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
<?php $doc = ob_get_clean(); ?>


<?php ob_start(); ?>
<?php
$this->widget('booster.widgets.TbGroupGridView', array(
    'id' => 'gridcust_surse',
    'type' => 'striped bordered condensed',
    'dataProvider' => $gridDataProvider_ca_nurse,
//    'template' => '{items}',
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$row+1+($this->grid->dataProvider->pagination->currentPage
                                        * $this->grid->dataProvider->pagination->pageSize)'
        ),
        array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => 2,
            'id' => 'ids',
            'value' => '$data["code_rtx"].":".$data["price"]',
            'checked' => '$data["chk"] != null?1:0',
        ),
        array(
            'header' => 'จำนวนครั้ง',
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
            'name' => 'name',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
        ),
        array(
            'header' => 'ราคา/ครั้ง',
            'name' => 'price',
            'value' => 'CHtml::hiddenField("txtPrice", $data["price"], array("class" => "txtPrice")).$data["price"]',
            'type' => 'raw',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
            'htmlOptions' => array('style' => 'text-align: right;')
        ),
        array(
            'header' => 'ราคารวม',
            'type' => 'raw',
            'value' => 'CHtml::textField("txtTotal", "0", array("class" => "from-control txtTotal", "readonly" => true, "style" => "color: green; text-align:right;"))',
            'headerHtmlOptions' => array('style' => 'text-align:center'),
        ),
    ),
        ////'mergeColumns' => array('gname'),
        //'htmlOptions' => array('class' => 'control-group')
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
<?php $doc_surse = ob_get_clean(); ?>

<hr>
<?php
$this->widget(
        'booster.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array(
            'label' => 'หัตถการแพทย์',
            'content' => $doc,
            'active' => true
        ),
        array(
            'label' => 'หัตถการพยาบาล',
            'content' => $doc_surse
        ),
    ),
        )
);
?>

<hr>

<?php $this->endWidget(); ?>

<script type="text/javascript">

    $(document).ready(function () {

        $("input[type=number][id*=txtQty]").on('change', function () {
            var qty = ($(this).val());
            var price = $(this).closest('tr').find("input[type=hidden][class*=txtPrice]").val();
            $(this).closest('tr').find("input[type=text][class*=txtTotal]").val(qty * price);
            console.log(qty * price);
        });

        $("input[type=number][id*=txtQty]").keyup(function () {
            var qty = ($(this).val());
            var price = $(this).closest('tr').find("input[type=hidden][class*=txtPrice]").val();
            $(this).closest('tr').find("input[type=text][class*=txtTotal]").val(qty * price);
            console.log(qty * price);
        });

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



//        $("input").live(':checked', function () {
//        
//        alert($(this).val());
//
//            var datas = [];
//            var product_code = '';
//
//            $(this).parent().parent().parent().find('tr').each(function () {
//                var txtQty = parseInt($(this).find("td:eq(5) input[type=text][id*=qty_order]").val());
//                var totalCheck = 0;
//                var max = parseInt($(this).closest('tr').find("input[type=text][id*=default_qty]").val());
////                var max = parseInt($(this).find("td:eq(4) input[type=text][id*=default_qty]").val());
//                if (product_code != $(this).find('td:first').text()) {
//                    product_code = $(this).find('td:first').text()
//                }
//
//                totalCheck = (typeof datas[product_code] == 'undefined' ? 0 : datas[product_code]) + txtQty;
//                if (totalCheck <= max) {
//                    datas[product_code] = totalCheck;
//                } else {
//                    alert('เกิดข้อผิดพลาด!! จำนวนที่รับมากว่าจำนวนที่สั่งซื้อ');
//                    $(this).closest('tr').find("input[type=text][id*=qty_order]").val(0);
//                    return false;
//                }
//
//            });
//
//            console.log(datas);
//
//
//            console.log($(this).parent().parent().find());
//
//            var price1 = $(this).closest('tr').find("input[type=text][id*=txtCalcPrice]").val();
//
//            var val1 = $(this).closest('tr').find("input[type=text][id*=qty_order]").val();
//
//            $(this).closest('tr').find("input[type=text][class*=total_cost]").val(price1 * val1);
//
//            var gross;
//            gross = 0;
//            $("input[type=text][class*=total_cost]").each(function (index, item) {
//                gross = gross + parseInt($(item).val());
//            });
//            console.log($(this).parent().parent().find());
//
//            var price1 = $(this).closest('tr').find("input[type=text][id*=txtCalcPrice]").val();
//
//            var val1 = $(this).closest('tr').find("input[type=text][id*=qty_order]").val();
//
//            $(this).closest('tr').find("input[type=text][class*=total_cost]").val(price1 * val1);
//
//            var gross;
//            gross = 0;
//            $("input[type=text][class*=total_cost]").each(function (index, item) {
//                gross = gross + parseInt($(item).val());
//            });
//        })
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