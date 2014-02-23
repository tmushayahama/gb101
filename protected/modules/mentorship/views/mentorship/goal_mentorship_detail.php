<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_mentorship_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var mentorshipDescription = "<?php echo $goalMentorship->description ?>";
  var editDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/editDetail", array()); ?>";
  var acceptMentorshipEnrollmentUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/acceptMentorshipEnrollment", array("mentorshipId" => $goalMentorship->id)); ?>";

  // $("#gb-topbar-heading-title").text("Skills");
</script>
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
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
      <div id="gb-header" class="row-fluid box-5-height">
        <div class="mentorship-info-container span8" mentorship-id="<?php echo $goalMentorship->id; ?>">
          <div class="gb-post-title">
            <span class="span1">
              <h4>By: </h4>
            </span> 
            <span class="span1">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
            </span>
            <span class="span10">
              <a><h5><?php echo $goalMentorship->owner->profile->firstname . " " . $goalMentorship->owner->profile->lastname ?></h5></a>
            </span>
          </div>
          <div class="gb-content row-fluid box-3-height">
            <span class="span12">
              <h4 class="gb-page-title"><?php echo $goalMentorship->goal->title; ?></h4>
              <p class="gb-mentorship-description"> <?php echo $goalMentorship->description ?> </p>
              <strong>
                <a href="<?php echo Yii::app()->createUrl('skill/skill/skilldetail', array('skillListId' => $goalMentorship->goal->id)); ?>"><i>See Skill Detail Here</i></a>
              </strong>
            </span>
          </div>
          <div class="gb-footer">
            <a class="gb-btn">Share</a>
            <div class="pull-right">
              <?php if (Mentorship::viewerPrivilege($goalMentorship->id) == Mentorship::$IS_OWNER): ?>
                <button id="gb-mentorship-edit-btn" class="gb-btn gb-btn-blue-2">Edit</button>
                <button class="gb-btn gb-btn-grey-1">Delete</button>
              <?php elseif (Mentorship::viewerPrivilege($goalMentorship->id) == Mentorship::$IS_NOT_ENROLLED): ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="gb-content-edit hide box-3-height row-fluid">
            <span class="span12">
              <dl class="dl-horizontal">
                <dt>Title</dt>
                <dd><input class="input-block-level" 
                           value="<?php echo $goalMentorship->title ?>"
                           type="text" readonly></dd>
                <dt>Description</dt>
                <dd>
                  <textarea id="gb-mentorship-description-edit-input" class="input-block-level" rows="3" maxlength=250>
                  </textarea>
                </dd>
              </dl>
            </span>
          </div>
          <div class="gb-footer-edit hide">
            <button id="gb-mentorship-edit-save-btn" class="gb-btn gb-btn-blue-2">Save</button>
            <button id="gb-mentorship-edit-cancel-btn" class="gb-btn gb-btn-grey-1">Cancel</button>
          </div>
        </div>
        <div id="home-activity-stats" class=" span4">
          <h5 class="sub-heading-7">Mentees</h5>
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
      <br>
      <br>
      <div class=" row-fluid gb-bottom-border-grey-3">
        <h4 class="pull-left">Mentorship</h4>
        <ul id="gb-mentorship-detail-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#goal-mentorship-all-pane" data-toggle="tab">Welcome</a></li>
          <li class=""><a href="#goal-mentorship-activities-pane" data-toggle="tab">Activities</a></li>
          <li class=""><a href="#goal-mentorship-timeline-pane" data-toggle="tab">Timeline</a></li>
          <li class=""><a href="#goal-mentorship-settings-pane" data-toggle="tab">Settings</a></li>
        </ul>
      </div>
      <div class=" row-fluid">
        <div class="tab-content">
          <div class="tab-pane active " id="goal-mentorship-all-pane">
            <br>
            <h1>Welcome</h1>
            <br>

            <h4 class="sub-heading-7">These are some pages I worked on </h4><br>
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
                  <h3>Web Links <a id="gb-add-weblink-modal-trigger" skill-id="<?php //echo $skillCommitment->id;                                                         ?> " class="pull-right">New Web Link</a></h3>
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
    <div id="gb-home-sidebar" class="span3">
      <h5 class="sub-heading-7"><a>Pages Todos</a><a class="pull-right"><i><small>View All</small></i></a></h5>
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

<?php $this->endContent() ?>