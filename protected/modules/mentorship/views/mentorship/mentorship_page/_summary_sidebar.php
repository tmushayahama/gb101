<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row">
  <h3 class="gb-heading-2">Owner</h3>
  <p class="">
    <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->owner_id)); ?>"> <?php echo $mentorship->owner->profile->firstname . " " . $mentorship->owner->profile->lastname ?></a>
  </p>
</div>
<div class="row">
  <h3 class="gb-heading-2">Description</h3>
  <p class="list-group-item-text">
    <strong><?php echo $mentorship->title; ?></strong>
    <span class="gb-mentorship-description"> 
      <?php echo $mentorship->description ?>
    </span> 
  </p>
  <p class="">Skill: <a><?php echo $mentorship->skillList->skill->title; ?></a></p>

</div>
<br>
<div class="hidden-sm hidden-xs">
  <p>
    <i>Other activities by <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->owner_id)); ?>"> <?php echo $mentorship->owner->profile->firstname . " " . $mentorship->owner->profile->lastname ?></a></i>
  </p>
  <div class="row">
    <h3 class="gb-heading-2">Advice Pages</h3>
    <?php foreach ($advicePages as $advicePage): ?>
      <div class="row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
        <p class="gb-ellipsis">
          <a href="<?php echo Yii::app()->createUrl('pages/pages/advicePageDetail', array('advicePageId' => $advicePage->id)); ?>">
            <?php echo $advicePage->title; ?>
          </a>
        </p>
      </div>
    <?php endforeach; ?>
  </div>
  <br>
  <div class="row">
    <h3 class="gb-heading-2">Other Mentorships</h3>
    <?php foreach ($otherMentorships as $otherMentorship): ?>
      <div class="row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
        <p class="gb-ellipsis">
          <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $otherMentorship->id)); ?>"><?php echo $otherMentorship->title; ?></a>
        </p>
      </div>
    <?php endforeach; ?>
  </div>
</div>