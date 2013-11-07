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
        <div id="topbar" class="span12">
          <div id="" class="span7">
            <h1>Home</h1>
          </div>
          <div id="gb-topbar-name-title" class="pull-right span5">
            <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">

            <p>
              <a>Tremayne Mushayahama</a><br>
              <button class="gb-btn btn-mini gb-btn-blue-2"><i class="icon-white icon-wrench"></i> Edit</button>
            </p>
          </div>
          <div id="gb-topbar-notifications" class="span5">
            <p>
              <a></a>
            </p>
          </div>
        </div> 
        <div class="row-fluid">
          <div id="gb-goal-box" class="span12">
            <div class="gb-goal-type-row gb-border-blue-4 gb-shadow-blue-4 margin-right-3 pull-left">
              <div class="sub-heading">
                My Skills
                <span class="pull-right"><a href="<?php echo Yii::app()->createUrl("goal/goal/goalhome#skill-tab-pane", array()); ?>">View All</a></span>
              </div>
              <div class="span12 type-list">
                <?php foreach ($skillList as $goalListItem): ?>
                  <div class="one-line">
                    <a href="<?php echo Yii::app()->createUrl('goal/goal/goaldetail', array('goal_id' => $goalListItem->goal->id)); ?>" class="ellipsis"><?php echo $goalListItem->goal->description; ?></a><br>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="row-fluid gb-footer-blue-3">
                <a id="" class="span3 pull-left gb-footer-btn gb-btn-blue-4">
                  <i class="icon-white icon-plus"></i>Add
                </a>
              </div>
            </div>
            <div class="gb-goal-type-row gb-border-blue-4 gb-shadow-blue-4  margin-right-3 pull-left">
              <div class="sub-heading">
                My Promises
                <span class="pull-right"><a href="<?php echo Yii::app()->createUrl("goal/goal/goalhome#promise-tab-pane", array()); ?>">View All</a></span>
              </div>
              <div class="span12 type-list">
                <p class="text-warning">No promises list</p>	
                <?php foreach ($promiseList as $goalListItem): ?>
                  <div class="one-line">
                    <a href="<?php echo Yii::app()->createUrl('goal/goal/goaldetail', array('goal_id' => $goalListItem->goal->id)); ?>" class="ellipsis"><?php echo $goalListItem->goal->description; ?></a><br>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="row-fluid gb-footer-blue-3">
                <a id="" class="span3 pull-left gb-footer-btn gb-btn-blue-4">
                  <i class="icon-white icon-plus"></i>Add
                </a>
              </div>
            </div>
            <div class="gb-goal-type-row gb-border-blue-4 gb-shadow-blue-4 pull-right">
              <div class="sub-heading">
                My Goals
                <span class="pull-right"><a href="<?php echo Yii::app()->createUrl("goal/goal/goalhome#goal-tab-pane", array()); ?>">View All</a></span>
              </div>
              <div class="span12 type-list">
                <?php foreach ($goalList as $goalListItem): ?>
                  <div class="one-line">
                    <a href="<?php echo Yii::app()->createUrl('goal/goal/goaldetail', array('goal_id' => $goalListItem->goal->id)); ?>" class="ellipsis"><?php echo $goalListItem->goal->description; ?></a><br>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="row-fluid gb-footer-blue-3">
                <a id="" class="span3 pull-left gb-footer-btn gb-btn-blue-4">
                  <i class="icon-white icon-plus"></i>Add
                </a>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row-fluid">
          <div id="gb-connections-box" class="span12 gb-btn-white-4 gb-shadow-blue-4">
            <div class="heading">
              My Connectivity
            </div>
            <div class="row-fluid">
              <div class="span7 gb-border-blue-4">
                <div class="sub-heading">
                  Circles
                  <span class="pull-right"><a id="gb-view-connection-btn">View All</a></span>
                </div>
                <?php foreach ($userConnections as $userConnection): ?>
                  <?php
                  echo $this->renderPartial('_user_connection_badge', array(
                   "userConnection" => $userConnection, //$post->goalCommitment->type->type,
                   "description" => 'This is a description of my connection', //$post->goalCommitment->description,
                   "points_pledged" => 'ppp', //$post->goalCommitment->points_pledged',
                   'connection_name' => 'ooo'//$post->connection->name
                  ));
                  ?>
                <?php endforeach; ?>
              </div>
              <div id="gb-activity-preview"class="span5 gb-border-blue-4 pull-right">
                <div class="sub-heading">
                  Recent Activities Preview
                </div>
                <div class="gb-activity">
                  <span class="span2 activity-image">
                    <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
                  </span>
                  <span class="span10 activity-text">
                    <h5>Tremayne Mushayahama</h5>
                    <p>Has done something</p>
                  </span>
                </div>
                <div class="gb-activity">
                  <span class="span2 activity-image">
                    <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
                  </span>
                  <span class="span10 activity-text">
                    <h5>Tremayne Mushayahama</h5>
                    <p>Has done something</p>
                  </span>
                </div>
                <div class="gb-activity">
                  <span class="span2 activity-image">
                    <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
                  </span>
                  <span class="span10 activity-text">
                    <h5>Tremayne Mushayahama</h5>
                    <p>Has done something</p>
                  </span>
                </div>
              </div>
            </div>
            <div class="row-fluid gb-footer-blue-3">
              <a id="gb-create-connection-btn" class="span3 pull-left gb-footer-btn gb-btn-blue-4">
                <i class="icon-white icon-plus"></i>Add
              </a>
            </div>
          </div>
        </div>
        <br>
        <div class="row-fluid">
          <div id="gb-mentorship-box" class="span12 gb-btn-white-4 gb-shadow-blue-4">
            <div class="heading">
              My Mentorship/Menteeship 
              <span class="pull-right"><a id="gb-view-mentorship-btn">View All</a></span>
            </div>
            <div class="mentor-badge pull-left gb-border-blue-4">
              <div class="sub-heading">
                My Mentors
                <span class="pull-right"><a id="gb-view-mentorship-btn">View All</a></span>
              </div>
              <div class="row-fluid box-2-height">
                <p class=""><h4 class="">You have not been mentored by anyone. 
                  <a>Learn more </a> to look for mentors.</h4></p>
              </div>
              <div class="row-fluid gb-footer-blue-3">
                <a id="gb-add-mentors-btn" class="span2 pull-left gb-footer-btn gb-btn-blue-4">
                  <i class="icon-white icon-plus"></i>Add
                </a>
              </div>
            </div>
            <div class="mentor-badge pull-right gb-border-blue-4">
              <div class="sub-heading">
                My Mentees
                <span class="pull-right"><a id="gb-view-mentorship-btn">View All</a></span>
              </div>
              <div class="row-fluid box-2-height">
                <p class=""><h4 class="">You have not mentor anyone. 
                  <a>Learn more </a> to look for mentees.</h4></p>	
              </div>
              <div class="row-fluid gb-footer-blue-3">
                <a id="gb-add-mentees-btn" class="span2 pull-left  gb-footer-btn gb-btn-blue-4">
                  <i class="icon-white icon-plus"></i>Add
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div id="gb-right-sidebar" class="span2">
        <div id="gb-add-people-box" class="box-6 span12">
          <div class="heading">
            Add People
          </div>
          <div class="span12 box-6-height">
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