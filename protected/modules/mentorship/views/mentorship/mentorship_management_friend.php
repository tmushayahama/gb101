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
<div class="container-fluid gb-heading-bar-4">
  <div class="container">
    <div class="gb-top-heading">
      <h2 class="gb-ellipsis">Mentorship - <?php echo $mentorship->title; ?></h2>
      <div class="row">
        <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-nav-1">
          <li class="active col-lg-3 col-md-3 col-sm-6 col-xs-6"><a href="#goal-mentorship-mentorships-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Mentorship Project</p></a></li>
          <li class="gb-disabled-1 col-lg-3 col-md-2 col-sm-6 col-xs-6"><a href="#goal-mentorship-timeline-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Timeline</p></a></li>
          <li class="gb-disabled-1 col-lg-3 col-md-3 col-sm-6 col-xs-6"><a href="#goal-mentorship-activities-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Activities</p></a></li>
          <li class="gb-disabled-1 col-lg-3 col-md-3 col-sm-6 col-xs-6"><a href="#goal-mentorship-settings-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-ellipsis"> Settings</p></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="tab-content gb-background-light-grey-1">
    <div class="tab-pane active" id="goal-mentorship-mentorships-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-no-padding">
        <br>
        <?php
        echo $this->renderPartial('mentorship.views.mentorship.management._summary_sidebar', array(
         "mentorship" => $mentorship,
         "requestModel" => $requestModel,
         "advicePages" => $advicePages,
         "otherMentorships" => $otherMentorships));
        ?>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-no-padding ">
        <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
          <div class="row">
            <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-nav-for-background-4 gb-skill-leftbar">
              <li class="active col-lg-4 col-md-4 col-sm-4 col-xs-4"><a href="#gb-mentorship-management-mentor-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Mentors</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
              <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><a href="#gb-mentorship-management-mentee-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Mentees</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
              <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><a href="#gb-mentorship-management-assign-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">Assigned</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
            </ul>
          </div>
          <div class="tab-content gb-no-padding">
            <br>
            <div class="tab-pane active" id="gb-mentorship-management-mentor-pane">

              <h3 class="gb-heading-2">Mentor(s)</h3>
              <br>  
              <div id="gb-mentor-requests" class="row">
                <?php foreach ($mentorshipMentorsEnrolled as $mentorshipEnrolled): ?>
                  <?php
                  echo $this->renderPartial('mentorship.views.mentorship._mentorship_access_badge', array(
                   "mentorshipEnrolled" => $mentorshipEnrolled));
                  ?>
                <?php endforeach; ?>
                <?php
                echo $this->renderPartial('mentorship.views.mentorship._mentorship_mentor_requests', array(
                 "mentorshipRequests" => $mentorshipMentorRequests,
                 "mentorship" => $mentorship));
                ?>
              </div>
            </div>
            <div class="tab-pane" id="gb-mentorship-management-mentee-pane">

              <h3 class="gb-heading-2">Mentee(s)</h3>
              <br> 
              <div id="gb-mentee-requests" class="row">
                <?php foreach ($mentorshipMenteesEnrolled as $mentorshipEnrolled): ?>
                  <?php
                  echo $this->renderPartial('mentorship.views.mentorship._mentorship_access_badge', array(
                   "mentorshipEnrolled" => $mentorshipEnrolled));
                  ?>
                <?php endforeach; ?>
                <?php
                echo $this->renderPartial('mentorship.views.mentorship._mentorship_mentee_requests', array(
                 "mentorshipRequests" => $mentorshipMenteeRequests,
                 "mentorship" => $mentorship));
                ?>
              </div>
            </div>
            <div class="tab-pane" id="gb-mentorship-management-assign-pane">

              <h3 class="gb-heading-2">Assignment(s)</h3>
              <br>  
              <div id="gb-assignment-requests" class="row">
                <?php foreach ($mentorshipAssignmentsEnrolled as $mentorshipEnrolled): ?>
                  <?php
                  echo $this->renderPartial('mentorship.views.mentorship._mentorship_access_badge', array(
                   "mentorshipEnrolled" => $mentorshipEnrolled));
                  ?>
                <?php endforeach; ?>
                <?php
                echo $this->renderPartial('mentorship.views.mentorship._mentorship_assignment_requests', array(
                 "mentorshipRequests" => $mentorshipAssignmentRequests,
                 "mentorship" => $mentorship));
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="goal-mentorship-reports-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>
        <ul id="gb-setting-activity-nav" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <li class="active"><a href="#gb-reports-feedback-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Feedback</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-reports-evaluation-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Evaluation</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        </ul>
      </div>
      <div class="tab-content col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-background-light-grey-1 gb-no-padding">
        <br>

        <div class="tab-pane active" id="gb-reports-feedback-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
            <h3 class="gb-heading-2">Feedback</h3>
            <br>
          </div>
          <br>
        </div>
        <div class="tab-pane" id="gb-reports-evaluation-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
            <h3 class="gb-heading-2">Evaluation</h3>
          </div>
          <br>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="goal-mentorship-settings-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
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
<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('application.views.site.modals._send_request_modal', array(
 "requestModel" => $requestModel,
 "modalType" => Type::$REQUEST_SHARE));
?>

<!--- ----------------------------HIDDEN THINGS ------------------------->
<div id="gb-forms-home" class="gb-hide">

</div>
<?php $this->endContent(); ?>