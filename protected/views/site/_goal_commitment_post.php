<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="gb-commitment-post rm-row">
	<span class='gb-top-heading gb-heading-left'><i>Goal Commitment</i></span>
	<span class='gb-top-heading gb-heading-right'><i class="icon-chevron-up"></i></span>
	<div class="gb-post-title ">
		<span class="span1">
			<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
		</span>
		<span class="span8">
			<a><strong>Tremayne Mushayahama</strong></a><br>
			<small><a><i>Goal Commitment</i></a> - <a>12/03/13</a></small>								
		</span>
		<span class="span3">
			<h4 class="pull-right"><?php echo $points_pledged ?>
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/puntos_icon.png" class="gb-puntos-icon" alt="P">
			</h4>
		</span> 
	</div>
	<div class="gb-post-content">
		<span class="span8">
			<h5 class="goal-commitment-title"><?php echo $title ?></h5>
			<div class="span12">
				<span class="span1"><i class="icon icon-align-justify"></i></span>
				<span class="span11"><p class="goal-commitment-description">
						<?php echo $description ?> <a>See More</a>
					</p>
				</span>
			</div>
		</span>
		<span class=" span4">
			<ul class="gb-post-action pull-righ nav nav-stacked">
				<li><h6><a class=""><i class="icon icon-play-circle"></i> Motivate </a><a class="gb-post-action-indicator pull-right">0</a></h6></li>
				<li><h6><a class=""><i class="icon icon-eye-open"></i> Monitor</a><a class="gb-post-action-indicator pull-right">0</a></h6></li>
				<li><h6><a class=""><i class="icon icon-tag"></i> Follow</a><a class="gb-post-action-indicator pull-right">0</a></h6></li>
				<li><h6><a class=""><i class="icon icon-plus-sign"></i> Add Variety</a><a class="gb-post-action-indicator pull-right">0</a></h6></li>
				<li><h6><a class=""><i class="icon icon-thumbs-up"></i> Assist</a><a class="gb-post-action-indicator pull-right">0</a></h6></li>
			</ul>
		</span>
	</div>
	<div class="gb-post-footer">
		<span class="span7">
		</span>
		<span class="span5">
			<button class="pull-right gb-btn gb-btn-blue-1"><i class="icon icon-circle-arrow-right"></i> More Info</button>
		</span> 
	</div>
</div>