<div class="gb-skill-bank-item-row">
  <div class="row-fluid">
    <?php
    $subskills = ListBank::GetSublist($skillBankItem->name);
    if ($subskills != null):
      ?> 
      <h5 class="sub-heading-8 row-fluid">
        <div class="span1">
          <?php echo $count; ?>
        </div>
        <div class="span9">
          <?php echo $skillBankItem->name; ?> <small>has subskills</small>
        </div>
        <div class="span2">
          <a class="gb-toggle-subskill">collapse</a>
        </div>
      </h5>
      <?php $subskillCount = 1; ?>
      <?php foreach ($subskills as $subskill): ?>
        <div class="gb-subskill row-fluid">
          <div class="gb-skill-bank-item-row">
            <div class="row-fluid">
              <div class="span1">
                <?php echo $subskillCount; ?>
              </div>
              <div class="span9">
                <h4 class="gb-skill-name"><?php echo $subskill->name.":- ".$subskill->subgoal; ?></h4>
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
        <h4 class="gb-skill-name"><?php echo $skillBankItem->name; ?></h4>
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