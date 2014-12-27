<?php $this->beginContent('//layouts/gb_main1'); ?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_themes/ss_greenish.css" type="text/css" rel="stylesheet"/>
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
<div class="container-fluid">
 <div class="container">
  <div class="gb-breadcrumb-container-4 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-medium">
   <div class="gb-breadcrumb row">
    <a href="<?php echo Yii::app()->createUrl("site/home"); ?>" class="gb-ellipsis-3">
     <?php echo "Home"; ?>
    </a>
    <div class="gb-breadcrumb-caret"><i class="glyphicon glyphicon-play"></i></div>
    <a href="<?php ?>" class="gb-ellipsis-3">
     <?php echo "Apps"; ?>
    </a>
    <div class="gb-breadcrumb-caret"><i class="glyphicon glyphicon-play"></i></div>
    <p class="gb-ellipsis-3">
     <?php echo "Apps Home"; ?>
    </p>
   </div>
  </div>
 </div>
</div>
<div class="container gb-background-light-grey-1">
 <div id="gb-screen-height">
  <div id="gb-left-nav-3" class="gb-nav-parent col-lg-2 col-md-5 col-sm-12 col-xs-12 gb-no-padding">
   <div id="gb-skills-nav" class="row gb-no-padding panel-group" role="tablist" aria-multiselectable="true">
    <div class="row">
     <a class="gb-sidenav-app-heading active collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
        gb-data-toggle='gb-expandable-tab'
        gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillAppOverview", array()); ?>">
      <div class="col-lg-12 gb-padding-thin">
       <h3 class="gb-heading gb-ellipsis">APPS</h3>
      </div>
     </a>
    </div>
    <br>
    <h5 class="gb-heading-2 gb-ellipsis">
     SKILL CATEGORIES
    </h5>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "appName" => "Skills",
      "url" => Yii::app()->createUrl("skill/skillTab/skillAppOverview", array())
    ));
    ?>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "appName" => "Goals",
      "url" => Yii::app()->createUrl("goal/goalTab/goalAppOverview", array())
    ));
    ?>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "appName" => "Hobbies",
      "url" => Yii::app()->createUrl("hobby/hobbyTab/hobbyAppOverview", array())
    ));
    ?>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "appName" => "Promises",
      "url" => Yii::app()->createUrl("promise/promiseTab/promiseAppOverview", array())
    ));
    ?>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
  <div id="gb-main-tab-pane">

  </div>
 </div>
</div>
<!-- ------------------------------- MODALS --------------------------->
<?php
echo $this->renderPartial('application.views.site.modals._send_request_modal', array(
  "modalType" => Type::$REQUEST_SHARE));
?>

<!-- ------------------------------- HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide"></div>
<?php $this->endContent(); ?>