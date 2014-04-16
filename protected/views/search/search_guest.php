<?php $this->beginContent('//layouts/gb_main2'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_ajax_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var searchUrl = "<?php echo Yii::app()->createUrl("search/search"); ?>";
  var ajaxSearchUrl = "<?php echo Yii::app()->createUrl("search/ajaxSearch"); ?>";
</script>
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12">
      <div id="gb-search-result" class=" row">
        <?php
        echo $this->renderPartial('application.views.search._search_result', array(
         'searchResults' => $searchResults,
         'searchType' => $searchType));
        ?>
      </div>
    </div>
    <div class="col-lg-3 col-sm-12 col-xs-12">
      <div class="row">
        <div class="panel panel-default">
          <h4 class="panel-heading">Skills To Explore</h4>
          <div class="panel-body">

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