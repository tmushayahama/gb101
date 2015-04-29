<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-right-nav-2" class="gb-nav-parent col-lg-11 col-md-11 col-sm-12 col-xs-12 gb-padding-none">
 <div class="row">
  <div id="" class="gb-top-nav-1 col-lg-12 gb-nav">
   <div class="gb-title col-lg-10 col-sm-2 col-xs-12">
    <p class="gb-padding-left-3 gb-ellipsis">
     MENTORSHIP APP
    </p>
   </div>
   <div class="gb-action col-lg-2 col-sm-2">
    <div class="row">
     <a class="gb-form-modal-trigger btn btn-primary pull-right col-lg-12 col-md-12 col-sm-6 col-xs-6"
        data-gb-modal-target="#gb-mentorship-form-modal">
      <i class="glyphicon glyphicon-plus"></i> Create
     </a>
    </div>
   </div>
  </div>
 </div>
 <div class="tab-content">
  <div id="gb-mentorships" class="gb-list row">
   <br>
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
?>