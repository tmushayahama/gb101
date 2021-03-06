<div class="container-fluid gb-heading-bar-4">
  <div class="container">
    <div class="gb-top-heading">
      <h2 class="gb-ellipsis">Mentorship - <?php echo $mentorship->title; ?></h2>
      <div class="row">
        <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-nav-1">
          <li class="active col-lg-3 col-md-3 col-sm-6 col-xs-6"><a href="#skill-mentorship-mentorships-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Mentorship Project</p></a></li>
          <li class="gb-disabled-1 col-lg-3 col-md-2 col-sm-6 col-xs-6"><a href="#skill-mentorship-timeline-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Timeline</p></a></li>
          <li class="gb-disabled-1 col-lg-3 col-md-3 col-sm-6 col-xs-6"><a href="#skill-mentorship-activities-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Activities</p></a></li>
          <li class="gb-disabled-1 col-lg-3 col-md-3 col-sm-6 col-xs-6"><a href="#skill-mentorship-settings-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-ellipsis"> Settings</p></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="tab-content gb-background-light-grey-1">
    <div class="tab-pane active" id="skill-mentorship-mentorships-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
        <br>
        <?php
        echo $this->renderPartial('mentorship.views.mentorship.management._summary_sidebar', array(
         "mentorship" => $mentorship,
         "requestModel" => $requestModel,
         "advicePages" => $advicePages,
         "otherMentorships" => $otherMentorships));
        ?>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12  ">
        <div class="panel panel-default gb-side-margin-thick  gb-background-light-grey-1">
          <div class="row">
            <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-nav-for-background-4 gb-skill-leftbar">
              <li class="active col-lg-4 col-md-4 col-sm-4 col-xs-4"><a href="#gb-mentorship-management-mentor-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Mentors</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
              <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><a href="#gb-mentorship-management-mentee-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Mentees</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
              <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><a href="#gb-mentorship-management-assign-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">Assigned</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
            </ul>
          </div>
          <div class="tab-content ">
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
    <div class="tab-pane" id="skill-mentorship-reports-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
        <br>
        <ul id="gb-setting-activity-nav" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <li class="active"><a href="#gb-reports-feedback-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Feedback</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-reports-evaluation-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Evaluation</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        </ul>
      </div>
      <div class="tab-content col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-background-light-grey-1 ">
        <br>

        <div class="tab-pane active" id="gb-reports-feedback-pane">
          <div class="panel panel-default gb-side-margin-thick  gb-background-light-grey-1">
            <h3 class="gb-heading-2">Feedback</h3>
            <br>
          </div>
          <br>
        </div>
        <div class="tab-pane" id="gb-reports-evaluation-pane">
          <div class="panel panel-default gb-side-margin-thick  gb-background-light-grey-1">
            <h3 class="gb-heading-2">Evaluation</h3>
          </div>
          <br>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="skill-mentorship-settings-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
        <br>
        <ul id="gb-setting-activity-nav" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <li class="active"><a href="#gb-settings-requests-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Requests</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-settings-mentee-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Mentee</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-settings-general-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">General</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        </ul>
      </div>
      <div class="tab-content col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-background-light-grey-1 ">
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