<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-skill-skill-list-row row-fluid">
  <div class="span1 skill-row-num">
    <?php echo $count++ ?>
  </div>
  <div class="span8">
    <p class="gb-ellipsis">
      <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>"><?php echo $skillListItem->goal->title ?></a>
    </p>
  </div>
  <div class="span3">
    <a class="gb-btn pull-right"><i class="icon-circle-arrow-right"></i></a>
  </div>
</div>
