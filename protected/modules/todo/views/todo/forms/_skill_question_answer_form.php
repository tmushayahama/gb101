<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-todo-question-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-no-padding',
  'gb-add-url' => Yii::app()->createUrl("todo/todo/addTodoquestion", array("todoId" => $todoId)),
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-header gb-form-header">
  <div class="row">
    <h3 class="gb-form-heading pull-left">Add Question & Answer List</h3>
    <div class="pull-right btn-group">
      <a class="gb-form-hide btn btn-sm btn-default">X</a>
    </div>
  </div>
</div>
<div class="gb-form-body row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-todo-question-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="form-group gb-hide row">
    <?php echo $form->hiddenField($questionModel, 'parent_question_id', array('id' => 'gb-todo-question-form-parent-question-id-input')); ?>
    <?php echo $form->hiddenField($questionModel, 'status', array('id' => 'gb-todo-question-form-status-input')); ?>
  </div>
  <div class="form-group row gb-no-margin">
    <?php echo $form->textArea($questionModel, 'description', array('id' => 'gb-todo-question-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'question Description. max 250 characters', 'rows' => '3')); ?>
    <?php echo $form->error($questionModel, 'description') ?>
  </div>
</div>
<div class="modal-footer gb-padding-medium gb-no-margin">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('class' => 'gb-submit-form btn btn-primary', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_REPLACE)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
     