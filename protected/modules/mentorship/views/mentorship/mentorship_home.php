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
  var goalMentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array('mentorshipId' => 0)); ?>";
  var mentorshipEnrollRequestUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipEnrollRequest"); ?>";

  var addMentorshipUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()); ?>";
  var mentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array()); ?>";

  // $("#gb-topbar-heading-title").text("Skills");
</script> 
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <div class="gb-top-heading row">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_5.png" alt="">
      <h2 class="pull-left">Mentorships</h2>
    </div>
  </div>
  <div class="gb-nav-bar-1-contaner row">
    <div class="container">
      <ul id="" class="gb-nav-1">
        <li class="active"><a href="#goal-mentorships-all-pane" data-toggle="tab">All</a></li>
        <li class=""><a href="#goal-mentorships-mentoring-pane" data-toggle="tab">Mentoring</a></li>
        <li class=""><a href="#goal-mentorships-enrolled-pane" data-toggle="tab">Enrolled</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="tab-content container gb-full">
  <div class="tab-pane active gb-full" id="goal-mentorships-all-pane">
    <div class="gb-full col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding gb-background-blue-1">
      <br>
      <?php
      echo $this->renderPartial('mentorship.views.mentorship.forms._add_mentorship_form', array(
       'formType' => GoalType::$FORM_TYPE_MENTORSHIP_MENTORSHIP,
       'mentorshipModel' => $mentorshipModel,
       'mentorshipLevelList' => $mentorshipLevelList,
       'skillGainedList' => $skillGainedList));
      ?>
      <br>
      <ul id="gb-mentorship-all-activity-nav" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-skill-leftbar">
        <li class="active"><a href="#gb-mentorship-all-list-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Recent</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-all-requests-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Requests</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-all-favorites-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Favorites</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
      </ul>
    </div>
    <div class="gb-full col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-blue-background gb-no-padding">
      <br>
      <div class="row gb-hide">
        <div id="" class="input-group input-group-sm">
          <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search mentorship by anything, e.g. fighting">
          <div class="input-group-btn">
            <button id="gb-mentorship-keyword-search-btn" class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
      </div>
      <div class="tab-content row">
        <div class="tab-pane active" id="gb-mentorship-all-list-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-blue-background">
            <h3 class="gb-heading-2">Recent Mentorships</h3>
            <br>
            <div id="skill-posts"class="panel-body gb-blue-background">
              <?php foreach ($mentorships as $mentorship): ?>
                <?php
                echo $this->renderPartial('_mentorship_row', array(
                 "mentorship" => $mentorship,
                ));
                ?>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="gb-mentorship-all-requests-pane">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="">Mentorship Requests<span class="pull-right"></span></h4>
            </div>
            <div class="panel-body">
              <?php foreach ($mentorshipRequests as $mentorshipRequest): ?>
                <?php
                echo $this->renderPartial('_mentorship_request_row', array(
                 "mentorshipRequest" => $mentorshipRequest,
                ));
                ?>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="gb-mentorship-all-favorites-pane">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="">Mentorship Favorites<span class="pull-right"></span></h4>
            </div>
            <div class="panel-body">

            </div>
          </div>
        </div>
      </div>
      <div class="gb-dummy-height">

      </div>
    </div>
  </div>
  <div class="tab-pane gb-full" id="goal-mentorships-mentoring-pane">
    <div class="gb-full col-lg-4 col-sm-12 col-xs-12 gb-no-padding gb-background-blue-1">
      <br>
      <ul id="gb-mentorship-all-activity-nav" class="gb-side-nav-1">
        <li class="active"><a href="#gb-mentorship-mentoring-all-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">All</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-mentoring-in-progress-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">In Progress</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-mentoring-completed-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Completed</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
      </ul>
    </div>
    <div class="gb-full col-lg-8 col-sm-12 col-xs-12 gb-blue-background gb-no-padding">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="">My Mentoring</h4>
        </div>
        <div class="panel-body">
          <div id="skill-posts"class="row">
            <?php foreach ($mentoringList as $mentorship): ?>
              <?php
              echo $this->renderPartial('_mentorship_row', array(
               "mentorship" => $mentorship,
              ));
              ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane gb-full" id="goal-mentorships-enrolled-pane">
    <div class="gb-full col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding gb-background-blue-1">
      <ul id="gb-mentorship-all-activity-nav" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-skill-leftbar">
        <li class="active"><a href="#gb-mentorship-enrolled-in-progress-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">In Progress</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-enrolled-completed-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Completed</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-enrolled-archived-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Archived</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
      </ul>
    </div>
    <div class="gb-full col-lg-8 col-md-4 col-sm-8 col-xs-12 gb-blue-background gb-no-padding">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="">Mentorship Enrolled</h4>
        </div>
        <div class="panel-body">
          <div id="skill-posts"class="row-fluid rm-row rm-container">
            <?php foreach (Mentorship::getMentorshipEnrolledList() as $mentorship): ?>
              <?php
              echo $this->renderPartial('_mentorship_row', array(
               "mentorship" => $mentorship,
              ));
              ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="gb-dummy-height">

      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->

<?php
echo $this->renderPartial('mentorship.views.mentorship.modals._send_enroll_request', array());
?>
<?php
echo $this->renderPartial('application.views.site.modals._request_sent_notification', array(
));
?>
<?php $this->endContent(); ?>