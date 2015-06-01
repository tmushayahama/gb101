<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">
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
  $this->renderPartial('mentorship.views.mentorship.activity.weblink._mentorship_weblinks_list', array(
    "mentorshipWeblinks" => $mentorshipWeblinks,
    "mentorshipWeblinksCount" => $mentorshipWeblinksCount,
    "mentorshipId" => $mentorshipId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

