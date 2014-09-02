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
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_mentorship_home.js', CClientScript::POS_END
);
?>

<script id="record-task-url" type="text/javascript">
  var addAdvicePageUrl = "<?php echo Yii::app()->createUrl("pages/pages/addAdvicePage", array()); ?>";
  var advicePageDetailUrl = "<?php echo Yii::app()->createUrl("pages/pages/advicePageDetail", array()); ?>";
</script>
<div class="gb-background hidden-sm hidden-xs">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-5 col-lg-6 col-md-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6"></div>
  </div>
</div>
<div class="container gb-full">
  <div class="tab-content gb-full">
    <div class="tab-pane active gb-full" id="goal_pages-all-pane">
      <div class="gb-full col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding gb-background-dark-5">
        <br>
        <div class="gb-top-heading row">
          <h1 class="pull-left">Advice Pages</h1>
        </div>
        <br>
        <div class="row gb-home-nav">
          <a class="gb-form-show gb-backdrop-visible gb-advice-page-form-slide col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
             gb-form-slide-target="#gb-advice-page-form-container"
             gb-form-target="#gb-advice-page-form">
            <div class="thumbnail">
              <div class="gb-img-container">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_5.png" alt="">
              </div>
              <div class="caption">
                <h5 class="text-center">Add an<br>Advice</h5>
              </div>
            </div>
          </a>
          <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
             gb-form-slide-target="#gb-mentorship-form-container"
             gb-form-target="#gb-mentorship-form">
            <div class="thumbnail">
              <div class="gb-img-container">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_5.png" alt="">
              </div>
              <div class="caption">
                <h5 class="text-center">Create a<br>Mentorship</h5>
              </div>
            </div>
          </a>
          <a class="gb-disabled-1 gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
            <div class="thumbnail">
              <div class="gb-img-container">
                <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_bank_icon_5.png" alt="">
              </div>
              <div class="caption">
                <h5 class="text-center">Add to<br>Skill Bank</h5>
              </div>
            </div>
          </a>
        </div>
        <div id="gb-mentorship-form-container" class="gb-hide gb-panel-form">
          <?php
          echo $this->renderPartial('mentorship.views.mentorship.forms._add_mentorship_form', array(
           'formType' => GoalType::$FORM_TYPE_MENTORSHIP_HOME,
           'mentorshipModel' => $mentorshipModel,
           'mentorshipLevelList' => $mentorshipLevelList));
          ?>
        </div>
        <div id="gb-advice-page-form-container" class="gb-hide gb-panel-form">
          <?php
          echo $this->renderPartial('pages.views.pages.forms._add_advice_page_form', array(
           'formType' => GoalType::$FORM_TYPE_ADVICE_PAGE_HOME,
           'pageModel' => $pageModel,
           'advicePageModel' => $advicePageModel,
           'pageLevelList' => $pageLevelList));
          ?>
        </div>
      </div>
      <div class="gb-full col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding gb-background-light-grey-1">
        <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-skill-leftbar">
          <li class="active col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-all-advice-pages-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">All Advice Pages</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
          <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-my-advice-pages-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">My Advice Pages</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
        </ul>
        <br>
        <div class="panel panel-default gb-no-padding gb-side-margin-thick gb-background-light-grey-1">
          <h3 class="gb-heading-2">Recent Pages</h3>
          <br>
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
 "modalType" => Type::$SKILL_SHARE,
 "modalId" => "gb-skill-share-with-modal"));
?>
<?php
echo $this->renderPartial('application.views.site.modals._share_with_modal'
  , array("people" => $people,
 "modalType" => Type::$MENTORSHIP_SHARE,
 "modalId" => "gb-mentorship-share-with-modal"));
?>
<?php
echo $this->renderPartial('application.views.site.modals._share_with_modal'
  , array("people" => $people,
 "modalType" => Type::$PAGE_SHARE,
 "modalId" => "gb-page-share-with-modal"));
?>
<?php $this->endContent() ?>