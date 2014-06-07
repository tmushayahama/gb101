<?php
/* @var $this GoalListItemController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-commitment-post gb-skill-gained" goal-id="<?php echo $skillListItem->id; ?>">
  <div class="row">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-skill-to-learn-top-border col-lg-10 col-sm-10 col-xs-10">
      <div class="panel-heading">
        <h5><a class="goal-level" goal-level-id="<?php echo $skillListItem->level_id; ?>"><?php echo $skillListItem->level->level_name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillListItem->user_id)); ?>"><?php echo $skillListItem->user->profile->firstname . " " . $skillListItem->user->profile->lastname ?></a></h5>
        <small><a><i>Shared to <?php //echo $connection_name                    ?></i></a> - <a>12/03/13</a></small>	
       </div> 
      <div class="panel-body row">
        <div class="row gb-panel-display">
          <div class="col-lg-8 col-sm-12 col-xs-12 gb-no-padding">
            <p class="skill-commitment-title">
              <a class="goal-title" href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>">
                <?php echo $skillListItem->goal->title; ?>
              </a>   
              <span class="goal-description"><?php echo $skillListItem->goal->description ?></span>
            </p>
          </div>
          <ul class="gb-post-action nav nav-stacked col-lg-4 col-sm-12 col-xs-12">
            <li><h6><a class="gb-request-mentorship-modal-trigger" ><i class="icon icon-plane"></i>Get Mentorship</a> <a class="pull-right">0</a></h6></li>
          </ul>
        </div>
        <div class="gb-panel-form gb-hide">

        </div>
      </div>
      <div class="panel-footer gb-panel-display gb-no-padding">
        <div class="row">
          <?php if ($source == GoalList::$SOURCE_ADVICE_PAGE): ?>
            <a href="" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-up"></i></a>
            <a href="" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-down"></i></a>
          <?php endif; ?>
          <div class="pull-right">
            <a class="btn btn-link gb-form-show gb-edit-skill-post"><i class="glyphicon glyphicon-edit"></i></a>
            <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

