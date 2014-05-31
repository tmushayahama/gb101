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
  Yii::app()->baseUrl . '/js/gb_goal_mentorship_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var addSkillListUrl = "<?php echo Yii::app()->createUrl("skill/skill/addskilllist", array('connectionId' => 0, 'source' => "skill", 'type' => GoalList::$TYPE_SKILL)); ?>";
  var addPromiseListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => 0, 'source' => "skill", 'type' => GoalList::$TYPE_PROMISE)); ?>";
  var recordSkillCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordskillcommitment", array('connectionId' => 0, 'source' => 'skill')); ?>"
  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
  var goalMentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array('mentorshipId' => 0)); ?>";
  var mentorshipRequestUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipRequest"); ?>";

  var addMentorshipUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()); ?>";
 var mentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array()); ?>";

  // $("#gb-topbar-heading-title").text("Skills");
</script>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h2 class="pull-left">My Skills &nbsp;(<i><?php echo GoalList::getGoalListCount(Level::$LEVEL_CATEGORY_SKILL, 0, 0); ?></i>)</h2>
    <ul id="gb-skill-nav" class="gb-nav-1 pull-right">
      <li class="active"><a href="#skill-all-pane" data-toggle="tab">All</a></li>
      <li class="gb-disabled"><a href="#skill-list-pane" data-toggle="tab">My Skill Timeline</a></li>
    </ul>
  </div>
