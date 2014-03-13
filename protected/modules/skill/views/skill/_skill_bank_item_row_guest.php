<div class="gb-skill-bank-item-row gb-skillbank-side-border">
  <div class="row-fluid">
    <?php
    $subskills = ListBank::GetSublist($skillBankItem->name);
    if ($subskills != null):
      ?> 
      <h5 class="sub-heading-8 row-fluid">
       
        <div class="span10">
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
              <div class="span11">
                <a><h4><?php echo $subskill->name . ": -" . $subskill->subgoal; ?></h4></a>
                <?php if ($subskill->description != null): ?>
                <p><?php echo $subskill->description; ?><br>
                  <a>Edit Description</a></p>
                <?php else: ?>
                  <p class="text-info">No description yet. <a>Help Add</a></p>
                <?php endif; ?>
                Was added to skill list: <a>0</a> times.<br>
                Skill gained: <a>0</a> times.<br>
                Skill being learned: <a>0</a> times.<br>
                <a><strong>More Stats</strong></a>
              </div>
            </div>
            <div class="row-fluid">
              <div class="offset1 span11 gb-skill-footer inline">
                <a class="pull-right gb-btn"><h5>More Details</h5></a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="span11">
        <a><h4><?php echo $skillBankItem->name; ?></h4></a>
        <?php if ($skillBankItem->description != null): ?>
          <p><?php echo $skillBankItem->description; ?><br>
            <a>Edit Description</a></p>
        <?php else: ?>
          <p class="text-info">No description yet. <a>Help Add</a></p>
        <?php endif; ?>
        Was added to skill list: <a>0</a> times.<br>
        Skill gained: <a>0</a> times.<br>
        Skill being learned: <a>0</a> times.<br>
        <a><strong>More Stats</strong></a>
      </div>
    </div>
    <div class="row-fluid">
      <div class="offset1 span11 gb-skill-footer inline">
        <a class="pull-right gb-btn"><h5>More Details</h5></a>
      </div>
    <?php endif; ?>
  </div>
</div>