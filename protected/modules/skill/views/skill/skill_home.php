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
     <?php echo "Skill App"; ?>
    </p>
   </div>
  </div>
 </div>
</div>

<div class="container gb-background-light-grey-1">
 <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-no-padding">
  <div class="tab-content">
   <!------------------SKILL MANAGEMENT PANE --------------------->
   <div class="tab-pane active" id="skill-management-welcome-pane">
    <div class="row gb-tab-pane-body">
     <?php
     $this->renderPartial('skill.views.skill.welcome_tab._skill_welcome_pane', array(
       "skills" => $skills,
       "skillsCount" => $skillsCount,
       "skillModel" => $skillModel,
       "skillLevelList" => $skillLevelList,
       ""
       //"skillOverviewQuestionnaires" => $skillOverviewQuestionnaires
     ));
     ?>
    </div>
   </div>

   <!---------------SKILL MANAGEMENT APPS -------------->
   <div class="tab-pane" id="skill-management-apps-pane">
    <div class="row gb-tab-pane-body"></div>
   </div>

   <!---------------SKILL MANAGEMENT TIMELINE -------------->
   <div class="tab-pane" id="skill-management-timeline-pane">
    <div class="row gb-tab-pane-body"></div>
   </div>

  </div>
 </div>
 <div class="col-lg-3 col-md-3 gb-no-padding hidden-sm hidden-xs">
  <div class="row gb-box-1">
   <h5 class="gb-heading-2">Other People</h5>
   <br>
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