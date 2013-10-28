<?php
/* @var $this GoalController */
/* @var $data Goal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('points_pledged')); ?>:</b>
	<?php echo CHtml::encode($data->points_pledged); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assign_date')); ?>:</b>
	<?php echo CHtml::encode($data->assign_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('begin_date')); ?>:</b>
	<?php echo CHtml::encode($data->begin_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>