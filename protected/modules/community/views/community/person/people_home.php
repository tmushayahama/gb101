<?php $this->beginContent('//layouts/gb_main1'); ?>
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
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <h2 class="pull-left">People</h2>
  </div>
</div>
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-9 col-sm-12 col-xs-12 gb-padding-none">
      <div class="row">
        <div class="col-lg-3 col-sm-3 col-xs-12 gb-padding-none ">
          <div class=" row">
            <div id="" class="input-group input-group-sm">
              <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search mentorship by anything, e.g. fighting">
              <div class="input-group-btn">
                <button id="gb-mentorship-keyword-search-btn" class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-sm-9 col-xs-11 gb-padding-none">
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
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent() ?>