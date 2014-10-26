<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-todo-discussion-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-no-padding',
  'gb-add-url' => Yii::app()->createUrl("todo/todo/addTodoDiscussion", array("todoId" => $todoId)),
  'gb-submit-prepend-to' => "#gb-discussions",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-header gb-form-header-2">
  <div class="row">
    <h3 class="gb-form-heading pull-left">Add Discussion List</h3>
    <div class="pull-right btn-group">
      <a class="gb-form-hide btn btn-xs btn-default">X</a>
    </div>
  </div>
</div>
<div class="gb-form-body row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-todo-discussion-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="form-group row">
    <?php echo $form->hiddenField($discussionModel, 'parent_discussion_id', array('id' => 'gb-todo-discussion-form-parent-discussion-id-input')); ?>
  </div>
  <div class="form-group row">
    <?php echo $form->textArea($discussionModel, 'description', array('id' => 'gb-todo-discussion-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 1000, 'placeholder' => 'Discussion Description. max 1000 characters', 'rows' => '6')); ?>
    <?php echo $form->error($discussionModel, 'description') ?>
  </div>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('class' => 'gb-submit-form btn btn-primary', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_REPLACE)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
     