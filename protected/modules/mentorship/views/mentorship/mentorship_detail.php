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
  Yii::app()->baseUrl . '/js/gb_skill_home.js', CClientScript::POS_END
);
?>
<script type="text/javascript">
  var acceptMentorshipEnrollmentUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/acceptMentorshipEnrollment", array("mentorshipId" => $mentorship->id)); ?>";
  var postMentorshipDiscussionTitleUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/postMentorshipDiscussionTitle", array("mentorshipId" => $mentorship->id)); ?>";
  var getDiscussionPostsUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array()); ?>";
  var discussionReplyUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/discussionReply", array()); ?>";
</script>
<div class="container-fluid gb-heading-bar-4">
  <div class="container"> 
    <?php
    echo $this->renderPartial('mentorship.views.mentorship.mentorship_page._header', array(
     "mentorship" => $mentorship));
    ?>
    <div class="row">
      <ul id="" class="row gb-nav-1">
        <li class="active col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding"><a href="#mentorship-welcome-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding pull-left gb-ellipsis"><?php echo $mentorship->title; ?></p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#mentorship-activities-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Activities</p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#mentorship-apps-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Apps</p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#mentorship-timeline-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-ellipsis">Timeline</p></a></li>
      </ul>
    </div>
  </div>
</div>
<br>
<div class="container">
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-no-padding">
    <div class="tab-content">
      <div class="tab-pane active" id="mentorship-welcome-pane">
        <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
          <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-nav-for-background-4 row gb-no-padding">
            <li class="active col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#mentorship-welcome-overview-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-book pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Overview</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#mentorship-welcome-feedback-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-tasks pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Feedback</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#mentorship-welcome-reports-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-tasks pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Reports</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <div class="tab-content gb-padding-left-3">
            <div class="tab-pane active" id="mentorship-welcome-overview-pane">
              <h3 class="gb-heading-2">Mentorship Description</h3>
              <p>
                <strong><?php echo $mentorship->title; ?></strong>
                <?php echo $mentorship->description; ?>
              </p>
              <br>
              <div class="row">
                <?php foreach (Question::getQuestions(Question::$TYPE_FOR_MENTOR) as $question): ?>
                  <div class="panel panel-default gb-no-padding gb-background-light-grey-1"
                       question-id="<?php echo $question->id; ?>">
                    <h3 class="gb-heading-2"><?php echo $question->question; ?>

                    </h3>
                    <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                              data-gb-target-container="<?php echo '#gb-answer-form-' . $question->id; ?>"
                              data-gb-target="#gb-answer-question-form"
                              gb-nested="1"
                              gb-nested-submit-prepend-to="<?php echo '#gb-mentorship-answers-' . $question->id; ?>"
                              data-gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnswer", array("mentorshipId" => $mentorship->id, "questionId" => $question->id)); ?>">
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
            <div class="tab-pane" id="mentorship-welcome-feedback-pane">
              <h3 class="gb-heading-2">Feedback</h3>
              <div class="row">
                <?php foreach ($feedbackQuestions as $question): ?>
                  <div class="panel panel-default gb-no-padding gb-background-light-grey-1"
                       question-id="<?php echo $question->id; ?>">
                    <h4 class="gb-heading-2"><?php echo $question->question; ?></h4>
                   <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                              data-gb-target-container="<?php echo '#gb-answer-form-' . $question->id; ?>"
                              data-gb-target="#gb-answer-question-form"
                              gb-nested="1"
                              gb-nested-submit-prepend-to="<?php echo '#gb-mentorship-answers-' . $question->id; ?>"
                              data-gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnswer", array("mentorshipId" => $mentorship->id, "questionId" => $question->id)); ?>">
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
            <div class="tab-pane" id="mentorship-welcome-reports-pane">
              <h3 class="gb-heading-2">Reports</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="mentorship-timeline-pane">
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
                          data-gb-target-container="#gb-mentorship-timeline-form-container"
                          data-gb-target="#gb-mentorship-timeline-form">
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
      <div class="tab-pane" id="mentorship-activities-pane">
        <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
          <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-nav-for-background-4 row gb-no-padding">
            <li class="active col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-activities-announcements-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-list-alt pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Announcements</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-activities-tasks-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-tasks pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Tasks</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-activities-discussions-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-th-list pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Discussions</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-activities-ask-answer-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-question-sign pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Ask & Answer</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-activities-external-links-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-globe pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">External Links</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-activities-files-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-file pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Files</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"><div class="tab-content gb-padding-left-3">
            <div class="tab-pane active" id="gb-mentorship-activities-announcements-pane">
              <h3 class="gb-heading-2">Announcements</h3>
              <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                        data-gb-target-container="#gb-mentorship-announcement-form-container"
                        data-gb-target="#gb-mentorship-announcement-form">
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
            <div class="tab-pane" id="gb-mentorship-activities-tasks-pane">
              <h3 class="gb-heading-2">Tasks</h3>
              <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                        data-gb-target-container="#gb-mentorship-todo-form-container"
                        data-gb-target="#gb-mentorship-todo-form">
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
            <div class="tab-pane" id="gb-mentorship-activities-discussions-pane">
              <h3 class="gb-heading-2">Discussions</h3>
              <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                        data-gb-target-container="#gb-mentorship-discussion-title-form-container"
                        data-gb-target="#gb-mentorship-discussion-title-form">
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
            <div class="tab-pane" id="gb-mentorship-activities-ask-answer-pane">
              <h3 class="gb-heading-2">Ask & Answer</h3>
              <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                        data-gb-target-container="#gb-ask-question-form-container"
                        data-gb-target="#gb-ask-question-form">
                Add a question
              </textarea>
              <div class="row">
                <div id="gb-ask-question-form-container" class="row gb-panel-form gb-hide">
                  <?php
                  $this->renderPartial('mentorship.views.mentorship.forms._mentorship_ask_question_form', array(
                   'formType' => SkillType::$FORM_TYPE_MENTORSHIP_MENTORSHIP,
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
            <div class="tab-pane" id="gb-mentorship-activities-external-links-pane">
              <h3 class="gb-heading-2">External Links</h3>
              <textarea class="gb-form-show form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                        data-gb-target-container="#gb-mentorship-weblink-form-container"
                        data-gb-target="#gb-mentorship-weblink-form">
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
            <div class="tab-pane" id="gb-mentorship-activities-files-pane">
              <h3 class="gb-heading-2">Files</h3>
            </div>
          </div>
        </div>
      </div>


      <div class="tab-pane" id="mentorship-apps-pane">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-no-padding">
          <ul class="gb-side-nav-1 gb-nav-for-background-4 row gb-no-padding">
            <li class="active col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
              <a class="row" href="#gb-mentorship-app-skill-pane" data-toggle="tab">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                  <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_4.png" alt="">
                  <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Mentorship Skills</p></div>
                </div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
              <a class="row" href="#gb-mentorship-app-advice-pages-pane" data-toggle="tab">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                  <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_4.png" alt="">
                  <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Mentorship Advice Pages</p></div>
                </div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
          <div class="tab-content gb-padding-left-3">
            <div class="tab-pane active" id="gb-mentorship-app-skill-pane">
              <h3 class="gb-heading-2">Mentorship Skills</h3>
              <?php
              echo $this->renderPartial('mentorship.views.mentorship.skill._mentorship_skill_tab', array(
               'skillModel' => $skillModel,
               'skill' => $skill,
               'skillModel' => $skillModel,
               'skillLevelList' => $skillLevelList));
              ?>
            </div>
            <div class="tab-pane" id="gb-mentorship-app-advice-pages-pane">
              <h3 class="gb-heading-2">Mentorship Advice Pages</h3>

            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="skill-mentorship-settings-pane">
        <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-background-dark-4 gb-no-padding">
          <br>
          <ul id="gb-setting-activity-nav" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <li class="active"><a href="#gb-settings-requests-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Requests</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-settings-mentee-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Mentee</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-settings-general-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">General</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          </ul>
        </div>
        <div class="tab-content col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-background-light-grey-1 gb-no-padding">
          <br>
          <div class="tab-pane active" id="gb-settings-requests-pane">
            <br>
          </div>
          <div class="tab-pane" id="gb-settings-mentees-pane">
          </div>
          <div class="tab-pane" id="gb-settings-general-pane">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 gb-no-padding hidden-sm hidden-xs">
    <div class="row gb-box-1">
      <h5 class="gb-heading-2">Other People</h5>
      <br>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('skill.views.skill.modals.skill_bank_list', array("skillBank" => $skillBank));
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
   'formType' => SkillType::$FORM_TYPE_MENTORSHIP_MENTORSHIP,
   'mentorshipId' => $mentorship->id));
  ?>

  <?php
  echo $this->renderPartial('mentorship.views.mentorship.forms._mentorship_ask_answer_form'
    , array("mentorshipAnswerModel" => $mentorshipAnswerModel,
   'formType' => SkillType::$FORM_TYPE_MENTORSHIP_MENTORSHIP,
   'mentorshipId' => $mentorship->id));
  ?>
  <?php
  echo $this->renderPartial('mentorship.views.mentorship.forms._mentorship_discussion_form'
    , array("discussionModel" => $discussionModel,
   'mentorshipId' => $mentorship->id));
  ?>
</div>
<?php $this->endContent(); ?>