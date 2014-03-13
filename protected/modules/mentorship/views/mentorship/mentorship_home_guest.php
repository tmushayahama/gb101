<?php $this->beginContent('//nav_layouts/guest_nav'); ?>
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
  <div id="" class="span9">
    <h2 class="sub-heading-9">Mentorships</h2>
     <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Not Logged In</strong> you will be limited.<br>
      You can only see mentorships shared publicly.<br>
      You cannot enroll to a mentorship.<br>
      You cannot mentor someone
    </div>
    <div class=" row-fluid">
      <ul id="gb-mentorship-all-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
        <li class="active"><a href="#gb-mentorship-all-list-pane" data-toggle="tab">List<i class="icon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-all-requests-pane" data-toggle="tab">Requests<i class="icon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-all-reviews-pane" data-toggle="tab">Reviews<i class="icon-chevron-right pull-right"></i></a></li>
      </ul>
      <div class="gb-skill-activity-content">
        <div class="tab-content row-fluid">
          <div class="tab-pane active" id="gb-mentorship-all-list-pane">
           <div id="skill-posts"class="row-fluid rm-row rm-container">
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
            <?php foreach ($mentorshipRequests as $mentorshipRequest): ?>
              <?php
              echo $this->renderPartial('_mentorship_request_row', array(
               "mentorshipRequest" => $mentorshipRequest,
              ));
              ?>
            <?php endforeach; ?>
          </div>
          <div class="tab-pane" id="gb-mentorship-all-reviews-pane">
            <h4 class="sub-heading-6"><a>Mentorships Reviews</a><a class="pull-right"><i><small></small></i></a></h4>

          </div>
          <div class="tab-pane" id="gb-mentorship-all-favorites-pane">
            <h4 class="sub-heading-6"><a>Mentorships Favorites</a><a class="pull-right"><i><small></small></i></a></h4>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="" class="span3">
    <div class="row-fluid">
      <?php
      echo $this->renderPartial('user.views.user.registration', array(
       'registerModel' => $registerModel,
       'profile' => $profile
      ));
      ?>
    </div>
  </div>
</div> 

<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
 'loginModel' => $loginModel
));
?>
<?php $this->endContent(); ?>