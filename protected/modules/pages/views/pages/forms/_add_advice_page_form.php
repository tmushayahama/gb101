<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<script>
  $(function() {
    $("#gb-advice-page-subgoals").spinner({
      create: $("#gb-advice-page-subgoals").removeClass("ui-spinner-input"),
      spin: function(event, ui) {
        //$("#gb-advice-page-subgoals").removeClass("ui-spinner-input");
        if (ui.value > 10) {
          $(this).spinner("value", 1);
          return false;
        } else if (ui.value < 1) {
          $(this).spinner("value", 10);
          return false;
        }
      }
    });
    $("#gb-advice-page-subgoals").removeClass("ui-spinner-input");
    $("#gb-advice-page-subgoals").parent().removeClass("ui-widget-content");
    $("#gb-advice-page-subgoals").parent().removeClass("ui-corner-all");
    $("#gb-advice-page-subgoals").parent().css('margin-right', '10px');
    $("#gb-advice-page-subgoals").css('background-color', 'white');
    $("#gb-advice-page-subgoals").css('cursor', 'text');
  });

</script>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-add-advice-page-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-add-advice-page-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><strong>Examples</strong>:<br>
      6 ways to make eggs.<br>
      3 tips to find your dream job.</p>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <div class="form-group row">
      <div class="col-lg-4 col-sm-4 col-xs-12 gb-no-padding">
        <?php echo $form->textField($advicePageModel, 'subgoals', array('id' => 'gb-advice-page-subgoals', 'class' => 'btn input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Select Number', 'readonly' => true)); ?>
        <?php echo $form->error($advicePageModel, 'subgoals'); ?>
      </div>
      <div class="col-lg-8 col-sm-8 col-xs-12 gb-no-padding">
        <?php
        echo CHtml::activeDropDownList($advicePageModel, 'level_id', $pageLevelList, array('empty' => 'Select Advice Category',
         'class' => 'input-sm form-control col-lg-8 col-sm-12 col-xs-12'));
        ?>
        <?php echo $form->error($advicePageModel, 'level_id'); ?>
      </div>
    </div> 
    <div class="form-group row">
      <?php echo $form->textField($pageModel, 'title', array('class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Name of the skill')); ?>
      <?php echo $form->error($pageModel, 'title'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textArea($pageModel, 'description', array('class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Skill Description max 140 characters', 'rows' => 2)); ?>
      <?php echo $form->error($pageModel, 'description'); ?>
    </div>
  </div>
</div>
<?php if ($fromHomePage): ?>
  <div class="modal-footer">
    <div class="pull-right btn-group">
      <button type="button" class="btn btn-default gb-skill-list-form-cancel-btn" data-dismiss="modal">Cancel</button>
      <!-- <button type="button" id="gb-skill-form-back-btn-disabled" class="btn btn-default gb-btn-disabled-1"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
      <button type="button" id="gb-skill-form-back-btn" form-num="0" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
      <button type="button" id="gb-skill-form-next-btn-disabled" class="btn btn-default gb-btn-disabled-1">Next <i class="glyphicon glyphicon-arrow-right"></i></button>
      <button type="button" id="gb-skill-form-next-btn" form-num="0" class="btn btn-default">Next <i class="glyphicon glyphicon-arrow-right"></i></button> -->
      <?php echo CHtml::submitButton('Submit', array('id' => 'gb-add-advice-page-btn', 'source' => 'home-page', 'class' => 'btn btn-primary')); ?>
    </div>
  </div>
<?php else: ?>
  <div class="modal-footer">
    <div class="pull-right btn-group">
      <button type="button" class="btn btn-default gb-form-hide gb-cancel-mentorship-btn col-lg-6 col-sm-6 col-xs-12" >Cancel</button>
     <!-- <button type="button" id="gb-skill-form-back-btn-disabled" class="btn btn-default gb-btn-disabled-1"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
      <button type="button" id="gb-skill-form-back-btn" form-num="0" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
      <button type="button" id="gb-skill-form-next-btn-disabled" class="btn btn-default gb-btn-disabled-1">Next <i class="glyphicon glyphicon-arrow-right"></i></button>
      <button type="button" id="gb-skill-form-next-btn" form-num="0" class="btn btn-default">Next <i class="glyphicon glyphicon-arrow-right"></i></button> -->
      <?php if (!($pageModel->isNewRecord && $advicePageModel->isNewRecord)): ?>     
        <?php echo CHtml::submitButton('Save', array('id' => 'edit-advice-page-btn', 'source' => 'skill-page', 'class' => 'btn btn-primary col-lg-6 col-sm-6 col-xs-12')); ?>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
<?php $this->endWidget(); ?>
