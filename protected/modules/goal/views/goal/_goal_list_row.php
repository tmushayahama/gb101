<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-goal-goal-list-row row-fluid">
  <div class="span1 goal-row-num">
    <?php echo $count++ ?>
  </div>
  <div class="span8">
    <p class="gb-ellipsis">
      <a href="<?php echo Yii::app()->createUrl('goal/goal/goaldetail', array('goalListId' => $goalListItem->id)); ?>"><?php echo $goalListItem->goal->title ?></a>
    </p>
  </div>
  <div class="span3">
    <a class="gb-btn pull-right"><i class="icon-circle-arrow-right"></i></a>
  </div>
</div>
