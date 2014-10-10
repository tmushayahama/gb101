<?php
/* @var $this SkillListItemController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
$skillUrl = "";
if (Yii::app()->user->isGuest) {
  $skillUrl = Yii::app()->createUrl("skill/skill/skillbank", array());
} else {
  $skillUrl = Yii::app()->createUrl("skill/skill/skillhome", array());
}
?>
<div class="gb-post-entry gb-skill-gained" skill-id="<?php echo $skillListItem->id; ?>" 
     gb-source-pk-id="<?php echo $skillListItem->id; ?>" gb-data-source="<?php echo Type::$SOURCE_SKILL; ?>">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillListItem->owner->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-skill-of-interest-top-border col-lg-10 col-sm-10 col-xs-12">
      <div class="panel-heading">
        <?php if ($source == SkillList::$SOURCE_ADVICE_PAGE): ?>
          <h5><a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillListItem->owner_id)); ?>"><?php echo $skillListItem->owner->profile->firstname . " " . $skillListItem->owner->profile->lastname ?></a></h5>
        <?php else: ?>
          <h5><a href="<?php echo $skillUrl; ?>" class="skill-level gb-display-attribute" gb-control-target="#gb-skill-list-form-level-input" gb-option-id="<?php echo $skillListItem->level_id; ?>"><?php echo $skillListItem->level->name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillListItem->owner_id)); ?>"><?php echo $skillListItem->owner->profile->firstname . " " . $skillListItem->owner->profile->lastname ?></a></h5>
          <small><a><i>Shared to all <?php //echo $connection_name                               ?></i></a> - <a></a></small>	
        <?php endif; ?>
      </div> 
      <div class="panel-body row">
        <div class="row gb-panel-display">
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 gb-no-padding">
            <p class="">
              <a class="skill-title gb-display-attribute" gb-control-target="#gb-skill-list-form-title-input" href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>">
                <?php echo $skillListItem->skill->title; ?>
              </a>   
              <span class="skill-description gb-display-attribute" gb-control-target="#gb-skill-list-form-description-input"><?php echo $skillListItem->skill->description ?></span>
            </p>
          </div>
        </div>
      </div>
      <div class="gb-panel-form gb-hide gb-no-padding">
      </div>
      <div class="panel-footer gb-panel-display gb-no-padding">
        <div class="row">
          <div class="pull-left">
            <a class="btn btn-default gb-form-show-modal"
               gb-form-slide-target="#gb-mentorship-form-modal"
               gb-form-target="#gb-mentorship-form">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_0.png" class="gb-icon-1" alt="">
            </a>
            <a class="btn btn-default gb-form-show-modal gb-advice-page-form-slide"
               gb-form-slide-target="#gb-advice-page-form-modal"
               gb-form-target="#gb-advice-page-form">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_0.png" class="gb-icon-1" alt="">
            </a> 
            <?php if ($source == SkillList::$SOURCE_ADVICE_PAGE): ?>
              <a href="" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-up"></i></a>
              <a href="" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-down"></i></a>
            <?php endif; ?>
          </div>
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

