<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="">
  <?php
  $form = $this->beginWidget('CActiveForm', array(
   'id' => 'goal-list',
   'enableAjaxValidation' => false,
   'htmlOptions' => array(
    'onsubmit' => "return false;")
  ));
  ?>
  <?php echo $form->errorSummary($goalListModel); ?>
  <div class="modal-body row-fluid">
    <div class="span4">
      <h4>Step</h4>
      <br>
      <ul id="add-skill-list-form-steps" class="nav nav-stacked">
        <li><a id="activate-define-skill-form"class="gb-current-selected"><p><strong> 1. </strong>Define Your Skill</p></a></li>
        <li><a id="activate-share-skill-form"><p><strong> 2. </strong>Share Skills<br><small>(optional)</small></p></a></li>
        <li><a id="activate-mentorship-form"><p ><strong> 3. </strong>Mentorship <br><small>(optional)</small></p></p></a></li>
        <li><a id="activate-more-details-form"><p><strong> 4. </strong>More Details<br><small>(optional)</small></p></p></a></li>
      </ul>
    </div>
    <div class="span7 form-grey-1">
      <div id="skill-define-form">
        <h4>Define Your Skill</h4>
        <br>
        <div class="">
          <?php echo $form->textArea($goalListModel, 'description', array('class' => 'span12', 'placeholder' => 'Skill Description max 140 characters', 'rows' => 2)); ?>
          <label class="" for="skill-level-input">Skill Level: </label>
          <?php echo $form->hiddenField($goalListModel, 'skill_level', array('id' => "skill-level-input", 'readonly' => true)); ?>
          <div id="skill-level-slider-values" class="row-fluid">
            <div class="gb-slider-section">
              1
            </div>
            <div class="gb-slider-section">
              2
            </div>
            <div class="gb-slider-section">
              3
            </div>
            <div class="gb-slider-section">
              4
            </div>
            <div class="gb-slider-section">
              5
            </div>
          </div>
          <div id="skill-level-slider"></div>
        </div>
      </div>
      <div id="skill-share-with-form" class="hide">
        <h4>Share Your Skill</h4>
        <br>
        <div class="">
          <?php
          echo CHtml::activeCheckboxList(
            $goalListShare, 'connectionIdList', CHtml::listData(Connection::model()->findAll(), 'id', 'name'), array(
           'labelOptions' => array('style' => 'display:inline')
            )
          );
          ?>
        </div>
      </div>
      <div id="skill-choose-mentors-form" class="hide">
        <h4>Send Mentorship Request</h4>
        <br>
        <div class="">
          <?php
          echo CHtml::activeCheckboxList(
            $goalListMentor, 'userIdList', CHtml::listData(Profile::model()->findAll(), 'user_id', 'firstname'), array(
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
  <div class="row-fluid">
    <div class="gb-btn-row-large">
      <?php echo CHtml::submitButton('Submit', array('id' => 'add-skilllist-submit-goal', 'class' => 'span2 pull-right gb-btn gb-btn-blue-1 btn-large  pull-right')); ?>
      <a id="gb-skill-form-next-btn" form-num="0" class="span2 pull-right gb-btn btn-large gb-btn-blue-1">Next <i class="icon-white icon-arrow-right"></i></a>
      <a id="gb-skill-form-back-btn" form-num="0" class="span2 pull-keft gb-btn btn-large gb-btn-blue-1"><i class="icon-white icon-arrow-left"></i> Back</a>
    </div>
  </div>
  <?php $this->endWidget(); ?>
</div><!-- form -->
