<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_mentorship_detail.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var editMentorshipDetailsUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/editMentorshipDetails", array("mentorshipId" => $goalMentorship->id)); ?>";
  var acceptMentorshipEnrollmentUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/acceptMentorshipEnrollment", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipTimelineItemUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipTimelineItem", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipAnswerUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnswer", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipAnnouncementUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnnouncement", array("mentorshipId" => $goalMentorship->id)); ?>";
  var postMentorshipDiscussionTitleUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/postMentorshipDiscussionTitle", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipTodoUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipTodo", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipWebLinkUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipWebLink", array("mentorshipId" => $goalMentorship->id)); ?>";
  var getDiscussionPostsUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array()); ?>";
  var discussionReplyUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/discussionReply", array()); ?>";
  // $("#gb-topbar-heading-title").text("Skills");
</script>
<div class="container-fluid gb-white-background">
  <div class="container">
    <br>
    <div class="mentorship-info-container row" mentorship-id="<?php echo $goalMentorship->id; ?>">
      <div class="col-lg-2 col-sm-2 col-xs-12">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
      </div>
      <div class="panel panel-default gb-no-padding col-lg-10 col-sm-10 col-xs-12">
        <div class="panel-heading">
          <h4 class="gb-mentorship-title"><?php echo $goalMentorship->title; ?></h4>
        </div>
        <div class="panel-body gb-padding-medium">
          <p class=""><strong>Skill: </strong><a><?php echo $goalMentorship->goal->title; ?></a></p>
          <p class="gb-mentorship-description"> 
            <?php echo $goalMentorship->description ?> 
          </p>

        </div>
        <div class="panel-footer">
          <div class="row">
            <h5 class="pull-left">Mentor: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $goalMentorship->owner_id)); ?>"> <?php echo $goalMentorship->owner->profile->firstname . " " . $goalMentorship->owner->profile->lastname ?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h2 class="pull-left">Mentorship</h2>
    <ul id="gb-skill-management-nav" class="gb-nav-1 pull-right">
      <li class="active"><a href="#goal-mentorship-all-pane" data-toggle="tab">Welcome</a></li>
      <li class=""><a href="#goal-mentorship-timeline-pane" data-toggle="tab">Timeline</a></li>
      <li class=""><a href="#goal-mentorship-activities-pane" data-toggle="tab">Activities</a></li>
    </ul>
  </div>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-blue-background gb-no-padding">
      <div class="row">
        <div class="tab-content">
          <div class="tab-pane active" id="goal-mentorship-all-pane">
            <div class="gb-home-left-nav col-lg-3 col-sm-3 col-xs-12 gb-no-padding">
              <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p><i>Other activities you have done </i></p>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  Advice Pages
                </div>
                <div class="panel-body gb-no-padding">
                  <?php foreach ($advicePages as $advicePage): ?>
                    <div class="row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
                      <p class="gb-ellipsis">
                        <a href="<?php echo Yii::app()->createUrl('pages/pages/goalPageDetail', array('pageId' => $advicePage->id)); ?>"><?php echo $advicePage->title; ?></a><br>
                      </p>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  Other Mentorships
                </div>
                <div class="panel-body gb-no-padding">
                  <?php foreach ($otherMentorships as $otherMentorship): ?>
                    <div class="row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
                      <p class="gb-ellipsis">
                        <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $otherMentorship->id)); ?>"><?php echo $otherMentorship->title; ?></a><br>
                      </p>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="col-lg-9 col-sm-12 col-xs-12 gb-padding-thin gb-blue-left-border gb-white-background">
              <div class="row">
                <?php foreach (Question::getQuestions(Question::$TYPE_FOR_MENTOR) as $question): ?>
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12"
                       question-id="<?php echo $question->id; ?>">
                    <div class="panel-heading">
                      <h4><?php echo $question->question; ?></h4>
                    </div>
                    <div class="panel-body gb-padding-thin">
                      <?php
                      $answers = MentorshipQuestion::getAnswers($goalMentorship->id, $question->id, true);
                      if (count($answers) == 0):
                        ?>
                        <div class="alert alert-block row">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>no information added. </strong>
                        </div>
                      <?php endif; ?>
                      <ul class="<?php echo 'gb-answer-list-' . $question->id; ?> nav nav-stacked">
                        <?php foreach ($answers as $answer): ?>
                          <?php
                          echo $this->renderPartial('mentorship.views.mentorship._answer_list_item', array("answer" => $answer));
                          ?>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="goal-mentorship-timeline-pane">
            <div class="row">
              <div class="panel panel-default row">
                <div class="panel-heading">
                  <h4 class="">Timeline<span class="pull-right"><a class="gb-form-show btn btn-xs btn-default"><i class="glyphicon glyphicon-plus"></i> Add</a></span></h4>
                </div>
                <div class="panel-body row gb-padding-thin">
                  <br>
                  <div class="row">
                    <h5 class="col-lg-6 col-sm-6 col-xs-6">Expected Timeline</h5>
                    <h5 class="col-lg-6 col-sm-6 col-xs-6 text-right">Activity Timeline</h5>
                  </div>
                  <br>
                  <div id="gb-timeline" class="row">
                    <?php
                    $this->renderPartial('mentorship.views.mentorship._mentorship_timeline_item_row', array(
                     "mentorshipTimeline" => $mentorshipTimeline,
                    ));
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="goal-mentorship-activities-pane">
            <div class="tab-pane row-fluid" id="skill-activity-tab-pane">
              <ul id="gb-skill-activity-nav" class="gb-side-nav-1 col-lg-3 col-sm-12 col-xs-12">
                <li class="active"><a href="#gb-skill-activity-announcement-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Announcements</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-todos-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">To Dos</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-discussion-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Discussion</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-web-links-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Web Links</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-files-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Files</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              </ul>
              <div class="col-lg-9 col-sm-12 col-xs-12 tab-content gb-blue-left-border gb-white-background">
                <div class="tab-pane active" id="gb-skill-activity-announcement-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">Announcements<span class="pull-right"><a class="gb-form-show btn btn-xs btn-default"><i class="glyphicon glyphicon-plus"></i> Add</a></span></h4>
                    </div>
                    <div class="panel-body gb-padding-thin">
                      <div class="gb-announcement-form gb-panel-form gb-hide col-lg-12 col-sm-12 col-xs-12 gb-padding-thin">
                        <div class="form-group row">
                          <input type="text" class="gb-announcement-title input-sm col-lg-12 col-sm-12 col-xs-12" placeholder ="Subskill Title">
                        </div>
                        <div class="form-group row">
                          <textarea class="gb-announcement-description input-sm col-lg-12 col-sm-12 col-xs-12" placeholder="Skill Description max 140 characters" rows= 2></textarea>
                        </div>
                        <div class="form-group row">
                          <a class="gb-add-announcement-btn btn btn-success">Add</a>
                          <a class="gb-add-announcement-cancel-btn btn btn-default">Cancel</a>
                        </div>
                      </div>
                      <?php
                      $announcements = MentorshipAnnouncement::getMentorshipAnnouncements($goalMentorship->id, true);
                      if (count($announcements) == 0):
                        ?>
                        <div class="alert ">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>You haven't added any announcements.</strong>
                          <a class="gb-form-show">Start Adding </a>
                        </div>
                      <?php endif; ?>
                      <ul class="gb-announcement-list nav nav-stacked">
                        <?php foreach ($announcements as $announcement): ?>
                          <?php
                          $this->renderPartial('mentorship.views.mentorship._announcement_list_item', array("mentorshipAnnouncement" => $announcement));
                          ?>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="gb-skill-activity-todos-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">To Dos<span class="pull-right"><a class="gb-form-show btn btn-xs btn-default"><i class="glyphicon glyphicon-plus"></i> Add</a></span></h4>
                    </div>
                    <div class="panel-body gb-padding-thin">
                      <?php
                      $this->renderPartial('mentorship.views.mentorship.forms._mentorship_todo', array(
                       "todoModel" => $todoModel
                      ));
                      ?>
                      <?php
                      $mentorshipTodos = MentorshipTodo::getMentorshipTodos($goalMentorship->id, true);
                      if (count($mentorshipTodos) == 0):
                        ?>
                        <div class="alert">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>You haven't added any todos.</strong>
                          <a class="gb-form-show">Start Adding </a>
                        </div>
                      <?php endif; ?>
                      <div class="gb-mentorship-todo-list">
                        <?php foreach ($mentorshipTodos as $mentorshipTodo): ?>
                          <?php
                          $this->renderPartial('mentorship.views.mentorship._mentorship_todo_list_item'
                            , array("mentorshipTodo" => $mentorshipTodo)
                          );
                          ?>
                        <?php endforeach; ?>    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="gb-skill-activity-discussion-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">Discussion<span class="pull-right"><a class="gb-form-show btn btn-xs btn-default"><i class="glyphicon glyphicon-plus"></i> Post</a></span></h4>
                    </div>
                    <div class="panel-body gb-padding-thin">
                      <?php
                      echo $this->renderPartial('discussion.views.discussion.forms._discussion', array(
                       "discussionTitleModel" => $discussionTitleModel
                      ));
                      ?>
                      <div class="gb-mentorship-discussion-title-list row">
                        <?php foreach (MentorshipDiscussionTitle::getDiscussionTitles($goalMentorship->id, 5) as $mentorshipDiscussionTitle): ?>
                          <?php
                          $this->renderPartial('discussion.views.discussion._discussion', array(
                           'discussionTitle' => $mentorshipDiscussionTitle->discussionTitle));
                          ?>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="gb-skill-activity-web-links-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">External Links<span class="pull-right"><a class="gb-form-show btn btn-xs btn-default"><i class="glyphicon glyphicon-plus"></i> Add</a></span></h4>
                    </div>
                    <div class="panel-body gb-padding-thin">
                      <?php
                      echo $this->renderPartial('application.views.weblink.forms._web_link_form', array(
                       'webLinkModel' => $webLinkModel
                      ));
                      ?>
                      <div class="gb-mentorship-web-link-list row">
                        <?php foreach (MentorshipWebLink::getMentorshipWebLinks($goalMentorship->id, true) as $mentorshipWebLink): ?>
                          <?php
                          echo $this->renderPartial('application.views.weblink._web_link_list_item', array(
                           'webLink' => $mentorshipWebLink->webLink));
                          ?>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="gb-skill-activity-files-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">Files<span class="pull-right"><a class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a></span></h4>
                    </div>
                    <div class="panel-body">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="" class="col-lg-3 col-sm-12 col-xs-12">

    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('skill.views.skill.modals.skill_bank_list', array("skillListBank" => $skillListBank));
?>
<?php $this->endContent() ?>