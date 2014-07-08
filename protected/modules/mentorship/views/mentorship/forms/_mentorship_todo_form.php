<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-mentorship-todo-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'gb-add-url' => Yii::app()->createUrl("mentorship/mentorship/addMentorshipTodo", array("mentorshipId" => $mentorshipId)),
  'gb-submit-prepend-to' => "#gb-todos",
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
  <?php echo $form->textField($todoModel, 'title', array('id' => 'gb-mentorship-todo-form-title-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Title')); ?>
  <?php echo $form->error($todoModel, 'title') ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($todoModel, 'description', array('id' => 'gb-mentorship-todo-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Todo Description. max 250 characters', 'rows' => '2')); ?>
  <?php echo $form->error($todoModel, 'description') ?>
</div>
<div class="form-group row">       
  <?php
  echo CHtml::activeDropDownList($todoModel, 'priority_id', $mentorshipTodoPriorities, array('empty' => 'Select Priority',
   'id' => 'gb-mentorship-todo-form-priority-id-input',
   'class' => ' form-control col-lg-12 col-sm-12 col-xs-12'));
  ?>
  <?php echo $form->error($todoModel, 'priority_id'); ?>
</div> 
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('class' => 'gb-submit-form btn btn-primary', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_PREPEND)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
     