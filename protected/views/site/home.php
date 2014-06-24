<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_mentorship_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var addSkillListUrl = "<?php echo Yii::app()->createUrl("skill/skill/addskilllist", array('connectionId' => 0, 'source' => "home", 'type' => GoalList::$TYPE_SKILL)); ?>";
  var editSkillListUrl = "<?php echo Yii::app()->createUrl("skill/skill/editskilllist", array('connectionId' => 0, 'source' => "home", 'type' => GoalList::$TYPE_SKILL)); ?>";
  var sendConnectionMemberRequestUrl = "<?php echo Yii::app()->createUrl("site/sendconnectionmemberrequest"); ?>";
  var createConnectionUrl = "<?php echo Yii::app()->createUrl("site/createconnection"); ?>";
  var displayAddConnectionMemberFormUrl = "<?php echo Yii::app()->createUrl("site/displayaddconnectionmemberform"); ?>";
  var indexUrl = "<?php echo Yii::app()->createUrl("site/index"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
  var addMentorshipUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()); ?>";
  var addAdvicePageUrl = "<?php echo Yii::app()->createUrl("pages/pages/addAdvicePage", array()); ?>";
  var advicePageDetailUrl = "<?php echo Yii::app()->createUrl("pages/pages/advicePageDetail", array()); ?>";
  var mentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array()); ?>";
  var appendMoreSkillUrl = "<?php echo Yii::app()->createUrl("skill/skill/appendMoreSkill"); ?>";


  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";

  var goalMentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array('mentorshipId' => 0)); ?>";

  var mentorshipRequestUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipRequest"); ?>";

</script>
<div class="container-fluid gb-heading-bar-1">
  <div class="gb-nav-bar-1-contaner row">
    <div class="container">
      <div class="panel-group" id="gb-getting-started">
        <div class="panel">
          <div class="panel-heading">
            <a class="btn btn-link" data-toggle="collapse" data-parent="#gb-getting-started" href="#collapseOne">
              Wondering how it works, check out the <strong>Getting Started Tours.</strong>
            </a>
          </div>
          <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body gb-padding-thin">
              <a id="gb-start-tour-btn" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
                <div class="thumbnail">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/take_tour_icon_2.png" alt="">
                  <div class="caption">
                    <h4 class="text-center">Take A Tour</h4>
                  </div>
                </div>
              </a>
              <a id='gb-start-skill-tour-btn' class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
                <div class="gb-step-display">1</div>
                <div class="thumbnail">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/define_skill_icon.png" alt="">
                  <div class="caption">
                    <h4 class="text-center">List your skills</h4>
                    <p class="text-center">Skills you have gained, skills to improve or skills to learn.</p>
                  </div>
                </div>
              </a>
              <a id="gb-explore-tour-btn" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
                <div class="gb-step-display">2</div>
                <div class="thumbnail">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/explore_skill_icon.png" alt="">
                  <div class="caption">
                    <h4 class="text-center">Explore & Discover</h4>
                    <p class="text-center">Check out Skill Bank, See other people's skills.</p>
                  </div>
                </div>
              </a>
              <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
                <div class="gb-step-display">3</div>
                <div class="thumbnail">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/apply_skill_icon.png" alt="">
                  <div class="caption">
                    <h4 class="text-center">Apply Skills</h4>
                    <p class="text-center">Apply with our applications. More to come.</p>
                  </div>
                </div>
              </a>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="gb-top-heading row">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/home_icon_6.png" alt="">
      <h2 class="pull-left">Home</h2>
    </div>
  </div>

