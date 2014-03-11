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
      <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Not Logged In</strong> you will be limited.<br>
        You will not be able to rate the advice.<br>
        You cannot share an advice page.
      </div>
      <div id="gb-home-header" class="row-fluid">
        <div class="span3">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/pages_icon.png"; ?>" alt="">
        </div>
        <div class="connectiom-info-container span5">
          <ul class="nav nav-stacked connectiom-info span12">
            <h3 class="name">My Goal Pages</h3>
            <li class="connectiom-description">
              <p>Write something about a goal or a skill.<br>
                <small><i>template list, goal pages list, goal pages discussion</i></small><p>
            </li>
            <li class="connectiom-members">

            </li>
          </ul>
        </div>
      </div>
      <br>
      <br>
      <div class=" row-fluid gb-bottom-border-grey-3">
        <h4 class="pull-left">Goal Pages</h4>
        <ul id="gb-skill-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#goal_pages-all-pane" data-toggle="tab">All</a></li>
          <li class=""><a href="#goal_pages-my-goal_pages-pane" data-toggle="tab">My Pages</a></li>
        </ul>
      </div>
      <div class=" row-fluid">
        <div class="tab-content">
          <div class="tab-pane active " id="goal_pages-all-pane">
            <div class="span4 gb-skill-leftbar">
              <div id="gb-skill-skill-list-box" class=" row-fluid">
                <div class="sub-heading-6">
                  <h5><a href="#skill-list-pane" data-toggle="tab">Favorite Pages (<i><?php echo 0; //echo GoalList::getGoalListCount(GoalType::$CATEGORY_SKILL, 0, 0);                 ?></i>)</a>
                    <a class="pull-right gb-btn gb-btn-blue-2 btn-small add-skill-modal-trigger" type="1"><i class="icon-white icon-plus-sign"></i> Add</a></h5>
                </div>
              </div>
            </div>
            <div class="span8">
              <div class="row-fluid">
                <div class="gb-pages-start-writing row-fluid">
                  <div class="row-fluid">
                    <h4>
                      <select id="gb-goal-number-selector" class="pull-left">
                        <option value="" disabled="disabled" selected="selected">Select Number</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                      </select>
                      <p>Skills/goals you need to achieve</p>
                    </h4>
                  </div>
                  <div class="row-fluid">
                    <textarea id="gb-goal-input" class="input-block-level" placeholder="Skill Achievement/Goal Achievement"></textarea>
                  </div>
                  <button id="gb-start-writing-page-btn" class="gb-btn gb-btn-blue-2">Start Writing</button>
                </div>
                <h3 class="sub-heading-9"><a>Recent Pages</a><a class="pull-right"><i><small></small></i></a></h3>
                <div id="skill-posts"class="row-fluid rm-row rm-container">
                  <?php foreach ($pages as $page): ?>
                    <?php
                    echo $this->renderPartial('_goal_page_row', array(
                     "goalPage" => $page,
                    ));
                    ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="goal_pages-my-goal_pages-pane">

            </div>
          </div>
        </div>
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