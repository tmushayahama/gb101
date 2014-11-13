<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-skill-contributor-request-form-container" class="row gb-panel-form gb-hide">

</div>
<br>
<div class="row">
  <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
    <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12  row gb-no-padding">
      <li class="active col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a class="row" href="#gb-skill-contributors-pending-pane" data-toggle="tab"
           gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillDiscussions", array('skillListId' => $skillListItem->id)); ?>">
          <i class="glyphicon glyphicon-question-sign pull-left"></i> 
          <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Pending Requests</p></div>
          <i class="glyphicon glyphicon-chevron-right pull-right"></i>
        </a>
      </li>
      <h5 class="gb-heading-3">JUDGES 
        <span class="pull-right badge gb-badge-sm"><?php echo $skillContributorsCount; ?></span>
      </h5>
      <?php foreach ($skillContributors as $skillContributor): ?>
        <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
          <a class="row" href="#gb-contributor-person-pane" data-toggle="tab"
             gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillContributor", array('skillListId' => $skillListItem->id, 'skillContributorId' => $skillContributor->id)); ?>">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
              <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillContributor->contributor->profile->avatar_url; ?>" alt="">
              <div class="col-lg-9 gb-no-padding"><p class="gb-ellipsis "><?php echo $skillContributor->contributor->profile->firstname . " " . $skillContributor->contributor->profile->lastname; ?></p></div>
            </div>
            <i class="glyphicon glyphicon-chevron-right pull-right"></i>
          </a>
        </li>
      <?php endforeach; ?>
      <h5 class="gb-heading-3">OBSERVERS
        <span class="pull-right badge gb-badge-sm"><?php echo $skillObserversCount; ?></span>
      </h5>
      <?php foreach ($skillObservers as $skillObserver): ?>
        <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
          <a class="row" href="#gb-contributor-person-pane" data-toggle="tab"
             gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillObserver", array('skillListId' => $skillListItem->id, 'skillObserverId' => $skillObserver->id)); ?>">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
              <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillObserver->observer->profile->avatar_url; ?>" alt="">
              <div class="col-lg-9 gb-no-padding"><p class="gb-ellipsis "><?php echo $skillObserver->observer->profile->firstname . " " . $skillObserver->observer->profile->lastname; ?></p></div>
            </div>
            <i class="glyphicon glyphicon-chevron-right pull-right"></i>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="tab-content gb-padding-left-3">
      <div class="tab-pane active" id="gb-skill-contributors-pending-pane">
        <h3 class="gb-heading-2">Pending Requests</h3>
        <div class="row gb-tab-pane-body">
          <?php
          $this->renderPartial('skill.views.skill.contributors_tab._skill_contributors_pending_pane', array(
           "skillContributorRequests" => $skillContributorRequests,
           "skillObserverRequests" => $skillObserverRequests,
           "skillListItem" => $skillListItem));
          ?>
        </div>
      </div>
      <div class="tab-pane" id="gb-contributor-person-pane">
        <div class="row gb-tab-pane-body"></div>
      </div>
    </div>
  </div>
</div>

