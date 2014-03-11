<?php $this->beginContent('//layouts/gb_main'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var searchUrl = "<?php echo Yii::app()->createUrl("search/search"); ?>";
</script>
<link href="css/leveledito.css?v=1.11" rel="stylesheet">

<style>
  body {
    /* padding-top: 60px; */
  }
</style>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="ico/favicon.ico?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png?v=1.11">
<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png?v=1.11">
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
<div id="gb-topbar-guest" class="">
  <div class="container">
    <div class="row">
      <ul class="nav inline nav-pills">
        <li><a href="<?php echo Yii::app()->createUrl("user/login"); ?>" class="gb-btn btn-link btn-mini">Guest Home</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("skill/skill/skillbank", array()); ?>"><i class="icon icon-marketplace"></i>Skill Bank</a></li>
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
      </ul>
    </div>
  </div>
</div>
<br>
<br>
<br>
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
      <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Not Logged In</strong> you will be limited.<br>
        You will not be able to rate the advice.<br>
        You cannot share an advice page.
      </div>
      <div id="gb-skill-activity-content" class="tab-content">
        <h2 class="sub-heading-9">Skill Bank</h2>
        <br>
        <div class="row-fluid input-append">
          <input class="span11" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Search skills by keyword. i.e. garden, interview, etc."type="text">
          <button class="btn">
            <i class="icon-search"></i>
          </button>
        </div>
        <div class="row-fluid">
          <?php
          $this->widget('CLinkPager', array(
           'pages' => $pages,
          ))
          ?> 
        </div>
        <div class=" row-fluid">
          <div id="gb-skill-skill-bank-all-container" class=" row-fluid">
            <?php
            $count = 1;
            foreach ($skillListBank as $skillBankItem):
              ?> 
              <?php
              echo $this->renderPartial('_skill_bank_item_row', array(
               'skillBankItem' => $skillBankItem,
               'count' => $count++));
              ?>
            <?php endforeach; ?>
            ?>
          </div>
        </div>
      </div>
    </div>
    <div id="" class="span3">
      <div class="row-fluid">
        <?php
        echo $this->renderPartial('user.views.user.registration', array(
         'registerModel' => $registerModel,
         'profile' => $profile
        ));
        ?>
      </div>s
    </div>
  </div>
</div> 

<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent() ?>