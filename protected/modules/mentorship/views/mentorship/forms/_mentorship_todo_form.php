<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-mentorship-todo-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-white-background gb-padding-thin',
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-mentorship-todo-form-error-display" class="text-left row">

  </div>
</div>

<div class="form-group row">
  <?php echo $form->textField($todoModel, 'title', array('class' => 'input-sm form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'Title')); ?>
  <?php echo $form->error($todoModel, 'title') ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($todoModel, 'description', array('class' => 'input-sm form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'Description', 'rows' => '2')); ?>
  <?php echo $form->error($todoModel, 'description') ?>
</div>
<div class="form-group row">
  <?php echo $form->textField($todoModel, 'due_date', array('id' => 'gb-mentorship-todo-due-date', 'class' => 'input-sm form-control col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'Due Date')); ?>
  <?php echo $form->error($todoModel, 'due_date') ?>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('id' => 'gb-mentorship-todo-form-submit', 'class' => 'btn btn-success')); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
     