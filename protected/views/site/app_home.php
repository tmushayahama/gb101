<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>
<?php ?>
<!-- Sidebar -->
<div class="nav-container col-lg-2 col-md-3 col-sm-4 col-xs-12 ">
 <div class="gb-nav-parent" id="gb-left-nav-3" role="navigation">
  <div class="gb-nav-strip gb-nav-strip-mini row">
   <div class="">
    <a class="gb-link row"
       data-gb-link-type="redirects"
       data-gb-url="<?php echo Yii::app()->createUrl("user/profile/profile", array("userId" => Yii::app()->user->id)); ?>">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <p class="gb-ellipsis gb-title">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . Profile::getAvatarUrl(); ?>" class="gb-icon" alt="">
       <?php echo Profile::getFullName(); ?>
      </p>
      <div class="gb-description">
       My Profile
      </div>
     </div>
    </a>
   </div>
   <?php
   $this->renderPartial('application.views.site.app._app_item_tab', array(
     "appTabId" => "gb-tab-community",
     "appClassName" => "",
     "active" => "",
     "appName" => "Community",
     "appDescription" => "My Connections",
     "url" => Yii::app()->createUrl("community/communityTab/communityOverview", array()),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/community_icon_0.png"
   ));
   ?>
  </div>
  <div class="gb-nav-strip row">
   <h6 class="gb-heading gb-ellipsis">
    PRIMARY APPS
   </h6>
   <?php
   $this->renderPartial('application.views.site.app._app_item_tab', array(
     "appTabId" => "gb-tab-skills",
     "appClassName" => "gb-faded-color-0",
     "active" => "active",
     "appName" => "Skills",
     "appDescription" => "Do something with skills you have gained. Improve"
     . " your current skills or just learn a new skill",
     "url" => Yii::app()->createUrl("skill/skillTab/skillAppOverview", array()),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_skill.png"
   ));
   ?>
   <?php
   $this->renderPartial('application.views.site.app._app_item_tab', array(
     "appTabId" => "gb-tab-goals",
     "appClassName" => "gb-faded-color-0",
     "active" => "",
     "appName" => "Goals",
     "appDescription" => "Set your goals, Encourage someone to achieve their goals or get encouraged to keep track of your goals",
     "url" => Yii::app()->createUrl("goal/goalTab/goalAppOverview", array()),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_goal.png"
   ));
   ?>
   <?php
   $this->renderPartial('application.views.site.app._app_item_tab', array(
     "appTabId" => "gb-tab-hobbies",
     "appClassName" => "gb-faded-color-0",
     "active" => "",
     "appName" => "Hobbies",
     "appDescription" => "Make your skills into your hobbies. Connect with others and see how others are doing with their hobbies",
     "url" => Yii::app()->createUrl("hobby/hobbyTab/hobbyAppOverview", array()),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_hobby.png"
   ));
   ?>
   <?php
   $this->renderPartial('application.views.site.app._app_item_tab', array(
     "appTabId" => "gb-tab-promises",
     "appClassName" => "gb-faded-color-0",
     "active" => "",
     "appName" => "Promises",
     "appDescription" => "Keep a promise, a promise to achieve s goal, a promise to quit a bad habit etc",
     "url" => Yii::app()->createUrl("promise/promiseTab/promiseAppOverview", array()),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_promise.png"
   ));
   ?>
  </div>
  <div class="gb-nav-strip row">
   <h6 class="gb-heading gb-ellipsis">
    SECONDARY APPS
   </h6>
   <?php
   $this->renderPartial('application.views.site.app._app_item_tab', array(
     "appTabId" => "gb-tab-mentorships",
     "appClassName" => "gb-faded-color-0",
     "active" => "",
     "appName" => "Mentorships",
     "appDescription" => "Mentor someone or find a mentor. Whether it's peer/friendly, formal or supervisory",
     "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_mentorship.png"
   ));
   ?>
   <?php
   $this->renderPartial('application.views.site.app._app_item_tab', array(
     "appTabId" => "gb-tab-advices",
     "appClassName" => "gb-faded-color-0",
     "active" => "",
     "appName" => "Advice Pages",
     "appDescription" => "Are you good at giving an advice? Are you seeking advice?",
     "url" => Yii::app()->createUrl("advice/adviceTab/adviceAppOverview", array()),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_advice.png"
   ));
   ?>
  </div>
  <div class="gb-nav-strip row">
   <h6 class="gb-hide hidden-xs gb-heading gb-ellipsis">
    3<span class="gb-superscript">rd</span> APPS
   </h6>
   <h6 class="hidden-xs gb-heading gb-ellipsis">
    TERTIARY APPS
   </h6>
   <?php
   $this->renderPartial('application.views.site.app._app_item_tab', array(
     "appTabId" => "gb-tab-mentorships",
     "appClassName" => "gb-faded-color-0",
     "active" => "",
     "appName" => "Projects",
     "appDescription" => "",
     "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_project.png"
   ));
   ?>
   <?php
   $this->renderPartial('application.views.site.app._app_item_tab', array(
     "appTabId" => "gb-tab-advices",
     "appClassName" => "gb-faded-color-0",
     "active" => "",
     "appName" => "Groups",
     "appDescription" => "",
     "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_group.png"
   ));
   ?>
   <?php
   $this->renderPartial('application.views.site.app._app_item_tab', array(
     "appTabId" => "gb-tab-mentorships",
     "appClassName" => "gb-faded-color-0",
     "active" => "",
     "appName" => "Journal",
     "appDescription" => "",
     "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_journal.png"
   ));
   ?>
  </div>
  <div class="gb-dummy-height"></div>
 </div>
</div>
<div class="nav-container col-lg-10 col-md-9 col-sm-8">
 <div id="gb-screen-height" class="container">
  <div id="gb-main-tab-pane" class="col-lg-8 col-md-9 col-sm-8 ">
   <script type="text/javascript">
    $('#gb-theme').attr('href', '<?php echo $css_theme_url ?>');
    $(".gb-app-tab").removeClass("active");
    $("<?php echo '#' . $app_selected_tab_id; ?>").addClass("active");
    $('#gb-browse-trigger').data('gb-url', '<?php echo $browse_url; ?>');
   </script>
   <?php
   echo $app_tab;
   ?>
  </div>
  <div class="nav-container hidden-lg hidden-md hidden-sm hidden-xs ">
   <div id="gb-right-nav-3" role="navigation">
   </div>
  </div>
 </div>
</div>
<?php $this->endContent(); ?>
<!-- ------------------------------- MODALS --------------------------->
