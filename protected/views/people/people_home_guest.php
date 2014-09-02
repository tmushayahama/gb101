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
<div class="gb-background">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-6 col-lg-6 col-md-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6"></div>
  </div>
</div>
<div class="container gb-full">
  <div class="gb-full gb-home-left-nav col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-background-dark-6 gb-no-padding ">
    <br>
    <div class="gb-top-heading row">
      <h1 class="pull-left">People</h1>
    </div>
    <br>
  </div>
  <div class="gb-full col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-background-light-grey-1 gb-no-padding">
    <br>
    
    <div class="gb-disabled-1 row">
      <div id="" class="input-group input-group-sm">
        <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search mentorship by anything, e.g. fighting">
        <div class="input-group-btn">
          <button id="gb-mentorship-keyword-search-btn" class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
    </div>
    <br>
    <div id="gb-search-result" class="row gb-full">
      <?php
      foreach ($people as $person) :
        echo $this->renderPartial('application.views.people._person_badge', array(
         'person' => $person));
      endforeach;
      ?>
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