<?php $this->beginContent('//nav_layouts/guest_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_skillbank.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var searchUrl = "<?php echo Yii::app()->createUrl("search/search"); ?>";
  var ajaxSearchUrl = "<?php echo Yii::app()->createUrl("search/ajaxSearch"); ?>";
  var skillBankType = "<?php echo Post::$TYPE_LIST_BANK; ?>";
</script>
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
<div class="row">
  <div id="" class="span9">
    <h2 class="sub-heading-9">Skill Bank</h2>
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Not Logged In</strong> you will be limited.<br>
      You will not be able to add a skill.<br>
      You cannot share a a skill.<br>
      You cannot assign a skill to someone.
    </div>
    <ul id="gb-mentorship-all-activity-nav" class="gb-side-nav-1 gb-skill-leftbar">
      <li class="active"><a href="#gb-skill-verified-pane" data-toggle="tab">Verified<i class="icon-chevron-right pull-right"></i></a></li>
      <li class=""><a href="#gb-skill-not-verified-pane" data-toggle="tab">Not Verified<i class="icon-chevron-right pull-right"></i></a></li>
    </ul>
    <div class="gb-skill-activity-content">
      <div class="tab-content row-fluid">
        <div class="tab-pane active" id="gb-skill-verified-pane">
          <div class="row-fluid input-append">
            <input class="span11" id="gb-skillbank-keyword-search-input" type="text" placeholder="Search skills, e.g. design, software...">
            <div class="btn-group">
              <button id="gb-skillbank-keyword-search-btn" class="btn" >
                <i class='icon-search'></i>
              </button>
            </div>
          </div>
          <div class=" row-fluid">
            <div id="gb-skillbank-search-result" class=" row-fluid">
              <?php
              $count = 1;
              foreach ($skillListBank as $skillBankItem):
                ?> 
                <?php
                echo $this->renderPartial('_skill_bank_item_row_guest', array(
                 'skillBankItem' => $skillBankItem,
                 'count' => $count++));
                ?>
              <?php endforeach; ?>
              ?>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="gb-skill-not-verified-pane">

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
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
 'loginModel' => $loginModel
));
?>
<?php $this->endContent() ?>