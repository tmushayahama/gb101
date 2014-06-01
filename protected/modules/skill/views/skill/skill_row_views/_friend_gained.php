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
        <h5><a><?php echo $skillListItem->level->level_name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillListItem->user_id)); ?>"><?php echo $skillListItem->user->profile->firstname . " " . $skillListItem->user->profile->lastname ?></a></h5>
        <small><a><i>Shared to <?php //echo $connection_name                    ?></i></a> - <a>12/03/13</a></small>	
        <h4 class="pull-right"><?php echo $skillListItem->goal->points_pledged ?>
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/puntos_icon.png" class="gb-puntos-icon" alt="P">
        </h4>
      </div> 
      <div class="panel-body row">
        <div class="col-lg-8 col-sm-12 col-xs-12 gb-no-padding">
          <p class="skill-commitment-title"><a class="goal-title" href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>"><?php echo $skillListItem->goal->title; ?></a>   
            <?php echo $skillListItem->goal->description ?>
          </p>
        </div>
        <ul class="gb-post-action nav nav-stacked col-lg-4 col-sm-12 col-xs-12">
          <li><h6><a class="gb-request-mentorship-modal-trigger" skill-id="<?php echo $skillListItem->id; ?>"><i class="icon icon-plane"></i>Get Mentorship</a> <a class="badge badge-info pull-right">0</a></h6></li>
          <li><h6><a class="gb-disabled gb-advice-page-modal-trigger"><i class="icon icon-eye-open"></i>Request Advice</a> <a class="pull-right">0</a></h6></li>  
        </ul>
      </div>
      <div class="panel-footer">
        <div class="row">
          <div class="pull-right">
            <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
