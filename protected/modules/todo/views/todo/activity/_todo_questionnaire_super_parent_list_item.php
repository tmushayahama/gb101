<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-questionnaire panel panel-default row" todo-question-answer-id="<?php echo $todoQuestionnaireParent->id; ?>">
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-super-parent-box-heading row">
        <div class="col-lg-10 col-sm-10 col-xs-10 gb-no-padding">
          <p class="col-lg-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">
            <?php echo $todoQuestionnaireParent->description; ?>
          </p>
        </div>
        <div class="btn-group pull-right">
          <a class="btn btn-sm btn-primary gb-form-show"
             gb-is-child-form="1"
             gb-form-status="<?php echo QuestionAnswer::$STATUS_QUESTIONNAIRE; ?>"
             gb-form-status-id-input="#gb-todo-question-answer-form-status-input"
             gb-form-slide-target="<?php echo '#gb-todo-questionnaire-parent-form-container-' . $todoQuestionnaireParent->id; ?>"
             gb-form-target="#gb-todo-question-answer-form"
             gb-form-parent-id-input="#gb-todo-question-answer-form-parent-question-answer-id-input"
             gb-form-heading="<?php echo $todoQuestionnaireParent->description; ?>"
             gb-form-parent-id="<?php echo $todoQuestionnaireParent->id; ?>"
             gb-submit-prepend-to="<?php echo '#gb-questionnaire-' . $todoQuestionnaireParent->id; ?>">
            <i class="glyphicon glyphicon-plus"></i>
            Add
          </a>        
        </div>
      </h5>
    </div>
    <div id="<?php echo 'gb-todo-questionnaire-parent-form-container-' . $todoQuestionnaireParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>

    <div id="<?php echo 'gb-questionnaire-' . $todoQuestionnaireParent->id; ?>">
      <?php
      $todoQuestionAnswerParentList = TodoQuestionAnswer::getTodoParentQuestionAnswers($todoListItem->id, $todoQuestionnaireParent->id);
      if (count($todoQuestionAnswerParentList) == 0):
        ?>
        <h5 class="text-center text-warning gb-no-information row">
          no questions added.
        </h5>
      <?php endif; ?>

      <?php
      $questionnaireAnswerCount = 0;
      foreach ($todoQuestionAnswerParentList as $todoQuestionAnswerParent):
        ?>
        <?php
        $this->renderPartial('todo.views.todo.activity._todo_questionnaire_parent_list_item', array(
         'todoQuestionAnswerParent' => $todoQuestionAnswerParent,
       ));
        ?>
      <?php endforeach; ?>
    </div>
  </div> 
</div>

