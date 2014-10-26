<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-todo-weblink-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-weblinks">
  <?php
  if (count($todoWeblinkParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no weblink(s) added.
    </h5>
  <?php endif; ?>

  <?php foreach ($todoWeblinkParentList as $todoWeblinkParent): ?>
    <?php
    $this->renderPartial('todo.views.todo.activity._todo_weblink_parent_list_item', array(
     "todoWeblinkParent" => $todoWeblinkParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

