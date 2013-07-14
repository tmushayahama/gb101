<?php $this->beginContent('//login_layouts/registration_nav'); ?>
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
				'disableAjaxValidationAttributes' => array('RegistrationForm_verifyCode'),
				'clientOptions' => array(
						'validateOnSubmit' => true,
				),
				'htmlOptions' => array('enctype' => 'multipart/form-data'),
		));
		?>

		<?php echo $form->errorSummary(array($model, $profile)); ?>
		<div class="control-group">
			<div class="controls controls-row">
				<?php echo $form->passwordField($profile, 'firstname', array('class'=>'span2', 'placeholder' => 'First Name')); ?>
				<?php echo $form->error($profile, 'firstname'); ?>
				<?php echo $form->passwordField($profile, 'lastname', array('class'=>'span2', 'placeholder' => 'Last Name')); ?>
				<?php echo $form->error($profile, 'lastname'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<?php echo $form->textField($model, 'email', array('class'=>'input-block-level', 'placeholder' => 'email@example.com')); ?>
				<?php echo $form->error($model, 'email'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<?php echo $form->passwordField($model, 'password', array('class'=>'input-block-level','class'=>'input-block-level','placeholder' => 'password')); ?>
				<?php echo $form->error($model, 'password'); ?>
			</div>
		</div>
		<div class="control-group ">
			<div class="controls">
				<?php echo $form->passwordField($model, 'verifyPassword', array('class'=>'input-block-level','placeholder' => 'confirm password')); ?>
				<?php echo $form->error($model, 'verifyPassword'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<?php echo $form->passwordField($profile, 'gender', array('placeholder' => 'First Name')); ?>
				<?php echo $form->error($profile, 'gender'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<?php echo $form->passwordField($profile, 'birthdate', array('placeholder' => 'Birth Date')); ?>
				<?php echo $form->error($profile, 'birthdate'); ?>
			</div>
		</div>
		<div class="row submit">
			<?php echo CHtml::submitButton(UserModule::t("Login"), array('class' => 'btn btn-primary pull-right')); ?>
		</div>
		<?php $this->endWidget(); ?>
	</div><!-- form -->
<?php endif; ?>
<?php $this->endContent(); ?>