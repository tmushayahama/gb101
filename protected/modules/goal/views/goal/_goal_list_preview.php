<div class="accordion gb-list-preview" id="gb-goal-list-accordion">
  <?php foreach (Level::getLevels("goal") as $level): ?>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#gb-goal-list-accordion" href="<?php echo '#gb-goal-list-accordion-level-' . $level->id; ?>">
          <?php echo $level->level_name; ?>
          <span class="pull-right badge badge-info"><?php echo GoalList::getGoalListCount(GoalType::$CATEGORY_GOAL, 0, $level->id); ?></span>
        </a>
      </div>
      <div id="<?php echo 'gb-goal-list-accordion-level-' . $level->id; ?>" class="accordion-body collapse">
        <div class="accordion-inner">
          <?php
          $count = 1;
          foreach (GoalList::getGoalList(GoalType::$CATEGORY_GOAL, 0, $level->id, 5) as $goalListItem):
            echo $this->renderPartial('_goal_list_row', array(
             'goalListItem' => $goalListItem,
             'count' => $count++));
          endforeach;
          ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
