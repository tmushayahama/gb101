<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_profile.js', CClientScript::POS_END
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


<div id="main-container" class="container">
  <div class="row">
    <div class="span8">
      <div id="gb-profile-header" class="row-fluid">
        <div class="span4">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
        </div>
        <div class="user-info-container span8">
          <ul class="nav nav-stacked user-info span12">
            <h2 class="name"><?php echo $profile->firstname . " " . $profile->lastname; ?></h2>
            <li class="inspiration-quote"><a>
                <blockquote>
                  If you have no one to encourage you, instead of using that as an excuse for failure, encourage yourself and use that as 
                  a reason why you must succeed.
                  <small>
                    <cite title="Source Title">Kevin Ngo</cite>
                  </small>
                </blockquote>
              </a>
            </li>
            <li class="stats">
              <ul class="thumbnails">
                <li class="span4">
                  <a class="thumbnail gb-stats">
                    <p>Puntos</p>
                    <h1>3</h1>
                  </a>
                </li>
                <li class="span4">
                  <a class="thumbnail gb-stats">
                    <p>Connections</p>
                    <h1>0</h1>
                  </a>
                </li>
                <li class="span4">
                  <a class="thumbnail gb-stats">
                    <p>Activities</p>
                    <h1>12</h1>
                  </a>
                </li>
              </ul>
            </li>
            <li class="action row-fluid">
              <span class="span7">
                <a class="gb-btn btn-link">
                  How others see your profile
                </a>
              </span>
              <span class="pull-right span4">
                <a class="gb-btn gb-btn-blue-1">
                  <i class="icon-white icon-bookmark"></i> 
                  Manage Profile 
                </a>
              </span>
            </li>
          </ul>
        </div>
      </div>
      <br>
      <br>
      <div id="gb-profile-middle-container" class="row-fluid">
        <div class=" row-fluid gb-bottom-border-grey-3">
          <h4 class="pull-left">My Profile</h4>
          <ul id="gb-profile-nav" class="gb-nav-1 pull-right">
            <li class="active"><a>Activities</a></li>
            <li><a>About</a></li>
            <li><a>Todos</a></li>
            <li><a>Settings</a></li>
            <li><a>More</a></li>
          </ul>
        </div>

        <div class="row-fluid">
          <div id="gb-posts-container" class="span5 animated">
            <div id="gb-leaderboard-sidebar" class="row-fluid">
              <?php
              echo $this->renderPartial('summary_sidebar/_leaderboard');
              ?>
            </div>
            <div id="gb-add-more-people" class="row-fluid">
              <span class='gb-top-heading gb-heading-left'>Add More People</span>
              <br>
              <br>
              <table class="table table-condensed">
                <tbody>
                  <?php foreach ($nonConnectionMembers as $nonConnectionMember): ?>
                    <tr>					
                      <?php
                      echo $this->renderPartial('summary_sidebar/_add_people', array(
                       'nonConnectionMember' => $nonConnectionMember
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
                  <button class="pull-right gb-btn gb-btn-color-white gb-btn-green-1"><i class="icon-white icon-plus"></i> Add More</button>
                </span> 
              </div>
            </div>
            <div id="gb-connection-members-sidebar" class="row-fluid">
              <span class='gb-top-heading gb-heading-left'>
                <a>In All Connections</a>

              </span>
              <span class='gb-top-heading gb-heading-right'><?php echo count($connectionMembers) ?></i></span>
              <table class="table">
                <tbody>
                  <tr>
                    <?php foreach ($connectionMembers as $connectionMember): ?>
                      <?php
                      echo $this->renderPartial('summary_sidebar/_connection_members', array(
                       'connectionMember' => $connectionMember
                      ));
                      ?>
                    <?php endforeach; ?>
                    <td class="">
                      <p><a class=""></a></p>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="">
                <span class="span7">
                </span>
                <span class="span5">
                  <button class="pull-right gb-btn gb-btn-color-white gb-btn-brown-1"><i class="icon-white icon-pencil"></i> Edit</button>
                </span> 
              </div>
            </div>
            <div id="gb-todos-sidebar" class="row-fluid">
              <span class='gb-top-heading gb-heading-left'>To Dos</span>
              <span class='gb-top-heading gb-heading-right'><i class="icon-chevron-up"></i></span>
              <table class="table table-condensed">
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
                      echo $this->renderPartial('summary_sidebar/_todos', array(
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

          </div>
                 <div class="span7">
                      <br>
            <h4 id="" class="sub-heading-6"><a>Recent Activities</a><a class="pull-right"><i><small>View All</small></i></a></h4>
            <div id="goal-posts"class="row rm-row rm-container">
              <?php foreach ($posts as $post): ?>
                <?php
                echo $this->renderPartial('goal.views.goal._goal_commitment_post', array(
                 "goalCommitment" => $post->goalCommitment,
                 'connection_name' => 'All'//$post->connection->name
                ));
                ?>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="gb-profile-sidebar" class="span4">
       <ul class="row-fluid nav nav-stacked activities-summary">
        <li>
          <a class="">
            <i class="icon-tasks"></i>  
            12 Goals Commitments
          </a>
        </li>
        <li>
          <a class="">
            <i class="icon-tasks"></i>  
            3 Goals Achieved
          </a>
        </li>
        <li>
          <a class="">
            <i class="icon-tasks"></i>  
            12 Motivated
          </a>
        </li>
      </ul>
       
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
  <span class=" gb-top-heading gb-heading-left">Create New Connection
  </span>
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
<?php $this->endContent() ?>