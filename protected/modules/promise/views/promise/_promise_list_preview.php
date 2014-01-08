<div class="accordion" id="gb-promise-list-accordion">
  <?php foreach (GoalLevel::getGoalLevels("promise") as $promiseLevel): ?>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#gb-promise-list-accordion" href="<?php echo '#gb-promise-list-accordion-level-' . $promiseLevel->id; ?>">
          <?php echo $promiseLevel->level_name; ?>
          <span class="pull-right badge badge-info"><?php echo GoalList::getGoalListCount(0, $promiseLevel->id); ?></span>
        </a>
      </div>
      <div id="<?php echo 'gb-promise-list-accordion-level-' . $promiseLevel->id; ?>" class="accordion-body collapse">
        <div class="accordion-inner">
          <?php
          $count = 1;
          foreach (GoalList::getGoalList(0, $promiseLevel->id, 5) as $promiseListItem):
            echo $this->renderPartial('_promise_list_row', array(
             'promiseListItem' => $promiseListItem,
             'count' => $count++));
          endforeach;
          ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
