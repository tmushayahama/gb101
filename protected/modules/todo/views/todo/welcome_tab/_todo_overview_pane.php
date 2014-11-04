<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-box-1">
  <div class="row gb-background-white">
    <div class="btn-group col-lg-2 col-sm-2 col-xs-2 gb-no-padding">
      <button type="button" class="btn btn-default btn-lg dropdown-toggle gb-no-padding" data-toggle="dropdown">
        <div class="row gb-no-padding gb-no-margin">
          <i class="glyphicon glyphicon-play text-warning"></i>
          <div class="gb-no-padding text-center">
            <h6>In Progress</h6>
          </div>
        </div>
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li class="gb-dropdown-list">
          <a class="gb-dropdown-link" gb-form-target="#gb-skill-list-form">
            <div class="text-warning">
              <i class="glyphicon glyphicon-play"></i> In Progress
            </div>
          </a>
        </li>
        <li class="gb-dropdown-list text-warning">
          <a class="gb-dropdown-link text-warning" gb-form-target="#gb-skill-list-form">
            <div class="text-warning">
              <i class="glyphicon glyphicon-pause"></i> Paused
            </div>
          </a>
        </li>
        <li class="gb-dropdown-list">
          <a class="gb-dropdown-link text-success" gb-form-target="#gb-skill-list-form">
            <div class="text-success">
              <i class="glyphicon glyphicon-ok text-success"></i> Done
            </div>
          </a>
        </li>

        <li class="gb-dropdown-list text-danger">
          <a class="gb-dropdown-link" gb-form-target="#gb-skill-list-form">
            <div class="text-danger">
              <i class="glyphicon glyphicon-stop"></i> Stopped
            </div>
          </a>
        </li>
        <li class="divider"></li>
        <?php if ($todoParent->todo->creator_id == Yii::app()->user->id): ?>
          <li class="gb-dropdown-list row">  
            <button type="button" class="gb-edit-form-show btn btn-default col-lg-6 col-md-6 col-sm-6 col-xs-6"
                    gb-form-target="#gb-todo-todo-form">
              <i class="glyphicon glyphicon-edit"></i>
            </button> 
            <button type="button" class="gb-delete-me btn btn-danger col-lg-6 col-md-6 col-sm-6 col-xs-6" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></button>
          </li>
        <?php endif; ?>  

      </ul>
    </div>
    <div class="col-lg-10 col-sm-10 col-xs-10 gb-no-padding">
      <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
           <?php echo $todoParent->todo->description; ?>
      </p>
      <div class="row">
        <a class="btn btn-sm btn-link gb-form-show gb-no-padding"
           gb-is-child-form="1"
           gb-form-slide-target="<?php echo '#gb-todo-todo-child-form-container-' . $todoParent->id; ?>"
           gb-form-target="#gb-todo-todo-form"
           gb-form-parent-id-input="#gb-todo-todo-form-parent-todo-id-input"
           gb-form-heading="Add Todo Todo"
           gb-form-parent-id="<?php echo $todoParent->id; ?>">
          Add a Todo 
        </a>
      </div>
      <div id="<?php echo 'gb-todo-todo-child-form-container-' . $todoParent->id; ?>" class="row gb-panel-form gb-hide">

      </div>
    </div>
    <div class="row gb-panel-form gb-hide">
    </div>
  </div>
</div>
<br>
<div class="row">      
  <h4 class="gb-heading-2">
    Skill Todos (<?php echo $todoListChildrenCount; ?>)
    <span class="pull-right btn btn-sm btn-primary">
      <i class="glyphicon glyphicon-plus"></i> Add
    </span>
  </h4>
  <?php foreach ($todoListChildren as $todoListChild): ?>
    <div class = "row">
      <?php
      $this->renderPartial('skill.views.skill.activity._skill_todo_child_list_item', array(
       "skillTodoChild" => $todoListChild,
      ));
      ?>        
    </div>
  <?php endforeach; ?>
</div>
<br>

