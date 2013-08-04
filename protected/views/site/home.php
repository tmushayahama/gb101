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
<div id="main-container">
	<div id="topbar">
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

	<!-- gb sidebar menu -->

	<ul id="sidebar-selector">
		<li class="active"><a href="#" data-asset-type="terrain"><div class="icon icon-home"></div><br>Home</a></li>
		<li id="sidebar-items" ><a href="#" data-asset-type="items"><div class="icon icon-profile"></div><br>Profile</a></li>
		<li id="sidebar-characters"><a href="#" data-asset-type="characters"><div class="icon icon-characters"></div><br>Groups</a></li>
		<li id="sidebar-marketplace"><a href="#" data-asset-type="marketplace"><div class="icon icon-marketplace"></div><br>Goals</a></li>
		<li id="sidebar-behaviours"><a href="#" data-asset-type="behaviours"><div class="icon icon-scripts"></div><br>Timelines</a></li>
		<li id="sidebar-da-stash"><a href="#" data-asset-type="da-stash"><div class="icon icon-da-stash"></div><br>More</a></li>
	</ul>
	<div id="sidebar-indicator" class="animated" style="top: 95px;">
		<div class="indicator-border"></div>
		<div class="indicator-fill"></div>
	</div>
	<div id="sidebar-corner"><div class="outer-shading"></div><div class="curve"></div></div>

	<!-- Home Panel quick links -->

	<div id="gb-home-left-sidebar" class="animated" >
		<div id="gb-home-left-sidebar-title">
			<p>
				<button class="pull-right btn btn-mini"><i class="icon icon-circle-arrow-up"></i> Edit</button>
				<span class="heading"><a>Tremayne Mushayahama</a></span>
			</p>
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
			<li><a href="#" rel="tooltip" title="Add a Circle"><i class="icon-white icon-plus-sign">Add Circles</i></a></li>	
		</ul>
	</div>
	<!-- Posts -->
	<div id="gb-posts-container" class="animated">
		<ul id="rm-post-tab" class="row nav-tabs  rm-row inline">
			<li class="active"><a href="#rm-home-add-commitment"><strong>Add Commitment</strong></a></li>
			<li><a href="#rm-home-assign-commitment"><strong>Assign Goal/Task</strong></a></li>
			<li><a href="#rm-home-challenge-commitment"><strong>Take a Challenge</strong></a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="rm-home-add-commitment">  
				<form id="rm-commit-form" class="row rm-row rm-post-input rm-green-border">
					<textarea class="span12"rows="3"></textarea>
					<ul class="nav">
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
				</form>
			</div>
			<div class="tab-pane" id="rm-home-assign-commitment">  
				<ul class="nav rm-nav nav-pills inline span12 rm-green-border">
					<li class="span6"><a href="#rm-assign-goal-modal" role="button" data-toggle="modal"><h4>Assign a goal</h4></a></li>
					<li class="span6"><a href="#"><h4>Assign a small task</h4></a></li>
				</ul>
			</div>
			<div class="tab-pane" id="rm-home-challenge-commitment">  
				<ul class="nav rm-nav nav-pills inline span12 rm-green-border">
					<li class="span6"><a href="#"><h4>Create a challenge</h4></a></li>
					<li class="span6"><a href="#"><h4>Join a challenge</h4></a></li>
				</ul>
			</div>
		</div>
		<div class="row rm-row rm-container">
			<ul class="row rm-nav rm-row inline rm-bottom-border">
				<li class="pull-right"><a href="#">Following</a></li>
				<li class="rm-active pull-right"><a href="#">Recent</a></li>
			</ul>
			<div id="gb-recent-posts-home">
				<!--Recent Activities Ordered by date, popular...-->
			</div>
		</div>
	</div>
</div>
<?php $this->endContent() ?>