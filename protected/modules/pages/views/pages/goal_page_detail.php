<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_subgoals.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var editAdvicePageUrl = "<?php echo Yii::app()->createUrl("pages/pages/editAdvicePage", array("advicePageId" => $advicePage->id)); ?>";
  var addAdvicePageSubgoalUrl = "<?php echo Yii::app()->createUrl("pages/pages/addAdvicePageSubgoal", array("advicePageId" => $advicePage->id)); ?>";
// $("#gb-topbar-heading-title").text("Skills");
</script>
<div class="container-fluid gb-white-background">
  <br>
  <div class="container">
    <div class="goal-page-info-container row">
      <div class="col-lg-2 col-sm-12 col-xs-12">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
      </div>
      <div class="panel panel-default gb-no-padding col-lg-7 col-sm-7 col-xs-12">
        <div class="panel-heading">
          <h4 class="gb-advice-page-title"><?php echo $advicePage->subgoals . " " . $advicePage->level->level_name . " " . $advicePage->page->title; ?>  </h4>
        </div>
        <div class="panel-body gb-padding-medium">
          <div class="row gb-panel-display">
            <p class=""><strong>Skill: </strong><a><?php echo $advicePage->goal->title; ?></a></p>
            <p class="gb-advice-page-description"> 
              <?php echo $advicePage->page->description; ?>
            </p>
          </div>
          <div class="row gb-panel-form gb-hide">
            <?php
            echo $this->renderPartial('pages.views.pages.forms._add_advice_page_form', array(
             'formType' => GoalType::$FORM_TYPE_ADVICE_PAGE_ADVICE_PAGE,
             'pageModel' => $page,
             'advicePageModel' => $advicePage,
             'pageLevelList' => $pageLevelList));
            ?>
          </div>
        </div>
        <div class="panel-footer">
          <div class="row">
            <h5 class="pull-left">Advisor: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $advicePage->page->owner_id)); ?>"><?php echo $advicePage->page->owner->profile->firstname . " " . $advicePage->page->owner->profile->lastname ?></a></h5>
            <div class="pull-right">
              <a class="gb-form-show gb-edit-advice-page-btn btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h2 class="pull-left">Advice Page</h2>
    <ul id="gb-mentorship-all-activity-nav" class="pull-right gb-nav-1">
      <li class="active"><a href="#goal_pages-all-pane" data-toggle="tab">Activity</a></li>
      <li class=""><a href="#goal_pages-my-goal_pages-pane" data-toggle="tab">Summary</a></li>
    </ul>
  </div>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12">
      <div class=" row ">
        <div class="tab-content">
          <div class="tab-pane active row" id="goal_pages-all-pane">
            <ul id="page-activity-nav" class="gb-side-nav-1 col-lg-3 col-sm-12 col-xs-12">
              <li class=""><a href="#gb-skill-activity-all-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Page</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
              <li class="active"><a href="#gb-skill-activity-discussion-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Discussion</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
            </ul>
            <div class="col-lg-9 col-sm-12 col-xs-12 gb-blue-left-border">
              <?php
              echo $this->renderPartial('pages.views.pages.forms._add_advice_page_subgoal_form', array(
               'goalModel' => $goalModel));
              ?>
              <div id="gb-advice-page-subgoals" class="row gb-white-background">
                <?php
                $count = 0;
                foreach ($subgoals as $subgoal):
                  $count++;
                  ?>
                  <?php
                  echo $this->renderPartial('pages.views.pages._advice_page_subgoal_row', array(
                   'subgoal' => $subgoal,
                   'count' => $count));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="goal_pages-my-goal_pages-pane">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent() ?>