<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row gb-home-nav">
  <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
     gb-type="<?php echo Notification::$NOTIFICATION_MENTOR_REQUEST_OWNER; ?>" 
     gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
     gb-target-modal="#gb-send-request-modal"
     gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
     gb-single-target-display=".gb-display-assign-to"
     gb-single-target-display-input="#gb-request-form-recipient-id-input"
     gb-source-pk-id="<?php echo $mentorship->id; ?>" 
     gb-data-source="<?php echo Type::$SOURCE_MENTOR_REQUESTS; ?>"
     gb-form-slide-target="#gb-request-form-container"
     gb-form-target="#gb-request-form"
     gb-submit-prepend-to="#gb-mentor-requests">
    <div class="thumbnail">
      <div class="gb-img-container">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_request_icon_10.png" alt="">
      </div>
      <div class="caption">
        <h5 class="text-center">Request a<br>Mentor</h5>
      </div>
    </div>
  </a>
  <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
     gb-type="<?php echo Notification::$NOTIFICATION_MENTEE_REQUEST_OWNER; ?>" 
     gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
     gb-target-modal="#gb-send-request-modal"
     gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
     gb-single-target-display=".gb-display-assign-to"
     gb-single-target-display-input="#gb-request-form-recipient-id-input"
     gb-source-pk-id="<?php echo $mentorship->id; ?>" 
     gb-data-source="<?php echo Type::$SOURCE_MENTEE_REQUESTS; ?>"
     gb-form-slide-target="#gb-request-form-container"
     gb-form-target="#gb-request-form"
     gb-submit-prepend-to="#gb-mentee-requests">
    <div class="thumbnail">
      <div class="gb-img-container">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentee_request_icon_10.png" alt="">
      </div>
      <div class="caption">
        <h5 class="text-center">Request a<br>Mentee</h5>
      </div>
    </div>
  </a>
  <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
     gb-type="<?php echo Notification::$NOTIFICATION_MENTOR_ASSIGN_OWNER; ?>" 
     gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
     gb-target-modal="#gb-send-request-modal"
     gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
     gb-single-target-display=".gb-display-assign-to"
     gb-single-target-display-input="#gb-request-form-recipient-id-input"
     gb-source-pk-id="<?php echo $mentorship->id; ?>" 
     gb-data-source="<?php echo Type::$SOURCE_ASSIGNMENT_REQUESTS; ?>"
     gb-form-slide-target="#gb-request-form-container"
     gb-form-target="#gb-request-form"
     gb-submit-prepend-to="#gb-assignment-requests">
    <div class="thumbnail">
      <div class="gb-img-container">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/assign_mentorship_icon_10.png" alt="">
      </div>
      <div class="caption">
        <h5 class="text-center">Mentor<br>Assignment</h5>
      </div>
    </div>
  </a>
</div>
<div id="gb-request-form-container" class="gb-hide gb-panel-form">
  <br>
  <?php
  echo $this->renderPartial('application.views.site.forms._request_form', array(
   "requestModel" => $requestModel));
  ?>
</div>
<div class="row">
  <h3 class="gb-heading-2">Owner</h3>
  <p class="">
    <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->owner_id)); ?>"> <?php echo $mentorship->owner->profile->firstname . " " . $mentorship->owner->profile->lastname ?></a>
  </p>
</div>
<div class="row">
  <h3 class="gb-heading-2">Description</h3>
  <p class="list-group-item-text">
    <strong><?php echo $mentorship->title; ?></strong>
    <span class="gb-mentorship-description"> 
      <?php echo $mentorship->description ?>
    </span> 
  </p>
  <p class="">Skill: <a><?php echo $mentorship->goalList->goal->title; ?></a></p>

</div>
<br>
<div class="hidden-sm hidden-xs">
  <p>
    <i>Other activities by <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->owner_id)); ?>"> <?php echo $mentorship->owner->profile->firstname . " " . $mentorship->owner->profile->lastname ?></a></i>
  </p>
  <div class="row">
    <h3 class="gb-heading-2">Advice Pages</h3>
    <?php foreach ($advicePages as $advicePage): ?>
      <div class="row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
        <p class="gb-ellipsis">
          <a href="<?php echo Yii::app()->createUrl('pages/pages/advicePageDetail', array('advicePageId' => $advicePage->id)); ?>">
            <?php echo $advicePage->title; ?>
          </a>
        </p>
      </div>
    <?php endforeach; ?>
  </div>
  <br>
  <div class="row">
    <h3 class="gb-heading-2">Other Mentorships</h3>
    <?php foreach ($otherMentorships as $otherMentorship): ?>
      <div class="row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
        <p class="gb-ellipsis">
          <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $otherMentorship->id)); ?>"><?php echo $otherMentorship->title; ?></a>
        </p>
      </div>
    <?php endforeach; ?>
  </div>
</div>