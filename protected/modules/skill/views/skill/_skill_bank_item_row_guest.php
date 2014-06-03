<div class="panel panel-default gb-skillbank-side-border">
  <div class="row">
    <?php
    $subskills = ListBank::GetSublist($skillBankItem->name);
    if ($subskills != null):
      ?> 
      <h5 class="text-info row">

        <div class="col-lg-11 col-md-10 col-sm-10 col-xs-8">
          <?php echo $skillBankItem->name; ?> <small>has subskills</small>
        </div>
        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-4">
          <a class="gb-toggle-subskill">collapse</a>
        </div>
      </h5>
      <?php $subskillCount = 1; ?>
      <?php foreach ($subskills as $subskill): ?>
        <div class="panel-body">
          <div class='row'>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 gb-no-padding">
              <?php if ($subskill->description != null): ?>
                <p><?php echo $subskill->description; ?><br>
                  <a>Edit Description</a></p>
              <?php else: ?>
                <p class="">No description yet. <a href="#gb-login-notification-modal" role="button" data-toggle="modal">Help us describe</a></p>
              <?php endif; ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs gb-no-padding">
              <div class="gb-skill-bank-stats row">
                <div class="col-lg-4 col-md-4 col-sm-4 gb-padding-thinner">
                  <div class="thumbnail">
                    <h6 class="text-center">Gained</h6>
                    <h3 class="text-center text-success">0</h3>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 gb-padding-thinner">
                  <div class="thumbnail">
                    <h6 class="text-center">Improving</h6>
                    <h3 class="text-center text-success">0</h3>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 gb-padding-thinner">
                  <div class="thumbnail">
                    <h6 class="text-center">Learning</h6>
                    <h3 class="text-center text-success">0</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="pull-right btn-group">
              <a class="gb-disabled btn btn-link">More Stats</a>
              <a href="<?php echo Yii::app()->createUrl('skill/skill/skillBankDetail', array('skillId' => $subskill->id)); ?>" class="pull-right btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
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
        <div class='row'>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 gb-no-padding">
            <?php if ($skillBankItem->description != null): ?>
              <p><?php echo $skillBankItem->description; ?><br>
                <a>Edit Description</a></p>
            <?php else: ?>
              <p class="">No description yet. <a href="#gb-login-notification-modal" role="button" data-toggle="modal">Help us describe</a></p>
            <?php endif; ?>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs gb-no-padding">
            <div class="gb-skill-bank-stats row">
              <div class="col-lg-4 col-md-4 col-sm-4 gb-padding-thinner">
                <div class="thumbnail">
                  <h6 class="text-center">Gained</h6>
                  <h3 class="text-center text-success">0</h3>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 gb-padding-thinner">
                <div class="thumbnail">
                  <h6 class="text-center">Improving</h6>
                  <h3 class="text-center text-success">0</h3>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 gb-padding-thinner">
                <div class="thumbnail">
                  <h6 class="text-center">Learning</h6>
                  <h3 class="text-center text-success">0</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <div class="row">
          <div class="pull-right btn-group">
            <a class="gb-disabled btn btn-link">More Stats</a>
            <a href="<?php echo Yii::app()->createUrl('skill/skill/skillBankDetail', array('skillId' => $skillBankItem->id)); ?>" class="pull-right btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>