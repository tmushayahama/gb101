<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-post-entry-row gb-post-entry-row-lg"
     data-gb-source-pk="<?php echo $todo->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_TODO; ?>"
     data-gb-del-message-key="TODO_LIST">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h6 class="gb-number"><?php echo $todoCounter; ?></h6>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 gb-no-padding">
  <div class="row gb-row-display ">
   <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $todo->creator->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
   </div>
   <div class="col-lg-11 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
     <h5 class="gb-heading">
      <span>
       <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $todo->creator_id)); ?>">
        <?php echo $todo->creator->profile->firstname . " " . $todo->creator->profile->lastname ?>
       </a>
      </span>
      <span><i class="gb-small-text"><?php echo date_format(date_create($todo->created_date), 'M jS \a\t g:ia'); ?></i></span>
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
     <div class="row gb-panel-form gb-form-middleman gb-hide gb-padding-left-2"
          data-gb-form-target="#gb-todo-form">
      <textarea data-gb-control-target="#gb-todo-form-description-input" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2">
      </textarea>
      <div class="row">
       <div class="pull-right btn-group">
        <a class="btn btn-default gb-edit-form-hide">Cancel</a>
        <a class="gb-form-middleman-edit-submit btn btn-primary">Edit</a>
       </div>
      </div>
     </div>
     <div class="row gb-panel-display gb-padding-left-2">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
       <p>
        <span class="gb-display-attribute" data-gb-control-target="#gb-todo-form-description-input">
         <?php echo $todo->description; ?></span>
       </p>
      </div>
     </div>
    </div>
   </div>
   <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12 gb-no-padding"
        gb-is-child-form="1"
        gb-form-target="#gb-todo-form"
        gb-form-parent-id-input="#gb-todo-form-parent-id-input"
        gb-form-parent-id="<?php echo $todo->id; ?>"
        gb-add-url="<?php echo Yii::app()->createUrl("todo/todo/addTodoReply", array()); ?>"
        gb-submit-prepend-to="<?php echo "#gb-skill-todos-reply-" . $todo->id; ?>"
        gb-form-description-input="#gb-todo-form-description-input">
    <textarea class="form-control"
              placeholder="Reply"
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