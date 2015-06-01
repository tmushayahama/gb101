<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-block gb-block-row gb-block-row-todolist"
     data-gb-source-pk="<?php echo $todo->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_TODO; ?>"
     data-gb-del-message-key="TODO_LIST">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h6 class="gb-number"><?php echo $todoCounter; ?></h6>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 gb-padding-none">
  <div class="row gb-row-display ">
   <div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">
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
  </div>
 </div>
</div>