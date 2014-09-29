<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>

<div class="form">

  <?php
  $form = $this->beginWidget('CActiveForm', array(
   'id' => 'connection-form',
   'enableAjaxValidation' => false,
   'htmlOptions' => array(
    'onsubmit' => "return false;")
  ));
  ?>

  <?php echo $form->errorSummary($connectionMemberModel); ?>

  <div class="modal-body">
    <div class="span4">
      <span class="span1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
        <p><a id="gb-connection-member-modal-fullname"></a>
          <?php echo $form->hiddenField($connectionMemberModel, 'connection_member_id_2') ?>
        </p>
      </span>
      <span class="span2">
        <?php
        echo CHtml::activeCheckboxList(
          $connectionMemberModel, 'userIdList', CHtml::listData(Connection::model()->findAll(), 'id', 'name'), array(
         'labelOptions' => array('style' => 'display:inline')
          )
        );
        ?>
      </span>
    </div>
  </div>
  <div class="row-fluid">
    <div class="gb-btn-row-large">
      <?php echo CHtml::submitButton('Submit', array('id' => 'connection-member-request-btn', 'class' => 'pull-right span3 gb-btn gb-btn-blue-1 btn-large')); ?>
    </div>
  </div>
  <?php $this->endWidget(); ?>
</div><!-- form -->
