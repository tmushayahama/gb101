<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-right-nav-2" class="gb-nav-parent col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-padding-none">
 <div class="gb-profile-header-1 row">
  <div class="gb-profile-header-img-container-1 col-lg-2 col-md-2 col-sm-2 col-xs-2">
   <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/profile/gb_about_me.png" class="gb-profile-header-img-1" alt="">
  </div>
  <div class="gb-profile-header-img-container-1 col-lg-7 col-md-7 col-sm-10 col-xs-10">
   <div class="gb-heading-9"><?php echo $profile->firstname . " " . $profile->lastname; ?></div>
   <?php echo $profile->welcome_message; ?>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-padding-medium">
   <div class="row">
    <div class="btn btn-default col-lg-12 col-md-12 col-sm-4 col-xs-6">
     <i class="glyphicon glyphicon-envelope"></i> Message
    </div>
    <br>
    <br>
    <div class="btn btn-primary col-lg-12 col-md-12 col-sm-4 col-xs-6">
     <i class="glyphicon glyphicon-send"></i> Request
    </div>
   </div>
  </div>
 </div>
 <div class="row">
  <div class="col-lg-7">
   <div class="row gb-section-row-1">
    <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
     <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
      <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
       <p class="gb-title gb-ellipsis">SELF-SUMMARY</p>
      </a>
     </div>
     <div class="col-lg-3 col-sm-2 gb-padding-thin">
     </div>
    </ul>
    <div class="gb-body-1">
     <p><?php echo $profile->summary; ?></p>
    </div>
   </div>
   <div class="gb-section-row-1 row">
    <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
     <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
      <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
       <p class="gb-title gb-ellipsis">EXPERIENCE</p>
      </a>
     </div>
     <div class="col-lg-3 col-sm-2 gb-padding-thin">
     </div>
    </ul>
    <div class="gb-body-1">
     <p><?php echo $profile->experience; ?></p>
    </div>
   </div>
   <div class="gb-section-row-1 row">
    <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
     <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
      <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
       <p class="gb-title gb-ellipsis">INTERESTS</p>
      </a>
     </div>
     <div class="col-lg-3 col-sm-2 gb-padding-thin">
     </div>
    </ul>
    <div class="gb-body-1">
     <p><?php echo $profile->interests; ?></p>
    </div>
   </div>
   <div class="gb-section-row-1 row">
    <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
     <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
      <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
       <p class="gb-title gb-ellipsis">FAVORITE QUOTE</p>
      </a>
     </div>
     <div class="col-lg-3 col-sm-2 gb-padding-thin">
     </div>
    </ul>
    <div class="gb-body-1">
     <p><?php echo $profile->favorite_quote; ?></p>
    </div>
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
