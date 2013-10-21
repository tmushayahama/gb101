<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<a href="<?php echo 'home/connectionId/' . $userConnection->id ?>" class="gb-connection-badge color-blue-2">
	<!--<img href="/profile" src="<?php // echo Yii::app()->request->baseUrl; ?>/img/gb_family.jpg" alt="">			-->	
	<?php echo $userConnection->connection->name ?>
</a>