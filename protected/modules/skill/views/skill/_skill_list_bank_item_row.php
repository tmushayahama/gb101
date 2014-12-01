<div class="panel panel-default gb-skill-bank-item-row">
  <div class="panel-body row">
    <?php
    $skills = Bank::GetSublist($skillBank->name);
    if ($skills != null):
      ?> 
      <div class="panel panel-default gb-no-padding">
        <div class="panel-heading">
          <h5 class="row">
            <div class="col-lg-9 col-sm-12 col-xs-12">
              <?php echo $skillBank->name; ?> <small>has skills</small>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12">
              <a class="btn gb-toggle-skill">collapse</a>
            </div>
          </h5>
        </div>
        <div class="panel-body">
          <?php $skillCount = 1; ?>
          <?php foreach ($skills as $skill): ?>
            <div class="gb-skill row">
              <div class="gb-skill-bank-item-row">
                <div class="row">
                  <div class="col-lg-10 col-sm-12 col-xs-12">
                    <h5 class="gb-skill-name"><?php echo $skill->name . ":- " . $skill->skill; ?></h5>
                  </div>
                  <div class="col-lg-2 col-sm-12 col-xs-12">
                    <a class="gb-skill-bank-select-item pull-right btn btn-primary btn-xs">Select</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php else: ?>
      <div class="col-lg-10 col-sm-12 col-xs-12">
        <h5 class="gb-skill-name"><?php echo $skillBank->name; ?></h5>
      </div>
      <div class="col-lg-2 col-sm-12 col-xs-12">
        <a class="gb-skill-bank-select-item btn btn-sm btn-primary pull-right">Select</a>
      </div>
    <?php endif; ?>
  </div>
</div>