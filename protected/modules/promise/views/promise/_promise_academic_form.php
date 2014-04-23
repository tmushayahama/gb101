<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'promise-academic-form',
 'enableAjaxValidation' => false,
 'htmlOptions' => array(
  'class' => 'form',
  'onsubmit' => "return true;")
  ));
?>

<?php echo $form->errorSummary($academicModel); ?>
<div class="row-fluid gb-forms-with-steps-content">
  <div class="span4 form-grey-1">
    <ul id="commit-promise-form-steps" class="nav nav-stacked">
      <li><a id="activate-academic-promise-bank"class="gb-current-selected"><p><strong> 1. </strong>Choose from promise Bank<br><small>(optional)</small></p></a></li>
      <li><a id="activate-academic-define-promise-form"><p><strong> 2. </strong>Define Post</p></a></li>
      <li><a id="activate-academic-share-promise-form"><p><strong> 3. </strong>Share With<br><small>(optional)</small></p></a></li>
      <li><a id="activate-academic-more-details-form"><p><strong> 4. </strong>More Details<br><small>(optional)</small></p></p></a></li>
    </ul>
  </div>
  <div class="span8">
    <div id="academic-promise-bank-form" class="row-fluid">
      <div class="sub-heading-5">
        <h4 class="pull-left">Add from promise Bank</h4>
        <div class="pull-right input-append">
          <input class="span10"  class="que-input-large" placeholder="Keyword Search."type="text">
          <button class="btn">
            <i class="glyphicon glyphicon-search"></i>
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
    <div id="academic-define-promise-form" class="hide">
      <div class="control-group ">
        <div class="controls">
          <?php echo $form->textField($promiseModel, 'title', array("id" => "gb-add-promise-title-input", 'class' => 'span12', 'placeholder' => 'Name/Title')); ?>
          <?php echo $form->textArea($promiseModel, 'description', array('class' => 'span12', 'placeholder' => 'Description (Be Specific) - 150 characters', 'rows' => 3)); ?>
          <?php echo $form->textField($academicModel, 'school', array('class' => 'span6', 'placeholder' => 'School')); ?>
          <?php echo $form->textField($academicModel, 'major', array('class' => 'span6 pull-right', 'placeholder' => 'Major')); ?>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <?php echo $form->textField($promiseModel, 'begin_date', array('id' => 'academic-begin-date', 'class' => 'span6', 'placeholder' => 'Begin Date')); ?>
          <?php echo $form->textField($promiseModel, 'end_date', array('id' => 'academic-end-date', 'class' => 'span6 pull-right', 'placeholder' => 'Achieve Date')); ?>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <?php echo $form->textField($promiseModel, 'points_pledged', array('class' => 'span6', 'placeholder' => 'Points')); ?>
        </div>
      </div>
    </div>
    <div id="academic-share-promise-form" class="hide">
      <h4>Share Your Promise</h4>
      <br>
      <div class="box-3-height">
        <?php
        echo CHtml::activeCheckboxList(
          $promiseCommitmentShare, 'connectionIdList', CHtml::listData(Connection::getAllConnections(), 'id', 'name'), array(
         'labelOptions' => array('style' => 'display:inline')
          )
        );
        ?>
      </div>
    </div>
    <div id="academic-monitor-form" class="hide">
      <h4>Send Monitor Request</h4>
      <br>
      <div class="box-3-height">
        <?php
        echo CHtml::activeCheckboxList(
          $promiseListMentor, 'userIdList', CHtml::listData(Profile::model()->findAll(), 'user_id', 'firstname'), array(
         'labelOptions' => array('style' => 'display:inline')
          )
        );
        ?>
      </div>
    </div>
    <div id="academic-more-details-form">
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="gb-btn-row-large span6 pull-right">
    <a id="gb-academic-form-back-btn-disabled" class="span4  gb-btn btn-large gb-btn-border-blue-2" form-num=0><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
    <a id="gb-academic-form-back-btn" class="span4 gb-btn btn-large gb-btn-border-blue-2" form-num=0><i class=" icon-arrow-left"></i> Back</a>
    <a id="gb-academic-form-next-btn" class="span4  gb-btn btn-large gb-btn-border-blue-2" form-num=0>Next <i class="glyphicon glyphicon-arrow-right"></i></a>
    <a id="gb-academic-form-next-btn-disabled" class="span4 gb-btn-disabled-1 gb-btn btn-large" form-num=0>Next <i class="glyphicon glyphicon-white icon-arrow-right"></i></a>
      <?php echo CHtml::submitButton('Post', array('id' => 'promise-commitment-submit-btn', 'class' => 'span3 gb-btn gb-btn-blue-1 btn-large')); ?>
  </div>
</div>


<?php $this->endWidget(); ?>

