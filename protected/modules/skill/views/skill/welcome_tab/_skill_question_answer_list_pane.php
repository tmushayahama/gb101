<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3 class="gb-heading-2">Skill Questions
  <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
     gb-form-slide-target="#gb-skill-question-answer-form-container"
     gb-form-target="#gb-skill-question-answer-form"
     gb-form-heading="Create Skill Question Answer List">
    <i class="glyphicon glyphicon-plus"></i>
    Add
  </a>
</h3>
<div id="gb-skill-question-answer-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-question-answers">
  <?php
  if (count($skillQuestionAnswerParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no questions added.
    </h5>
  <?php endif; ?>

  <?php foreach ($skillQuestionAnswerParentList as $skillQuestionAnswerParent): ?>
    <?php
    $this->renderPartial('skill.views.skill.activity._skill_question_answer_parent_list_item', array(
     "skillQuestionAnswerParent" => $skillQuestionAnswerParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

