<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3 class="gb-heading-2">Discussions
  <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
     gb-form-slide-target="#gb-skill-discussion-title-form-container"
     gb-form-target="#gb-skill-discussion-title-form">
    <i class="glyphicon glyphicon-plus"></i>
    Add
  </a>
</h3>
<div id="gb-skill-discussion-title-form-container" class="row gb-panel-form gb-hide">
  <?php
  echo $this->renderPartial('skill.views.skill.forms._skill_discussion_title_form', array(
   "discussionTitleModel" => $discussionTitleModel,
   "skillId" => $skill->id,
  ));
  ?>
</div>
<?php $skillDiscussionTitles = SkillDiscussionTitle::getDiscussionTitles($skill->id, 5); ?>
<div id="gb-discussion-titles"  class="row">
  <?php if (count($skillDiscussionTitles) == 0): ?>
    <h5 class="text-center text-warning gb-no-information row">
      no discussion(s) added.
    </h5>
  <?php endif; ?>
  <?php foreach ($skillDiscussionTitles as $skillDiscussionTitle): ?>
    <?php
    $this->renderPartial('discussion.views.discussion._discussion_title', array(
     'discussionTitle' => $skillDiscussionTitle->discussionTitle,
     "skillId" => $skill->id));
    ?>
  <?php endforeach; ?>
</div>

