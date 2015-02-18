<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-right-nav-2" class="gb-nav-parent col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-padding-none">
 <div class="row gb-padding-medium">
  <div class="gb-heading-9"><?php echo $profile->firstname . " " . $profile->lastname; ?></div>
  <?php echo $profile->welcome_message; ?>
 </div>
 <div class="row">
  <div class="col-lg-7">
   <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
    <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
     <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
        gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
      <p class="gb-title gb-ellipsis">SELF-SUMMARY</p>
     </a>
    </div>
    <div class="col-lg-3 col-sm-2 gb-padding-thin">
     <a class="gb-form-modal-trigger btn btn-default pull-right"
        data-gb-modal-target="#gb-mentorship-form-modal">
      <i class="glyphicon glyphicon-edit"></i> Edit
     </a>
    </div>
   </ul>
   <div class="gb-body-1">
    <p><?php echo $profile->summary; ?></p>
   </div>
   <br>
   <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
    <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
     <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
        gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
      <p class="gb-title gb-ellipsis">EXPERIENCE</p>
     </a>
    </div>
    <div class="col-lg-3 col-sm-2 gb-padding-thin">
     <a class="gb-form-modal-trigger btn btn-default pull-right"
        data-gb-modal-target="#gb-mentorship-form-modal">
      <i class="glyphicon glyphicon-edit"></i> Edit
     </a>
    </div>
   </ul>
   <div class="gb-body-1">
    <p><?php echo $profile->experience; ?></p>
   </div>
   <br>
   <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
    <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
     <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
        gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
      <p class="gb-title gb-ellipsis">INTERESTS</p>
     </a>
    </div>
    <div class="col-lg-3 col-sm-2 gb-padding-thin">
     <a class="gb-form-modal-trigger btn btn-default pull-right"
        data-gb-modal-target="#gb-mentorship-form-modal">
      <i class="glyphicon glyphicon-edit"></i> Edit
     </a>
    </div>
   </ul>
   <div class="gb-body-1">
    <p><?php echo $profile->interests; ?></p>
   </div>
   <br>
   <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
    <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
     <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
        gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
      <p class="gb-title gb-ellipsis">FAVORITE QUOTE</p>
     </a>
    </div>
    <div class="col-lg-3 col-sm-2 gb-padding-thin">
     <a class="gb-form-modal-trigger btn btn-default pull-right"
        data-gb-modal-target="#gb-mentorship-form-modal">
      <i class="glyphicon glyphicon-edit"></i> Edit
     </a>
    </div>
   </ul>
   <div class="gb-body-1">
    <p><?php echo $profile->favorite_quote; ?></p>
   </div>
  </div>
  <div class="col-lg-5">
   <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
    <div class="gb-nav-heading-2 col-lg-7 col-sm-2 col-xs-12">
     <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
        gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
      <p class="gb-title gb-ellipsis">MY DETAILS</p>
     </a>
    </div>
    <div class="col-lg-offset-2 col-lg-3 col-sm-2 gb-padding-thin">
     <a class="gb-form-modal-trigger btn btn-default pull-right"
        data-gb-modal-target="#gb-mentorship-form-modal">
      <i class="glyphicon glyphicon-edit"></i> Edit
     </a>
    </div>
   </ul>
   <br>
   <ul class="list-group row">
    <li class="list-group-item"><?php echo Type::getGenderName($profile->gender); ?></li>
    <li class="list-group-item"><?php echo $profile->address; ?></li>
   </ul>
  </div>
 </div>
 <div class="gb-dummy-height"></div>
</div>
