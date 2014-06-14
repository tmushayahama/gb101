<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-mentorship-web-link-item panel panel-default" mentorship-web-link-id="<?php echo $mentorshipWebLinkModel->id; ?>">
  <div class="panel-body">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="gb-panel-display">
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
        <p>
          <a class="gb-display-attribute" gb-control-target="#gb-mentorship-web-link-form-title-input" href="<?php echo $mentorshipWebLinkModel->webLink->link; ?>" target="blank">
            <?php echo $mentorshipWebLinkModel->webLink->title; ?>
          </a> 
          <span class="gb-display-attribute" gb-control-target="#gb-mentorship-web-link-form-description-input"><?php echo $mentorshipWebLinkModel->webLink->description; ?></span>
        </p>
        <a class="gb-hide gb-display-attribute" gb-control-target="#gb-mentorship-web-link-form-link-input"><?php echo $mentorshipWebLinkModel->webLink->link; ?></a>
      </div>
      <?php if ($mentorshipWebLinkModel->webLink->creator_id == Yii::app()->user->id): ?>
        <div class="panel-footer col-lg-2 col-md-2 col-sm-2 col-xs-12 gb-no-padding"> 
          <div class="row">
            <div class="btn-group pull-right">
              <a class="gb-edit-form-show btn btn-link"
                 gb-form-target="#gb-mentorship-web-link-form">
                <i class="glyphicon glyphicon-edit"></i>
              </a>
              <a class="btn btn-link"><i class="glyphicon glyphicon-trash"></i></a>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>


