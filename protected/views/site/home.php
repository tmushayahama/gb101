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
      <ul id="gb-home-nav" class="gb-side-nav-1 gb-skill-leftbar">
        <li class="active"><a href="#gb-home-instruments-pane" data-toggle="tab">Instruments<i class="icon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-home-apps-pane" data-toggle="tab">Goalbook Apps<i class="icon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-home-connection-pane" data-toggle="tab">Connections<i class="icon-chevron-right pull-right"></i></a></li>
      </ul>
      <div class="gb-skill-activity-content tab-content">
        <div class="tab-pane active " id="gb-home-instruments-pane">
          <h2 class="sub-heading-9">Goalbook Instruments</h2>
          <br>
          <div class="row-fluid">
            <a href="<?php echo Yii::app()->createUrl("skill/skill/skillhome", array()); ?>" class="span4 home-menu-box box-3-height">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
              <h4>My Skills</h4>
            </a>
            <div class="span8 menu-heading">
              <h3>My Skills</h3>
              <p>Management, Bank, Sharing<br>
                <small><i>list, commitments, monitoring...</i></small>
              </p>
            </div>
          </div>
          <br>
          <div class="row-fluid">
            <a href="<?php echo Yii::app()->createUrl("goal/goal/goalhome"); ?>" class="span4 home-menu-box box-3-height">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_2.png" alt="">
              <h4>My Goals</h4>
            </a>
            <div class="span8 menu-heading">
              <h3>My Goals</h3>
              <p>Commitments, List and Sharing<br>
                <small><i>management, achievements, refereeing...</i></small>
              </p>
            </div>
          </div>
          <br>
          <div class="row-fluid ">
            <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="span4 home-menu-box box-3-height">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_2.png" alt="">
              <h4>My Promises</h4>
            </a>
            <div class="span8 menu-heading">
              <h3>My Promises</h3>
              <p>Keeping, Monitoring and Bank<br>
                <small><i>list, commitments, sharing... </i></small>
              </p>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="gb-home-apps-pane">
          <h2 class="sub-heading-9">Goalbook Applications</h2>
          <br>
          <div class="row-fluid">
            <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome"); ?>" class="span4 home-menu-box box-3-height">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_icon_2.png" alt="">
              <h4>Mentorships</h4>
            </a>
            <div class=" span8 menu-heading">
              <h3>Mentorships</h3>
              <p>Mentorship management.<br>
                <small><i></i></small></p>
            </div>
          </div>
          <div class="row-fluid">
            <a href="<?php echo Yii::app()->createUrl("group/group/grouphome"); ?>" class="span4 home-menu-box box-3-height">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/groups_icon.png" alt="">
              <h4>Groups</h4>
            </a>
            <div class="span8 menu-heading">
              <h3>Groups</h3>
              <p>Share same skills, goals, promises.<br>
                <small><i></i></small></p>
            </div>
          </div>
          <div class="row-fluid">
            <a href="<?php echo Yii::app()->createUrl("pages/pages/pageshome"); ?>" class="span4 home-menu-box box-3-height">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pages_icon.png" alt="">
              <h4>Advice Pages</h4>
            </a>
            <div class="span8 menu-heading">
              <h3>Advice Pages</h3>
              <p>Write Something, Support someone.<br>
                <small><i></i></small></p>
            </div>
          </div>
          <div class="row-fluid">
            <a href="<?php echo Yii::app()->createUrl("templates/templates/templateshome"); ?>" class="span4 home-menu-box box-3-height">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/use_template_icon.png" alt="">
              <h4>Templates</h4>
            </a>
            <div class="span8 menu-heading">
              <h4>Templates</h4>
              <p>Quick Start.<br>
                <small><i></i></small></p>
            </div>
          </div>
          <div class="row-fluid ">
            <a href="<?php echo Yii::app()->createUrl("journal/journal/journalhome"); ?>" class="span4 home-menu-box box-3-height">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/show_off_icon_2.png" alt="">
              <h4>Show Off</h4>
            </a>
            <div class="span8 menu-heading">
              <h3>Show Off</h3>
              <p>Skills, Achievements.<br>
                <small><i></i></small></p>
            </div>
          </div>
          <div class="row-fluid">
            <a href="<?php echo Yii::app()->createUrl("journal/journal/journalhome"); ?>" class="span4 home-menu-box box-3-height">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/journal_icon_2.png" alt="">
              <h4>My Journal</h4>
            </a>
            <div class="span8 menu-heading">
              <h4>My Journal</h4>
              <p>My Daily Journal.<br>
                <small><i></i></small></p>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="gb-home-connection-pane">
          <div class="row-fluid">
            <h2 class="sub-heading-9">My Connections</h2>
            <br>
            <div class="row-fluid">
              <a href="" class="span4 home-menu-box box-3-height">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/gb_public.png"; ?>" alt="">
                <h4>Public</h4>
              </a>
              <div class=" span8 menu-heading">
                <h3>Public</h3>
                <p><br>
                  <small><i></i></small></p>
              </div>
            </div>
            <?php foreach ($connections as $connection): ?>
              <div class="row-fluid">
                <a href="<?php echo Yii::app()->createUrl("connection/connection/connection", array('connectionId' => $connection->id)); ?>" class="span4 home-menu-box box-3-height">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture; ?>" alt="">
                  <h4 class=""><?php echo $connection->name ?></h4>
                </a>
                <div class=" span8 menu-heading">
                  <h3><?php echo $connection->name ?></h3>
                  <p><?php echo $connection->description ?><br>
                    <small><i></i></small></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
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
    <?php //endforeach; ?>
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