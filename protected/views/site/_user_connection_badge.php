<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<a href="<?php echo 'home/connectionId/' . $userConnection->id ?>" class="gb-connection-badge gb-btn-blue-3">
	<!--<img href="/profile" src="<?php // echo Yii::app()->request->baseUrl; ?>/img/gb_family.jpg" alt="">			-->	
	<h3 class="offset1"><?php echo $userConnection->connection->name ?></h3>
	<p class="offset2"><?php echo $description ?></p>
</a>