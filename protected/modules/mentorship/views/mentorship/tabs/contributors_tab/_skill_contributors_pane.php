<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-mentorship-contributor-request-form-container" class="row gb-panel-form gb-hide">

</div>
<br>
<div class="row">
  <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
    <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12  row ">
      <li class="active col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a class="row" href="#gb-mentorship-contributors-pending-pane" data-toggle="tab"
           gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipDiscussions", array('mentorshipId' => $mentorship->id)); ?>">
          <i class="glyphicon glyphicon-question-sign pull-left"></i> 
          <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Pending Requests</p></div>
          <i class="glyphicon glyphicon-chevron-right pull-right"></i>
        </a>
      </li>
      <h5 class="gb-heading-3">JUDGES 
        <span class="pull-right badge gb-badge-sm"><?php echo $mentorshipContributorsCount; ?></span>
      </h5>
      <?php foreach ($mentorshipContributors as $mentorshipContributor): ?>
        <li class="col-lg-12 col-sm-12 col-xs-12 ">
          <a class="row" href="#gb-contributor-person-pane" data-toggle="tab"
             gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipContributor", array('mentorshipId' => $mentorship->id, 'mentorshipContributorId' => $mentorshipContributor->id)); ?>">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11  pull-left">
              <img class="gb-icon-2 col-lg-2 " src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipContributor->contributor->profile->avatar_url; ?>" alt="">
              <div class="col-lg-9 "><p class="gb-ellipsis "><?php echo $mentorshipContributor->contributor->profile->firstname . " " . $mentorshipContributor->contributor->profile->lastname; ?></p></div>
            </div>
            <i class="glyphicon glyphicon-chevron-right pull-right"></i>
          </a>
        </li>
      <?php endforeach; ?>
      <h5 class="gb-heading-3">OBSERVERS
        <span class="pull-right badge gb-badge-sm"><?php echo $mentorshipObserversCount; ?></span>
      </h5>
      <?php foreach ($mentorshipObservers as $mentorshipObserver): ?>
        <li class="col-lg-12 col-sm-12 col-xs-12 ">
          <a class="row" href="#gb-contributor-person-pane" data-toggle="tab"
             gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipObserver", array('mentorshipId' => $mentorship->id, 'mentorshipObserverId' => $mentorshipObserver->id)); ?>">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11  pull-left">
              <img class="gb-icon-2 col-lg-2 " src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipObserver->observer->profile->avatar_url; ?>" alt="">
              <div class="col-lg-9 "><p class="gb-ellipsis "><?php echo $mentorshipObserver->observer->profile->firstname . " " . $mentorshipObserver->observer->profile->lastname; ?></p></div>
            </div>
            <i class="glyphicon glyphicon-chevron-right pull-right"></i>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="tab-content gb-padding-left-3">
      <div class="tab-pane active" id="gb-mentorship-contributors-pending-pane">
        <h3 class="gb-heading-2">Pending Requests</h3>
        <div class="row gb-tab-pane-body">
          <?php
          $this->renderPartial('mentorship.views.mentorship.contributors_tab._mentorship_contributors_pending_pane', array(
           "mentorshipContributorRequests" => $mentorshipContributorRequests,
           "mentorshipObserverRequests" => $mentorshipObserverRequests,
           "mentorship" => $mentorship));
          ?>
        </div>
      </div>
      <div class="tab-pane" id="gb-contributor-person-pane">
        <div class="row gb-tab-pane-body"></div>
      </div>
    </div>
  </div>
</div>

