<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var sendConnectionMemberRequestUrl = "<?php echo Yii::app()->createUrl("site/sendconnectionmemberrequest"); ?>";
  var createConnectionUrl = "<?php echo Yii::app()->createUrl("site/createconnection"); ?>";
  var displayAddConnectionMemberFormUrl = "<?php echo Yii::app()->createUrl("site/displayaddconnectionmemberform"); ?>";
  var indexUrl = "<?php echo Yii::app()->createUrl("site/index"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
  $("#gb-topbar-heading-title").text("Home");
</script>
<link href="css/leveledito.css?v=1.11" rel="stylesheet">

<style>
  body {
    /* padding-top: 60px; */
  }
</style>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="ico/favicon.ico?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png?v=1.11">
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
      <div class="accordion gb-list-preview gb-side-nav-1 gb-skill-leftbar" id="gb-home-accordion">
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#gb-home-accordion" href="#gb-instruments-accordion">
              Goalbook Instruments
              <span class="pull-right badge badge-info">3</span>
            </a>
          </div>
          <div id="gb-instruments-accordion" class="accordion-body in collapse">
            <div class="accordion-inner">
              <div class="row-fluid">
                <a href="<?php echo Yii::app()->createUrl("skill/skill/skillhome", array()); ?>" class="home-menu-box box-1-height">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
                  <div class="menu-heading">
                    <h5>My Skills</h5>
                    <p>Management, Mentoring, Sharing
                    </p>
                  </div>
                </a>
              </div>
              <div class="row-fluid">
                <a href="<?php echo Yii::app()->createUrl("goal/goal/goalhome"); ?>" class="home-menu-box box-1-height">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_2.png" alt="">
                  <div class="menu-heading">
                    <h5>My Goals</h5>
                    <p>
                      Commitments, List and Sharing
                    </p>
                  </div>
                </a>
              </div>
              <div class="row-fluid ">
                <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box box-1-height">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_2.png" alt="">
                  <div class="menu-heading">
                    <h5>My Promises</h5>
                    <p>
                      Keeping, Monitoring and Bank
                    </p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#gb-home-accordion" href="#gb-apps-accordion">
              Goalbook Apps
              <span class="pull-right badge badge-info">6</span>
            </a>
          </div>
          <div id="gb-apps-accordion" class="accordion-body collapse">
            <div class="accordion-inner">
              <div class="row-fluid">
                <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome"); ?>" class="home-menu-box box-1-height">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_icon_2.png" alt="">
                  <div class="menu-heading">
                    <h5>Mentorships</h5>
                    <p>Mentorship management</p>
                  </div>
                </a>
              </div>
              <div class="row-fluid">
                <a href="<?php echo Yii::app()->createUrl("group/group/grouphome"); ?>" class="home-menu-box box-1-height">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/groups_icon.png" alt="">
                  <div class="menu-heading">
                    <h5>Groups</h5>
                    <p>Share same skills, goals</p>
                  </div>
                </a>
              </div>
              <div class="row-fluid">
                <a href="<?php echo Yii::app()->createUrl("pages/pages/pageshome"); ?>" class="home-menu-box box-1-height">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pages_icon.png" alt="">
                  <div class="menu-heading">
                    <h5>Advice Pages</h5>
                    <p>Write Something, Support someone.</p>
                  </div>
                </a>
              </div>
              <div class="row-fluid">
                <a href="<?php echo Yii::app()->createUrl("templates/templates/templateshome"); ?>" class="home-menu-box box-1-height">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/use_template_icon.png" alt="">
                  <div class="menu-heading">
                    <h5>Templates</h5>
                    <p>Quick Start.</p>
                  </div>
                </a>
              </div>
              <div class="row-fluid ">
                <a href="<?php echo Yii::app()->createUrl("journal/journal/journalhome"); ?>" class="home-menu-box box-1-height">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/show_off_icon_2.png" alt="">
                  <div class="menu-heading">
                    <h5>Show Off</h5>
                    <p>Skills, Achievements</p>
                  </div>
                </a>
              </div>
              <div class="row-fluid">
                <a href="<?php echo Yii::app()->createUrl("journal/journal/journalhome"); ?>" class="home-menu-box box-1-height">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/journal_icon_2.png" alt="">
                  <div class="menu-heading">
                    <h5>My Journal</h5>
                    <p>My Daily Journal.</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#gb-home-accordion" href="#gb-connections-accordion">
              Connections
              <span class="pull-right badge badge-info">5</span>
            </a>
          </div>
          <div id="gb-connections-accordion" class="accordion-body collapse">
            <div class="accordion-inner">
              <div class="row-fluid">
                <a href="" class="home-menu-box box-1-height">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/gb_public.png"; ?>" alt="">
                  <div class="menu-heading">
                    <h5>Public</h5>
                    <p></p>
                  </div>
                </a>
              </div>
              <?php foreach ($connections as $connection): ?>
                <div class="row-fluid">
                  <a href="<?php echo Yii::app()->createUrl("connection/connection/connection", array('connectionId' => $connection->id)); ?>" class="home-menu-box box-1-height">
                    <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture; ?>" alt="">
                    <div class="menu-heading">
                      <h5><?php echo $connection->name ?></h5>
                      <p><?php echo $connection->description ?>
                      </p>
                    </div>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="gb-skill-activity-content row-fluid">
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
              $mentorshipRequest = GoalRequest::model()->findByPk($post->source_id);
              echo $this->renderPartial('mentorship.views.mentorship._mentorship_request_row', array(
               "mentorshipRequest" => $mentorshipRequest,
              ));
              break;
            case Post::$TYPE_ADVICE_PAGE:
              $page = Page::model()->findByPk($post->source_id);
              echo $this->renderPartial('pages.views.pages._goal_page_row', array(
               "goalPage" => $page,
              ));
              break;
          }
        endforeach;
        ?>
      </div>
    </div>
    <div id="" class=" span3">
      <div id="gb-add-people-box" class="box-6">
        <h5 id="gb-view-connection-btn" class="sub-heading-7"><a>Add People</a><a class="pull-right"><i><small>View All</small></i></a></h5>
        <div class="box-6-height">
          <?php foreach ($nonConnectionMembers as $nonConnectionMember): ?>				
            <?php
            echo $this->renderPartial('summary_sidebar/_add_people', array(
             'nonConnectionMember' => $nonConnectionMember
            ));
            ?>
          <?php endforeach; ?>
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

<div id="gb-view-connection-member-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="">My Connections
  </h2>
  <br>
  <div class="modal-body">
    <?php //foreach ($connections as $connection): ?>
    <?php
    //  echo $this->renderPartial('_user_connection_badge_all', array(
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
<?php $this->endContent() ?>