<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-right-nav-2" class="gb-nav-parent col-lg-10 col-md-10 col-sm-12 col-xs-12 gb-padding-none">
 <div class="row">
  <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
   <div class="gb-nav-heading-1 col-lg-3 col-sm-2 col-xs-12">
    <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
     <p class="gb-title gb-ellipsis"><?php echo $profile->firstname . " " . $profile->lastname; ?></p>
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
   <div class="col-lg-offset-1 col-lg-2 col-sm-2 gb-padding-thin">
    <a class="gb-form-modal-trigger btn btn-default pull-right"
       data-gb-modal-target="#gb-mentorship-form-modal">
     <i class="glyphicon glyphicon-plus"></i> Create
    </a>
   </div>
  </ul>
 </div>
 <div class="tab-content">

 </div>
 <div class="gb-dummy-height"></div>
</div>
