<?php $this->beginContent('//nav_layouts/login_nav'); ?>

<div class="gb-login-heading">
		<h2>Login</h2>
</div>
<div class="form">
	<?php
	echo CHtml::beginForm('', 'post', array(
			'class' => 'form'));
	?>
	<?php echo CHtml::errorSummary($model); ?>
  <div class="control-group">
	
    <div class="controls">
			<?php echo CHtml::activeTextField($model, 'username', array('class' => 'input-block-level gb-input-large', 'placeholder'=>'someone@example.com')) ?>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
			<?php echo CHtml::activePasswordField($model, 'password', array('class' => 'input-block-level gb-input-large', 'placeholder'=>'Password')) ?>
    </div>
  </div>
	<?php echo CHtml::submitButton(UserModule::t("Login"), array('class' => 'btn btn-large btn-primary')); ?>
	<br>
	<br>
 	<?php echo CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>

	<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(
		'elements' => array(
				'username' => array(
						'type' => 'text',
						'maxlength' => 32,
				),
				'password' => array(
						'type' => 'password',
						'maxlength' => 32,
				),
				'rememberMe' => array(
						'type' => 'checkbox',
				)
		),
		'buttons' => array(
				'login' => array(
						'type' => 'submit',
						'label' => 'Login',
				),
		),
				), $model);
?>
<?php $this->endContent(); ?>