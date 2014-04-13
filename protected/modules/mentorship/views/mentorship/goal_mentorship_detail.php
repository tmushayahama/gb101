<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_mentorship_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var mentorshipDescription = "<?php echo $goalMentorship->description ?>";
  var editDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/editDetail", array()); ?>";
  var acceptMentorshipEnrollmentUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/acceptMentorshipEnrollment", array("mentorshipId" => $goalMentorship->id)); ?>";

  // $("#gb-topbar-heading-title").text("Skills");
</script>
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12">
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
            <div class="panel-body">
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
      <br>
      <br>
      <div class="row gb-bottom-border-grey-3">
        <h4 class="pull-left">Mentorship</h4>
        <ul id="gb-mentorship-detail-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#goal-mentorship-all-pane" data-toggle="tab">Welcome</a></li>
          <li class=""><a href="#goal-mentorship-activities-pane" data-toggle="tab">Activities</a></li>
          <li class=""><a href="#goal-mentorship-timeline-pane" data-toggle="tab">Timeline</a></li>
          <li class=""><a href="#goal-mentorship-settings-pane" data-toggle="tab">Settings</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="tab-content">
          <div class="tab-pane active" id="goal-mentorship-all-pane">
            <br>
            <h1>Welcome</h1>
            <br>

            <h4 class="">These are some pages I worked on </h4><br>
            <?php foreach ($advicePages as $advicePage): ?>
              <a href="<?php echo Yii::app()->createUrl('pages/pages/goalPageDetail', array('pageId' => $advicePage->id)); ?>"><?php echo $advicePage->title; ?></a><br>
            <?php endforeach; ?>
          </div>
          <div class="tab-pane" id="goal-mentorship-activities-pane">
            <div class="tab-pane active row-fluid" id="skill-activity-tab-pane">
              <ul id="gb-skill-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
                <li class=""><a href="#gb-skill-activity-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
                <li class="active"><a href="#gb-skill-activity-todos-pane" data-toggle="tab">To Dos<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-discussion-pane" data-toggle="tab">Discussion<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-files-pane" data-toggle="tab">Files<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-web-links-pane" data-toggle="tab">Web Links<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-calendar-pane" data-toggle="tab">Calendar<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-message-pane" data-toggle="tab">Message<i class="icon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-extra-info-pane" data-toggle="tab">Extra Info<i class="icon-chevron-right pull-right"></i></a></li>
              </ul>
              <div class="gb-skill-activity-content tab-content">
                <div class="tab-pane " id="gb-skill-activity-all-pane">
                  <h3>All</h3>
                </div>
                <div class="tab-pane active " id="gb-skill-activity-todos-pane">
                  <h3>To Dos <a class="pull-right">Add New Todo</a></h3>
                  <br>
                  <h4><a><i>To Do Heading</i></a></h4>

                </div>
                <div class="tab-pane" id="gb-skill-activity-discussion-pane">
                  <h3>Skill Discussion <a class="pull-right">Add New Discussion</a></h3>

                </div>
                <div class="tab-pane" id="gb-skill-activity-web-links-pane">
                  <h3>Web Links <a id="gb-add-weblink-modal-trigger" skill-id="<?php //echo $skillCommitment->id;                                                             ?> " class="pull-right">New Web Link</a></h3>
                  <?php //foreach ($skillWebLinks as $skillWebLink):     ?>
                  <div id="gb-skill-management-web-links">

                  </div>
                  <?php //endforeach;     ?>
                </div>
                <div class="tab-pane" id="gb-skill-activity-calendar-pane">
                </div>
                <div class="tab-pane" id="gb-skill-activity-message-pane">
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="goal-mentorship-timeline-pane">
            <h3 class="sub-heading-9">Timeline</h3>
          </div>
          <div class="tab-pane" id="goal-mentorship-settings-pane">
            <ul id="gb-settings-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
              <li class="active"><a href="#gb-settings-requests-pane" data-toggle="tab">Requests<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-settings-mentees-pane" data-toggle="tab">Mentees<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-settings-general-pane" data-toggle="tab">General<i class="icon-chevron-right pull-right"></i></a></li>
            </ul>
            <div class="gb-skill-activity-content tab-content">
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

<?php $this->endContent() ?>