<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$skillTodoChildren = SkillTodo::getSkillChildrenTodos($skillTodoParent->id, 7);
$skillTodoChildrenCount = SkillTodo::getSkillChildrenTodosCount($skillTodoParent->id);
?>
<div class="row gb-box-1">
  <div class="row">
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 ">
      <?php echo $skillTodoParent->todo->description; ?>
    </div>
    <button type="button" class="btn btn-default btn-lg dropdown-toggle col-lg-1 col-sm-1 col-xs-2 " data-toggle="dropdown">
      <div class="row  gb-no-margin">
        <i class="glyphicon glyphicon-play text-warning"></i>
        <div class=" gb-tiny-text text-center">
          In Progress
        </div>
      </div>
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li class="gb-dropdown-list">
        <a class="gb-dropdown-link" data-gb-target="#gb-skill-form">
          <div class="text-warning">
            <i class="glyphicon glyphicon-play"></i> In Progress
          </div>
        </a>
      </li>
      <li class="gb-dropdown-list text-warning">
        <a class="gb-dropdown-link text-warning" data-gb-target="#gb-skill-form">
          <div class="text-warning">
            <i class="glyphicon glyphicon-pause"></i> Paused
          </div>
        </a>
      </li>
      <li class="gb-dropdown-list">
        <a class="gb-dropdown-link text-success" data-gb-target="#gb-skill-form">
          <div class="text-success">
            <i class="glyphicon glyphicon-ok text-success"></i> Done
          </div>
        </a>
      </li>

      <li class="gb-dropdown-list text-danger">
        <a class="gb-dropdown-link" data-gb-target="#gb-skill-form">
          <div class="text-danger">
            <i class="glyphicon glyphicon-stop"></i> Stopped
          </div>
        </a>
      </li>
      <li class="divider"></li>
      <?php if ($skillTodoParent->todo->creator_id == Yii::app()->user->id): ?>
        <li class="gb-dropdown-list row">  
          <button type="button" class="gb-edit-form-show btn btn-default col-lg-6 col-md-6 col-sm-6 col-xs-6"
                  data-gb-target="#gb-todo-todo-form">
            <i class="glyphicon glyphicon-edit"></i>
          </button> 
          <button type="button" class="gb-delete-me btn btn-danger col-lg-6 col-md-6 col-sm-6 col-xs-6" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></button>
        </li>
      <?php endif; ?>  
    </ul>
  </div>
</div>
<br>
<div class="row">      
  <h4 class="gb-heading-2">
    Skill Todos (<?php echo $skillTodoChildrenCount; ?>)
    <span class="pull-right btn btn-sm btn-primary">
      <i class="glyphicon glyphicon-plus"></i> Add
    </span>
  </h4>
  <?php foreach ($skillTodoChildren as $skillTodoChild): ?>
    <div class = "row">
      <?php
      $this->renderPartial('skill.views.skill.activity._skill_todo_child_list_item', array(
       "skillTodoChild" => $skillTodoChild,
      ));
      ?>        
    </div>
  <?php endforeach; ?>
</div>