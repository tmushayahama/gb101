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
  <?php echo $form->hiddenField($requestModel, 'source_id', array('id' => 'gb-request-form-source-id-input')); ?>
  <?php echo $form->hiddenField($requestModel, 'type', array('id' => 'gb-request-form-type-input')); ?>
  <?php echo $form->hiddenField($requestModel, 'status', array('id' => 'gb-request-form-status-input')); ?>
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gbrequest-form-error-display" class="text-left row">
    </div>
  </div> 
  <div class="form-group row">
    <h5 class="pull-left gb-padding-thin">Requesting to: <span class="gb-send-request-privacy">Customize</span></h5>
  </div>
  <div class="form-group row">
    <div id="gb-send-request-textboxes" class="gb-hide gb-share-with-textboxes"></div>
    <div id="gb-send-request-display" class="gb-share-with-display"></div>
  </div>
  <div class="form-group row">
    <?php echo $form->textArea($requestModel, 'message', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Request Message. max 250 characters', 'rows' => '4')); ?>
    <?php echo $form->error($requestModel, 'message') ?>
  </div>
  <div class="modal-footer">
    <div class="pull-right btn-group">
      <a class="gb-form-hide btn btn-default" data-dismiss="modal">Cancel</a>
      <?php echo CHtml::submitButton("Send", array('id' => '', 'class' => 'gb-submit-form btn btn-primary', 'gb-edit-btn' => '0', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_PREPEND)); ?>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>
     