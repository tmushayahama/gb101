<?php
/* @var $this PromiseController */
/* @var $model PromiseCommitment */
/* @var $form CActiveForm */
$promiseUrl = "";
if (Yii::app()->user->isGuest) {
  $promiseUrl = Yii::app()->createUrl("promise/promise/promisebank", array());
} else {
  $promiseUrl = Yii::app()->createUrl("promise/promise/promisehome", array());
}
?>
<div class="gb-block gb-block-row panel panel-default row" promise-id="<?php echo $promise->id; ?>" 
     data-gb-source-pk="<?php echo $promise->id; ?>" data-gb-source="<?php echo Type::$SOURCE_PROMISE; ?>">
  <div class="gb-discussion-title-side-border row">
    <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs ">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $promise->creator->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
    </div>
    <div class="col-lg-11 col-sm-11 col-xs-12  gb-no-margin">
      <h5 class="gb-parent-box-heading">
        <a href="<?php echo $promiseUrl; ?>" class="promise-level gb-display-attribute" gb-control-target="#gb-promise-form-level-input" gb-option-id="<?php echo $promise->level_id; ?>">
          <?php echo $promise->level->name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $promise->creator_id)); ?>"><?php echo $promise->creator->profile->firstname . " " . $promise->creator->profile->lastname ?>
        </a>
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-chevron-down"></i>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="gb-edit-form-show" data-gb-target="#gb-promise-form">edit</a></li>
            <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
            <li class="divider"></li>
          </ul>
        </div>
      </h5>
      <div class="panel-body">
        <div class="row gb-panel-display">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <p class="">
              <a class="promise-title gb-display-attribute" gb-control-target="#gb-promise-form-title-input" href="<?php echo Yii::app()->createUrl('promise/promise/promiseHome', array('promiseId' => $promise->id)); ?>">
                <?php echo $promise->title; ?>
              </a>   
              <span class="promise-description gb-display-attribute" gb-control-target="#gb-promise-form-description-input"><?php echo $promise->description ?></span>
            </p>
          </div>
        </div>
      </div>
      <div class="gb-panel-form gb-hide ">
      </div>

    </div>
  </div>
  <div class="panel-footer row gb-panel-display ">
    <div class="row">
      <a href="<?php echo Yii::app()->createUrl('promise/promise/promiseHome', array('promiseId' => $promise->id)); ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-open"></i> Open</a>
      <a class="gb-disabled-1 gb-promise-contribute-request-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-list-alt"></i> Participate</a>
      <a href="<?php echo Yii::app()->createUrl('promise/promise/promiseHome', array('promiseId' => $promise->id)); ?>" class="gb-disabled-1 col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm  btn-default"><i class="glyphicon glyphicon-share-alt"></i> Share</a>
    </div>
    <div id="gb-promise-contributor-request-form-container" class="row gb-panel-form gb-hide">

    </div>
  </div>
</div>