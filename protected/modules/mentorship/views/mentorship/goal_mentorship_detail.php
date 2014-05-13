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
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-blue-background">
      <div class="row">
        <div class="tab-content">
          <div class="tab-pane active" id="goal-mentorship-all-pane">
            <div class="gb-home-left-nav col-lg-3 col-sm-12 col-xs-12">
              <?php foreach ($advicePages as $advicePage): ?>
                <a href="<?php echo Yii::app()->createUrl('pages/pages/goalPageDetail', array('pageId' => $advicePage->id)); ?>"><?php echo $advicePage->title; ?></a><br>
              <?php endforeach; ?>
            </div>
            <div class="col-lg-9 col-sm-12 col-xs-12">
              <div class="row">
                <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                  <div class="panel-heading">
                    <h4>More Description</h4>
                  </div>
                  <div class="panel-body">
                  </div>
                </div>
                <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                  <div class="panel-heading">
                    <h4>What I can mentor?</h4>
                  </div>
                  <div class="panel-body">
                  </div>
                </div>
                <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                  <div class="panel-heading">
                    <h4> Requirements</h4>
                  </div>
                  <div class="panel-body">
                  </div>
                </div>
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
            <div class="tab-pane active row-fluid" id="skill-activity-tab-pane">
              <ul id="gb-skill-activity-nav" class="gb-side-nav-1 col-lg-3 col-sm-12 col-xs-12">
                <li class="active"><a href="#gb-skill-activity-announcement-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Announcements</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-todos-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">To Dos</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-discussion-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Discussion</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-web-links-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Web Links</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
                <li class=""><a href="#gb-skill-activity-files-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Files</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              </ul>
              <div class="col-lg-9 col-sm-12 col-xs-12 tab-content">
                <div class="tab-pane" id="gb-skill-activity-announcement-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">Announcements<span class="pull-right"><a class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a></span></h4>
                    </div>
                    <div class="panel-body">
                    </div>
                  </div>
                </div>
                <div class="tab-pane active" id="gb-skill-activity-todos-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">To Dos<span class="pull-right"><a class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a></span></h4>
                    </div>
                    <div class="panel-body">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="gb-skill-activity-discussion-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">Discussion<span class="pull-right"><a class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a></span></h4>
                    </div>
                    <div class="panel-body">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="gb-skill-activity-web-links-pane">
                  <div class="panel panel-default gb-no-padding col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading">
                      <h4 class="">External Links<span class="pull-right"><a class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i>Add</a></span></h4>
                    </div>
                    <div class="panel-body">
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

<?php $this->endContent() ?>