<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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

