<?php
/* @var $this SkillListItemController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
$promiseUrl = "";
if (Yii::app()->user->isGuest) {
  $promiseUrl = Yii::app()->createUrl("promise/promise/promisebank", array());
} else {
  $promiseUrl = Yii::app()->createUrl("promise/promise/promisehome", array());
}
?>
<div class="gb-post-entry gb-promise-gained" promise-id="<?php echo $promiseListItem->id; ?>" 
     gb-source-pk-id="<?php echo $promiseListItem->id; ?>" gb-data-source="<?php echo Type::$SOURCE_SKILL; ?>">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $promiseListItem->user->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-promise-gained-top-border col-lg-10 col-sm-10 col-xs-12">
      <div class="panel-heading">
        <h5><a href="<?php echo $promiseUrl; ?>" class="promise-level gb-display-attribute" gb-control-target="#gb-promise-list-form-level-input" gb-option-id="<?php echo $promiseListItem->level_id; ?>"><?php echo $promiseListItem->level->level_name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $promiseListItem->user_id)); ?>"><?php echo $promiseListItem->user->profile->firstname . " " . $promiseListItem->user->profile->lastname ?></a></h5>
        <small><?php echo Type::$PRIVACY[$promiseListItem->privacy]; ?></small>	
      </div> 
      <div class="panel-body">
        <div class="row gb-panel-display">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
            <p class="">
              <a class="promise-title gb-display-attribute" gb-control-target="#gb-promise-list-form-title-input" href="<?php echo Yii::app()->createUrl('promise/promise/promiseManagement', array('promiseListItemId' => $promiseListItem->id)); ?>">
                <?php echo $promiseListItem->promise->title; ?>
              </a>   
              <span class="promise-description gb-display-attribute" gb-control-target="#gb-promise-list-form-description-input"><?php echo $promiseListItem->promise->description ?></span>
            </p>
          </div>
        </div>
      </div>
      <div class="gb-panel-form gb-hide gb-no-padding">
      </div>
      <div class="panel-footer gb-panel-display gb-no-padding">
        <div class="row">
          <div class="pull-right">
            <a class="btn btn-link gb-edit-form-show" gb-form-target="#gb-promise-list-form"><i class="glyphicon glyphicon-edit"></i></a>
            <a class="btn btn-link gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <a href="<?php echo Yii::app()->createUrl('promise/promise/promiseManagement', array('promiseListItemId' => $promiseListItem->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>