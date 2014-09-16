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
  var appendMoreSkillUrl = "<?php echo Yii::app()->createUrl("skill/skill/appendMoreSkill"); ?>";

  var skillBankType = "<?php echo Post::$TYPE_LIST_BANK; ?>";

</script>
<div class="gb-background hidden-sm hidden-xs">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-3 col-lg-6 col-md-6 col-sm-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6 col-sm-6"></div>
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
<?php $this->endContent(); ?>