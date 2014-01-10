<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_management.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  //var addSkillListUrl = "<?php echo Yii::app()->createUrl("goal/goal/goalhome/addgoallist/connectionId/1"); ?>";
  //var addSkillListUrl = "<?php echo Yii::app()->createUrl("site/addgoallist", array('connectionId' => 1, 'source' => "goal")); ?>";
  var addGoalCommitmentWebLinkUrl = "<?php echo Yii::app()->createUrl("site/addGoalCommitmentWebLink"); ?>";
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

<div class="container">
  <div id="main-container">
    <div class="row-fluid">
      <div class="gb-goal-management-container span9">
        <div class="row-fluid">

          <?php
          echo $this->renderPartial('_goal_commitment_post', array(
           "goalCommitment" => $goalCommitment,
           'connection_name' => 'All'//$post->connection->name
          ));
          ?>
        </div>
        <br>
        <div class=" row-fluid">
          <div class=" row-fluid gb-bottom-border-grey-3">
            <h4 class="pull-left">Goal Management</h4>
            <ul id="gb-goal-management-nav" class="gb-nav-1 pull-right">
              <li class="active"><a href="#goal-activity-tab-pane" data-toggle="tab">Activity</a></li>
              <li class=""><a href="#goal-mentorship-pane" data-toggle="tab">Mentorships</a></li>
              <li class=""><a href="#goal-monitor-pane" data-toggle="tab">Monitors</a></li>
              <li class=""><a href="#goal-referee-pane" data-toggle="tab">Referees</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active row-fluid" id="goal-activity-tab-pane">
              <ul id="gb-goal-activity-nav" class="gb-side-nav-1 gb-goal-leftbar">
                <li class=""><a href="#gb-goal-activity-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
                <li class="active"><a href="#gb-goal-activity-todos-pane" data-toggle="tab">To Dos<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-discussion-pane" data-toggle="tab">Discussion<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-files-pane" data-toggle="tab">Files<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-web-links-pane" data-toggle="tab">Web Links<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-calendar-pane" data-toggle="tab">Calendar<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-message-pane" data-toggle="tab">Message<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="icon-chevron-right pull-right"></i></a></li>
              </ul>
              <div id="gb-goal-activity-content" class="tab-content">
                <div class="tab-pane " id="gb-goal-activity-all-pane">
                  <h3>All</h3>
                </div>
                <div class="tab-pane active " id="gb-goal-activity-todos-pane">
                  <h3>To Dos <a class="pull-right">Add New Todo</a></h3>
                  <br>
                  <h4><a><i>To Do Heading</i></a></h4>
                  <div class="gb-goal-management-todos">
                    <?php foreach ($goalTodos as $goalTodo): ?>
                      <div class="gb-goal-management-todo">
                        <input class="pull-left" type="checkbox"><a class="offset1"><?php echo $goalTodo->todo->todo ?></a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="tab-pane" id="gb-goal-activity-discussion-pane">
                  <h3>Goal Discussion <a class="pull-right">Add New Discussion</a></h3>

                </div>
                <div class="tab-pane" id="gb-goal-activity-web-links-pane">
                  <h3>Web Links <a id="gb-add-weblink-modal-trigger" goal-id="<?php echo $goalCommitment->id; ?> " class="pull-right">New Web Link</a></h3>
                  <?php foreach ($goalWebLinks as $goalWebLink): ?>
                    <div id="gb-goal-management-web-links">
                      <?php
                      echo $this->renderPartial('_web_link_row', array(
                       "goalWebLink" => $goalWebLink,
                      ));
                      ?>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="tab-pane" id="gb-goal-activity-calendar-pane">
                </div>
                <div class="tab-pane" id="gb-goal-activity-message-pane">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="goal-monitor-pane">
              <div class="span12">
                <?php if (count($monitors) == 0): ?>
                  <br>
                  <br>
                  <h2 class="text-center text-warning">No Monitors on this goal</h2>
                <?php else: ?>
                  <div class="dropdown">
                    <a id="gb-monitor-dropdown-btn" class="dropdown-toggle gb-btn" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                      All Monitors on this Goal (<strong><?php echo count($monitors); ?></strong>)
                      <i class=" icon-2 icon-chevron-down pull-right"></i>
                    </a>
                    <ul class="dropdown-menu gb-monitor-dropdown-menu" role="menu" aria-labelledby="dLabel">

                      <?php foreach ($monitors as $monitor): ?>
                        <?php if ($monitor->status == 0): ?>
                          <li><a class="gb-monitor-dropdown-menu-btns"><?php echo $monitor->monitor->profile->firstname . " " . $monitor->monitor->profile->lastname; ?><small class="pull-right"> Pending Request</small></a></li>
                        <?php else: ?>
                          <li><a class="gb-monitor-dropdown-menu-btns"><?php echo $monitor->monitor->profile->firstname . " " . $monitor->monitor->profile->lastname; ?> </a></li> 
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="tab-pane" id="goal-mentorship-pane">
              <div class="span12">
                <?php if (count($mentorships) == 0): ?>
                  <br>
                  <br>
                  <h2 class="text-center text-warning">No Mentorships on this goal</h2>
                <?php else: ?>
                  <div class="dropdown">
                    <a id="gb-mentorship-dropdown-btn" class="dropdown-toggle gb-btn" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                      All Mentorships on this Goal (<strong><?php echo count($mentorships); ?></strong>)
                      <i class=" icon-2 icon-chevron-down pull-right"></i>
                    </a>
                    <ul class="dropdown-menu gb-mentorship-dropdown-menu" role="menu" aria-labelledby="gb-mentorship-dropdown-btn">
                      <?php foreach ($mentorships as $mentorship): ?>
                        <?php if ($mentorship->status == 0): ?>
                          <li><a class="gb-mentorship-dropdown-menu-btns"><?php echo $mentorship->mentorship->profile->firstname . " " . $mentorship->mentorship->profile->lastname; ?><small class="pull-right"> Pending Request</small></a></li>
                        <?php else: ?>
                          <li><a class="gb-mentorship-dropdown-menu-btns"><?php echo $mentorship->mentorship->profile->firstname . " " . $mentorship->mentorship->profile->lastname; ?> </a></li> 
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<div id="gb-add-weblink-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add Link
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <br>
  <?php
  echo $this->renderPartial('_add_weblink_form', array(
   'goalCommitmentWebLinkModel' => $goalCommitmentWebLinkModel))
  ?>
</div>
<?php $this->endContent(); ?>