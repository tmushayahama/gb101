<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => '',
    'data-gb-url' => $actionUrl,
    'data-gb-prepend-to' => $prependTo,
    "data-gb-source-pk" => 0,
    "data-gb-source" => Type::$SOURCE_PROFILE_HEADER,
    "data-gb-source-type" => Type::$SOURCE_TYPE_PARENT,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="row">
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-user-question-form-error-display" class="text-left row">

  </div>
 </div>
 <div class="form-group row">
  <label>First Name</label>
  <?php echo $form->textField($profileModel, 'firstname', array('class' => ' form-control col-lg-6 col-md-6 col-sm-6 col-xs-12', 'maxlength' => 150, 'placeholder' => 'First Name')); ?>
  <?php echo $form->error($profileModel, 'firstname') ?>
 </div>
 <div class="form-group row">
  <label>Last Name</label>
  <?php echo $form->textField($profileModel, 'lastname', array('class' => ' form-control col-lg-6 col-md-6 col-sm-6 col-xs-12', 'maxlength' => 150, 'placeholder' => 'Last Name')); ?>
  <?php echo $form->error($profileModel, 'lastname') ?>
 </div>
 <div class="form-group row gb-no-margin">
  <label>Welcome Message</label>
  <?php echo $form->textArea($profileModel, 'welcome_message', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 150, 'placeholder' => 'Welcome Message 150 characters', 'rows' => '3')); ?>
  <?php echo $form->error($profileModel, 'welcome_message') ?>
 </div>
</div>
<div class="modal-footer gb-no-margin">
 <div class="pull-right btn-group">
  <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
  <?php echo CHtml::submitButton('Save Changes', array('gb-edit-btn' => 0, 'class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
