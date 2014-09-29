<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-skill-skill-list-row-big">
  <div class="row-fluid">
    <div class="span11">
      <h5 class="">
        <a href="<?php echo Yii::app()->createUrl('skill/skill/skilldetail', array('skillListId' => $skillListItem->id)); ?>"><?php echo $skillListItem->skill->title ?></a> 
        <small><?php echo $skillListItem->skill->description ?></small>
      </h5>
    </div>
    <div class="span1">
       <a class="pull-right gb-btn gb-btn-red-1"><i class="glyphicon glyphicon-white icon-trash"></i></a>
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
