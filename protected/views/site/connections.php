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
<div class="row">
  <!-- gb sidebar menu -->

  <div class="container">
    <div id="main-container">
      <div class="row-fluid">
        <!-- TOOLBAR -->
        <!-- Posts -->
        <div id="" class="span8">
          <div class="gb-topbar row">
            <div id="" class="span5 gb-topbar-heading">
              <h1>Home</h1>
              <h5>
                Welcome to Goalbook. Manage your your skills, promises,goals and mentorships.
                Share with your connections<br>
                <button class="gb-btn btn-mini gb-btn-blue-2"><i class="icon-white icon-wrench"></i> More Info</button>
              </h5>
            </div>
            <div class="span7">
              <div class="span4 dropdown">
                <a class="dropdown-toggle gb-announcements-notifications" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">

                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                  ppp
                </ul>
              </div>
              <div class="span4 dropdown">
                <a class="dropdown-toggle gb-messages-notifications" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">

                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">

                </ul>
              </div>
              <div class="span4 dropdown">
                <a class="dropdown-toggle gb-requests-notifications" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                  <div class="display-number">
                    <?php echo count($requests); ?>
                  </div>
                </a>
                <ul id="gb-requests-dropdown-menu" class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                  <?php foreach ($requests as $request): ?>
                    <?php
                    echo $this->renderPartial('_request_notification', array(
                     'request' => $request
                    ));
                    ?>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div> 
          <div class=" row-fluid">
            <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box gb-shadow-blue-5  ">
              <div class="menu-body">
                <br>
                <br>
                <br>
                <br>
                <br>
                <h1 class="text-right text-info">Take a<br> tour</h1>
              </div>
            </a>
            <div href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box gb-shadow-blue-5  ">
              <h5 id="gb-view-connection-btn" class="sub-heading-3"><a>My Circles</a><a class="pull-right"><i><small>View All</small></i></a></h5>
              <a id="gb-create-connection-btn" class="gb-connection-badge">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/plus.png" alt="">
                <h4>Add</h4>
              </a>
              <?php foreach ($userConnections as $userConnection): ?>
                <a href="<?php echo 'home/connectionId/' . $userConnection->id ?>" class="gb-connection-badge">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_family.png" alt="">
                  <h5 class=""><?php echo $userConnection->connection->name ?></h5>
                </a>
              <?php endforeach; ?>

            </div>
            <a href="<?php echo Yii::app()->createUrl("goal/goal/goalhome", array()); ?>" class="home-menu-box gb-shadow-blue-5 ">
              <div class="menu-body">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
              </div>
              <div class="menu-bottom-heading">
                <h3>My Skills</h3>
                <p>Skill Management, Commitments and Sharing.<br>
                  <small><i>skill list, skill monitoring, skill mentorship</i></small><p>
              </div>
            </a>

          </div>
          <div class=" row-fluid">
            <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box gb-shadow-blue-5   ">
              <div class="menu-body">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_2.png" alt="">
              </div>
              <div class="menu-bottom-heading">
                <h3>My Goals</h3>
                <p>Goal Commitment, Achievement and Sharing.<br>
                  <small><i>goal list, goal monitoring, goal referees</i></small><p>

              </div>
            </a>
            <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box gb-shadow-blue-5  ">
              <div class="menu-body">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_2.png" alt="">
              </div>
              <div class="menu-bottom-heading">
                <h3>My Promises</h3>
                <p>Promise commitment, Monitoring and Sharing .<br>
                  <small><i>promise list </i></small><p>
              </div>
            </a>
            <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box gb-shadow-blue-5  ">
              <div class="menu-body">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_icon_2.png" alt="">
              </div>
              <div class="menu-bottom-heading">
                <h3>My Mentorships</h3>
                <p>Mentorship management.<br>
                  <small><i></i></small><p>
              </div>
            </a>
          </div>
        </div>
        <div id="" class=" span3">
          <div id="gb-add-people-box" class="box-6">
            <div class="heading">
              Add People
            </div>
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
     'userConnectionModel' => $userConnectionModel
    ));
    ?>
  </div>
</div>

<div id="gb-view-connection-member-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="">My Connections
  </h2>
  <br>
  <div class="modal-body">
    <?php foreach ($userConnections as $userConnection): ?>
      <?php
      echo $this->renderPartial('_user_connection_badge_all', array(
       "userConnection" => $userConnection, //$post->goalCommitment->type->type,
       "description" => 'This is a description of my connection', //$post->goalCommitment->description,
       "points_pledged" => 'ppp', //$post->goalCommitment->points_pledged',
       'connection_name' => 'ooo'//$post->connection->name
      ));
      ?>
    <?php endforeach; ?>
  </div>
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