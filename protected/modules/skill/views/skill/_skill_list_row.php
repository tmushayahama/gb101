<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-skill-skill-list-row row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
 <p class="gb-ellipsis">
      <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>"><?php echo $skillListItem->goal->title ?></a>
    </p>
</div>
