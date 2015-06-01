<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div class="col-lg-10 col-md-10 col-sm-2 col-xs-12 gb-padding-none">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/todo_1.png"; ?>" class="gb-heading-img" alt="">
    TODOS
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a>
     <?php echo $skillTodosCount . " todos"; ?>
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-12">
   <a class="gb-form-show pull-right"
      data-gb-target-container="#gb-todo-form-container"
      data-gb-target="#gb-todo-form">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-todo-panel" class="row">
   <?php
   $this->renderPartial('skill.views.skill.activity.todo._skill_todos_section', array(
     "todoModel" => new Todo(),
     "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
     'skillTodos' => $skill->getSkillParentTodos(Todo::$TODOS_PER_PAGE),
     'skillTodosCount' => $skill->getSkillParentTodosCount(),
     'skillId' => $skillId
   ));
   ?>
  </div>
 </div>
</div>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div  class="col-lg-10 col-md-10 col-sm-2 col-xs-12 gb-padding-none">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/note_1.png"; ?>" class="gb-heading-img" alt="">
    NOTES
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a>
     <?php echo $skillNotesCount . " notes"; ?>
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-12">
   <a class="gb-form-show pull-right"
      data-gb-target-container="#gb-note-form-container"
      data-gb-target="#gb-note-form">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-note-panel" class="row">
   <?php
   $this->renderPartial('skill.views.skill.activity.note._skill_notes_section', array(
     "noteModel" => new Note(),
     'skillNotes' => $skill->getSkillParentNotes(Note::$NOTES_PER_PAGE),
     'skillNotesCount' => $skill->getSkillParentNotesCount(),
     'skillId' => $skillId
   ));
   ?>
  </div>
 </div>
</div>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div class="col-lg-10 col-md-10 col-sm-2 col-xs-12 gb-padding-none">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/weblink_1.png"; ?>" class="gb-heading-img" alt="">
    WEBLINKS
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a>
     <?php echo $skillWeblinksCount . " web links"; ?>
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-12">
   <a class="gb-form-show pull-right"
      data-gb-target-container="#gb-weblink-form-container"
      data-gb-target="#gb-weblink-form">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-weblink-panel" class="row">
   <?php
   $this->renderPartial('skill.views.skill.activity.weblink._skill_weblinks_section', array(
     "weblinkModel" => new Weblink(),
     'skillWeblinks' => $skill->getSkillParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
     'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
     'skillId' => $skillId
   ));
   ?>
  </div>
 </div>
</div>
