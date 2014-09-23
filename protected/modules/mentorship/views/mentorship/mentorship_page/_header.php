<br>
<div class="mentorship-info-container row" mentorship-id="<?php echo $mentorship->id; ?>">
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-padding-thin">
    <div class="row gb-person-name-badge-1">
      <img href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->owner_id)); ?>" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->owner->profile->avatar_url; ?>" class="gb-person-img" alt="">
      <div class="gb-person-info">
        <h3 class="">Owner</h3>
        <h5 class="gb-ellipsis">
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->owner_id)); ?>"> <?php echo $mentorship->owner->profile->firstname . " " . $mentorship->owner->profile->lastname ?></a>
        </h5>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-padding-thin">
    <div class="row gb-person-name-badge-1">
      <?php if ($mentorship->mentor_id == null): ?>
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/gb_unknown_profile.png"; ?>" class="gb-person-img" alt="">
        <div class="gb-person-info">
          <h3 class="">No Mentor</h3>
          <h5 class="gb-ellipsis">
            <a class="gb-send-request-modal-trigger" gb-source-id="<?php echo $mentorship->id; ?>" 
               gb-type="<?php echo Type::$SOURCE_MENTOR_REQUESTS; ?>" gb-status="<?php echo Notification::$STATUS_PENDING; ?>">
              Request Mentor
            </a>
          </h5>
        </div>
      <?php else: ?>
        <img href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->mentor_id)); ?>" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->mentor->profile->avatar_url; ?>" class="gb-person-img" alt="">
        <div class="gb-person-info">
          <h3 class="">Mentor</h3>
          <h5 class="gb-ellipsis">
            <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->mentor_id)); ?>"> <?php echo $mentorship->mentor->profile->firstname . " " . $mentorship->mentor->profile->lastname ?></a>
          </h5>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-padding-thin">
    <div class="row gb-person-name-badge-1">
      <?php if ($mentorship->mentee_id == null): ?>
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/gb_unknown_profile.png"; ?>" class="gb-person-img" alt="">
        <div class="gb-person-info">
          <h3 class="">No Mentee</h3>
          <h5 class="gb-ellipsis">
            <a class="gb-send-request-modal-trigger" gb-source-id="<?php echo $mentorship->id; ?>" 
               gb-type="<?php echo Type::$SOURCE_MENTEE_REQUESTS; ?>" gb-status="<?php echo Notification::$STATUS_PENDING; ?>">
              Request Mentee
            </a>
          </h5>
        </div>
      <?php else: ?>
        <img href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->mentee_id)); ?>" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->mentee->profile->avatar_url; ?>" class="gb-person-img" alt="">
        <div class="gb-person-info">
          <h3 class="">Mentee</h3>
          <h5 class="gb-ellipsis">
            <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->mentee_id)); ?>"> <?php echo $mentorship->mentee->profile->firstname . " " . $mentorship->mentee->profile->lastname ?></a>
          </h5>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!--
  <?php
  //if ($mentorshipMonitors):
  // foreach ($mentorshipMonitors as $mentorshipMonitor):
  ?>
        <div class="gb-img-container">
          <img href="<?php //echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipMonitor->monitor_id));         ?>" src="<?php //echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipMonitor->monitor->profile->avatar_url;      ?>" class="" alt="">
          <h5 class="gb-img-name">Monitor: <br>
            <a href="<?php // echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipMonitor->monitor_id));         ?>"> <?php //echo $mentorshipMonitor->monitor->profile->firstname . " " . $mentorshipMonitor->monitor->profile->lastname      ?></a>
          </h5>
        </div>
  <?php
  // endforeach;
  // else:
  ?>
      <div class="gb-img-container">
        <img src="<?php // echo Yii::app()->request->baseUrl . "/img/profile_pic/gb_observer.png";         ?>" class="" alt="">
        <h5 class="gb-img-name">No Monitor(s): <br>
          <a>Get Observer(s)</a>
        </h5>
      </div>
  <?php // endif; ?>
  </div>
</div> -->
</div>
<br>