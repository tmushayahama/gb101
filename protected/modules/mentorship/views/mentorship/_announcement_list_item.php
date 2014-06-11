<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-announcement-list-item panel panel-default" mentorship-announcement-id="<?php echo $mentorshipAnnouncement->announcement_id; ?>">
  <div class="panel-body">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="gb-panel-display">
      <p><strong><?php echo $mentorshipAnnouncement->announcement->title; ?> </strong> 
        <?php echo $mentorshipAnnouncement->announcement->description; ?>
      </p>
    </div>
  </div>
  <?php if ($mentorshipAnnouncement->announcement->announcer_id == Yii::app()->user->id): ?>
    <div class="panel-footer gb-panel-display gb-no-padding"> 
      <div class="row">
        <div class="btn-group pull-right">
          <a class="gb-edit-form-show btn btn-link"
             gb-form-target="#gb-add-mentorship-announcement-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a>
          <a class="gb-answer-list-item-delete btn btn-link"><i class="glyphicon glyphicon-trash"></i></a>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>


