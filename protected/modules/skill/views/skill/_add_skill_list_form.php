<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="">
  <?php
  $form = $this->beginWidget('CActiveForm', array(
   'id' => 'skill-list',
   'enableAjaxValidation' => true,
   'htmlOptions' => array(
    'onsubmit' => "return false;")
  ));
  ?>
  <div class="row-fluid gb-forms-with-steps-content box-4-height">
    <div class="span12">
      <div id="skill-define-form" class="">
        <h4 class="gb-margin-bottom-narrow">Define Your Skill</h4>
        <?php echo CHtml::errorSummary(array($skillListModel), '<button type="button" class="close" data-dismiss="alert">&times;</button>', NULL, array('class' => 'alert alert-error')); ?>
        <div class="gb-btn-row-large row-fluid gb-margin-bottom-narrow">
          <button type="button" class="span6 gb-bank-list-modal-trigger gb-btn gb-btn-grey-2"><i class="icon-list"></i>Select From Skill Bank</button>
          <button type="button" class="span6 gb-btn gb-btn-grey-2"><i class="icon-th-large"></i>Use A Template</button>
        </div>
        <div class="">
          <?php echo $form->textField($skillListModel, 'title', array('id' => 'gb-skillist-title-input', 'class' => 'input-block-level gb-margin-bottom-narrow', 'placeholder' => 'Name of the skill')); ?>
          <?php echo $form->textArea($skillListModel, 'description', array('class' => 'input-block-level gb-margin-bottom-narrow', 'placeholder' => 'Skill Description max 140 characters', 'rows' => 2)); ?>
          <?php
          echo CHtml::activeDropDownList($skillListModel, 'goal_level_id', $skillLevelList, array('empty' => 'Select a category',
           'class' => 'input-block-level'));
          ?>
        </div>
      </div>
      <div id="skill-share-with-form" class="hide">
        <h4>Share Your Skill</h4>
        <br>
        <div class="">
          <?php
          echo CHtml::activeCheckboxList(
            $skillListShare, 'connectionIdList', CHtml::listData(Connection::getAllConnections(), 'id', 'name'), array(
           'labelOptions' => array('style' => 'display:inline')
            )
          );
          ?>
        </div>
      </div>
      <div id="skill-more-details">
      </div>
    </div>
  </div>
  <div class="modal-footer row-fluid">
    <div class="pull-right gb-btn-row-large span7">
      <button type="button" class="span3 gb-btn gb-btn-grey-1 skilllist-form-cancel-btn" >Cancel</button>
      <button type="button" id="gb-skill-form-back-btn-disabled" class="span3 gb-btn gb-btn-disabled-1"><i class="icon-arrow-left"></i> Back</button>
      <button type="button" id="gb-skill-form-back-btn" form-num="0" class="span3 gb-btn gb-btn-grey-1"><i class="icon-arrow-left"></i> Back</button>
      <button type="button" id="gb-skill-form-next-btn-disabled" class="span3 gb-btn gb-btn-disabled-1">Next <i class="icon-arrow-right"></i></button>
      <button type="button" id="gb-skill-form-next-btn" form-num="0" class="span3 gb-btn gb-btn-grey-1">Next <i class="icon-arrow-right"></i></button>
        <?php echo CHtml::submitButton('Submit', array('id' => 'add-skilllist-submit-skill', 'class' => 'span3 gb-btn gb-btn-blue-2')); ?>
    </div>
  </div>
  <?php $this->endWidget(); ?>
</div><!-- form -->
