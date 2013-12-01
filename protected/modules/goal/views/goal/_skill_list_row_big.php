<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-goal-skill-list-row-big">
  <div class="row-fluid">
    <div class="span12">
      <p class="">
        <a href="<?php echo Yii::app()->createUrl('goal/goal/goaldetail', array('goalId' => $goalListItem->goal->id)); ?>"><?php echo $goalListItem->goal->description ?></a>
      </p>
    </div>
  </div>
  <div class="row-fluid">
    <div class="gb-skill-footer inline">
      <a class="gb-btn"><i class="icon-edit"></i></a>
      <a class="gb-btn gb-btn-blue-light-1">Commit Skill</a>
      <a class="gb-btn gb-btn-blue-light-1">Share</a>
      <a class="pull-right gb-btn gb-btn-red-1"><i class="icon-white icon-trash"></i></a>
      <a class="pull-right gb-btn gb-btn-color-white gb-btn-blue-1">More Details</a>
    </div>
  </div>
</div>
