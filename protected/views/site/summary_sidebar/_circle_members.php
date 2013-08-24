<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<span class='gb-top-heading gb-heading-left'>In This Circle</span>
<span class='gb-top-heading gb-heading-right'><i class="icon-white icon-chevron-up"></i></span>

<ul class="thumbnails">
	<?php for($i=0; $i<4; $i++): ?>
	<li class="span2">
		<div class="thumbnail">
			<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
			<p><a>Tremayne</a></p>
		</div>
	</li>
	<?php endfor; ?>
	...
	<li class="span2 pull-right">
		<div class="thumbnail">
		<p><a class="">View All</a></p>
		</div>
	</li>
</ul>