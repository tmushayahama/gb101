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

<div class="row-fluid">
	<?php echo $form->textArea($goalModel, 'description', array('class' => 'span12', 'placeholder' => 'Description (Be Specific) - 150 characters', 'rows' => 2)); ?>
</div>
<div class="row-fluid">
	<?php echo $form->textField($academicModel, 'school', array('class' => 'span6', 'placeholder' => 'School')); ?>
	<?php echo $form->textField($academicModel, 'major', array('class' => 'span6 pull-right', 'placeholder' => 'Major')); ?>
</div>
<div class="row-fluid">
	<?php echo $form->textField($goalModel, 'begin_date', array('id'=>'academic-begin-date', 'class' => 'span6', 'placeholder' => 'Begin Date')); ?>
	<?php echo $form->textField($goalModel, 'end_date', array('id'=>'academic-end-date', 'class' => 'span6 pull-right', 'placeholder' => 'Achieve Date')); ?>
</div>
<div class="row-fluid">
	<?php echo $form->textField($goalModel, 'points_pledged', array('class' => 'span6', 'placeholder' => 'Points')); ?>
	<a class="span4 pull-right gb-btn gb-btn-brown-1">Extra Info </a>
</div>

<div class="row-fluid">
	<button class="btn" >Cancel</button>
	<?php echo CHtml::submitButton('Post', array('class' => 'btn btn-success')); ?>
</div>

<?php $this->endWidget(); ?>

