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
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12">
      <div class="panel gb-panel-header">
        <div class="panel-heading">
          <h2 class="sub-heading-9">Members</h2>
        </div>
        <div class="panel-body">
          <h5>Search for skilled members. </h5>
        </div>
      </div>
      <div class="row gb-no-padding">
        <div class="col-lg-3 col-sm-3 col-xs-1 gb-no-padding">
        </div>
        <div class="col-lg-9 col-sm-9 col-xs-11">
          <div id="gb-search-result" class="span8 row-fluid">
            <?php
            foreach ($people as $person) :
              echo $this->renderPartial('application.views.people._person_badge', array(
               'person' => $person));
            endforeach;
            ?>
          </div>
        </div>
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