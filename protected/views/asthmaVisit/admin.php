<?php
/* @var $this AsthmaVisitController */
/* @var $model AsthmaVisit */

$this->breadcrumbs = array(
    'Asthma Visits' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List AsthmaVisit', 'url' => array('index')),
    array('label' => 'Create AsthmaVisit', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#asthma-visit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Asthma Visits</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    //<?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('application.extensions.tablesorter.Sorter', array(
    'data' => $model,
    'columns' => array(
        'id',
        'hn',
        'asthma_no',
        'visitdate',
        'age',
        'weight',
    ),
    'filters' => array(
        '',
        '',
        '',
        '',
        'filter-false', // won't filter this
        'filter-select', // filter as select box
    ),
));
?>
