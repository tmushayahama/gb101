<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$menteeStatus = $mentee->status;
?>
<div class="gb-person-badge row <?php echo "gb-badge-status-" . $menteeStatus; ?>" mentee-id="<?php echo $mentee->mentee_id; ?>">
  <div class="col-lg-4 col-sm-4 col-xs-12">
    <img src="<?php echo Yii::app()->request->baseUrl."/img/profile_pic/".$mentee->mentee->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
  </div>
  <div class="col-lg-8 col-sm-8 col-xs-12 gb-no-padding">
    <div class="panel panel-default">
      <div class="panel-heading">
        <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentee->mentee_id)); ?>"><h5><?php echo $mentee->mentee->profile->firstname . " " . $mentee->mentee->profile->lastname ?></h5></a>
      </div>
      <div class="panel-body gb-padding-medium">
        <p><?php echo RequestNotification::getRequestNotification(RequestNotification::$TYPE_MENTORSHIP_ENROLLMENT, $mentee->mentee_id, $mentorshipId)->message; ?></p>
      </div>
      <div class="panel-footer">
        <div class="row">
          <?php
          switch ($menteeStatus):
            case MentorshipEnrolled::$PENDING_REQUEST:
              ?>
              <button class="gb-accept-enrollment-request-btn btn btn-xs btn-success">Accept</button>
              <button class="btn btn-xs btn-default">Ignore</button>
              <?php
              break;
            case MentorshipEnrolled::$ENROLLED:
              ?>
              <h4 class="text-success pull-left"><i class="glyphicon glyphicon-ok"></i> Enrolled</h4>
              <div class="pull-right btn-group">
                <button class="btn btn-xs btn-default">
                  <i class="glyphicon glyphicon-remove"></i> 
                  Remove
                </button>
              </div>
              <?php
              break;
          endswitch;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
