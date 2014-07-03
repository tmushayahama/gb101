<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var addAdvicePageUrl = "<?php echo Yii::app()->createUrl("pages/pages/addAdvicePage", array()); ?>";
  var advicePageDetailUrl = "<?php echo Yii::app()->createUrl("pages/pages/advicePageDetail", array()); ?>";
</script>
<div class="gb-background">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-5 col-lg-6 col-md-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6"></div>
  </div>
</div>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <div class="gb-top-heading row">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_5.png" alt="">
      <h2 class="pull-left">Advice Pages</h2>
    </div>
  </div>
  <div class="gb-nav-bar-1-contaner row">
    <div class="container">
      <ul id="" class="gb-nav-1">
        <li class="active"><a href="#goal_pages-all-pane" data-toggle="tab">All</a></li>
        <li class=""><a href="#goal_pages-my-goal_pages-pane" data-toggle="tab">My Pages</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container gb-full">
  <div class="tab-content gb-full">
    <div class="tab-pane active gb-full" id="goal_pages-all-pane">
      <div class="gb-full col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding gb-background-dark-5">
        <br>
        <?php
        echo $this->renderPartial('pages.views.pages.forms._add_advice_page_form', array(
         'formType' => GoalType::$FORM_TYPE_ADVICE_PAGE_ADVICE_PAGES,
         'pageModel' => $pageModel,
         'advicePageModel' => $advicePageModel,
         'pageLevelList' => $pageLevelList));
        ?>
        <br>
        <div class="panel panel-default ">
          <div class="panel-heading">
            <h6><a>Favorite Pages (<i><?php echo 0; //echo GoalList::getGoalListCount(Level::$LEVEL_CATEGORY_SKILL, 0, 0);                             ?></i>)</a>
              <a class="pull-right btn btn-primary btn-xs skill-modal-trigger" type="1"><i class="glyphicon glyphicon-white icon-plus-sign"></i> Add</a></h6>
          </div>
        </div>
      </div>
      <div class="gb-full col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding gb-background-light-grey-1">
        <br>
        <div class="panel panel-default gb-no-padding gb-background-light-grey-1">
          <h3 class="gb-heading-2"><a>Recent Pages</a></h3>
          <div id="skill-posts"class="panel-body gb-no-padding gb-background-light-grey-1">
            <?php foreach ($advicePages as $advicePage): ?>
              <?php
              echo $this->renderPartial('_goal_page_row', array(
               "advicePage" => $advicePage,
              ));
              ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane gb-full" id="goal_pages-my-goal_pages-pane">

    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('application.views.site.modals._share_with_modal'
  , array("people" => $people,
 "modalType" => Type::$PAGE_SHARE,
 "modalId" => "gb-page-share-with-modal"));
?>
<?php $this->endContent() ?>