<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-skill-comment-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-comments">
  <?php
  if (count($skillCommentParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no comment(s) added.
    </h5>
  <?php endif; ?>

  <?php foreach ($skillCommentParentList as $skillCommentParent): ?>
    <?php
    $this->renderPartial('skill.views.skill.activity._skill_comment_parent_list_item', array(
     "skillCommentParent" => $skillCommentParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

