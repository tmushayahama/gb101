<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-request-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'gb-add-url' => Yii::app()->createUrl("site/sendRequest", array()),
  'gb-submit-prepend-to' => "#gb-requests",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <?php echo $form->hiddenField($requestModel, 'data_source', array('id' => 'gb-request-form-data-source-input')); ?>
  <?php echo $form->hiddenField($requestModel, 'source_id', array('id' => 'gb-request-form-source-id-input')); ?>
  <?php echo $form->hiddenField($requestModel, 'type', array('id' => 'gb-request-form-type-input')); ?>
  <?php echo $form->hiddenField($requestModel, 'status', array('id' => 'gb-request-form-status-input')); ?>
  <?php echo $form->hiddenField($requestModel, 'recipient_id', array('id' => 'gb-request-form-recipient-id-input')); ?>
  <br>
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-request-form-error-display" class="text-left row">
    </div>
  </div>  
  <div class="form-group gb-requester-owner row">
    <a id="gb-request-to-trigger" class="gb-send-request-modal-trigger gb-form-show col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
       gb-selected-id-array="#gb-send-request-textboxes"
       gb-selected-display="#gb-send-request-display"
       gb-selected-input-name="gb-send-request-recepients"></a>
    <div id="gb-send-request-textboxes" class="gb-hide gb-share-with-textboxes"></div>
    <div id="gb-send-request-display" class="gb-share-with-display"></div>
  </div>
   <div class="form-group row">
    <?php echo $form->textField($requestModel, 'title', array('id' => 'gb-request-form-title-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => '')); ?>
    <?php echo $form->error($requestModel, 'title') ?>
  </div>
  <div class="form-group row">
    <?php echo $form->textArea($requestModel, 'message', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Request Message. max 250 characters', 'rows' => '3')); ?>
    <?php echo $form->error($requestModel, 'message') ?>
  </div>
  <div class="modal-footer">
    <div class="pull-right btn-group">
      <a class="gb-form-hide btn btn-default" data-dismiss="modal">Cancel</a>
      <?php echo CHtml::submitButton("Request", array('id' => '', 'class' => 'gb-submit-form btn btn-primary', 'gb-edit-btn' => '0', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_REPLACE)); ?>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>
     