 <div id="gb-login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Login
      </div>
      <div class="modal-body">
        <?php
        echo CHtml::beginForm('', 'post', array(
         'class' => 'form'));
        ?>
        <div class="form-group row">
          <?php echo CHtml::activeTextField($loginModel, 'username', array('class' => 'form-control  col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'someone@example.com')) ?>
        </div>
        <div class="form-group row">
          <?php echo CHtml::activePasswordField($loginModel, 'password', array('class' => 'form-control  col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'Password')) ?>
        </div>
         <a href="#gb-registration-modal" role="button" data-toggle="modal" class="">Register</a>
        | <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>

        <div class="modal-footer row">
          <div class="btn-group pull-right">
            <a type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</a>
            <?php echo CHtml::submitButton(UserModule::t("Login"), array('class' => 'btn btn-primary')); ?>
          </div>	
        </div>
      </div>
      <?php echo CHtml::endForm(); ?>


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
</div>