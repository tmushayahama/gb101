<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'goal-commitment-form',
			'enableAjaxValidation' => false,
			'htmlOptions' => array(
					'onsubmit' => "return true;")
	));
	?>

	<?php echo $form->errorSummary($userCircleModel); ?>

	<div class="modal-body">
		<div class="span4">
			<span class="span1"><img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
			<p><a id="gb-circle-member-modal-fullname"></a>
				<?php echo $form->hiddenField($userCircleModel, 'circle_member_id') ?> 
			</p>
			</span>
			<span class="span2">
				<?php
				echo CHtml::activeCheckboxList(
								$userCircleModel, 'userIdList', CHtml::listData(Circle::model()->findAll(), 'id', 'name'), array(
						'labelOptions' => array('style' => 'display:inline')
								)
				);
				?>
			</span>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		<?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-success')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
