<?php
/* @var $this GoalController */
/* @var $model Goal */

$this->breadcrumbs=array(
	'Goals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Goal', 'url'=>array('index')),
	array('label'=>'Create Goal', 'url'=>array('create')),
	array('label'=>'Update Goal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Goal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Goal', 'url'=>array('admin')),
);
?>

<h1>View Goal #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type_id',
		'description',
		'points_pledged',
		'assign_date',
		'begin_date',
		'end_date',
		'status',
	),
)); ?>
