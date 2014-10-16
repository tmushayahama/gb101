<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-skill-weblink-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-weblinks">
  <?php
  if (count($skillWeblinkParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no weblink(s) added.
    </h5>
  <?php endif; ?>

  <?php foreach ($skillWeblinkParentList as $skillWeblinkParent): ?>
    <?php
    $this->renderPartial('skill.views.skill.activity._skill_weblink_parent_list_item', array(
     "skillWeblinkParent" => $skillWeblinkParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

