<div class="gb-skill-bank-item-row">
  <div class="row-fluid">
    <?php
    $subgoals = ListBank::GetSublist($goalBankItem->name);
    if ($subgoals != null):
      ?> 
      <h5 class="sub-heading-8 row-fluid">
        <div class="span1">
          <?php echo $count; ?>
        </div>
        <div class="span9">
          <?php echo $goalBankItem->name; ?> <small>has subgoals</small>
        </div>
        <div class="span2">
          <a class="gb-toggle-subgoal">collapse</a>
        </div>
      </h5>
      <?php $subgoalCount = 1; ?>
      <?php foreach ($subgoals as $subgoal): ?>
        <div class="gb-subgoal row-fluid">
          <div class="gb-skill-bank-item-row">
            <div class="row-fluid">
              <div class="span1">
                <?php echo $subgoalCount; ?>
              </div>
              <div class="span9">
                <h4 class="gb-skill-name"><?php echo $subgoal->name.":- ".$subgoal->subgoal; ?></h4>
                Was added to skill list: 0 times.<br>
                Is committed: 0 times.<br>
                <a class="gb-btn"><h5>More Details<i class="icon-chevron-down"></i></h5></a>
              </div>
              <div class="span2">
                <a class="gb-skill-bank-select-item gb-btn btn-small gb-btn-blue-1">Select</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="span1">
        <?php echo $count; ?>
      </div>
      <div class="span9">
        <h4 class="gb-skill-name"><?php echo $goalBankItem->name; ?></h4>
        Was added to skill list: 0 times.<br>
        Is committed: 0 times.<br>
        <a class="gb-btn"><h5>More Details<i class="icon-chevron-down"></i></h5></a>
      </div>
      <div class="span2">
        <a class="gb-skill-bank-select-item gb-btn btn-small gb-btn-blue-1">Select</a>
      </div>
    <?php endif; ?>
  </div>
</div>