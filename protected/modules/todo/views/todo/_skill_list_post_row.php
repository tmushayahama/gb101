<?php

/* @var $this TodoListItemController */
/* @var $model TodoCommitment */
/* @var $form CActiveForm */
?>
<?php
switch (TodoList::getTodoViewType($todoListItem)) {
  
  case TodoList::$SKILL_OWNER_GAINED:
    echo $this->renderPartial('todo.views.todo.todo_row_views._skill_gained', array(
     'todoListItem' => $todoListItem,
     'source'=>$source));
    break;
  case TodoList::$SKILL_OWNER_TO_IMPROVE:
    echo $this->renderPartial('todo.views.todo.todo_row_views._creator_to_improve', array(
     'todoListItem' => $todoListItem,
     'source'=>$source));
    break;
  case TodoList::$SKILL_OWNER_TO_LEARN:
    echo $this->renderPartial('todo.views.todo.todo_row_views._creator_to_learn', array(
     'todoListItem' => $todoListItem,
     'source'=>$source));
    break;
  case TodoList::$SKILL_OWNER_OF_INTEREST:
    echo $this->renderPartial('todo.views.todo.todo_row_views._creator_of_interest', array(
     'todoListItem' => $todoListItem,
     'source'=>$source));
    break;
  case TodoList::$SKILL_IS_FRIEND_GAINED:
    echo $this->renderPartial('todo.views.todo.todo_row_views._friend_gained', array(
     'todoListItem' => $todoListItem,
     'source'=>$source));
    break;
  case TodoList::$SKILL_IS_FRIEND_TO_IMPROVE:
    echo $this->renderPartial('todo.views.todo.todo_row_views._friend_to_improve', array(
     'todoListItem' => $todoListItem,
     'source'=>$source));
    break;
  case TodoList::$SKILL_IS_FRIEND_TO_LEARN:
    echo $this->renderPartial('todo.views.todo.todo_row_views._friend_to_learn', array(
     'todoListItem' => $todoListItem,
     'source'=>$source));
    break;
  case TodoList::$SKILL_IS_FRIEND_OF_INTEREST:
    echo $this->renderPartial('todo.views.todo.todo_row_views._friend_of_interest', array(
     'todoListItem' => $todoListItem,
     'source'=>$source));
    break;
}
?>
