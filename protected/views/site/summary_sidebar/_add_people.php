<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="gb-person-badge">
  <img href="/prosfile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">

  <div class="name">
    <a href="<?php echo Yii::app()->createUrl("user/profile/profile", array('id' => $nonConnectionMember->user_id)); ?>" connection-member-id="<?php echo $nonConnectionMember->user_id; ?>"><?php echo $nonConnectionMember->firstname . " "; ?><?php echo $nonConnectionMember->lastname; ?></a>
  </div>
  <button class="pull-right action connection-member-btn gb-btn gb-btn-grey-1" user-id="<?php echo $nonConnectionMember->user_id ?>"><i class="glyphicon glyphicon-plus-sign"></i> Add</button>

</div>
