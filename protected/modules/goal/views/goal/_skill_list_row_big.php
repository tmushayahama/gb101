<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-goal-skill-list-row-big">
  <div class="row-fluid">
    <div class="span11">
      <h5 class="goal-commitment-title">
        <a href="<?php echo Yii::app()->createUrl('goal/goal/goaldetail', array('goalId' => $goalListItem->goal->id)); ?>"><?php echo $goalListItem->goal->title ?></a> 
        <small><?php echo $goalListItem->goal->description ?></small>
      </h5>
    </div>
    <div class="span1">
       <a class="pull-right gb-btn gb-btn-red-1"><i class="icon-white icon-trash"></i></a>
    </div>
  </div>
  <div class="row-fluid">
    <div class="gb-skill-footer inline">
      <a class="gb-btn">Edit</a>
      <a class="gb-btn">Commit Skill</a>
      <a class="gb-btn">Share</a>
      <a class="pull-right gb-btn"><h5>More Details</h5></a>
    </div>
  </div>
</div>
