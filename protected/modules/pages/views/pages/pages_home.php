<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_pages_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var goalPagesFormUrl = "<?php echo Yii::app()->createUrl("pages/pages/goalPagesForm", array()); ?>";
// $("#gb-topbar-heading-title").text("Skills");
</script>
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-no-padding">
      <div class=" row gb-bottom-border-grey-3">
        <h4 class="pull-left">Goal Pages</h4>
        <ul id="gb-skill-nav" class="gb-nav-1 pull-right">
          <li class="active"><a href="#goal_pages-all-pane" data-toggle="tab">All</a></li>
          <li class=""><a href="#goal_pages-my-goal_pages-pane" data-toggle="tab">My Pages</a></li>
        </ul>
      </div>
      <div class="tab-content row">
        <div class="tab-pane active " id="goal_pages-all-pane">
          <div class="col-lg-3 col-sm-12 col-xs-12 gb-no-padding">
            <div class="panel panel-default ">
              <div class="panel-heading">
                <h6><a>Favorite Pages (<i><?php echo 0; //echo GoalList::getGoalListCount(GoalType::$CATEGORY_SKILL, 0, 0);                       ?></i>)</a>
                  <a class="pull-right btn btn-primary btn-xs add-skill-modal-trigger" type="1"><i class="glyphicon glyphicon-white icon-plus-sign"></i> Add</a></h6>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-sm-12 col-xs-12">
            <div class="gb-pages-start-writing row">
                <div class="form-control row">
                  <select id="gb-goal-number-selector" class="pull-left">
                    <option value="" disabled="disabled" selected="selected">Select Number</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                  </select>
                  <p> Skills/goals you need to achieve</p>
                </div>
              <div class="form-control row">
                <textarea id="gb-goal-input" class="col-lg-12 col-sm-12 col-xs-12" placeholder="Skill Achievement/Goal Achievement"></textarea>
              </div>
              <button id="gb-start-writing-page-btn" class="btn btn-default">Start Writing</button>
            </div>
            <br>
            <div class="panel panel-default gb-no-padding">
              <div class="panel-heading">
                <h4 class=""><a>Recent Pages</a><a class="pull-right"></a></h4>
              </div>
              <div id="skill-posts"class="panel-body gb-no-padding">
                <?php foreach ($pages as $page): ?>
                  <?php
                  echo $this->renderPartial('_goal_page_row', array(
                   "goalPage" => $page,
                  ));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="goal_pages-my-goal_pages-pane">

        </div>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent() ?>