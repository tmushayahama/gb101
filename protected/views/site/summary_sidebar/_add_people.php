<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>


<div class="row-fluid">
	<span class="span2">
		<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
	</span>
	<span class="span10">
		<p><a class="span8" circle-member-id="<?php echo $nonCircleMember->user_id; ?>"><?php echo $nonCircleMember->firstname." "; ?><br><?php echo $nonCircleMember->lastname; ?></a>
			<button class="add-circle-member-btn span4 btn btn-mini pull-right"><i class="icon icon-plus-sign"></i> Add</button>
		</p>
	</span>
</div>

