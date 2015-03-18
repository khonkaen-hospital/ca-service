<?php
/* @var $this AsthmaFirstVisitController */
/* @var $model AsthmaFirstVisit */
/* @var $form CActiveForm */
?>
<script>
    var RDATA;
    function muFun(obj, cId) {
//        if (obj === "1") {
//            document.getElementById('TLID_DIV').style.display = "block";
//            return false;
//        } else {
//            document.getElementById('TLID_DIV').style.display = "none";
//            return false;
//        }

        if (obj === "1") {
            document.getElementById(cId).readOnly = false;
            return false;
        } else {
            document.getElementById(cId).readOnly = true;
            document.getElementById(cId).value = "";
            return false;
        }
    }
</script>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'asthma-first-visit-form',
        'enableAjaxValidation' => true,
            //'htmlOptions' => array('class' => 'form-horizontal'),
    ));
    ?>
    <h5>Appendix 1: ข้อมูลผู้ป่วยเมื่อเริ่มการศึกษา(first visit)ของ รพ.ขอนแก่น</h5>
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
                    'url' => Yii::app()->createUrl('AsthmaFirstVisit/filtrocargo'),
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
        <?php echo $form->labelEx($model, 'hn', array('style' => 'margin-top:15px;')); ?>
        <?php echo $form->textField($model, 'hn', $model->chkAction(Yii::app()->controller->action->id)); ?>
        <?php echo $form->error($model, 'hn', array('style' => 'margin-top:15px;')); ?> 
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'citizen_id'); ?> 
        <?php echo $form->textField($model, 'citizen_id'); ?>
        <?php echo $form->error($model, 'citizen_id'); ?> 
    </div>
    <div class="row">
        <?php //echo $form->labelEx($model, 'asthma_no'); ?>
        <?php //echo $form->textField($model, 'asthma_no'); ?>
        <?php //echo $form->error($model, 'asthma_no'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name'); ?>
        <?php echo $form->error($model, 'name'); ?> 
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'surname'); ?>
        <?php echo $form->textField($model, 'surname'); ?>
        <?php echo $form->error($model, 'surname'); ?>
    </div>
    <div class="row"> 
        <?php echo $form->labelEx($model, 'gender_id'); ?>
        <?php
        echo $form->radioButtonList($model, 'gender_id', array('1' => 'ชาย', '2' => 'หญิง'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'), // add this code
            'separator' => '',
        ));
        ?>
        <?php echo $form->error($model, 'gender_id'); ?>

    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textArea($model, 'address', array('size' => 200, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone', array('size' => 200, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'birthdate'); ?>
        <?php echo $form->dateField($model, 'birthdate'); ?>
        <?php echo $form->error($model, 'birthdate'); ?>
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

    <div class="row">
        <?php echo $form->labelEx($model, 'asthma_start'); ?>
        <?php echo $form->textField($model, 'asthma_start'); ?>
        <?php echo $form->error($model, 'asthma_start'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'asthma_duration'); ?>
        <?php echo $form->textField($model, 'asthma_duration'); ?>
        <?php echo $form->error($model, 'asthma_duration'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'asthma_cure'); ?>
        <?php echo $form->textField($model, 'asthma_cure'); ?>
        <?php echo $form->error($model, 'asthma_cure'); ?>
    </div>
    <legend>ในระยะเวลา 12 เดือนที่ผ่านมา</legend>

    <div class="row">
        <?php echo $form->labelEx($model, 'tw_month', array('style' => 'padding-top: 0px;')); ?>
        <?php
        echo $form->radioButtonList($model, 'tw_month', array(0 => 'ไม่เคย', 1 => 'เคย'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'), // add this code
            'separator' => '  ', 'onchange' => 'return muFun(this.value)'
        ));
        ?>
        <?php echo $form->error($model, 'tw_month'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tw_month_number', array('style' => 'padding-left: 40px;width: 230px;')); ?>
        <?php echo $form->textField($model, 'tw_month_number', array('style' => 'width:80px;')); ?>
        <?php echo $form->error($model, 'tw_month_number'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tw_month_night', array('style' => 'padding:0px 0px 0px 40px;width: 230px;')); ?>
        <?php echo $form->textField($model, 'tw_month_night', array('style' => 'width: 80px;')); ?>
        <?php echo $form->error($model, 'tw_month_night'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tw_emer', array('style' => 'padding-top: 0px;')); ?>
        <?php
        echo $form->radioButtonList($model, 'tw_emer', array(0 => 'ไม่เคย', 1 => 'เคย'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'), // add this code
            'separator' => ' ', 'onchange' => 'return muFun(this.value,\'AsthmaFirstVisit_tw_emer_number\')'));
        ?>
        <?php echo $form->error($model, 'tw_emer'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tw_emer_number', array('style' => 'padding-left: 40px;width: 230px;')); ?>
        <?php echo $form->textField($model, 'tw_emer_number', $model->chk('tw_emer')); ?>
        <?php echo $form->error($model, 'tw_emer_number'); ?>
    </div>
    <legend>การรักษาในปัจจุบัน</legend>
    <div class="row">
        <?php echo $form->labelEx($model, 'curr_b2agonisitinhaler'); ?>
        <?php
        echo $form->radioButtonList($model, 'curr_b2agonisitinhaler', array(0 => 'No', 1 => 'Yes'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' ', 'onchange' => 'return muFun(this.value,\'AsthmaFirstVisit_curr_b2agonisitinhaler_detail\')'));
        ?>
        <?php echo $form->error($model, 'curr_b2agonisitinhaler'); ?>

        <?php //echo $form->labelEx($model, 'curr_b2agonisitinhaler_detail'); ?>
        <?php echo $form->textField($model, 'curr_b2agonisitinhaler_detail', $model->chk('curr_b2agonisitinhaler')); ?>
        <?php echo $form->error($model, 'curr_b2agonisitinhaler_detail'); ?>

    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'curr_agonisttab'); ?>
        <?php
        echo $form->radioButtonList($model, 'curr_agonisttab', array(0 => 'No', 1 => 'Yes'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' ', 'onchange' => 'return muFun(this.value,\'AsthmaFirstVisit_curr_agonisttab_detail\')'));
        ?>
        <?php echo $form->error($model, 'curr_agonisttab'); ?>

        <?php //echo $form->labelEx($model, 'curr_agonisttab_detail'); ?>
        <?php echo $form->textField($model, 'curr_agonisttab_detail', $model->chk('curr_agonisttab')); ?>
        <?php echo $form->error($model, 'curr_agonisttab_detail'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'curr_theophylline'); ?>
        <?php
        echo $form->radioButtonList($model, 'curr_theophylline', array(0 => 'No', 1 => 'Yes'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' ', 'onchange' => 'return muFun(this.value,\'AsthmaFirstVisit_curr_theophylline_detail\')'));
        ?>
        <?php echo $form->error($model, 'curr_theophylline'); ?>
        <?php //echo $form->labelEx($model, 'curr_theophylline_detail');  ?>
        <?php echo $form->textField($model, 'curr_theophylline_detail', $model->chk('curr_theophylline')); ?>
        <?php echo $form->error($model, 'curr_theophylline_detail'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'curr_steroidinhaler'); ?>
        <?php
        echo $form->radioButtonList($model, 'curr_steroidinhaler', array(0 => 'No', 1 => 'Yes'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' ', 'onchange' => 'return muFun(this.value,\'AsthmaFirstVisit_curr_steroidinhaler_detail\')'));
        ?>
        <?php echo $form->error($model, 'curr_steroidinhaler'); ?>
        <?php //echo $form->labelEx($model, 'curr_steroidinhaler_detail'); ?>
        <?php echo $form->textField($model, 'curr_steroidinhaler_detail', $model->chk('curr_steroidinhaler')); ?>
        <?php echo $form->error($model, 'curr_steroidinhaler_detail'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'curr_oralsteroid'); ?>
        <?php
        echo $form->radioButtonList($model, 'curr_oralsteroid', array(0 => 'No', 1 => 'Yes'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' ', 'onchange' => 'return muFun(this.value,\'AsthmaFirstVisit_curr_oralsteroid_detail\')'));
        ?>
        <?php echo $form->error($model, 'curr_oralsteroid'); ?>
        <?php //echo $form->labelEx($model, 'curr_oralsteroid_detail'); ?>
        <?php echo $form->textField($model, 'curr_oralsteroid_detail', $model->chk('curr_oralsteroid')); ?>
        <?php echo $form->error($model, 'curr_oralsteroid_detail'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'curr_b2lpratropium'); ?>
        <?php
        echo $form->radioButtonList($model, 'curr_b2lpratropium', array(0 => 'No', 1 => 'Yes'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' ', 'onchange' => 'return muFun(this.value,\'AsthmaFirstVisit_curr_b2lpratropium_detail\')'));
        ?>
        <?php echo $form->error($model, 'curr_b2lpratropium'); ?>
        <?php //echo $form->labelEx($model, 'curr_b2lpratropium_detail'); ?>
        <?php echo $form->textField($model, 'curr_b2lpratropium_detail', $model->chk('curr_b2lpratropium')); ?>
        <?php echo $form->error($model, 'curr_b2lpratropium_detail'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'curr_b2icsinhaler'); ?>
        <?php
        echo $form->radioButtonList($model, 'curr_b2icsinhaler', array(0 => 'No', 1 => 'Yes'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' ', 'onchange' => 'return muFun(this.value,\'AsthmaFirstVisit_curr_b2icsinhaler_detail\')'));
        ?>
        <?php echo $form->error($model, 'curr_b2icsinhaler'); ?>
        <?php //echo $form->labelEx($model, 'curr_b2icsinhaler_detail'); ?>
        <?php echo $form->textField($model, 'curr_b2icsinhaler_detail', $model->chk('curr_b2icsinhaler')); ?>
        <?php echo $form->error($model, 'curr_b2icsinhaler_detail'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'curr_antilenkotriene'); ?>
        <?php
        echo $form->radioButtonList($model, 'curr_antilenkotriene', array(0 => 'No', 1 => 'Yes'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' ', 'onchange' => 'return muFun(this.value,\'AsthmaFirstVisit_curr_antilenkotriene_detail\')'));
        ?>
        <?php echo $form->error($model, 'curr_antilenkotriene'); ?>
        <?php //echo $form->labelEx($model, 'curr_antilenkotriene_detail');  ?>
        <?php echo $form->textField($model, 'curr_antilenkotriene_detail', $model->chk('curr_antilenkotriene')); ?>
        <?php echo $form->error($model, 'curr_antilenkotriene_detail'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'curr_icspluslaba'); ?>
        <?php
        echo $form->radioButtonList($model, 'curr_icspluslaba', array(0 => 'No', 1 => 'Yes'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' ', 'onchange' => 'return muFun(this.value,\'AsthmaFirstVisit_curr_icspluslaba_detail\')'));
        ?>
        <?php echo $form->error($model, 'curr_icspluslaba'); ?>
        <?php //echo $form->labelEx($model, 'curr_icspluslaba_detail');  ?>
        <?php echo $form->textField($model, 'curr_icspluslaba_detail', $model->chk('curr_icspluslaba')); ?>
        <?php echo $form->error($model, 'curr_icspluslaba_detail'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'curr_tiotropium'); ?>
        <?php
        echo $form->radioButtonList($model, 'curr_tiotropium', array(0 => 'No', 1 => 'Yes'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' ', 'onchange' => 'return muFun(this.value,\'AsthmaFirstVisit_curr_tiotropium_detail\')'));
        ?>
        <?php echo $form->error($model, 'curr_tiotropium'); ?>
        <?php //echo $form->labelEx($model, 'curr_tiotropium_detail'); ?>
        <?php echo $form->textField($model, 'curr_tiotropium_detail', $model->chk('curr_tiotropium')); ?>
        <?php echo $form->error($model, 'curr_tiotropium_detail'); ?>
    </div>
    <legend>ตรวจสอบสมรรถภาพปอด</legend>
    <div class="row">
        <?php echo $form->labelEx($model, 'lung_test'); ?>
        <?php
        echo $form->radioButtonList($model, 'lung_test', array(0 => 'ไม่เคย', 1 => 'เคย'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' '));
        ?>
        <?php echo $form->error($model, 'lung_test'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'smoke'); ?>
        <?php
        echo $form->radioButtonList($model, 'smoke', array(0 => 'ไม่เคย', 1 => 'เคย'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' '));
        ?>
        <?php echo $form->error($model, 'smoke'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'smoke_curr'); ?>
        <?php
        echo $form->radioButtonList($model, 'smoke_curr', array(0 => 'ไม่สูบ', 1 => 'สูบ'), array(
            'labelOptions' => array('style' => 'display:inline;padding: 0 0 0 0;width: 40px;'),
            'separator' => ' '));
        ?>
        <?php echo $form->error($model, 'smoke_curr'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'smoke_start'); ?>
        <?php echo $form->textField($model, 'smoke_start'); ?>
        <?php echo $form->error($model, 'smoke_start'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'smoke_stop'); ?>
        <?php echo $form->textField($model, 'smoke_stop'); ?>
        <?php echo $form->error($model, 'smoke_stop'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'smoking'); ?>
        <?php echo $form->textField($model, 'smoking'); ?>
        <?php echo $form->error($model, 'smoking'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'lastyear_lungtest'); ?>
        <?php echo $form->textArea($model, 'lastyear_lungtest'); ?>
        <?php echo $form->error($model, 'lastyear_lungtest'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::label('', ''); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึกการแก้ไข', array('class' => 'span2')); ?>
    </div>

    <?php $this->endWidget(); ?>
    <script>
        jQuery(function($) {
            $("#CargoespecSearch").on("selecting", function(e) {

            }).on("change", function(e) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: '<?php echo Yii::app()->createUrl('asthmaFirstVisit/FiltroCargoByHN') ?>',
                    data: {hn: e.val}
                })
                        .done(function(data) {
                    console.log(data);
                    $('#AsthmaFirstVisit_citizen_id').val(data['no_card']);
                    $('#AsthmaFirstVisit_hn').val(data['hn']);
                    $('#AsthmaFirstVisit_name').val(data['name']);
                    $('#AsthmaFirstVisit_surname').val(data['surname']);
                    $('#AsthmaFirstVisit_address').val(data['address'] + ' ' + data['tambol'] + ' ' + data['amp'] + ' ' + data['changwat']);
                    $('#AsthmaFirstVisit_birthdate').val(data['birth']);

                    if (data['sex'] == 1)
                        $('#AsthmaFirstVisit_gender_id_0').attr('checked', 'checked');
                    else
                        $('#AsthmaFirstVisit_gender_id_1').attr('checked', 'checked');
                    $('#AsthmaFirstVisit_phone').val(data['tel']);
                });
            });
        });

    </script>
</div><!-- form -->