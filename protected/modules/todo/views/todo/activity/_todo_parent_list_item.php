<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li class="gb-post-entry gb-todo-list col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding" todo-todo-id="<?php echo $todoParent->id; ?>"
    gb-source-pk-id="<?php echo $todoParent->todo_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">
  <div href="#skill-management-welcome-pane" data-toggle="tab">
    <div class="row">
      <button type="button" class="btn btn-default btn-lg dropdown-toggle col-lg-1 col-sm-1 col-xs-2 gb-no-padding" data-toggle="dropdown">
        <div class="row gb-no-padding gb-no-margin">
          <i class="glyphicon glyphicon-play text-warning"></i>
          <div class="gb-no-padding gb-tiny-text text-center">
            In Progress
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
            <button class="gb-edit-form-show btn btn-default col-lg-6 col-md-6 col-sm-6 col-xs-6"
               gb-form-target="#gb-todo-todo-form">
              <i class="glyphicon glyphicon-edit"></i>
            </button> 
            <button class="gb-delete-me btn btn-danger col-lg-6 col-md-6 col-sm-6 col-xs-6" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></button>
          </li>
        <?php endif; ?>  

      </ul>
      <div class="col-lg-10 col-sm-10 col-xs-9 gb-no-padding">
        <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 pull-left gb-ellipsis"
           gb-control-target="#gb-todo-todo-form-description-input"><?php echo $todoParent->todo->description; ?>
        </p>
        <div class="gb-no-padding">
          <div class="row gb-padding-left-1">
            <div class="btn-group pull-left">
              <a class="btn btn-xs btn-link gb-form-show"
                 gb-is-child-form="1"
                 gb-form-slide-target="<?php echo '#gb-todo-todo-child-form-container-' . $todoParent->id; ?>"
                 gb-form-target="#gb-todo-todo-form"
                 gb-form-parent-id-input="#gb-todo-todo-form-parent-todo-id-input"
                 gb-form-heading="Add Todo Todo"
                 gb-form-parent-id="<?php echo $todoParent->id; ?>">
                Add a Todo 
              </a>
            </div>
            <div class="btn-group pull-right">
              <div class="btn-group pull-right">

              </div>
            </div> 
          </div>
        </div> 
        <div id="<?php echo 'gb-todo-todo-child-form-container-' . $todoParent->id; ?>" class="row gb-panel-form gb-hide">

        </div>
      </div>
      <div class="col-lg-1 col-sm-1 col-xs-2 gb-no-padding">

      </div>
    </div>
    <div class="row gb-panel-form gb-hide">
    </div>

  </div>
</li>

