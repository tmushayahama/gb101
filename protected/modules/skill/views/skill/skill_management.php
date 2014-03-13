<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_skill_management.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var addNewDiscussionUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/addNewDiscussionPost", array('goalId' => $skillListItem->goal_id)); ?>";
  var getDiscussionPostsUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array('goalId' => $skillListItem->goal_id)); ?>";
  var discussionReplyUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/discussionReply", array('goalId' => $skillListItem->goal_id)); ?>";
  var addGoalWebLinkUrl = "<?php echo Yii::app()->createUrl("site/addGoalWebLink"); ?>";
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
        <div class="row-fluid">

          <?php
          echo $this->renderPartial('_skill_list_post_row', array(
           "skillListItem" => $skillListItem,
           'connection_name' => 'All'//$post->connection->name
          ));
          ?>
        </div>
        <br>
        <div class=" row-fluid">
          <div class=" row-fluid gb-bottom-border-grey-3">
            <h4 class="pull-left">Skill Management</h4>
            <ul id="gb-skill-management-nav" class="gb-nav-1 pull-right">
              <li class="active"><a href="#skill-activity-tab-pane" data-toggle="tab">Activity</a></li>
              <li class=""><a href="#skill-mentorship-pane" data-toggle="tab">Mentorships</a></li>
              <li class=""><a href="#skill-monitor-pane" data-toggle="tab">Monitors</a></li>
              <li class=""><a href="#skill-referee-pane" data-toggle="tab">Referees</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active row-fluid" id="skill-activity-tab-pane">
              <ul id="gb-skill-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
                <li class=""><a href="#gb-skill-activity-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
                <li class="active"><a href="#gb-skill-activity-discussion-pane" data-toggle="tab">Discussion<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-todos-pane" data-toggle="tab">To Dos<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-files-pane" data-toggle="tab">Files<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-web-links-pane" data-toggle="tab">Web Links<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-calendar-pane" data-toggle="tab">Calendar<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-message-pane" data-toggle="tab">Message<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="icon-chevron-right pull-right"></i></a></li>
              </ul>
              <div class="gb-skill-activity-content tab-content">
                <div class="tab-pane " id="gb-skill-activity-all-pane">
                  <h3>All</h3>
                </div>
                <div class="tab-pane" id="gb-skill-activity-todos-pane">
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
                <div class="tab-pane active" id="gb-skill-activity-discussion-pane">
                  <h3>Skill Discussion <a class="pull-right gb-discussion-input-toggle-btn">Add New Discussion</a></h3>
                  <div class="row-fluid gb-discussion-input hide">
                    <?php
                    echo $this->renderPartial('discussion.views.discussion._discussion_input', array(
                     'discussionModel' => $discussionModel,
                     "discussionTitleModel" => $discussionTitleModel
                    ));
                    ?>
                  </div>
                  <div id="gb-discussions" class="row-fluid">
                    <?php foreach (DiscussionTitle::getDiscussionTitle($skillListItem->goal_id, 5) as $discussionTitle): ?>
                      <?php
                      echo $this->renderPartial('discussion.views.discussion._discussion', array(
                       'discussionTitle' => $discussionTitle));
                      ?>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="tab-pane" id="gb-skill-activity-web-links-pane">
                  <h3>Web Links <a id="gb-add-weblink-modal-trigger" skill-id="<?php echo $skillListItem->goal_id; ?> " class="pull-right">New Web Link</a></h3>

                  <div id="gb-skill-management-web-links" class="">   
                    <?php foreach ($skillWebLinks as $skillWebLink): ?>
                      <?php
                      echo $this->renderPartial('_web_link_row', array(
                       "skillWebLink" => $skillWebLink,
                      ));
                      ?>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="tab-pane" id="gb-skill-activity-calendar-pane">
                </div>
                <div class="tab-pane" id="gb-skill-activity-message-pane">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="skill-monitor-pane">
          
            </div>
            <div class="tab-pane" id="skill-mentorship-pane">
         
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
   'skillWebLinkModel' => $skillWebLinkModel))
  ?>
</div>
<?php $this->endContent(); ?>