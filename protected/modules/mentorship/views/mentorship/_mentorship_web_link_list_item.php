<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry panel panel-default" mentorship-web-link-id="<?php echo $mentorshipWebLinkModel->id; ?>"
      gb-source-pk-id="<?php echo $mentorshipWebLinkModel->web_link_id; ?>" gb-data-source="<?php echo Type::$SOURCE_WEBLINK; ?>">
  <div class="panel-body">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="gb-panel-display">
      <p>
        <a class="gb-display-attribute" gb-control-target="#gb-mentorship-web-link-form-title-input" href="<?php echo $mentorshipWebLinkModel->webLink->link; ?>" target="blank">
          <?php echo $mentorshipWebLinkModel->webLink->title; ?>
        </a> 
        <span class="gb-display-attribute" gb-control-target="#gb-mentorship-web-link-form-description-input"><?php echo $mentorshipWebLinkModel->webLink->description; ?></span>
      </p>
      <a class="gb-hide gb-display-attribute" gb-control-target="#gb-mentorship-web-link-form-link-input"><?php echo $mentorshipWebLinkModel->webLink->link; ?></a>
    </div>
  </div>
  <?php if ($mentorshipWebLinkModel->webLink->creator_id == Yii::app()->user->id): ?>
    <div class="panel-footer gb-no-padding"> 
      <div class="row">
        <div class="btn-group pull-right">
          <a class="gb-edit-form-show btn btn-link"
             gb-form-target="#gb-mentorship-web-link-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a>
          <a class="gb-delete-me btn btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>


