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
    "data-gb-source" => Type::$SOURCE_PROFILE_EXPERIENCE,
    "data-gb-source-type" => Type::$SOURCE_TYPE_PARENT,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-body row">
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-user-question-form-error-display" class="text-left row">

  </div>
 </div>
 <div class="form-group row gb-no-margin">
  <?php echo $form->textArea($profileModel, 'experience', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 150, 'placeholder' => 'Experience 150 characters', 'rows' => '5')); ?>
  <?php echo $form->error($profileModel, 'experience') ?>
 </div>
</div>
<div class="modal-footer gb-no-margin">
 <div class="pull-right btn-group">
  <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
  <?php echo CHtml::submitButton('Save Changes', array('gb-edit-btn' => 0, 'class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
