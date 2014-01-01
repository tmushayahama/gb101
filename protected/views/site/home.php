<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var createConnectionUrl = "<?php echo Yii::app()->createUrl("site/createconnection"); ?>";
  var recordSkillCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordskillcommitment", array('connectionId' => $activeConnectionId, 'source' => 'connections')); ?>"
  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";
  var sendMenteeshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmenteeshiprequest"); ?>";
  var displayAddConnectionMemberFormUrl = "<?php echo Yii::app()->createUrl("site/displayaddconnectionmemberform"); ?>";
  var sendConnectionMemberRequestUrl = "<?php echo Yii::app()->createUrl("site/sendconnectionmemberrequest"); ?>";
  var indexUrl = "<?php echo Yii::app()->createUrl("site/index"); ?>";
  var addSkillListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => $activeConnectionId, 'source' => 'connections', 'type' => GoalList::$TYPE_SKILL)); ?>"
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

<div id="main-container" class="container">
  <div class="row-fluid">
    <!-- gb sidebar menu -->
    <div class="span9">
      <div id="gb-home-header" class="row-fluid">
        <div class="span3 gb-white">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture; ?>" alt="">
        </div>
        <div class="connectiom-info-container span5">
          <ul class="nav nav-stacked connectiom-info span12">
            <h3 class="name"><?php echo $connection->name ?></h3>
            <li class="connectiom-description">
              <?php
              if ($connection->description != null) :
                echo $connection->description;
              else :
                echo 'No Description';
              endif;
              ?>
            </li>
            <li class="connectiom-members">
              <?php foreach ($connectionMembers as $connectionMember): ?>
                <img class="img-member" href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
              <?php endforeach; ?>
            </li>
          </ul>
        </div>
        <ul id="home-activity-stats" class="nav nav-stacked row-fluid span4">
          <li>
            <a class="">
              <i class="icon-tasks"></i>  
              12 Goals Commitments
            </a>
          </li>
          <li>
            <a class="">
              <i class="icon-tasks"></i>  
              3 Goals Achieved
            </a>
          </li>
          <li>
            <a class="">
              <i class="icon-tasks"></i>  
              12 Motivated
            </a>
          </li>
        </ul>
      </div>
      <!-- Posts -->

      <div id="gb-home-middle-container" class="row-fluid">

        <div class="row-fluid">
          <div class="span4">

            <!-- <ul class="nav rm-nav nav-pills inline span12 rm-green-border">
              <li class="span6"><a href="#rm-assign-goal-modal" role="button" data-toggle="modal"><h4>Assign a goal</h4></a></li>
              <li class="span6"><a href="#"><h4>Assign a small task</h4></a></li>
            </ul>
            <ul class="nav rm-nav nav-pills inline span12 rm-green-border">
              <li class="span6"><a href="#"><h4>Create a challenge</h4></a></li>
              <li class="span6"><a href="#"><h4>Join a challenge</h4></a></li>
            </ul> -->
            <div class="row-fluid">
              <div id="gb-home-skill-list" class="row-fluid">
                <span class='gb-top-heading gb-heading-left'>Add To Skill List</span>
                <table class="table table-condensed table-hover">
                  <tbody id="gb-goal-skill-container">
                    <?php if (count($skillList) == 0): ?>
                    <td id="gb-no-skill-notice">
                      <h5 class="text-warning text-center">No skill list has been shared to this circle</h5>
                    </td>
                  <?php else: ?>
                    <?php
                    foreach ($skillList as $goalListItem):
                      echo $this->renderPartial('_skill_list_row', array(
                       'description' => $goalListItem->goalList->goal->description));
                    
                    endforeach;
                    ?>
                  <?php endif; ?>
                  </tbody>
                </table>
                <div class="">
                  <span class="span7">
                  </span>
                  <span class="span5">
                    <button id="" class="add-skill-modal-trigger pull-right gb-btn gb-btn-brown-2" type=1><i class="icon-white icon-plus"></i>Add Skill</button>
                  </span> 
                </div>
              </div>
            </div>
            <div class="row-fluid">
              <?php if (count($goalList) == 0): ?>
                <a id="" class="add-skill-model-trigger span12 gb-btn-large-1 gb-btn gb-btn-blue-2">Add to Goal List</a>
              <?php else: ?>
                <div id="gb-home-goal-list" class="row-fluid">
                  <span class='gb-top-heading gb-heading-left'>Add More Goals</span>
                  <table class="table table-condensed table-hover">
                    <tbody id="gb-goal-list-tbody">
                      <?php
                      foreach ($goalList as $goalListItem):
                        echo $this->renderPartial('_skill_list_row', array(
                         'description' => $goalListItem->goalList->goal->description));
                      endforeach;
                      ?>
                    </tbody>
                  </table>
                  <div class="">
                    <span class="span7">
                    </span>
                    <span class="span5">
                      <button id="" class="add-skill-model-trigger pull-right gb-btn gb-btn-brown-2"><i class="icon-white icon-plus"></i>Add Goal</button>
                    </span> 
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <div class="row-fluid">
              <?php if (count($promiseList) == 0): ?>
                <a id="" class="add-skill-model-trigger span12 gb-btn-large-1 gb-btn gb-btn-blue-2">Add To Promise List</a>
              <?php else: ?>
                <div id="gb-home-promise-list" class="row-fluid">
                  <span class='gb-top-heading gb-heading-left'>Add More Promises</span>
                  <table class="table table-condensed table-hover">
                    <tbody id="gb-promise-list-tbody">
                      <?php
                      foreach ($promiseList as $goalListItem):
                        echo $this->renderPartial('_skill_list_row', array(
                         'description' => $goalListItem->goalList->goal->description));
                      endforeach;
                      ?>
                    </tbody>
                  </table>
                  <div class="">
                    <span class="span7">
                    </span>
                    <span class="span5">
                      <button id="" class="add-skill-model-trigger pull-right gb-btn gb-btn-brown-2"><i class="icon-white icon-plus"></i>Add Promise</button>
                    </span> 
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="span8">
            <div id="gb-post-input"> 
              <div id="gb-commit-form" class="row rm-row">
                <textarea id="gb-add-commitment-input" connection-id="<?php echo $activeConnectionId; ?>" class="span12"rows="2" placeholder="What is your goal?"></textarea>
                <ul id="gb-post-tab" class="nav row inline ">
                  <li class="active span4">
                    <a href="#rm-home-add-commitment">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/add_goal.png" class="active" alt=""><br>
                      <strong>Add</strong>
                    </a>
                  </li>
                  <li class="span4">
                    <a href="#rm-home-add-commitment">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png" 
                           onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal_hover.png'" 
                           onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png'" alt=""><br>
                      <strong>Assign</strong>
                    </a>
                  </li>
                  <li class="span4">
                    <a href="#rm-home-add-commitment">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png" 
                           onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge_hover.png'" 
                           onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png'" alt=""><br>
                      <strong>Challenge</strong>
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
            <div id="goal-posts"class="row rm-row rm-container">
              <?php foreach ($posts as $post): ?>
                <?php
                echo $this->renderPartial('goal.views.goal._goal_commitment_post', array(
                 "goalCommitment" => $post->goalCommitment,
                 'connection_name' => 'All'//$post->connection->name
                ));
                ?>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="gb-home-sidebar" class="span3">
      <div id="gb-leaderboard-sidebar" class="row-fluid">
        <?php
        echo $this->renderPartial('summary_sidebar/_leaderboard');
        ?>
      </div>
      <div id="gb-todos-sidebar" class="row-fluid">
        <span class='gb-top-heading gb-heading-left'>To Dos</span>
        <span class='gb-top-heading gb-heading-right'><i class="icon-chevron-up"></i></span>
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
                echo $this->renderPartial('summary_sidebar/_todos', array(
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
      <div id="gb-add-more-people" class="row-fluid">
        <span class='gb-top-heading gb-heading-left'>Add More People</span>
        <br>
        <br>
        <table class="table table-condensed">
          <tbody>
            <?php foreach ($nonConnectionMembers as $nonConnectionMember): ?>
              <tr>					
                <?php
                echo $this->renderPartial('summary_sidebar/_add_people', array(
                 'nonConnectionMember' => $nonConnectionMember
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
            <button class="pull-right gb-btn gb-btn-color-white gb-btn-green-1"><i class="icon-white icon-plus"></i> Add More</button>
          </span> 
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->

<div id="gb-request-monitors-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Request Monitor(s)
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <br>
  <?php
  echo $this->renderPartial('goal.views.goal._request_monitors_form', array(
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
  echo $this->renderPartial('goal.views.goal._request_mentorship_form', array(
   'goalMentorshipModel' => $goalMentorshipModel,
   'usersCanMentorshipList' => GoalMentorship::getCanMentorshipList()));
  ?>
</div>
<div id="gb-request-menteeship-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Request Menteeship
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <br>
  <?php
  echo $this->renderPartial('goal.views.goal._request_menteeship_form', array(
   'goalMentorshipModel' => $goalMentorshipModel,
   'goalMenteeshipModel' => $goalMenteeshipModel,
   'usersCanMentorshipList' => GoalMentorship::getCanMentorshipList()));
  ?>
</div>

<div id="gb-add-connection-member-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add Connection Member
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <div id="gb-add-connection-member-modal-content">
    <?php
    echo $this->renderPartial('_add_connection_member_form', array(
     'connectionMemberModel' => $connectionMemberModel
    ));
    ?>
  </div>
</div>

<div id="gb-request-confirmation-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="text-center text-success"> Your request has been sent</h2>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<?php $this->endContent() ?>
