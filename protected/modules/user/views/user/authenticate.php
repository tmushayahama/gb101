<?php
$this->beginContent('//layouts/gb_main');
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var searchUrl = "<?php echo Yii::app()->createUrl("search/search/"); ?>";
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
                <?php echo CHtml::submitButton(UserModule::t("Login"), array('class' => 'btn btn-success gb-btn-login')); ?>
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
      <?php echo CHtml::errorSummary(array($loginModel), '<button type="button" class="close" data-dismiss="alert">&times;</button>', NULL, array('class' => 'alert alert-error')); ?>

    </div>
  </div>
</div>
<div id="gb-topbar-guest" class="">
  <div class="container">
    <div class="row">
      <ul class="nav inline nav-pills">
        <li><a href="<?php echo Yii::app()->createUrl("user/login"); ?>" class="gb-btn btn-link btn-mini">Guest Home</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("skill/skill/skillbank", array()); ?>" class="gb-btn btn-link btn-mini">Skill Bank</a></li>
        <li class="dropdown">
          <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome", array()); ?>" class="gb-btn btn-link btn-mini">
            Mentorships
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">

          </ul>
        </li>
        <li class="dropdown">
          <a href="<?php echo Yii::app()->createUrl("pages/pages/pageshome", array()); ?>" class="gb-btn btn-link btn-mini">
            Advice Pages 
          </a>
          <ul  class="dropdown-menu " role="menu" aria-labelledby="">

          </ul>
        </li>
        <li><a href="<?php echo Yii::app()->createUrl("people/", array()); ?>" class="gb-btn btn-link btn-mini">People</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container-fluid gb-intro-header">
  <div class="container">
    <div class="row-fluid">
      <div class="gb-intro span8">
        <h2 class="title">Develop and apply your skills. What do you have under your skill section?  </h2>
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
    <?php echo $this->renderPartial('application.views.search._search_box_guest');
    ?>
  </div>
</div>
<div class="container-fluid gb-intro-header-3">
  <div class="container">

    <br>
    <h2>Sign up to get all the benefits of Skill Section.</h2>
    <br>
    <div class="row-fluid">
      <div class="span6 ">
        <div class='row-fluid'>
          <div class='span6'>
            <h4>Manage Your Skills</h4>
            <p><strong>Define your skills </strong> by listing skills
              you've gained, skills you want to learn and skills you want to improve. </p>
          </div>
          <div class='span6'>
            <h4>Access All Skill Applications</h4>
            <p><strong>Manage your skill apps,</strong> get features to all applications, mentorship app,
              advice pages app, skill showoffs app, daily journal app etc</p>
          </div>
        </div>
        <br>
        <div class='row-fluid'>
          <div class='span6'>
            <h4>Share & Connect with people</h4>
            <p><strong>Share with your connections,</strong>Share to right people. There are 4 types of connections, friends, family, followers and 
              general connections. </p>
          </div>
          <div class='span6'>
            <h4>Daily Personal Journal</h4>
            <p><strong>Keep track of your daily skills</strong> by keeping track of daily accomplishments and 
              new skills you learn, skills you mentor, pages you write etc
            </p>
          </div>
        </div>
        <br>
        <div class='row-fluid'>
          <div class='span6'>
            <h4>Skill Bank</h4>
            <p><strong>Make good use of our skill bank</strong> whether you want to add any skill, 
              want to start a mentorship, write an advice page, getting mentored, skill showoffs </p>
          </div>
          <div class='span6'>
            <h4>Get Puntos & Trophies</h4>
            <p><strong>Get rewarded</strong> be actively involved and earn points. 
              More points you gain the more proof of how skillful you are.</p>
          </div>
        </div>
      </div>
      <div class="span5 offset1">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/tablet_screenshot.png" alt="">
      </div>
    </div>
  </div>
</div>
<?php $this->endContent(); ?>
