<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
  <?php foreach ($todoOverviewQuestionnaires as $todoQuestionnaireParent): ?>
    <?php
    $this->renderPartial('todo.views.todo.activity._todo_questionnaire_super_parent_list_item', array(
     "todoListItem" => $todoListItem,
     "todoQuestionnaireParent" => $todoQuestionnaireParent)
    );
    ?>
  <?php endforeach; ?>   
</div>
<br>

