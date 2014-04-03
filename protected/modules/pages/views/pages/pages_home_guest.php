<?php $this->beginContent('//layouts/gb_main2'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var searchUrl = "<?php echo Yii::app()->createUrl("search/search"); ?>";
</script>
<div class="row">
  <div id="" class="col-lg-8 col-sm-12 col-xs-12">
     <div class="row">
      <div class="panel panel-default">
        <div class="panel-body">
          <h2 class="sub-heading-9">Advice Pages</h2>
        </div>
      </div>
    </div>
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Not Logged In</strong> you will be limited.<br>
      You will not be able to rate the advice.<br>
      You cannot share an advice page.
    </div>
    <div class=" row">
      <div id="skill-posts"class="row">
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
  <div class="col-lg-4 col-sm-12 col-xs-12">
    <div class="row">
      <div class="panel panel-default">
        <h4 class="panel-heading">Skills To Explore</h4>
        <div class="panel-body">

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