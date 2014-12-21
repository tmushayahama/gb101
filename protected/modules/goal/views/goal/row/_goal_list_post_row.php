<?php
/* @var $this SkillItemController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
$goalUrl = "";
if (Yii::app()->user->isGuest) {
  $goalUrl = Yii::app()->createUrl("goal/goal/goalbank", array());
} else {
  $goalUrl = Yii::app()->createUrl("goal/goal/goalhome", array());
}
?>
<div class="gb-post-entry gb-post-entry-row gb-goal-gained" goal-id="<?php echo $goalListItem->id; ?>" 
     data-gb-source-pk="<?php echo $goalListItem->id; ?>" data-gb-source="<?php echo Type::$SOURCE_SKILL; ?>">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $goalListItem->user->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-goal-gained-top-border col-lg-10 col-sm-10 col-xs-12">
      <div class="panel-heading">
        <h5><a href="<?php echo $goalUrl; ?>" class="goal-level gb-display-attribute" gb-control-target="#gb-goal-list-form-level-input" gb-option-id="<?php echo $goalListItem->level_id; ?>"><?php echo $goalListItem->level->name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $goalListItem->user_id)); ?>"><?php echo $goalListItem->user->profile->firstname . " " . $goalListItem->user->profile->lastname ?></a></h5>
        <small><?php echo Type::$PRIVACY[$goalListItem->privacy]; ?></small>	
      </div> 
      <div class="panel-body">
        <div class="row gb-panel-display">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
            <p class="">
              <a class="goal-title gb-display-attribute" gb-control-target="#gb-goal-list-form-title-input" href="<?php echo Yii::app()->createUrl('goal/goal/goalManagement', array('goalListItemId' => $goalListItem->id)); ?>">
                <?php echo $goalListItem->goal->title; ?>
              </a>   
              <span class="goal-description gb-display-attribute" gb-control-target="#gb-goal-list-form-description-input"><?php echo $goalListItem->goal->description ?></span>
            </p>
          </div>
        </div>
      </div>
      <div class="gb-panel-form gb-hide gb-no-padding">
      </div>
      <div class="panel-footer gb-panel-display gb-no-padding">
        <div class="row">
          <div class="pull-right">
            <a class="btn btn-link gb-edit-form-show" data-gb-target="#gb-goal-list-form"><i class="glyphicon glyphicon-edit"></i></a>
            <a class="btn btn-link gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <a href="<?php echo Yii::app()->createUrl('goal/goal/goalManagement', array('goalListItemId' => $goalListItem->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>