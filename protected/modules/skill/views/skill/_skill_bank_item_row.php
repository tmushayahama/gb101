<div class="panel panel-default gb-skill-bank-item-row gb-skillbank-side-border">
  <div class="row">
    <?php
    $subskills = ListBank::GetSublist($skillBankItem->name);
    if ($subskills != null):
      ?> 
      <h5 class="sub-heading-8 row-fluid">

        <div class="col-lg-11 col-md-10 col-sm-10 col-xs-8">
          <?php echo $skillBankItem->name; ?> <small>has subskills</small>
        </div>
        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-4">
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
      <div class="panel-heading">
        <a href="<?php echo Yii::app()->createUrl('skill/skill/skillBankDetail', array('skillId' => $skillBankItem->id)); ?>">
          <h4><?php echo $skillBankItem->name; ?>
          </h4>
        </a>
      </div>
      <div class="panel-body">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
          <?php if ($skillBankItem->description != null): ?>
            <p><?php echo $skillBankItem->description; ?><br>
              <a>Edit Description</a></p>
          <?php else: ?>
            <p class="text-info">No description yet. <a>Help Add</a></p>
          <?php endif; ?>
          Was added to skill list: <a>0</a> times.<br>
          Skill gained: <a>0</a> times.<br>
          Skill being learned: <a>0</a> times.
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
          <div class="btn-group">
            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
              Action
              <i class="icon-chevron-down"></i>
            </button>
            <ul class="dropdown-menu">
              <li class="nav-header">Add To</li>
              <li><a>My Skill List</a></li>
              <li class="nav-header">Other</li>
              <li><a>Assign To</a></li>
              <li><a>Challenge</a></li>
              <li><a>Bookmark</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <a class="btn btn-default">View More Stats</a>
        <a href="<?php echo Yii::app()->createUrl('skill/skill/skillBankDetail', array('skillId' => $skillBankItem->id)); ?>" class="pull-right btn btn-default">More Details</a>
      </div>
    <?php endif; ?>
  </div>
</div>