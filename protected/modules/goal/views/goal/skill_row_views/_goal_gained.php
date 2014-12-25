<?php
/* @var $this GoalController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
$goalUrl = "";
if (Yii::app()->user->isGuest) {
  $goalUrl = Yii::app()->createUrl("goal/goal/goalbank", array());
} else {
  $goalUrl = Yii::app()->createUrl("goal/goal/goalhome", array());
}
?>
<div class="gb-post-entry gb-post-entry-row panel panel-default row" goal-id="<?php echo $goal->id; ?>" 
     data-gb-source-pk="<?php echo $goal->id; ?>" data-gb-source="<?php echo Type::$SOURCE_GOAL; ?>">
  <div class="gb-discussion-title-side-border row">
    <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs gb-no-padding">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $goal->creator->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
    </div>
    <div class="col-lg-11 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
      <h5 class="gb-parent-box-heading">
        <a href="<?php echo $goalUrl; ?>" class="goal-level gb-display-attribute" gb-control-target="#gb-goal-form-level-input" gb-option-id="<?php echo $goal->level_id; ?>">
          <?php echo $goal->level->name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $goal->creator_id)); ?>"><?php echo $goal->creator->profile->firstname . " " . $goal->creator->profile->lastname ?>
        </a>
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-chevron-down"></i>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="gb-edit-form-show" data-gb-target="#gb-goal-form">edit</a></li>
            <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
            <li class="divider"></li>
          </ul>
        </div>
      </h5>
      <div class="panel-body">
        <div class="row gb-panel-display">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
            <p class="">
              <a class="goal-title gb-display-attribute" gb-control-target="#gb-goal-form-title-input" href="<?php echo Yii::app()->createUrl('goal/goal/goalHome', array('goalId' => $goal->id)); ?>">
                <?php echo $goal->title; ?>
              </a>   
              <span class="goal-description gb-display-attribute" gb-control-target="#gb-goal-form-description-input"><?php echo $goal->description ?></span>
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
      <a href="<?php echo Yii::app()->createUrl('goal/goal/goalHome', array('goalId' => $goal->id)); ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-open"></i> Open</a>
      <a class="gb-disabled-1 gb-goal-contribute-request-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-list-alt"></i> Participate</a>
      <a href="<?php echo Yii::app()->createUrl('goal/goal/goalHome', array('goalId' => $goal->id)); ?>" class="gb-disabled-1 col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm  btn-default"><i class="glyphicon glyphicon-share-alt"></i> Share</a>
    </div>
    <div id="gb-goal-contributor-request-form-container" class="row gb-panel-form gb-hide">

    </div>
  </div>
</div>