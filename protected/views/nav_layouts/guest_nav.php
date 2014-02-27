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
<br>
<br>
<div id="main-container" class="container">

  <div class="row">
    <div id="" class="span8">
      <div class="">
        <div class="gb-input-append">
          <input class="span6" id="gb-keyword-search-input" type="text" placeholder="Search anything. e.g. awesome, John Doe, dentist">
          <div class="btn-group">
            <button id="gb-keyword-search-btn" class="btn span2" >
              Search
            </button>
          </div>
        </div>
      </div>
      <br>
      <h4 class="sub-heading-6">Public Activities</h4>
      <br>
      <div class=" row-fluid">
        <?php
        $count = 1;
        foreach ($posts as $post):
          switch ($post->type) {
            case Post::$TYPE_GOAL_LIST:
              $skillListItem = GoalList::model()->findByPk($post->source_id);
              echo $this->renderPartial('skill.views.skill._skill_list_post_row', array(
               'skillListItem' => $skillListItem,
               'count' => $count++));
              break;
            case Post::$TYPE_MENTORSHIP:
              $mentorship = Mentorship::model()->findByPk($post->source_id);
              echo $this->renderPartial('mentorship.views.mentorship._mentorship_row', array(
               "mentorship" => $mentorship,
              ));
              break;
            case Post::$TYPE_MENTORSHIP_REQUEST:
              $mentorshipRequest = RequestNotification::model()->findByPk($post->source_id);
              if ($mentorshipRequest != null) {
                echo $this->renderPartial('mentorship.views.mentorship._mentorship_request_row', array(
                 "mentorshipRequest" => $mentorshipRequest,
                ));
              }
              break;
            case Post::$TYPE_ADVICE_PAGE:
              $page = Page::model()->findByPk($post->source_id);
              echo $this->renderPartial('pages.views.pages._goal_page_row', array(
               "goalPage" => $page,
              ));
              break;
          }
        endforeach;
        ?>
      </div>
    </div>
    <div id="" class="span4">
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