<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>
<?php ?>
<div class="container">
 <div id="gb-screen-height">
  <div id="gb-left-nav-3" class="gb-nav-parent col-lg-1 col-md-1 col-sm-12 col-xs-12 gb-no-padding">
   <div class="gb-nav-strip row">
    <a id="gb-tab-profile" class="gb-link row"
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-left-nav-3"
       data-gb-url="<?php echo Yii::app()->createUrl("user/profileTab/profileOwner", array()); ?>"
       data-gb-target-pane-id="#gb-main-tab-pane">
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
      "app_tab_id" => "gb-tab-community",
      "active" => "",
      "appName" => "Community",
      "url" => Yii::app()->createUrl("community/communityTab/communityOverview", array()),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/community_icon_0.png"
    ));
    ?>
   </div>
   <div class="gb-nav-strip row">
    <h6 class="gb-heading gb-ellipsis">
     1<span class="gb-superscript">st</span> APPS
    </h6>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "app_tab_id" => "gb-tab-skills",
      "active" => "active",
      "appName" => "Skills",
      "url" => Yii::app()->createUrl("skill/skillTab/skillAppOverview", array()),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_skill.png"
    ));
    ?>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "app_tab_id" => "gb-tab-goals",
      "active" => "",
      "appName" => "Goals",
      "url" => Yii::app()->createUrl("goal/goalTab/goalAppOverview", array()),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_goal.png"
    ));
    ?>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "app_tab_id" => "gb-tab-hobbies",
      "active" => "",
      "appName" => "Hobbies",
      "url" => Yii::app()->createUrl("hobby/hobbyTab/hobbyAppOverview", array()),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_hobby.png"
    ));
    ?>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "app_tab_id" => "gb-tab-promises",
      "active" => "",
      "appName" => "Promises",
      "url" => Yii::app()->createUrl("promise/promiseTab/promiseAppOverview", array()),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_promise.png"
    ));
    ?>
   </div>
   <div class="gb-nav-strip row">
    <h6 class="gb-heading gb-ellipsis">
     2<span class="gb-superscript">nd</span> APPS
    </h6>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "app_tab_id" => "gb-tab-mentorships",
      "active" => "",
      "appName" => "Mentorships",
      "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_mentorship.png"
    ));
    ?>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "app_tab_id" => "gb-tab-advices",
      "active" => "",
      "appName" => "Advice Pages",
      "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_advice.png"
    ));
    ?>
   </div>
   <div class="gb-nav-strip row">
    <h6 class="gb-heading gb-ellipsis">
     3<span class="gb-superscript">rd</span> APPS
    </h6>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "app_tab_id" => "gb-tab-mentorships",
      "active" => "",
      "appName" => "Projects",
      "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_project.png"
    ));
    ?>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "app_tab_id" => "gb-tab-advices",
      "active" => "",
      "appName" => "Groups",
      "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_group.png"
    ));
    ?>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "app_tab_id" => "gb-tab-mentorships",
      "active" => "",
      "appName" => "Journal",
      "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_journal.png"
    ));
    ?>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
  <div id="gb-main-tab-pane">
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
 </div>
</div>
<?php $this->endContent(); ?>

<!-- ------------------------------- MODALS --------------------------->

< <?php
echo $this->renderPartial('application.views.site.modals._contribute_modal'
  , array());
?>