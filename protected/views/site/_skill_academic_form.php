<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
		'id' => 'skill-academic-form',
		'enableAjaxValidation' => false,
		'htmlOptions' => array(
				'onsubmit' => "return true;")
				));
?>

<?php echo $form->errorSummary($academicModel); ?>
<h5>Self Management</h5>
<div class="row-fluid">
	<?php echo $form->textArea($academicModel, 'description', array('class' => 'span12', 'placeholder' => 'Description (Be Specific) - 150 characters', 'rows' => 2)); ?>
</div>
<div class="row-fluid">
	<?php echo $form->textField($academicModel, 'school', array('class' => 'span6', 'placeholder' => 'School')); ?>
	<?php echo $form->textField($academicModel, 'major', array('class' => 'span6', 'placeholder' => 'Major')); ?>
</div>
<div class="row-fluid">
	<?php echo $form->textArea($academicModel, 'extra_info', array('class' => 'span12', 'placeholder' => 'Description (Be Specific) - 150 characters', 'rows' => 2)); ?>
</div>

<div class="row-fluid">
	<button class="btn" >Cancel</button>
	<?php echo CHtml::submitButton('Post', array('class' => 'btn btn-success')); ?>
</div>

<?php $this->endWidget(); ?>

