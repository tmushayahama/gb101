<?php $this->beginContent('//layouts/gb_main'); ?>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner navbar-small">
    <div class="container">
      <div class="row">
        <div class="gb-navbar-login span12">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class="gb-img-logo-medium" alt="Goalbook">
          <?php
          echo CHtml::beginForm('', 'post', array(
           'class' => 'pull-right'));
          ?>

          <table id="login-form-table">
            <?php echo CHtml::errorSummary(array($loginModel), NULL, NULL, array('class' => 'alert alert-error')); ?>
            <tbody>
            <br>
            <tr class="">
              <td class="">
                <?php echo CHtml::activelabelEx($loginModel, 'username'); ?>
              </td>
              <td class="">
                <?php echo CHtml::activeLabelEx($loginModel, 'password'); ?>
              </td>
            </tr>
            <tr>
              <td class="">
                <?php echo CHtml::activeTextField($loginModel, 'username'); ?>
              </td>
              <td class="">
                <?php echo CHtml::activePasswordField($loginModel, 'password') ?>
              </td>
              <td class="">
                <?php echo CHtml::submitButton(UserModule::t("Login"), array('class' => 'gb-btn gb-btn-login gb-btn-green-3')); ?>
              </td>
            </tr>
            <tr>
              <td>
                <a>
                  <?php echo CHtml::activeCheckBox($loginModel, 'rememberMe'); ?>
                  Stay Signed In
                </a>
              </td>
              <td class="" data-toggle="collapse"data-parent="#register-accordion" href="#collapse-register-accordion">
                <?php echo CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
              </td>
            </tr>
            </tbody>
          </table>
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
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
</div>
<div class="container-fluid gb-intro-header">
  <div class="container">
    <div class="row-fluid">
      <div class="gb-intro span8">
        <h2 class="title">Imagine combining your skills and promises to achieve your goals in one book.</h2>
        <div class="gb-intro-img-row">
          <ul class="thumbnails">
            <li class="span3 ">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon.png" alt="">
                <h5 class="gb-footer">Skill Management</h5>
              </div>
            </li>
            <li class="span4 offset1">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon.png" alt="">
                <h3 class="gb-footer">Goal Setting</h3>
              </div>
            </li>
            <li class="span3 offset1">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon.png" alt="">
               <h5 class="gb-footer">Promise Management</h5>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="span4"> 
        <?php
        echo $this->renderPartial('user.views.user.registration', array(
         'registerModel' => $registerModel,
         'profile' => $profile
        ));
        ?>
      </div> 
    </div>
  </div>
</div>

<?php $this->endContent(); ?>
