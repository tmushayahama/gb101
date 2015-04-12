<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="nav-container col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-no-padding">
 <div id="gb-middle-nav-3" class="gb-nav-parent">
  <div class="gb-heading-img-container row">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/mentorships/" . $mentorship->mentorship_picture_url; ?>" class="gb-heading-img" alt="">
  </div>
  <div class="row gb-nav-heading">
   <p class="gb-heading">
    <strong><?php echo $mentorship->title; ?></strong>
    <?php echo $mentorship->description; ?>
   </p>
   <div class="gb-body row">
    <a class="btn btn-default gb-form-modal-trigger gb-prepopulate-selected-people-list col-lg-6 col-md-6 col-sm-6 col-xs-12"
       data-gb-selection-type="multiple"
       data-gb-modal-target="#gb-send-request-modal"
       data-gb-list-target="#gb-contributor-form-people-list"
       data-gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
       data-gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
       data-gb-source-pk="<?php echo $mentorship->id; ?>"
       data-gb-source="<?php echo Type::$SOURCE_CONTRIBUTOR; ?>">
     <i class="glyphicon glyphicon-plus"></i> <strong>Request</strong>
    </a>
    <a class="pull-right btn btn btn-default gb-request-notification-viewer gb-populate col-lg-6 col-md-6 col-sm-6 col-xs-12"
       data-gb-target="#gb-notification-viewer-body"
       data-gb-type="gb-modal"
       data-gb-target-heading="#gb-notification-viewer-heading"
       data-gb-heading-text="Pending mentorship judge request(s)"
       data-gb-source="<?php echo Level::$LEVEL_CATEGORY_MENTORSHIP_TYPE; ?>"
       data-gb-source-pk="<?php echo $mentorship->id; ?>">
     <i class="glyphicon glyphicon-road"></i> <strong>View Request</strong>
    </a>
   </div>
   <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">


   </div>
  </div>
  <div id="gb-mentorship-mentors" class="gb-list">
   <?php
   $this->renderPartial('mentorship.views.mentorship.activity.mentorship._mentorship_mentor_list', array(
     "mentorship" => $mentorship,
     "mentorshipChildren" => $mentorshipChildren,
     "mentorshipChildrenCount" => $mentorshipChildrenCount,
     "offset" => 1,
   ));
   ?>
  </div>
  <div class="gb-dummy-height"></div>
 </div>
</div>
<div class="nav-container col-lg-7 col-md-7 col-sm-12 col-xs-12 gb-no-padding">
 <div id="gb-right-nav-3">
  <div class="tab-content">
   <!---------- MENTORSHIP MANAGEMENT WELCOME OVERVIEW PANE ------------>
   <div class="tab-pane active" id="gb-mentorship-item-pane">
    <br>
    <h4 class="text-center text-warning gb-no-information row">
     select a mentorship to show
    </h4>
   </div>
  </div>
  <div class="gb-dummy-height"></div>
 </div>
</div>
<?php
$this->renderPartial('application.views.site.modals._send_request_modal', array(
  "formId" => "gb-contributor-form",
  "prependTo" => "#gb-mentorship-mentors",
  "sourceId" => $mentorship->id,
  "requestTypes" => $contributorTypes,
  "title" => "Add a Contributor",
  "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_NOTIFY
));
?>