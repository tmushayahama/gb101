<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_skill_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<?php
$this->renderPartial('application.views.site._site_breadcrumb', array(
  "breadcrumbItems" => array(
    "Home" => Yii::app()->createUrl("site/home"),
    "Apps" => Yii::app()->createUrl("app/home"),
    "Overview" => "")
));
?>
<div class="container">
 <div id="gb-screen-height">
  <div id="gb-left-nav-3" class="gb-nav-parent col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
   <div class="thumbnail">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $profile->avatar_url; ?>" alt="">
    <div class="caption">
     <h6 class="text-center gb-ellipsis"><?php echo $profile->firstname; ?></h6>
    </div>
   </div>
   <div id="gb-skills-nav" class="row gb-no-padding panel-group" role="tablist" aria-multiselectable="true">
    <br>
    <div class="row">
     <h6 class="gb-heading-8 gb-ellipsis">
      ABOUT
     </h6>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "active",
       "appName" => "About Me",
       "url" => Yii::app()->createUrl("user/profileTab/profileFriendOverview", array("userId" => $profile->user_id)),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/profile/gb_about_me.png"
     ));
     ?>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "",
       "appName" => "Discover Me",
       "url" => Yii::app()->createUrl("user/profileTab/profileFriendDiscoverMe", array("userId" => $profile->user_id)),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/profile/gb_discover_me.png"
     ));
     ?>
    </div>
    <br>
    <br>
    <div class="row">
     <h6 class="gb-heading-8 gb-ellipsis">
      APPS
     </h6>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "", "appName" => "My Skills",
       "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/mentorship_icon_9.png"
     ));
     ?>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "", "appName" => "My Goals",
       "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/mentorship_icon_9.png"
     ));
     ?>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "", "appName" => "My Hobbies",
       "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/mentorship_icon_9.png"
     ));
     ?>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "", "appName" => "My Promises",
       "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/mentorship_icon_9.png"
     ));
     ?>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "", "appName" => "My Mentorships",
       "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/mentorship_icon_9.png"
     ));
     ?>
    </div>
    <br>
    <br>
    <div class="row">
     <h6 class="gb-heading-8 gb-ellipsis">
      BANK
     </h6>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "", "appName" => "My Bank Participation",
       "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/mentorship_icon_9.png"
     ));
     ?>
    </div>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
  <div id="gb-main-tab-pane">
   <?php
   echo $this->renderPartial('user.views.profile.friend.about_tab._friend_overview_pane', array(
     "profile" => $profile,
   ))
   ?>
  </div>
 </div>
</div>
<!-- ------------------------------- MODALS --------------------------->


<!-- ------------------------------- HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide"></div>
<?php $this->endContent(); ?>