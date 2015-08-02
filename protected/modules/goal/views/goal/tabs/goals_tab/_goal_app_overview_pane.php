<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="nav-container col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
 <div id="gb-middle-nav-3" class="gb-nav-parent">
  <div id="" class="gb-top-nav-1 gb-nav row">
   <div class="gb-title col-lg-10 col-md-10 col-sm-10 col-xs-10">
    <div class="btn-group">
     <a class="btn btn-default btn-xs dropdown-toggle gb-backdrop-visible"
        data-toggle="dropdown" aria-expanded="false"
        data-gb-target-container="#gb-goal-form-container"
        data-gb-target="#gb-goal-form"
        data-gb-url = "<?php echo Yii::app()->createUrl('goal/goal/addgoal', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
        data-gb-prepend-to="#gb-goals">
      <i class="fa fa-bars"></i>
     </a>
     <ul class="dropdown-menu dropdown-menu-left gb-form-dropdown" role="menu">
      <li>
       <div class="row gb-panel-form">
        <?php
        $this->renderPartial('goal.views.goal.forms._goal_search_form', array(
          "formId" => "gb-goal-form",
          "actionUrl" => Yii::app()->createUrl("goal/goal/addGoal", array()),
          "prependTo" => "#gb-goals",
          "goalLevelList" => $goalLevelList,
          'goalModel' => new Goal(),
          "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
        ));
        ?>
       </div>
      </li>
     </ul>
    </div>
    GOAL APP
   </div>
   <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-2">
    <div class="btn-group pull-right">
     <a class="btn btn-xs dropdown-toggle gb-backdrop-visible"
        data-toggle="dropdown" aria-expanded="false"
        data-gb-target-container="#gb-goal-form-container"
        data-gb-target="#gb-goal-form"
        data-gb-url = "<?php echo Yii::app()->createUrl('goal/goal/addgoal', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
        data-gb-prepend-to="#gb-goals">
      <i class="fa fa-plus"></i>
     </a>
     <ul class="dropdown-menu dropdown-menu-right gb-form-dropdown" role="menu">
      <li>
       <div id="gb-goal-form-container" class="row gb-panel-form">
        <?php
        $this->renderPartial('goal.views.goal.forms._goal_form', array(
          "formId" => "gb-goal-form",
          "actionUrl" => Yii::app()->createUrl("goal/goal/addGoal", array()),
          "prependTo" => "#gb-goals",
          "goalLevelList" => $goalLevelList,
          'goalModel' => new Goal(),
          "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
        ));
        ?>
       </div>
      </li>
     </ul>
    </div>
   </div>
  </div>
  <div class="gb-scrollable-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="row gb-hide">
    <div class="input-group gb-padding-thin">
     <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
     <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search goals. e.g. awesome, John Doe, dentist">
     <div class="input-group-btn">
      <button id="gb-keyword-search-btn" class="btn btn-default form-control gb-form-show gb-backdrop-visible"
              data-gb-target-container="#gb-goal-search-form-container"
              data-gb-target="#gb-goal-search-form"
              data-gb-url = "<?php echo Yii::app()->createUrl('goal/goal/searchGoal', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
              data-gb-prepend-to="#gb-goals">
       <span class="caret"></span>
      </button>
     </div>
    </div>
   </div>
   <div id="gb-goal-search-form-container" class="row gb-hide gb-panel-form">
    <?php
    $this->renderPartial('goal.views.goal.forms._goal_search_form', array(
      "formId" => "gb-goal-search-form",
      "actionUrl" => Yii::app()->createUrl("goal/goal/searchGoal", array()),
      "prependTo" => "#gb-goals",
      "goalLevelList" => $goalLevelList,
      'goalModel' => new Goal(),
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
    ));
    ?>
   </div>
   <div id="gb-goals" class="gb-list row">
    <?php
    $this->renderPartial('goal.views.goal.activity.goal._goal_list', array(
      "goals" => $goals,
      "goalsCount" => $goalsCount,
      "level" => 0,
      "offset" => 1,
    ));
    ?>
   </div>
   <div class="gb-dummy-height row"></div>
  </div>
 </div>
</div>