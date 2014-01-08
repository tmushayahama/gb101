<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="">
  <?php
  $form = $this->beginWidget('CActiveForm', array(
   'id' => 'promise-list',
   'enableAjaxValidation' => false,
   'htmlOptions' => array(
    'onsubmit' => "return false;")
  ));
  ?>
  <?php echo $form->errorSummary($promiseListModel); ?>
  <div class="row-fluid gb-forms-with-steps-content">
    <div class="span4 form-grey-1">
      <h4>Step</h4>
      <br>
      <ul id="add-promise-list-form-steps" class="nav nav-stacked">
        <li><a id="activate-promise-bank-form" class="gb-current-selected"><p><strong> 1. </strong>Choose from Bank<br><small>(optional)</small></p></a></li>
        <li><a id="activate-define-promise-form"><p><strong> 2. </strong>Define Your promise</p></a></li>
        <li><a id="activate-share-promise-form"><p><strong> 3. </strong>Share promises<br><small>(optional)</small></p></a></li>
        <li><a id="activate-more-details-form"><p><strong> 5. </strong>More Details<br><small>(optional)</small></p></p></a></li>
      </ul>
    </div>
    <div class="span8">
      <div id="gb-promise-list-bank-form" class="row-fluid  ">
        <div class="sub-heading-5">
          <h4 class="pull-left">Add from promise Bank</h4>
          <div class="pull-right input-append">
            <input class="span10"  class="que-input-large" placeholder="Keyword Search."type="text">
            <button class="btn">
              <i class="icon-search"></i>
            </button>
          </div>
        </div>
        <div class="gb-promise-activity-content">
          <?php
          $count = 1;
          foreach (ListBank::getListBank() as $promiseBankItem):
            echo $this->renderPartial('_promise_list_bank_item_row', array(
             'promiseBankItem' => $promiseBankItem,
             'count' => $count++));
            ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div id="promise-define-form" class="hide">
        <h4>Define Your promise</h4>
        <br>
        <div class="">
          <?php echo $form->textField($promiseListModel, 'title', array('id' => 'gb-promiseist-title-input', 'class' => 'span11', 'placeholder' => 'Name of the promise')); ?>

          <?php echo $form->textArea($promiseListModel, 'description', array('class' => 'span11', 'placeholder' => 'promise Description max 140 characters', 'rows' => 2)); ?>
          <label class="" for="promise-level-input"> Select promise Level <small><i>(how good are you in this promise)</i></small>
          </label>
          <?php echo $form->hiddenField($promiseListModel, 'promise_level_id', array('id' => "promise-level-input", 'readonly' => true)); ?>
          <div id="promise-level-selectors" class="row-fluid">
            <?php foreach ($promise_levels as $promise_level): ?>
              <div class="gb-level-selection" value=<?php echo $promise_level->id ?>>
                <?php echo $promise_level->level_name ?>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <div id="promise-share-with-form" class="hide">
        <h4>Share Your promise</h4>
        <br>
        <div class="">
          <?php
          echo CHtml::activeCheckboxList(
            $promiseListShare, 'connectionIdList', CHtml::listData(Connection::getAllConnections(), 'id', 'name'), array(
           'labelOptions' => array('style' => 'display:inline')
            )
          );
          ?>
        </div>
      </div>
      <div id="promise-more-details">
      </div>
    </div>
  </div>
  <div class="modal-footer row-fluid">
    <div class="pull-right gb-btn-row-large span6">
      <a id="gb-promise-form-back-btn-disabled" class="span4 gb-btn btn-large gb-btn-disabled-1"><i class="icon-arrow-left"></i> Back</a>
      <a id="gb-promise-form-back-btn" form-num="0" class="span4 gb-btn btn-large gb-btn-border-blue-2"><i class="icon-arrow-left"></i> Back</a>
      <a id="gb-promise-form-next-btn-disabled" class="span4 gb-btn btn-large gb-btn-disabled-1">Next <i class="icon-arrow-right"></i></a>
      <a id="gb-promise-form-next-btn" form-num="0" class="span4 gb-btn btn-large gb-btn-border-blue-2">Next <i class="icon-arrow-right"></i></a>
        <?php echo CHtml::submitButton('Submit', array('id' => 'add-promiselist-submit-promise', 'class' => 'span4 gb-btn gb-btn-blue-1 btn-large')); ?>
    </div>
  </div>
  <?php $this->endWidget(); ?>
</div><!-- form -->
