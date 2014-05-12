<?php $this->beginContent('//layouts/gb_main1'); ?>
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
  //var addSkillListUrl = "<?php echo Yii::app()->createUrl("skill/skill/skillhome/addskilllist/connectionId/1"); ?>";

  var addSkillListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => 0, 'source' => "skill", 'type' => GoalList::$TYPE_SKILL)); ?>";
  var addPromiseListUrl = "<?php echo Yii::app()->createUrl("site/addskilllist", array('connectionId' => 0, 'source' => "skill", 'type' => GoalList::$TYPE_PROMISE)); ?>";
  var recordSkillCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordskillcommitment", array('connectionId' => 0, 'source' => 'skill')); ?>"
  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";

  var skillBankType = "<?php echo Post::$TYPE_LIST_BANK; ?>";

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
<!-- gb sidebar menu -->
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h2 class="pull-left">Skill Bank</h2>
  </div>
</div>
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-no-padding">
      <div class="row gb-blue-background">
        <div class="col-lg-4 col-sm-4 col-xs-12 gb-padding-thin">
          <div class="input-group input-group-sm">
            <input class="form-control" id="gb-skillbank-keyword-search-input" type="text" placeholder="Search skills, e.g. design, software...">
            <div class="input-group-btn">
              <button id="gb-skillbank-keyword-search-btn" class="btn btn-primary" >
                <i class='glyphicon glyphicon-search'></i>
              </button>
            </div>
          </div>
          <br>
          <ul id="gb-mentorship-all-activity-nav" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-skill-leftbar">
            <li class="active"><a href="#gb-skill-verified-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Verified List</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-not-verified-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Not Verified List</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-8 col-sm-8 col-xs-12 gb-padding-thin">
          <div class="tab-content gb-white-background">
            <div class="tab-pane active" id="gb-skill-verified-pane">
              <div id="gb-skillbank-search-result" class="panel panel-default gb-padding-thin">
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
            <div class="tab-pane" id="gb-skill-not-verified-pane">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<?php $this->endContent(); ?>