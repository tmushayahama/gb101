<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-parent-box row" todo-question-answer-id="<?php echo $todoQuestionAnswerParent->id; ?>"
     gb-source-pk-id="<?php echo $todoQuestionAnswerParent->question_answer_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-todo-question-answer-form-title-input"><?php echo $todoQuestionAnswerParent->questionAnswer->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-todo-question-answer-form-description-input"><?php echo $todoQuestionAnswerParent->questionAnswer->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left gb-disabled-1">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           gb-form-status="<?php echo QuestionAnswer::$STATUS_QUESTIONNAIRE; ?>"
           gb-form-status-id-input="#gb-todo-question-answer-form-status-input"
           gb-form-target="#gb-todo-question-answer-form"
           gb-form-slide-target="<?php echo '#gb-todo-questionnaire-child-form-container-' . $todoQuestionAnswerParent->id; ?>"
           gb-form-parent-id-input="#gb-todo-question-answer-form-parent-question-answer-id-input"
           gb-form-heading="Add Todo QuestionAnswer"
           gb-form-parent-id="<?php echo $todoQuestionAnswerParent->question_answer_id; ?>">
          Comment
        </a>        
      </div>
      <div class="btn-group pull-right">
        <?php if ($todoQuestionAnswerParent->questionAnswer->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-sm btn-link"
             gb-form-target="#gb-todo-question-answer-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <div id="<?php echo 'gb-todo-questionnaire-child-form-container-' . $todoQuestionAnswerParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div id="gb-question-answer-children" class="row gb-hide">
      <?php
      $todoQuestionAnswerChildren = TodoQuestionAnswer::getTodoChildrenQuestionAnswers($todoQuestionAnswerParent->question_answer_id);
      ?>

      <?php foreach ($todoQuestionAnswerChildren as $todoQuestionAnswerChild): ?>
        <?php
        $this->renderPartial('todo.views.todo.activity._todo_questionnaire_child_list_item', array(
         "todoQuestionAnswerChild" => $todoQuestionAnswerChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

