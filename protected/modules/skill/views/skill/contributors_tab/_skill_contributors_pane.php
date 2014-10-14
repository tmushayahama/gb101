<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row gb-home-nav-2 gb-box-1">
  <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-6 col-md-6 col-sm-6 col-xs-6"
     gb-type="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>" 
     gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
     gb-target-modal="#gb-send-request-modal"
     gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
     gb-single-target-display=".gb-display-assign-to"
     gb-single-target-display-input="#gb-request-form-recipient-id-input"
     gb-source-pk-id="<?php echo $skillListId; ?>" 
     gb-data-source="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>"
     gb-form-slide-target="#gb-skill-judges-request-form-container"
     gb-form-target="#gb-request-form"
     gb-submit-prepend-to="#gb-skill-judges"
     gb-request-title="<?php echo "Skill Observer" ?>"
     gb-request-title-placeholder="Mentorship subskill">
    <div class="thumbnail row">
      <div class="gb-img-container pull-left">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
      </div>
      <div class="caption">
        <h4 class="">Request Observers</h4>
      </div>
    </div>
  </a>
  <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-6 col-md-6 col-sm-6 col-xs-6"
     gb-type="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>" 
     gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
     gb-target-modal="#gb-send-request-modal"
     gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
     gb-single-target-display=".gb-display-assign-to"
     gb-single-target-display-input="#gb-request-form-recipient-id-input"
     gb-source-pk-id="<?php echo $skillListId; ?>" 
     gb-data-source="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>"
     gb-form-slide-target="#gb-skill-judges-request-form-container"
     gb-form-target="#gb-request-form"
     gb-submit-prepend-to="#gb-skill-judges"
     gb-request-title="<?php echo "Skill Observer" ?>"
     gb-request-title-placeholder="Mentorship subskill">
    <div class="thumbnail row">
      <div class="gb-img-container pull-left">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
      </div>
      <div class="caption">
        <h4 class="">Request Judge(s)</h4>
      </div>
    </div>
  </a>
</div>
<div id="gb-skill-judges-request-form-container" class="row gb-panel-form gb-hide">

</div>
<br>
<div class="row">
  <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
    <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-nav-for-background-2 row gb-no-padding">
      <li class="active col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a class="row" href="#gb-skill-contributors-pending-pane" data-toggle="tab">
          <i class="glyphicon glyphicon-question-sign pull-left"></i> 
          <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Pending Requests</p></div>
          <i class="glyphicon glyphicon-chevron-right pull-right"></i>
        </a>
      </li>
      <?php foreach ($skillJudges as $skillJudge): ?>
        <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
          <a class="row" href="<?php echo "#gb-skill-judge-pane-" . $skillJudge->judge_id; ?>" data-toggle="tab">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
              <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillJudge->judge->profile->avatar_url; ?>" alt="">
              <div class="col-lg-9 gb-no-padding"><p class="gb-ellipsis "><?php echo $skillJudge->judge->profile->firstname . " " . $skillJudge->judge->profile->lastname; ?></p></div>
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
        
      </div>
      <?php foreach ($skillJudges as $skillJudge): ?>
        <div class="tab-pane" id="<?php echo "gb-skill-judge-pane-" . $skillJudge->judge_id; ?>">
          <h3 class="gb-heading-2">
            <div class="col-lg-5 gb-no-padding"><p class="gb-ellipsis "><?php echo $skillJudge->judge->profile->firstname . " " . $skillJudge->judge->profile->lastname; ?></p></div>
          </h3>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</div>

