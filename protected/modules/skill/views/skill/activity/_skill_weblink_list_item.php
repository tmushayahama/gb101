<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry panel panel-default row gb-background-light-grey-1" skill-weblink-id="<?php echo $skillWeblinkModel->id; ?>"
     gb-source-pk-id="<?php echo $skillWeblinkModel->weblink_id; ?>" gb-data-source="<?php echo Type::$SOURCE_WEBLINK; ?>">
  <div class="col-lg-2 col-sm-2 col-xs-2">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillWeblinkModel->weblink->creator->profile->avatar_url; ?>" class="gb-img-md pull-right img-polariod" alt="">
  </div>
  <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default gb-no-padding gb-discussion-title-side-border">
    <div class="panel-body">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="gb-panel-display">
        <p>
          <a class="gb-display-attribute" gb-control-target="#gb-skill-weblink-form-title-input" href="<?php echo $skillWeblinkModel->weblink->link; ?>" target="blank">
            <?php echo $skillWeblinkModel->weblink->title; ?>
          </a> 
          <span class="gb-display-attribute" gb-control-target="#gb-skill-weblink-form-description-input"><?php echo $skillWeblinkModel->weblink->description; ?></span>
        </p>
        <a class="gb-hide gb-display-attribute" gb-control-target="#gb-skill-weblink-form-link-input"><?php echo $skillWeblinkModel->weblink->link; ?></a>
      </div>
    </div>
    <div class="panel-footer gb-no-padding"> 
      <div class="row">
        <div class="pull-left gb-padding-thin">By: 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillWeblinkModel->weblink->creator_id)); ?>">
            <i><?php echo $skillWeblinkModel->weblink->creator->profile->firstname . " " . $skillWeblinkModel->weblink->creator->profile->lastname ?></i>
          </a>
        </div>
        <?php if ($skillWeblinkModel->weblink->creator_id == Yii::app()->user->id): ?>
          <div class="btn-group pull-right">
            <a class="gb-edit-form-show btn btn-link"
               gb-form-target="#gb-skill-weblink-form">
              <i class="glyphicon glyphicon-edit"></i>
            </a>
            <a class="gb-delete-me btn btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          </div> 
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>


