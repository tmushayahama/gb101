<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row">
 <a class="btn btn-default btn-lg gb-form-show gb-backdrop-visible col-lg-12 col-md-12 col-sm-12 col-xs-12"
    data-gb-target-container="#gb-goal-form-container"
    data-gb-target="#gb-goal-form"
    data-gb-url = "<?php echo Yii::app()->createUrl('goal/goal/addgoal', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
    data-gb-prepend-to="#gb-goals">
  <i class="glyphicon glyphicon-plus-sign"></i> Add a Goal
 </a>
</div>
<div id="gb-goal-form-container" class="row gb-hide gb-panel-form">
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

<div id="gb-goals" class="gb-list">
 <?php
 $this->renderPartial('goal.views.goal.activity.goal._goal_list', array(
   "goals" => $goals,
   "goalsCount" => $goalsCount,
   "level" => 0,
   "offset" => 1,
 ));
 ?>
</div>