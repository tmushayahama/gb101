<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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
    $this->renderPartial('skill.views.skill.activity._skill_parent_todo_list_item', array(
     "skillTodoParent" => $skillTodoParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

