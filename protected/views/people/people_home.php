<?php $this->beginContent('//nav_layouts/site_nav'); ?>
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
<style>
  body {
    /* padding-top: 60px; */
  }
</style>
<div id="main-container" class="container">
  <div class="row">
    <div id="" class="span9">
      <h2 class="sub-heading-9">People you may know</h2>
      <br>
      <div class="row-fluid">
        <div class="span4 gb-skill-leftbar">

        </div>
        <div id="gb-search-result" class="span8 row-fluid">
          <?php
          $count = 0;
          foreach ($people as $person) :
            if ($count % 2 == 0) :
              ?>
              <div class="row-fluid">
                <?php
              endif;
              echo $this->renderPartial('application.views.people._person_badge', array(
               'person' => $person));
              $count++;
              if ($count % 2 == 0) :
                ?>
              </div>
              <?php
            endif;
          endforeach;
          ?>
        </div>
      </div>
    </div>
    <div id="" class="span3">
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->

<?php $this->endContent() ?>