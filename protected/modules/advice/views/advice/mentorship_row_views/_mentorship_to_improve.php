<?php
/* @var $this AdviceController */
/* @var $model AdviceCommitment */
/* @var $form CActiveForm */
$adviceUrl = "";
if (Yii::app()->user->isGuest) {
  $adviceUrl = Yii::app()->createUrl("advice/advice/advicebank", array());
} else {
  $adviceUrl = Yii::app()->createUrl("advice/advice/advicehome", array());
}
?>
<div class="gb-block gb-block-row panel panel-default row" advice-id="<?php echo $advice->id; ?>" 
     data-gb-source-pk="<?php echo $advice->id; ?>" data-gb-source="<?php echo Type::$SOURCE_ADVICE; ?>">
  <div class="gb-discussion-title-side-border row">
    <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs ">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $advice->creator->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
    </div>
    <div class="col-lg-11 col-sm-11 col-xs-12  gb-no-margin">
      <h5 class="gb-parent-box-heading">
        <a href="<?php echo $adviceUrl; ?>" class="advice-level gb-display-attribute" gb-control-target="#gb-advice-form-level-input" gb-option-id="<?php echo $advice->level_id; ?>">
          <?php echo $advice->level->name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $advice->creator_id)); ?>"><?php echo $advice->creator->profile->firstname . " " . $advice->creator->profile->lastname ?>
        </a>
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-chevron-down"></i>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="gb-edit-form-show" data-gb-target="#gb-advice-form">edit</a></li>
            <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
            <li class="divider"></li>
          </ul>
        </div>
      </h5>
      <div class="panel-body">
        <div class="row gb-panel-display">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <p class="">
              <a class="advice-title gb-display-attribute" gb-control-target="#gb-advice-form-title-input" href="<?php echo Yii::app()->createUrl('advice/advice/adviceHome', array('adviceId' => $advice->id)); ?>">
                <?php echo $advice->title; ?>
              </a>   
              <span class="advice-description gb-display-attribute" gb-control-target="#gb-advice-form-description-input"><?php echo $advice->description ?></span>
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
      <a href="<?php echo Yii::app()->createUrl('advice/advice/adviceHome', array('adviceId' => $advice->id)); ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-open"></i> Open</a>
      <a class="gb-disabled-1 gb-advice-contribute-request-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-list-alt"></i> Participate</a>
      <a href="<?php echo Yii::app()->createUrl('advice/advice/adviceHome', array('adviceId' => $advice->id)); ?>" class="gb-disabled-1 col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm  btn-default"><i class="glyphicon glyphicon-share-alt"></i> Share</a>
    </div>
    <div id="gb-advice-contributor-request-form-container" class="row gb-panel-form gb-hide">

    </div>
  </div>
</div>