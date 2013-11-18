<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  //var addSkillListUrl = "<?php echo Yii::app()->createUrl("goal/goal/skillhome/addskilllist/connectionId/1"); ?>";

  var addSkillListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => 0, 'source' => "goal", 'type' => GoalList::$TYPE_SKILL)); ?>";
  var addPromiseListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => 0, 'source' => "goal", 'type' => GoalList::$TYPE_PROMISE)); ?>";
  var recordSkillCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordskillcommitment", array('connectionId' => 0, 'source' => 'goal')); ?>"
  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";


</script>
<link href="css/leveledito.css?v=1.11" rel="stylesheet">

<style>
  body {
    /* padding-top: 60px; */
  }
</style>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="ico/favicon.ico?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png?v=1.11">
<!-- gb sidebar menu -->
<div class="container">
  <div id="main-container">
    <div class="row-fluid">

      <!-- TOOLBAR -->
      <!-- Posts -->
      <div id="" class="span9">
        <div class="gb-topbar row-fluid">
          <div id="" class="span5 gb-topbar-heading">
            <h2>Skills</h2>
          </div>
        </div> 
        <div class=" row-fluid">
          <ul id="gb-goal-nav">
            <li class="active"><a href="#skill-all-pane" data-toggle="tab">All</a></li>
            <li class=""><a href="#skill-list-pane" data-toggle="tab">Skill List</a></li>
            <li class=""><a href="#promise-tab-pane" data-toggle="tab">Skill Commitments</a></li>
          </ul>
        </div>
        <div class=" row-fluid">
          <div class="tab-content">
            <div class="tab-pane active " id="skill-all-pane">
              <div class="span4 gb-border-blue-4">
                <div id="gb-goal-skill-list-box" class=" row-fluid">
                  <div class="sub-heading-4">
                    <a href="#skill-list-pane" data-toggle="tab">SKILL LIST</a>
                    <a class="pull-right">15</a>
                  </div>
                  <div id="gb-goal-skill-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach ($skillList as $goalListItem):
                      echo $this->renderPartial('_skill_list_row', array(
                       'goalListItem' => $goalListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                    <div class="gb-footer-blue-1">
                      <h4><a class="btn-link add-skill-modal-trigger" type="1">Add To Skill List</a></h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="span8">
                <div id="gb-post-input" class="gb-shadow-blue-5"> 
                  <div id="gb-commit-form" class="row-fluid rm-row ">
                    <textarea id="gb-add-commitment-input" class="span12"rows="2" placeholder="What is your skill commitment?"></textarea>
                    <ul id="gb-post-tab" class="nav row-fluid inline ">
                      <li class="active span4 pull-left">
                        <a href="#rm-home-add-commitment">
                          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/add_goal.png" class="active" alt=""><br>
                          <strong>Add Skill</strong>
                        </a>
                      </li>
                      <li class="span4 pull-left">
                        <a href="#rm-home-add-commitment">
                          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png" 
                               onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal_hover.png'" 
                               onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png'" alt=""><br>
                          <strong>Assign Skill</strong>
                        </a>
                      </li>
                      <li class="span4 pull-left">
                        <a href="#rm-home-add-commitment">
                          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png" 
                               onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge_hover.png'" 
                               onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png'" alt=""><br>
                          <strong>Skill Challenge</strong>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav hidden">
                      <li class="pull-right">
                        <button type="submit" id="rm-commit-post-home" class="rm-dark-blue-btn">I Commit</button>
                      </li>
                      <li class="pull-right dropdown">
                        <a href="#" class="dropdown-toggle btn" data-toggle="dropdown">Friends <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li class="nav-header">Who can see this</li>
                          <li id="rm-friends-selector-home" class="controls">
                            <label class="checkbox text-left">
                              <input type="checkbox" value="option1"> Select All
                            </label>
                          </li>
                        </ul>
                      </li>
                      <li class="pull-right">
                        <ul class="inline">
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
                <div id="goal-posts"class="row-fluid rm-row rm-container">
                  <?php foreach ($posts as $post): ?>
                    <?php
                    echo $this->renderPartial('_goal_commitment_post', array(
                     "goalCommitment" => $post->goalCommitment,
                     'connection_name' => 'All'//$post->connection->name
                    ));
                    ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="skill-list-pane">
              <ul id="gb-skill-activity-nav" class="gb-border-blue-4">
                <li class=""><a href="#gb-skill-list-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
                <li class="active"><a href="#gb-skill-list-gained-pane" data-toggle="tab">Skills Gained<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-to-learn-pane" data-toggle="tab">Skills To Learn<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-to-know-pane" data-toggle="tab">Skills To Know<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-miscellaneous-pane" data-toggle="tab">Miscellaneous <i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-words-of-action-pane" data-toggle="tab">Words of Action<i class="icon-chevron-right pull-right"></i></a></li>
              </ul>
              <div id="gb-skill-activity-content" class="tab-content">
                <div class="tab-pane active"id="gb-skill-list-gained-pane">
                  <div class="sub-heading-2">
                    <h3 class="pull-left">Skills Gained</h3>
                    <a class="pull-right gb-btn gb-btn-color-white btn-large gb-btn-blue-4 add-skill-modal-trigger" type="1">Add Skills</a>
                  </div>
                  <div id="gb-goal-skill-list-box" class=" row-fluid">

                    <div class="row-fluid gb-btn-white-4 gb-shadow-blue-5">
                      <p> <h5>
                        Make a list of many skills you have gained so far.</h5></p>
                    </div>
                    <div id="gb-goal-skill-container" class=" row-fluid">
                      <?php
                      $count = 1;
                      foreach ($skillList as $goalListItem):
                        echo $this->renderPartial('_skill_list_row_big', array(
                         'goalListItem' => $goalListItem,
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
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<div id="gb-add-skilllist-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add To Skill List
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <br>
  <?php
  echo $this->renderPartial('_add_skill_list_form', array(
   'goalListModel' => $goalListModel,
   'goalListShare' => $goalListShare,
   'goalListMentor' => $goalListMentor));
  ?>
</div>

<div id="gb-add-promiselist-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add To My Promise List
  </h2>
  <br>
  <?php
  echo $this->renderPartial('_add_promise_list_form', array(
   'goalListModel' => $goalListModel,
   'goalListShare' => $goalListShare,
   'goalListMentor' => $goalListMentor));
  ?>
</div>

<div id="gb-add-skill-modal" class="modal  modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add Skill Commitment
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <div id="gb-skill-forms-container" class=" row-fluid">
    <div id="gb-skill-type-forms-container" class=" row-fluid">
      <div id="academic" class="skill-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/academic-icon.png" alt="">
        <br>
        <div class="content">
          <h3>Academic/Job Related</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
      <div id="self-management" class="skill-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
        <br>
        <div class="content">
          <h3>Self Management</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
      <div id="transferable" class="skill-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
        <br>
        <div class="content">
          <h3>Transferable</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
      <div id="skill-template" class="skill-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
        <br>
        <div class="content">
          <h3>Use Template</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
    </div>
    <div id="academic-skill-entry-form"class="hide skill-entry-form">
      <h4>Academic</h4>
      <ul class="nav nav-tabs" id="skill-tab">
        <li class="active"><a href="#skill-academic-pane">Academic</a></li>
        <li><a href="#skill-job-pane">Job Related</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="skill-academic-pane">
          <?php
          echo $this->renderPartial('_skill_academic_form', array(
           'academicModel' => $academicModel,
           'goalModel' => $goalModel,
           'goalListShare' => $goalListShare,
           'goalCommitmentShare' => $goalCommitmentShare,
           'goalListMentor' => $goalListMentor
          ));
          ?>
        </div>
        <div class="tab-pane" id="skill-job-pane">...</div>
      </div>
    </div>
  </div>
</div>
<div id="gb-request-monitors-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Request Monitor(s)
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <br>
  <?php
  echo $this->renderPartial('_request_monitors_form', array(
   'goalMonitorModel' => $goalMonitorModel,
   'usersCanMonitorList' => GoalMonitor::getCanMonitorList()));
  ?>
</div>
<div id="gb-request-mentorship-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Request Mentorship(s)
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <br>
  <?php
  echo $this->renderPartial('_request_mentorship_form', array(
   'goalMentorshipModel' => $goalMentorshipModel,
   'usersCanMentorshipList' => GoalMentorship::getCanMentorshipList()));
  ?>
</div>
<div id="gb-request-confirmation-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="text-center text-success"> Your request has been sent</h2>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<?php $this->endContent() ?>