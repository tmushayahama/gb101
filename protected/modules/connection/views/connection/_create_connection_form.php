<?php ?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'connection-form',
			'enableAjaxValidation' => false,
			'htmlOptions' => array(
					'onsubmit' => "return true;")
	));
	?>

	<?php echo $form->errorSummary($connectionModel); ?>

	<div class="modal-body">
		<dl class="dl-horizontal">
			<dt> 
			Name
			</dt>
			<dd>
				<?php echo $form->textField($connectionModel, 'name', array('class' => 'span3')); ?>
			</dd>
			<dt>
			Description
			</dt> 
			<dd>
				<?php echo $form->textArea($connectionModel, 'description', array('class' => 'span3', 'placeholder' => 'Description (optional)', 'rows' => 2)); ?>
			</dd>
		</dl>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		<?php echo CHtml::submitButton('Create Connection', array('class' => 'btn btn-success')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
