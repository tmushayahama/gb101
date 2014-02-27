<?php
$this->beginContent('//layouts/gb_main');
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_authenticate.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var searchUrl = "<?php echo Yii::app()->createUrl("search/search/keyword/"); ?>";
</script>
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
                <?php echo CHtml::submitButton(UserModule::t("Login"), array('class' => 'gb-btn gb-btn-login gb-btn-blue-2')); ?>
              </td>
            </tr>
            <tr>
              <td>
                <?php echo CHtml::activeCheckBox($loginModel, 'rememberMe'); ?> Stay Signed In
              </td>
              <td class="">
                <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
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
        <h2 class="title">Do some applications with your skills, goals and promises.
          Keep everything in one book.</h2>
        <div class="gb-intro-img-row">
          <ul class="thumbnails">
            <li class="span4">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_3.png" alt="">
                <h4 class="gb-footer">Skill Applications</h4>
                <p>
                  Skill Mentorships<br>
                  Skill Show Offs<br>
                  Skill Discussions<br>
                  <strong>...</strong>
                </p>
              </div>
            </li>
            <li class="span4">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_3.png" alt="">
                <h4 class="gb-footer">Goal Applications</h4>
                <p>
                  Advice Pages <br>
                  Daily Journal<br>
                  Collaborative Learning<br>
                  <strong>...</strong>
                </p>
              </div>
            </li>
            <li class="span4">
              <div class="thumbnail">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_3.png" alt="">
                <h4 class="gb-footer">Promise Application</h4>
                <p>
                  Promise Commitments<br>
                  Promise Sharing <br>
                  Promise Templates<br>
                  <strong>...</strong>
                </p>
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
<div class="container-fluid gb-intro-header-2">
  <div class="container">
    <div class="gb-input-append input-append">
      <input class="span10" id="gb-keyword-search-input" type="text" placeholder="Search anything. e.g. awesome, John Doe, dentist">
      <div class="btn-group">
        <button id="gb-keyword-search-btn" class="btn span2" >
          Search
        </button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid gb-intro-header-3">
  <div class="container">
    <br>
    <h2 class="text-center">Simple navigation and powerful functionality </h2>
    <br>
    <div class="row-fluid">
      <div class="span2 gb-intro-simple-nav">
        <img href="/profile" src="<?php // echo Yii::app()->request->baseUrl;     ?>/img/goal_icon.png" alt="">
        <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;     ?>/img/skill_icon.png" alt="">
        <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;     ?>/img/promise_icon.png" alt="">
      </div>
      <div class="span8">
        <br>
        <br>
        <br>
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/tablet_screenshot.png" alt="">
      </div>
      <div class="span2 gb-intro-simple-nav">
        <img href="/profile" src="<?php // echo Yii::app()->request->baseUrl;     ?>/img/goal_icon.png" alt="">
        <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;     ?>/img/skill_icon.png" alt="">
        <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl;     ?>/img/promise_icon.png" alt="">
      </div>
    </div>
  </div>
</div>
<?php $this->endContent(); ?>
