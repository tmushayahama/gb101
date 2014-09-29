<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>

<a href="<?php echo 'home/connectionId/' . $connection->id ?>" class="gb-connection-badge gb-btn-blue-3">
	<!--<img src="<?php // echo Yii::app()->request->baseUrl; ?>/img/gb_family.jpg" alt="">			-->	
	<h3 class=""><?php echo $connection->name ?></h3>
	<p class=""><?php echo $connection->description ?></p>
</a>