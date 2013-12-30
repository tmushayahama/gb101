<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
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
    <!-- TOOLBAR -->
    <!-- Posts -->
    <div id="" class="span8">
      <div class=" row-fluid">
        <div class="span4">
          <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box box-2-height gb-shadow-blue-5  ">
            <div class="menu-body">
              <br>
              <h4 class="text-right text-info">Take a<br> tour</h4>
            </div>
          </a>
        </div>
        <div class="span8">
          <div class="row-fluid">
            <h4 id="gb-view-connection-btn" class="sub-heading-6"><a>My Connections</a><a class="pull-right"><i><small>View All</small></i></a></h4>
            <div href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box box-2-height gb-shadow-blue-5  ">

              <!-- <a id="gb-create-connection-btn" class="gb-connection-badge">
                 <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;                   ?>/img/plus.png" alt="">
                 <h4>Add</h4>
               </a> -->
              <a href="" class="gb-connection-badge">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/gb_public.png"; ?>" alt="">
                <h5 class="">Public</h5>
              </a>
              <?php foreach ($connections as $connection): ?>
                <a href="<?php echo 'home/connectionId/' . $connection->id ?>" class="gb-connection-badge">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture; ?>" alt="">
                  <h5 class=""><?php echo $connection->name ?></h5>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="row-fluid">
            <h4 class="sub-heading-6"><a>Goalbook Instruments</a></h4>
            <a href="<?php echo Yii::app()->createUrl("goal/goal/skillhome", array()); ?>" class="home-menu-box box-2-height gb-shadow-blue-5 ">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">

              <div class="menu-heading">
                <h4>My Skills</h4>
                <p>Skill Management, Skill Bank, Skill Sharing.<br>
                  <small><i>skill list, skill commitments, skill monitoring</i></small><p>
              </div>
            </a>
            <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box box-2-height gb-shadow-blue-5   ">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_2.png" alt="">
              <div class="menu-heading">
                <h4>My Goals</h4>
                <p>Goal Commitment, Achievement and Sharing.<br>
                  <small><i>goal list, goal monitoring, goal referees</i></small><p>
              </div>
            </a>
            <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box box-2-height gb-shadow-blue-5  ">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_2.png" alt="">

              <div class="menu-heading">
                <h4>My Promises</h4>
                <p>Promise Bank, Monitoring and Keeping .<br>
                  <small><i>promise list, promise commitment, promise sharing </i></small><p>
              </div>
            </a>
            <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box box-2-height gb-shadow-blue-5  ">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_icon_2.png" alt="">

              <div class="menu-heading">
                <h4>My Mentorships</h4>
                <p>Mentorship management.<br>
                  <small><i></i></small><p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="" class=" span4">
      <div id="gb-add-people-box" class="box-6">
        <h4 id="gb-view-connection-btn" class="sub-heading-6"><a>Add People</a><a class="pull-right"><i><small>View All</small></i></a></h4>

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
<div id="gb-create-connection-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="">Create New Connection
  </h2>
  <?php
  echo $this->renderPartial('_create_connection_form', array(
   'connectionModel' => $connectionModel));
  ?>
</div>
<div id="gb-add-commitment-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <span class=" gb-top-heading gb-heading-left">Add Goal Commitment
  </span>
  <?php
  echo $this->renderPartial('_goal_commitment_form', array(
   'goalModel' => $goalModel,
   'goalTypes' => $goalTypes));
  ?>
</div>

<div id="gb-add-connection-member-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <span class=" gb-top-heading gb-heading-left">Add Connection Member
  </span>
  <div id="gb-add-connection-member-modal-content">
    <?php
    echo $this->renderPartial('_add_connection_member_form', array(
     'connectionMemberModel' => $connectionMemberModel
    ));
    ?>
  </div>
</div>

<div id="gb-view-connection-member-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="">My Connections
  </h2>
  <br>
  <div class="modal-body">
    <?php foreach ($connections as $connection): ?>
      <?php
      echo $this->renderPartial('_user_connection_badge_all', array(
       "connection" => $connection,
      ));
      ?>
    <?php endforeach; ?>
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