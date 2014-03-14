<?php $this->beginContent('//nav_layouts/guest_nav'); ?>
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
<div class="row-fluid">
  <div id="" class="span9">
    <h2 class="sub-heading-9">Members</h2>
    <br>
    <div class="row-fluid">
      <div class="span4 gb-skill-leftbar">

      </div>
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
  <div id="" class="span3">
    <div class="row-fluid">
      <?php
      echo $this->renderPartial('user.views.user.registration', array(
       'registerModel' => $registerModel,
       'profile' => $profile
      ));
      ?>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('user.views.user._login_modal', array(
 'loginModel' => $loginModel
));
?>
<?php $this->endContent() ?>