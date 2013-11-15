<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl . '/js/gb_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
	var recordGoalCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordgoalcommitment/connectionId/" . $activeConnectionId); ?>";
	var createConnectionUrl = "<?php echo Yii::app()->createUrl("site/createconnection"); ?>";
	var displayAddConnectionMemberFormUrl = "<?php echo Yii::app()->createUrl("site/displayaddconnectionmemberform"); ?>";
	var indexUrl = "<?php echo Yii::app()->createUrl("site/index"); ?>";
	var activeConnectionId = "<?php echo $activeConnectionId ?>"
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
				<li class="active"><a href="#" data-asset-type="terrain"><div class="icon icon-home"></div><br>Home</a></li>
				<li id="sidebar-items" ><a href="<?php echo Yii::app()->createUrl("user/profile"); ?>"><div class="icon icon-profile"></div><br>Profile</a></li>
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

			<!-- TOOLBAR -->
			<!-- <div id="gb-connections-toolbar" class="animated">
				<ul id="gb-connections-toolbar-buttons">
					<a class="top-heading">Connections</a>
					<li id="toolbar-connection-0"><a href="<?php //echo Yii::app()->createUrl("site/home/connectionId/0")           ?>" rel="tooltip" title="All Posts">All</a></li>
			<?php //foreach ($connectionMembers as $connectionMember): ?>
						<li class="" id="<?php //echo "toolbar-connection-" . $connectionMember->connection->id           ?>"><a href="<?php //echo Yii::app()->createUrl("site/home/connectionId/" . $connectionMember->connection->id)           ?>" rel="tooltip" title="Friends" ><?php //echo $connectionMember->connection->name           ?></a></li>	
			<?php // endforeach; ?>
				</ul>
				<button id="gb-create-connection-btn" class="gb-btn gb-btn-blue-1" rel="tooltip" title="Add a Connection">Create Connection</button>
			</div> -->
			<!-- Posts -->
			<div id="gb-connections-container" class="span8">

				<div class="row-fluid">
					<div class="span5">
						<div id="gb-goaltype-toolbar" class="animated">
							<ul id="gb-goaltype-toolbar-buttons" class="nav nav-stacked">
								<li><a class="gb-active">All<i class="icon-chevron-right pull-right"></i></a></li>	
								<li><a>Skills<i class="icon-chevron-right pull-right"></i></a></li>	
								<li><a>Promises<i class="icon-chevron-right pull-right"></i></a></li>	
							</ul>
						</div> 
						<div id="gb-post-input" class=""> 
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
						<div id="gb-leaderboard-sidebar" class="row-fluid">
							<?php
							echo $this->renderPartial('summary_sidebar/_leaderboard');
							?>
						</div>
						<div id="gb-todos-sidebar" class="row-fluid">

							<span class='gb-top-heading gb-heading-left'>To Dos</span>
							<span class='gb-top-heading gb-heading-right'><i class="icon-chevron-up"></i></span>


							<table class="table table-condensed">
								<thead>
									<tr>
										<th class="by">By</th>
										<th class="task">Task</th>
										<th class="date">Assigned</th>
										<th class="puntos">Puntos</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($todos as $todo): ?>

										<tr>
											<?php
											echo $this->renderPartial('summary_sidebar/_todos', array(
													'todo' => $todo->goal->description,
													'todo_puntos' => $todo->goal->points_pledged
											));
											?>

										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<div class="">
								<span class="span7">
								</span>
								<span class="span5">
									<button class="pull-right gb-btn gb-btn-color-white gb-btn-blue-2"><i class="icon-white icon-pencil"></i> Edit</button>
								</span> 
							</div>
						</div>
						<div id="gb-connection-members-sidebar" class="row-fluid">
							<span class='gb-top-heading gb-heading-left'>
								<?php if ($activeConnectionId == 0): ?>
									<a>In All Connections</a>
								<?php else: ?>
									<a>In This Connection</a>
								<?php endif; ?>
							</span>
							<span class='gb-top-heading gb-heading-right'><?php echo count($connectionMembers) ?></i></span>
							<table class="table">
								<tbody>
									<tr>
										<?php foreach ($connectionMembers as $connectionMember): ?>
											<?php
											echo $this->renderPartial('summary_sidebar/_connection_members', array(
													'connectionMember' => $connectionMember
											));
											?>
										<?php endforeach; ?>
										<td class="">
											<p><a class=""></a></p>
										</td>
									</tr>
								</tbody>
							</table>
							<div class="">
								<span class="span7">
								</span>
								<span class="span5">
									<button class="pull-right gb-btn gb-btn-color-white gb-btn-brown-1"><i class="icon-white icon-pencil"></i> Edit</button>
								</span> 
							</div>
						</div>
					</div>
					<div id="gb-posts-container" class="span7 animated">

						<!-- <ul class="nav rm-nav nav-pills inline span12 rm-green-border">
							<li class="span6"><a href="#rm-assign-goal-modal" role="button" data-toggle="modal"><h4>Assign a goal</h4></a></li>
							<li class="span6"><a href="#"><h4>Assign a small task</h4></a></li>
						</ul>
						<ul class="nav rm-nav nav-pills inline span12 rm-green-border">
							<li class="span6"><a href="#"><h4>Create a challenge</h4></a></li>
							<li class="span6"><a href="#"><h4>Join a challenge</h4></a></li>
						</ul> -->
						<div id="gb-connection-cover" class="row-fluid"> 
							<div class="row-fluid">
								<div class="span4">
									<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">

								</div>
								<div class="span8">
									<h3><?php echo $connectionMember->connection->name ?></h3>
									<p><?php
										if ($connectionMember->connection->description != null) :
											echo $connectionMember->connection->description;
										else :
											echo 'No Description';
										endif;
										?></p>
								</div>
							</div>
							<div class="row-fluid">
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
							</div>
						</div>

						<div id="goal-posts"class="row rm-row rm-container">
							<?php foreach ($posts as $post): ?>
								<?php
								echo $this->renderPartial('_goal_commitment_post', array(
										"title" => $post->goalCommitment->type->type,
										"description" => $post->goalCommitment->description,
										"points_pledged" => $post->goalCommitment->points_pledged,
										'connection_name' => $post->connection->name
								));
								?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<div id="gb-right-sidebar" class="span3">
				<div id="gb-add-more-people" class="row-fluid">
					<span class='gb-top-heading gb-heading-left'>Add More People</span>
					<table class="table table-condensed">
						<tbody>
							<?php foreach ($nonConnectionMembers as $nonConnectionMember): ?>
								<tr>					
									<?php
									echo $this->renderPartial('summary_sidebar/_add_people', array(
											'nonConnectionMember' => $nonConnectionMember
									));
									?>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<div class="">
						<span class="span7">
						</span>
						<span class="span5">
							<button class="pull-right gb-btn gb-btn-color-white gb-btn-green-1"><i class="icon-white icon-plus"></i> Add More</button>
						</span> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- -------------------------------MODALS --------------------------->
<div id="gb-create-connection-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<span class=" gb-top-heading gb-heading-left">Create New Connection
	</span>
	<?php
	echo $this->renderPartial('_create_connection_form', array(
			'connectionModel' => $connectionModel));
	?>
</div>
<div id="gb-add-commitment-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<span class=" gb-top-heading gb-heading-left">Add Goal Commitment
	</span>
	<?php
	echo $this->renderPartial('_goal_commitment_form', array(
			'goalModel' => $goalModel,
			'goalTypes' => $goalTypes));
	?>
</div>

<div id="gb-add-connection-member-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<span class=" gb-top-heading gb-heading-left">Add Connection Member
	</span>
	<div id="gb-add-connection-member-modal-content">
		<?php
		echo $this->renderPartial('_add_connection_member_form', array(
				'connectionMemberModel' => $connectionMemberModel
		));
		?>
	</div>
</div>
<?php $this->endContent() ?>