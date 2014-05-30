<div class="gb-list-preview panel panel-default panel-borderless" id="gb-skill-list-accordion">
  <?php foreach (Level::getLevels(Level::$LEVEL_CATEGORY_SKILL) as $skillLevel): ?>
    <div class="panel-heading">
      <h6 class="">
        <?php echo $skillLevel->level_name; ?>
        <span class="pull-right"><?php echo GoalList::getGoalListCount(Level::$LEVEL_CATEGORY_SKILL, 0, $skillLevel->id); ?></span>
      </h6>
    </div>
    <div class="panel-body gb-no-padding row">
      <?php
      $count = 1;
      foreach (GoalList::getGoalList(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, $skillLevel->id, 5) as $skillListItem):
        echo $this->renderPartial('_skill_list_row', array(
         'skillListItem' => $skillListItem,
         'count' => $count++));
      endforeach;
      ?>
    </div>
  <?php endforeach; ?>
</div>
