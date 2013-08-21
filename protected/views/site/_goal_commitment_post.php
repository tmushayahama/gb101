<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="gb-commitment-post rm-row">
	<div class="gb-post-title">
		<span class="span1">
			<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
		</span>
		<span class="span8">
			<a><strong>Tremayne Mushayahama</strong></a><br>
			<small><a><i>Shared Publicly</i></a> - <a>12/03/13</a></small>								
		</span>
		<span class="span3">
			<button class="btn pull-right btn-info btn-mini"><i class="icon icon-circle-arrow-right"></i> More Info</button>
		</span> 
	</div>
	<div class="gb-post-content">
		<span class="span9">
			<p>
				<?php echo $description ?> <a>See More</a>
			</p>
		</span>
		<span class=" span3">
			<ul class="gb-post-action pull-right nav nav-stacked">
				<li><a class=""><i class="icon icon-play-circle"></i> Motivate</a></li>
				<li><a class=""><i class="icon icon-eye-open"></i> Monitor</a></li>
				<li><a class=""><i class="icon icon-tag"></i> Follow</a></li>
				<li><a class=""><i class="icon icon-plus-sign"></i> Add Variety</a></li>
				<li><a class=""><i class="icon icon-thumbs-up"></i> Assist</a></li>
			</ul>
		</span>
	</div>
</div>