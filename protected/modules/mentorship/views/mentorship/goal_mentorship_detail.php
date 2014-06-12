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
  var editMentorshipTimelineItemUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/editMentorshipTimelineItem", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipAnswerUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnswer", array("mentorshipId" => $goalMentorship->id)); ?>";
  var editMentorshipAnswerUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/editMentorshipAnswer", array()); ?>";
  var addMentorshipAnnouncementUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnnouncement", array("mentorshipId" => $goalMentorship->id)); ?>";
  var editMentorshipAnnouncementUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/editMentorshipAnnouncement", array()); ?>";
  var postMentorshipDiscussionTitleUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/postMentorshipDiscussionTitle", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipTodoUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipTodo", array("mentorshipId" => $goalMentorship->id)); ?>";
  var editMentorshipTodoUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/editMentorshipTodo", array()); ?>";
  var addMentorshipWebLinkUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipWebLink", array("mentorshipId" => $goalMentorship->id)); ?>";
  var editMentorshipWebLinkUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/editMentorshipWebLink", array()); ?>";
  var getDiscussionPostsUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array()); ?>";
  var discussionReplyUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/discussionReply", array()); ?>";
  // $("#gb-topbar-heading-title").text("Skills");
</script>
<div class="container-fluid gb-white-background">
  <div class="container">
    <br>
    <?php
    $pendingRequests = MentorshipEnrolled::getMentees($goalMentorship->id, MentorshipEnrolled::$PENDING_REQUEST);
    if ($pendingRequests != null):
      ?>
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Pending Requests!</strong> You have <?php echo count($pendingRequests) ?> pending mentorship requests.
        <a>Manage Requests</a>
      </div>
    <?php endif; ?>
    <div class="mentorship-info-container row" mentorship-id="<?php echo $goalMentorship->id; ?>">
      <div class="col-lg-2 col-sm-2 col-xs-12">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
      </div>
      <div class="panel panel-default gb-no-padding col-lg-7 col-sm-7 col-xs-12">
        <div class="panel-heading">
          <h4 class="gb-mentorship-title"><?php echo $goalMentorship->title; ?></h4>
        </div>
        <div class="panel-body gb-padding-medium">
          <p class=""><strong>Skill: </strong><a><?php echo $goalMentorship->goal->title; ?></a></p>
          <p class="gb-mentorship-description"> 
            <?php echo $goalMentorship->description ?> 
          </p>
          <?php
          echo $this->renderPartial('mentorship.views.mentorship.forms._edit_mentorship', array(
           'mentorshipModel' => $mentorshipModel
          ));
          ?>
        </div>
        <div class="panel-footer">
          <div class="row">
            <h5 class="pull-left">Mentor: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $goalMentorship->owner_id)); ?>"> <?php echo $goalMentorship->owner->profile->firstname . " " . $goalMentorship->owner->profile->lastname ?></a></h5>
            <div class="pull-right">
              <a class="gb-edit-mentorship-btn btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            </div>
          </div>
        </div>
      </div>
      <div id="home-activity-stats" class="col-lg-3 col-sm-3 col-xs-12 panel panel-default gb-no-padding">
        <div class="panel-heading">
          <h5 class="">Mentees</h5>
        </div>
        <div class="panel-body gb-max-geight-200">
          <?php
          foreach ($mentees as $mentee):
            if ($mentee->status == MentorshipEnrolled::$ENROLLED):
              echo $this->renderPartial('_mentee_badge_small', array(
               "mentee" => $mentee
              ));
            endif;
          endforeach;
          ?>
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
      <li class=""><a href="#goal-mentorship-settings-pane" data-toggle="tab">Settings</a></li>
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
            <div class="gb-home-left-nav col-lg-3 col-sm-12 col-xs-12 gb-padding-thin">
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
                        <a href="<?php echo Yii::app()->createUrl('pages/pages/advicePageDetail', array('advicePageId' => $advicePage->id)); ?>"><?php echo $advicePage->title; ?></a><br>
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
                      <h4><?php echo $question->question; ?>
                        <span class="pull-right">
                          <a class="gb-form-show btn btn-xs btn-default" 
                             gb-form-slide-target="<?php echo '#gb-answer-form-' . $question->id; ?>"
                             gb-form-target="#gb-answer-question-form">
                            <i class="glyphicon glyphicon-plus"></i> Add
                          </a>
                        </span>
                      </h4>
                    </div>
                    <div class="panel-body gb-padding-thin">
                      <div id="<?php echo 'gb-answer-form-' . $question->id; ?>" class="gb-answer-form gb-panel-form gb-hide col-lg-12 col-sm-12 col-xs-12 gb-padding-thin">
                        <!-- Hidden form will come here -->
                      </div>
                      <?php
                      $answers = MentorshipQuestion::getAnswers($goalMentorship->id, $question->id, true);
                      if (count($answers) == 0):
                        ?>
                        <div class="gb-no-information-alert alert alert-block row">
                          <strong>no information added. </strong>
                          <a class="gb-form-show">Start Adding </a>
                        </div>
                      <?php endif; ?>
                      <div class="<?php echo 'gb-answer-list-' . $question->id; ?> row">
                        <?php foreach ($answers as $answer): ?>
                          <?php
                          echo $this->renderPartial('mentorship.views.mentorship._answer_list_item', array("answer" => $answer));
                          ?>
                        <?php endforeach; ?>
                      </div>
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
                  <h4 class="">Timeline
                    <span class="pull-right">
                      <a class="gb-form-show btn btn-xs btn-default" 
                         gb-form-slide-target="#gb-mentorship-timeline-form-container"
                         gb-form-target="#gb-mentorship-timeline-form">
                        <i class="glyphicon glyphicon-plus"></i> Add
                      </a>
                    </span>
                  </h4>
                </div>
                <div class="panel-body row gb-padding-thin">
                  <br>
                  <div id="gb-mentorship-timeline-form-container" class="row gb-panel-form gb-hide">
                    <?php
                    echo $this->renderPartial('mentorship.views.mentorship.forms._add_mentorship_timeline_item_form', array(
                     "mentorshipTimelineModel" => $mentorshipTimelineModel,
                     "timelineModel" => $timelineModel,
                    ));
                    ?>
                  </div>
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
                      <h4 class="">Announcements
                        <span class="pull-right">
                          <a class="gb-form-show btn btn-xs btn-default" 
                             gb-form-slide-target="#gb-mentorship-announcement-form-container"
                             gb-form-target="#gb-mentorship-announcement-form">
                            <i class="glyphicon glyphicon-plus"></i> Add
                          </a>
                        </span>
                      </h4>
                    </div>
                    <div class="panel-body gb-padding-thin">
                      <div id="gb-mentorship-announcement-form-container" class="row gb-panel-form gb-hide">
                        <?php
                        $this->renderPartial('mentorship.views.mentorship.forms._mentorship_announcement_form', array(
                         "announcementModel" => $announcementModel
                        ));
                        ?>
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
                      <div class="gb-announcement-list">
                        <?php foreach ($announcements as $announcement): ?>
                          <?php
                          $this->renderPartial('mentorship.views.mentorship._announcement_list_item', array("mentorshipAnnouncement" => $announcement));
                          ?>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="gb-skill-activity-todos-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">To Dos
                        <span class="pull-right">
                          <a class="gb-form-show btn btn-xs btn-default" 
                             gb-form-slide-target="#gb-mentorship-todo-form-container"
                             gb-form-target="#gb-mentorship-todo-form">
                            <i class="glyphicon glyphicon-plus"></i> Add
                          </a>
                        </span>
                      </h4>
                    </div>
                    <div class="panel-body gb-padding-thin">
                      <div id="gb-mentorship-todo-form-container" class="row gb-panel-form gb-hide">
                        <?php
                        $this->renderPartial('mentorship.views.mentorship.forms._mentorship_todo_form', array(
                         "todoModel" => $todoModel
                        ));
                        ?>
                      </div>
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
                      <h4 class="">Discussion
                        <span class="pull-right">
                          <a class="gb-form-show btn btn-xs btn-default" 
                             gb-form-slide-target="#gb-discussion-title-form-container"
                             gb-form-target="#gb-discussion-title-form">
                            <i class="glyphicon glyphicon-plus"></i> Post
                          </a>
                        </span>
                      </h4>
                    </div>
                    <div class="panel-body gb-padding-thin">
                      <div id="gb-discussion-title-form-container" class="row gb-panel-form gb-hide">
                        <?php
                        echo $this->renderPartial('discussion.views.discussion.forms._discussion_title_form', array(
                         "discussionTitleModel" => $discussionTitleModel
                        ));
                        ?>
                      </div>
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
                      <h4 class="">External Links
                        <span class="pull-right">
                          <a class="gb-form-show btn btn-xs btn-default" 
                             gb-form-slide-target="#gb-mentorship-web-link-form-container"
                             gb-form-target="#gb-mentorship-web-link-form">
                            <i class="glyphicon glyphicon-plus"></i> Add
                          </a>
                        </span>
                      </h4>
                    </div>
                    <div class="panel-body gb-padding-thin">
                      <div id="gb-mentorship-web-link-form-container" class="row gb-panel-form gb-hide">
                        <?php
                        echo $this->renderPartial('mentorship.views.mentorship.forms._web_link_form', array(
                         'webLinkModel' => $webLinkModel
                        ));
                        ?>
                      </div>
                      <div class="gb-mentorship-web-link-list row">
                        <?php foreach (MentorshipWebLink::getMentorshipWebLinks($goalMentorship->id, true) as $mentorshipWebLink): ?>
                          <?php
                          echo $this->renderPartial('mentorship.views.mentorship._web_link_list_item', array(
                           'mentorshipWebLinkModel' => $mentorshipWebLink));
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
          <div class="tab-pane" id="goal-mentorship-settings-pane">
            <ul id="gb-settings-activity-nav" class="gb-side-nav-1 col-lg-3 col-sm-3 col-xs-12">
              <li class="active"><a href="#gb-settings-requests-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Requests</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-settings-mentees-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Mentees</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-settings-general-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">General</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            </ul>
            <div class="col-lg-9 col-sm-9 col-xs-12 tab-content gb-white-background">
              <div class="tab-pane active row-fluid" id="gb-settings-requests-pane">
                <br>
                <?php
                foreach ($mentees as $mentee):
                  echo $this->renderPartial('_mentee_badge', array(
                   "mentee" => $mentee,
                   'mentorshipId' => $goalMentorship->id,
                  ));
                  ?>

                <?php endforeach; ?>
              </div>
              <div class="tab-pane" id="gb-settings-mentees-pane">
              </div>
              <div class="tab-pane" id="gb-settings-general-pane">
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

<!--- ----------------------------HIDDEN THINGS ------------------------->
<div id="gb-forms-home" class="gb-hide">
  <?php
  echo $this->renderPartial('mentorship.views.mentorship.forms._answer_question_form'
    , array("skillModel" => $skillModel,
   'formType' => GoalType::$FORM_TYPE_MENTORSHIP_MENTORSHIP));
  ?>
</div>
<?php $this->endContent() ?>