<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-question-answer-list-item panel panel-default row gb-discussion-title-side-border" todo-question-answer-id="<?php echo $todoQuestionAnswerParent->id; ?>"
     gb-source-pk-id="<?php echo $todoQuestionAnswerParent->question_answer_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $todoQuestionAnswerParent->questionAnswer->creator->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-11 col-sm-10 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-parent-box-heading">
        <span> 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $todoQuestionAnswerParent->questionAnswer->creator_id)); ?>">
            <?php echo $todoQuestionAnswerParent->questionAnswer->creator->profile->firstname . " " . $todoQuestionAnswerParent->questionAnswer->creator->profile->lastname ?>
          </a>
        </span>
        <span><i>Todo QuestionAnswer</i></span>
      </h5>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-todo-question-answer-form-title-input"><?php echo $todoQuestionAnswerParent->questionAnswer->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-todo-question-answer-form-description-input"><?php echo $todoQuestionAnswerParent->questionAnswer->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           gb-form-status="<?php echo QuestionAnswer::$STATUS_GENERAL; ?>"
           gb-form-status-id-input="#gb-todo-question-answer-form-status-input"
           gb-form-slide-target="<?php echo '#gb-todo-question-answer-child-form-container-' . $todoQuestionAnswerParent->id; ?>"
           gb-form-target="#gb-todo-question-answer-form"
           gb-form-parent-id-input="#gb-todo-question-answer-form-parent-question-answer-id-input"
           gb-form-heading="Add Todo QuestionAnswer"
           gb-form-parent-id="<?php echo $todoQuestionAnswerParent->id; ?>">
          <i class="glyphicon glyphicon-plus"></i>
          Reply
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
    <div id="<?php echo 'gb-todo-question-answer-child-form-container-' . $todoQuestionAnswerParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div>
      <?php
      $todoQuestionAnswerChildren = TodoQuestionAnswer::getTodoChildrenQuestionAnswers($todoQuestionAnswerParent->question_answer_id);
      ?>

      <?php foreach ($todoQuestionAnswerChildren as $todoQuestionAnswerChild): ?>
        <?php
        $this->renderPartial('todo.views.todo.activity._todo_question_answer_child_list_item', array(
         "todoQuestionAnswerChild" => $todoQuestionAnswerChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

