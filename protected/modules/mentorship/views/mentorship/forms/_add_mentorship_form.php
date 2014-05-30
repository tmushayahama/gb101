<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-add-mentorship-form',
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
    <div id="gb-add-mentorship-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><i>To manage the mentorship, you can only mentor a skill or a goal you've
        listed in your skill gained or goal achieved. </i></p>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <div class="form-group row">       
      <?php
      echo CHtml::activeDropDownList($mentorshipModel, 'goal_id', $skillGainedList, array('empty' => 'Select Skill Gained',
      'id'=>'gb-add-mentorship-form-goal-id',
     'class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12'));
      ?>
      <?php echo $form->error($mentorshipModel, 'goal_id'); ?>
    </div> 
    <div class="form-group row">
      <?php echo $form->textField($mentorshipModel, 'title', array('id' => 'gb-skillist-title-input', 'class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Mentorship Title')); ?>
      <?php echo $form->error($mentorshipModel, 'title'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textArea($mentorshipModel, 'description', array('class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Mentorship Description', 'rows' => 2)); ?>
      <?php echo $form->error($mentorshipModel, 'description'); ?>
    </div>
    <div class="form-group row">       
      <?php
      echo CHtml::activeDropDownList($mentorshipModel, 'level_id', $mentorshipLevelList, array('empty' => 'Select Skill Level',
       'class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12'));
      ?>
      <?php echo $form->error($mentorshipModel, 'level_id'); ?>
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
      <?php echo CHtml::submitButton('Submit', array('id' => 'gb-add-mentorship-btn', 'source' => 'home-page', 'class' => 'btn btn-primary')); ?>
    </div>
  </div>
<?php else: ?>
  <div class="row">
    <div class="pull-right btn-group">
      <button type="button" class="btn btn-default gb-cancel-mentorship-btn col-lg-6 col-sm-6 col-xs-12" >Cancel</button>
     <!-- <button type="button" id="gb-skill-form-back-btn-disabled" class="btn btn-default gb-btn-disabled-1"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
      <button type="button" id="gb-skill-form-back-btn" form-num="0" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
      <button type="button" id="gb-skill-form-next-btn-disabled" class="btn btn-default gb-btn-disabled-1">Next <i class="glyphicon glyphicon-arrow-right"></i></button>
      <button type="button" id="gb-skill-form-next-btn" form-num="0" class="btn btn-default">Next <i class="glyphicon glyphicon-arrow-right"></i></button> -->
      <?php echo CHtml::submitButton('Submit', array('id' => 'add-skilllist-submit-skill', 'source' => 'skill-page', 'class' => 'btn btn-primary col-lg-6 col-sm-6 col-xs-12')); ?>
    </div>
  </div>
<?php endif; ?>
<?php $this->endWidget(); ?>
