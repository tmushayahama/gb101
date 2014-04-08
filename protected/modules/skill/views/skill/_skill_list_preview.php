<div class="gb-list-preview panel panel-default panel-borderless" id="gb-skill-list-accordion">
  <?php foreach (GoalLevel::getGoalLevels("skill") as $skillLevel): ?>
    <div class="panel-heading">
      <a class=""  href="<?php echo '#gb-skill-list-accordion-level-' . $skillLevel->id; ?>">
        <?php echo $skillLevel->level_name; ?>
        <span class="pull-right badge badge-info"><?php echo GoalList::getGoalListCount(GoalType::$CATEGORY_SKILL, 0, $skillLevel->id); ?></span>
      </a>
    </div>
    <div class="panel-body gb-no-padding row">
      <?php
      $count = 1;
      foreach (GoalList::getGoalList(GoalType::$CATEGORY_SKILL, 0, $skillLevel->id, 5) as $skillListItem):
        echo $this->renderPartial('_skill_list_row', array(
         'skillListItem' => $skillListItem,
         'count' => $count++));
      endforeach;
      ?>
    </div>
  <?php endforeach; ?>
</div>
