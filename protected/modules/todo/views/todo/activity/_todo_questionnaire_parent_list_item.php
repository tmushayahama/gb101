<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-parent-box row" todo-question-id="<?php echo $todoquestionParent->id; ?>"
     gb-source-pk-id="<?php echo $todoquestionParent->question_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-todo-question-form-title-input"><?php echo $todoquestionParent->question->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-todo-question-form-description-input"><?php echo $todoquestionParent->question->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left gb-disabled-1">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           gb-form-status="<?php echo question::$STATUS_QUESTIONNAIRE; ?>"
           gb-form-status-id-input="#gb-todo-question-form-status-input"
           gb-form-target="#gb-todo-question-form"
           gb-form-slide-target="<?php echo '#gb-todo-questionnaire-child-form-container-' . $todoquestionParent->id; ?>"
           gb-form-parent-id-input="#gb-todo-question-form-parent-question-id-input"
           gb-form-heading="Add Todo question"
           gb-form-parent-id="<?php echo $todoquestionParent->question_id; ?>">
          Comment
        </a>        
      </div>
      <div class="btn-group pull-right">
        <?php if ($todoquestionParent->question->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-sm btn-link"
             gb-form-target="#gb-todo-question-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <div id="<?php echo 'gb-todo-questionnaire-child-form-container-' . $todoquestionParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div id="gb-question-children" class="row gb-hide">
      <?php
      $todoquestionChildren = Todoquestion::getTodoChildrenquestions($todoquestionParent->question_id);
      ?>

      <?php foreach ($todoquestionChildren as $todoquestionChild): ?>
        <?php
        $this->renderPartial('todo.views.todo.activity._todo_questionnaire_child_list_item', array(
         "todoquestionChild" => $todoquestionChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

