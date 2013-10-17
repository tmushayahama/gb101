<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl . '/js/gb_home.js', CClientScript::POS_END
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
	<li class="active"><a  href="<?php echo Yii::app()->user->returnUrl ?>" data-asset-type="terrain"><div class="icon icon-home"></div><br>Home</a></li>
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

<div id="home-main-container" class="container-fluid">
	<div class="row-fluid">
		<!-- gb sidebar menu -->
		<div class="span7">
			<div id="gb-home-header" class="row-fluid">
				<div class="span3">
					<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
				</div>
				<div class="connectiom-info-container span5">
					<ul class="nav nav-stacked connectiom-info span12">
						<h3 class="name"><?php echo $userConnection->connection->name ?></h3>
						<li class="connectiom-description">
							<?php
							if ($userConnection->connection->description != null) :
								echo $userConnection->connection->description;
							else :
								echo 'No Description';
							endif;
							?>
						</li>
						<li class="connectiom-members">
							<img class="img-member" href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
							<img class="img-member" href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
						</li>
					</ul>
				</div>
				<ul class="nav nav-stacked row-fluid activities-summary span4">
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
			<!-- Posts -->

			<div id="gb-home-middle-container" class="row-fluid">

				<div id="gb-home-nav" class=" row-fluid span12">
					<a class="gb-active"><i class="icon-check"></i> Skills</a>
					<a class=""><i class="icon-time"></i> Goals</a>
					<a class=""><i class="icon-book"></i> Promises</a>
				</div>
				<br>
				<div class="row-fluid">
					<div class="span5 animated">

						<!-- <ul class="nav rm-nav nav-pills inline span12 rm-green-border">
							<li class="span6"><a href="#rm-assign-goal-modal" role="button" data-toggle="modal"><h4>Assign a goal</h4></a></li>
							<li class="span6"><a href="#"><h4>Assign a small task</h4></a></li>
						</ul>
						<ul class="nav rm-nav nav-pills inline span12 rm-green-border">
							<li class="span6"><a href="#"><h4>Create a challenge</h4></a></li>
							<li class="span6"><a href="#"><h4>Join a challenge</h4></a></li>
						</ul> -->

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
						<div id="gb-connection-members-sidebar" class="">
							<span class='gb-top-heading gb-heading-left'>
								<a>In All Connections</a>

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
					<div class="span7">
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
		</div>
		<div id="gb-home-sidebar" class="span3">
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

<div id="gb-add-skill-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<span class=" gb-top-heading gb-heading-left">Add Skill Commitment
	</span>
	<div class="row-fluid">

		<div id="academic" class="skill-entry-block">
			<div id="academic" class="skill-entry-cover">
				<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
				<br>
				<div class="content">
					<h3>Academic/Job Related</h3>
					<p>Related to how you conduct yourself.<br>
						<small><i>e.g. confident, independent, patient</i></small><p>
				</div>
			</div>
			<div class="hide skill-entry-form">
				<?php
				echo $this->renderPartial('_skill_academic_form', array(
						'academicModel' => $academicModel
				));
				?>
			</div>
		</div>
		<div id="self-management" class="skill-entry-block">
			<div id="academic" class="skill-entry-cover">
				<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
				<br>
				<div class="content">
					<h3>Self Management</h3>
					<p>Related to how you conduct yourself.<br>
						<small><i>e.g. confident, independent, patient</i></small><p>
				</div>
			</div>
			<div class="hide skill-entry-form">

			</div>
		</div>
		<div id="transferable" class="skill-entry-block">
			<div id="academic" class="skill-entry-cover">
				<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
				<br>
				<div class="content">
					<h3>Transferable</h3>
					<p>Related to how you conduct yourself.<br>
						<small><i>e.g. confident, independent, patient</i></small><p>
				</div>
			</div>
			<div class="hide skill-entry-form">

			</div>
		</div>
		<div id="skill-template" class="skill-entry-block">
			<div id="academic" class="skill-entry-cover">
				<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
				<br>
				<div class="content">
					<h3>Use Template</h3>
					<p>Related to how you conduct yourself.<br>
						<small><i>e.g. confident, independent, patient</i></small><p>
				</div>
			</div>
			<div class="hide skill-entry-form">

			</div>
		</div>
	</div>
</div>

<div id="gb-add-connection-member-modal" class="modal modal-slim hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<span class=" gb-top-heading gb-heading-left">Add Connection Member
	</span>
	<div id="gb-add-connection-member-modal-content">
		<?php
		echo $this->renderPartial('_add_connection_member_form', array(
				'userConnectionModel' => $userConnectionModel
		));
		?>
	</div>
</div>
<?php $this->endContent() ?>
