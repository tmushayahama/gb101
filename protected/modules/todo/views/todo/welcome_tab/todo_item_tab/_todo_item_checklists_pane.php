<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-box-3">   
  <div class="row">
    <h5 class="gb-heading-4 col-lg-4 col-sm-5 col-xs-12 gb-margin-left-neg-thick">
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
        <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus"></i></button>
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

