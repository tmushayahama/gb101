<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-post-entry-row col-lg-6 col-sm-6 col-xs-12 gb-padding-thin" project-id="<?php echo $projectMemberEnrolled->id; ?>"
     data-gb-source-pk="<?php echo $projectMemberEnrolled->id; ?>" data-gb-source="<?php echo Type::$SOURCE_PROJECT; ?>">

  <div class="row">
    <div class="panel panel-default gb-project-top-border gb-no-padding">

      <div class='panel-heading'>
        <?php if ($projectMemberEnrolled->role == 1): ?>
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gb-padding-thinner">
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $projectMemberEnrolled->member->profile->avatar_url; ?>" class="pull-left" alt="">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-padding-thinner">
              <h5> <?php //echo Mentorship::getMentorshipTypeName($projectMemberEnrolled->type); ?></h5>
              <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $projectMemberEnrolled->member_id)); ?>"><?php echo $projectMemberEnrolled->member->profile->firstname . " " . $projectMemberEnrolled->member->profile->lastname ?></a>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="panel-body gb-no-padding gb-height-2">
        <ul class="list-group gb-no-margin">
          <li class="list-group-item gb-padding-thin">Todos <span class="badge pull-right">0</span></li>
          <li class="list-group-item gb-padding-thin">Exercises<span class="badge pull-right">0</span></li>
          <li class="list-group-item gb-padding-thin">Discussions<span class="badge pull-right">0</span></li>
        </ul>
      </div>
      <div class="panel-footer">
        <div class="row">
          <div class="pull-right">
            <a href="<?php //echo $url; ?>" class="gb-disabled-1 btn btn-success">More Stats</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>