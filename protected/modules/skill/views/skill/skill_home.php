<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var addSkillListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => 0, 'source' => "skill", 'type' => GoalList::$TYPE_SKILL)); ?>";
  var addPromiseListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => 0, 'source' => "skill", 'type' => GoalList::$TYPE_PROMISE)); ?>";
  var recordSkillCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordskillcommitment", array('connectionId' => 0, 'source' => 'skill')); ?>"
  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
  // $("#gb-topbar-heading-title").text("Skills");
</script>
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
      <div class=" row-fluid gb-bottom-border-grey-3">
        <h4 class="pull-left">My Skills</h4>
        <ul id="gb-skill-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#skill-all-pane" data-toggle="tab">All</a></li>
          <li class=""><a href="#skill-list-pane" data-toggle="tab">My Skill List</a></li>
          <li class=""><a href="#skill-commitment-pane" data-toggle="tab">Skill Commitments</a></li>
          <li class=""><a href="#skill-bank-pane" data-toggle="tab">Skill Bank</a></li>
        </ul>
      </div>
      <div class=" row-fluid">
        <div class="tab-content">
          <div class="tab-pane active " id="skill-all-pane">
            <div class="span4 gb-skill-leftbar">
              <div id="gb-skill-skill-list-box" class=" row-fluid">
                <div class="sub-heading-6">
                  <h5><a href="#skill-list-pane" data-toggle="tab">Skill List (<i><?php echo GoalList::getGoalListCount(GoalType::$CATEGORY_SKILL, 0, 0); ?></i>)</a>
                    <a class="pull-right gb-btn gb-btn-blue-2 btn-small add-skill-modal-trigger" type="1"><i class="icon-white icon-plus-sign"></i> Add</a></h5>
                </div>
                <div id="gb-skill-skill-container" class=" row-fluid">
                  <?php echo $this->renderPartial('_skill_list_preview', array()); ?>
                </div>
              </div>
            </div>
            <div class="span8">
              <div id="gb-post-input" class=""> 
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
                             onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_skill_hover.png'" 
                             onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png'" alt=""><br>
                        <strong>Assign Skill</strong>
                      </a>
                    </li>
                    <li class="span4 pull-left">
                      <a href="#rm-home-add-commitment">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/skill_challenge.png" 
                             onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/skill_challenge_hover.png'" 
                             onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/skill_challenge.png'" alt=""><br>
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
              <h4 class="sub-heading-6"><a>Skill Commitments</a><a class="pull-right"><i><small>View All</small></i></a></h4>
              <div id="skill-posts"class="row-fluid rm-row rm-container">
                <?php foreach ($skillCommitments as $skillCommitment): ?>
                  <?php
                  echo $this->renderPartial('_skill_commitment_post', array(
                   "skillCommitment" => $skillCommitment,
                   'connection_name' => 'All'//$post->connection->name
                  ));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="skill-list-pane">
            <ul id="gb-skill-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
              <li class=""><a href="#gb-skill-list-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
              <li class="active"><a href="#gb-skill-list-gained-pane" data-toggle="tab">Skills Gained<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-list-to-improve-pane" data-toggle="tab">Skills To Improve<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-list-to-learn-pane" data-toggle="tab">Skills To Learn<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-list-to-know-pane" data-toggle="tab">Skills To Know<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-list-words-of-action-pane" data-toggle="tab">Words of Action<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-list-miscellaneous-pane" data-toggle="tab">Miscellaneous <i class="icon-chevron-right pull-right"></i></a></li>
            </ul>
            <div class="gb-skill-activity-content tab-content">
              <div class="tab-pane active"id="gb-skill-list-gained-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">Skills Gained</h3>
                  <h3><a class="pull-right btn add-skill-modal-trigger" type="1"><i class="icon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Make a list of many skills you have gained so far.
                  </h4>
                  <div id="gb-skill-skill-gained-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(GoalType::$CATEGORY_SKILL, 0, 1) as $skillListItem):
                      echo $this->renderPartial('_skill_list_row_big', array(
                       'skillListItem' => $skillListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-skill-list-to-improve-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">Skills To Improve</h3>
                  <h3><a class="pull-right btn add-skill-modal-trigger" type="1"><i class="icon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Make a list of skills you want to improve
                  </h4>
                  <div id="gb-skill-skill-to-improve-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(GoalType::$CATEGORY_SKILL, 0, 2) as $skillListItem):

                      echo $this->renderPartial('_skill_list_row_big', array(
                       'skillListItem' => $skillListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-skill-list-to-learn-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">Skills To Learn</h3>
                  <h3><a class="pull-right btn add-skill-modal-trigger" type="1"><i class="icon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Make a list of many skills you want to learn.
                  </h4>
                  <div id="gb-skill-skill-to-learn-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(GoalType::$CATEGORY_SKILL, 0, 3) as $skillListItem):
                      echo $this->renderPartial('_skill_list_row_big', array(
                       'skillListItem' => $skillListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-skill-list-to-know-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">Skills To Know</h3>
                  <h3><a class="pull-right btn add-skill-modal-trigger" type="1"><i class="icon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Make a list of many skills you want to know more about.
                  </h4>
                  <div id="gb-skill-skill-to-know-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(GoalType::$CATEGORY_SKILL, 0, 4) as $skillListItem):

                      echo $this->renderPartial('_skill_list_row_big', array(
                       'skillListItem' => $skillListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-skill-list-words-of-action-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">Words Of Action</h3>
                  <h3><a class="pull-right btn add-skill-modal-trigger" type="1"><i class="icon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Make a list of your words of action.
                  </h4>
                  <div id="gb-skill-skill-words-of-action-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(GoalType::$CATEGORY_SKILL, 0, 6) as $skillListItem):
                      echo $this->renderPartial('_skill_list_row_big', array(
                       'skillListItem' => $skillListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-skill-list-miscellaneous-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">Miscellaneous Skills</h3>
                  <h3><a class="pull-right btn add-skill-modal-trigger" type="1"><i class="icon-plus"></i> Add More</a></h3>
                </div>
                <div class=" row-fluid">
                  <h4 class="sub-heading-6">
                    Some other skills.
                  </h4>
                  <div id="gb-skill-skill-miscellaneous-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (GoalList::getGoalList(GoalType::$CATEGORY_SKILL, 0, 5) as $skillListItem):

                      echo $this->renderPartial('_skill_list_row_big', array(
                       'skillListItem' => $skillListItem,
                       'count' => $count++));
                    endforeach;
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="skill-commitment-pane">
            <ul id="gb-skill-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
              <li class="active"><a href="#gb-skill-commitment-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-commitment-following-pane" data-toggle="tab">Following<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-commitment-monitoring-pane" data-toggle="tab">Monitoring<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-commitment-refereeing-pane" data-toggle="tab">Refereeing<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-commitment-favorites-pane" data-toggle="tab">Favorites<i class="icon-chevron-right pull-right"></i></a></li>
            </ul>
          </div>
          <div class="tab-pane" id="skill-bank-pane">
            <ul id="gb-skill-bank-nav" class="gb-side-nav-1 gb-skill-leftbar">
              <li class="active"><a href="#gb-skill-bank-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-bank-academic-pane" data-toggle="tab">Academic/Job Related<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-bank-self-management-pane" data-toggle="tab">Self Management<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-bank-transferable-pane" data-toggle="tab">Transferable<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-bank-miscellaneous-pane" data-toggle="tab">Miscellaneous <i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-skill-bank-words-of-action-pane" data-toggle="tab">Words of Action<i class="icon-chevron-right pull-right"></i></a></li>
            </ul>
            <div class="gb-skill-activity-content tab-content">
              <div class="tab-pane active"id="gb-skill-bank-all-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">All Skill List</h3>
                  <div class="pull-right input-append">
                    <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                    <button class="btn">
                      <i class="icon-search"></i>
                    </button>
                  </div>
                </div>
                <div class=" row-fluid">
                  <div id="gb-skill-skill-bank-all-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (ListBank::getListBank(GoalType::$CATEGORY_SKILL) as $skillBankItem):

                      echo $this->renderPartial('_skill_bank_item_row', array(
                       'skillBankItem' => $skillBankItem,
                       'count' => $count++));
                      ?>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-skill-bank-academic-pane">
                <div class="sub-heading-5">
                  <h3 class="pull-left">Academic/Job Related</h3>
                  <div class="pull-right input-append">
                    <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                    <button class="btn">
                      <i class="icon-search"></i>
                    </button>
                  </div>
                </div>
                <div class=" row-fluid">
                  <div id="gb-skill-skill-bank-all-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (ListBank::getListBank(1) as $skillBankItem):
                      ?> 
                      <?php
                      echo $this->renderPartial('_skill_bank_item_row', array(
                       'skillBankItem' => $skillBankItem,
                       'count' => $count++));
                      ?>
                    <?php endforeach; ?>
                    ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-skill-bank-self-management-pane">
                <div class="sub-heading-5">
                  <h3 class="pull-left">Self Management</h3>
                  <div class="pull-right input-append">
                    <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                    <button class="btn">
                      <i class="icon-search"></i>
                    </button>
                  </div>
                </div>
                <div class=" row-fluid">
                  <div id="gb-skill-skill-bank-all-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (ListBank::getListBank(2) as $skillBankItem):
                      ?> 
                      <?php
                      echo $this->renderPartial('_skill_bank_item_row', array(
                       'skillBankItem' => $skillBankItem,
                       'count' => $count++));
                      ?>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane"id="gb-skill-bank-transferable-pane">
                <div class="sub-heading-5">
                  <h3 class="pull-left">Transferable</h3>
                  <div class="pull-right input-append">
                    <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                    <button class="btn">
                      <i class="icon-search"></i>
                    </button>
                  </div>
                </div>
                <div class=" row-fluid">
                  <div id="gb-skill-skill-bank-all-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (ListBank::getListBank(3) as $skillBankItem):
                      ?> 
                      <?php
                      echo $this->renderPartial('_skill_bank_item_row', array(
                       'skillBankItem' => $skillBankItem,
                       'count' => $count++));
                      ?>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="gb-home-sidebar" class="span3">
      <h5 class="sub-heading-7"><a>Global Todos</a><a class="pull-right"><i><small>View All</small></i></a></h5>
      <div id="gb-todos-sidebar" class="row-fluid">
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th class="by">By</th>
              <th class="task">Task</th>
              <th class="date">Assigned</th>
              <th class="puntos">Puntos</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($todos as $todo): ?>
              <tr>
                <?php
                echo $this->renderPartial('application.views.site.summary_sidebar._todos', array(
                 'todo' => $todo->goal->description,
                 'todo_puntos' => $todo->goal->points_pledged
                ));
                ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="">
          <span class="span7">
          </span>
          <span class="span5">
            <button class="pull-right gb-btn gb-btn-color-white gb-btn-blue-2"><i class="icon-white icon-pencil"></i> Edit</button>
          </span> 
        </div>
      </div>
      <h5 id="gb-view-connection-btn" class="sub-heading-7"><a>Add People</a><a class="pull-right"><i><small>View All</small></i></a></h5>
      <div class="box-6-height">
        <?php foreach ($nonConnectionMembers as $nonConnectionMember): ?>				
          <?php
          echo $this->renderPartial('application.views.site.summary_sidebar._add_people', array(
           'nonConnectionMember' => $nonConnectionMember
          ));
          ?>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<div id="gb-add-skilllist-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add To Skill List
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white skilllist-modal-close-btn" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="gb-skill-forms-container" >
    <?php
    echo $this->renderPartial('_add_skill_list_form', array(
     'skill_list_bank' => $skill_list_bank,
     'skillListModel' => $skillListModel,
     'skill_levels' => $skill_levels,
     'skillListShare' => $skillListShare,
     'skillListMentor' => $skillListMentor));
    ?>
  </div>
</div>

<div id="gb-add-skill-modal" class="modal  modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add Skill Commitment
    <button class="skill-commit-modal-close-btn pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="gb-skill-forms-container">
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
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/academic-icon.png" alt="">
          <div class="content">
            <h4>Knowledge Based.</h4>
            <p>Knowledge of specific subjects, procedures and information 
              necessary to perform particular tasks 
              <br>
              <small><i>e.g. programming, marketing, building</i></small><p>
          </div>
        </div>
        <div id="self-management" class="skill-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
          <div class="content">
            <h4>Self Management/Personal Traits</h4>
            <p>Related to how you conduct yourself.<br>
              <small><i>e.g. confident, independent, patient</i></small><p>
          </div>
        </div>
        <div id="transferable" class="skill-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
          <div class="content">
            <h4>Transferable/Functional</h4>
            <p>Actions taken to perform a task, transferable to different work 
              functions and environments. 
              <br>
              <small><i>e.g. analyzing, accurate, organizing</i></small><p>
          </div>
        </div>
        <div id="skill-from-list" class="skill-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/from_skill_list.png" alt="">
          <div class="content">
            <h4>From Your Skill List</h4>
            <p>Choose what you have already listed.<br>
          </div>
        </div>
        <div id="skill-template" class="skill-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/use_template_icon.png" alt="">
          <div class="content">
            <h4>Use Template</h4>
            <p>Choose from templates made by other people. </p>
            <br>
          </div>
        </div>
      </div>
    </div>
    <div id="academic-skill-entry-form"class="hide skill-entry-form">
      <h4>Academic</h4>
      <div id="skill-academic-pane">
        <?php
        echo $this->renderPartial('_skill_academic_form', array(
         'academicModel' => $academicModel,
         'skillModel' => $skillModel,
         'skillListShare' => $skillListShare,
         'skillCommitmentShare' => $skillCommitmentShare,
         'skillListMentor' => $skillListMentor
        ));
        ?>
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
   'skillMonitorModel' => $skillMonitorModel,
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
   'skillMentorshipModel' => $skillMentorshipModel,
   'usersCanMentorshipList' => GoalMentorship::getCanMentorshipList()));
  ?>
</div>
<div id="gb-request-confirmation-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="text-center text-success"> Your request has been sent</h2>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<div id="gb-list-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="text-center text-success">Select from Skill List</h2>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<?php $this->endContent() ?>