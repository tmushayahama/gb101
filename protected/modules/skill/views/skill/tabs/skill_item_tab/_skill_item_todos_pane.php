<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <input class="gb-form-show gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12"
         type="text"
         data-gb-target-container="#gb-todo-form-container"
         data-gb-target="#gb-todo-form"
         readonly
         placeholder="Write a Todo"
         />
 </div>
 <br>
 <div id="gb-todo-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('todo.views.todo.forms._todo_form', array(
     "formId" => "gb-todo-form",
     "actionUrl" => Yii::app()->createUrl("skill/skill/addSkillTodo", array("skillId" => $skillId)),
     "prependTo" => "#gb-skill-todos",
     "todoModel" => $todoModel,
     "todoPriorities" => $todoPriorities,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-skill-todos">
  <?php
  $this->renderPartial('skill.views.skill.activity.todo._skill_todos', array(
    "skillTodos" => $skillTodos,
    "todoPriorities" => $todoPriorities,
    "skillTodosCount" => $skillTodosCount,
    "skillId" => $skillId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

