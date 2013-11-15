<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="">


	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'goal-list',
			'enableAjaxValidation' => false,
			'htmlOptions' => array(
					'onsubmit' => "return false;")
	));
	?>

	<?php echo $form->errorSummary($goalListModel); ?>
	<div class="modal-body row-fluid">
		<div class="span4">
			<ul class="nav nav-stacked nav-tabs">
				<li class="active"><a><p><strong> 1 </strong>Define Skill</p></a></li>
				<li><a><p><strong> 2. </strong>Share Skills<br><small>(optional)</small></p></a></li>
				<li><a><p><strong> 3. </strong>Mentorship <br><small>(optional)</small></p></p></a></li>
				<li><a><p><strong> 4. </strong>More Details<br><small>(optional)</small></p></p></a></li>
			</ul>
		</div>
		<div class="span7">
			<div id="skill-define-form">
				<h4>Define Your Skill</h4>
				<br>
				<div class="box-3-height">
					<?php echo $form->textArea($goalListModel, 'description', array('class' => 'span12', 'placeholder' => 'Description (Be Specific) - 150 characters', 'rows' => 2)); ?>
					<label for="amount">Skill Level:</label>
					<div id="skill-level-slider"></div>
					<input type="text" id="skill-level-input" style="border: 0; float:left; color: #f6931f; font-weight: bold;" readonly/>
				</div>
			</div>
			<div id="skill-share-with-form" class="hide">
				<h4>Share Your Skill</h4>
				<br>
				<div class="box-3-height">
					<?php
					echo CHtml::activeCheckboxList(
									$goalListShare, 'connectionIdList', CHtml::listData(Connection::model()->findAll(), 'id', 'name'), array(
							'labelOptions' => array('style' => 'display:inline')
									)
					);
					?>
				</div>
			</div>
			<div id="skill-choose-mentors-form" class="hide">
				<h4>Send Mentorship Request</h4>
				<br>
				<div class="box-3-height">
					<?php
					echo CHtml::activeCheckboxList(
									$goalListMentor, 'userIdList', CHtml::listData(Profile::model()->findAll(), 'user_id', 'firstname'), array(
							'labelOptions' => array('style' => 'display:inline')
									)
					);
					?>
				</div>
			</div>
			<div id="skill-more-details">
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="gb-btn-row-large">
			<?php echo CHtml::submitButton('Submit', array('id' => 'add-skilllist-submit-goal', 'class' => 'span2 pull-right gb-btn gb-btn-blue-1 btn-large  pull-right')); ?>
			<a id="gb-skill-form-next-btn" form-num="0" class="span2 pull-right gb-btn btn-large gb-btn-blue-1">Next <i class="icon-white icon-arrow-right"></i></a>
			<a id="gb-skill-form-back-btn" form-num="0" class="span2 pull-keft gb-btn btn-large gb-btn-blue-1"><i class="icon-white icon-arrow-left"></i> Back</a>
		</div>
	</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->