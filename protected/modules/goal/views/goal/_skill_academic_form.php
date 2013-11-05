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
				'class' => 'form',
				'onsubmit' => "return true;")
				));
?>

<?php echo $form->errorSummary($academicModel); ?>

<div class="control-group ">
	<div class="controls">
		<?php echo $form->textArea($goalModel, 'description', array('class' => 'span12', 'placeholder' => 'Description (Be Specific) - 150 characters', 'rows' => 3)); ?>

		<?php echo $form->textField($academicModel, 'school', array('class' => 'span6', 'placeholder' => 'School')); ?>
		<?php echo $form->textField($academicModel, 'major', array('class' => 'span6 pull-right', 'placeholder' => 'Major')); ?>
	</div>
</div>
<div class="control-group">
	<div class="controls">
		<?php echo $form->textField($goalModel, 'begin_date', array('id' => 'academic-begin-date', 'class' => 'span6', 'placeholder' => 'Begin Date')); ?>
		<?php echo $form->textField($goalModel, 'end_date', array('id' => 'academic-end-date', 'class' => 'span6 pull-right', 'placeholder' => 'Achieve Date')); ?>
	</div>
</div>
<div class="control-group">
	<div class="controls">
		<?php echo $form->textField($goalModel, 'points_pledged', array('class' => 'span6', 'placeholder' => 'Points')); ?>
	</div>
</div>

<div class="row-fluid">
	<div class="gb-btn-row-large">
		<?php echo CHtml::submitButton('Post', array('id'=>'skill-commitment-submit-btn', 'class' => 'span2 pull-right gb-btn gb-btn-blue-1 btn-large  pull-right')); ?>
		<a class="span2 pull-right gb-btn btn-large gb-btn-blue-1">Next <i class="icon-white icon-arrow-right"></i></a>
		<a id="gb-academic-form-back-btn" class="span2 pull-keft gb-btn btn-large gb-btn-blue-1"><i class="icon-white icon-arrow-left"></i> Back</a>
	</div>
</div>

<?php $this->endWidget(); ?>

