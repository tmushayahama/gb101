<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>
<?php ?>
<!-- Sidebar -->
<div class="nav-container col-lg-2 col-md-3 col-sm-4 col-xs-12 ">
 <div class="gb-nav-parent" id="gb-left-nav-3" role="navigation">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
   <div class="thumbnail">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $profile->avatar_url; ?>" alt="">
    <div class="caption">
     <h5 class="text-center gb-ellipsis"><?php echo $profile->firstname . ' ' . $profile->lastname; ?></h5>
    </div>
   </div>
   <div id="gb-skills-nav" class="row  panel-group" role="tablist" aria-multiselectable="true">
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
    </div>
    <br>
    <div class="row">
     <h6 class="gb-heading-8 gb-ellipsis">
      APPS
     </h6>
     <?php
     $this->renderPartial('user.views.profile._profile_item_tab', array(
       "active" => "",
       "title" => "My Skills",
       "description" => "Questionnaire, Matching",
       "url" => Yii::app()->createUrl("user/profileTab/profileOwnerMySkills", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/profile/gb_skill.png"
     ));
     ?>
     <?php
     $this->renderPartial('user.views.profile._profile_item_tab', array(
       "active" => "",
       "title" => "My Mentorships",
       "description" => "Questionnaire, Matching",
       "url" => Yii::app()->createUrl("user/profileTab/profileOwnerMyMentorships", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/profile/gb_mentorship.png"
     ));
     ?>
    </div>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
 </div>
</div>
<div class="nav-container col-lg-10 col-md-9 col-sm-8 ">
 <div id="gb-screen-height" class="container">
  <div id="gb-profile-tab-pane" class="col-lg-10 col-md-9 col-sm-8 ">
   <?php
   echo $this->renderPartial('user.views.profile.owner.about_tab._owner_overview_pane', array(
     "profile" => $profile,
   ))
   ?>
  </div>
  <div class="gb-dummy-height"></div>
 </div>
</div>
<?php $this->endContent(); ?><