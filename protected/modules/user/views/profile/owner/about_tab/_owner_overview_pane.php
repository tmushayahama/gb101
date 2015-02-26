<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-right-nav-2" class="gb-nav-parent col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-padding-none">
 <div class="gb-post-entry gb-profile-header-1 row">
  <div class="gb-profile-header-img-container-1 col-lg-2 col-md-2 col-sm-2 col-xs-2">
   <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/profile/gb_about_me.png" class="gb-profile-header-img-1" alt="">
  </div>
  <div class="gb-panel-display col-lg-7 col-md-7 col-sm-10 col-xs-10">
   <div class="gb-heading-9"><?php echo $profile->firstname . " " . $profile->lastname; ?></div>
   <?php echo $profile->welcome_message; ?>
  </div>
  <div id="gb-profile-welcome-form-container" class="row gb-hide gb-panel-form col-lg-7 col-md-7 col-sm-10 col-xs-10">
   <div class="row ">
    <?php
    $this->renderPartial('user.views.profile.forms._profile_welcome_form', array(
      "formId" => "gb-profile-welcome-form",
      "actionUrl" => Yii::app()->createUrl("user/profile/addUserQuestionAnswer", array()),
      "prependTo" => "",
      "profileModel" => $profile,
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
    ));
    ?>
   </div>
  </div>
  <div class = "col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-padding-medium">
   <div class = "row">
    <div class="gb-edit-form-show gb-backdrop-disappear col-lg-12 col-md-12 col-sm-12 col-xs-12"
         data-gb-target-container="#gb-profile-welcome-form-container"
         data-gb-target="#gb-profile-welcome-form">
     <i class = "glyphicon glyphicon-edit"></i> Edit
    </div>
    <br>
    <br>
    <div class = "btn btn-primary col-lg-12 col-md-12 col-sm-4 col-xs-6">
     <i class = "glyphicon glyphicon-cog"></i> Settings
    </div>
   </div>
  </div>
 </div>
 <div class = "row">
  <div class = "col-lg-7">
   <div class = "gb-post-entry row gb-section-row-1">
    <ul id = "" class = "gb-top-nav-1 col-lg-12 gb-nav">
     <div class = "gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
      <a href = "#gb-mentorship-item-tab-pane" data-toggle = "tab"
         gb-url = "<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship ", array('tabName' => "PP")); ?>">
       <p class = "gb-title gb-ellipsis">SELF-SUMMARY</p>
      </a>
     </div>
     <div class="col-lg-3 col-sm-2 gb-padding-thin">
      <a class="gb-edit-form-show btn btn-default pull-right">
       <i class="glyphicon glyphicon-edit"></i> Edit
      </a>
     </div>
    </ul>
    <div class="gb-body-1">
     <p class="gb-panel-display"><?php echo $profile->summary; ?></p>
     <div id="gb-profile-summary-form-container" class="row gb-hide gb-panel-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row ">
       <?php
       $this->renderPartial('user.views.profile.forms._profile_summary_form', array(
         "formId" => "gb-profile-summary-form",
         "actionUrl" => Yii::app()->createUrl("user/profile/addUserQuestionAnswer", array()),
         "prependTo" => "",
         "profileModel" => $profile,
         "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
       ));
       ?>
      </div>
     </div>
    </div>
   </div>
   <div class="gb-post-entry gb-section-row-1 row">
    <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
     <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
      <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
       <p class="gb-title gb-ellipsis">EXPERIENCE</p>
      </a>
     </div>
     <div class="col-lg-3 col-sm-2 gb-padding-thin">
      <a class="gb-edit-form-show btn btn-default pull-right">
       <i class="glyphicon glyphicon-edit"></i> Edit
      </a>
     </div>
    </ul>
    <div class="gb-body-1">
     <p class="gb-panel-display"><?php echo $profile->experience; ?></p>
     <div id="gb-profile-experience-form-container" class="row gb-hide gb-panel-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row ">
       <?php
       $this->renderPartial('user.views.profile.forms._profile_experience_form', array(
         "formId" => "gb-profile-experience-form",
         "actionUrl" => Yii::app()->createUrl("user/profile/addUserQuestionAnswer", array()),
         "prependTo" => "",
         "profileModel" => $profile,
         "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
       ));
       ?>
      </div>
     </div>
    </div>
   </div>
   <div class="gb-post-entry gb-section-row-1 row">
    <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
     <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
      <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
       <p class="gb-title gb-ellipsis">INTERESTS</p>
      </a>
     </div>
     <div class="col-lg-3 col-sm-2 gb-padding-thin">
      <a class="gb-edit-form-show btn btn-default pull-right">
       <i class="glyphicon glyphicon-edit"></i> Edit
      </a>
     </div>
    </ul>
    <div class="gb-body-1">
     <p class="gb-panel-display"><?php echo $profile->interests; ?></p>
     <div id="gb-profile-interests-form-container" class="row gb-hide gb-panel-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row ">
       <?php
       $this->renderPartial('user.views.profile.forms._profile_interests_form', array(
         "formId" => "gb-profile-interests-form",
         "actionUrl" => Yii::app()->createUrl("user/profile/addUserQuestionAnswer", array()),
         "prependTo" => "",
         "profileModel" => $profile,
         "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
       ));
       ?>
      </div>
     </div>
    </div>
   </div>
   <div class="gb-post-entry gb-section-row-1 row">
    <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
     <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
      <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
       <p class="gb-title gb-ellipsis">FAVORITE QUOTE</p>
      </a>
     </div>
     <div class="col-lg-3 col-sm-2 gb-padding-thin">
      <a class="gb-edit-form-show btn btn-default pull-right">
       <i class="glyphicon glyphicon-edit"></i> Edit
      </a>
     </div>
    </ul>
    <div class="gb-body-1">
     <p class="gb-panel-display"><?php echo $profile->favorite_quote; ?></p>
     <div id="gb-profile-favorite-quote-form-container" class="row gb-hide gb-panel-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row ">
       <?php
       $this->renderPartial('user.views.profile.forms._profile_favorite_quote_form', array(
         "formId" => "gb-profile-favorite-quote-form",
         "actionUrl" => Yii::app()->createUrl("user/profile/addUserQuestionAnswer", array()),
         "prependTo" => "",
         "profileModel" => $profile,
         "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
       ));
       ?>
      </div>
     </div>
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
     <a class="gb-edit-form-show btn btn-default pull-right">
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
