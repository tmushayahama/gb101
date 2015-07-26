<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-goal-contributor-request-form-container" class="row gb-panel-form gb-hide">

</div>
<br>
<div class="row">
  <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-padding-none">
    <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12  row gb-padding-none">
      <li class="active col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a class="row" href="#gb-goal-contributors-pending-pane" data-toggle="tab"
           gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalDiscussions", array('goalId' => $goal->id)); ?>">
          <i class="glyphicon glyphicon-question-sign pull-left"></i> 
          <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Pending Requests</p></div>
          <i class="glyphicon glyphicon-chevron-right pull-right"></i>
        </a>
      </li>
      <h5 class="gb-heading-3">JUDGES 
        <span class="pull-right badge gb-badge-sm"><?php echo $goalContributorsCount; ?></span>
      </h5>
      <?php foreach ($goalContributors as $goalContributor): ?>
        <li class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
          <a class="row" href="#gb-contributor-person-pane" data-toggle="tab"
             gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalContributor", array('goalId' => $goal->id, 'goalContributorId' => $goalContributor->id)); ?>">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-padding-none pull-left">
              <img class="gb-icon-2 col-lg-2 gb-padding-none" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $goalContributor->contributor->profile->avatar_url; ?>" alt="">
              <div class="col-lg-9 gb-padding-none"><p class="gb-ellipsis "><?php echo $goalContributor->contributor->profile->firstname . " " . $goalContributor->contributor->profile->lastname; ?></p></div>
            </div>
            <i class="glyphicon glyphicon-chevron-right pull-right"></i>
          </a>
        </li>
      <?php endforeach; ?>
      <h5 class="gb-heading-3">OBSERVERS
        <span class="pull-right badge gb-badge-sm"><?php echo $goalObserversCount; ?></span>
      </h5>
      <?php foreach ($goalObservers as $goalObserver): ?>
        <li class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
          <a class="row" href="#gb-contributor-person-pane" data-toggle="tab"
             gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalObserver", array('goalId' => $goal->id, 'goalObserverId' => $goalObserver->id)); ?>">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-padding-none pull-left">
              <img class="gb-icon-2 col-lg-2 gb-padding-none" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $goalObserver->observer->profile->avatar_url; ?>" alt="">
              <div class="col-lg-9 gb-padding-none"><p class="gb-ellipsis "><?php echo $goalObserver->observer->profile->firstname . " " . $goalObserver->observer->profile->lastname; ?></p></div>
            </div>
            <i class="glyphicon glyphicon-chevron-right pull-right"></i>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="tab-content gb-padding-left-3">
      <div class="tab-pane active" id="gb-goal-contributors-pending-pane">
        <h3 class="gb-heading-2">Pending Requests</h3>
        <div class="row gb-tab-pane-body">
          <?php
          $this->renderPartial('goal.views.goal.contributors_tab._goal_contributors_pending_pane', array(
           "goalContributorRequests" => $goalContributorRequests,
           "goalObserverRequests" => $goalObserverRequests,
           "goal" => $goal));
          ?>
        </div>
      </div>
      <div class="tab-pane" id="gb-contributor-person-pane">
        <div class="row gb-tab-pane-body"></div>
      </div>
    </div>
  </div>
</div>

