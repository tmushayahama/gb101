<div class="accordion" id="gb-skill-list-accordion">
  <?php foreach (GoalLevel::getGoalLevels("skill") as $skillLevel): ?>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#gb-skill-list-accordion" href="<?php echo '#gb-skill-list-accordion-level-' . $skillLevel->id; ?>">
          <?php echo $skillLevel->level_name; ?>
          <span class="pull-right badge badge-info"><?php echo GoalList::getGoalListCount(GoalType::$CATEGORY_SKILL, 0, $skillLevel->id); ?></span>
        </a>
      </div>
      <div id="<?php echo 'gb-skill-list-accordion-level-' . $skillLevel->id; ?>" class="accordion-body collapse">
        <div class="accordion-inner">
          <?php
          $count = 1;
          foreach (GoalList::getGoalList(0, $skillLevel->id, 5) as $skillListItem):
            echo $this->renderPartial('_skill_list_row', array(
             'skillListItem' => $skillListItem,
             'count' => $count++));
          endforeach;
          ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
