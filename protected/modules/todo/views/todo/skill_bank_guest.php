<?php $this->beginContent('//layouts/gb_main2'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_skill_home.js', CClientScript::POS_END
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
  var appendMoreSkillUrl = "<?php echo Yii::app()->createUrl("skill/skill/appendMoreSkill"); ?>";


</script>
<div class="gb-background hidden-sm hidden-xs">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-3 col-lg-6 col-md-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6"></div>
  </div>
</div>
<div class="container">
  <div class="gb-background-dark-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-home-left-nav">
    <br>
    <div class="gb-top-heading row">
      <h1 class="pull-left">Skill Bank</h1>
    </div>
    <br>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding gb-background-light-grey-1">
    <br>
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Not Logged In</strong> you will be limited.<br>
      You will not be able to add a skill.<br>
      You cannot share a a skill.<br>
      You cannot assign a skill to someone.
    </div>
    <div class="input-group input-group-sm">
      <input class="form-control" id="gb-skillbank-keyword-search-input" type="text" placeholder="Search skills, e.g. design, software...">
      <div class="input-group-btn">
        <button id="gb-skillbank-keyword-search-btn" class="btn btn-primary" >
          <i class='glyphicon glyphicon-search'></i>
        </button>
      </div>
    </div>
    <br>
    <div class="tab-pane active gb-side-margin-thick" id="gb-skill-verified-pane">
      <div id="gb-skillbank-search-result" class=" row">
        <?php
        echo $this->renderPartial('skill.views.skill._skill_bank_list', array(
         'skillListBank' => $skillListBank,));
        ?>
      </div>
      <a id='gb-load-more-skillbank' class= 'btn-lg btn btn-default col-lg-12 col-md-12 col-sm-12 col-xs-12' type=1 next-page=1>
        Load More...
      </a>
    </div>
    <div class="tab-pane" id="gb-skill-not-verified-pane">

    </div>
    <div class="gb-dummy-height">

    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('user.views.user._registration_modal', array(
 'registerModel' => $registerModel,
 'profile' => $profile
));
?>
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
 'loginModel' => $loginModel
));
?>
<?php
echo $this->renderPartial('application.views.site.modals._login_notification', array(
));
?>
<?php $this->endContent() ?>