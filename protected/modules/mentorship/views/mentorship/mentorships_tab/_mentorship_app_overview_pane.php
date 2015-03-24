<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-right-nav-2" class="gb-nav-parent col-lg-11 col-md-11 col-sm-12 col-xs-12 gb-padding-none">
 <div class="row">
  <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
   <div class="gb-nav-heading-1 col-lg-3 col-sm-2 col-xs-12">
    <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
     <p class="gb-title gb-ellipsis">MENTORSHIP APP</p>
     <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
    </a>
   </div>
   <li class="active col-lg-2 col-sm-2 col-xs-12">
    <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
     <p class="gb-title gb-ellipsis">All</p>
    </a>
   </li>
   <li class="col-lg-2 col-sm-2 col-xs-12">
    <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
     <p class="gb-title gb-ellipsis">Enrolled</p>
    </a>
   </li>
   <li class="col-lg-2 col-sm-2 col-xs-12">
    <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
     <p class="gb-title gb-ellipsis">Discover</p>
    </a>
   </li>
   <div class="col-lg-offset-1 col-lg-2 col-sm-2 gb-padding-medium">
    <a class="gb-form-modal-trigger btn btn-primary pull-right"
       data-gb-modal-target="#gb-mentorship-form-modal">
     <i class="glyphicon glyphicon-plus"></i> Create
    </a>
   </div>
  </ul>
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