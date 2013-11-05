<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="gb-commitment-post rm-row">
	<span class='gb-top-heading gb-heading-left'>Skill Commitment</span>
	<div class="gb-post-title ">
		<span class="span1">
			<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
		</span>
		<span class="span8">
			<a><strong>Tremayne Mushayahama</strong></a><br>
			<small><a><i>Shared to <?php echo $connection_name ?></i></a> - <a>12/03/13</a></small>								
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
				<span class="span9"><p class="goal-commitment-description">
						<?php echo $description ?> <a>See More</a>
					</p>
				</span>
				<span class="span2">
					<a class="skill-level gb-btn pull-right text-center">Level <br> 1</a>
				</span>
			</div>
		</span>
		<span class=" span4">
			<ul class="gb-post-action pull-righ nav nav-stacked">
				<li><h6><i class="icon icon-play-circle"></i> Motivate <a class="gb-post-action-indicator pull-right">0</a></h6></li>
				<li><h6><i class="icon icon-eye-open"></i> Monitor<a class="gb-post-action-indicator pull-right">0</a></h6></li>
				<li><h6><i class="icon icon-tag"></i> Follow<a class="gb-post-action-indicator pull-right">0</a></h6></li>
				<li><h6><i class="icon icon-plus-sign"></i> Add Variety<a class="gb-post-action-indicator pull-right">0</a></h6></li>
				<li><h6><i class="icon icon-thumbs-up"></i> Assist<a class="gb-post-action-indicator pull-right">0</a></h6></li>
			</ul>
		</span>
	</div>
	<div class="span12 gb-skill-footer inline">
		<a class="gb-btn gb-btn-green-light-1">0 Mentors</a>
		<a class="gb-btn gb-btn-green-light-1">0 Mentees</a>
		<a class="pull-right gb-btn gb-btn-green-1"><i class="icon-white icon-1-5 icon-trash"></i></a>
		<a class="pull-right gb-btn gb-btn-green-1"><i class="icon-white icon-1-5 icon-edit"></i></a>
		<a class="pull-right gb-btn gb-btn-color-white gb-btn-green-light-1">More Details</a>
	</div>
</div>