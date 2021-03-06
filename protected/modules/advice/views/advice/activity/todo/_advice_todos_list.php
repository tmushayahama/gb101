<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($adviceTodosCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no todos
 </h5>
<?php endif; ?>

<?php
$todoCounter = 1;
foreach ($adviceTodos as $adviceTodo):
 ?>
 <?php
 $this->renderPartial('todo.views.todo.activity._todo_parent', array(
   "todo" => $adviceTodo->todo,
   "todoPriorities" => $todoPriorities,
   "todoCounter" => $todoCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Todo::$TODOS_PER_PAGE;
if ($offset < $adviceTodosCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_ADVICE_TODO; ?>"
    data-gb-source-pk="<?php echo $adviceId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-advice-todos">
  More Todos
 </a>
<?php endif; ?>

