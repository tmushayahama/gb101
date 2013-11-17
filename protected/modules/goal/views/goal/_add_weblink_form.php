<?php ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'goal-commitment-weblink-form',
 'enableAjaxValidation' => false,
 'htmlOptions' => array(
  'onsubmit' => "return false;")
  ));
?>

<?php echo $form->errorSummary($goalCommitmentWebLinkModel); ?>

<div class="modal-body">
  <dl class="dl-horizontal">
    <dt> 
    Name
    </dt>
    <dd>
      <?php echo $form->textField($goalCommitmentWebLinkModel, 'link', array('class' => 'span3')); ?>
    </dd>
    <dt>
    Description
    </dt> 
    <dd>
      <?php echo $form->textArea($goalCommitmentWebLinkModel, 'description', array('class' => 'span3', 'placeholder' => 'Description (optional)', 'rows' => 3)); ?>
    </dd>
  </dl>
</div>
<div class="modal-footer">
  <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
  <?php echo CHtml::submitButton('Add', array('class' => 'btn btn-success')); ?>
</div>

<?php $this->endWidget(); ?>

