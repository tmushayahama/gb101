<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  //var addSkillListUrl = "<?php echo Yii::app()->createUrl("skill/skill/skillhome/addskilllist/connectionId/1"); ?>";
  var addSkillListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => 1, 'source' => "skill")); ?>";
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
      <div class="gb-skill-management-container span9">
        <div class="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Note!</strong> You have not yet committed this skill. If you commit,
          you will get have advantages of getting monitors, referees, mentors and other benefits.
        </div>
        <div class="row-fluid">
          <?php
          echo $this->renderPartial('_skill_list_row_big', array(
           'skillListItem' => $skillListItem,
           'count' => 0));
          ?>
        </div>
        <br>
        <div class=" row-fluid">
          <div class=" row-fluid gb-bottom-border-grey-3">
            <h4 class="pull-left">Skill Management</h4>
            <ul id="gb-skill-management-nav" class="gb-nav-1 pull-right">
              <li class="active"><a href="#skill-activity-tab-pane" data-toggle="tab">Activity</a></li>
              <li class=""><a href="#skill-summary-pane" data-toggle="tab">Summary</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active row-fluid" id="skill-activity-tab-pane">
              <ul id="gb-skill-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
                <li class=""><a href="#gb-skill-activity-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
                <li class="active"><a href="#gb-skill-activity-todos-pane" data-toggle="tab">To Dos<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-discussion-pane" data-toggle="tab">Discussion<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-files-pane" data-toggle="tab">Files<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-web-links-pane" data-toggle="tab">Web Links<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-calendar-pane" data-toggle="tab">Calendar<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-message-pane" data-toggle="tab">Message<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="icon-chevron-right pull-right"></i></a></li>
              </ul>
              <div id="gb-skill-activity-content" class="tab-content">
                <div class="tab-pane " id="gb-skill-activity-all-pane">
                  <h3>All</h3>
                </div>
                <div class="tab-pane active " id="gb-skill-activity-todos-pane">
                  <h3>To Dos <a class="pull-right">Add New Todo</a></h3>
                  <br>
                  <h4><a><i>To Do Heading</i></a></h4>
                  <div class="gb-skill-management-todos">
                    <?php foreach ($skillTodos as $skillTodo): ?>
                      <div class="gb-skill-management-todo">
                        <input class="pull-left" type="checkbox"><a class="offset1"><?php echo $skillTodo->todo->todo ?></a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="tab-pane" id="gb-skill-activity-discussion-pane">
                  <h3>Skill Discussion <a class="pull-right">Add New Discussion</a></h3>

                </div>
                <div class="tab-pane" id="gb-skill-activity-web-links-pane">
                  <h3>Web Links <a id="gb-add-weblink-modal-trigger" skill-id="<?php //echo $skillCommitment->id;   ?> " class="pull-right">New Web Link</a></h3>
                  <?php //foreach ($skillWebLinks as $skillWebLink): ?>
                  <div id="gb-skill-management-web-links">
                    <?php
                    // echo $this->renderPartial('_web_link_row', array(
                    //"skillWebLink" => $skillWebLink,
                    // ));
                    ?>
                  </div>
                  <?php //endforeach; ?>
                </div>
                <div class="tab-pane" id="gb-skill-activity-calendar-pane">
                </div>
                <div class="tab-pane" id="gb-skill-activity-message-pane">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="skill-summary-pane">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent(); ?>