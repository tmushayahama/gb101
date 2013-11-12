<?php $this->beginContent('//layouts/gb_main'); ?>

<div id="rm-header">
	<div class="navbar rm-navbar navbar-top navbar-fixed-top">
		<div class="navbar-inner navbar-small">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a href="/home" class="brand">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class="gb-img-logo" alt="">
				</a>
				<div class="nav-collapse collapse">
					<ul class="nav inline nav-pills rm-shadowless">
					</ul>
				</div>
				<div class="nav-collapse collapse">
					<ul class="nav inline nav-pills rm-shadowless pull-right">
						<li>
							<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
						</li>
						<li><a href="/home">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class="nav-header">User Settings</li>
								<li><a href="#">Account Settings</a></li>
								<li><a href="#">Privacy Settings </a></li>
								<li class="divider"></li>
								<li class="nav-header">Commitments</li>
								<li><a href="#">Reports</a></li>
							</ul>
						</li>
						<li><a href="/logout">Logout</a></li>
						<li>
							<input type="text" class="input-large search-query" placeholder="search">
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
</div>
<div class="content">
  <ul id="sidebar-selector">
    <li><a href="<?php echo Yii::app()->createUrl("site/connections"); ?>" ><div class="icon icon-home"></div><br>Home</a></li>
    <li><a href="<?php echo Yii::app()->createUrl("user/profile"); ?>"><div class="icon icon-profile"></div><br>Profile</a></li>
    <li><a href="#"><div class="icon icon-characters"></div><br>Groups</a></li>
    <li><a href="<?php echo Yii::app()->createUrl("goal/goal/goalhome", array()); ?>"><div class="icon icon-marketplace"></div><br>Goals</a></li>
    <li><a href="#"><div class="icon icon-scripts"></div><br>Timelines</a></li>
    <li><a href="#" ><div class="icon icon-da-stash"></div><br>More</a></li>
  </ul>
  <div id="sidebar-indicator" class="animated" style="top: 155px;">
    <div class="indicator-border"></div>
    <div class="indicator-fill"></div>
  </div>
  <div id="sidebar-corner"><div class="outer-shading"></div><div class="curve"></div></div>

	<?php echo $content ?>
</div>
<?php $this->endContent(); ?>
