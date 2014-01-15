<?php ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-skill-weblink-form',
 'enableAjaxValidation' => false,
 'htmlOptions' => array(
  'onsubmit' => "return false;")
  ));
?>

<?php echo $form->errorSummary($skillWebLinkModel); ?>

<div class="modal-body">
  <?php echo $form->hiddenField($skillWebLinkModel, 'goal_id'); ?>
  <dl class="dl-horizontal">
    <dt> 
    Link
    </dt>
    <dd>
      <?php echo $form->textField($skillWebLinkModel, 'link', array('class' => 'span3')); ?>
    </dd>
    <dt> 
    Text
    </dt>
    <dd>
      <?php echo $form->textField($skillWebLinkModel, 'title', array('class' => 'span3')); ?>
    </dd>
    <dt>
    Description
    </dt> 
    <dd>
      <?php echo $form->textArea($skillWebLinkModel, 'description', array('class' => 'span3', 'placeholder' => 'Description (optional)', 'rows' => 3)); ?>
    </dd>
  </dl>
</div>
<div class="row-fluid">
  <div class="gb-btn-row-large">
    <?php echo CHtml::submitButton('Add', array('id' => 'add-weblink-submit-btn', 'class' => 'pull-right gb-btn gb-btn-blue-1 btn-large')); ?>
  </div>
</div>
<?php $this->endWidget(); ?>

