<?php $this->beginContent('//nav_layouts/guest_nav'); ?>
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
      <div id="gb-skill-activity-content" class="tab-content">
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
              echo $this->renderPartial('_skill_bank_item_row_guest', array(
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