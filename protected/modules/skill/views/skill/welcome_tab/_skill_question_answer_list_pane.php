<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-skill-question-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-questions">
  <?php
  if (count($skillQuestionParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no questions added.
    </h5>
  <?php endif; ?>

  <?php foreach ($skillQuestionParentList as $skillQuestionParent): ?>
    <?php
    $this->renderPartial('skill.views.skill.activity._skill_question_parent_list_item', array(
     "skillQuestionParent" => $skillQuestionParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

