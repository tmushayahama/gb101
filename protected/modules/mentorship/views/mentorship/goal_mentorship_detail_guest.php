<?php $this->beginContent('//layouts/gb_main2'); ?>
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
  var acceptMentorshipEnrollmentUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/acceptMentorshipEnrollment", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipAnswerUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnswer", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipAnnouncementUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipAnnouncement", array("mentorshipId" => $goalMentorship->id)); ?>";
  var postMentorshipDiscussionTitleUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/postMentorshipDiscussionTitle", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipTodoUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipTodo", array("mentorshipId" => $goalMentorship->id)); ?>";
  var addMentorshipWebLinkUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorshipWebLink", array("mentorshipId" => $goalMentorship->id)); ?>";
  var getDiscussionPostsUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array()); ?>";
  var discussionReplyUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/discussionReply", array()); ?>";
  // $("#gb-topbar-heading-title").text("Skills");
</script>
<div class="gb-background">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-4 col-lg-6 col-md-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6"></div>
  </div>
</div>
<div class="container-fluid gb-background-white">
  <br>
  <div class="container">
    <div class="mentorship-info-container row" mentorship-id="<?php echo $goalMentorship->id; ?>">
      <div class="panel panel-default gb-no-padding col-lg-8 col-md--8 col-sm-7 col-xs-12">
        <div class="panel-heading">
          <h4 class="gb-mentorship-title"><?php echo $goalMentorship->title; ?></h4>
        </div>
        <div class="panel-body gb-padding-medium">
          <p class=""><strong>Skill: </strong><a><?php echo $goalMentorship->goalList->goal->title; ?></a></p>
          <p class="gb-mentorship-description"> 
            <?php echo $goalMentorship->description ?> 
          </p>
        </div>
        <div class="panel-footer">
          <div class="row">
            <h5 class="pull-left">Created by: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $goalMentorship->owner_id)); ?>"> <?php echo $goalMentorship->owner->profile->firstname . " " . $goalMentorship->owner->profile->lastname ?></a></h5>
            <div class="pull-right">
              <a class="gb-edit-mentorship-btn btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 gb-no-padding hidden-xs">
        <div class="row">
          <?php if ($goalMentorship->mentor_id == null): ?>
            <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/gb_unknown_profile.png"; ?>" class="col-lg-5 col-md-5 col-sm-5 gb-no-padding gb-img-mentor" alt="">
                 <h5 class="col-lg-7 col-md-8 col-sm-8 gb-padding-thin">No Mentor: <br>
              <a>Get Mentor</a>
            </h5>
          <?php else: ?>
            <img href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $goalMentorship->mentor_id)); ?>" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $goalMentorship->mentor->profile->avatar_url; ?>" class="col-lg-5 col-md-5 col-sm-5 gb-no-padding gb-img-mentor" alt="">
            <h5 class="col-lg-7 col-md-8 col-sm-8 gb-padding-thin">Mentor: <br>
              <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $goalMentorship->mentor_id)); ?>"> <?php echo $goalMentorship->mentor->profile->firstname . " " . $goalMentorship->mentor->profile->lastname ?></a>
            </h5>
          <?php endif; ?>
        </div>
        <div class="row">
          <?php if ($goalMentorship->mentee_id == null): ?>
            <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/gb_unknown_profile.png"; ?>" class="col-lg-5 col-md-5 col-sm-5 gb-no-padding gb-img-mentor" alt="">
                 <h5 class="col-lg-7 col-md-8 col-sm-8 gb-padding-thin">No Mentee: <br>
              <a>Get Mentee</a>
            </h5>
          <?php else: ?>
            <img href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $goalMentorship->mentee_id)); ?>" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $goalMentorship->mentee->profile->avatar_url; ?>" class="col-lg-5 col-md-5 col-sm-5 gb-no-padding gb-img-mentor" alt="">
            <h5 class="col-lg-7 col-md-7 col-sm-7 gb-padding-thin">Mentee: <br>
              <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $goalMentorship->mentee_id)); ?>"> <?php echo $goalMentorship->mentee->profile->firstname . " " . $goalMentorship->mentee->profile->lastname ?></a>
            </h5>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid gb-heading-bar-1">
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
        <li class="gb-disabled-1"><a href="#goal-mentorship-activities-pane" data-toggle="tab">Activities</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container">
  <div class="tab-content gb-full">
    <div class="tab-pane active gb-full" id="goal-mentorship-all-pane">
      <div class="gb-full gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-background-dark-4 gb-no-padding">
        <br>
        <div class="alert alert-warning">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <p><i>Other activities you have done </i></p>
        </div>
        <div class="panel panel-default">
          <h3 class="gb-heading-1">
            Advice Pages
          </h3>
          <div class="panel-body gb-no-padding">
            <?php foreach ($advicePages as $advicePage): ?>
              <a href="<?php echo Yii::app()->createUrl('pages/pages/advicePageDetail', array('advicePageId' => $advicePage->id)); ?>" class="row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
                <p class="gb-ellipsis">
                  <?php echo $advicePage->title; ?>
                </p>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="panel panel-default">
          <h3 class="gb-heading-1">
            Other Mentorships
          </h3>
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
      <div class="gb-full col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding gb-background-light-grey-1">
        <br>
        <?php foreach (Question::getQuestions(Question::$TYPE_FOR_MENTOR) as $question): ?>
          <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12"
               question-id="<?php echo $question->id; ?>">
            <div class="panel-heading">
              <h4><?php echo $question->question; ?></h4>
            </div>
            <div class="panel-body gb-padding-thin">
              <?php
              $answers = MentorshipAnswer::getAnswers($goalMentorship->id, $question->id, true);
              if (count($answers) == 0):
                ?>
                <div class="alert alert-block row">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  No information added. 
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
    <div class="tab-pane gb-full" id="goal-mentorship-timeline-pane">
      <div class="panel panel-default">
        <br>
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
        <div class="panel-body row gb-no-padding gb-background-light-grey-1">
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
</div>
<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('user.views.user._registration_modal', array(
 'registerModel' => $registerModel,
 'profile' => $profile
));
?>
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
 'loginModel' => $loginModel
));
?>
<?php $this->endContent() ?>