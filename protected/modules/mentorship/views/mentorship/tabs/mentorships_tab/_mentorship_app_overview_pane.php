<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="nav-container col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
 <div id="gb-middle-nav-3" class="gb-nav-parent">
  <div id="" class="gb-top-nav-1 gb-nav row gb-color-5">
   <div class="gb-title col-lg-10 col-md-10 col-sm-9 col-xs-10">
    <div class="gb-ellipsis">
     <div class="btn-group">
      <a class="btn btn-default btn-sm dropdown-toggle gb-backdrop-visible"
         data-toggle="dropdown" aria-expanded="false"
         data-gb-target-container="#gb-skill-form-container"
         data-gb-target="#gb-skill-form"
         data-gb-url = "<?php echo Yii::app()->createUrl('skill/skill/addskill', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
         data-gb-prepend-to="#gb-skills">
       <i class="fa fa-bars"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-left gb-form-dropdown" role="menu">
       <li>
       </li>
      </ul>
     </div>
     MENTORSHIP APP
    </div>
   </div>
   <div class="gb-action col-lg-2 col-md-2 col-sm-3 col-xs-2">
    <div class="row">
     <a class="gb-form-modal-trigger btn btn-primary pull-right"
        data-gb-modal-target="#gb-mentorship-form-modal">
      <i class="glyphicon glyphicon-plus"></i> <span class='hidden-xs'> Create</span>
     </a>
    </div>
   </div>
  </div>
  <div class="gb-scrollable-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
</div>