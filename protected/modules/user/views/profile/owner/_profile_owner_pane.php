<div class="nav-container col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-padding-none">
 <div id="gb-middle-nav-3" class="gb-nav-parent">
  <div class="row">
   <div id="" class="gb-top-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-nav">
    <div class="gb-action col-lg-2 col-sm-2">
     <button class="gb-dropdown-toggle btn btn-default"
             gb-target="#gb-skill-category-dropdown">
      <i class="fa fa-bars"></i>
     </button>
    </div>
    <div class="gb-title col-lg-7 col-sm-2 col-xs-12">
     <p class="gb-ellipsis">
      PROFILE
     </p>
    </div>
    <div class="gb-action col-lg-3 col-sm-2">
     <div class="row">
      <a class="pull-right btn btn btn-default gb-request-notification-viewer gb-populate"
         data-gb-target="#gb-notification-viewer-body">
       <i class="fa fa-cog"></i>
      </a>
     </div>
    </div>
   </div>
  </div>
  <div class="gb-scrollable-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="thumbnail">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $profile->avatar_url; ?>" alt="">
    <div class="caption">
     <h5 class="text-center gb-ellipsis"><?php echo $profile->firstname . ' ' . $profile->lastname; ?></h5>
    </div>
   </div>
   <div id="gb-skills-nav" class="row gb-padding-none panel-group" role="tablist" aria-multiselectable="true">
    <br>
    <div class="row">
     <h6 class="gb-heading-8 gb-ellipsis">
      ABOUT
     </h6>
     <?php
     $this->renderPartial('user.views.profile._profile_item_tab', array(
       "active" => "",
       "title" => "About Me",
       "description" => "Summary, Experience, Interests",
       "url" => Yii::app()->createUrl("user/profileTab/profileOwnerOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/profile/gb_about_me.png"
     ));
     ?>
     <?php
     $this->renderPartial('user.views.profile._profile_item_tab', array(
       "active" => "",
       "title" => "Discover Me",
       "description" => "Questionnaire, Matching",
       "url" => Yii::app()->createUrl("user/profileTab/profileOwnerDiscoverMe", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/profile/gb_discover_me.png"
     ));
     ?>
     <?php
     $this->renderPartial('user.views.profile._profile_item_tab', array(
       "active" => "",
       "title" => "My Skills",
       "description" => "Questionnaire, Matching",
       "url" => Yii::app()->createUrl("user/profileTab/profileOwnerMySkills", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/profile/gb_discover_me.png"
     ));
     ?>
     <?php
     $this->renderPartial('user.views.profile._profile_item_tab', array(
       "active" => "",
       "title" => "My Mentorships",
       "description" => "Questionnaire, Matching",
       "url" => Yii::app()->createUrl("user/profileTab/profileOwnerMySkills", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/profile/gb_discover_me.png"
     ));
     ?>
    </div>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
 </div>
</div>
<div class="nav-container col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-padding-none">
 <div id="gb-right-nav-3" class="">
  <div class="tab-content">
   <div id="gb-profile-tab-pane" class="tab-pane active gb-scrollable-container">
    <?php
    echo $this->renderPartial('user.views.profile.owner.about_tab._owner_overview_pane', array(
      "profile" => $profile,
    ))
    ?>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
 </div>
</div>
<!-- ------------------------------- MODALS --------------------------->
