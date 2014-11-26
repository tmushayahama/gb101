<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
  <?php foreach ($skillOverviewQuestionnaires as $skillQuestionnaireParent): ?>
    <?php
    $this->renderPartial('skill.views.skill.activity.question._skill_questionnaire_super_parent_list_item', array(
     "skill" => $skill,
     "skillQuestionnaireParent" => $skillQuestionnaireParent)
    );
    ?>
  <?php endforeach; ?>   
</div>
<br>

