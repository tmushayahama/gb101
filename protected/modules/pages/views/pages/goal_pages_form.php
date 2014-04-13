<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;

Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_pages_form.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var submitGoalPageEntryUrl = "<?php echo Yii::app()->createUrl("pages/pages/submitGoalPageEntry", array('pageId' => $page->id, 'goalId' => $goal->id)); ?>";
  var subgoalNumber = "<?php echo $subgoalNumber; ?>";
</script>
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
      <br>
      <br>
      <div class="row-fluid gb-page-form">
        <h4 class="sub-heading-6"><a>Write Goal Page</a><a class="pull-right"><i><small></small></i></a></h4>
        <dl class="dl-horizontal">
          <dt>
          Skill/Goal
          </dt>
          <dd>
            <select id="gb-goal-number-selector" class="pull-left" readonly>
              <option value="" disabled="disabled">Select Number</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
            </select>
          </dd>
          <dt>
          Skill/goal to Achieve
          </dt>
          <dd>
            <textarea id="gb-goal-input" class="input-block-level" placeholder="Skill Achievement/Goal Achievement" readonly><?php echo $goal->title; ?></textarea>
          </dd>
          <dt>
          </dt>
          <dd>
            <input id="goal-pages-goal-title-input" class="input-block-level" placeholder="Title" type="text">
            <textarea id="goal-pages-goal-description-input" class="input-block-level" placeholder="Skill Description" rows=4></textarea>
          </dd>
          <button id="goal-pages-submit-entry" class="gb-btn btn-large span2 gb-btn-blue-2">Save</button>
        </dl> 
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent() ?>