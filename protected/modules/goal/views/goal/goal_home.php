<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home_1.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var addGoalListUrl = "<?php echo Yii::app()->createUrl("goal/goal/addgoallist", array('connectionId' => 0, 'source' => "goal", 'type' => GoalList::$TYPE_GOAL)); ?>";
  var recordGoalCommitmentUrl = "<?php echo Yii::app()->createUrl("goal/goal/recordgoalcommitment", array('connectionId' => 0, 'source' => 'goal')); ?>"
  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
  // $("#gb-topbar-heading-title").text("Goals");
</script>

<div id="main-container" class="container">
  
  <div class="row">
    <div id="" class="span9">
      <div id="gb-home-header" class="row-fluid">
    <div class="span3">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/goal_icon_3.png"; ?>" alt="">
    </div>
    <div class="connectiom-info-container span5">
      <ul class="nav nav-stacked connectiom-info span12">
        <h3 class="name">My Goals</h3>
        <li class="connectiom-description">
          <p>Goal Commitment, Achievement and Sharing.<br>
            <small><i>goal list, goal monitoring, goal referees</i></small><p>
        </li>
        <li class="connectiom-members">

        </li>
      </ul>
    </div>
    <ul id="home-activity-stats" class="nav nav-stacked row-fluid span4">
      <li>
        <a class="">
          <i class="glyphicon glyphicon-tasks"></i>  
          Goal List
          <span class="pull-right"> 
            <?php echo GoalList::getGoalListCount(GoalType::$CATEGORY_GOAL, 0, 0); ?>
          </span>
        </a>
      </li>
      <li>
        <a class="">
          <i class="glyphicon glyphicon-tasks"></i>  
          Goal Commitments
          <span class="pull-right"> 
            <?php echo GoalCommitment::getGoalCommitmentCount(GoalType::$CATEGORY_GOAL); ?>
          </span>
        </a>
      </li>
      <li>
        <a class="">
          <i class="glyphicon glyphicon-tasks"></i>  
          Goal Bank
          <span class="pull-right"> 
            <?php echo ListBank::getListBankCount(GoalType::$CATEGORY_GOAL); ?>
          </span>
        </a>
      </li>
    </ul>
  </div>
      <br>
      <br>
      <div class=" row-fluid gb-bottom-border-grey-3">
        <h4 class="pull-left">My Goals</h4>
        <ul id="gb-goal-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#goal-all-pane" data-toggle="tab">All</a></li>
          <li class=""><a href="#goal-list-pane" data-toggle="tab">My Goal List</a></li>
          <li class=""><a href="#goal-commitment-pane" data-toggle="tab">Goal Commitments</a></li>
          <li class=""><a href="#goal-bank-pane" data-toggle="tab">Goal Bank</a></li>
        </ul>
      </div>
      <div class=" row-fluid">
        <div class="tab-content">
          <div class="tab-pane active " id="goal-all-pane">
            <div class="span4 gb-goal-leftbar">
              <div id="gb-goal-goal-list-box" class=" row-fluid">
                <div class="sub-heading-6">
                  <h5><a href="#goal-list-pane" data-toggle="tab">Goal List (<i><?php echo GoalList::getGoalListCount(GoalType::$CATEGORY_GOAL, 0, 0); ?></i>)</a>
                    <a class="pull-right gb-btn gb-btn-blue-2 btn-small add-goal-modal-trigger" type="1"><i class="glyphicon glyphicon-white icon-plus-sign"></i> Add</a></h5>
                </div>
                <div id="gb-goal-goal-container" class=" row-fluid">
                  <?php echo $this->renderPartial('_goal_list_preview', array()); ?>
                </div>
              </div>
            </div>
            <div class="span8">
              <div id="gb-post-input" class=""> 
                <div id="gb-commit-form" class="row-fluid rm-row ">
                  <textarea id="gb-add-commitment-input" class="span12"rows="2" placeholder="What is your goal commitment?"></textarea>
                  <ul id="gb-post-tab" class="nav row-fluid inline ">
                    <li class="active span4 pull-left">
                      <a href="#rm-home-add-commitment">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/add_goal.png" class="active" alt=""><br>
                        <strong>Add Goal</strong>
                      </a>
                    </li>
                    <li class="span4 pull-left">
                      <a href="#rm-home-add-commitment">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png" 
                             onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal_hover.png'" 
                             onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png'" alt=""><br>
                        <strong>Assign Goal</strong>
                      </a>
                    </li>
                    <li class="span4 pull-left">
                      <a href="#rm-home-add-commitment">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png" 
                             onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge_hover.png'" 
                             onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png'" alt=""><br>
                        <strong>Goal Challenge</strong>
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
              <h4 class="sub-heading-6"><a>Goal Commitments</a><a class="pull-right"><i><small>View All</small></i></a></h4>
              <div id="goal-posts"class="row-fluid rm-row rm-container">
                <?php foreach ($goalCommitments as $goalCommitment): ?>
                  <?php
                  echo $this->renderPartial('_goal_commitment_post', array(
                   "goalCommitment" => $goalCommitment,
                   'connection_name' => 'All'//$post->connection->name
                  ));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="goal-list-pane">
            <ul id="gb-goal-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
              <li class=""><a href="#gb-goal-list-all-pane" data-toggle="tab">All<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <?php foreach (GoalLevel::getGoalLevels(GoalType::$CATEGORY_GOAL) as $goalLevel): ?>
                <li class=""><a href="<?php echo '#gb-goal-list-' . $goalLevel->id . '-pane'; ?>" data-toggle="tab"><?php echo $goalLevel->level_name; ?><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <?php endforeach; ?>
            </ul>
            <div class="gb-goal-activity-content tab-content">
              <?php foreach (GoalLevel::getGoalLevels(GoalType::$CATEGORY_GOAL) as $goalLevel): ?>
                <div class="tab-pane"id="<?php echo 'gb-goal-list-' . $goalLevel->id . '-pane'; ?>">
                  <br>
                  <div class="sub-heading-5">
                    <h3 class="pull-left"><?php echo $goalLevel->level_name; ?></h3>
                    <h3><a class="pull-right btn add-goal-modal-trigger" type="1"><i class="glyphicon glyphicon-plus"></i> Add More</a></h3>
                  </div>
                  <div class=" row-fluid">
                    <h4 class="sub-heading-6">
                      Make a list of many goals <?php echo $goalLevel->description; ?>.
                    </h4>
                    <div id="gb-goal-goal-gained-container" class=" row-fluid">
                      <?php
                      $count = 1;
                      foreach (GoalList::getGoalList(GoalType::$CATEGORY_GOAL, 0, $goalLevel->id) as $goalListItem):
                        echo $this->renderPartial('_goal_list_row_big', array(
                         'goalListItem' => $goalListItem,
                         'count' => $count++));
                      endforeach;
                      ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="tab-pane" id="goal-commitment-pane">
            <ul id="gb-goal-activity-nav" class="gb-side-nav-1 gb-goal-leftbar">
              <li class="active"><a href="#gb-goal-commitment-all-pane" data-toggle="tab">All<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-goal-commitment-following-pane" data-toggle="tab">Following<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-goal-commitment-monitoring-pane" data-toggle="tab">Monitoring<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-goal-commitment-refereeing-pane" data-toggle="tab">Refereeing<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-goal-commitment-favorites-pane" data-toggle="tab">Favorites<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            </ul>
          </div>
          <div class="tab-pane" id="goal-bank-pane">
            <ul id="gb-goal-bank-nav" class="gb-side-nav-1 gb-goal-leftbar">
              <li class="active"><a href="#gb-goal-bank-all-pane" data-toggle="tab">All<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-goal-bank-academic-pane" data-toggle="tab">Academic/Job Related<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-goal-bank-self-management-pane" data-toggle="tab">Self Management<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-goal-bank-transferable-pane" data-toggle="tab">Transferable<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-goal-bank-miscellaneous-pane" data-toggle="tab">Miscellaneous <i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-goal-bank-words-of-action-pane" data-toggle="tab">Words of Action<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            </ul>
            <div class="gb-goal-activity-content tab-content">
              <div class="tab-pane active"id="gb-goal-bank-all-pane">
                <br>
                <div class="sub-heading-5">
                  <h3 class="pull-left">All Goal List</h3>
                  <div class="pull-right input-append">
                    <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                    <button class="btn">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
                <div class=" row-fluid">
                  <div id="gb-goal-goal-bank-all-container" class=" row-fluid">
                    <?php
                    $count = 1;
                    foreach (ListBank::getListBank(GoalType::$CATEGORY_GOAL) as $goalBankItem):
                      echo $this->renderPartial('_goal_bank_item_row', array(
                       'goalBankItem' => $goalBankItem,
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
            <button class="pull-right gb-btn gb-btn-color-white gb-btn-blue-2"><i class="glyphicon glyphicon-white icon-pencil"></i> Edit</button>
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
<div id="gb-add-goallist-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add To Goal List
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white goallist-modal-close-btn" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="gb-goal-forms-container" >
    <?php
    echo $this->renderPartial('_add_goal_list_form', array(
     'goal_list_bank' => $goal_list_bank,
     'goalListModel' => $goalListModel,
     'goal_levels' => $goal_levels,
     'goalListShare' => $goalListShare,
     'goalListMentor' => $goalListMentor));
    ?>
  </div>
</div>

<div id="gb-add-goal-modal" class="modal  modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add Goal Commitment
    <button class="goal-commit-modal-close-btn pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="gb-goal-forms-container">
    <div id="gb-goal-type-forms-container" class="box-10-height">
      <div class="row-fluid">
        <h1>Are you ready to make a goal commitment?</h1><br>
        <h3>Choose a type of goal.</h3> <br>
        <h5>
          <div class="label label-info">
            <h5> Note! </h5> 
          </div>
          Some of the goals can be in more than one category.
        </h5>
      </div>
      <div class="row-fluid">
        <div id="academic" class="goal-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/academic-icon.png" alt="">
          <div class="content">
            <h4>Career.</h4>
            <p>Equip you for a specific career path you want to enter.
              <br>
              <small><i>e.g. better developer, marketing, building</i></small><p>
          </div>
        </div>
        <div id="self-management" class="goal-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
          <div class="content">
            <h4>Physical</h4>
            <p>Your physical well being and health.<br>
              <small><i>e.g. eat health, lose weight, be muscular</i></small><p>
          </div>
        </div>
        <div id="transferable" class="goal-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
          <div class="content">
            <h4>Social</h4>
            <p>What you do for society.
              <br>
              <small><i>e.g. analyzing, accurate, organizing</i></small><p>
          </div>
        </div>

        <div id="goal-from-list" class="goal-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/from_goal_list.png" alt="">
          <div class="content">
            <h4>Self Improvement & Spiritual</h4>
            <p>.<br>
          </div>
        </div>
        <div id="transferable" class="goal-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
          <div class="content">
            <h4>Relationships & Family</h4>
            <p>. 
              <br>
              <small><i>e.g. analyzing, accurate, organizing</i></small><p>
          </div>
        </div>
        <div id="transferable" class="goal-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
          <div class="content">
            <h4>Financial</h4>
            <p>
              <br>
              <small><i>e.g. analyzing, accurate, organizing</i></small><p>
          </div>
        </div>
        <div id="transferable" class="goal-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
          <div class="content">
            <h4>Pleasure</h4>
            <p 
              <br>
              <small><i>e.g. analyzing, accurate, organizing</i></small><p>
          </div>
        </div>
        <div id="goal-template" class="goal-entry-cover">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/use_template_icon.png" alt="">
          <div class="content">
            <h4>Use Template</h4>
            <p>Choose from templates made by other people. </p>
            <br>
          </div>
        </div>
      </div>
    </div>
    <div id="academic-goal-entry-form"class="hide goal-entry-form">
      <h4>Academic</h4>
      <div id="goal-academic-pane">
        <?php
        echo $this->renderPartial('_goal_academic_form', array(
         'academicModel' => $academicModel,
         'goalModel' => $goalModel,
         'goalListShare' => $goalListShare,
         'goalCommitmentShare' => $goalCommitmentShare,
         'goalListMentor' => $goalListMentor
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
<div id="gb-list-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="text-center text-success">Select from Goal List</h2>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<?php $this->endContent() ?>