<?php $this->beginContent('//login_layouts/login_nav'); ?>

<div class="row rm-login-heading">
	<span>
		<a><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" class="" alt=""></a>
	</span>
	<span class="pull-right">
		<h3>Login</h3>
	</span>
</div>
<div class="form">
	<?php
	echo CHtml::beginForm('', 'post', array(
			'class' => 'form-horizontal'));
	?>
	<?php echo CHtml::errorSummary($model); ?>
  <div class="control-group">
		<div class="control-label">
			<?php echo CHtml::activelabelEx($model, 'username'); ?>
		</div>
    <div class="controls">
			<?php echo CHtml::activeTextField($model, 'username', array('class' => 'input-block-level')) ?>
    </div>
  </div>
  <div class="control-group">
		<div class="control-label">
			<?php echo CHtml::activelabelEx($model, 'password'); ?>
		</div>
    <div class="controls">
			<?php echo CHtml::activePasswordField($model, 'password', array('class' => 'input-block-level')) ?>
    </div>
  </div>
	<?php echo CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>

	<?php echo CHtml::submitButton(UserModule::t("Login"), array('class' => 'btn btn-primary pull-right')); ?>
 
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