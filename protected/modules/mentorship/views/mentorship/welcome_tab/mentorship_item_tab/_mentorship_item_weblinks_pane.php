<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <div class="row gb-panel-form gb-hide">
  </div>
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
    <p class="gb-ellipsis">Weblinks</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 gb-no-padding">
    <i class="pull-right"><?php echo $mentorshipWeblinksCount; ?></i>
   </div>
  </h5>
  <input class="gb-form-show gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12"
         type="text"
         data-gb-target-container="#gb-weblink-form-container"
         data-gb-target="#gb-weblink-form"
         readonly
         placeholder="Write a Weblink"
         />
 </div>

 <div id="gb-weblink-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('weblink.views.weblink.forms._weblink_form', array(
     "formId" => "gb-weblink-form",
     "actionUrl" => Yii::app()->createUrl("mentorship/mentorship/addMentorshipWeblink", array("mentorshipId" => $mentorshipId)),
     "prependTo" => "#gb-mentorship-weblinks",
     'weblinkModel' => $weblinkModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-mentorship-weblinks">
  <?php
  $this->renderPartial('mentorship.views.mentorship.activity.weblink._mentorship_weblinks', array(
    "mentorshipWeblinks" => $mentorshipWeblinks,
    "mentorshipWeblinksCount" => $mentorshipWeblinksCount,
    "mentorshipId" => $mentorshipId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>
