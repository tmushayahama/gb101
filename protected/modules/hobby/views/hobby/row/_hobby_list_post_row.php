<?php
/* @var $this SkillItemController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
$hobbyUrl = "";
if (Yii::app()->user->isGuest) {
  $hobbyUrl = Yii::app()->createUrl("hobby/hobby/hobbybank", array());
} else {
  $hobbyUrl = Yii::app()->createUrl("hobby/hobby/hobbyhome", array());
}
?>
<div class="gb-post-entry-row gb-hobby-gained" hobby-id="<?php echo $hobbyListItem->id; ?>" 
     gb-source-pk-id="<?php echo $hobbyListItem->id; ?>" gb-data-source="<?php echo Type::$SOURCE_SKILL; ?>">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $hobbyListItem->user->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-hobby-gained-top-border col-lg-10 col-sm-10 col-xs-12">
      <div class="panel-heading">
        <h5><a href="<?php echo $hobbyUrl; ?>" class="hobby-level gb-display-attribute" gb-control-target="#gb-hobby-list-form-level-input" gb-option-id="<?php echo $hobbyListItem->level_id; ?>"><?php echo $hobbyListItem->level->name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $hobbyListItem->user_id)); ?>"><?php echo $hobbyListItem->user->profile->firstname . " " . $hobbyListItem->user->profile->lastname ?></a></h5>
        <small><?php echo Type::$PRIVACY[$hobbyListItem->privacy]; ?></small>	
      </div> 
      <div class="panel-body">
        <div class="row gb-panel-display">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
            <p class="">
              <a class="hobby-title gb-display-attribute" gb-control-target="#gb-hobby-list-form-title-input" href="<?php echo Yii::app()->createUrl('hobby/hobby/hobbyManagement', array('hobbyListItemId' => $hobbyListItem->id)); ?>">
                <?php echo $hobbyListItem->hobby->title; ?>
              </a>   
              <span class="hobby-description gb-display-attribute" gb-control-target="#gb-hobby-list-form-description-input"><?php echo $hobbyListItem->hobby->description ?></span>
            </p>
          </div>
        </div>
      </div>
      <div class="gb-panel-form gb-hide gb-no-padding">
      </div>
      <div class="panel-footer gb-panel-display gb-no-padding">
        <div class="row">
          <div class="pull-right">
            <a class="btn btn-link gb-edit-form-show" gb-form-target="#gb-hobby-list-form"><i class="glyphicon glyphicon-edit"></i></a>
            <a class="btn btn-link gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <a href="<?php echo Yii::app()->createUrl('hobby/hobby/hobbyManagement', array('hobbyListItemId' => $hobbyListItem->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>