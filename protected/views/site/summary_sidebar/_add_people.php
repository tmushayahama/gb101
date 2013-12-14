<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="gb-add-person-badge">
  <img href="/prosfile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">

  <div class="name">
    <a href="<?php echo Yii::app()->createUrl("user/profile/profile", array('id' => $nonConnectionMember->user_id)); ?>" connection-member-id="<?php echo $nonConnectionMember->user_id; ?>"><?php echo $nonConnectionMember->firstname . " "; ?><?php echo $nonConnectionMember->lastname; ?></a>
  </div>
  <button class="pull-right action add-connection-member-btn gb-btn gb-btn-green-1" user-id="<?php echo $nonConnectionMember->user_id ?>"><i class="icon-white icon-plus-sign"></i> Add</button>

</div>
