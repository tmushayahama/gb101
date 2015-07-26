<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">
 <div id="gb-todo-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('todo.views.todo.forms._todo_form', array(
     "formId" => "gb-todo-form",
     "actionUrl" => Yii::app()->createUrl("advice/advice/addAdviceTodo", array("adviceId" => $adviceId)),
     "prependTo" => "#gb-advice-todos",
     "todoModel" => $todoModel,
     "todoPriorities" => $todoPriorities,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-advice-todos">
  <?php
  $this->renderPartial('advice.views.advice.activity.todo._advice_todos_list', array(
    "adviceTodos" => $adviceTodos,
    "todoPriorities" => $todoPriorities,
    "adviceTodosCount" => $adviceTodosCount,
    "adviceId" => $adviceId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

