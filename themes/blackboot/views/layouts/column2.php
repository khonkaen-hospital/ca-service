<?php $this->beginContent('//layouts/main'); ?>

<?php
$this->menu = array(
    array('label' => '  บันทึกหัตถการ', 'url' => array('canVisit/create'), 'itemOptions' => array('class' => 'glyphicon glyphicon-list')),
    array('label' => '  รายการผู้ป่วยรับหัตถการ', 'url' => array('canVisit/admin'), 'itemOptions' => array('class' => 'glyphicon glyphicon-list')),
    array('label' => '  รายชื่อผู้ป่วยลงทะเบียน', 'url' => array('canVisit/listCanRegis'), 'itemOptions' => array('class' => 'glyphicon glyphicon-list')),
//    array('label' => '  จัดการข้อมูล', 'url' => array('admin'), 'itemOptions' => array('class' => 'glyphicon glyphicon-folder-open')),
);
?>

<div class="row-fluid">
    <div class="span3">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => 'Operations',
        ));
        $this->widget('zii.widgets.CMenu', array(
            'items' => $this->menu,
            'htmlOptions' => array('class' => 'sidebar'),
        ));
        $this->endWidget();
        ?>
    </div><!-- sidebar span3 -->

    <div class="span9">
        <div class="main">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>
