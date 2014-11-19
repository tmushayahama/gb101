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
        <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus"></i></button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Assign</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>
  </div>
  <br>
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

