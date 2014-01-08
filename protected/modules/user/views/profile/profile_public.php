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

<ul id="sidebar-selector">
  <li><a  href="<?php echo Yii::app()->user->returnUrl ?>" data-asset-type="terrain"><div class="icon icon-home"></div><br>Home</a></li>
  <li id="sidebar-items" ><a href="#" data-asset-type="items"><div class="icon icon-profile"></div><br>Profile</a></li>
  <li id="sidebar-characters"><a href="#" data-asset-type="characters"><div class="icon icon-characters"></div><br>Groups</a></li>
  <li id="sidebar-marketplace"><a href="#" data-asset-type="marketplace"><div class="icon icon-marketplace"></div><br>Goals</a></li>
  <li id="sidebar-behaviours"><a href="#" data-asset-type="behaviours"><div class="icon icon-scripts"></div><br>Timelines</a></li>
  <li id="sidebar-da-stash"><a href="#" data-asset-type="da-stash"><div class="icon icon-da-stash"></div><br>More</a></li>
</ul>
<div id="sidebar-indicator" class="animated" style="top: 155px;">
  <div class="indicator-border"></div>
  <div class="indicator-fill"></div>
</div>
<div id="sidebar-corner"><div class="outer-shading"></div><div class="curve"></div></div>

<div id="profile-main-container" class="container-fluid">
  <div class="row-fluid">
    <!-- gb sidebar menu -->
    <div class="span7">
      <div id="gb-profile-header" class="row-fluid">
        <div class="span4">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
        </div>
        <div class="user-info-container span8">
          <ul class="nav nav-stacked user-info span12">
             <h2 class="name"><?php echo $profile->firstname." ".$profile->lastname; ?></h2>
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
              <span class="span3">
                <a class="gb-btn gb-btn-blue-1">
                  <i class="icon-white icon-ok-circle"></i>
                  Connect
                </a>
              </span>
              <span class="span3">
                <a class="gb-btn gb-btn-blue-1">
                  <i class="icon-white icon-envelope"></i>
                  Message
                </a>
              </span>
              <span class="pull-right span2">
                <a class="gb-btn gb-btn-blue-1">
                  More 
                  <i class="icon-white icon-chevron-right"></i>  
                </a>
              </span>
            </li>
          </ul>

        </div>
      </div>
      <!-- Posts -->
      <br>

      <div id="gb-profile-middle-container" class="row-fluid">
        <ul id="gb-profile-nav" class="span12">
          <li class="active"><a>Public Activities</a></li>
          <li><a>About</a></li>
        </ul>
        <div class="row-fluid">
          <div class="span12">
            <div id="gb-posts-container" class="span5">

              <div id="gb-leaderboard-sidebar" class="row-fluid">
                <?php
                echo $this->renderPartial('summary_sidebar/_leaderboard');
                ?>
              </div>

            </div>
            <div class="span7">
              <?php if (count($posts) == 0): ?>
                <div class="gb-notice-box">
                  <p>

                  </p>
                </div>
              <?php else: ?>
                <div id="skill-posts"class="row rm-row rm-container">
                  <?php foreach ($posts as $post): ?>
                    <?php
                    echo $this->renderPartial('_skill_commitment_post', array(
                     "title" => $post->goalCommitment->type->type,
                     "description" => $post->goalCommitment->description,
                     "points_pledged" => $post->goalCommitment->points_pledged,
                      //'connection_name' => $post->connection->name
                    ));
                    ?>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="gb-profile-sidebar" class="span3">
      <ul class="nav nav-stacked activities-summary span12">
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
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent() ?>