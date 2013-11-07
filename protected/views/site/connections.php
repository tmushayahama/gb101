<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var createConnectionUrl = "<?php echo Yii::app()->createUrl("site/createconnection"); ?>";
  var displayAddConnectionMemberFormUrl = "<?php echo Yii::app()->createUrl("site/displayaddconnectionmemberform"); ?>";
  var indexUrl = "<?php echo Yii::app()->createUrl("site/index"); ?>";
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

<div class="container-fluid">
  <div id="main-container">


    <div class="row-fluid">
      <!-- gb sidebar menu -->
      <ul id="sidebar-selector">
        <li class="active"><a href="#" data-asset-type="terrain"><div class="icon icon-home"></div><br>Home</a></li>
        <li id="sidebar-items" ><a href="<?php echo Yii::app()->createUrl("user/profile"); ?>"><div class="icon icon-profile"></div><br>Profile</a></li>
        <li id="sidebar-characters"><a href="#" data-asset-type="characters"><div class="icon icon-characters"></div><br>Groups</a></li>
        <li id="sidebar-marketplace"><a href="<?php echo Yii::app()->createUrl("goal/goal/goalhome", array()); ?>" data-asset-type="marketplace"><div class="icon icon-marketplace"></div><br>Goals</a></li>
        <li id="sidebar-behaviours"><a href="#" data-asset-type="behaviours"><div class="icon icon-scripts"></div><br>Timelines</a></li>
        <li id="sidebar-da-stash"><a href="#" data-asset-type="da-stash"><div class="icon icon-da-stash"></div><br>More</a></li>
      </ul>
      <div id="sidebar-indicator" class="animated" style="top: 155px;">
        <div class="indicator-border"></div>
        <div class="indicator-fill"></div>
      </div>
      <div id="sidebar-corner"><div class="outer-shading"></div><div class="curve"></div></div>

      <!-- TOOLBAR -->
      <!-- Posts -->
      <div id="gb-home-container" class="span7">
        <div class="gb-topbar span12">
          <div id="" class="span3 tgb-opbar-heading">
            <h1>Home</h1>
          </div>
          <div id="gb-topbar-name-title" class="pull-right span9">
            <h4>
              Welcome to Goalbook. Manage your your skills, promises, mentorship<br>
              <button class="gb-btn btn-mini gb-btn-blue-2"><i class="icon-white icon-wrench"></i> More Info</button>
            </h4>
          </div>
        </div> 
        <div class=" row-fluid">
          <div href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box gb-shadow-blue-5 span4">
            <div class="menu-body">
              <br>
              <?php foreach ($userConnections as $userConnection): ?>
                <a href="<?php echo 'home/connectionId/' . $userConnection->id ?>" class="gb-connection-badge gb-border-blue-3">
                  <h4 class=""><?php echo $userConnection->connection->name ?></h4>
                </a>
              <?php endforeach; ?></div>
            <div class="menu-bottom-heading">
              My Circles
            </div>
          </div>
          <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box gb-shadow-blue-5 span4">
            <div class="menu-body">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon.png" alt="">
            </div>
            <div class="menu-bottom-heading">
              My Skills
            </div>
          </a>
          <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box gb-shadow-blue-5 span4">
            <div class="menu-body">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon.png" alt="">
            </div>
            <div class="menu-bottom-heading">
              My Goals
            </div>
          </a>
        </div>
        <br>
        <div class=" row-fluid">
          <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box gb-shadow-blue-5 span4">
            <div class="menu-body">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon.png" alt="">
            </div>
            <div class="menu-bottom-heading">
              My Promises
            </div>
          </a>
          <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box gb-shadow-blue-5 span4">
            <div class="menu-body">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_icon.png" alt="">
            </div>
            <div class="menu-bottom-heading">
              My Mentorships
            </div>
          </a>
          <a href="<?php echo Yii::app()->createUrl("user/profile"); ?>" class="home-menu-box gb-shadow-blue-5 span4">
            <div class="menu-body">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentor_icon.png" alt="">
            </div>
            <div class="menu-bottom-heading">
              My Menteeships
            </div>
          </a>
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
<?php $this->endContent() ?>