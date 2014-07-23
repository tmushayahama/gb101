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
<div class="gb-post-entry gb-commitment-post gb-skill-gained" goal-id="<?php echo $skillListItem->id; ?>" 
     gb-source-pk-id="<?php echo $skillListItem->id; ?>" gb-data-source="<?php echo Type::$SOURCE_SKILL; ?>">
  <div class="row">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillListItem->user->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-skill-to-improve-top-border col-lg-10 col-sm-10 col-xs-10">
      <div class="panel-heading">
        <h5><a href="<?php echo $skillUrl; ?>" class="goal-level gb-display-attribute" gb-control-target="#gb-skill-list-form-level-input" gb-option-id="<?php echo $skillListItem->level_id; ?>"><?php echo $skillListItem->level->level_name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillListItem->user_id)); ?>"><?php echo $skillListItem->user->profile->firstname . " " . $skillListItem->user->profile->lastname ?></a></h5>
        <small><a><i>Shared to all <?php //echo $connection_name                            ?></i></a> - <a></a></small>	
      </div> 
      <div class="panel-body">
        <div class="row gb-panel-display">
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 gb-no-padding">
            <p class="">
              <a class="goal-title gb-display-attribute" gb-control-target="#gb-skill-list-form-title-input" href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>">
                <?php echo $skillListItem->goal->title; ?>
              </a>   
              <span class="goal-description gb-display-attribute" gb-control-target="#gb-skill-list-form-description-input"><?php echo $skillListItem->goal->description ?></span>
            </p>
          </div>
          <ul class="gb-post-action nav nav-stacked col-lg-3 col-md-3 col-sm-3 hidden-xs">
            <li>
              <h6>
                <a class="gb-form-show-modal"
                   gb-form-slide-target="#gb-mentorship-form-modal"
                   gb-form-target="#gb-mentorship-form">
                  <i class="icon icon-eye-open"></i>Start Mentoring</a>
              </h6>
            </li>         
            <li>
              <h6>
                <a class="gb-request-mentorship-modal-trigger" ><i class="icon icon-plane"></i>Get Mentorship</a>
              </h6>
            </li>
            <li>
              <h6>
                <a class="gb-form-show-modal gb-advice-page-form-slide"
                   gb-form-slide-target="#gb-advice-page-form-modal"
                   gb-form-target="#gb-advice-page-form">
                  <i class="icon icon-eye-open"></i>Write Advice</a> <a class="pull-right">0</a>
              </h6>
            </li>  
        </div>
      </div>
      <div class="gb-panel-form gb-hide gb-no-padding">
      </div>
      <div class="panel-footer gb-panel-display gb-no-padding">
        <div class="row">
          <?php if ($source == GoalList::$SOURCE_ADVICE_PAGE): ?>
            <a href="" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-up"></i></a>
            <a href="" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-down"></i></a>
          <?php endif; ?>
          <div class="pull-right">
            <a class="btn btn-link gb-edit-form-show"  gb-form-target="#gb-skill-list-form"><i class="glyphicon glyphicon-edit"></i></a>
            <a class="btn btn-link gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>