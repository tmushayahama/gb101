<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-post-entry gb-post-entry-row gb-post-entry-row-todolist"
     data-gb-source-pk="<?php echo $todo->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_TODO; ?>"
     data-gb-del-message-key="TODO_LIST">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h6 class="gb-number"><?php echo $todoCounter; ?></h6>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 gb-no-padding">
  <div class="row gb-row-display ">
   <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
     <h5 class="gb-heading row">
      <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $todo->creator_id)); ?>"
         class="col-lg-11 col-sm-11 col-xs-11">
       <p class="gb-ellipsis gb-display-attribute"
          data-gb-control-target="#gb-todo-form-description-input">
           <?php echo $todo->description; ?>
       </p>
      </a>
      <div class="btn-group pull-right">
       <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-chevron-down"></i>
       </button>
       <ul class="dropdown-menu" role="menu">
        <li>
         <a class="gb-edit-form-show">
          <i class="glyphicon glyphicon-edit"></i> edit
         </a>
        </li>
        <li>
         <a class="gb-delete-me" data-gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">
          <i class="glyphicon glyphicon-trash"></i> delete
         </a>
        </li>
       </ul>
      </div>
     </h5>
     <div class="row gb-panel-form gb-hide">
      <div class="row">
       <?php
       $this->renderPartial('todo.views.todo.forms._todo_form_edit', array(
         "formId" => "gb-todo-form-edit-" . $todo->id,
         "todoModel" => $todo,
         "todoPriorities" => $todoPriorities
       ));
       ?>
      </div>
     </div>
    </div>
   </div>
   <div class="gb-more-info gb-padding-left-3">
    <div class="col-lg-6 col-sm-6 col-xs-12 gb-padding-thinner">
     <h5 class="gb-heading-2">
      Created By
     </h5>
     <?php
     $this->renderPartial('user.views.user.badges._user_badge_with_time', array(
       "person" => $todo->creator,
       "personDate" => $todo->created_date,
       "personCounter" => 1)
     );
     ?>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-12 gb-padding-thinner">
     <h5 class="gb-heading-2">
      Assigned To
     </h5>
     <a class="btn btn-default col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <i class="glyphicon glyphicon-plus-sign"></i> Assign
     </a>
     <?php
     $personCounter = 1;
     $this->renderPartial('user.views.user.badges._user_badge_with_time', array(
       "person" => $todo->creator,
       "personDate" => $todo->created_date,
       "personCounter" => $personCounter++)
     );
     $this->renderPartial('user.views.user.badges._user_badge_with_time', array(
       "person" => $todo->creator,
       "personDate" => $todo->created_date,
       "personCounter" => $personCounter++)
     );
     ?>
    </div>
   </div>
   <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12 gb-no-padding"
        gb-is-child-form="1"
        data-gb-target="#gb-todo-form"
        gb-form-parent-id-input="#gb-todo-form-parent-id-input"
        gb-form-parent-id="<?php echo $todo->id; ?>"
        data-gb-url="<?php echo Yii::app()->createUrl("todo/todo/addTodoReply", array()); ?>"
        data-gb-prepend-to="<?php echo "#gb-skill-todos-reply-" . $todo->id; ?>"
        gb-form-description-input="#gb-todo-form-description-input">
    <textarea class="form-control"
              placeholder="Add a To-do"
              rows="1"></textarea>
    <div class="input-group-btn">
     <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus"></i></button>
    </div><!-- /btn-group -->
   </div>
   <div id="<?php echo "gb-skill-todos-reply-" . $todo->id; ?>" class="row">
    <?php
    $todoChildren = Todo::getChildrenTodos($todo->id);
    $todoChildCounter = 1;
    ?>
    <?php foreach ($todoChildren as $todoChild): ?>
     <?php
     $this->renderPartial('todo.views.todo.activity._todo_child', array(
       "todoChild" => $todoChild,
       "todoChildCounter" => $todoChildCounter++)
     );
     ?>
    <?php endforeach; ?>
   </div>
  </div>
 </div>
</div>