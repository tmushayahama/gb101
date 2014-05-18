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
  var mentorshipDescription = "<?php echo $goalMentorship->description ?>";
  var editDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/editDetail", array()); ?>";
  var acceptMentorshipEnrollmentUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/acceptMentorshipEnrollment", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipAnswerUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnswer", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipAnnouncementUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnnouncement", array("mentorshipId" => $goalMentorship->id)); ?>";
  var postMentorshipDiscussionTitleUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/postMentorshipDiscussionTitle", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipTodoUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipTodo", array("mentorshipId" => $goalMentorship->id)); ?>";
// $("#gb-topbar-heading-title").text("Skills");
</script>
<br>
<div class="container">
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
  <div id="gb-header" class="panel panel-default">
    <div class="mentorship-info-container" mentorship-id="<?php echo $goalMentorship->id; ?>">
      <div class="col-lg-2 col-sm-12 col-xs-12">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
      </div>
      <div class="panel panel-default gb-no-padding col-lg-10 col-sm-12 col-xs-12">
        <div class="panel-heading">
          <a><h4><?php echo $goalMentorship->owner->profile->firstname . " " . $goalMentorship->owner->profile->lastname ?></h4></a>
          Mentor
        </div>
        <div class="panel-body gb-padding-thin">
          <div class="col-lg-8 col-sm-12 col-xs-12">
            <h4 class="gb-page-title"><?php echo $goalMentorship->goal->title; ?></h4>
            <p class="gb-mentorship-description"> <?php echo $goalMentorship->description ?> </p>
          </div>
          <div id="home-activity-stats" class="col-lg-4 col-sm-12 col-xs-12 panel panel-default gb-no-padding">
            <div class="panel-heading">
              <h5 class="">Mentees</h5>
            </div>
            <div class="panel-body">
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
  </div>
