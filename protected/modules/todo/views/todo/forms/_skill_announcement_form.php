<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-todo-announcement-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'data-gb-url' => Yii::app()->createUrl("todo/todo/addTodoAnnouncement", array("todoId" => $todoId)),
  'gb-edit-url' => Yii::app()->createUrl("todo/todo/editTodoAnnouncement", array()),
  'data-gb-prepend-to' => "#gb-announcements",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-todo-announcement-form-error-display" class="text-left row">
    </div>
  </div>
  <div class="form-group row">
    <?php echo $form->textField($announcementModel, 'title', array('id' => 'gb-todo-announcement-form-title-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Announcement Title')); ?>
    <?php echo $form->error($announcementModel, 'title') ?>
  </div>
  <div class="form-group row">
    <?php echo $form->textArea($announcementModel, 'description', array('id' => 'gb-todo-announcement-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Announcement Description. max 250 characters', 'rows' => '2')); ?>
    <?php echo $form->error($announcementModel, 'description') ?>
  </div>
  <div class="modal-footer">
    <div class="pull-right btn-group">
      <a class="gb-form-hide btn btn-default">Cancel</a>
      <?php echo CHtml::submitButton("Add", array('id' => '', 'class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>
     