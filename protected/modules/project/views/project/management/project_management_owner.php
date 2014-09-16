<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_mentorship_detail.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
?>
<script type="text/javascript">
</script>
<div class="container-fluid gb-heading-bar-7">
  <br>
  <?php
  echo $this->renderPartial('project.views.project.management._management_header', array(
   "project" => $project));
  ?>
 
</div>
<div class="container">
  <div class="tab-content">
    <div class="tab-pane active" id="project-management-welcome-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>
       
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding">
        <br>
         <h3 class="gb-heading-2">Welcome Page</h3>
        
      </div>
    </div>
    <div class="tab-pane" id="project-management-timeline-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>
       
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding">
        <br>
         <h3 class="gb-heading-2">Timeline</h3>
      </div>
    </div>
    <div class="tab-pane" id="project-management-activities-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>
        <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <li class="active"><a href="#gb-project-management-announcement-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Announcements</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-project-management-activities-todos-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">To Dos</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-project-management-activities-discussion-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Discussion</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-project-management-activities-ask-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Ask & Answer</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-project-management-activities-weblinks-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">External Links</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class="gb-disabled-1"><a href="#gb-skill-activity-files-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Files</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        </ul>
       
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding">
        <br>
         <h3 class="gb-heading-2">Activities</h3>
      </div>
    </div>
    <div class="tab-pane" id="project-management-members-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>
       
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding gb-background-light-grey-1 ">
        <br>
         <h3 class="gb-heading-2">Members</h3>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->


<!--- ----------------------------HIDDEN THINGS ------------------------->
<div id="gb-forms-home" class="gb-hide">

</div>
<?php $this->endContent(); ?>