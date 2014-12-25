<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($goalTodosCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no todos
 </h5>
<?php endif; ?>

<?php
$todoCounter = 1;
foreach ($goalTodos as $goalTodo):
 ?>
 <?php
 $this->renderPartial('todo.views.todo.activity._todo_parent', array(
   "todo" => $goalTodo->todo,
   "todoPriorities" => $todoPriorities,
   "todoCounter" => $todoCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Todo::$TODOS_PER_PAGE;
if ($offset < $goalTodosCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_GOAL_TODO; ?>"
    data-gb-source-pk="<?php echo $goalId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-goal-todos">
  More Todos
 </a>
<?php endif; ?>

