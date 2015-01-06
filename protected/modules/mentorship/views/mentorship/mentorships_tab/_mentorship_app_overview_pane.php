<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-right-nav-2" class="gb-nav-parent col-lg-10 col-md-10 col-sm-12 col-xs-12">
 <div class="tab-content">
  <div class="row">
   <div class="col-lg-3 col-md-6 col-sm-8 col-xs-12">
    <h4>Mentorships</h4>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
    <div class="row">

    </div>
   </div>
  </div>
  <div id="gb-mentorships" class="gb-list row">
   <div class="gb-box col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="gb-container gb-link">
     <h5 class="gb-form-heading"><i class="glyphicon glyphicon-plus"></i> New Mentorship</h5>
     <?php
     $this->renderPartial('mentorship.views.mentorship.forms._mentorship_form', array(
       "formId" => "gb-mentorship-form",
       "actionUrl" => Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()),
       "prependTo" => "#gb-mentorships",
       "mentorshipLevelList" => $mentorshipLevelList,
       'mentorshipModel' => new Mentorship(),
       "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
     ));
     ?>
    </div>
   </div>
   <?php
   $this->renderPartial('mentorship.views.mentorship.activity.mentorship._mentorship_list', array(
     "mentorships" => $mentorships,
     "mentorshipsCount" => $mentorshipsCount,
     "level" => 0,
     "offset" => 1,
   ));
   ?>
  </div>
 </div>
 <div class="gb-dummy-height"></div>
</div>

