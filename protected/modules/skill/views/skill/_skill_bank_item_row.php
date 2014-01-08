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
                <a><h4><?php echo $subskill->name . ": -" . $subskill->subgoal; ?></h4></a>
                <?php if ($subskill->description != null): ?>
                  <p><?php echo $subskill->description; ?></p>
                <?php else: ?>
                  <p class="text-info">No description yet. <a>Help Add</a></p>
                <?php endif; ?>
                Was added to skill list: <a>0</a> times.<br>
                Is committed: <a>0</a> times.
              </div>
              <div class="span2">
                <div class="btn-group">
                  <button class="pull-right gb-btn gb-btn-green-1 btn-small dropdown-toggle" data-toggle="dropdown">
                    Action
                    <i class="icon-white icon-chevron-down"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li class="nav-header">Add To</li>
                    <li><a>My Skill List</a></li>
                    <li><a>My Skill Commitment</a></li>
                    <li class="nav-header">Other</li>
                    <li><a>Assign To</a></li>
                    <li><a>Challenge</a></li>
                    <li><a>Bookmark</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row-fluid">
              <div class="offset1 span11 gb-skill-footer inline">
                <a class="gb-btn gb-btn-blue-light-1">Suggest Edit</a>
                <a class="gb-btn gb-btn-blue-light-1">Share</a>
                <a class="pull-right gb-btn"><h5>More Details</h5></a>
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
        <a><h4><?php echo $skillBankItem->name; ?></h4></a>
        <?php if ($skillBankItem->description != null): ?>
          <p><?php echo $skillBankItem->description; ?></p>
        <?php else: ?>
          <p class="text-info">No description yet. <a>Help Add</a></p>
        <?php endif; ?>
        Was added to skill list: <a>0</a> times.<br>
        Is committed: <a>0</a> times.
      </div>
      <div class="span2">
        <div class="btn-group">
          <button class="pull-right gb-btn gb-btn-green-1 btn-small dropdown-toggle" data-toggle="dropdown">
            Action
            <i class="icon-white icon-chevron-down"></i>
          </button>
          <ul class="dropdown-menu">
            <li class="nav-header">Add To</li>
            <li><a>My Skill List</a></li>
            <li><a>My Skill Commitment</a></li>
            <li class="nav-header">Other</li>
            <li><a>Assign To</a></li>
            <li><a>Challenge</a></li>
            <li><a>Bookmark</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="offset1 span11 gb-skill-footer inline">
        <a class="gb-btn gb-btn-blue-light-1">Suggest Edit</a>
        <a class="gb-btn gb-btn-blue-light-1">Share</a>
        <a class="pull-right gb-btn"><h5>More Details</h5></a>
      </div>
    <?php endif; ?>
  </div>
</div>