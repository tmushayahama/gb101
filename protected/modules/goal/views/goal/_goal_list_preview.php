<div class="accordion" id="gb-goal-list-accordion">
  <?php foreach (GoalLevel::getGoalLevels("goal") as $goalLevel): ?>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#gb-goal-list-accordion" href="<?php echo '#gb-goal-list-accordion-level-' . $goalLevel->id; ?>">
          <?php echo $goalLevel->level_name; ?>
          <span class="pull-right badge badge-info"><?php echo GoalList::getGoalListCount(GoalType::$CATEGORY_GOAL, 0, $goalLevel->id); ?></span>
        </a>
      </div>
      <div id="<?php echo 'gb-goal-list-accordion-level-' . $goalLevel->id; ?>" class="accordion-body collapse">
        <div class="accordion-inner">
          <?php
          $count = 1;
          foreach (GoalList::getGoalList(0, $goalLevel->id, 5) as $goalListItem):
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
