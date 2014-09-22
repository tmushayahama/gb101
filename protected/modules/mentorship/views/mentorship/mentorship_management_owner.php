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
      <h2 class="gb-ellipsis">Mentorship Management</h2>
      <ul id="" class="row gb-nav-1">
        <li class="active col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding"><a href="#mentorship-management-welcome-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding pull-left gb-ellipsis"><?php echo $mentorship->title; ?></p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#mentorship-management-apps-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Apps</p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#mentorship-management-participants-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Participants</p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#mentorship-management-timeline-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-ellipsis">Timeline</p></a></li>
      </ul>
    </div>
  </div>
</div> 
<br>
<div class="container">
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-no-padding">
    <div class="tab-content gb-background-light-grey-1">
      <div class="tab-pane active" id="mentorship-management-welcome-pane">
        <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
          <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-nav-for-background-4 row gb-no-padding">
            <li class="active col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-welcome-overview-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-book pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Overview & Tools</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-welcome-tasks-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-tasks pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Tasks</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-welcome-discussions-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-th-list pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Discussions</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-welcome-ask-answer-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-question-sign pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Ask & Answer</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-welcome-external-links-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-globe pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">External Links</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-mentorship-welcome-files-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-file pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Files</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"><div class="tab-content gb-padding-left-3">
            <div class="tab-pane active" id="gb-mentorship-welcome-overview-pane">
              <div class="gb-box-1 row">
                <h3 class="gb-heading-2">Mentorship Description</h3>
                <p>
                  <strong><?php $mentorship->title; ?></strong>
                  <?php $mentorship->description; ?>
                </p>
              </div>
              <br>
              <br><div class="row gb-home-nav gb-box-1">
                <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
                   gb-type="<?php echo Type::$SOURCE_MENTOR_REQUESTS; ?>" 
                   gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
                   gb-target-modal="#gb-send-request-modal"
                   gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
                   gb-single-target-display=".gb-display-assign-to"
                   gb-single-target-display-input="#gb-request-form-recipient-id-input"
                   gb-source-pk-id="<?php echo $mentorship->id; ?>" 
                   gb-data-source="<?php echo Type::$SOURCE_MENTOR_REQUESTS; ?>"
                   gb-form-slide-target="#gb-request-form-container"
                   gb-form-target="#gb-request-form"
                   gb-submit-prepend-to="#gb-mentor-requests">
                  <div class="thumbnail">
                    <br>
                    <div class="gb-img-container">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_request_icon_10.png" alt="">
                    </div>
                    <div class="caption">
                      <h5 class="text-center">Request a<br>Mentor</h5>
                    </div>
                  </div>
                </a>
                <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
                   gb-type="<?php echo Type::$SOURCE_MENTEE_REQUESTS; ?>" 
                   gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
                   gb-target-modal="#gb-send-request-modal"
                   gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
                   gb-single-target-display=".gb-display-assign-to"
                   gb-single-target-display-input="#gb-request-form-recipient-id-input"
                   gb-source-pk-id="<?php echo $mentorship->id; ?>" 
                   gb-data-source="<?php echo Type::$SOURCE_MENTEE_REQUESTS; ?>"
                   gb-form-slide-target="#gb-request-form-container"
                   gb-form-target="#gb-request-form"
                   gb-submit-prepend-to="#gb-mentee-requests">
                  <div class="thumbnail">
                    <br>
                    <div class="gb-img-container">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentee_request_icon_10.png" alt="">
                    </div>
                    <div class="caption">
                      <h5 class="text-center">Request a<br>Mentee</h5>
                    </div>
                  </div>
                </a>
                <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
                   gb-type="<?php echo Notification::$NOTIFICATION_MENTOR_ASSIGN_OWNER; ?>" 
                   gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
                   gb-target-modal="#gb-send-request-modal"
                   gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
                   gb-single-target-display=".gb-display-assign-to"
                   gb-single-target-display-input="#gb-request-form-recipient-id-input"
                   gb-source-pk-id="<?php echo $mentorship->id; ?>" 
                   gb-data-source="<?php echo Type::$SOURCE_MENTORSHIP_ASSIGNMENT_REQUESTS; ?>"
                   gb-form-slide-target="#gb-request-form-container"
                   gb-form-target="#gb-request-form"
                   gb-submit-prepend-to="#gb-assignment-requests">
                  <div class="thumbnail">
                    <br>
                    <div class="gb-img-container">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/assign_mentorship_icon_10.png" alt="">
                    </div>
                    <div class="caption">
                      <h5 class="text-center">Mentor<br>Assignment</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div id="gb-request-form-container" class="gb-hide gb-panel-form">
                <br>
                <?php
                echo $this->renderPartial('application.views.site.forms._request_form', array(
                 "requestModel" => $requestModel));
                ?>
              </div>
            </div>
            <div class="tab-pane" id="gb-mentorship-welcome-tasks-pane">
              <h3 class="gb-heading-2">Tasks</h3>
            </div>
            <div class="tab-pane" id="gb-mentorship-welcome-discussions-pane">
              <h3 class="gb-heading-2">Discussions</h3>
            </div>
            <div class="tab-pane" id="gb-mentorship-welcome-ask-answer-pane">
              <h3 class="gb-heading-2">Ask Answer</h3>
            </div>
            <div class="tab-pane" id="gb-mentorship-welcome-external-links-pane">
              <h3 class="gb-heading-2">External Links</h3>
            </div>
            <div class="tab-pane" id="gb-mentorship-welcome-files-pane">
              <h3 class="gb-heading-2">Files</h3>
            </div>
          </div>






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
                <div id="gb-mentor-requests" class="row">
                  <?php foreach ($mentorshipMentorsEnrolled as $mentorshipEnrolled): ?>
                    <?php
                    echo $this->renderPartial('mentorship.views.mentorship._mentorship_access_badge', array(
                     "mentorshipEnrolled" => $mentorshipEnrolled));
                    ?>
                  <?php endforeach; ?>
                </div>
                <?php
                echo $this->renderPartial('mentorship.views.mentorship._mentorship_mentor_requests', array(
                 "mentorshipRequests" => $mentorshipMentorRequests,
                 "mentorship" => $mentorship));
                ?>
              </div>
              <div class="tab-pane" id="gb-mentorship-management-mentee-pane">

                <h3 class="gb-heading-2">Mentee(s)</h3>
                <div id="gb-mentee-requests" class="row">
                  <?php foreach ($mentorshipMenteesEnrolled as $mentorshipEnrolled): ?>
                    <?php
                    echo $this->renderPartial('mentorship.views.mentorship._mentorship_access_badge', array(
                     "mentorshipEnrolled" => $mentorshipEnrolled));
                    ?>
                  <?php endforeach; ?>
                </div>
                <?php
                echo $this->renderPartial('mentorship.views.mentorship._mentorship_mentee_requests', array(
                 "mentorshipRequests" => $mentorshipMenteeRequests,
                 "mentorship" => $mentorship));
                ?>

              </div>
              <div class="tab-pane" id="gb-mentorship-management-assign-pane">

                <h3 class="gb-heading-2">Assignment(s)</h3>
                <div id="gb-assignment-requests" class="row">
                  <?php foreach ($mentorshipAssignmentsEnrolled as $mentorshipEnrolled): ?>
                    <?php
                    echo $this->renderPartial('mentorship.views.mentorship._mentorship_access_badge', array(
                     "mentorshipEnrolled" => $mentorshipEnrolled));
                    ?>
                  <?php endforeach; ?>   
                </div>
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
       <div class="tab-pane" id="mentorship-management-participants-pane">
        <h3 class="gb-heading-2">Participants</h3>
      </div>
       <div class="tab-pane" id="mentorship-management-apps-pane">
        <h3 class="gb-heading-2">Mentorship Apps</h3>
      </div>
      <div class="tab-pane" id="mentorship-management-timeline-pane">
        <h3 class="gb-heading-2">Timeline</h3>
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
echo $this->renderPartial('application.views.site.modals._send_request_modal', array(
 "requestModel" => $requestModel,
 "modalType" => Type::$REQUEST_SHARE));
?>

<!--- ----------------------------HIDDEN THINGS ------------------------->
<div id="gb-forms-home" class="gb-hide">

</div>
<?php $this->endContent(); ?>