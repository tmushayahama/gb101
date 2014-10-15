<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3 class="gb-heading-2">Skill Weblink List
  <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
     gb-form-slide-target="#gb-skill-weblink-form-container"
     gb-form-target="#gb-skill-weblink-form"
     gb-form-heading="Create Skill Weblink List">
    <i class="glyphicon glyphicon-plus"></i>
    Add
  </a>
</h3>
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

