<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
    'data-gb-url' => $actionUrl,
    'data-gb-prepend-to' => $prependTo,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-header gb-form-header-2">
 <div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 gb-xs-10 ">
   <p class="gb-form-heading gb-ellipsis">Add a contributor</p>
  </div>
  <div class="pull-right">
   <a class="gb-form-hide btn btn-default">X</a>
  </div>
 </div>
</div>
<div class="gb-form-body row">
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-contributor-form-error-display" class="text-left row">
  </div>
 </div>
 <div class="form-group gb-hide row">
  <?php echo $form->hiddenField($contributorModel, 'parent_contributor_id', array('id' => 'gb-contributor-form-parent-id-input')); ?>
 </div>
 <div class="form-group row">
  <?php
  echo CHtml::activeDropDownList($contributorModel, 'type_id', $contributorTypes, array('empty' => 'Select Type',
    'class' => ' form-control col-lg-12 col-sm-12 col-xs-12'));
  ?>
  <?php echo $form->error($contributorModel, 'type_id'); ?>
 </div>
 <div class="form-group row gb-no-margin">
  <?php echo $form->textArea($contributorModel, 'description', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 150, 'placeholder' => 'Invitation Message, 150 characters', 'rows' => '2')); ?>
  <?php echo $form->error($contributorModel, 'description') ?>
 </div>
 <div id="<?php echo $formId . '-people-display'; ?>" class="gb-selected-people-display row">
 </div>
 <div id="<?php echo $formId . '-people-ids'; ?>" class="gb-selected-people-ids gb-hide row">
 </div>
 <div id="<?php echo $formId . '-people-list'; ?>" class="gb-people-list row"
      data-gb-selection-type="multiple"
      data-gb-selected-display-container="<?php echo '#' . $formId . '-people-display'; ?>"
      data-gb-selected-ids-container="<?php echo '#' . $formId . '-people-ids'; ?>"
      data-gb-selected-input-name="gb-send-request-recepients">
 </div>
</div>
<div class="modal-footer gb-padding-medium gb-no-margin">
 <div class="pull-right btn-group">
  <a class="gb-form-hide btn btn-default">Cancel</a>
  <?php echo CHtml::submitButton("Post", array('class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
