<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3 class="gb-heading-2">External Links
  <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
     gb-form-slide-target="#gb-skill-weblink-form-container"
     gb-form-target="#gb-skill-weblink-form">
    <i class="glyphicon glyphicon-plus"></i>
    Add
  </a>
</h3>
<div class="panel-body gb-padding-thin">
  <div id="gb-skill-weblink-form-container" class="row gb-panel-form gb-hide">
    <?php
    echo $this->renderPartial('skill.views.skill.forms._skill_weblink_form', array(
     'weblinkModel' => $weblinkModel,
     "skillId" => $skill->id,
    ));
    ?>
  </div>
  <?php $skillWeblinks = SkillWeblink::getSkillWeblinks($skill->id, true); ?>
  <div id="gb-weblinks" class="row">
    <?php if (count($skillWeblinks) == 0): ?>
      <h5 class="text-center text-warning gb-no-information row">
        no external link(s) added.
      </h5>
    <?php endif; ?>
    <?php foreach ($skillWeblinks as $skillWeblink): ?>
      <?php
      echo $this->renderPartial('skill.views.skill.activity._skill_weblink_list_item', array(
       'skillWeblinkModel' => $skillWeblink));
      ?>
    <?php endforeach; ?>
  </div>
</div>

