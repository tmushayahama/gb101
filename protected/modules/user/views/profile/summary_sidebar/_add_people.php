<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>


	<td class="avatar">
		<img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
	</td>
	<td class="name">
		<div class="one-line"><a class="name" connection-member-id="<?php echo $nonConnectionMember->user_id; ?>"><?php echo $nonConnectionMember->firstname . " "; ?><br><?php echo $nonConnectionMember->lastname; ?></a><br>
		</div>
		<a class="connections-stat">16 Connections</a>
	</td>
	<td class="action">
		<button class="add-connection-member-btn btn btn-mini"><i class="icon icon-plus-sign"></i> Add</button>
	</td>

