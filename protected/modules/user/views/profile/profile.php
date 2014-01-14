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
    <div class="span9">
      <div id="gb-profile-header" class="row-fluid">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
        <div class="user-info">
          <div class="title row">
            <h2 class="name"><?php echo $profile->firstname . " " . $profile->lastname; ?></h2>
            <p><strong>Specialty:</strong> Software Engineer</p>
          </div>
          <div class="inspiration-quote row">
            <a>
              <blockquote>
                If you have no one to encourage you, instead of using that as an excuse for failure, encourage yourself and use that as 
                a reason why you must succeed.
                <small>
                  <cite title="Source Title">Kevin Ngo</cite>
                </small>
              </blockquote>
            </a>
          </div>
          <div class="favorites row">

          </div>
          <div class="action row-fluid">
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
          </div>
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
          <div id="gb-posts-container" class="span4 gb-skill-leftbar">
            <h5  class="sub-heading-6"><a>My Connections</a><a class="pull-right"><i><small>View All</small></i></a></h5>
          </div>
          <div class="span8">
            <div class="gb-activity-stats">
              <ul class="thumbnails">
                <li class="span4">
                  <a class="thumbnail gb-stats">
                    <h1>0</h1>
                    <h6 class="text-center">Skill Activities</h6>
                  </a>
                </li>
                <li class="span4">
                  <a class="thumbnail gb-stats">
                    <h1>0</h1>
                    <h6 class="text-center">Goal Activities</h6>
                  </a>
                </li>
                <li class="span4">
                  <a class="thumbnail gb-stats">
                    <h1>0</h1>
                    <h6 class="text-center">Promise Activities</h6>
                  </a>
                </li>
              </ul>
            </div>
            <h4 id="" class="sub-heading-6"><a>Recent Activities</a><a class="pull-right"><i><small>View All</small></i></a></h4>
            <div id="skill-posts"class="row rm-row rm-container">
              <?php foreach ($posts as $post): ?>
                <?php
                echo $this->renderPartial('skill.views.skill._skill_commitment_post', array(
                 "skillCommitment" => $post->goalCommitment,
                 'connection_name' => 'All'//$post->connection->name
                ));
                ?>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="gb-profile-sidebar" class="span3">
      <h5 id="" class="sub-heading-7"><a>Some Statistics</a><a class="pull-right"><i><small>View All</small></i></a></h5>
      <ul class="row-fluid nav nav-stacked activities-summary">
        <li>
          <a class="">
            <h5> <i class="icon-tasks"></i>  
              Puntos
              <div class="badge badge-info pull-right">0</div>
            </h5>
          </a>
        </li>
        <li>
          <a class="">
            <h5> <i class="icon-tasks"></i>  
              Goal Achievements
              <div class="badge badge-info pull-right">0</div>
            </h5>
          </a>
        </li>
        <li>
          <a class="">
            <h5> <i class="icon-tasks"></i>  
              Goal Commitments
              <div class="badge badge-info pull-right">0</div>
            </h5>
          </a>
        </li>
      </ul>

      <div id="gb-add-people-box" class="box-6">
        <h5 id="gb-view-connection-btn" class="sub-heading-6"><a>Add People</a><a class="pull-right"><i><small>View All</small></i></a></h5>
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
</div>

<!-- -------------------------------MODALS --------------------------->
<?php $this->endContent() ?>