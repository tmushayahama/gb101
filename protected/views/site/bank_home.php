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
  <div id="gb-left-nav-3" class="gb-nav-parent col-lg-2 col-md-5 col-sm-12 col-xs-12 gb-no-padding">
   <div id="gb-skills-nav" class="row gb-no-padding panel-group" role="tablist" aria-multiselectable="true">
    <div class="row">
     <div class="gb-sidenav-app-heading"
          gb-data-toggle='gb-expandable-tab'
          gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillAppOverview", array()); ?>">
      <h3 class="gb-heading gb-ellipsis">BANK</h3>
     </div>
    </div>
    <br>
    <div class="row">
     <h6 class="gb-heading-8 gb-ellipsis">
      PRIMARY BANKS
     </h6>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "", "appName" => "Skill Bank",
       "url" => Yii::app()->createUrl("skill/skillTab/skillAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/skill_icon_9.png"
     ));
     ?>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "", "appName" => "Goal Bank",
       "url" => Yii::app()->createUrl("goal/goalTab/goalAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/goal_icon_9.png"
     ));
     ?>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "", "appName" => "Hobby Bank",
       "url" => Yii::app()->createUrl("hobby/hobbyTab/hobbyAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/hobby_icon_9.png"
     ));
     ?>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "", "appName" => "Promise Bank",
       "url" => Yii::app()->createUrl("promise/promiseTab/promiseAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/promise_icon_9.png"
     ));
     ?>
    </div>
    <br>
    <br>
    <div class="row">
     <h6 class="gb-heading-8 gb-ellipsis">
      SECONDARY BANK
     </h6>
     <?php
     $this->renderPartial('application.views.site.app._app_item_tab', array(
       "active" => "", "appName" => "Mentorship Bank",
       "url" => Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipAppOverview", array()),
       "iconUrl" => Yii::app()->request->baseUrl . "/img/mentorship_icon_9.png"
     ));
     ?>
    </div>
    <br>
    <h6 class="gb-heading-2 gb-ellipsis">
     TERTIARY BANK
    </h6>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
  <div id="gb-main-tab-pane">

  </div>
 </div>
</div>
<!-- ------------------------------- MODALS --------------------------->


<!-- ------------------------------- HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide"></div>
<?php $this->endContent(); ?>