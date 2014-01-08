<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="form">

  <?php
  $form = $this->beginWidget('CActiveForm', array(
   'id' => 'promise-mentorship-request-form',
   'enableAjaxValidation' => false,
   'htmlOptions' => array(
    'onsubmit' => "return false;")
  ));
  ?>

  <div class="modal-body">
    <div class="span4">

      <span class="span3">
        <?php
        echo CHtml::activeCheckboxList(
          $promiseMentorshipModel, 'mentorshipsIdList', CHtml::listData($usersCanMentorshipList, 'user_id', 'firstname'), array(
         'labelOptions' => array('style' => 'display:inline')
          )
        );
        ?>
      </span>
    </div>
  </div>
  <div class="row-fluid">
    <div class="gb-btn-row-large">
      <?php echo CHtml::submitButton('Submit', array('id' => 'send-mentorship-request-btn', 'class' => 'pull-right span3 gb-btn gb-btn-blue-1 btn-large')); ?>
    </div>
  </div>

  <?php $this->endWidget(); ?>

</div><!-- form -->
