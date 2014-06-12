<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="gb-person-badge">
  <div class="span2 avatar">
    <img href="/prosfile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
  </div>
  <div class="span7 name">
    <a href="<?php echo Yii::app()->createUrl("user/profile/profilepublic"); ?>" connection-member-id="<?php echo $nonConnectionMember->user_id; ?>"><?php echo $nonConnectionMember->firstname . " "; ?><?php echo $nonConnectionMember->lastname; ?></a>
  </div>
  <button class="span3 connection-member-btn gb-btn gb-btn-blue-3  "><i class="glyphicon glyphicon-white icon-plus-sign"></i> Add</button>

</div>

