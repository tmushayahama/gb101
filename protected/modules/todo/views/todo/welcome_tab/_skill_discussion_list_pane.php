<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-todo-discussion-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-discussions">
  <?php
  if (count($todoDiscussionParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no discussion(s) added.
    </h5>
  <?php endif; ?>

  <?php foreach ($todoDiscussionParentList as $todoDiscussionParent): ?>
    <?php
    $this->renderPartial('todo.views.todo.activity._todo_discussion_parent_list_item', array(
     "todoDiscussionParent" => $todoDiscussionParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

