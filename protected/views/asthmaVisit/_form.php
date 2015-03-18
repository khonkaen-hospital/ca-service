<?php
/* @var $this AsthmaVisitController */
/* @var $model AsthmaVisit */
/* @var $form CActiveForm */
?>

<script type="text/javascript">
    var RDATA;
    //p2 = send value,p2 = chk value, p3 = ctlID
    function muFun(p1, p2, cId) {
        if (p1 === p2) {
            document.getElementById(cId).readOnly = false;
            return false;
        } else {
            document.getElementById(cId).readOnly = true;
            document.getElementById(cId).value = "";
            return false;
        }
    }
    function chkAction(act) {
        if (act === 'view') {
            $("#asthma-visit-form :input").attr("disabled", true);
        }
    }

    jQuery(function($) {
        $("#CargoespecSearch").on("selecting", function(e) {
        }).on("change", function(e) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '<?php echo Yii::app()->createUrl('asthmaVisit/FiltroCargoByHN') ?>',
                data: {hn: e.val}
            }).done(function(data) {
                console.log(data);
                $('#AsthmaVisit_hn').val(data['hn']);
                $('#AsthmaVisit_asthma_no').val(data['asthma_no']);
                var currentYear = (new Date).getFullYear();
                var birthyear = parseInt(data['birthdate']);
                $('#AsthmaVisit_age').val(currentYear - birthyear);
                if (data['hn'] !== '')
                {
                    //jQuery('#aVisit').yiiGridView();
                    $('#aVisit').yiiGridView('update', {
                        data: {'AllVisit': data['hn']}
                    });
                }
            });
        });
        chkAction('<?php echo Yii::app()->controller->action->id ?>');
    });
