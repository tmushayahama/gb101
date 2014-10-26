<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-todo-question-answer-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-question-answers">
  <?php
  if (count($todoQuestionAnswerParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no questions added.
    </h5>
  <?php endif; ?>

  <?php foreach ($todoQuestionAnswerParentList as $todoQuestionAnswerParent): ?>
    <?php
    $this->renderPartial('todo.views.todo.activity._todo_question_answer_parent_list_item', array(
     "todoQuestionAnswerParent" => $todoQuestionAnswerParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

