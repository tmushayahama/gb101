<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script type="text/javascript">

</script>
<div class="gb-background hidden-sm hidden-xs">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-3 col-lg-6 col-md-6 col-sm-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6 col-sm-6"></div>
  </div>
</div>
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-home-left-nav gb-no-padding gb-background-dark-3">
    <br>
    <div class="gb-top-heading row">
      <h1 class="">Goals</h1>
    </div>
    <br>
    <a class="btn gb-btn-3 gb-form-show gb-backdrop-visible"
       gb-form-slide-target="#gb-goal-form-container"
       gb-form-target="#gb-goal-form">
      <h4 class="text-center"><i class="glyphicon glyphicon-plus"></i> Add Goal</h4>
    </a>
    <div id="gb-goal-form-container" class="gb-hide gb-panel-form">
      <?php
      echo $this->renderPartial('goal.views.goal.forms._goal_form', array(
       'goalModel' => $goalModel,
       'goalListModel' => $goalListModel,
       'goalLevelList' => $goalLevelList));
      ?>
    </div>
    <br>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding gb-background-light-grey-1">

    <div class="row">
      <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-nav-for-background-3 gb-skill-leftbar">
        <li class="active col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-projects-all-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">All Goals</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
        <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-my-projects-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Goals</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
      </ul>
    </div>
    <br>
    <div class="tab-content row gb-padding-left-3">
      <div class="tab-pane active" id="gb-projects-all-pane">
        <h3 class="gb-heading-2">Recent Goals</h3>
        <div id="gb-posts"class="gb-no-padding">
          <?php
          $count = 1;
          foreach ($goalList as $goalListItem):
            echo $this->renderPartial('goal.views.goal.row._goal_list_post_row', array(
             'goalListItem' => $goalListItem));
          endforeach;
          ?>
        </div>
      </div>
      <div class="tab-pane" id="gb-my-projects-pane">
        <h3 class="gb-heading-2">My Goals</h3>
      </div>
    </div>
  </div>
</div>


<!-- -------------------------------MODALS --------------------------->

<!-- -----------------------------HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide">
</div>
<?php $this->endContent() ?>