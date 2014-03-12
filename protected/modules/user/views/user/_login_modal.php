<div id="gb-login-modal" class="modal gb-modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Login
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white skilllist-modal-close-btn" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="modal-body">
    <div class="form">
      <?php
      echo CHtml::beginForm('', 'post', array(
       'class' => 'form'));
      ?>
      <?php echo CHtml::errorSummary($loginModel); ?>
      <div class="control-group">

        <div class="controls">
          <?php echo CHtml::activeTextField($loginModel, 'username', array('class' => 'input-block-level gb-input-large', 'placeholder' => 'someone@example.com')) ?>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <?php echo CHtml::activePasswordField($loginModel, 'password', array('class' => 'input-block-level gb-input-large', 'placeholder' => 'Password')) ?>
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
      ), $loginModel);
    ?>
  </div>
</div>