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
<div class="row">
  <div class="col-lg-8 col-sm-12 col-xs-12">
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-body">
          <h2 class="sub-heading-9">Mentorships</h2>
        </div>
      </div>
    </div>
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Not Logged In</strong> you will be limited.<br>
      You can only see mentorships shared publicly.<br>
      You cannot enroll to a mentorship.<br>
      You cannot mentor someone
    </div>
    <div class="row gb-bottom-border-grey-3">
      <h4 class="pull-left">Mentorships</h4>
      <ul id="gb-mentorship-all-activity-nav" class="pull-right gb-nav-1">
        <li class="active"><a href="#gb-mentorship-all-list-pane" data-toggle="tab">List<i class="icon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-all-requests-pane" data-toggle="tab">Requests<i class="icon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-all-reviews-pane" data-toggle="tab">Reviews<i class="icon-chevron-right pull-right"></i></a></li>
      </ul>
    </div>
    <br>
    <div class="row">
      <div class="tab-content row-fluid">
        <div class="tab-pane active" id="gb-mentorship-all-list-pane">
          <div class="input-group input-group-lg">
            <input class="form-control" id="gb-mentorship-keyword-search-input" type="text" placeholder="Search skills, e.g. design, software...">
            <div class="input-group-btn">
              <button id="gb-mentorship-keyword-search-btn" class="btn btn-primary" >
                <i class='glyphicon glyphicon-search'></i>
              </button>
            </div>
          </div>
          <br>
          <div id="skill-posts"class="row">
            <?php foreach ($mentorships as $mentorship): ?>
              <?php
              echo $this->renderPartial('_mentorship_row', array(
               "mentorship" => $mentorship,
              ));
              ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="tab-pane" id="gb-mentorship-all-requests-pane">
          <div class="input-group input-group-lg">
            <input class="form-control" id="gb-mentorship-keyword-search-input" type="text" placeholder="Search skills, e.g. design, software...">
            <div class="input-group-btn">
              <button id="gb-mentorship-keyword-search-btn" class="btn btn-primary" >
                <i class='glyphicon glyphicon-search'></i>
              </button>
            </div>
          </div>
          <br>
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
  <div class="col-lg-4 col-sm-12 col-xs-12">
    <div class="row">
      <div class="panel panel-default">
        <h4 class="panel-heading">Skills To Explore</h4>
        <div class="panel-body">

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