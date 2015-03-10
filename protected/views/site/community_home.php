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
   <div id="gb-skills-nav" class="row gb-no-padding panel-group" role="tablist" aria-multiselectable="true">
    <div class="row">
     <div class="gb-sidenav-app-heading"
          gb-data-toggle='gb-expandable-tab'
          gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillAppOverview", array()); ?>">
      <h3 class="gb-heading gb-ellipsis">SKILLED COMMUNITY</h3>
     </div>
    </div>
    <br>
   </div>
   <div class="gb-dummy-height"></div>
  </div>
  <div id="gb-main-tab-pane">
   <div id="gb-right-nav-2" class="gb-nav-parent col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-padding-none">
    <div class="row">
     <div id="gb-mentorships" class="gb-list row">
      <?php
      foreach ($people as $person) :
       echo $this->renderPartial('application.views.people._person_badge', array(
         'person' => $person));
      endforeach;
      ?>
     </div>
    </div>
    <div class="gb-dummy-height">
    </div>
   </div>
  </div>
 </div>
</div>
<!-- ------------------------------- MODALS --------------------------->

<?php $this->endContent(); ?>