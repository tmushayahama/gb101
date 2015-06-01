<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
    "data-gb-source-pk" => $todoModel->id,
    "data-gb-source" => Type::$SOURCE_TODO,
    "data-gb-source-type" => Type::$SOURCE_TYPE_PARENT,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-header gb-form-header-2">
 <div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 gb-xs-10 gb-padding-none">
   <p class="gb-form-heading gb-ellipsis">Edit a to-do list</p>
  </div>
  <div class="pull-right">
   <a class="gb-form-hide btn btn-default">X</a>
  </div>
 </div>
</div>
<div class="gb-form-body row">
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-todo-form-error-display" class="text-left row">

  </div>
 </div>
 <div class="form-group gb-hide row">
  <?php echo $form->hiddenField($todoModel, 'parent_todo_id', array('id' => 'gb-todo-form-parent-id-input')); ?>
 </div>
 <div class="form-group row gb-no-margin">
  <?php echo $form->textArea($todoModel, 'description', array('id' => 'gb-todo-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Todo Description. max 250 characters', 'rows' => '2')); ?>
  <?php echo $form->error($todoModel, 'description') ?>
 </div>
 <div class="form-group gb-hide row">
  <?php
  echo CHtml::activeDropDownList($todoModel, 'priority_id', $todoPriorities, array('empty' => 'Select Priority',
    'id' => 'gb-todo-form-priority-id-input',
    'class' => ' form-control col-lg-12 col-sm-12 col-xs-12'));
  ?>
  <?php echo $form->error($todoModel, 'priority_id'); ?>
 </div>
</div>
<div class="modal-footer gb-padding-medium gb-no-margin">
 <div class="pull-right btn-group">
  <a class="gb-form-hide btn btn-default">Cancel</a>
  <?php echo CHtml::submitButton("Done", array('class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => Type::$AJAX_RETURN_ACTION_EDIT)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
