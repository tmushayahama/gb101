<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>

<link href="css/leveleditor.css?v=1.11" rel="stylesheet">

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

			<!-- Home Panel quick links -->

			<div id="gb-home-left-sidebar" class="animated" >
				<div id="gb-home-left-sidebar-title">
					<span class="span2">
						<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
					</span>
					<span class="span6">
						<p><a>Tremayne Mushayahama</a></p>	
					</span>
					<span class="span4">
						<button class="pull-right btn btn-mini"><i class="icon icon-wrench"></i> Edit</button>
					</span>
				</div>
				<div id="gb-home-left-sidebar-content">
					<ul class="nav nav-stacked">
						<li><h5><a href="/">Recent Commitments</a></h5></li>
						<li><h5><a href="#">Goal List</a></h5></li>
						<li><h5><a href="#">Friends</a></h5></li>
						<li><h5><a href="#">Groups</a></h5></li>
						<li><h5><a href="#">More</a></h5></li>
					</ul> 
				</div> 
			</div>
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
					<li><a href="#" class="btn btn-success btn-mini" rel="tooltip" title="Add a Circle"><i class="icon icon-plus-sign"></i> Add</a></li>	
				</ul>
			</div>
			<!-- Posts -->
			<div id="gb-posts-container" class="span6 animated">
				<div id="gb-post-input"> 
					<div id="gb-commit-form" class="row rm-row">
						<textarea class="span12"rows="2" placeholder="What is your goal?"></textarea>
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

				<div class="row rm-row rm-container">
					<div class="gb-commitment-post row-fluid">
						<div class="gb-post-title">
							<span class="span1">
								<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
							</span>
							<span class="span8">
									<a><strong>Tremayne Mushayahama</strong></a><br>
									<small><a><i>Shared Publicly</i></a> - <a>12/03/13</a></small>								
							</span>
							<span class="span3">
								<button class="pull-right btn btn-info btn-mini"><i class="icon icon-circle-arrow-right"></i> More Info</button>
							</span> 
						</div>
						<div class="gb-post-content">
							<p>
								Is the  ojoot skur oojm pot ej o eoo fdreg
								errd and the simme r -fi iiir iijr opmm wrri
								refo rerfo okgreg otreij ertfrojregf refoerf ertreer <a>See More</a>
							</p>
						</div>
						<div>
							<div class="btn-toolba span12">
								<span class="span8">
									<span><a class=" span4">Motivate</a></span>
									<span><a class="span4">Monitor</a></span>
									<span><a class=" span4">Follow</a></span>
								</span>
								<span class="pull-right span4">
									<span><a class=" span6">Add Variety</a></span>
									<span><a class=" span6">Help</a></span>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->endContent() ?>