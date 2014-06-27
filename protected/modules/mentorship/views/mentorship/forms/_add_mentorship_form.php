<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-mentorship-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-mentorship-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-thin">
    <br>
    <?php echo $form->hiddenField($mentorshipModel, 'type', array('id' => 'gb-mentorship-form-type-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
    <?php echo $form->hiddenField($mentorshipModel, 'person_chosen_id', array('id' => 'gb-mentorship-form-person-chosen-id-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
    <div class="form-group row">
      <h5 class="gb-padding-medium col-lg-4 col-md-4 col-sm-4 col-xs-12">I want to</h5>
      <a class="gb-select-mentorship-type btn btn-default col-lg-4 col-md-6 col-sm-6 col-xs-12" gb-mentorship-type="1">Mentor</a>
      <a class="gb-select-mentorship-type btn btn-default col-lg-4 col-md-6 col-sm-6 col-xs-12" gb-mentorship-type="2">Request</a>
    </div>
    <div class="form-group row">
      <div class="gb-name col-lg-12">
        <span class="gb-choose-people-name"></span> <span class="btn btn-xs btn-default">X</span>
      </div>
      <a class="gb-choose-people gb-choose-people-btn gb-hide btn btn-link">Choose Mentee</a>
    </div>

    <div class="form-group row">
      <?php echo $form->textField($mentorshipModel, 'goal_title', array('id' => 'gb-mentorship-form-goal-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 100, 'placeholder' => 'Mentorship Skill')); ?>
      <?php echo $form->error($mentorshipModel, 'goal_title'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textField($mentorshipModel, 'title', array('id' => 'gb-mentorship-form-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 100, 'placeholder' => 'Mentorship Title')); ?>
      <?php echo $form->error($mentorshipModel, 'title'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textArea($mentorshipModel, 'description', array('class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Mentorship Description. max 250 characters', 'rows' => 2)); ?>
      <?php echo $form->error($mentorshipModel, 'description'); ?>
    </div>
    <div class="form-group row">       
      <?php
      echo CHtml::activeDropDownList($mentorshipModel, 'level_id', $mentorshipLevelList, array('empty' => 'Select Skill Level',
       'class' => ' form-control col-lg-12 col-sm-12 col-xs-12'));
      ?>
      <?php echo $form->error($mentorshipModel, 'level_id'); ?>
    </div> 
  </div>
</div>
<?php
switch ($formType):
  case GoalType::$FORM_TYPE_MENTORSHIP_HOME:
    ?>
    <div class="modal-footer">
      <div class="pull-right btn-group">
        <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
        <?php echo CHtml::submitButton('Submit', array('id' => 'gb-mentorship-btn', 'class' => 'btn btn-primary')); ?>
      </div>
    </div>
    <?php
    break;
  case GoalType::$FORM_TYPE_MENTORSHIP_MENTORSHIP:
    ?>
    <div class="row">
      <button type="button" class="btn btn-default gb-form-hide col-lg-6 col-sm-6 col-xs-12" >Cancel</button>
      <?php echo CHtml::submitButton('Submit', array('id' => 'gb-mentorship-btn', 'source' => 'skill-page', 'class' => 'btn btn-primary col-lg-6 col-sm-6 col-xs-12')); ?>

    </div>
    <?php
    break;
endswitch;
?>
<?php $this->endWidget(); ?>