</div>
<br>
<div class="container">
  <div class="row">
    <div id="gb-start-tour-btn" class="btn btn-default btn-xs col-lg-12 col-sm-12 col-xs-12 alert alert-block gb-padding-thin">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h5 class="text-info">Take a Tour - My Skills Page</h5>
    </div>
    <div id="" class=" col-lg-9 col-sm-12 col-xs-12 gb-no-padding">

      <!--<div id="gb-home-header" class="row-fluid">
        <div class="span3">
          <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl . "/img/skill_icon_3.png";                               ?>" alt="">
        </div>
        <div class="connectiom-info-container span5">
          <ul class="nav nav-stacked connectiom-info span12">
            <h3 class="name">My Skills</h3>
            <li class="connectiom-description">
              <p>Skill Management, Skill Bank, Skill Sharing.<br>
                <small><i>skill list, skill commitments, skill monitoring</i></small><p>
            </li>
            <li class="connectiom-members">

            </li>
          </ul>
        </div>
        <ul id="home-activity-stats" class="nav nav-stacked row-fluid span4">
          <li>
            <a class="">
              <i class="glyphicon glyphicon-tasks"></i>  
              Skill List
              <span class="pull-right"> 
      <?php //echo GoalList::getGoalListCount(Level::$LEVEL_CATEGORY_SKILL, 0, 0); ?>
              </span>
            </a>
          </li>
          <li>
            <a class="">
              <i class="glyphicon glyphicon-tasks"></i>  
              Skill Commitments
              <span class="pull-right"> 
      <?php //echo GoalCommitment::getGoalCommitmentCount(Level::$LEVEL_CATEGORY_SKILL); ?>
              </span>
            </a>
          </li>
          <li>
            <a class="">
              <i class="glyphicon glyphicon-tasks"></i>  
              Skill Bank
              <span class="pull-right"> 
      <?php //echo ListBank::getListBankCount(GoalType::$CATEGORY_SKILL); ?>
              </span>
            </a>
          </li>
        </ul>
      </div> -->

      <div class="tab-content row gb-blue-background gb-padding-thin">
        <div class="tab-pane active" id="skill-all-pane">
          <div class="col-lg-3 col-sm-12 col-xs-12 gb-home-left-nav ">
            <div id="gb-skill-skill-container" class="">
              <?php echo $this->renderPartial('_skill_list_preview', array()); ?>
            </div>
          </div>
          <div class="col-lg-9 col-sm-12 col-xs-12 gb-padding-thin gb-blue-left-border gb-white-background">
            <div id="gb-post-input" class="panel panel-default"> 
              <div class="panel-heading gb-no-padding"> 
                <ul id="gb-post-tab" class="nav row inline">
                  <li class="active col-lg-4 pull-left">
                    <a href="#rm-home-add-commitment">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/add_goal.png" class="active" alt=""><br>
                      <strong>Add Skill</strong>
                    </a>
                  </li>
                  <li class="gb-disabled col-lg-4 pull-left">
                    <a href="#rm-home-add-commitment">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png" 
                           onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal_hover.png'" 
                           onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png'" alt=""><br>
                      <strong>Assign Skill</strong>
                    </a>
                  </li>
                  <li class="gb-disabled col-lg-4 pull-left">
                    <a href="#rm-home-add-commitment">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png" 
                           onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge_hover.png'" 
                           onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png'" alt=""><br>
                      <strong>Skill Challenge</strong>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="panel-body"> 
                <div id="gb-commit-form" class="row">
                  <textarea id="gb-add-commitment-input" class="col-lg-12 col-sm-12 col-xs-12"rows="2" placeholder="What is your skill commitment?"></textarea>
                </div>
                <div id="gb-add-skilllist" class="gb-hide" >
                  <div class="gb-skill-forms-container" >
                    <?php
                    echo $this->renderPartial('_add_skill_list_form', array(
                     'formType' => GoalType::$FORM_TYPE_SKILL_HOME,
                     'skillModel' => $skillModel,
                     'skillListModel' => $skillListModel,
                     'skillLevelList' => $skillLevelList,
                     'skillListShare' => $skillListShare));
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-default panel-transparent">
              <div class="panel-heading">
                <h4 class="sub-heading-9">Recent Skills</h4>
              </div>
              <div id="skill-posts"class="panel-body  gb-no-padding">
                <?php
                $count = 1;
                foreach ($skillList as $skillListItem):
                  echo $this->renderPartial('_skill_list_post_row', array(
                   'skillListItem' => $skillListItem,
                   'count' => $count++));
                endforeach;
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<!-- <div id="gb-add-skilllist-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add To Skill List
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white skilllist-modal-close-btn" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="gb-skill-forms-container" >
    <div id="gb-skill-type-forms-container" class="row-fluid box-10-height">
      <div class="span4">
        <h1>Are you ready to make a skill commitment?</h1><br>
        <h3>Choose a type of skill.</h3> <br>
        <h5>
          <div class="label label-info">
            <h5> Note! </h5> 
          </div>
          Some of the skills can be in more than one category.
        </h5>
      </div>
      <div class="span8">
        <div id="academic" class="skill-entry-cover">
          <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;                                                   ?>/img/academic-icon.png" alt="">
          <div class="content">
            <h4>Knowledge Based.</h4>
            <p>Knowledge of specific subjects, procedures and information 
              necessary to perform particular tasks 
              <br>
              <small><i>e.g. programming, marketing, building</i></small><p>
          </div>
        </div>
        <div id="self-management" class="skill-entry-cover">
          <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;                                                   ?>/img/gb" alt="">
          <div class="content">
            <h4>Self Management/Personal Traits</h4>
            <p>Related to how you conduct yourself.<br>
              <small><i>e.g. confident, independent, patient</i></small><p>
          </div>
        </div>
        <div id="transferable" class="skill-entry-cover">
          <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;                                                   ?>/img/gb" alt="">
          <div class="content">
            <h4>Transferable/Functional</h4>
            <p>Actions taken to perform a task, transferable to different work 
              functions and environments. 
              <br>
              <small><i>e.g. analyzing, accurate, organizing</i></small><p>
          </div>
        </div>
        <div id="skill-from-list" class="skill-entry-cover">
          <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;                                                   ?>/img/from_skill_list.png" alt="">
          <div class="content">
            <h4>From Your Skill List</h4>
            <p>Choose what you have already listed.<br>
          </div>
        </div>
        <div id="skill-template" class="skill-entry-cover">
          <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;                                                   ?>/img/use_template_icon.png" alt="">
          <div class="content">
            <h4>Use Template</h4>
            <p>Choose from templates made by other people. </p>
            <br>
          </div>
        </div>
      </div>
    </div>
<?php
//echo $this->renderPartial('_add_skill_list_form', array(
//'skillListBank' => $skillListBank,
//'skillListModel' => $skillListModel,
//'skill_levels' => $skill_levels,
//'skillListShare' => $skillListShare));
?>
  </div>
</div> -->

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
 'formType' => GoalType::$FORM_TYPE_SKILL_HOME,
 'mentorshipModel' => $mentorshipModel,
 'mentorshipLevelList' => $mentorshipLevelList,
 'skillGainedList' => $skillGainedList));
?>
<?php echo $this->renderPartial('skill.views.skill.modals.request_mentorship', array()); ?>

<?php $this->endContent() ?>