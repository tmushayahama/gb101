<div class="gb-list-preview panel panel-default panel-borderless" id="gb-skill-list-accordion">
  <?php foreach (Level::getLevels(Level::$LEVEL_CATEGORY_SKILL) as $skillLevel): ?>
    <h3 class="gb-heading-1">
      <?php echo $skillLevel->level_name; ?>
      <span class="pull-right badge badge-info"><?php echo GoalList::getGoalListCount(Level::$LEVEL_CATEGORY_SKILL, 0, $skillLevel->id); ?></span>
    </h3>
    <div class="panel-body gb-no-padding row">
      <?php
      $count = 1;
      foreach (GoalList::getGoalList(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, array($skillLevel->id), 5) as $skillListItem):
        echo $this->renderPartial('_skill_list_row', array(
         'skillListItem' => $skillListItem,
         'count' => $count++));
      endforeach;
      ?>
    </div>
    <br>
  <?php endforeach; ?>
</div>
