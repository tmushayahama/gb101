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
  Yii::app()->baseUrl . '/js/gb_mentorship_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_home.js', CClientScript::POS_END
);
?>
<script id="" type="text/javascript">
  var sendConnectionMemberRequestUrl = "<?php echo Yii::app()->createUrl("site/sendconnectionmemberrequest"); ?>";
  var displayAddConnectionMemberFormUrl = "<?php echo Yii::app()->createUrl("site/displayaddconnectionmemberform"); ?>";
  var indexUrl = "<?php echo Yii::app()->createUrl("site/index"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
  var appendMoreSkillUrl = "<?php echo Yii::app()->createUrl("skill/skill/appendMoreSkill"); ?>";

  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";

  var mentorshipRequestUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipRequest"); ?>";

</script>
<div class="gb-background hidden-sm hidden-xs">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-1 col-lg-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6"></div>
  </div>
</div>
<div class="container">
  <div class="gb-background-dark-1 gb-full col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-home-left-nav">
    <br>
    <div class="gb-top-heading row">
      <h1 class="">Home</h1>
    </div>
    <br>
    <div class="panel-group" id="gb-getting-started">
      <div class="panel gb-no-padding">
        <h3 class="gb-heading-1"> 
          <a class="" data-toggle="collapse" data-parent="#gb-getting-started" href="#collapseOne">
            Wondering how it works.
          </a>
        </h3>
        <div id="collapseOne" class="panel-collapse collapse in">
          <div class="panel-body gb-no-padding">
            <a id="gb-start-tour-btn" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
              <div class="thumbnail">
                <img  class="hidden-xs" href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/take_tour_icon_2.png" alt="">
                <div class="caption">
                  <h5 class="">Take A Tour</h5>
                </div>
              </div>
            </a>
            <a id='gb-start-skill-tour-btn' class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
              <div class="gb-step-display hidden-xs">1</div>
              <div class="thumbnail">
                <img class="hidden-xs" href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/define_skill_icon.png" alt="">
                <div class="caption">
                  <h5 class="">List your skills</h5>
                </div>
              </div>
            </a>
            <a id="gb-explore-tour-btn" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
              <div class="gb-step-display hidden-xs">2</div>
              <div class="thumbnail">
                <img class="hidden-xs" href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/explore_skill_icon.png" alt="">
                <div class="caption">
                  <h5 class="">Explore & Discover</h5>
                </div>
              </div>
            </a>
            <a class="col-lg-3 col-md-3 col-sm-6 col-xs-12 gb-padding-thin">
              <div class="gb-step-display hidden-xs">3</div>
              <div class="thumbnail">
                <img class="hidden-xs" href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/apply_skill_icon.png" alt="">
                <div class="caption">
                  <h5 class="">Apply Skills</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div id="gb-primary-apps-panel" class="panel panel-default panel-borderless">
      <h3 class="gb-heading-1">
        Primary Apps
        <span class="pull-right badge badge-info">3</span>
      </h3>
      <div class="row gb-home-nav">
        <a id="gb-tour-skill-1" class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
           gb-form-slide-target="#gb-skill-list-form-container"
           gb-form-target="#gb-skill-list-form">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_1.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Add a<br>Skill</h5>
            </div>
          </div>
        </a>
        <a id="" class="gb-disabled-1 gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
           gb-form-slide-target="#gb-goal-list-form-container"
           gb-form-target="#gb-goal-list-form">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_1.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Add a<br>Goal</h5>
            </div>
          </div>
        </a>
        <a id="" class="gb-disabled-1 gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
           gb-form-slide-target="#gb-promise-list-form-container"
           gb-form-target="#gb-goal-list-form">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_1.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Ad a<br>Promise</h5>
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
         'skillLevelList' => $skillLevelList));
        ?>
      </div>
    </div>
    <br>
    <div id="gb-secondary-apps-panel" class="panel panel-default panel-borderless">
      <h3 class="gb-heading-1">
        Secondary Apps
        <span class="pull-right badge badge-info">6</span>
      </h3>
      <div class="row gb-home-nav">
        <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
           gb-form-slide-target="#gb-mentorship-form-container"
           gb-form-target="#gb-mentorship-form">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_1.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Create a<br>Mentorship</h5>
            </div>
          </div>
        </a>
        <a class="gb-form-show gb-backdrop-visible gb-advice-page-form-slide col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
           gb-form-slide-target="#gb-advice-page-form-container"
           gb-form-target="#gb-advice-page-form">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_1.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Add an<br>Advice</h5>
            </div>
          </div>
        </a>
        <a class="gb-disabled-1 gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_bank_icon_1.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Add to<br>Skill Bank</h5>
            </div>
          </div>
        </a>
      </div>
      <div id="gb-mentorship-form-container" class="gb-hide gb-panel-form">
        <?php
        echo $this->renderPartial('mentorship.views.mentorship.forms._add_mentorship_form', array(
         'formType' => GoalType::$FORM_TYPE_MENTORSHIP_HOME,
         'mentorshipModel' => $mentorshipModel,
         'mentorshipLevelList' => $mentorshipLevelList));
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

        <a class="gb-disabled-1 gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/daily_journal_icon_1.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Create A<br>Journal</h5>
            </div>
          </div>
        </a>
        <a class="gb-disabled-1 gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/just_answer_icon_1.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">About your<br>Skills</h5>
            </div>
          </div>
        </a>

        <a class="gb-disabled-1 gb-make-template-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/more_icon_1.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center"><br>See More</h5>
            </div>
          </div>
        </a>
      </div>
      <!--
      <div id="gb-connections-panel" class="panel panel-default gb-disabled">
        <h3 class="gb-heading-1"><a>
            My Connections
            <span class="pull-right badge badge-info">5</span>
          </a>
        </h3>
        <div class="panel-body gb-no-padding">
          
           <div class="row">
            <a href="" class="home-menu-box-2 col-lg-12 col-sm-12 col-xs-12">
              <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl . "/img/gb_public.png";               ?>" alt="">
              <div class="menu-heading">
                <h4>Public</h4>
              </div>
            </a>
           
      <?php //foreach ($connections as $connection): ?>
              <a href="<?php //echo Yii::app()->createUrl("connection/connection/connection", array('connectionId' => $connection->id));               ?>" class="home-menu-box-2 col-lg-12 col-sm-12 col-xs-12">
                <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture;               ?>" alt="">
                <div class="menu-heading">
                  <h4>
      <?php //echo $connection->name ?>
                  </h4>
                </div>
              </a>
      <?php //endforeach; ?>
           
          </div>
        </div>
     
    </div> -->
    </div>
    <br>
    <div id="gb-tertiary-apps-panel" class="panel panel-default panel-borderless">
      <h3 class="gb-heading-1">
        Tertiary Apps
        <span class="pull-right badge badge-info">6</span>
      </h3>
      <div class="row gb-home-nav">
        <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
           gb-form-slide-target="#gb-project-form-container"
           gb-form-target="#gb-project-form">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/project_icon_1.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Create a<br>Project</h5>
            </div>
          </div>
        </a>
        <a class="gb-disabled-1 gb-make-template-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/groups_icon_1.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Create a<br>Group</h5>
            </div>
          </div>
        </a>
      </div>
      <div id="gb-project-form-container" class="gb-hide gb-panel-form">
        <?php
        echo $this->renderPartial('project.views.project.forms._project_form', array(
         'projectModel' => $projectModel));
        ?>
      </div>
    </div>
  </div>
  <div id="gb-home-activity" class="gb-full col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding gb-background-light-grey-1">
    <div class="row">
      <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-nav-for-background-1 gb-skill-leftbar">
        <li class="active col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-home-all-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">All Activities</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
        <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-my-home-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Activities</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
      </ul>
    </div>
    <br>
    <div class="tab-content row gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
      <div class="tab-pane active" id="gb-home-all-pane">
        <h3 class="gb-heading-2">Recent Activities</h3>
        <div id="gb-posts" class="panel-body gb-no-padding gb-background-light-grey-1">
          <br>
          <?php
          foreach ($postShares as $postShare):
            switch ($postShare->post->type) {
              case Post::$TYPE_GOAL_LIST:
                $skillListItem = GoalList::model()->findByPk($postShare->post->source_id);
                echo $this->renderPartial('skill.views.skill._skill_list_post_row', array(
                 'skillListItem' => $skillListItem,
                 'source' => GoalList::$SOURCE_SKILL
                ));
                break;
              case Post::$TYPE_MENTORSHIP:
                $mentorship = Mentorship::model()->findByPk($postShare->post->source_id);
                echo $this->renderPartial('mentorship.views.mentorship._mentorship_row', array(
                 "mentorship" => $mentorship,
                ));
                break;
              case Post::$TYPE_NEED_MENTEE:
                $mentorshipRequest = Notification::model()->findByPk($postShare->post->source_id);
                if ($mentorshipRequest != null) {
                  echo $this->renderPartial('mentorship.views.mentorship._mentorship_request_row', array(
                   "mentorshipRequest" => $mentorshipRequest,
                  ));
                }
                break;
              case Post::$TYPE_ADVICE_PAGE:
                $advicePage = AdvicePage::model()->findByPk($postShare->post->source_id);
                echo $this->renderPartial('pages.views.pages._goal_page_row', array(
                 "advicePage" => $advicePage,
                ));
                break;
            }
          endforeach;
          ?>
        </div>
      </div>
      <div class="tab-pane" id="gb-my-home-pane">
        <h3 class="gb-heading-2">My Activities</h3>
      </div>
    </div>
  </div>
  <!--- ----------------------------HIDDEN THINGS ------------------------->
  <div id="gb-forms-home" class="gb-hide">

  </div>
  <!-- -------------------------------MODALS --------------------------->
  <?php
  echo $this->renderPartial('application.views.site.modals._send_request_modal', array(
   "requestModel" => $requestModel,
   "modalType" => Type::$REQUEST_SHARE));
  ?>

  <?php
  echo $this->renderPartial('connection.views.modals._add_connection_member_modal', array(
   'connectionMemberModel' => $connectionMemberModel
  ));
  ?>
  <?php echo $this->renderPartial('skill.views.skill.modals.request_mentorship', array()); ?>
  <?php echo $this->renderPartial('mentorship.views.mentorship.modals._send_enroll_request', array());
  ?>
  <?php
  echo $this->renderPartial('application.views.site.modals._share_with_modal'
    , array("people" => $people,
   "modalType" => Type::$SKILL_SHARE,
   "modalId" => "gb-skill-share-with-modal"));
  ?>
  <?php
  echo $this->renderPartial('application.views.site.modals._share_with_modal'
    , array("people" => $people,
   "modalType" => Type::$MENTORSHIP_SHARE,
   "modalId" => "gb-mentorship-share-with-modal"));
  ?>
  <?php
  echo $this->renderPartial('application.views.site.modals._share_with_modal'
    , array("people" => $people,
   "modalType" => Type::$PAGE_SHARE,
   "modalId" => "gb-page-share-with-modal"));
  ?>


  <?php
  echo $this->renderPartial('application.views.site.modals._tags_modal'
    , array("tags" => $tags,
   "modalId" => "gb-skill-tags-modal"));
  ?>


  <?php
  echo $this->renderPartial('application.views.site.modals._request_sent_notification', array(
  ));
  ?>
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
