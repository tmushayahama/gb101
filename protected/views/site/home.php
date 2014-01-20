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
      <div class=" row-fluid">
        <!-- <div class="span4">
           <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box box-2-height">
             <div class="menu-body">
               <br>
               <h3 class="text-right">Getting Started</h3>
             </div>
           </a>
         </div> -->
        <div class="span12">
          <div class="row-fluid">
            <h4 id="gb-view-connection-btn" class="sub-heading-6"><a>My Connections</a><a class="pull-right"><i><small>View All</small></i></a></h4>
            <div href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box box-3-height">
              <a href="" class="gb-connection-badge">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/gb_public.png"; ?>" alt="">
                <h4 class="">Public</h4>
              </a>
              <?php foreach ($connections as $connection): ?>
                <a href="<?php echo Yii::app()->createUrl("connection/connection/connection", array('connectionId' => $connection->id)); ?>" class="gb-connection-badge">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture; ?>" alt="">
                  <h4 class=""><?php echo $connection->name ?></h4>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
          <br>
          <div class="row-fluid">
            <h4 class="sub-heading-6"><a>Goalbook Instruments</a></h4>
            <div class="row-fluid box-5-height">
              <a href="<?php echo Yii::app()->createUrl("skill/skill/skillhome", array()); ?>" class="span4 home-menu-box">
                <div class="menu-heading">
                  <h4>My Skills</h4>
                  <p>Management, Bank, Sharing<br>
                    <small><i>list, commitments, monitoring...</i></small><p>
                </div>
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
              </a>
              <a href="<?php echo Yii::app()->createUrl("goal/goal/goalhome"); ?>" class="span4 home-menu-box">
                <div class="menu-heading">
                  <h4>My Goals</h4>
                  <p>Commitments, List and Sharing<br>
                    <small><i>management, achievements, refereeing...</i></small><p>
                </div>
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_2.png" alt="">
              </a>
              <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="span4 home-menu-box">
                <div class="menu-heading">
                  <h4>My Promises</h4>
                  <p>Keeping, Monitoring and Bank<br>
                    <small><i>list, commitments, sharing... </i></small><p>
                </div>
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_2.png" alt="">
              </a>
            </div>
            <br>
            <br>
            <h4 class="sub-heading-6"><a>Goalbook Applications</a></h4>
            <div class="row-fluid box-4-height">
              <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome"); ?>" class="span3 home-menu-box">
                <div class="menu-heading">
                  <h4>My Mentorships</h4>
                  <p>Mentorship management.<br>
                    <small><i></i></small><p>
                </div>
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_icon_2.png" alt="">
              </a>
              <a href="<?php echo Yii::app()->createUrl("group/group/grouphome"); ?>" class="span3 home-menu-box">
                <div class="menu-heading">
                  <h4>Groups</h4>
                  <p>Share same skills, goals, promises.<br>
                    <small><i></i></small><p>
                </div>
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/groups_icon.png" alt="">
              </a>
              <a href="<?php echo Yii::app()->createUrl("pages/pages/pageshome"); ?>" class="span3 home-menu-box">
                <div class="menu-heading">
                  <h4>My Pages</h4>
                  <p>Write Something, Support someone.<br>
                    <small><i></i></small><p>
                </div>
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/pages_icon.png" alt="">
              </a>
              <a href="<?php echo Yii::app()->createUrl("templates/templates/templateshome"); ?>" class="span3 home-menu-box">
                <div class="menu-heading">
                  <h4>Templates</h4>
                  <p>Quick Start.<br>
                    <small><i></i></small><p>
                </div>
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/use_template_icon.png" alt="">
              </a>
            </div>
            <div class="row-fluid box-4-height">
              <a href="<?php echo Yii::app()->createUrl("journal/journal/journalhome"); ?>" class="span3 home-menu-box">
                <div class="menu-heading">
                  <h4>My Journal</h4>
                  <p>My Daily Journal.<br>
                    <small><i></i></small><p>
                </div>
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/journal_icon_2.png" alt="">
              </a>
            </div>
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