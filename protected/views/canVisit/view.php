
<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Manage';
$this->breadcrumbs = array(
    'View & Ptint',
);
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">รายละเอียด <?php echo $model->rn ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- Main content -->
        <section class="invoice">
            <div style="text-align: right;">
                <h5>
                    <?php
                    $this->widget('application.extensions.print.printWidget', array(
                        'cssFile' => 'print.css',
                        'coverElement' => '#wrapper',
                        'printedElement' => '#wrapper', //element to be printed
                        //'printedElement' => '#page',
                        'title' => '',
                    ));
                    ?> 

                    พิมพ์เอกสาร</h5>
            </div>
        </section>
        <div id="wrapper">
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> Khon Kaen Hospital
                            <small class="pull-right"><?php echo date("d-m-Y"); ?></small>
                        </h2>
                    </div><!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <h5><?php echo "ชื่อ-นามสกุล: " . $dataPatient['title'] . $dataPatient['name'] . " " . $dataPatient['surname'] ?></h5>
                            <h5><?php echo "HN: " . $dataPatient['hn'] ?></h5>
                            <h5><?php echo "RN: " . $dataPatient['rn'] ?></h5>
                            <h5><?php echo "VN: " . $dataPatient['vn'] ?></h5>
                            <h5><?php //echo "AN: " . $dataPatient['an'] != null ? $dataPatient['an'] : ""  ?></h5>

                        </address>
                    </div><!-- /.col -->
                    <div class="col-sm-4 invoice-col">

                    </div><!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <h5><?php echo "รับบริการ: " . CanRegis::setDateTh(Yii::app()->dateFormatter->formatDateTime($dataPatient["date_in"], "long", False)); ?></h5>
                        <h5><?php echo "บันทึกเมื่อ: " . CanRegis::setDateTh(Yii::app()->dateFormatter->formatDateTime($dataPatient["create_date"], "long", False)); ?></h5>
                        <h5><?php echo "เลที่เบิก: " . $dataPatient['doc_id']; ?></h5>
                        <h5><?php echo "ผู้บันทึกข้อมูล: " . $dataPatient['user_id']; ?></h5>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <?php
                        $this->widget('booster.widgets.TbExtendedGridView', array(
                            'type' => 'striped bordered condensed',
                            'dataProvider' => $data_rx,
                            'template' => "{items}\n{extendedSummary}",
                            'columns' => array(
                                array(
                                    'header' => 'No',
                                    'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                                ),
                                array(
                                    'header' => 'รหัส',
                                    'name' => 'code_rtx'
                                ),
                                array(
                                    'header' => 'หัตถการ',
                                    'name' => 'op_name'
                                ),
                                array(
                                    'header' => 'จำนวน',
                                    'name' => 'qty'
                                ),
                                array(
                                    'header' => 'ราคา',
                                    'name' => 'price',
                                )
                            ),
                            'extendedSummary' => array(
                                'title' => 'ค่าใช้จ่ายรวม',
                                'columns' => array(
                                    'price' => array('label' => 'สุทธิ(บาท)', 'class' => 'TbSumOperation')
                                )
                            ),
                            'extendedSummaryOptions' => array(
                                'class' => 'well pull-right',
                                'style' => 'width:300px; margin-top: 5px;'
                            ),
                        ));
                        ?>
                    </div><!-- /.col -->
                </div><!-- /.row -->  
            </section>
        </div>
    </div>
</div>