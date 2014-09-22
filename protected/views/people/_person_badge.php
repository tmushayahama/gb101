<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-person-badge" person-id="<?php echo $person->user_id; ?>">
  <div class="row ">
    <div class="col-lg-3 col-sm-3 col-xs-2">
      <img src="<?php echo Yii::app()->request->baseUrl."/img/profile_pic/".$person->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default col-lg-9 col-sm-9 col-xs-10 gb-advice-top-border gb-no-padding">
      <div class='panel-heading'>
        <h4>
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $person->user_id)); ?>">
            <?php echo $person->firstname . " " . $person->lastname; ?></a>
        </h4>
      </div>
      <div class="panel-body"> 
        <a class="col-lg-4 col-md-4 col-sm-4 col-xs-2 gb-padding-thin">
          <div class="thumbnail">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_5.png" alt="">
            <div class="text-center caption">
              <h6 class="">Skills</h6>
              <h2 class="">0</h2>
            </div>
          </div>
        </a>
        <a class="col-lg-4 col-md-4 col-sm-4 col-xs-2 gb-padding-thin">
          <div class="thumbnail">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_5.png" alt="">
            <div class="text-center caption">
              <h6 class="">Mentorships</h6>
              <h2 class="">0</h2>
            </div>
          </div>
        </a>
        <a class="col-lg-4 col-md-4 col-sm-4 col-xs-2 gb-padding-thin">
          <div class="thumbnail">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_5.png" alt="">
            <div class="text-center caption">
              <h6 class="">Advice Pages</h6>
              <h2 class="">0</h2>
            </div>
          </div>
        </a>
      </div>
      <div class="panel-footer">
        <div class="row">
          <div class="btn-group pull-right">
            <?php if (!Yii::app()->user->isGuest && ($person->user_id!=Yii::app()->user->id)): ?>
              <a class="gb-disabled btn btn-link">Connect</a>
            <?php endif; ?>
            <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $person->user_id)); ?>" class="btn btn-link">
              <i class="glyphicon glyphicon-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>