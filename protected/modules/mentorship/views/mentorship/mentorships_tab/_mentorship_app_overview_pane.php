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
   <h4>Mentorships
    <a class="gb-form-modal-trigger btn btn-primary pull-right"
       data-gb-modal-target="#gb-mentorship-form-modal">
     <i class="glyphicon glyphicon-plus"></i> Create Mentorship
    </a>
   </h4>
  </div>
  <div id="gb-mentorships" class="gb-list row">
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

<?php
$this->renderPartial('mentorship.views.mentorship.modals._mentorship_modal_form', array(
  "formId" => "gb-mentorship-form",
  "actionUrl" => Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()),
  "prependTo" => "#gb-mentorships",
  "mentorshipLevelList" => $mentorshipLevelList,
  'mentorshipModel' => new Mentorship(),
  "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
));
?>s

