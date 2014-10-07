<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-todo-list-item panel panel-default row gb-background-light-grey-1" skill-todo-id="<?php echo $skillTodoParent->id; ?>"
     gb-source-pk-id="<?php echo $skillTodoParent->todo_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 panel panel-default gb-no-padding gb-no-margin gb-discussion-title-side-border">
    <div class="panel-body gb-padding-thin">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-11 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-todo-form-title-input"><?php echo $skillTodoParent->todo->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-todo-form-description-input"><?php echo $skillTodoParent->todo->description; ?></span>
          </p>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 gb-padding-thinnest">
          <p>
            <span class="gb-display-attribute" gb-control-target="#gb-skill-todo-form-priority-id-input" gb-option-id="<?php echo $skillTodoParent->todo->priority_id; ?>"><?php echo $skillTodoParent->todo->priority->name; ?> </span>
          </p>
        </div>
      </div>
    </div>
    <div class="panel-footer gb-no-padding">
      <div class="row gb-padding-left-1">
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillTodoParent->todo->assigner->profile->avatar_url; ?>" class="gb-img-sm img-polariod pull-left" alt="">
        <div class="btn btn-sm pull-left">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillTodoParent->todo->assigner_id)); ?>"><i><?php echo $skillTodoParent->todo->assigner->profile->firstname . " " . $skillTodoParent->todo->assigner->profile->lastname ?></i></a></div>
        <div class="btn-group pull-right">
          <?php if ($skillTodoParent->todo->assigner_id == Yii::app()->user->id): ?>
            <a class="gb-edit-form-show btn btn-sm btn-link"
               gb-form-target="#gb-skill-todo-form">
              <i class="glyphicon glyphicon-edit"></i>
            </a> 
            <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          <?php endif; ?>
        </div> 
      </div>
    </div> 
  </div>
  <div class="row">
    <a class="btn btn-xs gb-btn-2 gb-form-show gb-form-for-child"
       gb-form-slide-target="<?php echo '#gb-skill-todo-child-form-container-' . $skillTodoParent->id; ?>"
       gb-form-target="#gb-skill-todo-form">
      <i class="glyphicon glyphicon-plus"></i>
      Add a Todo 
    </a>
    <div id="<?php echo 'gb-skill-todo-child-form-container-' . $skillTodoParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
  </div>
</div>

<div id="gb-todo-children">
  <?php
  $skillChildrenTodos = SkillTodo::getSkillChildrenTodos($skillTodoParent->id);
  if (count($skillChildrenTodos) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no todo(s) added.
    </h5>
  <?php endif; ?>

  <?php foreach ($skillChildrenTodos as $skillChildTodo): ?>
    <?php
    $this->renderPartial('skill.views.skill.activity._skill_todo_child_list_item', array(
     "skillChildTodo" => $skillChildTodo)
    );
    ?>
  <?php endforeach; ?>    
</div>