</div>
<div class="container">
  <div class="gb-background-blue-1 gb-full col-lg-4 col-sm-3 col-xs-12 gb-home-left-nav">
    <br>
    <div id="gb-instruments-panel" class="panel panel-default panel-borderless">
      <h3 class="gb-heading-1">
        Instruments
        <span class="pull-right badge badge-info">3</span>
      </h3>
      <div class="row gb-home-nav">
        <a id="gb-tour-skill-1" class="gb-form-show gb-backdrop-visible col-lg-4 col-md-3 col-sm-2 col-xs-2 gb-no-padding"
           gb-form-slide-target="#gb-skill-list-form-container"
           gb-form-target="#gb-skill-list-form">
          <div class="thumbnail">
            <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_7.png" alt="">
            <div class="caption">
              <h5 class="text-center"><br>Add Skill</h5>
            </div>
          </div>
        </a>
        <a id="" class="gb-disabled gb-form-show gb-backdrop-visible col-lg-4 col-md-3 col-sm-2 col-xs-2 gb-no-padding"
           gb-form-slide-target="#gb-goal-list-form-container"
           gb-form-target="#gb-goal-list-form">
          <div class="thumbnail">
            <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_7.png" alt="">
            <div class="caption">
              <h5 class="text-center"><br>Add Goal</h5>
            </div>
          </div>
        </a>
        <a id="" class="gb-disabled gb-form-show gb-backdrop-visible col-lg-4 col-md-3 col-sm-2 col-xs-2 gb-no-padding"
           gb-form-slide-target="#gb-promise-list-form-container"
           gb-form-target="#gb-goal-list-form">
          <div class="thumbnail">
            <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_7.png" alt="">
            <div class="caption">
              <h5 class="text-center"><br>Add Promise</h5>
            </div>
          </div>
        </a>
      </div>
      <div id="gb-skill-list-form-container" class="row gb-hide gb-panel-form">
        <?php
        echo $this->renderPartial('skill.views.skill._add_skill_list_form', array(
         'formType' => GoalType::$FORM_TYPE_SKILL_HOME,
         'skillModel' => $skillModel,
         'skillListModel' => $skillListModel,
         'skillLevelList' => $skillLevelList,
         'skillListShare' => $skillListShare));
        ?>
      </div>
    </div>
    <br>
    <div id="gb-applications-panel" class="panel panel-default panel-borderless">
      <h3 class="gb-heading-1">
        Applications
        <span class="pull-right badge badge-info">6</span>
      </h3>
      <div class="row gb-home-nav">
        <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-2 col-sm-2 col-xs-2 gb-no-padding"
           gb-form-slide-target="#gb-mentorship-form-container"
           gb-form-target="#gb-mentorship-form">
          <div class="thumbnail">
            <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_7.png" alt="">
            <div class="caption">
              <h5 class="text-center">Add<br>Mentorship</h5>
            </div>
          </div>
        </a>
        <a class="gb-form-show gb-backdrop-visible gb-advice-page-form-slide col-lg-4 col-md-2 col-sm-2 col-xs-2 gb-no-padding"
           gb-form-slide-target="#gb-advice-page-form-container"
           gb-form-target="#gb-advice-page-form">
          <div class="thumbnail">
            <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_7.png" alt="">
            <div class="caption">
              <h5 class="text-center">Add<br>Advice</h5>
            </div>
          </div>
        </a>
        <a class="gb-disabled gb-journal-modal-trigger col-lg-4 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
          <div class="thumbnail">
            <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/daily_journal_icon_7.png" alt="">
            <div class="caption">
              <h5 class="text-center">Add To<br>Journal</h5>
            </div>
          </div>
        </a>
      </div>
      <div id="gb-mentorship-form-container" class="gb-hide gb-panel-form">
        <?php
        echo $this->renderPartial('mentorship.views.mentorship.forms._add_mentorship_form', array(
         'formType' => GoalType::$FORM_TYPE_MENTORSHIP_HOME,
         'mentorshipModel' => $mentorshipModel,
         'mentorshipLevelList' => $mentorshipLevelList,
         'skillGainedList' => $skillGainedList));
        ?>
      </div>
      <div id="gb-advice-page-form-container" class="gb-hide gb-panel-form">
        <?php
        echo $this->renderPartial('pages.views.pages.forms._add_advice_page_form', array(
         'formType' => GoalType::$FORM_TYPE_ADVICE_PAGE_HOME,
         'pageModel' => $pageModel,
         'advicePageModel' => $advicePageModel,
         'pageLevelList' => $pageLevelList));
        ?>
      </div>
      <div class="row gb-home-nav">
        <a class="gb-disabled gb-make-template-modal-trigger col-lg-4 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
          <div class="thumbnail">
            <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/just_answer_icon_7.png" alt="">
            <div class="caption">
              <h5 class="text-center">Just<br>Answer</h5>
            </div>
          </div>
        </a>
        <a class="gb-disabled gb-make-template-modal-trigger col-lg-4 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
          <div class="thumbnail">
            <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/more_icon_5.png" alt="">
            <div class="caption">
              <h5 class="text-center"><br>See More</h5>
            </div>
          </div>
        </a>
      </div>
      <br>
      <div id="gb-connections-panel" class="panel panel-default gb-disabled">
        <h3 class="gb-heading-1"><a>
            My Connections
            <span class="pull-right badge badge-info">5</span>
          </a>
        </h3>
        <div class="panel-body gb-no-padding">
          <div class="row">
            <a href="" class="home-menu-box-2 col-lg-12 col-sm-12 col-xs-12">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/gb_public.png"; ?>" alt="">
              <div class="menu-heading">
                <h4>Public</h4>
              </div>
            </a>
            <?php foreach ($connections as $connection): ?>
              <a href="<?php echo Yii::app()->createUrl("connection/connection/connection", array('connectionId' => $connection->id)); ?>" class="home-menu-box-2 col-lg-12 col-sm-12 col-xs-12">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture; ?>" alt="">
                <div class="menu-heading">
                  <h4>
                    <?php echo $connection->name ?>
                  </h4>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="gb-full col-lg-8 col-sm-9 col-xs-12 gb-no-padding gb-blue-background">
    <br>
    <div id="gb-home-activity" class="panel panel-default gb-side-margin-thick gb-no-padding gb-blue-background">
      <h3 class="gb-heading-2">Recent Activities</h3>
      <br>
      <div id="gb-home-posts" class="panel-body gb-no-padding gb-blue-background">
        <br>
        <?php
        $count = 1;
        foreach ($posts as $post):
          switch ($post->type) {
            case Post::$TYPE_GOAL_LIST:
              $skillListItem = GoalList::model()->findByPk($post->source_id);
              echo $this->renderPartial('skill.views.skill._skill_list_post_row', array(
               'skillListItem' => $skillListItem,
               'source' => GoalList::$SOURCE_SKILL
              ));
              break;
            case Post::$TYPE_MENTORSHIP:
              $mentorship = Mentorship::model()->findByPk($post->source_id);
              echo $this->renderPartial('mentorship.views.mentorship._mentorship_row', array(
               "mentorship" => $mentorship,
              ));
              break;
            case Post::$TYPE_MENTORSHIP_REQUEST:
              $mentorshipRequest = RequestNotification::model()->findByPk($post->source_id);
              if ($mentorshipRequest != null) {
                echo $this->renderPartial('mentorship.views.mentorship._mentorship_request_row', array(
                 "mentorshipRequest" => $mentorshipRequest,
                ));
              }
              break;
            case Post::$TYPE_ADVICE_PAGE:
              $advicePage = AdvicePage::model()->findByPk($post->source_id);
              echo $this->renderPartial('pages.views.pages._goal_page_row', array(
               "advicePage" => $advicePage,
              ));
              break;
          }
        endforeach;
        ?>
      </div>
    </div>
    <div class="gb-dummy-height">

    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('connection.views.modals._add_connection_member_modal', array(
 'connectionMemberModel' => $connectionMemberModel
));
?>
<?php echo $this->renderPartial('skill.views.skill.modals.request_mentorship', array()); ?>
<?php echo $this->renderPartial('mentorship.views.mentorship.modals._send_enroll_request', array());
?>
<?php
echo $this->renderPartial('application.views.site.modals._request_sent_notification', array(
));
?>
<div id="gb-view-connection-member-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="">My Connections
  </h2>
  <br>
  <div class="modal-body">
    <?php //foreach ($connections as $connection): ?>
    <?php
    //  echo $this->renderPartial('_user_connection__all', array(
    //  "connection" => $connection,
    // ));
    ?>
    <?php //endforeach;  ?>
  </div>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>

</div>
<div id="gb-request-confirmation-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="text-center text-success"> Your request has been sent</h2>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<div id="gb-accept-request-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="">Next Steps
  </h2>
  <div >
  </div>
</div>

<div id="gb-skill-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-skill-list-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Add Skill
      </div>
      <div class="modal-body gb-padding-thin">

      </div>
    </div>
  </div>
</div>
<?php
echo $this->renderPartial('skill.views.skill.modals.skill_bank_list', array("skillListBank" => $skillListBank));
?>
<div id="gb-mentorship-form-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-advice-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Add Mentorship
      </div>
      <div class="modal-body gb-padding-thin">

      </div>
    </div>
  </div>
</div>
<div id="gb-advice-page-form-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-advice-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Add Advice Page
      </div>
      <div class="modal-body gb-padding-thin">

      </div>
    </div>
  </div>
</div>
<?php $this->endContent() ?>
