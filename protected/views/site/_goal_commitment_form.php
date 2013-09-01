<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'goal-form',
			'enableAjaxValidation' => false,
			'htmlOptions' => array(
					'onsubmit' => "return false;")
	));
	?>

	<?php echo $form->errorSummary($goalModel); ?>

	<div class="modal-body">
		<dl class="dl-horizontal">
			<dt><img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
			</dt>
			<dd>
				<?php echo $form->textArea($goalModel, 'description', array('class' => 'span4', 'placeholder' => 'Description (Be Specific) - 150 characters', 'rows' => 2)); ?>
			</dd>
			<dt> 
			<?php echo $form->labelEx($goalModel, 'type_id'); ?>
			</dt>
			<dd>
				<?php echo $form->dropDownList($goalModel, 'type_id', CHtml::listData($goalTypes, 'id', 'type'), array('class' => 'span4')); ?>
			</dd>
			<dt>Expected Timeline</dt>
			<dd>
				<?php echo $form->textField($goalModel, 'begin_date', array('id'=>'goal_commitment_begin_date', 'class' => 'span2', 'placeholder' => 'from')); ?>
				<?php echo $form->textField($goalModel, 'end_date', array('id'=>'goal_commitment_end_date', 'class' => 'span2', 'placeholder' => 'to')); ?>
			</dd>
			<dt> 
			<?php echo $form->labelEx($goalModel, 'points_pledged'); ?>
			</dt>
			<dd>
				<?php echo $form->textField($goalModel, 'points_pledged', array('class' => 'span4')); ?>
			</dd>
		</dl>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		<?php echo CHtml::submitButton('Post Commitment', array('id' => 'goal-commitment-submit-btn', 'class' => 'btn btn-success')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
