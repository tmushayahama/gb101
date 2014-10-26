
<?php foreach (Level::getLevels(Level::$LEVEL_CATEGORY_SKILL) as $todoLevel): ?>
  <div class="gb-list-preview panel panel-default panel-borderless"
       gb-level-id="<?php echo $todoLevel->id; ?>">
    <h4 class="gb-heading-1">
      <?php echo $todoLevel->name; ?>
      <span class="pull-right badge badge-info"><?php echo TodoList::getTodoListCount(Level::$LEVEL_CATEGORY_SKILL, $todoLevel->id, Yii::app()->user->id); ?></span>
    </h4>
    <div class="panel-body gb-no-padding row">
      <?php
      $count = 1;
      foreach (TodoList::getTodoList(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, array($todoLevel->id), 5) as $todoListItem):
        echo $this->renderPartial('_todo_preview_list_row', array(
         'todoListItem' => $todoListItem));
      endforeach;
      ?>
    </div>
  </div>
<?php endforeach; ?>

