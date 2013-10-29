<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<a href="<?php echo 'home/connectionId/' . $userConnection->id ?>" class="gb-connection-badge gb-btn-border-blue-4">
	<!--<img href="/profile" src="<?php // echo Yii::app()->request->baseUrl;    ?>/img/gb_family.jpg" alt="">			-->	
	<div class="sub-heading">
		<h4 class=""><?php echo $userConnection->connection->name ?></h4>
	</div>
	<div class="connectiom-description">
		<p class=""><?php echo $description ?></p>
	</div>
</a>