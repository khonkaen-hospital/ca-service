
<?php
$this->breadcrumbs = array(
    'Home' => array('index/'),
);
?>
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-heart-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">การทำหัตถการวันนี้</span>
                <span class="info-box-number"><?php echo $countRTX; ?> ครั้ง</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-sun-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">การทำหัตถการวเดือนนี้</span>
                <span class="info-box-number"><?php echo $monthRTX; ?> ครั้ง</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-globe"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">การทำหัตถการปี <?php echo " " .date('Y')+543?></span>
                <span class="info-box-number"><?php echo $yearRTX; ?> ครั้ง</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">ผู้ป่วยทั้งหมด</span>
                <span class="info-box-number"><?php echo $customerRTX; ?> คน</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Monthly Recap Report</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                        <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <p class="text-center">
                            <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                        </p>
                        <div class="chart-responsive">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" height="320" width="747" style="width: 747px; height: 320px;"></canvas>
                        </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <p class="text-center">
                            <strong>Goal Completion</strong>
                        </p>
                        <div class="progress-group">
                            <span class="progress-text">Add Products to Cart</span>
                            <span class="progress-number"><b>160</b>/200</span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                            </div>
                        </div><!-- /.progress-group -->
                        <div class="progress-group">
                            <span class="progress-text">Complete Purchase</span>
                            <span class="progress-number"><b>310</b>/400</span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                            </div>
                        </div><!-- /.progress-group -->
                        <div class="progress-group">
                            <span class="progress-text">Visit Premium Page</span>
                            <span class="progress-number"><b>480</b>/800</span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                            </div>
                        </div><!-- /.progress-group -->
                        <div class="progress-group">
                            <span class="progress-text">Send Inquiries</span>
                            <span class="progress-number"><b>250</b>/500</span>
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                            </div>
                        </div><!-- /.progress-group -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- ./box-body -->
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                            <h5 class="description-header">$35,210.43</h5>
                            <span class="description-text">TOTAL REVENUE</span>
                        </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                            <h5 class="description-header">$10,390.90</h5>
                            <span class="description-text">TOTAL COST</span>
                        </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                            <h5 class="description-header">$24,813.53</h5>
                            <span class="description-text">TOTAL PROFIT</span>
                        </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                        <div class="description-block">
                            <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                            <h5 class="description-header">1200</h5>
                            <span class="description-text">GOAL COMPLETIONS</span>
                        </div><!-- /.description-block -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">สรุปจำนวนการทำหัตถการล่าสุด</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <?php
                    $this->widget(
                            'booster.widgets.TbGridView', array(
                        'dataProvider' => $dataprovider2,
                        'type' => 'striped bordered condensed',
                        'template' => "{items}",
                        'columns' => array(
                            array(
                                'header' => 'No',
                                'value' => '$row+1+($this->grid->dataProvider->pagination->currentPage
                                        * $this->grid->dataProvider->pagination->pageSize)'
                            ),
                            array('name' => 'op_name', 'header' => 'Name'),
                            array('name' => 'code_rtx', 'header' => 'Code'),
                            array('name' => 'counts', 'header' => 'Total'),
                        ),
                            )
                    );
                    ?>
                </div><!-- /.table-responsive -->
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">บันทึกหัตถการ</a>
                <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">แสดงทั้งหมด</a>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>

    <div class="col-md-4">
        <!-- PRODUCT LIST -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">ผู้ป่วยทำหัตถการล่าสุด</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php
                $gridColumns = array(
                    array(
                        'header' => 'No',
                        'value' => '$row+1+($this->grid->dataProvider->pagination->currentPage
                                        * $this->grid->dataProvider->pagination->pageSize)'
                    ),
                    array('name' => 'rn', 'header' => 'RN'),
                    array('name' => 'vn', 'header' => 'VN'),
                    array(
                        'name' => 'date_in',
                        'header' => 'DATE IN',
                        'value' => 'CanRegis::setDateTh(Yii::app()->dateFormatter->formatDateTime($data["date_in"] ,"medium",False))',
                    ),
                );
                ?>
                <?php
                $this->widget(
                        'booster.widgets.TbGridView', array(
                    'type' => 'striped bordered condensed',
                    'dataProvider' => $dataprovider,
                    'template' => "{items}",
                    'columns' => $gridColumns,
                        )
                );
                ?>
            </div><!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="javascript::;" class="uppercase">แสดงทั้งหมด</a>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
</div>
