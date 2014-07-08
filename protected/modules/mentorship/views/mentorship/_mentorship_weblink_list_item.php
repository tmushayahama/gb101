<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry panel panel-default" mentorship-weblink-id="<?php echo $mentorshipWeblinkModel->id; ?>"
     gb-source-pk-id="<?php echo $mentorshipWeblinkModel->weblink_id; ?>" gb-data-source="<?php echo Type::$SOURCE_WEBLINK; ?>">
  <div class="panel-body">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="gb-panel-display">
      <p>
        <a class="gb-display-attribute" gb-control-target="#gb-mentorship-weblink-form-title-input" href="<?php echo $mentorshipWeblinkModel->weblink->link; ?>" target="blank">
          <?php echo $mentorshipWeblinkModel->weblink->title; ?>
        </a> 
        <span class="gb-display-attribute" gb-control-target="#gb-mentorship-weblink-form-description-input"><?php echo $mentorshipWeblinkModel->weblink->description; ?></span>
      </p>
      <a class="gb-hide gb-display-attribute" gb-control-target="#gb-mentorship-weblink-form-link-input"><?php echo $mentorshipWeblinkModel->weblink->link; ?></a>
    </div>
  </div>
  <div class="panel-footer gb-no-padding"> 
    <div class="row">
      <div class="pull-left gb-padding-thin">By: 
        <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipWeblinkModel->weblink->creator_id)); ?>">
          <i><?php echo $mentorshipWeblinkModel->weblink->creator->profile->firstname . " " . $mentorshipWeblinkModel->weblink->creator->profile->lastname ?></i>
        </a>
      </div>
      <?php if ($mentorshipWeblinkModel->weblink->creator_id == Yii::app()->user->id): ?>
        <div class="btn-group pull-right">
          <a class="gb-edit-form-show btn btn-link"
             gb-form-target="#gb-mentorship-weblink-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a>
          <a class="gb-delete-me btn btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        </div> 
      <?php endif; ?>
    </div>
  </div>
</div>