</div>
<br>
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
                <div class="panel-body">
                  <?php foreach ($advicePages as $advicePage): ?>
                    <div class="gb-skill-skill-list-row row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
                      <p class="gb-ellipsis">
                        <a href="<?php echo Yii::app()->createUrl('pages/pages/goalPageDetail', array('pageId' => $advicePage->id)); ?>"><?php echo $advicePage->title; ?></a><br>
                      </p>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="col-lg-9 col-sm-12 col-xs-12 gb-padding-thin">
              <div class="row">
                <?php foreach (Question::getQuestions(Question::$TYPE_FOR_MENTOR) as $question): ?>
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12"
                       question-id="<?php echo $question->id; ?>">
                    <div class="panel-heading">
                      <h4><?php echo $question->question; ?><span class="pull-right"><a class="gb-add-mentorship-answer-toggle btn btn-xs btn-default"><i class="glyphicon glyphicon-plus"></i> Add</a></span></h4>
                    </div>
                    <div class="panel-body">
                      <div class="gb-answer-form gb-hide col-lg-12 col-sm-12 col-xs-12">
                        <div class="gb-btn-row-large row gb-margin-bottom-narrow">
                          <a class="btn btn-link btn-sm col-lg-12 col-sm-12 col-xs-12 gb-bank-list-modal-trigger"><i class="glyphicon glyphicon-list"></i> Select From Skill Bank</a>
                        </div>
                        <div class="form-group row">
                          <input type="text" class="gb-answer-title input-sm col-lg-12 col-sm-12 col-xs-12" placeholder ="Subskill Title">
                        </div>
                        <div class="form-group row">
                          <textarea class="gb-answer-description input-sm col-lg-12 col-sm-12 col-xs-12" placeholder="Skill Description max 140 characters" rows= 2></textarea>
                        </div>
                        <div class="form-group row">
                          <a class="gb-add-answer-clear-btn btn btn-default">Clear</a>
                          <a class="gb-add-answer-btn btn btn-primary">Add</a>
                        </div>
                      </div>
                      <?php
                      $answers = MentorshipQuestion::getAnswers($goalMentorship->id, $question->id, true);
                      if (count($answers) == 0):
                        ?>
                        <div class="alert alert-info">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>You haven't added any </strong> <?php echo $question->question; ?>
                          <a class="gb-add-mentorship-answer-toggle">Start Adding </a>
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
              <div class="panel panel-default gb-no-padding col-lg-6 col-sm-6 col-xs-12">
                <div class="panel-heading">
                  <h4>Actual Timeline</h4>
                </div>
                <div class="panel-body">
                </div>
              </div>
              <div class="panel panel-default gb-no-padding col-lg-6 col-sm-6 col-xs-12">
                <div class="panel-heading">
                  <h4>Expected Timeline</h4>
                </div>
                <div class="panel-body">
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
              <div class="col-lg-9 col-sm-12 col-xs-12 tab-content">
                <div class="tab-pane active" id="gb-skill-activity-announcement-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">Announcements<span class="pull-right"><a class="gb-add-mentorship-announcement-toggle btn btn-xs btn-default"><i class="glyphicon glyphicon-plus"></i> Add</a></span></h4>
                    </div>
                    <div class="panel-body">
                      <div class="gb-announcement-form gb-hide col-lg-12 col-sm-12 col-xs-12">
                        <div class="form-group row">
                          <input type="text" class="gb-announcement-title input-sm col-lg-12 col-sm-12 col-xs-12" placeholder ="Subskill Title">
                        </div>
                        <div class="form-group row">
                          <textarea class="gb-announcement-description input-sm col-lg-12 col-sm-12 col-xs-12" placeholder="Skill Description max 140 characters" rows= 2></textarea>
                        </div>
                        <div class="form-group row">
                          <a class="gb-add-announcement-clear-btn btn btn-default">Clear</a>
                          <a class="gb-add-announcement-btn btn btn-primary">Add</a>
                        </div>
                      </div>
                      <?php
                      $announcements = MentorshipAnnouncement::getMentorshipAnnouncements($goalMentorship->id, true);
                      if (count($announcements) == 0):
                        ?>
                        <div class="alert alert-info">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>You haven't added any announcements.</strong>
                          <a class="gb-add-mentorship-announcement-toggle">Start Adding </a>
                        </div>
                      <?php endif; ?>
                      <ul class="gb-announcement-list nav nav-stacked">
                        <?php foreach ($announcements as $announcement): ?>
                          <?php
                          echo $this->renderPartial('mentorship.views.mentorship._announcement_list_item', array("mentorshipAnnouncement" => $announcement));
                          ?>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="gb-skill-activity-todos-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">To Dos<span class="pull-right"><a class="gb-add-mentorship-todo-toggle btn btn-xs btn-default"><i class="glyphicon glyphicon-plus"></i> Add</a></span></h4>
                    </div>
                    <div class="panel-body gb-padding-thin">
                      <?php
                      echo $this->renderPartial('mentorship.views.mentorship.forms._mentorship_todo', array(
                       "todoModel" => $todoModel
                      ));
                      ?>
                      <?php
                      $mentorshipTodos = MentorshipTodo::getMentorshipTodos($goalMentorship->id, true);
                      if (count($mentorshipTodos) == 0):
                        ?>
                        <div class="alert alert-info">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>You haven't added any todos.</strong>
                          <a class="gb-add-mentorship-todo-toggle">Start Adding </a>
                        </div>
                      <?php endif; ?>
                      <div class="gb-mentorship-todo-list">
                        <?php foreach ($mentorshipTodos as $mentorshipTodo): ?>
                          <?php
                          echo $this->renderPartial('mentorship.views.mentorship._mentorship_todo_list_item'
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
                      <h4 class="">Discussion<span class="pull-right"><a class="gb-post-mentorship-discussion-title-toggle btn btn-xs btn-default"><i class="glyphicon glyphicon-plus"></i> Post</a></span></h4>
                    </div>
                    <div class="panel-body">
                      <?php
                      echo $this->renderPartial('discussion.views.discussion.forms._discussion', array(
                       'discussionModel' => $discussionModel,
                       "discussionTitleModel" => $discussionTitleModel
                      ));
                      ?>
                      <div class="gb-mentorship-discussion-title-list row">
                        <?php foreach (MentorshipDiscussionTitle::getDiscussionTitles($goalMentorship->id, 5) as $mentorshipDiscussionTitle): ?>
                          <?php
                          echo $this->renderPartial('discussion.views.discussion._discussion', array(
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
                      <h4 class="">External Links<span class="pull-right"><a class="gb-add-mentorship-weblink-toggle btn btn-xs btn-default"><i class="glyphicon glyphicon-plus"></i> Add</a></span></h4>
                    </div>
                    <div class="panel-body">
                      <div class="gb-weblink-form gb-hide col-lg-12 col-sm-12 col-xs-12">
                        <div class="form-group row">
                          <input type="text" class="gb-weblink-url input-sm col-lg-12 col-sm-12 col-xs-12" placeholder ="Subskill Title">
                        </div>
                        <div class="form-group row">
                          <input type="text" class="gb-weblink-category input-sm col-lg-12 col-sm-12 col-xs-12" placeholder ="Subskill Title">
                        </div>
                        <div class="form-group row">
                          <input type="text" class="gb-weblink-title input-sm col-lg-12 col-sm-12 col-xs-12" placeholder ="Subskill Title">
                        </div>
                        <div class="form-group row">
                          <textarea class="gb-weblink-description input-sm col-lg-12 col-sm-12 col-xs-12" placeholder="Skill Description max 140 characters" rows= 2></textarea>
                        </div>
                        <div class="form-group row">
                          <a class="gb-add-weblink-clear-btn btn btn-default">Clear</a>
                          <a class="gb-add-weblink-btn btn btn-primary">Add</a>
                        </div>
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
            <div class="col-lg-9 col-sm-9 col-xs-12 tab-content">
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
<?php $this->endContent() ?>