<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-box-3">   
  <div class="row">
    <h5 class="gb-heading-4 gb-heading-4-btn col-lg-4 col-sm-5 col-xs-12 gb-margin-left-neg-thick">
      Contributors
      <span class="pull-right">
        <small><?php echo '0' ?></small>
      </span>
    </h5> 
  </div> 
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
       gb-is-child-form="0"
       data-gb-target="#gb-contributor-form"
       data-gb-url="<?php echo Yii::app()->createUrl("todo/todo/addTodoNote", array("todoId" => $todoChild->id)); ?>"
       data-gb-prepend-to="#gb-contributors"
       gb-form-description-input="#gb-note-form-description-input">
    <div class="input-group-btn">
      <a class="btn btn-default gb-backdrop-visible gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show col-lg-6 col-md-6 col-sm-6 col-xs-6"
         gb-type="<?php echo Type::$SOURCE_OBSERVER_REQUESTS; ?>" 
         gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
         gb-target-modal="#gb-send-request-modal"
         gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
         gb-single-target-display=".gb-display-assign-to"
         gb-single-target-display-input="#gb-request-form-recipient-id-input"
         data-gb-source-pk="<?php echo $todoChild->id; ?>" 
         data-gb-source="<?php echo Type::$SOURCE_OBSERVER_REQUESTS; ?>"
         data-gb-target-container="#gb-todo-contributor-request-form-container"
         data-gb-target="#gb-request-form"
         data-gb-prepend-to="#gb-skill-observers"
         gb-request-title="<?php echo "Todo Observer" ?>"
         gb-request-title-placeholder="Purpose Skill">
        <i class="gb-no-margin glyphicon glyphicon-plus"></i> 
        Add Observer(s)</a>
      <button type="button" class="col-lg-6 col-sm-6 col-xs-6 btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus"></i> Add Judge(s)</button>

    </div>
  </div>
  <div id="gb-todo-contributor-request-form-container" class="row gb-hide gb-panel-form">

  </div>
  <br>
  <div id="gb-contributors">
    <?php
    if ($todoContributorsCount == 0):
      ?>
      <h5 class="text-center text-warning gb-no-information row">
        noone yet has contributed to this to-do.
      </h5>
    <?php endif; ?>

    <?php foreach ($todoContributors as $todoContributor): ?>
      <?php
      $this->renderPartial('todo.views.todo.activity.note._todo_note_parent_list_item', array(
       "todoNoteParent" => $todoNoteParent,
      ));
      ?>
    <?php endforeach; ?>    
  </div>
</div>
