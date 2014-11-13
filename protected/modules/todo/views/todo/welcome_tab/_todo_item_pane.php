<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-box-3 gb-background-white">
  <?php
  $this->renderPartial('todo.views.todo.activity.todo._todo_item_row', array(
   "todoChild" => $todoChild,
  ));
  ?>
</div>
<div class="row gb-box-3">  
  <div class="row">
    <h5 class="gb-heading-4 col-lg-4 col-sm-5 col-xs-12">
      Todo Progress
      <span class="pull-right">
        <small><?php echo '0%' ?></small>
      </span>
    </h5> 
  </div>
  <div class="progress gb-progress-bar">
    <div class="progress-bar progress-bar-info progress-bar-striped col-lg-12 col-sm-12 col-xs-12" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
    </div>
  </div>
</div>

<div class="row gb-box-3">   
  <div class="row">
    <h5 class="gb-heading-4 col-lg-4 col-sm-5 col-xs-12">
      Checklists
      <span class="pull-right">
        <small><?php echo '0/0' ?></small>
      </span>
    </h5> 
  </div>
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
       gb-is-child-form="0"
       gb-form-target="#gb-todo-checklist-form"
       gb-add-url="<?php echo Yii::app()->createUrl("todo/todo/addTodoChecklist", array("todoId" => $todoChild->id)); ?>"
       gb-form-description-input="#gb-todo-checklist-form-description-input">
    <textarea class="form-control"
              placeholder="Add a Checklist"
              rows="1"></textarea>
    <div class="input-group-btn">
      <div class="input-group-btn">
        <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i></button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Assign</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>
  </div>
  <div id="gb-checklist">
    <?php
    if ($todoChecklistsCount == 0):
      ?>
      <h5 class="text-center text-warning gb-no-information row">
        no checklist(s) added.
      </h5>
    <?php endif; ?>

    <div class="row gb-background-white">
      <?php foreach ($todoChecklists as $todoChecklistParent): ?>
        <?php
        $this->renderPartial('todo.views.todo.activity.checklist._todo_checklist_parent_list_item', array(
         "todoChecklistParent" => $todoChecklistParent,
        ));
        ?>
      <?php endforeach; ?>    
    </div>
  </div>
</div>
<div class="row gb-box-3">   
  <div class="row">
    <h5 class="gb-heading-4 col-lg-4 col-sm-5 col-xs-12">
      Contributors
      <span class="pull-right">
        <small><?php echo '0' ?></small>
      </span>
    </h5> 
  </div> 
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
       gb-is-child-form="0"
       gb-form-target="#gb-contributor-form"
       gb-add-url="<?php echo Yii::app()->createUrl("todo/todo/addTodoNote", array("todoId" => $todoChild->id)); ?>"
       gb-submit-prepend-to="#gb-todo-notes"
       gb-form-description-input="#gb-note-form-description-input">
    <div class="input-group-btn">
        <button type="button" class="col-lg-6 col-sm-6 col-xs-6 btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i> Add an Observer</button>
        <button type="button" class="col-lg-6 col-sm-6 col-xs-6 btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i> Add a Judge</button>
       
      </div>
  </div>
  <div id="gb-todo-notes">
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
<div class="row gb-box-3">  
  <div class="row">
    <h5 class="gb-heading-4 col-lg-4 col-sm-5 col-xs-12">
      Comments
      <span class="pull-right">
        <small><?php echo '0' ?></small>
      </span>
    </h5> 
  </div>
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
       gb-is-child-form="0"
       gb-form-target="#gb-comment-form"
       gb-add-url="<?php echo Yii::app()->createUrl("todo/todo/addTodoComment", array("todoId" => $todoChild->id)); ?>"
       gb-submit-prepend-to="#gb-todo-comments"
       gb-form-description-input="#gb-comment-form-description-input">
    <textarea class="form-control"
              placeholder="Add a Comment"
              rows="1"></textarea>
    <div class="input-group-btn">
      <div class="input-group-btn">
        <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i></button>
      </div><!-- /btn-group -->
    </div>
  </div>
  <div id="gb-todo-comments">
    <?php
    if ($todoCommentsCount == 0):
      ?>
      <h5 class="text-center text-warning gb-no-information row">
        no comment(s) added.
      </h5>
    <?php endif; ?>

    <?php foreach ($todoComments as $todoCommentParent): ?>
      <?php
      $this->renderPartial('todo.views.todo.activity.comment._todo_comment_parent_list_item', array(
       "todoCommentParent" => $todoCommentParent,
      ));
      ?>
    <?php endforeach; ?>    
  </div>
</div>
<div class="row gb-box-3">   
  <div class="row">
    <h5 class="gb-heading-4 col-lg-4 col-sm-5 col-xs-12">
      Notes
      <span class="pull-right">
        <small><?php echo '0' ?></small>
      </span>
    </h5> 
  </div> 
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
       gb-is-child-form="0"
       gb-form-target="#gb-note-form"
       gb-add-url="<?php echo Yii::app()->createUrl("todo/todo/addTodoNote", array("todoId" => $todoChild->id)); ?>"
       gb-submit-prepend-to="#gb-todo-notes"
       gb-form-description-input="#gb-note-form-description-input">
    <textarea class="form-control"
              placeholder="Add a Note"
              rows="1"></textarea>
    <div class="input-group-btn">
      <div class="input-group-btn">
        <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i></button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Assign</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>
  </div>
  <div id="gb-todo-notes">
    <?php
    if ($todoNotesCount == 0):
      ?>
      <h5 class="text-center text-warning gb-no-information row">
        no note(s) added.
      </h5>
    <?php endif; ?>

    <?php foreach ($todoNotes as $todoNoteParent): ?>
      <?php
      $this->renderPartial('todo.views.todo.activity.note._todo_note_parent_list_item', array(
       "todoNoteParent" => $todoNoteParent,
      ));
      ?>
    <?php endforeach; ?>    
  </div>
</div>
<div class="row gb-box-3">  
  <div class="row">
    <h5 class="gb-heading-4 col-lg-4 col-sm-5 col-xs-12">
      Files
      <span class="pull-right">
        <small><?php echo '0' ?></small>
      </span>
    </h5> 
  </div>
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
       gb-is-child-form="1"
       gb-form-target="#gb-todo-todo-form"
       gb-form-parent-id-input="#gb-todo-todo-form-parent-todo-id-input"
       gb-form-description-input="#gb-skill-todo-form-description-input"
       gb-form-parent-id="<?php echo $todoChild->id; ?>">
    <textarea class="form-control"
              placeholder="File Path"
              rows="1"></textarea>
    <div class="input-group-btn">
      <div class="input-group-btn">
        <button type="button" class="gb-form-middleman-submit btn btn-default">Browse</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Assign</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>
  </div>
</div>
<br>

