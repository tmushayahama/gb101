<?php $this->beginContent('//layouts/gb_main2'); ?>
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
$pendingRequest = Notification::getPendingRequest(
    array(Type::$SOURCE_MENTEE_REQUESTS , Type::$SOURCE_MENTOR_REQUESTS ), $mentorship->id)
?>

<script type="text/javascript">
</script>
<div class="container-fluid gb-heading-bar-1">
  <br>
  <?php
  echo $this->renderPartial('mentorship.views.mentorship.management._management_header', array(
   "mentorship" => $mentorship));
  ?>
   <div class="container">
    <div class="gb-top-heading">
      <h2 class="gb-ellipsis">Mentorship Management - <?php echo $mentorship->title; ?></h2>
    </div>
  </div>
  <div class="gb-nav-bar-1-contaner row">
    <div class="container">
      <ul id="" class="gb-nav-1">
        <li class=""><a href="#goal-mentorship-mentorships-pane" data-toggle="tab"><?php echo $mentorshipTypeName . '(s)'; ?></a></li>
        <li class="gb-disabled-1"><a href="#goal-mentorship-reports-pane" data-toggle="tab">Feedback & Reports</a></li>
        <li class="gb-disabled-1"><a href="#goal-mentorship-settings-pane" data-toggle="tab">Settings</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container">
  <div class="tab-content">
    <div class="tab-pane active" id="goal-mentorship-mentorships-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>
        <?php
        echo $this->renderPartial('mentorship.views.mentorship.management._summary_sidebar', array(
         "mentorship" => $mentorship,
         "advicePages" => $advicePages,
         "otherMentorships" => $otherMentorships));
        ?>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding gb-background-light-grey-1 ">
        <br>
        <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
          <h3 class="gb-heading-2"><?php echo $mentorshipTypeName, '(s)'; ?></h3>
          <br>  
          <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p>You are seeing the below <?php echo $mentorshipTypeName, '(s)'; ?> because you are either the mentorship owner, 
              mentor or mentee or the mentorship was shared to you</p>
          </div>
          <div class="row">
            <?php foreach ($mentorshipsEnrolled as $mentorshipEnrolled): ?>
              <?php
              echo $this->renderPartial('mentorship.views.mentorship._mentorship_access_badge', array(
               "mentorshipEnrolled" => $mentorshipEnrolled));
              ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="goal-mentorship-reports-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-background-dark-4 gb-no-padding">
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
<?php $this->endContent(); ?>