<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'goal-mentorship-request-form',
			'enableAjaxValidation' => false,
			'htmlOptions' => array(
					'onsubmit' => "return false;")
	));
	?>

	<div class="modal-body">
		<div class="span4">
			
			<span class="span3">
				<?php
				echo CHtml::activeCheckboxList(
								$goalMentorshipModel, 'mentorshipsIdList', CHtml::listData($usersCanMentorshipList, 'user_id', 'firstname'), array(
						'labelOptions' => array('style' => 'display:inline')
								)
				);
				?>
			</span>
		</div>
	</div>
	<div class="modal-footer">
		<?php echo CHtml::submitButton('Submit', array('id'=>'send-mentorship-request-btn', 'class' => 'span3 gb-btn gb-btn-blue-1 btn-large')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
