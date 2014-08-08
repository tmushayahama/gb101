<?php
/* @var $this GoalListItemController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
$skillUrl = "";
if (Yii::app()->user->isGuest) {
  $skillUrl = Yii::app()->createUrl("skill/skill/skillbank", array());
} else {
  $skillUrl = Yii::app()->createUrl("skill/skill/skillhome", array());
}
?>
<div class="gb-commitment-post gb-skill-gained" goal-id="<?php echo $skillListItem->goal_id; ?>">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl."/img/profile_pic/".$skillListItem->user->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-skill-gained-top-border col-lg-10 col-sm-10 col-xs-12">
      <div class="panel-heading">
        <h5><a href="<?php echo $skillUrl; ?>"><?php echo $skillListItem->level->level_name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillListItem->user_id)); ?>"><?php echo $skillListItem->user->profile->firstname . " " . $skillListItem->user->profile->lastname ?></a></h5>
        <small><a><i>Shared to <?php //echo $connection_name                       ?></i></a> - <a></a></small>	
      </div> 
      <div class="panel-body row">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 gb-no-padding">
          <p class=""><a class="goal-title" href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>"><?php echo $skillListItem->goal->title; ?></a>   
            <?php echo $skillListItem->goal->description ?>
          </p>
        </div>
        <ul class="gb-post-action nav nav-stacked col-lg-3 col-md-3 col-sm-3 hidden-xs">
          <li><h6><a class="gb-form-show-modal" skill-id="<?php echo $skillListItem->id; ?>"
                     gb-form-slide-target="#gb-mentorship-form-modal"
                     gb-form-target="#gb-mentorship-form">
                <i class="icon icon-plane"></i>Get Mentorship</a></h6></li>
          <li><h6><a class="gb-disabled gb-advice-page-modal-trigger"><i class="icon icon-eye-open"></i>Request Advice</a></h6></li>  
        </ul>
      </div>
      <div class="panel-footer gb-no-padding">
        <div class="row">
          <?php if ($source == GoalList::$SOURCE_ADVICE_PAGE): ?>
            <a href="" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-up"></i></a>
            <a href="" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-down"></i></a>
          <?php endif; ?>
          <div class="pull-right">
            <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
