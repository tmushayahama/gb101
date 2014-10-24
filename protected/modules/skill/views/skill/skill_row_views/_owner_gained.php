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
<div class="gb-post-entry panel panel-default row" skill-id="<?php echo $skillListItem->id; ?>" 
     gb-source-pk-id="<?php echo $skillListItem->id; ?>" gb-data-source="<?php echo Type::$SOURCE_SKILL; ?>">
  <div class="gb-discussion-title-side-border row">
    <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs gb-no-padding">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillListItem->owner->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
    </div>
    <div class="col-lg-11 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
      <h5 class="gb-parent-box-heading">
        <a href="<?php echo $skillUrl; ?>" class="skill-level gb-display-attribute" gb-control-target="#gb-skill-list-form-level-input" gb-option-id="<?php echo $skillListItem->level_id; ?>">
          <?php echo $skillListItem->level->name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillListItem->owner_id)); ?>"><?php echo $skillListItem->owner->profile->firstname . " " . $skillListItem->owner->profile->lastname ?>
        </a>
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-chevron-down"></i>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="gb-edit-form-show" gb-form-target="#gb-skill-list-form">edit</a></li>
            <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div>
      </h5>
      <div class="panel-body">
        <div class="row gb-panel-display">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
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

    </div>
  </div>
  <div class="panel-footer row gb-panel-display gb-no-padding">
    <div class="row">
      <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-open"></i> Open</a>
      <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-list-alt"></i> Participate</a>
      <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm  btn-default"><i class="glyphicon glyphicon-share-alt"></i> Share</a>
    </div>
    <div id="gb-skill-contributor-request-form-container" class="row gb-panel-form gb-hide">

    </div>
  </div>
</div>