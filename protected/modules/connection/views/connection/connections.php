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
  //var recordSkillCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordskillcommitment", array('connectionId' => $activeConnectionId, 'source' => 'connections')); ?>"
  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";
  var sendMenteeshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmenteeshiprequest"); ?>";
  var displayAddConnectionMemberFormUrl = "<?php echo Yii::app()->createUrl("site/displayaddconnectionmemberform"); ?>";
  var sendConnectionMemberRequestUrl = "<?php echo Yii::app()->createUrl("site/sendconnectionmemberrequest"); ?>";
  var indexUrl = "<?php echo Yii::app()->createUrl("site/index"); ?>";
  var addSkillListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => $activeConnectionId, 'source' => 'connections', 'type' => GoalList::$TYPE_SKILL)); ?>"
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

<div id="main-container" class="container">
  <div class="row">
    <!-- gb sidebar menu -->
    <div class="span9">
      <div id="gb-home-header" class="row-fluid">
        <div class="span3">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture; ?>" alt="">
        </div>
        <div class="connectiom-info-container span5">
          <ul class="nav nav-stacked connectiom-info span12">
            <h3 class="name"><?php echo $connection->name ?></h3>
            <li class="connectiom-description">
              <?php
              if ($connection->description != null) :
                echo $connection->description;
              else :
                echo 'No Description';
              endif;
              ?>
            </li>
            <li class="connectiom-members">
              <?php foreach ($connectionMembers as $connectionMember): ?>
                <img class="img-member" href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
              <?php endforeach; ?>
            </li>
          </ul>
        </div>
        <ul id="home-activity-stats" class="nav nav-stacked row-fluid span4">
          <li>
            <a class="">
              <i class="icon-tasks"></i>  
              0 Skill Activities
            </a>
          </li>
          <li>
            <a class="">
              <i class="icon-tasks"></i>  
             0 Application Activities
            </a>
          </li>
        </ul>
      </div>
      <div class=" row-fluid gb-bottom-border-grey-3">
        <h4 class="pull-left"><?php echo $connection->name ?></h4>
        <ul id="gb-connection-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#skill-all-pane" data-toggle="tab">Activities</a></li>
          <li class=""><a href="#skill-list-pane" data-toggle="tab">Members</a></li>
          <li class=""><a href="#skill-commitment-pane" data-toggle="tab">Leader Board</a></li>
          <li class=""><a href="#skill-bank-pane" data-toggle="tab">Pages</a></li>
          <li class=""><a href="#skill-bank-pane" data-toggle="tab">More</a></li>
        </ul>
      </div>
      <div class="row-fluid">
        <div class="span4 gb-skill-leftbar">
          <h5 class="sub-heading-7"><a>Leader Board</a><a class="pull-right"><i><small>View All</small></i></a></h5>
          <div id="gb-leaderboard-sidebar" class="row-fluid">
            <?php
            echo $this->renderPartial('application.views.site.summary_sidebar._leaderboard');
            ?>
          </div>
        </div>
        <div class="span8">
          <div id="gb-post-input"> 
            <div id="gb-commit-form" class="row rm-row">
              <textarea id="gb-add-commitment-input" connection-id="<?php echo $activeConnectionId; ?>" class="span12"rows="2" placeholder="What is your skill?"></textarea>
              <ul id="gb-post-tab" class="nav row inline ">
                <li class="active span4">
                  <a href="#rm-home-add-commitment">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/add_goal.png" class="active" alt=""><br>
                    <strong>Add</strong>
                  </a>
                </li>
                <li class="span4">
                  <a href="#rm-home-add-commitment">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png" 
                         onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_skill_hover.png'" 
                         onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png'" alt=""><br>
                    <strong>Assign</strong>
                  </a>
                </li>
                <li class="span4">
                  <a href="#rm-home-add-commitment">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/skill_challenge.png" 
                         onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/skill_challenge_hover.png'" 
                         onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/skill_challenge.png'" alt=""><br>
                    <strong>Challenge</strong>
                  </a>
                </li>
              </ul>
              <ul class="nav hidden">
                <li class="pull-right">
                  <button type="submit" id="rm-commit-post-home" class="rm-dark-blue-btn">I Commit</button>
                </li>
                <li class="pull-right dropdown">
                  <a href="#" class="dropdown-toggle btn" data-toggle="dropdown">Friends <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="nav-header">Who can see this</li>
                    <li id="rm-friends-selector-home" class="controls">
                      <label class="checkbox text-left">
                        <input type="checkbox" value="option1"> Select All
                      </label>
                    </li>
                  </ul>
                </li>
                <li class="pull-right">
                  <ul class="inline">
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <div id="skill-posts"class="row rm-row rm-container">
            <?php //foreach ($posts as $post): ?>
              <?php
             // echo $this->renderPartial('skill.views.skill._skill_commitment_post', array(
            //   "skillCommitment" => $post->goalCommitment,
             //  'connection_name' => 'All'//$post->connection->name
              //));
              ?>
            <?php //endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div id="gb-home-sidebar" class="span3">
      <h5 class="sub-heading-7"><a>Leader Board</a><a class="pull-right"><i><small>View All</small></i></a></h5>
      <div id="gb-todos-sidebar" class="row-fluid">
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th class="by">By</th>
              <th class="task">Task</th>
              <th class="date">Assigned</th>
              <th class="puntos">Puntos</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($todos as $todo): ?>
              <tr>
                <?php
                echo $this->renderPartial('application.views.site.summary_sidebar._todos', array(
                 'todo' => $todo->goal->description,
                 'todo_puntos' => $todo->goal->points_pledged
                ));
                ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="">
          <span class="span7">
          </span>
          <span class="span5">
            <button class="pull-right gb-btn gb-btn-color-white gb-btn-blue-2"><i class="icon-white icon-pencil"></i> Edit</button>
          </span> 
        </div>
      </div>
      <h5 id="gb-view-connection-btn" class="sub-heading-7"><a>Add People</a><a class="pull-right"><i><small>View All</small></i></a></h5>
      <div class="box-6-height">
        <?php foreach ($nonConnectionMembers as $nonConnectionMember): ?>				
          <?php
          echo $this->renderPartial('application.views.site.summary_sidebar._add_people', array(
           'nonConnectionMember' => $nonConnectionMember
          ));
          ?>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->

<div id="gb-add-connection-member-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add Connection Member
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <div id="gb-add-connection-member-modal-content">
    <?php
    echo $this->renderPartial('_add_connection_member_form', array(
     'connectionMemberModel' => $connectionMemberModel
    ));
    ?>
  </div>
</div>

<div id="gb-request-confirmation-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="text-center text-success"> Your request has been sent</h2>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<?php $this->endContent() ?>
