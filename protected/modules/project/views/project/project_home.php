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
  <div class="tab-content gb-full">
    <div class="tab-pane active gb-full" id="skill-all-pane">
      <div class="gb-full col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-home-left-nav gb-no-padding gb-background-dark-7">
        <br>
        <div class="gb-top-heading row">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/project_icon_5.png" alt="">
          <h1 class="pull-left">My Projects</h1>
        </div>
        <br>
        <br>
        <div class="row gb-home-nav">
          <a id="gb-tour-skill-1" class="gb-form-show col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-no-padding"
             gb-form-slide-target="#gb-skill-list-form-container"
             gb-form-target="#gb-skill-list-form">
            <div class="thumbnail">
              <div class="gb-img-container">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_5.png" alt="">
              </div>
              <div class="caption">
                <h4 class="text-center"><br>Add Skill</h4>
              </div>
            </div>
          </a>
          <a class="gb-disabled-1 gb-form-slide-btn col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-no-padding">
            <div class="thumbnail">
              <div class="gb-img-container">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png" alt="">
              </div>
              <div class="caption">
                <h4 class="text-center">Assign<br>Skill</h4>
              </div>
            </div>
          </a>
          <a class="gb-disabled-1 gb-form-slide-btn col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-no-padding">
            <div class="thumbnail">
              <div class="gb-img-container">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png" alt="">
              </div>
              <div class="caption">
                <h4 class="text-center">Get Skill<br>Challenge</h4>
              </div>
            </div>
          </a>
        </div>
        <div id="gb-skill-list-form-container" class="row gb-hide gb-panel-form">
          <?php
          echo $this->renderPartial('skill.views.skill._add_skill_list_form', array(
           'formType' => GoalType::$FORM_TYPE_SKILL_HOME,
           'skillModel' => $skillModel,
           'skillListModel' => $skillListModel,
           'skillLevelList' => $skillLevelList));
          ?>
        </div>
      </div>
      <div class="gb-full col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-no-padding gb-background-light-grey-1">
        <br>
        <div class="panel-group" id="gb-getting-started">
          <div class="panel panel-default">
            <a id="gb-start-tour-btn" class="btn btn-link" data-toggle="collapse" data-parent="#gb-getting-started" href="#collapseOne">
              Take a Tour: <strong>My Skills Page</strong>
            </a>
          </div>
        </div>
        <br>
        <div class="panel panel-default panel-transparent gb-side-margin-thick">
          <h3 class="gb-heading-2">Recent Skills</h3>
          <br>
          <div id="gb-posts"class="panel-body gb-no-padding">
           
          </div>
        </div>
        <div class="gb-dummy-height">

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