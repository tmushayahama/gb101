<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-skill-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'data-gb-url' => Yii::app()->createUrl("project/project/addProjectSkill", array("projectId"=>$project->id)),
  'gb-edit-url' => Yii::app()->createUrl("project/project/editProjectSkill", array()),
  'data-gb-prepend-to' => "#gb-posts",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row gb-forms-with-steps-content box-4-height">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-skill-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <div id="skill-define-form" class="">
      <br>
      <?php echo $form->hiddenField($skillModel, 'privacy', array('id' => 'gb-skill-share-with-sharing-type', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
      <div class="gb-btn-row-large row gb-margin-bottom-narrow">
        <a class="btn btn-link text-center gb-bank-list-modal-trigger"><i class="glyphicon glyphicon-list"></i> Select From Skill Bank</a>
      </div>
      <br>
      <div class="form-group row">
        <?php echo $form->textField($skillModel, 'title', array('id' => 'gb-skill-form-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Name of the skill')); ?>
        <?php echo $form->error($skillModel, 'title'); ?>
      </div>
      <div class="form-group row">
        <?php echo $form->textArea($skillModel, 'description', array('id' => 'gb-skill-form-description-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Skill Description. max 250 characters', 'rows' => 2)); ?>
        <?php echo $form->error($skillModel, 'description'); ?>
      </div>
      <?php if ($formType != SkillType::$FORM_TYPE_ADVICE_PAGE_ADVICE_PAGE): ?>
        <div class="form-group row">       
          <?php
          echo CHtml::activeDropDownList($skillModel, 'level_id', $skillLevelList, array('empty' => 'Select Skill Level',
           'id' => 'gb-skill-form-level-input',
           'class' => ' form-control col-lg-12 col-sm-12 col-xs-12'));
          ?>
          <?php echo $form->error($skillModel, 'level_id'); ?>
        </div> 
      <!--
        <div class="form-group row">
          <div class="form-group row">
            <h5 class="pull-left gb-padding-thin">Tags</h5>
            <a class="gb-tags-modal-trigger btn btn-sm btn-default pull-right" 
               gb-tags-type="<?php //echo Type::$SKILL_TAG; ?>">
              Add Tags
            </a>
          </div>
          <div id="gb-skill-tags-with-textboxes" class="gb-tags-textboxes"></div>
          <div id="gb-skill-tags-with-display" class="gb-tags-display"></div>
        </div> -->
       
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
    <?php echo CHtml::submitButton('Submit', array('gb-edit-btn' => 0, 'class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => Type::$AJAX_RETURN_ACTION_PREPEND)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
