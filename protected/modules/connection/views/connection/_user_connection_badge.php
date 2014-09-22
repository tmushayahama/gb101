<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<a href="<?php echo 'home/connectionId/' . $connectionMember->id ?>" class="gb-connection-badge gb-border-blue-3">
	<!--<img src="<?php // echo Yii::app()->request->baseUrl;    ?>/img/gb_family.jpg" alt="">			-->	
	<h4 class="text-center"><?php echo $connectionMember->connection->name ?></h4>
	<div class="connectiom-description">
		<p class=""><?php echo $description ?></p>
	</div>
</a>