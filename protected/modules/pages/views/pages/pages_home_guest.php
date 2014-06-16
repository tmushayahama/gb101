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
        <li class="gb-disabled"><a href="#goal_pages-my-goal_pages-pane" data-toggle="tab">My Pages</a></li>
      </ul>
    </div>
  </div>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-no-padding">
      <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Not Logged In</strong> you will be limited.<br>
        You will not be able to rate the advice.<br>
        You cannot share an advice page.
      </div>
      <div class="tab-content row">
        <div class="tab-pane active " id="goal_pages-all-pane">
          <div class="col-lg-4 col-sm-4 col-xs-12 gb-no-padding">
            <div class=" row gb-disabled">
              <div id="" class="input-group input-group-sm">
                <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search advice by anything, e.g. fighting">
                <div class="input-group-btn">
                  <button id="gb-advice-keyword-search-btn" class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-sm-8 col-xs-12">
            <div class="panel panel-default gb-no-padding">
              <div class="panel-heading">
                <h4 class=""><a>Recent Pages</a><a class="pull-right"></a></h4>
              </div>
              <div id="skill-posts"class="panel-body gb-no-padding">
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
      </div>
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