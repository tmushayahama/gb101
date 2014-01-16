<?php $this->beginContent('//nav_layouts/site_nav'); ?>



<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;

Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_pages_form.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var goalNumber = "<?php echo $goalNumber; ?>";
</script>
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
      <br>
      <br>
      <div class=" row-fluid">
        <h4 class="sub-heading-6"><a>Write Goal Page</a><a class="pull-right"><i><small></small></i></a></h4>
        <dl class="dl-horizontal">
          <dt>
          Skill/Goal
          </dt>
          <dd>
            <select id="gb-goal-number-selector" class="pull-left">
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
            <textarea id="gb-goal-input" class="input-block-level" placeholder="Skill Achievement/Goal Achievement"><?php echo $goal; ?></textarea>
          </dd>

          <?php for ($i = 0; $i < $goalNumber; $i++): ?>
            <dt>
            Skill <?php echo $i; ?>
            </dt>
            <dd>
              <textarea id="gb-goal-input" class="input-block-level" placeholder="Skill Achievement/Goal Achievement"></textarea>
            </dd>
          <?php endfor ?>
        </dl>    
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent() ?>