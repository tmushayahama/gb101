<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$menteeStatus = $mentee->status;
?>
<div class="gb-person-badge row-fluid <?php echo "gb-badge-status-" . $menteeStatus; ?>" mentee-id="<?php echo $mentee->mentee_id; ?>">
  <div class="row-fluid">
    <div class="span4">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="span8">
      <div class="row-fluid gb-description">
        <a><h3><?php echo $mentee->mentee->profile->firstname . " " . $mentee->mentee->profile->lastname ?></h3></a>
        <p><?php echo RequestNotification::getRequestNotification(RequestNotification::$TYPE_MENTORSHIP_ENROLLMENT, $mentee->mentee_id, $mentorshipId)->message; ?></p>
      </div>
      <?php
      switch ($menteeStatus):
        case MentorshipEnrolled::$PENDING_REQUEST:
          ?>
          <div class="row-fluid gb-footer ">
            <button class="gb-accept-enrollment-request-btn gb-btn gb-btn-blue-2">Accept</button>
            <button class="gb-btn gb-btn-grey-1">Ignore</button>
          </div>
          <?php
          break;
        case MentorshipEnrolled::$ENROLLED:
          ?>
          <div class="row-fluid gb-footer ">
            <h4 class="text-success pull-left"><i class="icon-ok"></i> Enrolled</h4>
            <div class="pull-right btn-group">
              <button class="gb-btn gb-btn-grey-1 dropdown-toggle" data-toggle="dropdown">
                Settings
                <i class="icon-chevron-down"></i>
              </button>
              <ul class="dropdown-menu">
                
                <li><a>Delete</a></li>
              </ul>
            </div>
          </div>
          <?php
          break;
      endswitch;
      ?>
    </div>
  </div>
</div>
