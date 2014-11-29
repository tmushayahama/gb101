<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-comment-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-comments">
  <?php
  if (count($todoCommentParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no comment(s) added.
    </h5>
  <?php endif; ?>

  <?php foreach ($todoCommentParentList as $todoCommentParent): ?>
    <?php
    $this->renderPartial('todo.views.todo.activity._todo_comment_parent', array(
     "todoCommentParent" => $todoCommentParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

