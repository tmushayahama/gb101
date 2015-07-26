<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-padding-none">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/todo_1.png"; ?>" class="gb-heading-img" alt="">
    TODOS
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a>
     <?php echo $promiseTodosCount . " todos"; ?>
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-2">
   <a class="gb-form-show pull-right"
      data-gb-target-container="#gb-todo-form-container"
      data-gb-target="#gb-todo-form">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-promise-item-todo-panel" class="row">
   <?php
   $this->renderPartial('promise.views.promise.activity.todo._promise_todos_section', array(
     "todoModel" => new Todo(),
     "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
     'promiseTodos' => $promise->getPromiseParentTodos(Todo::$TODOS_PER_PAGE),
     'promiseTodosCount' => $promise->getPromiseParentTodosCount(),
     'promiseId' => $promiseId
   ));
   ?>
  </div>
 </div>
</div>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div  class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-padding-none">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/note_1.png"; ?>" class="gb-heading-img" alt="">
    NOTES
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a>
     <?php echo $promiseNotesCount . " notes"; ?>
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-2">
   <a class="gb-form-show pull-right"
      data-gb-target-container="#gb-note-form-container"
      data-gb-target="#gb-note-form">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-promise-item-note-panel" class="row">
   <?php
   $this->renderPartial('promise.views.promise.activity.note._promise_notes_section', array(
     "noteModel" => new Note(),
     'promiseNotes' => $promise->getPromiseParentNotes(Note::$NOTES_PER_PAGE),
     'promiseNotesCount' => $promise->getPromiseParentNotesCount(),
     'promiseId' => $promiseId
   ));
   ?>
  </div>
 </div>
</div>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-padding-none">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/weblink_1.png"; ?>" class="gb-heading-img" alt="">
    WEBLINKS
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a>
     <?php echo $promiseWeblinksCount . " web links"; ?>
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-2">
   <a class="gb-form-show pull-right"
      data-gb-target-container="#gb-weblink-form-container"
      data-gb-target="#gb-weblink-form">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-promise-item-weblink-panel" class="row">
   <?php
   $this->renderPartial('promise.views.promise.activity.weblink._promise_weblinks_section', array(
     "weblinkModel" => new Weblink(),
     'promiseWeblinks' => $promise->getPromiseParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
     'promiseWeblinksCount' => $promise->getPromiseParentWeblinksCount(),
     'promiseId' => $promiseId
   ));
   ?>
  </div>
 </div>
</div>
