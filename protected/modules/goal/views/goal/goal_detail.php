<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  //var addSkillListUrl = "<?php echo Yii::app()->createUrl("goal/goal/goalhome/addgoallist/connectionId/1"); ?>";
  var addSkillListUrl = "<?php echo Yii::app()->createUrl("site/addgoallist", array('connectionId' => 1, 'source' => "goal")); ?>";
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
        <div class="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Note!</strong> You have not yet committed this goal. If you commit,
          you will get have advantages of getting monitors, referees, mentors and other benefits.
        </div>
        <div class="row-fluid">
          <?php
          echo $this->renderPartial('_goal_list_row_big', array(
           'goalListItem' => $goalListItem,
           'count' => 0));
          ?>
        </div>
        <br>
        <div class=" row-fluid">
          <div class=" row-fluid gb-bottom-border-grey-3">
            <h4 class="pull-left">Goal Management</h4>
            <ul id="gb-goal-management-nav" class="gb-nav-1 pull-right">
              <li class="active"><a href="#goal-activity-tab-pane" data-toggle="tab">Activity</a></li>
              <li class=""><a href="#goal-summary-pane" data-toggle="tab">Summary</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active row-fluid" id="goal-activity-tab-pane">
              <ul id="gb-goal-activity-nav" class="gb-side-nav-1 gb-goal-leftbar">
                <li class=""><a href="#gb-goal-activity-all-pane" data-toggle="tab">All<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class="active"><a href="#gb-goal-activity-todos-pane" data-toggle="tab">To Dos<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-discussion-pane" data-toggle="tab">Discussion<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-files-pane" data-toggle="tab">Files<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-web-links-pane" data-toggle="tab">Web Links<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-calendar-pane" data-toggle="tab">Calendar<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-message-pane" data-toggle="tab">Message<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-goal-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
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
                  <h3>Web Links <a id="gb-weblink-modal-trigger" goal-id="<?php //echo $goalCommitment->id;   ?> " class="pull-right">New Web Link</a></h3>
                  <?php //foreach ($goalWebLinks as $goalWebLink): ?>
                  <div id="gb-goal-management-web-links">
                    <?php
                    // echo $this->renderPartial('_web_link_row', array(
                    //"goalWebLink" => $goalWebLink,
                    // ));
                    ?>
                  </div>
                  <?php //endforeach; ?>
                </div>
                <div class="tab-pane" id="gb-goal-activity-calendar-pane">
                </div>
                <div class="tab-pane" id="gb-goal-activity-message-pane">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="goal-summary-pane">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent(); ?>