<div class="gb-promise-bank-item-row">
  <div class="row-fluid">
    <?php
    $subpromises = ListBank::GetSublist($promiseBankItem->name);
    if ($subpromises != null):
      ?> 
      <h5 class="sub-heading-8 row-fluid">
        <div class="span1">
          <?php echo $count; ?>
        </div>
        <div class="span9">
          <?php echo $promiseBankItem->name; ?> <small>has subpromises</small>
        </div>
        <div class="span2">
          <a class="gb-toggle-subpromise">collapse</a>
        </div>
      </h5>
      <?php $subpromiseCount = 1; ?>
      <?php foreach ($subpromises as $subpromise): ?>
        <div class="gb-subpromise row-fluid">
          <div class="gb-promise-bank-item-row">
            <div class="row-fluid">
              <div class="span1">
                <?php echo $subpromiseCount; ?>
              </div>
              <div class="span9">
                <h4 class="gb-promise-name"><?php echo $subpromise->name.":- ".$subpromise->subpromise; ?></h4>
                Was added to promise list: 0 times.<br>
                Is committed: 0 times.<br>
                <a class="gb-btn"><h5>More Details<i class="glyphicon glyphicon-chevron-down"></i></h5></a>
              </div>
              <div class="span2">
                <a class="gb-promise-bank-select-item gb-btn btn-small gb-btn-blue-1">Select</a>
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
        <h4 class="gb-promise-name"><?php echo $promiseBankItem->name; ?></h4>
        Was added to promise list: 0 times.<br>
        Is committed: 0 times.<br>
        <a class="gb-btn"><h5>More Details<i class="glyphicon glyphicon-chevron-down"></i></h5></a>
      </div>
      <div class="span2">
        <a class="gb-promise-bank-select-item gb-btn btn-small gb-btn-blue-1">Select</a>
      </div>
    <?php endif; ?>
  </div>
</div>