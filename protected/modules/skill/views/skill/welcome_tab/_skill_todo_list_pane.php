<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3 class="gb-heading-2">Skill Todo List
  <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
     gb-form-slide-target="#gb-skill-todo-form-container"
     gb-form-target="#gb-skill-todo-form"
     gb-form-heading="Create Skill Todo List">
    <i class="glyphicon glyphicon-plus"></i>
    Add
  </a>
</h3>
<div id="gb-skill-todo-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-todos">
  <?php
  if (count($skillTodoParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no todo(s) added.
    </h5>
  <?php endif; ?>

  <?php foreach ($skillTodoParentList as $skillTodoParent): ?>
    <?php
    $this->renderPartial('skill.views.skill.activity._skill_todo_parent_list_item', array(
     "skillTodoParent" => $skillTodoParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

