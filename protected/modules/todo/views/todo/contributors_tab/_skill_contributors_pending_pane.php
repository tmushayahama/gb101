<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-todo-judges">
  <?php
  echo $this->renderPartial('todo.views.todo._todo_judge_requests', array(
   "todoJudgeRequests" => $todoJudgeRequests,
   "todoListItem" => $todoListItem));
  ?>

  <?php
  echo $this->renderPartial('todo.views.todo._todo_observer_requests', array(
   "todoObserverRequests" => $todoObserverRequests,
   "todoListItem" => $todoListItem));
  ?>
</div>