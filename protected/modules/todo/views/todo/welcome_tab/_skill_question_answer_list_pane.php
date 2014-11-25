<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-todo-question-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-questions">
  <?php
  if (count($todoquestionParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no questions added.
    </h5>
  <?php endif; ?>

  <?php foreach ($todoquestionParentList as $todoquestionParent): ?>
    <?php
    $this->renderPartial('todo.views.todo.activity._todo_question_parent_list_item', array(
     "todoquestionParent" => $todoquestionParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

