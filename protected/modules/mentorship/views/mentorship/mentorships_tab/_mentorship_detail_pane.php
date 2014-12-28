<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-middle-nav-3" class="gb-nav-parent col-lg-4 col-md-5 col-sm-12 col-xs-12">
 <div class="tab-content">
  <div class="tab-pane active" id="gb-app-overview-pane">
   <div class="row">
    <p>
     <strong><?php echo $mentorship->title; ?></strong>
     <?php echo $mentorship->description; ?>
    </p>
   </div>
   <div class="row">
    <a class="gb-link" gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipOverview", array('mentorshipId' => $mentorship->id)); ?>">

     Overview
    </a>
   </div>
   <div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
     <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
       <div class="col-lg-11 col-sm-11 col-xs-11 gb-padding-thin">
       </div>
       <div class="btn gb-request-notification-viewer gb-populate col-lg-1 col-sm-1 col-xs-1 gb-no-padding"
            data-gb-target="#gb-notification-viewer-body"
            data-gb-type="gb-modal"
            data-gb-target-heading="#gb-notification-viewer-heading"
            data-gb-heading-text="Pending mentorship judge request(s)"
            data-gb-source="<?php echo Level::$LEVEL_CATEGORY_MENTORSHIP_TYPE; ?>"
            data-gb-source-pk="<?php echo $mentorship->id; ?>">
        <div class="text-right"></div>
        <h4><i class="text-warning glyphicon glyphicon-road"></i></h4>
       </div>
      </h5>
      <a class="btn gb-form-show gb-prepopulate-selected-people-list gb-backdrop-disappear col-lg-12 col-md-12 col-sm-12 col-xs-12"
         data-gb-selection-type="multiple"
         data-gb-target-container="#gb-contributor-form-container"
         data-gb-target="#gb-contributor-form"
         data-gb-list-target="#gb-contributor-form-people-list"
         data-gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
         data-gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
         data-gb-source-pk="<?php echo $mentorship->id; ?>"
         data-gb-source="<?php echo Type::$SOURCE_CONTRIBUTOR; ?>">
       Request Mentor/Mentee
      </a>
     </div>
     <div id="gb-contributor-form-container" class="row gb-hide gb-panel-form">
      <div class="row">
       <?php
       $this->renderPartial('application.views.site.forms._request_form', array(
         "formId" => "gb-contributor-form",
         "prependTo" => "#gb-mentorship-contributors",
         "requestModel" => new Notification(),
         "sourceId" => $mentorship->id,
         "requestTypes" => $contributorTypes,
         "title" => "Add a Contributor",
         "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_NOTIFY
       ));
       ?>
      </div>
     </div>
     <div id="gb-mentorship-contributors">
      <?php
      $this->renderPartial('mentorship.views.mentorship.activity.contributor._mentorship_contributors', array(
        "mentorshipContributors" => $mentorshipContributors,
        "mentorshipContributorsCount" => $mentorshipContributorsCount,
        "mentorshipId" => $mentorship->id,
        "offset" => 1,
      ));
      ?>
     </div>
    </div>
   </div>
   <div id="gb-mentorships" class="gb-list">
   </div>
  </div>
 </div>
 <div class="gb-dummy-height"></div>
</div>
<div id="gb-right-nav-3" class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
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
