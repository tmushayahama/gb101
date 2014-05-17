<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-mentorship-todo-form',
 'enableAjaxValidation' => false,
 'clientOptions' => array(
  'validateOnSubmit' => false,
 ),
 'htmlOptions' => array('class'=>'gb-hide col-lg-12 col-sm-12 col-xs-12',
  'onsubmit' => "return false;",
  'enctype' => 'multipart/form-data',
 ),
  ));
?>

<div class="form-group row">
  <?php echo $form->textField($todoModel, 'title', array('class' => 'input-sm col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'Title')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textField($todoModel, 'description', array('class' => 'input-sm col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'Description', 'rows' => '2')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textField($todoModel, 'due_date', array('class' => 'input-lg col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'email@example.com')); ?>
</div>

<div class="form-group row">
  <?php echo CHtml::submitButton(UserModule::t("Add"), array('class' => 'btn btn-primary', 'onclick' => 'addMentorshipTodo();')); ?>
  <a class="gb-add-todo-clear-btn btn btn-default">Clear</a>
</div>
<?php $this->endWidget(); ?>
     