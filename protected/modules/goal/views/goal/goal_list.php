<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
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
      <div id="gb-home-container" class="span9">
        <br>
        <br>
        <br>
        <div class="gb-commitment-post rm-row">
          <span class='gb-top-heading gb-heading-left'>Skill Item <?php echo $goal->id ?></span>
          <div class="gb-post-title ">
            <span class="span1">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
            </span>
            <span class="span8">
              <a><strong>Tremayne Mushayahama</strong></a><br>					
            </span>
            <span class="span3">
              
            </span> 
          </div>
          <div class="gb-post-content">
            <span class="span8">
              <h5 class="goal-commitment-title"></h5>
              <div class="span12">
                <span class="span1"><i class="icon icon-align-justify"></i></span>
                <span class="span9"><p class="goal-commitment-description">
                    <?php echo $goal->description; ?> 
                  </p>
                </span>
                <span class="span2">
                  <a class="skill-level gb-btn pull-right text-center">Level <br> <?php echo 1; ?></a>
                </span>
              </div>
            </span>
            <span class=" span4">
              <ul class="gb-post-action pull-righ nav nav-stacked">
                <li><h6><i class="icon icon-play-circle"></i> Motivate <a class="gb-post-action-indicator pull-right">0</a></h6></li>
                <li><h6><i class="icon icon-eye-open"></i> Monitor<a class="gb-post-action-indicator pull-right">0</a></h6></li>
                <li><h6><i class="icon icon-tag"></i> Follow<a class="gb-post-action-indicator pull-right">0</a></h6></li>
                <li><h6><i class="icon icon-plus-sign"></i> Add Variety<a class="gb-post-action-indicator pull-right">0</a></h6></li>
                <li><h6><i class="icon icon-thumbs-up"></i> Assist<a class="gb-post-action-indicator pull-right">0</a></h6></li>
              </ul>
            </span>
          </div>
          <div class="span11 gb-skill-footer inline">
            <a class="gb-btn gb-btn-green-light-1">0 Mentors</a>
            <a class="gb-btn gb-btn-green-light-1">0 Mentees</a>
            <a class="pull-right gb-btn gb-btn-green-1"><i class="icon-white icon-1-5 icon-trash"></i></a>
            <a class="pull-right gb-btn gb-btn-green-1"><i class="icon-white icon-1-5 icon-edit"></i></a>
          </div>
        </div>
      </div>
      <div id="gb-right-sidebar" class="span3">

      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent(); ?>