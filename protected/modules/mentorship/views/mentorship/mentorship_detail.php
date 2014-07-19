<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_mentorship_detail.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
?>
<script type="text/javascript">
  var acceptMentorshipEnrollmentUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/acceptMentorshipEnrollment", array("mentorshipId" => $mentorship->id)); ?>";
  var postMentorshipDiscussionTitleUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/postMentorshipDiscussionTitle", array("mentorshipId" => $mentorship->id)); ?>";
  var getDiscussionPostsUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array()); ?>";
  var discussionReplyUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/discussionReply", array()); ?>";
</script>
<div class="container-fluid gb-heading-bar-1">
  <br>
  <div class="container">
    <div class="mentorship-info-container row" mentorship-id="<?php echo $mentorship->id; ?>">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
        <div class="row gb-people-heading-row">
          <div class="gb-img-container">
            <img href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->owner_id)); ?>" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->owner->profile->avatar_url; ?>" class="" alt="">
            <h5 class="gb-img-name">Owner: <br>
              <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->owner_id)); ?>"> <?php echo $mentorship->owner->profile->firstname . " " . $mentorship->owner->profile->lastname ?></a>
            </h5>
          </div>
          <div class="gb-img-container">
            <?php if ($mentorship->mentor_id == null): ?>
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/gb_unknown_profile.png"; ?>" class="" alt="">
              <h5 class="gb-img-name">No Mentor: <br>
                <a class="gb-send-request-modal-trigger" gb-source-id="<?php echo $mentorship->id; ?>" 
                   gb-type="<?php echo Notification::$NOTIFICATION_MENTOR_REQUEST_OWNER; ?>" gb-status="<?php echo Notification::$STATUS_PENDING; ?>">
                  Request Mentor
                </a>
              </h5>
            <?php else: ?>
              <img href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->mentor_id)); ?>" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->mentor->profile->avatar_url; ?>" class="" alt="">
              <h5 class="gb-img-name">Mentor: <br>
                <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->mentor_id)); ?>"> <?php echo $mentorship->mentor->profile->firstname . " " . $mentorship->mentor->profile->lastname ?></a>
              </h5>
            <?php endif; ?>
          </div>
          <div class="gb-img-container">
            <?php if ($mentorship->mentee_id == null): ?>
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/gb_unknown_profile.png"; ?>" class="" alt="">
              <h5 class="gb-img-name">No Mentee: <br>
                <a class="gb-send-request-modal-trigger" gb-source-id="<?php echo $mentorship->id; ?>" 
                   gb-type="<?php echo Notification::$NOTIFICATION_MENTEE_REQUEST_OWNER; ?>" gb-status="<?php echo Notification::$STATUS_PENDING; ?>">
                  Request Mentee
                </a>
              </h5>
            <?php else: ?>
              <img href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->mentee_id)); ?>" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->mentee->profile->avatar_url; ?>" class="" alt="">
              <h5 class="gb-img-name">Mentee: <br>
                <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->mentee_id)); ?>"> <?php echo $mentorship->mentee->profile->firstname . " " . $mentorship->mentee->profile->lastname ?></a>
              </h5>
            <?php endif; ?>
          </div>
          <?php
          if ($mentorshipMonitors):
            foreach ($mentorshipMonitors as $mentorshipMonitor):
              ?>
              <div class="gb-img-container">
                <img href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipMonitor->monitor_id)); ?>" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipMonitor->monitor->profile->avatar_url; ?>" class="" alt="">
                <h5 class="gb-img-name">Monitor: <br>
                  <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipMonitor->monitor_id)); ?>"> <?php echo $mentorshipMonitor->monitor->profile->firstname . " " . $mentorshipMonitor->monitor->profile->lastname ?></a>
                </h5>
              </div>
              <?php
            endforeach;
          else:
            ?>
            <div class="gb-img-container">
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/gb_observer.png"; ?>" class="" alt="">
              <h5 class="gb-img-name">No Monitor(s): <br>
                <a>Get Observer(s)</a>
              </h5>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="container">
    <div class="gb-top-heading row">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_5.png" alt="">
      <h2 class="">Mentorship</h2>
    </div>
  </div>
  <div class="gb-nav-bar-1-contaner row">
    <div class="container">
      <ul id="" class="gb-nav-1">
        <li class="active"><a href="#goal-mentorship-all-pane" data-toggle="tab">Welcome</a></li>
        <li class=""><a href="#goal-mentorship-timeline-pane" data-toggle="tab">Timeline</a></li>
        <li class=""><a href="#goal-mentorship-activities-pane" data-toggle="tab">Activities</a></li>
        <li class=""><a href="#goal-mentorship-reports-pane" data-toggle="tab">Feedback & Reports</a></li>
        <li class="gb-disabled-1"><a href="#goal-mentorship-settings-pane" data-toggle="tab">Settings</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container gb-background-light-grey-1">
  <div class="tab-content gb-full">
    <div class="tab-pane active gb-full" id="goal-mentorship-all-pane">
      <div class="gb-full gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>
        <?php
        echo $this->renderPartial('mentorship.views.mentorship.management._summary_sidebar', array(
         "mentorship" => $mentorship,
         "advicePages" => $advicePages,
         "otherMentorships" => $otherMentorships));
        ?>
      </div>
      <div class="gb-full col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding gb-background-light-grey-1 ">
        <br>
        <div class="row">
          <?php foreach (Question::getQuestions(Question::$TYPE_FOR_MENTOR) as $question): ?>
            <div class="panel panel-default gb-no-padding gb-background-light-grey-1 gb-side-margin-thick"
                 question-id="<?php echo $question->id; ?>">
              <h3 class="gb-heading-2"><?php echo $question->question; ?>

              </h3>
              <br>
              <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                        gb-form-slide-target="<?php echo '#gb-answer-form-' . $question->id; ?>"
                        gb-form-target="#gb-answer-question-form"
                        gb-nested="1"
                        gb-nested-submit-prepend-to="<?php echo '#gb-mentorship-answers-' . $question->id; ?>"
                        gb-add-url="<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnswer", array("mentorshipId" => $mentorship->id, "questionId" => $question->id)); ?>">
                Add <?php echo strtolower($question->question); ?>
              </textarea>
              <div class="panel-body gb-no-padding gb-background-light-grey-1">
                <div id="<?php echo 'gb-answer-form-' . $question->id; ?>" class="gb-answer-form gb-panel-form gb-hide col-lg-12 col-sm-12 col-xs-12 gb-padding-thin">
                  <!-- Hidden form will come here -->
                </div>
                <br>
                <div id="<?php echo 'gb-mentorship-answers-' . $question->id; ?>" class="row">
                  <?php
                  $answers = MentorshipAnswer::getAnswers($mentorship->id, $question->id, true);
                  if (count($answers) == 0):
                    ?>
                    <h5 class="text-center text-warning gb-no-information row">
                      no information added.
                    </h5>
                  <?php endif; ?>
                  <?php foreach ($answers as $answer): ?>
                    <?php
                    echo $this->renderPartial('mentorship.views.mentorship._answer_list_item', array("answer" => $answer));
                    ?>
                  <?php endforeach; ?>
                </div>
                <br>
              </div>
            </div>
          <?php endforeach; ?>
          <br>
        </div>
      </div>
    </div>
    <div class="tab-pane gb-full gb-background-light-grey-1" id="goal-mentorship-timeline-pane">
      <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
        <br>
        <h3 class="gb-heading-2">Timeline
        </h3>
        <div class="panel-body row gb-no-padding gb-background-light-grey-1">
          <br>
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-6 gb-no-padding">
              <h5 class="gb-heading-2">Expected Timeline

              </h5>
              <br>
              <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                        gb-form-slide-target="#gb-mentorship-timeline-form-container"
                        gb-form-target="#gb-mentorship-timeline-form">
                Add activity to timeline
              </textarea>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6 gb-no-padding">
              <h5 class="gb-heading-2">Actual Timeline</h5>
              <br>
            </div>  
          </div>
          <div id="gb-mentorship-timeline-form-container" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 gb-panel-form gb-hide">
            <?php
            echo $this->renderPartial('mentorship.views.mentorship.forms._add_mentorship_timeline_item_form', array(
             "mentorshipTimelineModel" => $mentorshipTimelineModel,
             "timelineModel" => $timelineModel,
             "mentorshipId" => $mentorship->id,
            ));
            ?>
          </div>
          <br>
          <?php
          $this->renderPartial('mentorship.views.mentorship._mentorship_timeline_item_row', array(
           "mentorshipTimeline" => $mentorshipTimeline,
          ));
          ?>
        </div>
      </div>
    </div>
    <div class="tab-pane gb-full" id="goal-mentorship-activities-pane">
      <div class="gb-full gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>
        <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <li class="active"><a href="#gb-skill-activity-announcement-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Announcements</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-skill-activity-todos-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">To Dos</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-skill-activity-discussion-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Discussion</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-skill-activity-ask-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Ask & Answer</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-skill-activity-weblinks-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">External Links</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class="gb-disabled-1"><a href="#gb-skill-activity-files-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Files</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        </ul>
      </div>
      <div class="gb-full tab-content col-lg-8 col-md-4 col-sm-8 col-xs-12 gb-background-light-grey-1 gb-no-padding">
        <br>
        <div class="tab-pane active gb-full" id="gb-skill-activity-announcement-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
            <h3 class="gb-heading-2">Announcements

            </h3>
            <br>
            <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                      gb-form-slide-target="#gb-mentorship-announcement-form-container"
                      gb-form-target="#gb-mentorship-announcement-form">
              Add an announcement
            </textarea>
            <div class="panel-body gb-background-light-grey-1">
              <div id="gb-mentorship-announcement-form-container" class="row gb-panel-form gb-hide">
                <?php
                $this->renderPartial('mentorship.views.mentorship.forms._mentorship_announcement_form', array(
                 "announcementModel" => $announcementModel,
                 "mentorshipId" => $mentorship->id,
                ));
                ?>
              </div>
              <br>
              <div id="gb-announcements">
                <?php
                $announcements = MentorshipAnnouncement::getMentorshipAnnouncements($mentorship->id, true);
                if (count($announcements) == 0):
                  ?>
                  <h5 class="text-center text-warning gb-no-information row">
                    no announcement(s) added.
                  </h5>
                <?php endif; ?>
                <?php foreach ($announcements as $announcement): ?>
                  <?php
                  $this->renderPartial('mentorship.views.mentorship._announcement_list_item', array("mentorshipAnnouncement" => $announcement));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane gb-full" id="gb-skill-activity-todos-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
            <h3 class="gb-heading-2">Todos

            </h3>
            <br>
            <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                      gb-form-slide-target="#gb-mentorship-todo-form-container"
                      gb-form-target="#gb-mentorship-todo-form">
              Add a todo
            </textarea>
            <div class="panel-body gb-background-light-grey-1">
              <div id="gb-mentorship-todo-form-container" class="row gb-panel-form gb-hide">
                <?php
                $this->renderPartial('mentorship.views.mentorship.forms._mentorship_todo_form', array(
                 "todoModel" => $todoModel,
                 "mentorshipTodoPriorities" => $mentorshipTodoPriorities,
                 "mentorshipId" => $mentorship->id,
                ));
                ?>
              </div>
              <br>  
              <div id="gb-todos">
                <?php
                $mentorshipTodos = MentorshipTodo::getMentorshipTodos($mentorship->id, true);
                if (count($mentorshipTodos) == 0):
                  ?>
                  <h5 class="text-center text-warning gb-no-information row">
                    no todo(s) added.
                  </h5>
                <?php endif; ?>

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
        <div class="tab-pane gb-full" id="gb-skill-activity-discussion-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
            <h3 class="gb-heading-2">Discussion</h3>
            <br>
            <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                      gb-form-slide-target="#gb-mentorship-discussion-title-form-container"
                      gb-form-target="#gb-mentorship-discussion-title-form">
              Add a discussion
            </textarea>
            <div class="panel-body gb-no-padding gb-background-light-grey-1">
              <div id="gb-mentorship-discussion-title-form-container" class="row gb-panel-form gb-hide">
                <?php
                echo $this->renderPartial('mentorship.views.mentorship.forms._mentorship_discussion_title_form', array(
                 "discussionTitleModel" => $discussionTitleModel,
                 "mentorshipId" => $mentorship->id,
                ));
                ?>
              </div>
              <br>
              <?php $mentorshipDiscussionTitles = MentorshipDiscussionTitle::getDiscussionTitles($mentorship->id, 5); ?>
              <div id="gb-discussion-titles"  class="row">
                <?php if (count($mentorshipDiscussionTitles) == 0): ?>
                  <h5 class="text-center text-warning gb-no-information row">
                    no discussion(s) added.
                  </h5>
                <?php endif; ?>
                <?php foreach ($mentorshipDiscussionTitles as $mentorshipDiscussionTitle): ?>
                  <?php
                  $this->renderPartial('discussion.views.discussion._discussion_title', array(
                   'discussionTitle' => $mentorshipDiscussionTitle->discussionTitle,
                   "mentorshipId" => $mentorship->id));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane gb-full" id="gb-skill-activity-ask-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
            <h3 class="gb-heading-2">Ask & Answer</h3>
            <br>
            <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                      gb-form-slide-target="#gb-ask-question-form-container"
                      gb-form-target="#gb-ask-question-form">
              Add a question
            </textarea>
            <div class="row">
              <div id="gb-ask-question-form-container" class="row gb-panel-form gb-hide">
                <?php
                $this->renderPartial('mentorship.views.mentorship.forms._mentorship_ask_question_form', array(
                 'formType' => GoalType::$FORM_TYPE_MENTORSHIP_MENTORSHIP,
                 "questionModel" => $questionModel,
                 'mentorshipId' => $mentorship->id
                ));
                ?>
              </div>
              <br>
              <?php $mentorshipQuestions = MentorshipQuestion::getMentorshipQuestions($mentorship->id); ?>
              <div id="gb-questions" class="row">
                <?php if (count($mentorshipQuestions) == 0): ?>
                  <h5 class="text-center text-warning gb-no-information row">
                    no question(s) added.
                  </h5>
                <?php endif; ?>
                <?php foreach ($mentorshipQuestions as $mentorshipQuestion): ?>
                  <?php
                  $this->renderPartial('mentorship.views.mentorship._mentorship_ask_question_list_item', array(
                   'mentorshipQuestion' => $mentorshipQuestion,
                   'mentorshipId' => $mentorship->id,
                  ));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane gb-full" id="gb-skill-activity-weblinks-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
            <h3 class="gb-heading-2">External Links</h3>
            <br>
            <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                      gb-form-slide-target="#gb-mentorship-weblink-form-container"
                      gb-form-target="#gb-mentorship-weblink-form">
              Add an external link i.e website link, portfolio link
            </textarea>
            <div class="panel-body gb-padding-thin">
              <div id="gb-mentorship-weblink-form-container" class="row gb-panel-form gb-hide">
                <?php
                echo $this->renderPartial('mentorship.views.mentorship.forms._mentorship_weblink_form', array(
                 'weblinkModel' => $weblinkModel,
                 "mentorshipId" => $mentorship->id,
                ));
                ?>
              </div>
              <br>
              <?php $mentorshipWeblinks = MentorshipWeblink::getMentorshipWeblinks($mentorship->id, true); ?>
              <div id="gb-weblinks" class="row">
                <?php if (count($mentorshipWeblinks) == 0): ?>
                  <h5 class="text-center text-warning gb-no-information row">
                    no external link(s) added.
                  </h5>
                <?php endif; ?>
                <?php foreach ($mentorshipWeblinks as $mentorshipWeblink): ?>
                  <?php
                  echo $this->renderPartial('mentorship.views.mentorship._mentorship_weblink_list_item', array(
                   'mentorshipWeblinkModel' => $mentorshipWeblink));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane gb-full" id="gb-skill-activity-files-pane">
          <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
            <div class="panel-heading">
              <h4 class="">Files<span class="pull-right"><a class="btn btn-xs btn-default"><i class="glyphicon glyphicon-plus"></i> Add</a></span></h4>
            </div>
            <div class="panel-body">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane gb-full" id="goal-mentorship-reports-pane">
      <div class="gb-full gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>
        <ul id="gb-setting-activity-nav" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <li class="active"><a href="#gb-reports-feedback-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Feedback</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-reports-evaluation-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Evaluation</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        </ul>
      </div>
      <div class="gb-full tab-content col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-background-light-grey-1 gb-no-padding">
        <br>

        <div class="tab-pane active gb-full" id="gb-reports-feedback-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
            <h3 class="gb-heading-2">Feedback</h3>
            <br>
            <div class="row">
              <?php foreach ($feedbackQuestions as $question): ?>
                <div class="panel panel-default gb-no-padding gb-background-light-grey-1 gb-side-margin-thick"
                     question-id="<?php echo $question->id; ?>">
                  <h4 class="gb-heading-2"><?php echo $question->question; ?></h4>
                  <br>
                  <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                            gb-form-slide-target="<?php echo '#gb-answer-form-' . $question->id; ?>"
                            gb-form-target="#gb-answer-question-form"
                            gb-nested="1"
                            gb-nested-submit-prepend-to="<?php echo '#gb-mentorship-answers-' . $question->id; ?>"
                            gb-add-url="<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnswer", array("mentorshipId" => $mentorship->id, "questionId" => $question->id)); ?>">
                    Add answer
                  </textarea>
                  <div class="panel-body gb-no-padding gb-background-light-grey-1">
                    <div id="<?php echo 'gb-answer-form-' . $question->id; ?>" class="gb-answer-form gb-panel-form gb-hide col-lg-12 col-sm-12 col-xs-12 gb-padding-thin">
                      <!-- Hidden form will come here -->
                    </div>
                    <br>
                    <?php
                    $answers = MentorshipAnswer::getAnswers($mentorship->id, $question->id, true);
                    if (count($answers) == 0):
                      ?>
                      <div class="gb-no-information-alert alert alert-block row">
                        <strong>no information added. </strong>
                      </div>
                    <?php endif; ?>
                    <div id="<?php echo 'gb-mentorship-answers-' . $question->id; ?>" class="row">
                      <?php foreach ($answers as $answer): ?>
                        <?php
                        echo $this->renderPartial('mentorship.views.mentorship._answer_list_item', array("answer" => $answer));
                        ?>
                      <?php endforeach; ?>
                    </div>
                    <br>
                  </div>
                </div>
              <?php endforeach; ?>
              <br>
            </div>
          </div>
          <br>
        </div>
        <div class="tab-pane gb-full" id="gb-reports-evaluation-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
            <h3 class="gb-heading-2">Evaluation</h3>
          </div>
          <br>
        </div>
      </div>
    </div>
    <div class="tab-pane gb-full" id="goal-mentorship-settings-pane">
      <div class="gb-full gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-background-dark-4 gb-no-padding">
        <br>
        <ul id="gb-setting-activity-nav" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <li class="active"><a href="#gb-settings-requests-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Requests</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-settings-mentee-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Mentee</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-settings-general-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">General</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        </ul>
      </div>
      <div class="gb-full tab-content col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-background-light-grey-1 gb-no-padding">
        <br>
        <div class="tab-pane active gb-full" id="gb-settings-requests-pane">
          <br>
        </div>
        <div class="tab-pane gb-full" id="gb-settings-mentees-pane">
        </div>
        <div class="tab-pane gb-full" id="gb-settings-general-pane">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('skill.views.skill.modals.skill_bank_list', array("skillListBank" => $skillListBank));
?>
<?php
echo $this->renderPartial('application.views.site.modals._send_request_modal', array(
 "requestModel" => $requestModel,
 "people" => $people,
 "modalType" => Type::$REQUEST_SHARE));
?>

<!--- ----------------------------HIDDEN THINGS ------------------------->
<div id="gb-forms-home" class="gb-hide">
  <?php
  echo $this->renderPartial('mentorship.views.mentorship.forms._answer_question_form'
    , array("skillModel" => $skillModel,
   'formType' => GoalType::$FORM_TYPE_MENTORSHIP_MENTORSHIP,
   'mentorshipId' => $mentorship->id));
  ?>

  <?php
  echo $this->renderPartial('mentorship.views.mentorship.forms._mentorship_ask_answer_form'
    , array("mentorshipAnswerModel" => $mentorshipAnswerModel,
   'formType' => GoalType::$FORM_TYPE_MENTORSHIP_MENTORSHIP,
   'mentorshipId' => $mentorship->id));
  ?>
  <?php
  echo $this->renderPartial('mentorship.views.mentorship.forms._mentorship_discussion_form'
    , array("discussionModel" => $discussionModel,
   'mentorshipId' => $mentorship->id));
  ?>
</div>
<?php $this->endContent(); ?>