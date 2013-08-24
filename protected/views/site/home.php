<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl . '/js/gb_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
	var recordGoalCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordgoalcommitment"); ?>";
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
		<div id="topbar" class="row-fluid">
			<div id="gb-topbar-name-title" class="span3">
				<span class="span2">
					<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
				</span>
				<span class="span10">
					<p>
						<a>Tremayne Mushayahama</a><br>
						<button class="pull-right btn btn-mini"><i class="icon icon-wrench"></i> Edit</button>
					</p>
				</span>
			</div>
			<div id="tool-toggles">
				<!-- preview button -->
				<div class="btn-group pull-right">
					<button class="btn btn-success"><i class="icon-play icon-white"></i> Sort By</button>
					<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon icon-play"></i> Recent Post</a></li>
						<li><a href="#"><i class="icon icon-share"></i> Sort 2</a></li>
					</ul>
				</div>
				<ul class="nav nav-pills">
					<li class="active"><a href="#"><i class="icon icon-white icon-circle-arrow-down"></i>Normal View</a></li>
					<li><a href="#"><i class="icon icon-white icon-circle-arrow-down"></i>Timeline View</a></li>

					<div class="pull-right"><a id="btn-toggle-asset-manager" class="btn btn-info" href="#">Add People</a></div>
					<div id="topbar-level-name-container"><span id="topbar-level-name"><strong>All</strong></span> <span id="topbar-level-type">-all posts</span></div>
				</ul>
			</div>
		</div>

		<div class="row-fluid">
			<!-- gb sidebar menu -->
			<ul id="sidebar-selector">
				<li class="active"><a href="#" data-asset-type="terrain"><div class="icon icon-home"></div><br>Home</a></li>
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


			<!-- TOOLS PANE -->

			<!-- <div id="tools-panel-container" class="animated">
				<div id="tools-panel" class="well">
					<div id="minimap-panel" class="clearfix">
						<div id="minimap-container">
							<canvas id="minimap" width="160" height="125"></canvas>
							<div id="screen-outline"></div>
						</div>
						<div id="minimap-controls">
							<div id="zoom-factor" class="pull-right">100%</div>
							<a id="zoom-in" href="#" title="Zoom In"><i class="icon-plus"></i></a>
							<a id="zoom-reset" href="#" title="100% Zoom"><i class="icon-search"></i></a>
							<a id="zoom-out" href="#" title="Zoom Out"><i class="icon-minus"></i></a>
							<div id="cursor-coordinates">(0,0)</div>
						</div>
					</div>
					<hr>
					<div id="layers-panel" class="clearfix">
						<div data-type="wiring" class="layer wiring">
							<a class="toggle-layer-visibility" href="#" title="Toggle Layer Visibility"><i class="icon-eye-open"></i></a>
							<span class="layer-name">Wiring</span>
						</div>
						<div data-type="terrain" data-layer="foreground" id="foreground-layer" class="layer terrain">
							<a class="toggle-layer-visibility" href="#" title="Toggle Layer Visibility"><i class="icon-eye-open"></i></a>
							<span class="layer-icon"></span>
							<span class="layer-name">Foreground</span>
						</div>
						<div data-type="character" class="layer characters">
							<a class="toggle-layer-visibility" href="#" title="Toggle Layer Visibility"><i class="icon-eye-open"></i></a>
							<span class="layer-icon"></span>
							<span class="layer-name">Characters</span>
						</div>
						<div data-type="item" data-layer="foreground" class="layer items">
							<a class="toggle-layer-visibility" href="#" title="Toggle Layer Visibility"><i class="icon-eye-open"></i></a>
							<span class="layer-icon"></span>
							<span class="layer-name">Items</span>
						</div>
						<div data-type="terrain" data-layer="terrain" id="terrain-layer" class="layer active terrain">
							<a class="toggle-layer-visibility" href="#" title="Toggle Layer Visibility"><i class="icon-eye-open"></i></a>
							<span class="layer-icon"></span>
							<span class="layer-name">Terrain</span>
						</div>
						<div data-type="terrain" data-layer="background" class="layer terrain">
							<a class="toggle-layer-visibility" href="#" title="Toggle Layer Visibility"><i class="icon-eye-open"></i></a>
							<span class="layer-icon"></span>
							<span class="layer-name">Background</span>
						</div>
						<div data-type="item" data-layer="background" class="layer items">
							<a class="toggle-layer-visibility" href="#" title="Toggle Layer Visibility"><i class="icon-eye-open"></i></a>
							<span class="layer-icon"></span>
							<span class="layer-name">BG Items</span>
						</div>
					</div>
				</div>
			</div> -->

			<!-- TOOLBAR -->
			<div id="gb-circles-toolbar" class="animated">
				<ul id="gb-circles-toolbar-buttons">
					<li class="active"><a href="#" rel="tooltip" title="All Posts"><i class="toolbar-icon move-tool">All</i></a></li>
					<li><a href="#" rel="tooltip" title="Friends"><i class="toolbar-icon brush-tool">Friends</i></a></li>
					<li><a href="#" rel="tooltip" title="Family"><i class="toolbar-icon eraser-tool">Family</i></a></li>
					<li><a href="#" rel="tooltip" title="Followers"><i class="toolbar-icon hand-tool">Followers</i></a></li>	
					<li><a href="#" class="btn btn-mini" rel="tooltip" title="Add a Circle"><i class="icon icon-plus-sign"></i> Add</a></li>	
				</ul>
			</div>
			<!-- Posts -->
			<div id="gb-home-middle-container" class="span10">
				<div id="gb-posts-container" class="span5 animated">
					<div id="gb-post-input"> 
						<div id="gb-commit-form" class="row rm-row">
							<textarea id="gb-add-commitment-input" class="span12"rows="2" placeholder="What is your goal?"></textarea>
							<ul id="gb-post-tab" class="nav row inline ">
								<li class="active span4">
									<a href="#rm-home-add-commitment">
										<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/add_goal.png" class="active" alt=""><br>
										<strong>Add Goal</strong>
									</a>
								</li>
								<li class="span4">
									<a href="#rm-home-add-commitment">
										<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png" 
												 onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal_hover.png'" 
												 onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/assign_goal.png'" alt=""><br>
										<strong>Assign Goal</strong>
									</a>
								</li>
								<li class="span4">
									<a href="#rm-home-add-commitment">
										<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png" 
												 onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge_hover.png'" 
												 onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/img/icons/goal_challenge.png'" alt=""><br>
										<strong>Goal Challenge</strong>
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
					<!-- <ul class="nav rm-nav nav-pills inline span12 rm-green-border">
						<li class="span6"><a href="#rm-assign-goal-modal" role="button" data-toggle="modal"><h4>Assign a goal</h4></a></li>
						<li class="span6"><a href="#"><h4>Assign a small task</h4></a></li>
					</ul>
					<ul class="nav rm-nav nav-pills inline span12 rm-green-border">
						<li class="span6"><a href="#"><h4>Create a challenge</h4></a></li>
						<li class="span6"><a href="#"><h4>Join a challenge</h4></a></li>
					</ul> -->

					<div id="goal-posts"class="row rm-row rm-container">
						<?php foreach ($posts as $post): ?>
							<?php
							echo $this->renderPartial('_goal_commitment_post', array(
									"title" => $post->type->type,
									"description" => $post->description,
									"points_pledged" => $post->points_pledged
							));
							?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="span4">
					<div id="gb-leaderboard-sidebar" class="">
						<?php
						echo $this->renderPartial('summary_sidebar/_leaderboard');
						?>
					</div>
					<div id="gb-circle-members-sidebar" class="">
						<?php
						echo $this->renderPartial('summary_sidebar/_circle_members');
						?>
					</div>
				</div>
				<div id="gb-right-sidebar" class="span3">
					<div id="gb-add-more-people" class="span12">
						<?php
						echo $this->renderPartial('summary_sidebar/_add_people');
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- -------------------------------MODALS --------------------------->
<div id="gb-add-commitment-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<h3 id="rm-assign-goal-modal-Label">Add Goal Commitment</h3>
	</div>
	<?php
	echo $this->renderPartial('_goal_commitment_form', array(
			'goalCommitmentModel' => $goalCommitmentModel,
			'goalTypes' => $goalTypes));
	?>
</div>
<?php $this->endContent() ?>