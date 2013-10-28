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
	var addSkillListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => 1, 'source'=>"goal")); ?>";
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
			<div id="gb-home-container" class="span7">
				<div id="topbar" class="span12">
					<div id="" class="span3">
						<h1>Goals</h1>
					</div>
					<ul id="gb-goal-nav" class="span5">
						<li class="active"><a>Skills</a></li>
						<li class=""><a>Goals</a></li>
						<li class=""><a>Promises</a></li>
					</ul>
					<div id="gb-topbar-name-title" class="pull-right span4">
						<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
						<p>
							<a>Tremayne Mushayahama</a><br>
							<button class="gb-btn btn-mini gb-btn-green-3"><i class="icon-white icon-wrench"></i> Edit</button>
						</p>
					</div>
					<div id="gb-topbar-notifications" class="span5">
						<p>
							<a></a>
						</p>
					</div>
				</div> 
				<div class="row-fluid">
					<div class="span7">


						<div id="gb-goal-skill-list-box" class="row-fluid span12">
							<div class="heading">
								Skill List
							</div>
							<div class="gb-btn btn-block btn-large gb-btn-green-3">
								<a><h3 class="gb-btn-color-white add-skill-model-trigger">Add Skills</h3></a>
							</div>
							<br>
							<div id="gb-goal-skill-container" class="row-fluid">
								<?php
								foreach ($goalList as $goalListItem):
									echo $this->renderPartial('_skill_list_row', array(
											'description' => $goalListItem->goal->description));
								endforeach;
								?>
							</div>
						</div>
					</div>
					<div class="span5">

					</div>
				</div>
			</div>
			<div id="gb-right-sidebar" class="span4">

			</div>
		</div>
	</div>
</div>

<!-- -------------------------------MODALS --------------------------->
<div id="gb-add-skilllist-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<h2>Add To Skill List
	</h2>
	<br>
	<?php
	echo $this->renderPartial('_add_skill_list_form', array(
			'goalListModel' => $goalListModel,
			'goalListShare' => $goalListShare,
			'goalListMentor'=>$goalListMentor));
	?>
</div>
<?php $this->endContent() ?>