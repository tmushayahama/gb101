<?php $this->beginContent('//layouts/gb_main1'); ?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_themes/ss_greenish.css" type="text/css" rel="stylesheet"/>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_hobby_home.js', CClientScript::POS_END
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
     <?php echo "Hobby App"; ?>
    </p>
   </div>
  </div>
 </div>
</div>
<div class="container gb-background-light-grey-1">
 <div id="gb-screen-height">
  <div id="gb-left-nav-3" class="gb-nav-parent col-lg-2 col-md-5 col-sm-12 col-xs-12 gb-no-padding">
   <div id="gb-hobbies-nav" class="row gb-no-padding panel-group" role="tablist" aria-multiselectable="true">
    <div class="row">
     <a class="gb-sidenav-app-heading active collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
        gb-data-toggle='gb-expandable-tab'
        gb-url="<?php echo Yii::app()->createUrl("hobby/hobbyTab/hobbyAppOverview", array()); ?>">
      <div class="col-lg-12 gb-no-padding text-left">
       <p class="gb-heading gb-heading-7b gb-ellipsis">HOBBIES APP</p>
       <p class="gb-description">
        Explore your hobbies and discover other hobbies.
       </p>
      </div>
     </a>
    </div>
    <br>
    <h5 class="gb-heading-2 gb-ellipsis">
     HOBBY CATEGORIES
    </h5>
    <?php
    $count = 1;
    foreach ($hobbyLevels as $level):
     $this->renderPartial('hobby.views.hobby.activity.hobby._hobby_item_level_row', array(
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
    <div class="tab-pane active" id="gb-hobbies-pane">
     <div class="row gb-tab-pane-body">
      <?php
      $this->renderPartial('hobby.views.hobby.hobbies_tab._hobby_app_overview_pane', array(
        "hobbies" => Hobby::getHobbies(null, Hobby::$HOBBIES_PER_PAGE),
        "hobbyLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_HOBBY), "id", "name"),
        "hobbiesCount" => Hobby::getHobbiesCount()));
      ?>
     </div>
    </div>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
  <div id="gb-right-nav-3" class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
   <div class="tab-content">
    <!---------- HOBBY MANAGEMENT WELCOME OVERVIEW PANE ------------>
    <div class="tab-pane active" id="gb-hobby-item-pane">
     <div class="row gb-tab-pane-body">
      <br>
      <h4 class="text-center text-warning gb-no-information row">
       select a hobby to show
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