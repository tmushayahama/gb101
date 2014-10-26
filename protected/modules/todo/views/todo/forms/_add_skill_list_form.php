<?php
/* @var $this TodoCommitmentController */
/* @var $model TodoCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-todo-list-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'gb-add-url' => Yii::app()->createUrl("todo/todo/addtodolist", array('connectionId' => 0, 'source' => "home", 'type' => TodoList::$TYPE_SKILL)),
  'gb-edit-url' => Yii::app()->createUrl("todo/todo/edittodolist", array('connectionId' => 0, 'source' => "home", 'type' => TodoList::$TYPE_SKILL)),
  'gb-submit-prepend-to' => "#gb-posts",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row gb-forms-with-steps-content box-4-height">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-todo-list-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <div id="todo-define-form" class="">
      <br>
      <?php echo $form->hiddenField($todoListModel, 'privacy', array('id' => 'gb-todo-share-with-sharing-type', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
      <div class="gb-btn-row-large row gb-margin-bottom-narrow">
        <a class="btn btn-link text-center gb-bank-list-modal-trigger"><i class="glyphicon glyphicon-list"></i> Select From Todo Bank</a>
      </div>
      <br>
      <div class="form-group row">
        <?php echo $form->textField($todoModel, 'title', array('id' => 'gb-todo-list-form-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Name of the todo')); ?>
        <?php echo $form->error($todoModel, 'title'); ?>
      </div>
      <div class="form-group row">
        <?php echo $form->textArea($todoModel, 'description', array('id' => 'gb-todo-list-form-description-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Todo Description. max 250 characters', 'rows' => 2)); ?>
        <?php echo $form->error($todoModel, 'description'); ?>
      </div>
      <?php if ($formType != TodoType::$FORM_TYPE_ADVICE_PAGE_ADVICE_PAGE): ?>
        <div class="form-group row">       
          <?php
          echo CHtml::activeDropDownList($todoListModel, 'level_id', $todoLevelList, array('empty' => 'Select Todo Level',
           'id' => 'gb-todo-list-form-level-input',
           'class' => ' form-control col-lg-12 col-sm-12 col-xs-12'));
          ?>
          <?php echo $form->error($todoListModel, 'level_id'); ?>
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
          <div id="gb-todo-tags-with-textboxes" class="gb-tags-textboxes"></div>
          <div id="gb-todo-tags-with-display" class="gb-tags-display"></div>
        </div> -->
        <div class="form-group row">
          <div class="form-group row">
            <h5 class="pull-left gb-padding-thin">Privacy: <span class="gb-todo-share-with-privacy">Private</span></h5>
            <a class="gb-share-with-modal-trigger btn btn-sm btn-default pull-right" 
               gb-type="<?php echo Type::$SKILL_SHARE; ?>">
              Change & Share With
            </a>
          </div>
          <div id="gb-todo-share-with-textboxes" class="gb-hide 969gb-share-with-textboxes"></div>
          <div id="gb-todo-share-with-display" class="gb-share-with-display"></div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
    <?php echo CHtml::submitButton('Submit', array('gb-edit-btn' => 0, 'class' => 'gb-submit-form btn btn-primary', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_PREPEND)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
