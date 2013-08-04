<?php $this->beginContent('//nav_layouts/registration_nav'); 
Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl . '/js/gb_registration.js', CClientScript::POS_END
);
?>
<?php if (Yii::app()->user->hasFlash('registration')): ?>
	<div class="success">
		<?php echo Yii::app()->user->getFlash('registration'); ?>
	</div>
<?php else: ?>
	<div class="row rm-login-heading">
		<span>
			<a><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" class="" alt=""></a>
		</span>
		<span class="pull-right">
			<h3>Sign Up</h3>
		</span>
	</div>
	<div class="form">
		<?php
		$form = $this->beginWidget('UActiveForm', array(
				'id' => 'registration-form',
				'enableAjaxValidation' => false,
				'clientOptions' => array(
						'validateOnSubmit' => true,
				),
				'htmlOptions' => array('enctype' => 'multipart/form-data'),
		));
		?>

		<?php echo $form->errorSummary(array($model, $profile)); ?>
		<div class="control-group">
			<div class="controls controls-row">
				<?php echo $form->textField($profile, 'firstname', array('class' => 'span2', 'placeholder' => 'First Name')); ?>
				<?php echo $form->error($profile, 'firstname'); ?>
				<?php echo $form->textField($profile, 'lastname', array('class' => 'span2', 'placeholder' => 'Last Name')); ?>
				<?php echo $form->error($profile, 'lastname'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<?php echo $form->textField($model, 'email', array('class' => 'input-block-level', 'placeholder' => 'email@example.com')); ?>
				<?php echo $form->error($model, 'email'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<?php echo $form->passwordField($model, 'password', array('class' => 'input-block-level', 'class' => 'input-block-level', 'placeholder' => 'password')); ?>
				<?php echo $form->error($model, 'password'); ?>
			</div>
		</div>
		<div class="control-group ">
			<div class="controls">
				<?php echo $form->passwordField($model, 'verifyPassword', array('class' => 'input-block-level', 'placeholder' => 'confirm password')); ?>
				<?php echo $form->error($model, 'verifyPassword'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				
				<?php echo $form->labelEx($profile, 'gender'); ?>
				<?php echo  $form->radioButtonList($profile,'gender', $profile->getGenderOptions(), array('uncheckValue' => null, 'labelOptions'=>array('style'=>'display:inline'), 'separator'=>' | ')); ?>
				<?php // $form->radioButton($profile, 'gender', $profile->getGenderOptions(), array('value' => 2, 'uncheckValue' => null)); ?>
				<?php //echo $form->radioButton($profile, 'gender', $profile->getGenderOptions(), array('value' => 3, 'uncheckValue' => null)); ?>

				<?php echo $form->error($profile, 'gender'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls controls-row">
				<?php echo $form->textField($profile, 'birthdate', array('id'=>'birthdate-datepicker', 'class'=>'span2', 'placeholder' => 'Birth Date')); ?>
				<?php echo $form->error($profile, 'birthdate'); ?>
				<input id="birthdate-alternate" type="text" class="span2 disabled uneditable-input" disabled="disabled" placeholder="DD, d ,MM yy">
			</div>
		</div>
		<div class="row submit">
			<?php echo CHtml::submitButton(UserModule::t("Registration"), array('class' => 'btn btn-primary pull-right')); ?>
		</div>
		<?php $this->endWidget(); ?>
	</div><!-- form -->
<?php endif; ?>
<?php $this->endContent(); ?>