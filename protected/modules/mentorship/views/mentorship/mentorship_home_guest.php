<?php $this->beginContent('//layouts/gb_main2'); ?>
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
  // $("#gb-topbar-heading-title").text("Skills");
</script> 
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h2 class="pull-left">Mentorships</h2>
    <ul id="gb-mentorship-all-activity-nav" class="pull-right gb-nav-1">
      <li class="active"><a href="#goal-mentorships-all-pane" data-toggle="tab">All</a></li>
      <li class="gb-disabled"><a href="#goal-mentorships-mentoring-pane" data-toggle="tab">Mentoring</a></li>
      <li class="gb-disabled"><a href="#goal-mentorships-enrolled-pane" data-toggle="tab">Enrolled</a></li>
    </ul>
  </div>
</div>
<div class="container">
  <div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Not Logged In</strong> you will be limited.<br>
    You can only see mentorships shared publicly.<br>
    You cannot enroll to a mentorship.<br>
    You cannot mentor someone
  </div>
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-padding-thin gb-blue-background">
      <div class="tab-content row">
        <div class="tab-pane active " id="goal-mentorships-all-pane">
          <div class="col-lg-4 col-sm-12 col-xs-12 gb-padding-thin">
            <div class=" row">
              <div id="" class="input-group input-group-sm">
                <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search mentorship by anything, e.g. fighting">
                <div class="input-group-btn">
                  <button id="gb-mentorship-keyword-search-btn" class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
            </div>
            <br>
            <ul id="gb-mentorship-all-activity-nav" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-skill-leftbar">
              <li class="active"><a href="#gb-mentorship-all-list-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Recent</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-mentorship-all-requests-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Requests</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
             </ul>
          </div>
          <div class="col-lg-8 col-sm-12 col-xs-12 gb-white-background gb-no-padding">
            <div class="tab-content row">
              <div class="tab-pane active" id="gb-mentorship-all-list-pane">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="">Recent Mentorships</h4>
                  </div>
                  <div id="skill-posts"class="panel-body">
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
            </div>
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