<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3 class="gb-heading-2">Ask Answer    
  <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
     gb-form-slide-target="#gb-ask-question-form-container"
     gb-form-target="#gb-ask-question-form">
    <i class="glyphicon glyphicon-plus"></i>
    Add
  </a>
</h3>
<div class="row">
  <div id="gb-ask-question-form-container" class="row gb-panel-form gb-hide">
<?php
$this->renderPartial('skill.views.skill.forms._skill_ask_question_form', array(
 'formType' => SkillType::$FORM_TYPE_MENTORSHIP_MENTORSHIP,
 "questionModel" => $questionModel,
 'skillId' => $skill->id
));
?>
  </div>
    <?php $skillQuestions = SkillQuestion::getSkillQuestions($skill->id); ?>
  <div id="gb-questions" class="row">
  <?php if (count($skillQuestions) == 0): ?>
      <h5 class="text-center text-warning gb-no-information row">
        no question(s) added.
      </h5>
<?php endif; ?>
    <?php foreach ($skillQuestions as $skillQuestion): ?>
      <?php
      $this->renderPartial('skill.views.skill.activity._skill_ask_question_list_item', array(
       'skillQuestion' => $skillQuestion,
       'skillId' => $skill->id,
      ));
      ?>
    <?php endforeach; ?>
  </div>
</div>
