<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'skill-form',
			'enableAjaxValidation' => false,
			'htmlOptions' => array(
					'onsubmit' => "return false;")
	));
	?>

	<?php echo $form->errorSummary($skillModel); ?>

	<div class="modal-body">
		<dl class="dl-horizontal">
			<dt><img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
			</dt>
			<dd>
				<?php echo $form->textArea($skillModel, 'description', array('class' => 'span4', 'placeholder' => 'Description (Be Specific) - 150 characters', 'rows' => 2)); ?>
			</dd>
			<dt> 
			<?php echo $form->labelEx($skillModel, 'type_id'); ?>
			</dt>
			<dd>
				<?php echo $form->dropDownList($skillModel, 'type_id', CHtml::listData($skillTypes, 'id', 'type'), array('class' => 'span4')); ?>
			</dd>
			<dt>Expected Timeline</dt>
			<dd>
				<?php echo $form->textField($skillModel, 'begin_date', array('id'=>'skill_commitment_begin_date', 'class' => 'span2', 'placeholder' => 'from')); ?>
				<?php echo $form->textField($skillModel, 'end_date', array('id'=>'skill_commitment_end_date', 'class' => 'span2', 'placeholder' => 'to')); ?>
			</dd>
			<dt> 
			<?php echo $form->labelEx($skillModel, 'points_pledged'); ?>
			</dt>
			<dd>
				<?php echo $form->textField($skillModel, 'points_pledged', array('class' => 'span4')); ?>
			</dd>
		</dl>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		<?php echo CHtml::submitButton('Post Commitment', array('id' => 'skill-commitment-submit-btn', 'class' => 'btn btn-success')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
