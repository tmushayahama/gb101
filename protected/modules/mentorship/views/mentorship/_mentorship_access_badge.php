<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$url = Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorshipEnrolled->id));
?>
<div class="gb-post-entry gb-commitment-post col-lg-6 col-sm-6 col-xs-12 gb-padding-thin" mentorship-id="<?php echo $mentorshipEnrolled->id; ?>"
     gb-source-pk-id="<?php echo $mentorshipEnrolled->id; ?>" gb-data-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>">

  <div class="row">
    <div class="panel panel-default gb-mentorship-top-border gb-no-padding">

      <div class='panel-heading'>
        <?php if ($mentorshipEnrolled->type == Type::$SOURCE_MENTOR_REQUESTS ): ?>
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gb-padding-thinner">
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipEnrolled->mentee->profile->avatar_url; ?>" class="pull-left" alt="">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-padding-thinner">
              <h5> <?php echo Mentorship::getMentorshipTypeName($mentorshipEnrolled->type); ?></h5>
              <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipEnrolled->mentee_id)); ?>"><?php echo $mentorshipEnrolled->mentee->profile->firstname . " " . $mentorshipEnrolled->mentee->profile->lastname ?></a>
            </div>
          </div>
        <?php elseif ($mentorshipEnrolled->type == Type::$SOURCE_MENTEE_REQUESTS ): ?>
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gb-padding-thinner">
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipEnrolled->mentor->profile->avatar_url; ?>" class="pull-left" alt="">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-padding-thinner">
              <h5> <?php echo Mentorship::getMentorshipTypeName($mentorshipEnrolled->type); ?></h5>
              <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipEnrolled->mentor_id)); ?>"><?php echo $mentorshipEnrolled->mentor->profile->firstname . " " . $mentorshipEnrolled->mentor->profile->lastname ?></a>
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
            <a href="<?php echo $url; ?>" class="btn btn-success">Access</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>