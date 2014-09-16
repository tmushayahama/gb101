<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_skill_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_mentorship_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var addSkillListUrl = "<?php echo Yii::app()->createUrl("skill/skill/addskilllist", array('connectionId' => 0, 'source' => "skill", 'type' => GoalList::$TYPE_SKILL)); ?>";
  var editSkillListUrl = "<?php echo Yii::app()->createUrl("skill/skill/editskilllist", array('connectionId' => 0, 'source' => "home", 'type' => GoalList::$TYPE_SKILL)); ?>";
  var addPromiseListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => 0, 'source' => "skill", 'type' => GoalList::$TYPE_PROMISE)); ?>";
  var recordSkillCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordskillcommitment", array('connectionId' => 0, 'source' => 'skill')); ?>"
  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
  var mentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array('mentorshipId' => 0)); ?>";
  var mentorshipRequestUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipRequest"); ?>";
  var appendMoreSkillUrl = "<?php echo Yii::app()->createUrl("skill/skill/appendMoreSkill"); ?>";

  var addAdvicePageUrl = "<?php echo Yii::app()->createUrl("pages/pages/addAdvicePage", array()); ?>";
  var advicePageDetailUrl = "<?php echo Yii::app()->createUrl("pages/pages/advicePageDetail", array()); ?>";


  var addMentorshipUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()); ?>";
  var mentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array()); ?>";

  // $("#gb-topbar-heading-title").text("Skills");
</script>
<div class="gb-background hidden-sm hidden-xs">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-7 col-lg-6 col-md-6 col-sm-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6 col-sm-6"></div>
  </div>
</div>
<div class="container">
  <div class="tab-content">
    <div class="tab-pane active" id="skill-all-pane">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-home-left-nav gb-no-padding gb-background-dark-7">
        <br>
        <div class="gb-top-heading row">
          <h1 class="">Projects</h1>
        </div>
        <br>
        <br>
        <div class="row gb-home-nav">
          <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
             gb-form-slide-target="#gb-project-form-container"
             gb-form-target="#gb-project-form">
            <div class="thumbnail">
              <div class="gb-img-container">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/project_icon_7.png" alt="">
              </div>
              <div class="caption">
                <h5 class="text-center">Add<br>Project</h5>
              </div>
            </div>
          </a>
          <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
             gb-form-slide-target="#gb-mentorship-form-container"
             gb-form-target="#gb-mentorship-form">
            <div class="thumbnail">
              <div class="gb-img-container">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_7.png" alt="">
              </div>
              <div class="caption">
                <h5 class="text-center">Add<br>Mentorship</h5>
              </div>
            </div>
          </a>
          <a class="gb-form-show gb-backdrop-visible gb-advice-page-form-slide col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
             gb-form-slide-target="#gb-advice-page-form-container"
             gb-form-target="#gb-advice-page-form">
            <div class="thumbnail">
              <div class="gb-img-container">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_7.png" alt="">
              </div>
              <div class="caption">
                <h5 class="text-center">Add<br>Advice</h5>
              </div>
            </div>
          </a>
        </div>
        <div id="gb-project-form-container" class="gb-hide gb-panel-form">
          <?php
          echo $this->renderPartial('project.views.project.forms._project_form', array(
           'projectModel' => $projectModel));
          ?>
        </div>
        <div id="gb-mentorship-form-container" class="gb-hide gb-panel-form">
          <?php
          echo $this->renderPartial('mentorship.views.mentorship.forms._add_mentorship_form', array(
           'formType' => GoalType::$FORM_TYPE_MENTORSHIP_HOME,
           'mentorshipModel' => $mentorshipModel,
           'mentorshipLevelList' => $mentorshipLevelList));
          ?>
        </div>
        <div id="gb-advice-page-form-container" class="gb-hide gb-panel-form">
          <?php
          echo $this->renderPartial('pages.views.pages.forms._add_advice_page_form', array(
           'formType' => GoalType::$FORM_TYPE_ADVICE_PAGE_HOME,
           'pageModel' => $pageModel,
           'advicePageModel' => $advicePageModel,
           'pageLevelList' => $pageLevelList));
          ?>
        </div>
        <div class="row gb-home-nav">
          <a class="gb-disabled-1 gb-make-template-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
            <div class="thumbnail">
              <div class="gb-img-container">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/groups_icon_7.png" alt="">
              </div>
              <div class="caption">
                <h5 class="text-center">Add a<br>Group</h5>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding gb-background-light-grey-1">
        <div class="row">
          <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-nav-for-background-7 gb-skill-leftbar">
            <li class="active col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-projects-all-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">All Projects</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-my-projects-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Projects</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
          </ul>
        </div>
        <br>
        <div class="tab-content row gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
          <div class="tab-pane active" id="gb-projects-all-pane">
            <h3 class="gb-heading-2">Recent Projects</h3>
            <div id="gb-posts"class="panel-body gb-no-padding">
              <?php foreach ($projects as $project): ?>
                <?php
                echo $this->renderPartial('_project_row', array(
                 "project" => $project,
                ));
                ?>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="tab-pane" id="gb-my-projects-pane">
            <h3 class="gb-heading-2">My Projects</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('application.views.site.modals._share_with_modal'
  , array("people" => $people,
 "modalType" => Type::$SKILL_SHARE,
 "modalId" => "gb-skill-share-with-modal"));
?>
<div id="gb-skill-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-skill-list-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Add Skill
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>
<div id="gb-advice-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-advice-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Add Advice Page
      </div>
      <div class="modal-body gb-padding-thin">
        <?php
        echo $this->renderPartial('pages.views.pages.forms._add_advice_page_form', array(
         'formType' => GoalType::$FORM_TYPE_ADVICE_PAGE_HOME,
         'pageModel' => $pageModel,
         'advicePageModel' => $advicePageModel,
         'pageLevelList' => $pageLevelList));
        ?>
      </div>
    </div>
  </div>
</div>
<div id="gb-request-confirmation-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="text-center text-success"> Your request has been sent</h2>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<?php
echo $this->renderPartial('skill.views.skill.modals.skill_bank_list', array("skillListBank" => $skillListBank));
?>
<?php
echo $this->renderPartial('mentorship.views.mentorship.modals._add_mentorship_modal', array(
 'formType' => GoalType::$FORM_TYPE_MENTORSHIP_HOME,
 'mentorshipModel' => $mentorshipModel,
 'mentorshipLevelList' => $mentorshipLevelList));
?>
<?php echo $this->renderPartial('skill.views.skill.modals.request_mentorship', array()); ?>


<!-- -----------------------------HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide">
</div>
<?php $this->endContent() ?>