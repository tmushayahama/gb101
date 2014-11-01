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
  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 gb-no-padding">
    <?php echo $skillTodoParent->todo->description; ?>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 gb-no-padding">
    In Progress
  </div>
</div>
<br>
<div class="row">      
  <h4 class="gb-heading-2">
    Skill SubTodos
    <span class="pull-right badge badge-info"><?php echo $skillTodoChildrenCount; ?></span>
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

