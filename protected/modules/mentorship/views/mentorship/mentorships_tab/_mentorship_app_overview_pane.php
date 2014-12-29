<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-right-nav-2" class="gb-nav-parent col-lg-10 col-md-10 col-sm-12 col-xs-12">
 <div class="tab-content">
  <div class="tab-pane active" id="gb-app-overview-pane">
   <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-xs-offset-0 col-lg-6 col-md-6 col-sm-8 col-xs-12">
    <div class="row">
     <a class="btn btn-default btn-lg gb-form-show gb-backdrop-visible col-lg-12 col-md-12 col-sm-12 col-xs-12"
        data-gb-target-container="#gb-mentorship-form-container"
        data-gb-target="#gb-mentorship-form"
        data-gb-url = "<?php echo Yii::app()->createUrl('mentorship/mentorship/addmentorship', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
        data-gb-prepend-to="#gb-mentorships">
      <i class="glyphicon glyphicon-plus-sign"></i> Add a Mentorship
     </a>
    </div>
    <div id="gb-mentorship-form-container" class="row gb-hide gb-panel-form">
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
   <div id="gb-mentorships" class="gb-list">
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
 </div>
 <div class="gb-dummy-height"></div>
</div>

