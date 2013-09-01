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
		<p><a class="span8" connection-member-id="<?php echo $nonConnectionMember->user_id; ?>"><?php echo $nonConnectionMember->firstname." "; ?><br><?php echo $nonConnectionMember->lastname; ?></a>
			<button class="add-connection-member-btn span4 btn btn-mini pull-right"><i class="icon icon-plus-sign"></i> Add</button>
		</p>
	</span>
</div>

