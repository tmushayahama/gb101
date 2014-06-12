<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-skill-list-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-white-background gb-padding-thin',
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row gb-forms-with-steps-content box-4-height">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-skill-list-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <div id="skill-define-form" class="">
      <br>
      <?php //echo CHtml::errorSummary(array($skillListModel)); ?>
      <div class="gb-btn-row-large row gb-margin-bottom-narrow">
        <a class="btn btn-link col-lg-6 col-sm-6 col-xs-12 gb-bank-list-modal-trigger"><i class="glyphicon glyphicon-list"></i> Select From Skill Bank</a>
        <a class="btn btn-link col-lg-6 col-sm-6 col-xs-12"><i class="glyphicon glyphicon-th-large"></i> Use A Template</a>
      </div>
      <br>
      <div class="form-group row">
        <?php echo $form->textField($skillModel, 'title', array('id' => 'gb-skill-list-form-title-input', 'class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Name of the skill')); ?>
        <?php echo $form->error($skillModel, 'title'); ?>
      </div>
      <div class="form-group row">
        <?php echo $form->textArea($skillModel, 'description', array('id' => 'gb-skill-list-form-description-input', 'class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Skill Description max 140 characters', 'rows' => 2)); ?>
        <?php echo $form->error($skillModel, 'description'); ?>
      </div>
      <?php if ($formType != GoalType::$FORM_TYPE_ADVICE_PAGE_ADVICE_PAGE): ?>
        <div class="form-group row">       
          <?php
          echo CHtml::activeDropDownList($skillListModel, 'level_id', $skillLevelList, array('empty' => 'Select Skill Level',
           'id' => 'gb-skill-list-form-level-input',
           'class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12'));
          ?>
          <?php echo $form->error($skillListModel, 'level_id'); ?>
        </div>  
      <?php endif; ?>
    </div>
  </div>
  <div id="skill-share-with-form" class="gb-hide">
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
<?php
switch ($formType):
  case GoalType::$FORM_TYPE_SKILL_HOME:
    ?>
    <div class="modal-footer">
      <div class="pull-right btn-group">
        <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
        <!-- <button type="button" id="gb-skill-form-back-btn-disabled" class="btn btn-default gb-btn-disabled-1"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
        <button type="button" id="gb-skill-form-back-btn" form-num="0" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
        <button type="button" id="gb-skill-form-next-btn-disabled" class="btn btn-default gb-btn-disabled-1">Next <i class="glyphicon glyphicon-arrow-right"></i></button>
        <button type="button" id="gb-skill-form-next-btn" form-num="0" class="btn btn-default">Next <i class="glyphicon glyphicon-arrow-right"></i></button> -->
        <?php echo CHtml::submitButton('Submit', array('id' => 'skilllist-submit-skill', 'gb-edit-btn' => 0, 'class' => 'btn btn-primary')); ?>
      </div>
    </div>
    <?php
    break;
  case GoalType::$FORM_TYPE_ADVICE_PAGE_ADVICE_PAGE:
    ?>
    <div class="modal-footer">
      <div class="pull-right btn-group">
        <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
        <!-- <button type="button" id="gb-skill-form-back-btn-disabled" class="btn btn-default gb-btn-disabled-1"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
        <button type="button" id="gb-skill-form-back-btn" form-num="0" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
        <button type="button" id="gb-skill-form-next-btn-disabled" class="btn btn-default gb-btn-disabled-1">Next <i class="glyphicon glyphicon-arrow-right"></i></button>
        <button type="button" id="gb-skill-form-next-btn" form-num="0" class="btn btn-default">Next <i class="glyphicon glyphicon-arrow-right"></i></button> -->
        <?php echo CHtml::submitButton('Submit', array('id' => 'gb-advice-page-subgoal-btn', 'gb-edit-btn' => 0, 'class' => 'btn btn-primary')); ?>
      </div>
    </div>
<?php endswitch; ?>
<?php $this->endWidget(); ?>
