<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'promise-menteeship-request-form',
			'enableAjaxValidation' => false,
			'htmlOptions' => array(
					'onsubmit' => "return false;")
	));
	?>

	<div class="modal-body">
		<div class="span4">
			
			<span class="span3">
          <?php //echo $form->hiddenField($promiseMenteeshipModel, '[2]mentorship_id', array('id'=>"gb-menteeship-user-id-input")); ?>
         
			</span>
		</div>
	</div>
	<div class="modal-footer">
		<?php echo CHtml::submitButton('Send', array('id'=>'send-menteeship-request-btn', 'class' => 'span2 gb-btn gb-btn-blue-1 btn-large')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
