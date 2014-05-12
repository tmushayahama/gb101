<?php $this->beginContent('//layouts/gb_main1'); ?>
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
  var addGoalWebLinkUrl = "<?php echo Yii::app()->createUrl("site/addGoalWebLink", array('skillId' => $skillListItem->goal_id)); ?>";
</script>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h4 class="pull-left">Skill Management</h4>
    <ul id="gb-skill-management-nav" class="gb-nav-1 pull-right">
      <li class="active"><a href="#skill-activity-tab-pane" data-toggle="tab">Activity</a></li>
      <li class=""><a href="#skill-mentorship-pane" data-toggle="tab">Mentorships</a></li>
      <li class=""><a href="#skill-monitor-pane" data-toggle="tab">Monitors</a></li>
      <li class=""><a href="#skill-referee-pane" data-toggle="tab">Referees</a></li>
    </ul>
  </div>
</div>
<div class="container">
  <br>
  <div class="row">
    <div class="gb-skill-management-container col-lg-9 col-sm-12 col-xs-12">
      <div class="row">
        <?php
        echo $this->renderPartial('_skill_list_post_row', array(
         "skillListItem" => $skillListItem,
         'connection_name' => 'All'//$post->connection->name
        ));
        ?>
      </div>
      <br>
      <div class="tab-content gb-blue-background">
        <div class="tab-pane active row" id="skill-activity-tab-pane">
          <ul id="gb-skill-activity-nav" class="gb-side-nav-1 gb-skill-leftbar gb-no-padding col-lg-4 col-sm-4 col-xs-12">
            <li class=""><a href="#gb-skill-activity-all-pane" data-toggle="tab">All<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class="active"><a href="#gb-skill-activity-discussion-pane" data-toggle="tab">Discussion<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-todos-pane" data-toggle="tab">To Dos<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-files-pane" data-toggle="tab">Files<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-web-links-pane" data-toggle="tab">Web Links<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-calendar-pane" data-toggle="tab">Calendar<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-message-pane" data-toggle="tab">Message<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          </ul>
          <div class="col-lg-8 col-sm-8 col-xs-12 tab-content">
            <br>
            <div class="tab-pane " id="gb-skill-activity-all-pane">
              <h4>All</h4>
            </div>
            <div class="tab-pane" id="gb-skill-activity-todos-pane">
              <h4>To Dos <a class="pull-right">Add New Todo</a></h4>
              <br>
              <h5><a><i>To Do Heading</i></a></h5>
              <div class="gb-skill-management-todos">
                <?php foreach ($skillTodos as $skillTodo): ?>
                  <div class="gb-skill-management-todo">
                    <input class="pull-left" type="checkbox"><a class="offset1"><?php echo $skillTodo->todo->todo ?></a>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="tab-pane active" id="gb-skill-activity-discussion-pane">
              <h4 class="pull-left">Skill Discussion</h4> <a class="pull-right btn btn-xs btn-default gb-discussion-input-toggle-btn"><i class="glyphicon glyphicon-plus"></i> Add New</a>
              <br>
              <div class="row gb-discussion-input gb-hide">
                <?php
                echo $this->renderPartial('discussion.views.discussion._discussion_input', array(
                 'discussionModel' => $discussionModel,
                 "discussionTitleModel" => $discussionTitleModel
                ));
                ?>
              </div>
              <div id="gb-discussions" class="row">
                <?php foreach (DiscussionTitle::getDiscussionTitle($skillListItem->goal_id, 5) as $discussionTitle): ?>
                  <?php
                  echo $this->renderPartial('discussion.views.discussion._discussion', array(
                   'discussionTitle' => $discussionTitle));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="tab-pane" id="gb-skill-activity-web-links-pane">
              <h4 class="pull-left">Web Links</h4><a class="pull-right btn btn-xs btn-default gb-add-weblink-toggle-btn"><i class="glyphicon glyphicon-plus"></i> Add New</a>

              <div class="row gb-weblinks-input gb-hide">
                <?php
                echo $this->renderPartial('_add_weblink_form', array(
                 'skillWebLinkModel' => $skillWebLinkModel))
                ?>
              </div>
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
<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent(); ?>