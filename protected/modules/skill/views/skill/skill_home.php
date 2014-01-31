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

  var goalMentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array('mentorshipId' => 0)); ?>";

   var mentorshipRequestUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipRequest"); ?>";

  // $("#gb-topbar-heading-title").text("Skills");
</script>
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
      <div id="gb-home-header" class="row-fluid">
        <div class="span3">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/skill_icon_3.png"; ?>" alt="">
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
              <i class="icon-tasks"></i>  
              Skill List
              <span class="pull-right"> 
                <?php echo GoalList::getGoalListCount(GoalType::$CATEGORY_SKILL, 0, 0); ?>
              </span>
            </a>
          </li>
          <li>
            <a class="">
              <i class="icon-tasks"></i>  
              Skill Commitments
              <span class="pull-right"> 
                <?php //echo GoalCommitment::getGoalCommitmentCount(GoalType::$CATEGORY_SKILL); ?>
              </span>
            </a>
          </li>
          <li>
            <a class="">
              <i class="icon-tasks"></i>  
              Skill Bank
              <span class="pull-right"> 
                <?php echo ListBank::getListBankCount(GoalType::$CATEGORY_SKILL); ?>
              </span>
            </a>
          </li>
        </ul>
      </div>
      <br>
      <br>
      <div class=" row-fluid gb-bottom-border-grey-3">
        <h4 class="pull-left">My Skills</h4>
        <ul id="gb-skill-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#skill-all-pane" data-toggle="tab">All</a></li>
          <li class=""><a href="#skill-list-pane" data-toggle="tab">My Skill List</a></li>
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
                   <!-- <a class="pull-right gb-btn gb-btn-blue-2 btn-small add-skill-modal-trigger" type="1"><i class="icon-white icon-plus-sign"></i> Add</a></h5> -->
                </div>
                <div id="gb-skill-skill-container" class=" row-fluid">
                  <?php echo $this->renderPartial('_skill_list_preview', array()); ?>
                </div>
              </div>
            </div>
            <div class="span8">
              <div id="gb-post-input" class=""> 
                <div id="gb-commit-form" class="row-fluid">
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
                <div id="gb-add-skilllist" class="hide" >
                  <div class="gb-skill-forms-container" >
                    <?php
                    echo $this->renderPartial('_add_skill_list_form', array(
                     'skillListModel' => $skillListModel,
                     'skillLevelList' => $skillLevelList,
                     'skillListShare' => $skillListShare));
                    ?>
                  </div>
                </div>
              </div>
              <h4 class="sub-heading-6"><a>Recent Activities</a><a class="pull-right"><i><small>View All</small></i></a></h4>
              <div id="skill-posts"class="row-fluid">
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
          <div class="tab-pane" id="skill-list-pane">
            <ul id="gb-skill-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
              <li class=""><a href="#gb-skill-list-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
              <?php foreach (GoalLevel::getGoalLevels(GoalType::$CATEGORY_SKILL) as $skillLevel): ?>
                <li class=""><a href="<?php echo '#gb-skill-list-' . $skillLevel->id . '-pane'; ?>" data-toggle="tab"><?php echo $skillLevel->level_name; ?><i class="icon-chevron-right pull-right"></i></a></li>
              <?php endforeach; ?>
            </ul>
            <div class="gb-skill-activity-content tab-content">
              <?php foreach (GoalLevel::getGoalLevels(GoalType::$CATEGORY_SKILL) as $skillLevel): ?>
                <div class="tab-pane"id="<?php echo 'gb-skill-list-' . $skillLevel->id . '-pane'; ?>">
                  <br>
                  <div class="sub-heading-5">
                    <h3 class="pull-left"><?php echo $skillLevel->level_name; ?></h3>
                    <h3><a class="pull-right btn add-skill-modal-trigger" type="1"><i class="icon-plus"></i> Add More</a></h3>
                  </div>
                  <div class=" row-fluid">
                    <h4 class="sub-heading-6">
                      Make a list of many skills <?php echo $skillLevel->description; ?>.
                    </h4>
                    <div id="gb-skill-skill-gained-container" class=" row-fluid">
                      <?php
                      $count = 1;
                      foreach (GoalList::getGoalList(GoalType::$CATEGORY_SKILL, 0, $skillLevel->id) as $skillListItem):
                        echo $this->renderPartial('_skill_list_post_row', array(
                         'skillListItem' => $skillListItem,
                         'count' => $count++));
                      endforeach;
                      ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
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
                    foreach ($skillListBank as $skillBankItem):
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
              <th class="by"></th>
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
          <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;                    ?>/img/academic-icon.png" alt="">
          <div class="content">
            <h4>Knowledge Based.</h4>
            <p>Knowledge of specific subjects, procedures and information 
              necessary to perform particular tasks 
              <br>
              <small><i>e.g. programming, marketing, building</i></small><p>
          </div>
        </div>
        <div id="self-management" class="skill-entry-cover">
          <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;                    ?>/img/gb" alt="">
          <div class="content">
            <h4>Self Management/Personal Traits</h4>
            <p>Related to how you conduct yourself.<br>
              <small><i>e.g. confident, independent, patient</i></small><p>
          </div>
        </div>
        <div id="transferable" class="skill-entry-cover">
          <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;                    ?>/img/gb" alt="">
          <div class="content">
            <h4>Transferable/Functional</h4>
            <p>Actions taken to perform a task, transferable to different work 
              functions and environments. 
              <br>
              <small><i>e.g. analyzing, accurate, organizing</i></small><p>
          </div>
        </div>
        <div id="skill-from-list" class="skill-entry-cover">
          <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;                    ?>/img/from_skill_list.png" alt="">
          <div class="content">
            <h4>From Your Skill List</h4>
            <p>Choose what you have already listed.<br>
          </div>
        </div>
        <div id="skill-template" class="skill-entry-cover">
          <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;                    ?>/img/use_template_icon.png" alt="">
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
<div id="gb-bank-list-modal" class="modal gb-modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Select From Skill Bank
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white skilllist-modal-close-btn" data-dismiss="modal" aria-hidden="true">close</button>

  </h2>
  <div class="pull-right input-append row-fluid">
    <input class="span11"  class="que-input-large" placeholder="Keyword Search."type="text">
    <button class="btn">
      <i class="icon-search"></i>
    </button>
  </div>
  <div class="modal-body">

    <div class="">
      <?php
      $count = 1;
      foreach ($skillListBank as $skillBankItem):
        echo $this->renderPartial('_skill_list_bank_item_row', array(
         'skillBankItem' => $skillBankItem,
         'count' => $count++));
        ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<div id="gb-start-mentoring-modal" class="modal gb-modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Start Mentoring
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white skilllist-modal-close-btn" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="modal-body">
    <div class="gb-pages-start-writing row-fluid">
      <div class="row-fluid">
        <p>
          <i>To manage the mentorship, you can only mentor a skill or a goal you've
            listed in your skill gained or goal achieved. 
          </i>
        </p>
        <input id="gb-start-mentoring-skill-name-input" type="text" class="input-block-level" readonly>
        <select id="gb-mentoring-level-selector" class="input-block-level">
          <option value="" disabled="disabled" selected="selected">Select Your Level</option>
          <?php for ($optionCount = 0; $optionCount < 4; $optionCount++): ?>
            <option value="<?php echo $optionCount; ?>"><?php echo Mentorship::$OPTION_LEVEL[$optionCount]; ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <button id="gb-start-mentorship-btn" class="gb-btn gb-btn-blue-2">Start Mentoring</button>
    </div>
  </div>
</div>
<div id="gb-request-mentorship-modal" class="modal gb-modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Request Mentorship
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white skilllist-modal-close-btn" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="gb-btn-row-large row-fluid gb-margin-bottom-narrow">
        <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome"); ?>" class="span12 gb-btn gb-btn-grey-2"><i class="icon-list"></i>Go To Mentorship Page</a>

      </div>
      <div class="row-fluid ">
        <input id="gb-request-mentorship-goal-input" type="text" class ="input-block-level gb-margin-bottom-narrow" readonly>
        <textarea id="gb-request-message" class="input-block-level" rows="2" placeholder="Write a short message"></textarea>
      </div>
      <button id="gb-request-mentorship-btn" class="gb-btn gb-btn-blue-2">Request Mentoring</button>
    </div>
  </div>
</div>
<?php $this->endContent() ?>