</script>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'asthma-visit-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => true,
    ));
    ?>


    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php
        echo CHtml::label('ค้นหาข้อมูลโดย HN', '');
        echo CHtml::hiddenField('CargoespecSearch', '', $model->chkAction(Yii::app()->controller->action->id));
        $this->widget('ext.select2.ESelect2', array(
            'selector' => '#CargoespecSearch',
            'options' => array(
                'allowClear' => true,
                'placeholder' => 'กรอก HN',
                'minimumInputLength' => 2,
                'ajax' => array(
                    'url' => Yii::app()->createUrl('AsthmaVisit/FirstAsthmaVisit'),
                    'dataType' => 'json',
                    'quietMillis' => 100,
                    'data' => 'js: function(text,page) {
                    return {
                        q: text, 
                        page_limit: 10,
                        page: page,
                    };
                }',
                    'results' => 'js:function(data,page) { 
                        var more = (page * 10) < data.total; 
                        console.log(data);
                        RDATA = data;
                        return {results: data, more:more }; 
                        
                        }',
                ),
            ),
        ));
        ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'hn', array('style' => 'margin-top: 9px;')); ?>
        <?php echo $form->textField($model, 'hn', array('style' => 'margin-top: 9px;')); ?>
        <?php echo $form->error($model, 'hn'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'asthma_no'); ?>
        <?php echo $form->textField($model, 'asthma_no'); ?>
        <?php echo $form->error($model, 'asthma_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'visitdate'); ?>
        <?php echo $form->textField($model, 'visitdate'); ?>
        <?php echo $form->error($model, 'visitdate'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'age'); ?>
        <?php echo $form->textField($model, 'age'); ?>
        <?php echo $form->error($model, 'age'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'weight'); ?>
        <?php echo $form->textField($model, 'weight'); ?>
        <?php echo $form->error($model, 'weight'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'height'); ?>
        <?php echo $form->textField($model, 'height'); ?>
        <?php echo $form->error($model, 'height'); ?>
    </div>
    <legend>ประวัติการรักษา</legend>
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'aVisit',
        'type' => 'condensed',
        'dataProvider' => $AllVisit,
        'template' => "{items}",
        'columns' => array(
            array('name' => 'vn', 'header' => 'Visit No.'),
            array('name' => 'date', 'header' => 'วันที่'),
            array('name' => 'time', 'header' => 'เวลา'),
            array('name' => 'dx1', 'header' => 'รหัสโรค'),
            array('name' => 'drname', 'header' => 'แพทย์'),
            array('name' => 'clinicname', 'header' => 'ห้องตรวจ'),
            array('name' => 'pttypename', 'header' => 'สิทธิ์'),
            array('name' => 'hospname', 'header' => 'Hosp Main'),
            array('name' => 'resulttext', 'header' => 'ผล'),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 50px'),
                'template' => '{view}',
                'buttons' => array(
                    'view' => array(
                        'url' => 'Yii::app()->createUrl("AsthmaVisit/VisitDetail", array(\'vn\' => $data["vn"]))',
                        //'click' => 'function() {$(".modal-body").load("' . Yii::app()->createUrl("AsthmaVisit/VisitDetail", array('vn' => $data["vn"])) . '",function(result){
                        //            $("#myModal").modal({show:true});}); return false;}'
                         'click' => 'function(){
                                                approve($(this).attr("href"));
                                                return false;
                                 }'
                    )
                )
            ),
        ),
    ));
    ?>
    <!-- Modal -->

    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Modal header</h3>
        </div>
        <div class="modal-body">
            <p><?php echo CHtml::textField('vn',''); ?></p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Save changes</button>
        </div>
    </div>

    <!--------------->
    <legend>แบบสอบถาม</legend>
    <div class="row">
        <?php echo $form->labelEx($model, 'ppefr'); ?>
        <?php echo $form->textField($model, 'ppefr'); ?>
        <?php echo $form->error($model, 'ppefr'); ?>
    </div>



    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q1'); ?>
        </div>
        <div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q1', CHtml::listData(DimQuestion::model()->findAllByAttributes(array('group_id' => 'q1')), 'orders', 'q_name'), array('separator' => ''));
            ?>
        </div>
        <?php echo $form->error($model, 'q1'); ?>
    </div>
    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q2'); ?>
        </div>
        <div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q2', CHtml::listData(DimQuestion::model()->findAllByAttributes(array('group_id' => 'q2')), 'orders', 'q_name'), array('separator' => ''));
            ?>
        </div>
        <?php echo $form->error($model, 'q2'); ?>
    </div>
    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q3'); ?>
        </div>
        <div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q3', CHtml::listData(DimQuestion::model()->findAllByAttributes(array('group_id' => 'q3')), 'orders', 'q_name'), array('separator' => ''));
            ?>
        </div>
        <?php echo $form->error($model, 'q3'); ?>
    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q4'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q4', array(
                0 => 'ไม่เคย',
                1 => 'เคย'), array('separator' => '', 'onchange' => 'return muFun(this.value,"1",\'AsthmaVisit_q4_detail\')'));
            ?>
            <?php echo $form->textField($model, 'q4_detail', array('size' => 30, 'maxlength' => 200)); ?>
            <?php echo $form->error($model, 'q4_detail'); ?>
        </div>
        <?php echo $form->error($model, 'q4'); ?>
    </div>

    <div class="row">
        <?php //echo $form->labelEx($model, 'q4_detail');    ?>
        <?php //echo $form->textField($model, 'q4_detail', array('size' => 60, 'maxlength' => 200));   ?>

    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q5'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q5', array(
                0 => 'ไม่เคย',
                1 => 'เคย'), array('separator' => '', 'onchange' => 'return muFun(this.value,"1",\'AsthmaVisit_q5_admid\')'));
            ?>
        </div>
        <?php echo $form->error($model, 'q5'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q5_admid', array('style' => 'padding-left: 60px;width: 210px;')); ?>
        <?php echo $form->textField($model, 'q5_admid'); ?>
        <?php echo $form->error($model, 'q5_admid'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q5_admid_hosp', array('style' => 'padding-left: 60px;width: 210px;')); ?>
        <?php echo $form->textField($model, 'q5_admid_hosp', array('size' => 60, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'q5_admid_hosp'); ?>
    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q6'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q6', array(
                0 => 'ไม่มี',
                1 => 'เชื้อราในปาก',
                2 => 'เสียงแหบ',
                3 => 'อื่นๆโปรดระบุ'), array('separator' => '', 'onchange' => 'return muFun(this.value,"3",\'AsthmaVisit_q6_detail\')'));
            ?>
        </div>
        <?php echo $form->error($model, 'q6'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q6_detail', array('style' => 'padding-left: 60px;width: 210px;')); ?>
        <?php echo $form->textField($model, 'q6_detail', array('size' => 60, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'q6_detail'); ?>
    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q7'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q7', array(
                0 => 'บันทึกผล',
                1 => 'ไม่ได้ peak flow เนื่องจาก'), array('separator' => '', 'onchange' => 'return muFun(this.value,"1",\'AsthmaVisit_q7_detail\')'));
            ?>
        </div>
        <?php echo $form->error($model, 'q7'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q7_detail'); ?>
        <?php echo $form->textField($model, 'q7_detail', array('size' => 60, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'q7_detail'); ?>
    </div>
    <div class="row">
        <div style="padding-left: 40px;">
            PRE
        </div>
    </div>
    <div class="row" style="padding-left: 40px;">
        <?php echo $form->labelEx($model, 'q7_1_1'); ?>
        <?php echo $form->textField($model, 'q7_1_1', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_1_1'); ?>

        <?php echo $form->labelEx($model, 'q7_1_2', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_1_2', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_1_2'); ?>

        <?php echo $form->labelEx($model, 'q7_1_3', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_1_3', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_1_3'); ?>
        &nbsp;&nbsp;%predicted
    </div>

    <div class="row" style="padding-left: 40px;">
        <?php echo $form->labelEx($model, 'q7_2_1'); ?>
        <?php echo $form->textField($model, 'q7_2_1', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_2_1'); ?>

        <?php echo $form->labelEx($model, 'q7_2_2', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_2_2', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_2_2'); ?>

        <?php echo $form->labelEx($model, 'q7_2_3', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_2_3', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_2_3'); ?>
        &nbsp;&nbsp;%predicted
    </div>

    <div class="row" style="padding-left: 40px;">
        <?php echo $form->labelEx($model, 'q7_3_1'); ?>
        <?php echo $form->textField($model, 'q7_3_1', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_3_1'); ?>

        <?php echo $form->labelEx($model, 'q7_3_2', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_3_2', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_3_2'); ?>

        <?php echo $form->labelEx($model, 'q7_3_3', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_3_3', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_3_3'); ?>
        &nbsp;&nbsp;%predicted
    </div>

    <div class="row" style="padding-left: 40px;">
        <?php echo $form->labelEx($model, 'q7_4_1'); ?>
        <?php echo $form->textField($model, 'q7_4_1', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_4_1'); ?>&nbsp;&nbsp;.mol
    </div>
    <div class="row">
        <div style="padding-left: 40px;">
            POST
        </div>
    </div>
    <div class="row" style="padding-left: 40px;">
        <?php echo $form->labelEx($model, 'q7_5_1'); ?>
        <?php echo $form->textField($model, 'q7_5_1', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_5_1'); ?>

        <?php echo $form->labelEx($model, 'q7_5_2', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_5_2', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_5_2'); ?>

        <?php echo $form->labelEx($model, 'q7_5_3', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_5_3', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_5_3'); ?>&nbsp;&nbsp;%predicted
    </div>

    <div class="row" style="padding-left: 40px;">
        <?php echo $form->labelEx($model, 'q7_6_1'); ?>
        <?php echo $form->textField($model, 'q7_6_1', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_6_1'); ?>

        <?php echo $form->labelEx($model, 'q7_6_2', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_6_2', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_6_2'); ?>

        <?php echo $form->labelEx($model, 'q7_6_3', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_6_3', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_6_3'); ?>&nbsp;&nbsp;%predicted
    </div>

    <div class="row" style="padding-left: 40px;">
        <?php echo $form->labelEx($model, 'q7_7_1'); ?>
        <?php echo $form->textField($model, 'q7_7_1', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_7_1'); ?>

        <?php echo $form->labelEx($model, 'q7_7_2', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_7_2', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_7_2'); ?>

        <?php echo $form->labelEx($model, 'q7_7_3', array('style' => 'width: 30px;padding-left: 0px;margin-left: 10px;margin-right: 20px;')); ?>
        <?php echo $form->textField($model, 'q7_7_3', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'q7_7_3'); ?>&nbsp;&nbsp;%predicted
    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q8'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q8', array(
                0 => 'ไม่มี',
                1 => 'มี'), array('separator' => '', 'onchange' => 'return muFun(this.value,"1",\'AsthmaVisit_q8_detail\')'));
            ?>
        </div>
        <?php echo $form->error($model, 'q8'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q8_detail'); ?>
        <?php echo $form->textField($model, 'q8_detail', array('size' => 60, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'q8_detail'); ?>
    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q9'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q9', array(
                0 => 'ไม่มี',
                1 => 'มี'), array('separator' => '', 'onchange' => 'return muFun(this.value,\'1\',\'AsthmaVisit_q9_detail\')'));
            ?>
        </div>
        <?php echo $form->error($model, 'q9'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q9_detail'); ?>
        <?php echo $form->textField($model, 'q9_detail', array('size' => 60, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'q9_detail'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q10'); ?>
        <?php echo $form->dateField($model, 'q10'); ?>
        <?php echo $form->error($model, 'q10'); ?>
    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q11'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q11', array(
                0 => 'ไม่',
                1 => 'ใช่'), array('separator' => ''));
            ?>
        </div>
        <?php echo $form->error($model, 'q11'); ?>
    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q12'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q12', array(
                0 => 'ไม่ใช่',
                1 => 'ใช่'), array('separator' => '', 'onchange' => 'return muFun(this.value,\'1\',\'AsthmaVisit_q12_detail\')'));
            ?>
        </div>
        <?php echo $form->error($model, 'q12'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q12_detail'); ?>
        <?php echo $form->textField($model, 'q12_detail', array('size' => 60, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'q12_detail'); ?>
    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q13'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q13', array(
                0 => 'คุณไม่สามารถเดินได้เนื่องจากสาเหตุอื่น',
                1 => 'ไม่มีอาการเหนื่อย เพียงแค่รู้สึกหายใจหอบ ขณะออกกำลังกายอย่างหนักเท่านั้น',
                2 => 'หายใจหอบ เมื่อเดินอย่างเร่งรีบบนพื้นราบ หรือเมื่อเดินขึ้นที่สูงชัน',
                3 => 'เดินบนพื้นราบได้ช้ากว่าคนอื่นที่อยู่ในวัยเดียวกัน เพราะหายใจหอบ หรือต้องหยุดเพื่อหายใจเมื่อเดินปกติบนพื้นราบ',
                4 => 'ต้องหยุดเพื่อหายใจหลังจากเดินได้ประมาณ 100 เมตร หรือไลังจากเดินได้สักพักบนพื้นราบ',
                5 => 'หายใจหอบมากเกินกว่าที่จะออกจากบ้าน หรือหอบมากขณะแต่งตัว หรือเปลี่ยนเครื่องแต่งตัว'), array('separator' => ''));
            ?>
        </div>
        <?php echo $form->error($model, 'q13'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q14_1'); ?>
        <?php echo $form->textField($model, 'q14_1'); ?>
        <?php echo $form->error($model, 'q14_1'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q14_2'); ?>
        <?php echo $form->textField($model, 'q14_2'); ?>
        <?php echo $form->error($model, 'q14_2'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q14_3'); ?>
        <?php echo $form->textField($model, 'q14_3', array('size' => 60, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'q14_3'); ?>
    </div>
    <legend>การให้ความรู้</legend>
    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q15'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q15', array(
                0 => 'ไม่ใช่',
                1 => 'ใช่'), array('separator' => ''));
            ?>
        </div>
        <?php echo $form->error($model, 'q15'); ?>
    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q16'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q16', array(
                0 => 'ไม่ใช่',
                1 => 'ใช่'), array('separator' => ''));
            ?>
        </div>
        <?php echo $form->error($model, 'q16'); ?>
    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q17'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q17', array(
                0 => 'ไม่ใช่',
                1 => 'ใช่'), array('separator' => ''));
            ?>
        </div>
        <?php echo $form->error($model, 'q17'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q18'); ?>
        <?php echo $form->textField($model, 'q18'); ?>
        <?php echo $form->error($model, 'q18'); ?>
    </div>

    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q19'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q19', array(
                0 => 'ไม่ใช่',
                1 => 'ใช่'), array('separator' => ''));
            ?>
        </div>
        <?php echo $form->error($model, 'q19'); ?>
    </div>
    <legend>เลือกสิทธิ์การรักษา</legend>
    <div class="row">
        <div style="padding-left: 30px;">
            <?php echo $model->getAttributeLabel('q20'); ?>
        </div><div class="compactRadioGroup">
            <?php
            echo $form->radioButtonList($model, 'q20', array(
                0 => 'UC (USC/WEL)',
                1 => 'ประกันสังคม (SSS)',
                2 => 'ข้าราชการ (OFC)',
                3 => 'อื่นๆ ระบุ'), array('separator' => '', 'onchange' => 'return muFun(this.value,\'3\',\'AsthmaVisit_q20_detail\')'));
            ?>
        </div>
        <?php echo $form->error($model, 'q20'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'q20_detail'); ?>
        <?php echo $form->textField($model, 'q20_detail', array('size' => 60, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'q20_detail'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div> 
<!--form--> 

<script>
    
    function approve(url){
         $.ajax({
            //type: 'POST',
            dataType: 'html',
            url: url,
            //data: data,
            success: function(data) {
            $("#myModal").modal('show'); 
            $("#vn").val(data.vn);
            }
        });
    }
    
</script>

