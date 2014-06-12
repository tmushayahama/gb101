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
      <div class="col-lg-10 col-md-10 col-sm-10">
        <p><a href="<?php echo $mentorshipWebLinkModel->webLink->link; ?>" target="blank"><strong><?php echo $mentorshipWebLinkModel->webLink->title; ?> </strong></a> 
          <?php echo $mentorshipWebLinkModel->webLink->description; ?>
        </p>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3">   
        <?php if ($mentorshipWebLinkModel->webLink->creator_id == Yii::app()->user->id): ?>
          <a class="btn btn-xs btn-link pull-right"><i class="glyphicon glyphicon-trash"></i></a>
          <a class="gb-edit-form-show btn btn-link"
            gb-form-target="#gb-mentorship-web-link-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>


