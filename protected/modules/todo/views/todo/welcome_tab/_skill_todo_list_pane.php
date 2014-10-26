<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-todo-todo-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-todos">
  <?php
  if (count($todoTodoParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no todo(s) added.
    </h5>
  <?php endif; ?>

  <?php foreach ($todoTodoParentList as $todoTodoParent): ?>
    <?php
    $this->renderPartial('todo.views.todo.activity._todo_todo_parent_list_item', array(
     "todoTodoParent" => $todoTodoParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

