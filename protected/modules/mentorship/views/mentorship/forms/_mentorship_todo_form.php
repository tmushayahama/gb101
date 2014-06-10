<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-mentorship-todo-form',
 'enableAjaxValidation' => false,
 'clientOptions' => array(
  'validateOnSubmit' => false,
 ),
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-white-background gb-padding-thin',
  'onsubmit' => "return false;",
  'enctype' => 'multipart/form-data',
 ),
  ));
?>

<div class="form-group row">
  <?php echo $form->textField($todoModel, 'title', array('class' => 'input-sm form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'Title')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($todoModel, 'description', array('class' => 'input-sm form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'Description', 'rows' => '2')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textField($todoModel, 'due_date', array('id' => 'gb-mentorship-todo-due-date', 'class' => 'input-sm form-control col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'Due Date')); ?>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('class' => 'btn btn-success', 'onclick' => 'addMentorshipTodo();')); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
     