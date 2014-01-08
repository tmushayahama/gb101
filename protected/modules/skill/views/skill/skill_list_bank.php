<?php $this->beginContent('//nav_layouts/site_nav'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
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
  $("#gb-topbar-heading-title").text("Skills");

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
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="gb-white-background span8">
      <div class=" row-fluid">

      </div>
      <div class=" row-fluid">
        <div class="tab-pane" id="skill-bank-pane">
          <ul id="gb-skill-bank-nav" class="">
            <li class="active"><a href="#gb-skill-bank-all-pane" data-toggle="tab">All<i class="icon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-bank-academic-pane" data-toggle="tab">Academic/Job Related<i class="icon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-bank-self-management-pane" data-toggle="tab">Self Management<i class="icon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-bank-transferable-pane" data-toggle="tab">Transferable<i class="icon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-bank-miscellaneous-pane" data-toggle="tab">Miscellaneous <i class="icon-chevron-right pull-right"></i></a></li>
            <li class=""><a href="#gb-skill-bank-words-of-action-pane" data-toggle="tab">Words of Action<i class="icon-chevron-right pull-right"></i></a></li>
          </ul>
          <div id="gb-skill-activity-content" class="tab-content">
            <div class="tab-pane active"id="gb-skill-bank-all-pane">
              <div class="sub-heading-5">
                <h4 class="pull-left">All Skill List</h4>
                <div class="pull-right input-append">
                  <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                  <button class="btn">
                    <i class="icon-search"></i>
                  </button>
                </div>
              </div>
              <div class=" row-fluid">
                <div id="gb-skill-skill-bank-all-container" class=" row-fluid">
                  <?php
                  $count = 1;
                  foreach (ListBank::getListBank() as $skillBankItem):

                    echo $this->renderPartial('_skill_bank_item_row', array(
                     'skillBankItem' => $skillBankItem,
                     'count' => $count++));
                    ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="tab-pane"id="gb-skill-bank-academic-pane">
              <div class="sub-heading-5">
                <h4 class="pull-left">Academic/Job Related</h4>
                <div class="pull-right input-append">
                  <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                  <button class="btn">
                    <i class="icon-search"></i>
                  </button>
                </div>
              </div>
              <div class=" row-fluid">
                <div id="gb-skill-skill-bank-all-container" class=" row-fluid">
                  <?php
                  $count = 1;
                  foreach (ListBank::getListBank(1) as $skillBankItem):
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
            <div class="tab-pane"id="gb-skill-bank-self-management-pane">
              <div class="sub-heading-5">
                <h4 class="pull-left">Self Management</h4>
                <div class="pull-right input-append">
                  <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                  <button class="btn">
                    <i class="icon-search"></i>
                  </button>
                </div>
              </div>
              <div class=" row-fluid">
                <div id="gb-skill-skill-bank-all-container" class=" row-fluid">
                  <?php
                  $count = 1;
                  foreach (ListBank::getListBank(2) as $skillBankItem):
                    ?> 
                    <?php
                    echo $this->renderPartial('_skill_bank_item_row', array(
                     'skillBankItem' => $skillBankItem,
                     'count' => $count++));
                    ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="tab-pane"id="gb-skill-bank-transferable-pane">
              <div class="sub-heading-5">
                <h4 class="pull-left">Transferable</h4>
                <div class="pull-right input-append">
                  <input class="span10" id="appendedPrependedDropdownButton" class="que-input-large" placeholder="Keyword Search."type="text">
                  <button class="btn">
                    <i class="icon-search"></i>
                  </button>
                </div>
              </div>
              <div class=" row-fluid">
                <div id="gb-skill-skill-bank-all-container" class=" row-fluid">
                  <?php
                  $count = 1;
                  foreach (ListBank::getListBank(3) as $skillBankItem):
                    ?> 
                    <?php
                    echo $this->renderPartial('_skill_bank_item_row', array(
                     'skillBankItem' => $skillBankItem,
                     'count' => $count++));
                    ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<div id="gb-add-skilllist-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add To Skill List
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <br>
  <?php
  echo $this->renderPartial('_add_skill_list_form', array(
   'skill_list_bank' => $skill_list_bank,
   'skillListModel' => $skillListModel,
   'skill_levels' => $skill_levels,
   'skillListShare' => $skillListShare,
   'skillListMentor' => $skillListMentor));
  ?>
</div>

<div id="gb-add-promiselist-modal" class="modal modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add To My Promise List
  </h2>
  <br>
  <?php
  echo $this->renderPartial('_add_promise_list_form', array(
   'skillListModel' => $skillListModel,
   'skillListShare' => $skillListShare,
   'skillListMentor' => $skillListMentor));
  ?>
</div>

<div id="gb-add-skill-modal" class="modal  modal-thick hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Add Skill Commitment
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white" data-dismiss="modal" aria-hidden="true">x</button>
  </h2>
  <div id="gb-skill-forms-container" class=" row-fluid">
    <div id="gb-skill-type-forms-container" class=" row-fluid">
      <div id="academic" class="skill-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/academic-icon.png" alt="">
        <br>
        <div class="content">
          <h3>Academic/Job Related</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
      <div id="self-management" class="skill-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
        <br>
        <div class="content">
          <h3>Self Management</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
      <div id="transferable" class="skill-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
        <br>
        <div class="content">
          <h3>Transferable</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
      <div id="skill-template" class="skill-entry-cover">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb" alt="">
        <br>
        <div class="content">
          <h3>Use Template</h3>
          <p>Related to how you conduct yourself.<br>
            <small><i>e.g. confident, independent, patient</i></small><p>
        </div>
      </div>
    </div>
    <div id="academic-skill-entry-form"class="hide skill-entry-form">
      <h4>Academic</h4>
      <ul class="nav nav-tabs" id="skill-tab">
        <li class="active"><a href="#skill-academic-pane">Academic</a></li>
        <li><a href="#skill-job-pane">Job Related</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="skill-academic-pane">
          <?php
          echo $this->renderPartial('_skill_academic_form', array(
           'academicModel' => $academicModel,
           'skillModel' => $skillModel,
           'skillListShare' => $skillListShare,
           'skillCommitmentShare' => $skillCommitmentShare,
           'skillListMentor' => $skillListMentor
          ));
          ?>
        </div>
        <div class="tab-pane" id="skill-job-pane">...</div>
      </div>
    </div>
  </div>
</div>

<?php $this->endContent(); ?>