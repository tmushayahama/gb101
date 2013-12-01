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
    <div class="span4 form-grey-1">
      <h4>Step</h4>
      <br>
      <ul id="add-skill-list-form-steps" class="nav nav-stacked">
        <li><a id="activate-name-form"class="gb-current-selected"><p><strong> 1. </strong>Choose/Name Your Skill</p></a></li>
        <li><a id="activate-define-skill-form"><p><strong> 2. </strong>Define Your Skill</p></a></li>
        <li><a id="activate-share-skill-form"><p><strong> 3. </strong>Share Skills<br><small>(optional)</small></p></a></li>
        <li><a id="activate-mentorship-form"><p ><strong> 4. </strong>Mentorship <br><small>(optional)</small></p></p></a></li>
        <li><a id="activate-more-details-form"><p><strong> 5. </strong>More Details<br><small>(optional)</small></p></p></a></li>
      </ul>
    </div>
    <div class="span7">
      <div id="skill-name-form">
        <h4>Choose/Name Your Skill</h4>
        <br>
        <div class="">
          <?php echo $form->textField($goalListModel, 'description', array('class' => 'span11', 'placeholder' => 'Skill Description max 140 characters', 'rows' => 2)); ?>
          <br>
          <div id="gb-skill-list-selectors-1" class="row-fluid">
            <?php foreach ($skill_list_bank as $skill_list_bank_item): ?>
              <div class="gb-skill-list-selection">
                <?php echo $skill_list_bank_item->name ?>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <div id="skill-define-form">
        <h4>Define Your Skill</h4>
        <br>
        <div class="">
          <?php echo $form->textArea($goalListModel, 'description', array('class' => 'span11', 'placeholder' => 'Skill Description max 140 characters', 'rows' => 2)); ?>
          <label class="" for="skill-level-input"> Select Skill Level <small><i>(how good are you in this skill)</i></small>
          </label>
          <?php echo $form->hiddenField($goalListModel, 'skill_level_id', array('id' => "skill-level-input", 'readonly' => true)); ?>
          <div id="skill-level-selectors" class="row-fluid">
            <?php foreach ($skill_levels as $skill_level): ?>
              <div class="gb-level-selection" value=<?php echo $skill_level->id ?>>
                <?php echo $skill_level->level_name ?>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <div id="skill-share-with-form" class="hide">
        <h4>Share Your Skill</h4>
        <br>
        <div class="">
          <?php
          echo CHtml::activeCheckboxList(
            $goalListShare, 'connectionIdList', CHtml::listData(Connection::getAllConnections(), 'id', 'name'), array(
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
    <div class="pull-right gb-btn-row-large span6">
      <a id="gb-skill-form-back-btn-disabled" class="span4 gb-btn btn-large gb-btn-disabled-1"><i class="icon-arrow-left"></i> Back</a>
      <a id="gb-skill-form-back-btn" form-num="0" class="span4 gb-btn btn-large gb-btn-border-blue-2"><i class="icon-arrow-left"></i> Back</a>
      <a id="gb-skill-form-next-btn-disabled" class="span4 gb-btn btn-large gb-btn-disabled-1">Next <i class="icon-arrow-right"></i></a>
      <a id="gb-skill-form-next-btn" form-num="0" class="span4 gb-btn btn-large gb-btn-border-blue-2">Next <i class="icon-arrow-right"></i></a>
        <?php echo CHtml::submitButton('Submit', array('id' => 'add-skilllist-submit-goal', 'class' => 'span4 gb-btn gb-btn-blue-1 btn-large')); ?>
    </div>
  </div>
  <?php $this->endWidget(); ?>
</div><!-- form -->
