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
<div class="gb-background">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-3 col-lg-6 col-md-6 col-sm-6">

    </div> 
    <div class="gb-blue-background col-lg-6 col-md-6 col-sm-6">

    </div>
  </div>
</div>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <div class="gb-top-heading row">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_bank_icon_5.png" alt="">
      <h2 class="pull-left">Skill Bank</h2>
    </div>
  </div>
  <div class="gb-nav-bar-1-contaner row">
    <div class="container">
      <ul id="" class="gb-nav-1">
      </ul>
    </div>
  </div>
</div>

<div class="container">
  <div class="gb-background-dark-3 gb-full col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-home-left-nav">
    <br>
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
  <div class="gb-full col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding gb-blue-background">
    <br>
    <div class="tab-pane active gb-full gb-side-margin-thick" id="gb-skill-verified-pane">
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
    <div class="tab-pane gb-full" id="gb-skill-not-verified-pane">

    </div>
    <div class="gb-dummy-height">

    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<?php $this->endContent(); ?>