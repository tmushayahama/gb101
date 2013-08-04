<?php $this->beginContent('//layouts/gb_main'); ?>
<div id="rm-header">
	<div class="navbar rm-navbar navbar-top">
		<div class="navbar-inner">
			<div class="container">
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
	<?php echo $content ?>
</div>
<?php $this->endContent(); ?>
