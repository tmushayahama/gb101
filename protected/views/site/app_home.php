<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>
<?php ?>
<!-- Sidebar -->
<div class="container">

 <!-- /#sidebar-wrapper -->

 <!-- Page Content -->
 <div id="gb-screen-height">
  <div class="nav-container col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-padding-none">
   <div class="gb-nav-parent" id="gb-left-nav-3" role="navigation">
    <ul class=" gb-padding-none">
     <div class="gb-nav-strip row">
      <h6 class="gb-heading gb-ellipsis">
       PRIMARY APPS
      </h6>
      <?php
      $this->renderPartial('application.views.site.app._app_item_tab', array(
        "appTabId" => "gb-tab-skills",
        "appClassName" => "gb-color-1",
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
        "appClassName" => "gb-color-2",
        "active" => "",
        "appName" => "Goals",
        "appDescription" => "",
        "url" => Yii::app()->createUrl("goal/goalTab/goalAppOverview", array()),
        "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_goal.png"
      ));
      ?>
      <?php
      $this->renderPartial('application.views.site.app._app_item_tab', array(
        "appTabId" => "gb-tab-hobbies",
        "appClassName" => "gb-color-3",
        "active" => "",
        "appName" => "Hobbies",
        "appDescription" => "",
        "url" => Yii::app()->createUrl("hobby/hobbyTab/hobbyAppOverview", array()),
        "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_hobby.png"
      ));
      ?>
      <?php
      $this->renderPartial('application.views.site.app._app_item_tab', array(
        "appTabId" => "gb-tab-promises",
        "appClassName" => "gb-color-4",
        "active" => "",
        "appName" => "Promises",
        "appDescription" => "",
        "url" => Yii::app()->createUrl("promise/promiseTab/promiseAppOverview", array()),
        "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_promise.png"
      ));
      ?>
     </div>
     <div class="gb-nav-strip row">
      <h6 class="hidden-xs gb-heading gb-ellipsis">
       SECONDARY APPS
      </h6>
      <?php
      $this->renderPartial('application.views.site.app._app_item_tab', array(
        "appTabId" => "gb-tab-mentorships",
        "appClassName" => "gb-color-5",
        "active" => "",
        "appName" => "Mentorships",
        "appDescription" => "",
        "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
        "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_mentorship.png"
      ));
      ?>
      <?php
      $this->renderPartial('application.views.site.app._app_item_tab', array(
        "appTabId" => "gb-tab-advices",
        "appClassName" => "gb-color-2",
        "active" => "",
        "appName" => "Advice Pages",
        "appDescription" => "",
        "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
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
        "appClassName" => "gb-color-2",
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
        "appClassName" => "gb-color-2",
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
        "appClassName" => "gb-color-2",
        "active" => "",
        "appName" => "Journal",
        "appDescription" => "",
        "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
        "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_journal.png"
      ));
      ?>
     </div>
     <div class="gb-dummy-height"></div>
    </ul>
   </div>
  </div>
  <div id="gb-main-tab-pane" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
   <div class="gb-nav-strip row">
    <a id="gb-tab-profile" class="gb-link row"
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-left-nav-3"
       data-gb-url="<?php echo Yii::app()->createUrl("user/profileTab/profileOwner", array()); ?>"
       data-gb-target-pane-id="#gb-main-tab-pane">
     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-padding-none">
      <div class="thumbnail gb-padding-none">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . Profile::getAvatarUrl(); ?>" class="gb-profile-icon" alt="">
      </div>
      <div class="caption col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-padding-none">
       <p class="gb-ellipsis gb-title text-center"><?php echo Profile::getFullName(); ?></p>
      </div>
     </div>
    </a>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "appTabId" => "gb-tab-community",
      "appClassName" => "gb-color-2",
      "active" => "",
      "appName" => "Community",
      "appDescription" => "",
      "url" => Yii::app()->createUrl("community/communityTab/communityOverview", array()),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/community_icon_0.png"
    ));
    ?>
   </div>
  </div>
 </div>
 <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<?php $this->endContent(); ?>
<!-- ------------------------------- MODALS --------------------------->
