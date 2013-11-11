<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_management.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  //var addSkillListUrl = "<?php echo Yii::app()->createUrl("goal/goal/goalhome/addskilllist/connectionId/1"); ?>";
  var addSkillListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => 1, 'source' => "goal")); ?>";
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

<div class="container">
  <div id="main-container">
    <div class="row-fluid">
      <!-- gb sidebar menu -->
      <ul id="sidebar-selector">
        <li ><a href="<?php echo Yii::app()->createUrl("site/connections"); ?>" data-asset-type="terrain"><div class="icon icon-home"></div><br>Home</a></li>
        <li id="sidebar-items" ><a href="<?php echo Yii::app()->createUrl("user/profile"); ?>"><div class="icon icon-profile"></div><br>Profile</a></li>
        <li id="sidebar-characters"><a href="#" data-asset-type="characters"><div class="icon icon-characters"></div><br>Groups</a></li>
        <li class="active" id="sidebar-marketplace"><a href="<?php echo Yii::app()->createUrl("goal/goal/goalhome", array()); ?>" data-asset-type="marketplace"><div class="icon icon-marketplace"></div><br>Goals</a></li>
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
      <div class="gb-skill-management-container span9">
        <h2>Skill Management</h2>
        <div class="row-fluid gb-border-blue-3 gb-shadow-blue-5">
          <span class='gb-top-heading gb-heading-left'><h4>Type: <a><?php echo $goalCommitment->goal->type->type ?></a></h4></span>
          <div class="title row-fluid">
            <span class="span1">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
            </span>
            <span class="span8">
              <a><h4><strong>Tremayne Mushayahama</strong></h4></a><br>					
            </span>
            <span class="span3">

            </span> 
          </div>
          <div class="gb-skill-management-content row-fluid">
            <div class="span8 offset1">
              <p class="">
                <?php echo $goalCommitment->goal->description; ?> 
              </p>
            </div>
            <div class="span2">
              <a class="skill-level gb-btn pull-right text-center">Level <br> <?php echo 1; ?></a>
            </div>
          </div>
          <br>
        </div>
        <br>
        <div class=" row-fluid">
          <ul id="gb-skill-management-nav" class="row">
            <li class="active"><a href="#skill-timeline-tab-pane" data-toggle="tab">Timeline</a></li>
            <li class=""><a href="#skill-monitor-pane" data-toggle="tab">Monitors</a></li>
            <li class=""><a href="#skill-referee-pane" data-toggle="tab">Referees</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active " id="skill-timeline-tab-pane">
              <div class="span5">
              </div>
              <div class="span7">
              </div>
            </div>
            <div class="tab-pane" id="skill-monitor-pane">
              <div class="span12">
                <?php if (count($monitors) == 0): ?>
                  <br>
                  <br>
                  <h2 class="text-center text-warning">No Monitors on this goal</h2>
                <?php else: ?>
                  <div class="dropdown">
                    <a class="dropdown-toggle gb-btn gb-monitor-dropdown-btn" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                      All Monitors on this Goal (<strong><?php echo count($monitors); ?></strong>)
                      <i class=" icon-2 icon-chevron-down pull-right"></i>
                    </a>
                    <ul class="dropdown-menu gb-monitor-dropdown-menu" role="menu" aria-labelledby="dLabel">
                      <?php foreach ($monitors as $monitor): ?>
                        <li><a><?php echo $monitor->monitor->profile->firstname." ".$monitor->monitor->profile->lastname; ?> </a></li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="" class="span3">

      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent(); ?>