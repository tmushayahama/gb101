<?php
/* @var $this GoalListItemController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-commitment-post gb-skill-gained" goal-id="<?php echo $skillListItem->goal_id; ?>">
  <div class="row">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-skill-gained-top-border col-lg-10 col-sm-10 col-xs-10">
      <div class="panel-heading">
        <a><h5><?php echo $skillListItem->goalLevel->level_name ?> - <?php echo $skillListItem->user->profile->firstname . " " . $skillListItem->user->profile->lastname ?></h5></a>
        <small><a><i>Shared to <?php //echo $connection_name              ?></i></a> - <a>12/03/13</a></small>	
        <h4 class="pull-right"><?php echo $skillListItem->goal->points_pledged ?>
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/puntos_icon.png" class="gb-puntos-icon" alt="P">
        </h4>
      </div> 
      <div class="panel-body row">
        <div class="col-lg-8 col-sm-12 col-xs-12">
          <h4 class="skill-commitment-title"><a class="goal-title" href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>"><?php echo $skillListItem->goal->title; ?></a>   
            <small> <?php echo $skillListItem->goal->description ?></small>
          </h4>
        </div>
        <div class=" col-lg-4 col-sm-12 col-xs-12">
          <ul class="gb-post-action nav nav-stacked">
            <li><h6><a class="gb-start-mentoring-modal-trigger"><i class="icon icon-eye-open"></i>Start Mentoring</a> <a class="badge badge-info pull-right"><?php echo Mentorship::getGoalMentorshipCount($skillListItem->goal_id); ?></a></h6></li>         
            <li><h6><a class="gb-advice-page-modal-trigger"><i class="icon icon-eye-open"></i>Write Advice</a> <a class="badge badge-info pull-right">0</a></h6></li>  
            <li class="gb-disabled"><h6><a class="gb-request-monitoring-modal-trigger"><i class="icon icon-plane"></i>Monitor</a> <a class="badge badge-info pull-right">0</a></h6></li>
            <li class="gb-disabled"><h6><a><i class="icon icon-eye-open"></i>Judge</a><a class="badge badge-info pull-right">0</a></h6></li>
          </ul>
        </div>
      </div>
      <div class="panel-footer">
        <a class="gb-btn">Activities: <div class="badge badge-info">0</div></a>
        <a class="gb-btn">Share</a>
        <div class="pull-right">
          <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>" class="gb-btn"><strong>More Details</strong></a>
          <a class="gb-btn"><i class="icon-edit"></i></a>
          <a class="gb-btn"><i class="icon-trash"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
