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
     "actionUrl" => Yii::app()->createUrl("hobby/hobby/addHobbyTodo", array("hobbyId" => $hobbyId)),
     "prependTo" => "#gb-hobby-todos",
     "todoModel" => $todoModel,
     "todoPriorities" => $todoPriorities,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-hobby-todos">
  <?php
  $this->renderPartial('hobby.views.hobby.activity.todo._hobby_todos_list', array(
    "hobbyTodos" => $hobbyTodos,
    "todoPriorities" => $todoPriorities,
    "hobbyTodosCount" => $hobbyTodosCount,
    "hobbyId" => $hobbyId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

