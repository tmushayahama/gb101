<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="gb-add-person-badge">
	<div class="span2 avatar">
		<img href="/prosfile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
	</div>
	<div class="span7 name">
		<a connection-member-id="<?php echo $nonConnectionMember->user_id; ?>"><?php echo $nonConnectionMember->firstname . " "; ?><?php echo $nonConnectionMember->lastname; ?></a>
	</div>
	<button class="span3 add-connection-member-btn gb-btn gb-btn-blue-3  "><i class="icon-white icon-plus-sign"></i> Add</button>

</div>
