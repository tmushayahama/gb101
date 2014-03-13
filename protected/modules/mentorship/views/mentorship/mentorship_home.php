<?php $this->beginContent('//nav_layouts/site_nav'); ?>
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
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
      <!--  <div id="gb-home-header" class="row-fluid">
          <div class="span3">
            <img href="#" src="<?php //echo Yii::app()->request->baseUrl . "/img/mentorship_icon_3.png";   ?>" alt="">
          </div>
          <div class="connectiom-info-container span5">
            <ul class="nav nav-stacked connectiom-info span12">
              <h3 class="name">Mentorship</h3>
              <li class="connectiom-description">
                <p>Learn/Teach a skill/goal from someone <br>
                  <small><i></i></small><p>
              </li>
            </ul>
          </div> 
          <ul id="home-activity-stats" class="nav nav-stacked row-fluid span4">
            <li>
              <a class="">
                <i class="icon-tasks"></i>  
                Mentorships
                <span class="pull-right"> 
      <?php //echo Mentorship::getAllMentorshipListCount(); ?>
                </span>
              </a>
            </li>
            <li>
              <a class="">
                <i class="icon-tasks"></i>  
                Mentorships Enrolled
                <span class="pull-right"> 
      <?php //echo Mentorship::getMentorshipEnrolledListCount(); ?>
                </span>
              </a>
            </li>
            <li>
              <a class="">
                <i class="icon-tasks"></i>  
                Mentoring
                <span class="pull-right"> 
      <?php //echo Mentorship::getMentoringListCount(); ?>
                </span>
              </a>
            </li>
          </ul>
        </div> -->
      <div class=" row-fluid gb-bottom-border-grey-3">
        <h4 class="pull-left">Mentorships</h4>
        <ul id="gb-mentorship-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#goal-mentorships-all-pane" data-toggle="tab">All</a></li>
          <li class=""><a href="#goal-mentorships-mentoring-pane" data-toggle="tab">Mentoring</a></li>
          <li class=""><a href="#goal-mentorships-enrolled-pane" data-toggle="tab">Enrolled</a></li>
        </ul>
      </div>
      <div class=" row-fluid">
        <div class="tab-content">
          <div class="tab-pane active " id="goal-mentorships-all-pane">
            <ul id="gb-mentorship-all-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
              <li class="active"><a href="#gb-mentorship-all-list-pane" data-toggle="tab">List<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-mentorship-all-requests-pane" data-toggle="tab">Requests<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-mentorship-all-reviews-pane" data-toggle="tab">Reviews<i class="icon-chevron-right pull-right"></i></a></li>
              <li class=""><a href="#gb-mentorship-all-favorites-pane" data-toggle="tab">List<i class="icon-chevron-right pull-right"></i></a></li>
            </ul>
            <div class="gb-skill-activity-content">
              <div class="tab-content row-fluid">
                <div class="tab-pane active" id="gb-mentorship-all-list-pane">
                  <div class="gb-pages-start-writing row-fluid">
                    <div class="span10">
                      <input class="input-block-level" type="text" placeholder="Search mentorship by anything, e.g. fighting"></div>
                    <div class="span2">
                      <button  class="btn">Search</button>
                    </div>
                  </div>
                  <h3 class="sub-heading-9"><a>Recent Mentorships</a><a class="pull-right"><i><small></small></i></a></h3>
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
                  <?php foreach (GoalList::getGoalList(GoalType::$CATEGORY_SKILL, 0, GoalLevel::$NAME_SKILL_GAINED) as $skillListItem): ?>
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
    <div id="gb-home-sidebar" class="span3">
      <h5 class="sub-heading-7"><a>Global Todos</a><a class="pull-right"><i><small>View All</small></i></a></h5>
      <div id="gb-todos-sidebar" class="row-fluid">
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th class="by"></th>
              <th class="task">Task</th>
              <th class="date">Assigned</th>
              <th class="puntos">Puntos</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($todos as $todo): ?>
              <tr>
                <?php
                echo $this->renderPartial('application.views.site.summary_sidebar._todos', array(
                 'todo' => $todo->goal->description,
                 'todo_puntos' => $todo->goal->points_pledged
                ));
                ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="">
          <span class="span7">
          </span>
          <span class="span5">
            <button class="pull-right gb-btn gb-btn-color-white gb-btn-blue-2"><i class="icon-white icon-pencil"></i> Edit</button>
          </span> 
        </div>
      </div>
      <h5 id="gb-view-connection-btn" class="sub-heading-7"><a>Add People</a><a class="pull-right"><i><small>View All</small></i></a></h5>
      <div class="box-6-height">
        <?php foreach ($nonConnectionMembers as $nonConnectionMember): ?>				
          <?php
          echo $this->renderPartial('application.views.site.summary_sidebar._add_people', array(
           'nonConnectionMember' => $nonConnectionMember
          ));
          ?>
        <?php endforeach; ?>
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
)); ?>
<?php $this->endContent(); ?>