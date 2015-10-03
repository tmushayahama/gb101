<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12  gb-no-margin">
 <div id="gb-todo-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('todo.views.todo.forms._todo_form', array(
     "formId" => "gb-todo-form",
     "actionUrl" => Yii::app()->createUrl("goal/goal/addGoalTodo", array("goalId" => $goalId)),
     "prependTo" => "#gb-goal-todos",
     "todoModel" => $todoModel,
     "todoPriorities" => $todoPriorities,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-goal-todos">
  <?php
  $this->renderPartial('goal.views.goal.activity.todo._goal_todos_list', array(
    "goalTodos" => $goalTodos,
    "todoPriorities" => $todoPriorities,
    "goalTodosCount" => $goalTodosCount,
    "goalId" => $goalId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

