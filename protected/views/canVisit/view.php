
<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Manage';
$this->breadcrumbs = array(
    'View & Ptint',
);
?>

<?php
/* @var $this CanVisitController */
/* @var $model CanVisit */

$this->setPageTitle("ข้อมูลการรักษา รหัส. $model->rn");
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">ข้อมูลการรักษา รหัส <?php echo $model->rn; ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class=" col-lg-12 col-sm-12 col-sx-12" style="text-align: right;">
                <?php
                $this->widget('ext.mPrint.mPrint', array(
                    'id' => 'resultprintid',
                    'title' => '', //the title of the document. Defaults to the HTML title
                    'tooltip' => 'User Result', //tooltip message of the print icon. Defaults to 'print'
                    'text' => '<font color="#000000">พิมพ์เอกสาร</font>', //text which will appear beside the print icon. Defaults to NULL
                    'element' => '#resultprint', //the element to be printed.
                    'exceptions' => array(//the element/s which will be ignored
                        '.summary',
                        '.search-form'
                    ),
                    'publishCss' => true, //publish the CSS for the whole page?
                        //'style'=>'float: right; padding: 5px; margin-top: -5px;'                       
                ));
                ?>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-12 col-sm-12 col-sx-12" id="resultprint" style="text-align: right;">
                <?php
                $this->widget('booster.widgets.TbDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        array('name' => 'rn', 'label' => 'RN'),
                        array('name' => 'hn', 'label' => 'HN'),
                        array('name' => 'vn', 'label' => 'VN'),
                        array('label' => 'วันที่วันที่รับบริการ', 'value' => CanRegis::setDateTh(Yii::app()->dateFormatter->formatDateTime($model->date_in, "medium", False))),
                        
                        array('label' => 'วันที่บันทึก', 'value' => CanRegis::setDateTh(Yii::app()->dateFormatter->formatDateTime($model->create_date, "medium", False))),
                        'user_id',
                        array('name' => 'doc_id', 'label' => 'เลขที่เบิก'),
                    ),
                        )
                );

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
                            'header' => "RN",
                            'name' => 'rn'
                        ),
                        array(
                            'header' => 'Code RTX',
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
                        'style' => 'width:200px',
                        'type' => 'number',
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>