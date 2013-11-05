<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<a href="<?php echo 'home/connectionId/' . $userConnection->id ?>" class="gb-connection-badge gb-border-blue-3">
	<!--<img href="/profile" src="<?php // echo Yii::app()->request->baseUrl;    ?>/img/gb_family.jpg" alt="">			-->	
	<h4 class="text-center"><?php echo $userConnection->connection->name ?></h4>
	<div class="connectiom-description">
		<p class=""><?php echo $description ?></p>
	</div>
</a>