<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-todo-list row" todo-todo-id="<?php echo $todoTodoParent->id; ?>"
     gb-source-pk-id="<?php echo $todoTodoParent->todo_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 panel panel-default gb-no-padding gb-no-margin">
    <div class="panel-body gb-no-padding">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display">
        <h5 class="gb-parent-box row">
          <div class="col-lg-10 col-sm-10 col-xs-10 gb-no-padding">
            <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 pull-left gb-ellipsis"
               gb-control-target="#gb-todo-todo-form-description-input"><?php echo $todoTodoParent->todo->description; ?>
            </p>
          </div>
          <div class="btn-group pull-right">
            <?php if ($todoTodoParent->todo->creator_id == Yii::app()->user->id): ?>
              <a class="gb-edit-form-show btn btn-xs btn-default"
                 gb-form-target="#gb-todo-todo-form">
                <i class="glyphicon glyphicon-edit"></i>
              </a> 
              <a class="gb-delete-me btn btn-xs btn-default" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <?php endif; ?>       
          </div>
        </h5>
      </div>
    </div>
    <div class="panel-footer gb-no-padding">
      <div class="row gb-padding-left-1">
        <div class="btn-group pull-left">
          <a class="btn btn-sm btn-link gb-form-show"
             gb-is-child-form="1"
             gb-form-slide-target="<?php echo '#gb-todo-todo-child-form-container-' . $todoTodoParent->id; ?>"
             gb-form-target="#gb-todo-todo-form"
             gb-form-parent-id-input="#gb-todo-todo-form-parent-todo-id-input"
             gb-form-heading="Add Todo Todo"
             gb-form-parent-id="<?php echo $todoTodoParent->id; ?>">
            Add a Todo 
          </a>
        </div>
        <div class="btn-group pull-right">

        </div> 
      </div>
    </div> 
    <div id="<?php echo 'gb-todo-todo-child-form-container-' . $todoTodoParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div>
      <?php
      $todoTodoChildren = TodoTodo::getTodoChildrenTodos($todoTodoParent->id);
      if (count($todoTodoChildren) == 0):
        ?>
        <h5 class="text-center text-warning gb-no-information row">
          no todo(s) added.
        </h5>
      <?php endif; ?>

      <?php foreach ($todoTodoChildren as $todoTodoChild): ?>
        <?php
        $this->renderPartial('todo.views.todo.activity._todo_todo_child_list_item', array(
         "todoTodoChild" => $todoTodoChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>
<br>

