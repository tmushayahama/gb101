<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>
<div class="container-fluid"> 
  <div class="row-fluid">
    <div class="span9"> 
      <div class="container-fluid rm-container">
        <div class="row-fluid rm-white">
					<div class="span3 rm-sidebar">
						<!--		<ul class="nav nav-stacked">
									<li><h5><a href="/profile/{{ user.username }}">My Profile</a></h5></li>
									<li><h5><a href="#">Recent Commitments</a></h5></li>
									<li>
										<ul id="rm-goals-home" class="nav nav-stacked">
										</ul>
									</li>
									<li><h5><a href="#">Goal List</a></h5></li>
									<li>
										<ul class=" nav nav-stacked">
										</ul>
									</li>
									<li><h5><a href="#">Friends</a></h5></li>
									<li><h5><a href="#">Groups</a></h5></li>
									<li><h5><a href="#">More</a></h5></li>
								</ul> -->
					</div> 
          <div class="span9">
						<div class="gb-group-sidebar">
							<!--Menu content-->
							<ul class="nav nav-pills nav-stacked">
								<li class="active"><a href="#">All</a></li>
								<li><a href="#">Friends</a></li>
								<li><a href="#">Family</a></li>
								<li><a href="#">Followers</a></li>
							</ul>
						</div>
						<div class="gb-group-content">
							<div class="row-fluid gb-group-header">
								<span class="span6">
									<a class="a1">All</a>
								</span>
								<span class="span6">
									<a>Add Friend</a>
								</span>
							</div>
							<!--Body content -->
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
				</div>
			</div>
		</div>
		<div class="span3">
			<div class="container-fluid"> 
				<div class="row-fluid">
					<div class="span12 rm-sidebar">
						<!--Ad content-->
						<ul class=" nav nav-stacked">
							<li><h5><a href="#">Today</a></h5></li>
							<li>
								<ul class=" nav nav-stacked">
									<li><a href="#">Linda's Goal</a></li>
								</ul>
							</li>
							<li><h5><a href="#">This Week</a></h5></li>
							<li>
								<ul class="nav nav-stacked">
									<li><a href="#">Your Goal Due</a></li>
									<li><a href="#">Alice Goal Due</a></li>
								</ul>
							</li>
						</ul>
						<ul id="gb-suggested-friends" class="nav nav-stacked"> 
							<li class="span12 inline">
								<h5>
									<a>Suggested Friends</a>
									<a class="pull-right">View All</a>
								</h5>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- =====================Extras======================-->
<div id="rm-assign-goal-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="rm-assign-goal-modal-Label">Assign Goal</h3>
	</div>
	<div class="modal-body">
		<dl class="dl-horizontal">
			<dt>Goal Target(s)</dt>
			<dd class="dropdown">
				<a href="#" class="rm-white-btn dropdown-toggle" data-toggle="dropdown">Friends <b class="caret"></b></a>
				<ul class="dropdown-menu rm-stop-propagation">
					<li class="nav-header">Max 5</li>
					<li class="controls">
						<label class="checkbox">
							<input type="checkbox" value="option1"> Select All
						</label>
						<label class="checkbox">
							<input type="checkbox" value="option2"> Linda Nolie
						</label>
						<label class="checkbox">
							<input type="checkbox" value="option3">John Nolie
						</label>
						<label class="checkbox">
							<input type="checkbox" value="option3"> Joyce Mushayahama
						</label>
					</li>
				</ul>
			</dd>
			<br>
			<dt>Goal Name</dt>
			<dd><input type="text" placeholder="Goal Name (Be Specific)"></dd>
			<dt>Goal Description</dt>
			<dd><textarea rows="2" placeholder="Describe the goal" type="text"></textarea></dd>
			<dt>Award/Trophy</dt>
			<dd><select>
					<option>Just For Fun</option>
					<option>Cookies</option>
					<option>Money</option>
					<option>Date</option>
				</select></dd>
		</dl>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-success">Send Request</button>
	</div>
</div>

<div id="rm-monitor-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="rm-assign-goal-modal-Label">Monitor Linda's Goal</h3>
	</div>
	<div class="modal-body">
		<dl class="dl-horizontal">
			<dt>Goal Type</dt>
			<dd class="dropdown">
				<p><strong>Business</strong></h4>
			</dd>
			<dt>Goal Description</dt>
			<dd class="dropdown">
				<p>I want to get a finish this project by May. This might be the next best thing</p>
			</dd>
			<br>
			<dt>Time Period</dt>
			<dd>4/24/13 - 5/12/13</dd>
		</dl>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-success">Send Request</button>
	</div>
</div>
<?php $this->endContent(); ?>