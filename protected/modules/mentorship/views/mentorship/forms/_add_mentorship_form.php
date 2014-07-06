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
  'gb-add-url' => Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()),
  'gb-edit-url' => Yii::app()->createUrl("mentorship/mentorship/editMentorship", array()),
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
    <?php echo $form->hiddenField($mentorshipModel, 'privacy', array('id' => 'gb-mentorship-share-with-sharing-type', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
    <?php echo $form->hiddenField($mentorshipModel, 'type', array('id' => 'gb-mentorship-form-type-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
    <?php echo $form->hiddenField($mentorshipModel, 'person_chosen_id', array('id' => 'gb-mentorship-form-mentorship-person-id-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
    <div class="form-group row">
      <a class="gb-select-mentorship-type btn btn-default col-lg-6 col-md-6 col-sm-6 col-xs-12" gb-mentorship-type="1">I want to mentor</a>
      <a class="gb-select-mentorship-type btn btn-default col-lg-6 col-md-6 col-sm-6 col-xs-12" gb-mentorship-type="2">I need a mentor</a>
    </div>
    <div class="gb-mentorship-form-fields gb-hide">
      <div class="form-group row">
        <div class="gb-choose-person-name-display row gb-no-padding">
          <input id="gb-select-mentor-input" type="text" class="gb-share-with-modal-trigger pull-left col-lg-11"
                 gb-type="<?php echo Type::$SELECT_MENTORSHIP_PERSON_SHARE; ?>"> <span class="gb-select-mentor-remove btn btn-default btn-sm col-lg-1">X</span>
        </div>
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
      <div class="form-group row">
        <div class="form-group row">
          <h5 class="pull-left gb-padding-thin">Privacy: <span class="gb-mentorship-share-with-privacy">Private</span></h5>
          <a class="gb-share-with-modal-trigger btn btn-sm btn-default pull-right" 
             gb-type="<?php echo Type::$MENTORSHIP_SHARE; ?>">
            Change & Share With
          </a>
        </div>
        <div id="gb-mentorship-share-with-textboxes" class="gb-share-with-textboxes"></div>
        <div id="gb-mentorship-share-with-display" class="gb-share-with-display"></div>
      </div>
    </div>
    <div class="modal-footer">
      <div class="pull-right btn-group">
        <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
        <?php echo CHtml::submitButton('Submit', array('class' => 'gb-submit-form gb-hide btn btn-primary', 'gb-reditect' => 1)); ?>
      </div>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>
