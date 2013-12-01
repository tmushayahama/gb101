<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-goal-skill-list-row row-fluid">
  <div class="span1 skill-row-num">
    <?php echo $count++ ?>
  </div>
  <div class="span8">
    <p class="gb-ellipsis">
      <a href="<?php echo Yii::app()->createUrl('goal/goal/goaldetail', array('goalId' => $goalListItem->goal->id)); ?>"><?php echo $goalListItem->goal->description ?></a>
    </p>
  </div>
  <div class="span3">
    <a class="gb-btn pull-right gb-btn-blue-1"><i class="icon-white  icon-circle-arrow-right"></i></a>
  </div>
</div>
