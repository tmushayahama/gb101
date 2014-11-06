<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-skill-todo-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-no-padding',
  'gb-add-url' => Yii::app()->createUrl("skill/skill/addSkillTodo", array("skillId" => $skillId)),
  'gb-submit-prepend-to' => "#gb-todos",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-header gb-form-header-2">
  <div class="row">
    <h3 class="gb-form-heading pull-left">Add Todo List</h3>
    <div class="pull-right btn-group">
      <a class="gb-form-hide btn btn-sm btn-default">X</a>
    </div>
  </div>
</div>
<div class="gb-form-body row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-skill-todo-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="form-group row gb-hide">
    <?php echo $form->hiddenField($todoModel, 'type', array('value'=>Type::$SOURCE_SKILL)); ?>
    <?php echo $form->hiddenField($todoModel, 'todo_parent_id', array('id' => 'gb-skill-todo-form-parent-todo-id-input')); ?>
  </div>
  <div class="form-group row gb-no-margin">
    <?php echo $form->textArea($todoModel, 'description', array('id' => 'gb-skill-todo-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Todo Description. max 250 characters', 'rows' => '2')); ?>
    <?php echo $form->error($todoModel, 'description') ?>
  </div>
  <div class="form-group gb-hide row">       
    <?php
    echo CHtml::activeDropDownList($todoModel, 'priority_id', $skillTodoPriorities, array('empty' => 'Select Priority',
     'id' => 'gb-skill-todo-form-priority-id-input',
     'class' => ' form-control col-lg-12 col-sm-12 col-xs-12'));
    ?>
    <?php echo $form->error($todoModel, 'priority_id'); ?>
  </div> 
</div>
<div class="modal-footer gb-padding-medium gb-no-margin">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('class' => 'gb-submit-form btn btn-primary', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_REPLACE)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
     