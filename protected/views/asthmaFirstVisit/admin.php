<?php
/* @var $this AsthmaFirstVisitController */
/* @var $model AsthmaFirstVisit */

$this->breadcrumbs = array(
    'Asthma First Visits' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List AsthmaFirstVisit', 'url' => array('index')),
    array('label' => 'Create AsthmaFirstVisit', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#asthma-first-visit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Asthma First Visits</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    //$this->renderPartial('_search', array(
    //    'model' => $records,
    //));
    ?>
</div><!-- search-form -->
<?php
$this->widget('application.extensions.tablesorter.Sorter', array(
    'data' => $records,
    'columns' => array(
        'hn',
        'citizen_id',
        'asthma_no',
        'name',
        'surname',
    ),
    'filters' => array(
        '',
        '',
        '',
        'filter-false', // won't filter this
        'filter-select', // filter as select box
    ),
));
?>


<?php
/* $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'asthma-first-visit-grid',
  'dataProvider'=>$model->search(),
  'filter'=>$model,
  'columns'=>array(
  'hn',
  'citizen_id',
  'asthma_no',
  'name',
  'surname',
  'gender_id',

  'address',
  'phone',
  'birthdate',
  'weight',
  'height',
  'asthma_start',
  'asthma_duration',
  'asthma_cure',
  'tw_month',
  'tw_month_number',
  'tw_month_night',
  'tw_emer',
  'tw_emer_number',
  'curr_b2agonisitinhaler',
  'curr_b2agonisitinhaler_detail',
  'curr_agonisttab',
  'curr_agonisttab_detail',
  'curr_theophylline',
  'curr_theophylline_detail',
  'curr_steroidinhaler',
  'curr_steroidinhaler_detail',
  'curr_oralsteroid',
  'curr_oralsteroid_detail',
  'curr_b2lpratropium',
  'curr_b2lpratropium_detail',
  'curr_b2icsinhaler',
  'curr_b2icsinhaler_detail',
  'curr_antilenkotriene',
  'curr_antilenkotriene_detail',
  'curr_icspluslaba',
  'curr_icspluslaba_detail',
  'curr_tiotropium',
  'curr_tiotropium_detail',
  'lung_test',
  'smoke',
  'smoke_curr',
  'smoke_start',
  'smoke_stop',
  'smoking',
  'create_date',
  'update_date',
  'user_id',
 */
//		array(
//			'class'=>'CButtonColumn',
//		),
//),
//)); 
?>
