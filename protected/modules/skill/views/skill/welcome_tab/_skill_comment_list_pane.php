<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3 class="gb-heading-2">Skill Comment List
  <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
     gb-form-slide-target="#gb-skill-comment-form-container"
     gb-form-target="#gb-skill-comment-form"
     gb-form-heading="Create Skill Comment List">
    <i class="glyphicon glyphicon-plus"></i>
    Add
  </a>
</h3>
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

