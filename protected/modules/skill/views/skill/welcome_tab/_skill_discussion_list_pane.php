<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-skill-discussion-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-discussions">
  <?php
  if (count($skillDiscussionParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no discussion(s) added.
    </h5>
  <?php endif; ?>

  <?php foreach ($skillDiscussionParentList as $skillDiscussionParent): ?>
    <?php
    $this->renderPartial('skill.views.skill.activity._skill_discussion_parent_list_item', array(
     "skillDiscussionParent" => $skillDiscussionParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

