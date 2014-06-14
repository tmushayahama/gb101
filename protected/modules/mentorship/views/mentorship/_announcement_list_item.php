<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-announcement-list-item panel panel-default" mentorship-announcement-id="<?php echo $mentorshipAnnouncement->id; ?>">
  <div class="panel-body">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="gb-panel-display row">
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
        <p><strong class="gb-display-attribute" gb-control-target="#gb-mentorship-announcement-form-title-input"><?php echo $mentorshipAnnouncement->announcement->title; ?> </strong> 
          <span class="gb-display-attribute" gb-control-target="#gb-mentorship-announcement-form-description-input"> <?php echo $mentorshipAnnouncement->announcement->description; ?></span>
        </p>
      </div>
      <?php if ($mentorshipAnnouncement->announcement->announcer_id == Yii::app()->user->id): ?>
        <div class="panel-footer col-lg-2 col-md-2 col-sm-2 col-xs-12 gb-no-padding"> 
          <div class="row">
            <div class="btn-group pull-right">
              <a class="gb-edit-form-show btn btn-link"
                 gb-form-target="#gb-mentorship-announcement-form">
                <i class="glyphicon glyphicon-edit"></i>
              </a>
              <a class="gb-answer-list-item-delete btn btn-link"><i class="glyphicon glyphicon-trash"></i></a>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>


