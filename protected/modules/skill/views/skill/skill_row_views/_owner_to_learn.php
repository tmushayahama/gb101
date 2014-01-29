<?php
/* @var $this GoalListItemController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-commitment-post">
  <span class='gb-top-heading gb-heading-left'><?php echo $skillListItem->goalLevel->level_name ?></span>
  <div class="gb-post-title ">
    <span class="span1">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </span>
    <span class="span9">
      <a><h5><?php echo $skillListItem->user->profile->firstname . " " . $skillListItem->user->profile->lastname ?></h5></a>
      <small><a><i>Shared to <?php //echo $connection_name   ?></i></a> - <a>12/03/13</a></small>								
    </span>
    <span class="span2">
      <h4 class="pull-right"><?php echo $skillListItem->goal->points_pledged ?>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/puntos_icon.png" class="gb-puntos-icon" alt="P">
      </h4>
    </span> 
  </div>
  <div class="gb-post-content row">
    <span class="span8">
      <h4 class="skill-commitment-title"><a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>"><?php echo $skillListItem->goal->title; ?></a>   
        <small> <?php echo $skillListItem->goal->description ?></small>
      </h4>
    </span>
    <span class=" span4">
      <ul class="gb-post-action pull-righ nav nav-stacked">
        <li><h6><a class="gb-request-monitors-modal-trigger" skill-id="<?php echo $skillListItem->id; ?>"><i class="icon icon-eye-open"></i>Get Monitors</a> <a class="badge badge-info pull-right">0</a></h6></li>         
        <li><h6><a class="gb-request-mentorship-modal-trigger" skill-id="<?php echo $skillListItem->id; ?>"><i class="icon icon-plane"></i>Get Mentorship</a> <a class="badge badge-info pull-right">0</a></h6></li>
        <li><h6><a><i class="icon icon-eye-open"></i>Get Judges</a><a class="badge badge-info pull-right">0</a></h6></li>
      </ul>
    </span>
  </div>
  <div class="gb-footer">
    <a class="gb-btn">Activities: <div class="badge badge-info">0</div></a>
    <a class="gb-btn">Share</a>
    <div class="pull-right">
      <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>" class="gb-btn"><strong>More Details</strong></a>
      <a class="gb-btn"><i class="icon-edit"></i></a>
      <a class="gb-btn"><i class="icon-trash"></i></a>
    </div>
  </div>
</div>

