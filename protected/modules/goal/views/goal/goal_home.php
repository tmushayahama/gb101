<?php $this->beginContent('//layouts/gb_main1'); ?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_themes/ss_greenish.css" type="text/css" rel="stylesheet"/>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
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
     <?php echo "Goal App"; ?>
    </p>
   </div>
  </div>
 </div>
</div>
<div class="container gb-background-light-grey-1">
 <div id="gb-screen-height">
  <div id="gb-left-nav-3" class="gb-nav-parent col-lg-2 col-md-5 col-sm-12 col-xs-12 gb-padding-none">
   <div id="gb-goals-nav" class="row gb-padding-none panel-group" role="tablist" aria-multiselectable="true">
    <div class="row">
     <a class="gb-sidenav-app-heading active collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
        gb-data-toggle='gb-expandable-tab'
        gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalAppOverview", array()); ?>">
      <div class="col-lg-12 gb-padding-none text-left">
       <p class="gb-heading gb-heading-7b gb-ellipsis">GOALS APP</p>
       <p class="gb-description">
        Explore your goals and discover other goals.
       </p>
      </div>
     </a>
    </div>
    <br>
    <h5 class="gb-heading-2 gb-ellipsis">
     GOAL CATEGORIES
    </h5>
    <?php
    $count = 1;
    foreach ($goalLevels as $level):
     $this->renderPartial('goal.views.goal.activity.goal._goal_item_level_row', array(
       "level" => $level,
       "count" => $count
     ));
     ?>
    <?php endforeach; ?>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
  <div id="gb-middle-nav-3" class="gb-nav-parent col-lg-4 col-md-5 col-sm-12 col-xs-12">
   <div class="tab-content">
    <div class="tab-pane active" id="gb-goals-pane">
     <div class="row gb-tab-pane-body">
      <?php
      $this->renderPartial('goal.views.goal.goals_tab._goal_app_overview_pane', array(
        "goals" => Goal::getGoals(null, Goal::$GOALS_PER_PAGE),
        "goalLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_GOAL), "id", "name"),
        "goalsCount" => Goal::getGoalsCount()));
      ?>
     </div>
    </div>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
  <div id="gb-right-nav-3" class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
   <div class="tab-content">
    <!---------- GOAL MANAGEMENT WELCOME OVERVIEW PANE ------------>
    <div class="tab-pane active" id="gb-goal-item-pane">
     <div class="row gb-tab-pane-body">
      <br>
      <h4 class="text-center text-warning gb-no-information row">
       select a goal to show
      </h4>
     </div>
    </div>
   </div>
   <div class="gb-dummy-height"></div>
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