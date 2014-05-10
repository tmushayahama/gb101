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
// $("#gb-topbar-heading-title").text("Skills");
</script> 
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h2 class="pull-left">Mentorships</h2>
    <ul id="gb-mentorship-all-activity-nav" class="pull-right gb-nav-1">
      <li class="active"><a href="#goal-mentorships-all-pane" data-toggle="tab">All</a></li>
      <li class=""><a href="#goal-mentorships-mentoring-pane" data-toggle="tab">Mentoring</a></li>
      <li class=""><a href="#goal-mentorships-enrolled-pane" data-toggle="tab">Enrolled</a></li>
    </ul>
  </div>
</div>
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-no-padding">

      <div class="tab-content row">
        <div class="tab-pane active " id="goal-mentorships-all-pane">
          <ul id="gb-mentorship-all-activity-nav" class="col-lg-3 col-sm-12 col-xs-12 gb-side-nav-1 gb-skill-leftbar">
            <li class="active"><a href="#gb-mentorship-all-list-pane" data-toggle="tab">List<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-mentorship-all-requests-pane" data-toggle="tab">Requests<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-mentorship-all-reviews-pane" data-toggle="tab">Reviews<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-mentorship-all-favorites-pane" data-toggle="tab">List<i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          </ul>
          <div class="col-lg-9 col-sm-12 col-xs-12">
            <div class="tab-content row">
              <div class="tab-pane active" id="gb-mentorship-all-list-pane">
                <div class="gb-pages-start-writing row-fluid">
                  <div id="" class="input-group input-group-md">
                    <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search mentorship by anything, e.g. fighting">
                    <div class="input-group-btn">
                      <button id="gb-mentorship-keyword-search-btn" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </div>
                </div>
                <br>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="">Recent Mentorships</h4>
                  </div>
                  <div id="skill-posts"class="panel-body gb-no-padding">
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
                <h3 class="sub-heading-9"><a>Mentorship Requests</a><a class="pull-right"><i><small></small></i></a></h3>
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
        <div class="tab-pane" id="goal-mentorships-mentoring-pane">
          <div class="gb-pages-start-writing row-fluid">
            <div class="row-fluid">
              <p><i>To manage the mentorship, you can only mentor a skill or a goal you've
                  listed in your skill gained or goal achieved. </i></p>
              <select id="gb-mentoring-goal-selector" class="input-block-level">
                <option value="" disabled="disabled" selected="selected">Select Goal/Skill</option>
                <?php foreach (GoalList::getGoalList(GoalType::$CATEGORY_SKILL, null, null, GoalLevel::$NAME_SKILL_GAINED) as $skillListItem): ?>
                  <option value="<?php echo $skillListItem->goal_id; ?>"><?php echo $skillListItem->goal->title; ?></option>
                <?php endforeach; ?>
              </select>
              <select id="gb-mentoring-level-selector" class="input-block-level">
                <option value="" disabled="disabled" selected="selected">Select Your Level</option>
                <?php for ($optionCount = 0; $optionCount < 4; $optionCount++): ?>
                  <option value="<?php echo $optionCount; ?>"><?php echo Mentorship::$OPTION_LEVEL[$optionCount]; ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <button id="gb-start-mentorship-btn" class="gb-btn gb-btn-blue-2">Start Mentoring</button>
          </div>
          <h4 class="sub-heading-6"><a>My Mentoring</a><a class="pull-right"><i><small></small></i></a></h4>
          <div id="skill-posts"class="row-fluid rm-row rm-container">
            <?php foreach (Mentorship::getMentoringList() as $mentorship): ?>
              <?php
              echo $this->renderPartial('_mentorship_row', array(
               "mentorship" => $mentorship,
              ));
              ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="tab-pane" id="goal-mentorships-enrolled-pane">
          <h4 class="sub-heading-6"><a>Mentorship Enrollment</a><a class="pull-right"><i><small></small></i></a></h4>
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