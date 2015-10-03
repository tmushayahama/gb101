<?php $this->beginContent('//layouts/gb_main2'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
?>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h2 class="pull-left">Search Results</h2>
  </div>
</div>
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 ">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-padding-thin">
          <div class="input-group input-group-sm">
            <input class="form-control" id="gb-skillbank-keyword-search-input" type="text" placeholder="Search skills, e.g. design, software...">
            <div class="input-group-btn">
              <button id="gb-skillbank-keyword-search-btn" class="btn btn-primary" >
                <i class='glyphicon glyphicon-search'></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-padding-thin">
          <div id="gb-search-result" class=" row">
            <?php
            echo $this->renderPartial('application.views.search._search_result', array(
             'searchResults' => $searchResults,
             'searchType' => $searchType));
            ?>
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