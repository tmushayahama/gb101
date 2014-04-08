<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'skill-list',
 'enableAjaxValidation' => true,
 'htmlOptions' => array(
  'onsubmit' => "return false;")
  ));
?>
<div class="row gb-forms-with-steps-content box-4-height">
  <div class="col-lg-12 col-sm-12 col-xs-12">
    <div id="skill-define-form" class="">
      <h4 class="gb-margin-bottom-narrow">Define Your Skill</h4>
      <?php echo CHtml::errorSummary(array($skillListModel), '<button type="button" class="close" data-dismiss="alert">&times;</button>', NULL, array('class' => 'alert alert-error')); ?>
      <div class="gb-btn-row-large row gb-margin-bottom-narrow">
        <a class="btn btn-link btn-lg col-lg-6 col-sm-6 col-xs-12 gb-bank-list-modal-trigger"><i class="glyphicon glyphicon-list"></i> Select From Skill Bank</a>
        <a class="btn btn-link btn-lg col-lg-6 col-sm-6 col-xs-12"><i class="glyphicon glyphicon-th-large"></i> Use A Template</a>
      </div>
      <div class="form-group row">
        <?php echo $form->textField($skillListModel, 'title', array('id' => 'gb-skillist-title-input', 'class' => 'input-lg col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Name of the skill')); ?>
      </div>
      <div class="form-group row">
        <?php echo $form->textArea($skillListModel, 'description', array('class' => 'input-lg col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Skill Description max 140 characters', 'rows' => 2)); ?>
      </div>
      <div class="form-group row">       
        <?php
        echo CHtml::activeDropDownList($skillListModel, 'goal_level_id', $skillLevelList, array('empty' => 'Select a category',
         'class' => 'input-lg col-lg-12 col-sm-12 col-xs-12'));
        ?>
      </div>
    </div>
  </div>
  <div id="skill-share-with-form" class="gb-hide">
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
<div class="row">
  <div class="pull-right btn-group">
    <button type="button" class="btn btn-default gb-btn-grey-1 skilllist-form-cancel-btn" >Cancel</button>
    <button type="button" id="gb-skill-form-back-btn-disabled" class="btn btn-default gb-btn-disabled-1"><i class="icon-arrow-left"></i> Back</button>
    <button type="button" id="gb-skill-form-back-btn" form-num="0" class="btn btn-default"><i class="icon-arrow-left"></i> Back</button>
    <button type="button" id="gb-skill-form-next-btn-disabled" class="btn btn-default gb-btn-disabled-1">Next <i class="icon-arrow-right"></i></button>
    <button type="button" id="gb-skill-form-next-btn" form-num="0" class="btn btn-default">Next <i class="icon-arrow-right"></i></button>
      <?php echo CHtml::submitButton('Submit', array('id' => 'add-skilllist-submit-skill', 'class' => 'btn btn-primary')); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
