<?php $this->beginContent('//layouts/gb_main2'); ?>
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

// $("#gb-topbar-heading-title").text("Skills");
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
      <div class="gb-full col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-no-padding gb-background-dark-5">
        <br>
        <div class="gb-top-heading row">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_5.png" alt="">
          <h1 class="pull-left">Advice Pages</h1>
        </div>
        <br>
      </div>
      <div class="gb-full col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-no-padding gb-background-light-grey-1">
        <br>
        <div class="panel panel-default gb-no-padding gb-side-margin-thick gb-background-light-grey-1">
          <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Not Logged In</strong> you will be limited.<br>
            You will not be able to rate the advice.<br>
            You cannot share an advice page.
          </div>
          <h3 class="gb-heading-2">Recent Pages</h3>
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
echo $this->renderPartial('user.views.user._registration_modal', array(
 'registerModel' => $registerModel,
 'profile' => $profile
));
?>
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
 'loginModel' => $loginModel
));
?>
<?php $this->endContent() ?>