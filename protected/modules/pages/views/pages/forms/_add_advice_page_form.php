<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-advice-page-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'gb-add-url' => Yii::app()->createUrl("pages/pages/addAdvicePage", array()),
  'gb-edit-url' => Yii::app()->createUrl("pages/pages/editAdvicePage", array()),
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-advice-page-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><strong>Examples</strong>:<br>
      6 ways to make eggs.<br>
      3 tips to find your dream job.</p>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <?php echo $form->hiddenField($advicePageModel, 'privacy', array('id' => 'gb-page-share-with-sharing-type', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
    <div class="form-group row">
      <div class="col-lg-4 col-sm-4 col-xs-12 gb-no-padding">
        <?php echo $form->textField($advicePageModel, 'subgoals', array('id' => 'gb-advice-page-subgoals-input', 'class' => 'btn  form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Select Number', 'readonly' => true)); ?>
        <?php echo $form->error($advicePageModel, 'subgoals'); ?>
      </div>
      <div class="col-lg-8 col-sm-8 col-xs-12 gb-no-padding">
        <?php
        echo CHtml::activeDropDownList($advicePageModel, 'level_id', $pageLevelList, array('empty' => 'Select Advice Category',
         'class' => ' form-control col-lg-8 col-sm-12 col-xs-12'));
        ?>
        <?php echo $form->error($advicePageModel, 'level_id'); ?>
      </div>
    </div> 
    <div class="form-group row">
      <?php echo $form->textField($pageModel, 'title', array('id' => 'gb-advice-page-form-title', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Advice Title')); ?>
      <?php echo $form->error($pageModel, 'title'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textArea($pageModel, 'description', array('id' => 'gb-advice-page-form-description', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Advice Description. max characters 250', 'rows' => 2)); ?>
      <?php echo $form->error($pageModel, 'description'); ?>
    </div>
    <div class="form-group row">
      <div class="form-group row">
        <h5 class="pull-left gb-padding-thin">Privacy: <span class="gb-page-share-with-privacy">Private</span></h5>
        <a class="gb-share-with-modal-trigger btn btn-sm btn-default pull-right" 
           gb-type="<?php echo Type::$PAGE_SHARE; ?>">
          Change & Share With
        </a>
      </div>
      <div id="gb-page-share-with-textboxes" class="gb-share-with-textboxes"></div>
      <div id="gb-page-share-with-display" class="gb-share-with-display"></div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
    <?php echo CHtml::submitButton('Submit', array('id' => 'gb-advice-page-btn', 'source' => 'home-page', 'class' => 'gb-submit-form btn btn-primary', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_REDIRECTS)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
