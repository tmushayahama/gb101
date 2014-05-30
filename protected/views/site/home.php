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
  var sendConnectionMemberRequestUrl = "<?php echo Yii::app()->createUrl("site/sendconnectionmemberrequest"); ?>";
  var createConnectionUrl = "<?php echo Yii::app()->createUrl("site/createconnection"); ?>";
  var displayAddConnectionMemberFormUrl = "<?php echo Yii::app()->createUrl("site/displayaddconnectionmemberform"); ?>";
  var indexUrl = "<?php echo Yii::app()->createUrl("site/index"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
  var addMentorshipUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()); ?>";
  var addAdvicePageUrl = "<?php echo Yii::app()->createUrl("pages/pages/addAdvicePage", array()); ?>";
  var advicePageDetailUrl = "<?php echo Yii::app()->createUrl("pages/pages/advicePageDetail", array()); ?>";
  var mentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array()); ?>";


  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";

  var goalMentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array('mentorshipId' => 0)); ?>";

  var mentorshipRequestUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipRequest"); ?>";

</script>
<div class="container">
  <div id="gb-start-tour-btn" class="btn btn-default col-lg-12 col-sm-12 col-xs-12 alert alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h5 class="text-info">Take a Tour - My Skills Page</h5>
  </div>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-no-padding">
      <div class="row gb-blue-background gb-padding-thin ">
        <div class="col-lg-3 col-sm-3 col-xs-12 gb-home-left-nav">
          <div id="gb-instruments-panel" class="panel panel-default panel-borderless">
            <div class="panel-heading">
              <a class="">
                Instruments
                <span class="pull-right ">3</span>
              </a>
            </div>
            <div class="panel-body gb-no-padding">
              <div class="row">
                <a href="<?php echo Yii::app()->createUrl("skill/skill/skillhome", array()); ?>" class="home-menu-box col-lg-12 col-sm-12 col-xs-12">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
                  <div class="menu-heading">
                    My Skills
                    <span class=" pull-right">0</span>
                  </div>
                </a>
                <a href="<?php echo Yii::app()->createUrl("goal/goal/goalhome"); ?>" class="home-menu-box col-lg-12 col-sm-12 col-xs-12 gb-disabled">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_2.png" alt="">
                  <div class="menu-heading">
                    My Goals
                    <span class=" pull-right">0</span>
                  </div>
                </a>
                <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box col-lg-12 col-sm-12 col-xs-12 gb-disabled">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_2.png" alt="">
                  <div class="menu-heading">
                    My Promises 
                    <span class=" pull-right">0</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div id="gb-applications-panel" class="panel panel-default panel-borderless">
            <div class="panel-heading">
              <a class="">
                Applications
                <span class="pull-right ">6</span>
              </a>
            </div>
            <div class="panel-body gb-no-padding">
              <div class="row">
                <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome"); ?>" class="home-menu-box col-lg-12 col-sm-12 col-xs-12">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_icon_2.png" alt="">
                  <div class="menu-heading">
                    Mentorships
                    <span class="pull-right ">0</span>
                  </div>
                </a>
                <a href="<?php echo Yii::app()->createUrl("pages/pages/pageshome"); ?>" class="home-menu-box col-lg-12 col-sm-12 col-xs-12">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pages_icon.png" alt="">
                  <div class="menu-heading">
                    Advice Pages
                    <span class="pull-right ">0</span>
                  </div>
                </a>
                <a href="<?php echo Yii::app()->createUrl("group/group/grouphome"); ?>" class="home-menu-box col-lg-12 col-sm-12 col-xs-12 gb-disabled">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/groups_icon.png" alt="">
                  <div class="menu-heading">
                    Groups
                    <span class="pull-right ">0</span>
                  </div>
                </a>
                <a href="<?php echo Yii::app()->createUrl("templates/templates/templateshome"); ?>" class="home-menu-box col-lg-12 col-sm-12 col-xs-12 gb-disabled">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/use_template_icon.png" alt="">
                  <div class="menu-heading">
                    Templates
                    <span class="pull-right ">0</span>
                  </div>
                </a>
                <a href="<?php echo Yii::app()->createUrl("journal/journal/journalhome"); ?>" class="home-menu-box col-lg-12 col-sm-12 col-xs-12 gb-disabled">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/show_off_icon_2.png" alt="">
                  <div class="menu-heading">
                    Show Off
                    <span class="pull-right ">0</span>
                  </div>
                </a>
                <a href="<?php echo Yii::app()->createUrl("journal/journal/journalhome"); ?>" class="home-menu-box col-lg-12 col-sm-12 col-xs-12 gb-disabled">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/journal_icon_2.png" alt="">
                  <div class="menu-heading">
                    My Journal
                    <span class="pull-right ">0</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="gb-home-activity" class="col-lg-9 col-sm-9 col-xs-12 gb-no-padding gb-blue-left-border">
          <div id="gb-home-add-nav" class="row">
            <a class="gb-add-skill-modal-trigger col-sm-2 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
                <div class="caption">
                  <h6 class="text-center">Add Skill</h6>
                </div>
              </div>
            </a>
            <a class="gb-add-mentorship-modal-trigger  col-sm-2 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_icon_2.png" alt="">
                <div class="caption">
                  <h6 class="text-center">Add<br>Mentorship</h6>
                </div>
              </div>
            </a>
            <a class="gb-add-advice-modal-trigger col-sm-2 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pages_icon.png" alt="">
                <div class="caption">
                  <h6 class="text-center">Add<br>Advice</h6>
                </div>
              </div>
            </a>
            <a class="gb-disabled gb-add-journal-modal-trigger col-sm-2 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/journal_icon_2.png" alt="">
                <div class="caption">
                  <h6 class="text-center">Add To<br>Journal</h6>
                </div>
              </div>
            </a>
            <a class="gb-disabled gb-make-template-modal-trigger col-sm-2 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/use_template_icon.png" alt="">
                <div class="caption">
                  <h6 class="text-center">Make a<br>Template</h6>
                </div>
              </div>
            </a>
            <a class="gb-disabled gb-make-template-modal-trigger col-sm-2 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/use_template_icon.png" alt="">
                <div class="caption">
                  <h6 class="text-center">Add a<br>Class</h6>
                </div>
              </div>
            </a>
          </div>
          <br>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>Recent Activities</h4>
            </div>
            <div id="gb-home-posts" class="panel-body gb-no-padding gb-white-background">
              <?php
              $count = 1;
              foreach ($posts as $post):
                switch ($post->type) {
                  case Post::$TYPE_GOAL_LIST:
                    $skillListItem = GoalList::model()->findByPk($post->source_id);
                    echo $this->renderPartial('skill.views.skill._skill_list_post_row', array(
                     'skillListItem' => $skillListItem,
                     'count' => $count++));
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
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-12 col-xs-12">
      <div id="gb-connections-panel" class="panel panel-default">
        <div class="panel-heading">
          <h4><a>
              My Connections
              <span class="pull-right  -info">5</span>
            </a>
          </h4>
        </div>
        <div class="panel-body gb-no-padding">
          <div class="row">
            <a href="" class="home-menu-box-2 col-lg-12 col-sm-12 col-xs-12">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/gb_public.png"; ?>" alt="">
              <div class="menu-heading">
                <h5>Public</h5>
              </div>
            </a>
            <?php foreach ($connections as $connection): ?>
              <a href="<?php echo Yii::app()->createUrl("connection/connection/connection", array('connectionId' => $connection->id)); ?>" class="home-menu-box-2 col-lg-12 col-sm-12 col-xs-12">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture; ?>" alt="">
                <div class="menu-heading">
                  <h5>
                    <?php echo $connection->name ?>
                    <span class="pull-right  -info">5</span>
                  </h5>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
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

<div id="gb-add-skill-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-skill-list-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Add Skill
      </div>
      <div class="modal-body">
        <?php
        echo $this->renderPartial('skill.views.skill._add_skill_list_form', array(
         'fromHomePage' => true,
         'skillModel' => $skillModel,
         'skillListModel' => $skillListModel,
         'skillLevelList' => $skillLevelList,
         'skillListShare' => $skillListShare));
        ?>
      </div>
    </div>
  </div>
</div>

<?php
echo $this->renderPartial('mentorship.views.mentorship.modals._add_mentorship_modal', array(
 'fromHomePage' => true,
 'mentorshipModel' => $mentorshipModel,
 'mentorshipLevelList' => $mentorshipLevelList,
 'skillGainedList' => $skillGainedList));
?>
<div id="gb-add-advice-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Add Advice Page
      </div>
      <div class="modal-body">
        <?php
        echo $this->renderPartial('pages.views.pages.forms._add_advice_page_form', array(
         'fromHomePage' => true,
         'pageModel' => $pageModel,
         'advicePageModel' => $advicePageModel,
         'pageLevelList' => $pageLevelList));
        ?>
      </div>
    </div>
  </div>
</div>
<?php $this->endContent() ?>
