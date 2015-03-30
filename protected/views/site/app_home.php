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
//$this->renderPartial('application.views.site._site_breadcrumb', array(
// "breadcrumbItems" => array(
//   "Home" => Yii::app()->createUrl("site/home"),
//   "Apps" => Yii::app()->createUrl("app/home"),
//   "Overview" => "")
// ));
?>
<div class="container">
 <div id="gb-screen-height">
  <div id="gb-left-nav-3" class="gb-nav-parent col-lg-1 col-md-1 col-sm-12 col-xs-12 gb-no-padding">
   <div id="gb-skills-nav" class="row gb-no-padding panel-group" role="tablist" aria-multiselectable="true">
    <div class="row">
     <a class="gb-link row"
        gb-data-toggle='gb-expandable-tab'
        data-parent="#gb-left-nav-3"
        gb-url="<?php echo Yii::app()->createUrl("user/profileTab/profileOwner", array()); ?>">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
       <div class="thumbnail">
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . Profile::getAvatarUrl(); ?>" class="gb-profile-icon" alt="">
       </div>
       <div class="caption">
        <p class="gb-ellipsis gb-title"><?php echo Profile::getFirstName(); ?></p>
       </div>
      </div>
     </a>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "",
       "appName" => "Community",
       "url" => Yii::app()->createUrl("community/communityTab/communityOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/community_icon_0.png"
     ));
     ?>
     <h6 class="gb-heading gb-ellipsis">
      1<span class="gb-superscript">st</span> APPS
     </h6>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "active",
       "appName" => "Skills",
       "url" => Yii::app()->createUrl("skill/skillTab/skillAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_skill.png"
     ));
     ?>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "",
       "appName" => "Goals",
       "url" => Yii::app()->createUrl("goal/goalTab/goalAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_goal.png"
     ));
     ?>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "",
       "appName" => "Hobbies",
       "url" => Yii::app()->createUrl("hobby/hobbyTab/hobbyAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_hobby.png"
     ));
     ?>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "",
       "appName" => "Promises",
       "url" => Yii::app()->createUrl("promise/promiseTab/promiseAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_promise.png"
     ));
     ?>
    </div>
    <h6 class="gb-heading gb-ellipsis">
     2<span class="gb-superscript">nd</span> APPS
    </h6>
    <div class="row">
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "",
       "appName" => "Mentorships",
       "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_mentorship.png"
     ));
     ?>
    </div>
    <br>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
  <div id="gb-main-tab-pane">
   <?php
   $this->renderPartial('skill.views.skill.skills_tab._skill_app_overview_pane', array(
     "skills" => $skills,
     "skillLevelList" => $skillLevelList,
     "skillsCount" => $skillsCount,
   ));
   ?>
  </div>
 </div>
</div>
<!-- ------------------------------- MODALS --------------------------->


<!-- ------------------------------- HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide"></div>
<?php $this->endContent(); ?>