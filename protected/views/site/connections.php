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
			<!-- Posts -->
			<div id="gb-connections-container" class="span8">
				<div id="topbar" class="span12">
					<div id="" class="span7">
						<h3 class="connection-name"></h3>
					</div>
					<div id="gb-topbar-name-title" class="pull-right span5">
						<span class="span2">
							<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
						</span>
						<span class="span10">
							<p>
								<a>Tremayne Mushayahama</a><br>
								<button class="btn btn-mini"><i class="icon icon-wrench"></i> Edit</button>
							</p>
						</span>
					</div>
					<div id="gb-topbar-notifications" class="span5">
						<p>
							<a></a>
						</p>
					</div>
				</div> 
				<div class="row-fluid">
					<div class="span12 inline">
						<?php foreach ($userConnections as $userConnection): ?>
							<?php
							echo $this->renderPartial('_user_connection_badge', array(
									"userConnection" => $userConnection, //$post->goalCommitment->type->type,
									"description" => 'ggg', //$post->goalCommitment->description,
									"points_pledged" => 'ppp', //$post->goalCommitment->points_pledged',
									'connection_name' => 'ooo'//$post->connection->name
							));
							?>
						<?php endforeach; ?>
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
				'userConnectionModel' => $userConnectionModel
		));
		?>
	</div>
</div>
<?php $this->endContent() ?>