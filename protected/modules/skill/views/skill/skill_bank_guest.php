<?php $this->beginContent('//layouts/gb_main2'); ?>
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
  var appendMoreSkillUrl = "<?php echo Yii::app()->createUrl("skill/skill/appendMoreSkill"); ?>";


</script>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h2 class="pull-left">Skill Bank</h2>
  </div>
</div>
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-no-padding">
      <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Not Logged In</strong> you will be limited.<br>
        You will not be able to add a skill.<br>
        You cannot share a a skill.<br>
        You cannot assign a skill to someone.
      </div>
      <div class="row gb-blue-background ">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-padding-thin">
          <div class="input-group input-group-sm">
            <input class="form-control" id="gb-skillbank-keyword-search-input" type="text" placeholder="Search skills, e.g. design, software...">
            <div class="input-group-btn">
              <button id="gb-skillbank-keyword-search-btn" class="btn btn-primary" >
                <i class='glyphicon glyphicon-search'></i>
              </button>
            </div>
          </div>
          <br>
          <ul id="gb-mentorship-all-activity-nav" class="row gb-side-nav-1 gb-skill-leftbar">
            <li class="active col-lg-12 col-md-12 col-sm-6 col-xs-6"><a href="#gb-skill-verified-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Verified List</p><i class="hidden-sm hidden-xs glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class="col-lg-12 col-md-12 col-sm-6 col-xs-6"><a href="#gb-skill-not-verified-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Not Verified List</p><i class="hidden-sm hidden-xs glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-padding-thin">
          <div class="tab-content">
            <div class="tab-pane active" id="gb-skill-verified-pane">
              <div id="gb-skillbank-search-result" class=" row">
                <?php
                echo $this->renderPartial('skill.views.skill._skill_bank_list', array(
                 'skillListBank' => $skillListBank,));
                ?>
              </div>
              <a id='gb-load-more-skillbank' class= 'btn-lg btn btn-default col-lg-12 col-md-12 col-sm-12 col-xs-12' type=1 next-page=1>
                Load More...
              </a>
              <div class="gb-dummy-height">
                
              </div>
            </div>
          </div>
          <div class="tab-pane" id="gb-skill-not-verified-pane">

          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-12 col-xs-12">
      <div class="row">
        <div class="panel panel-default">
          <h4 class="panel-heading">Skills To Explore</h4>
          <div class="panel-body">

          </div>
        </div>
      </div>
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