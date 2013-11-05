<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-goal-skill-list-row">
  <div class="span1">
  </div>
	<div class="span8">
		<a href="<?php echo Yii::app()->createUrl('goal/goal/goaldetail', array('goal_id' => $goalListItem->goal->id));?>"><?php echo $goalListItem->goal->description ?></a>
  </div>
	<div class="span3">
		<a class="pull-right gb-btn gb-btn-green-1"><i class="icon-white  icon-trash"></i></a>
		<a class="pull-right gb-btn gb-btn-green-1"><i class="icon-white  icon-edit"></i></a>
		<a class="gb-btn pull-left btn-link text-center">Level <?php echo $goalListItem->skill_level ?></a>
	</div>
</div>
