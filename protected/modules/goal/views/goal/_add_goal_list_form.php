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
  <div class="row-fluid gb-forms-with-steps-content">
    <div class="span4 form-grey-1">
      <h4>Step</h4>
      <br>
      <ul id="add-goal-list-form-steps" class="nav nav-stacked">
        <li><a id="activate-goal-bank-form" class="gb-current-selected"><p><strong> 1. </strong>Choose from Bank<br><small>(optional)</small></p></a></li>
        <li><a id="activate-define-goal-form"><p><strong> 2. </strong>Define Your Skill</p></a></li>
        <li><a id="activate-share-goal-form"><p><strong> 3. </strong>Share Skills<br><small>(optional)</small></p></a></li>
        <li><a id="activate-more-details-form"><p><strong> 5. </strong>More Details<br><small>(optional)</small></p></p></a></li>
      </ul>
    </div>
    <div class="span8">
      <div id="gb-goal-list-bank-form" class="row-fluid  ">
        <div class="sub-heading-5">
          <h4 class="pull-left">Add from Skill Bank</h4>
          <div class="pull-right input-append">
            <input class="span10"  class="que-input-large" placeholder="Keyword Search."type="text">
            <button class="btn">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
        <div class="gb-goal-activity-content">
          <?php
          $count = 1;
          foreach (ListBank::getListBank(GoalType::$CATEGORY_GOAL) as $goalBankItem):
            echo $this->renderPartial('_goal_list_bank_item_row', array(
             'goalBankItem' => $goalBankItem,
             'count' => $count++));
            ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div id="goal-define-form" class="hide">
        <h4>Define Your Skill</h4>
        <br>
        <div class="">
          <?php echo $form->textField($goalListModel, 'title', array('id' => 'gb-goalist-title-input', 'class' => 'span11', 'placeholder' => 'Name of the goal')); ?>

          <?php echo $form->textArea($goalListModel, 'description', array('class' => 'span11', 'placeholder' => 'Skill Description max 140 characters', 'rows' => 2)); ?>
          <label class="" for="goal-level-input"> Select Skill Level <small><i>(how good are you in this goal)</i></small>
          </label>
          <?php echo $form->hiddenField($goalListModel, 'level_id', array('id' => "goal-level-input", 'readonly' => true)); ?>
          <div id="goal-level-selectors" class="row-fluid">
            <?php foreach ($levels as $level): ?>
              <div class="gb-level-selection" value=<?php echo $level->id ?>>
                <?php echo $level->level_name ?>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <div id="goal-share-with-form" class="hide">
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
      <div id="goal-more-details">
      </div>
    </div>
  </div>
  <div class="modal-footer row-fluid">
    <div class="pull-right gb-btn-row-large span6">
      <a id="gb-goal-form-back-btn-disabled" class="span4 gb-btn btn-large gb-btn-disabled-1"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
      <a id="gb-goal-form-back-btn" form-num="0" class="span4 gb-btn btn-large gb-btn-border-blue-2"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
      <a id="gb-goal-form-next-btn-disabled" class="span4 gb-btn btn-large gb-btn-disabled-1">Next <i class="glyphicon glyphicon-arrow-right"></i></a>
      <a id="gb-goal-form-next-btn" form-num="0" class="span4 gb-btn btn-large gb-btn-border-blue-2">Next <i class="glyphicon glyphicon-arrow-right"></i></a>
        <?php echo CHtml::submitButton('Submit', array('id' => 'add-goallist-submit-goal', 'class' => 'span4 gb-btn gb-btn-blue-1 btn-large')); ?>
    </div>
  </div>
  <?php $this->endWidget(); ?>
</div><!-- form -->
