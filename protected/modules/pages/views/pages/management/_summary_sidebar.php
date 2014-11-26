<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
  <h3 class="gb-heading-2">Advisor</h3>
  <p class="">
    <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $advicePage->page->creator_id)); ?>"><?php echo $advicePage->page->creator->profile->firstname . " " . $advicePage->page->creator->profile->lastname ?></a>
  </p>
</div>
<div class="row">
  <h3 class="gb-heading-2">Description</h3>  
  <p class="">
    <strong><?php echo $advicePage->skills . " " . $advicePage->level->name . " " . $advicePage->page->title; ?> </strong>
    <span class=""> 
      <?php echo $advicePage->page->description; ?>
    </span> 
  </p>
</div>
<div class="hidden-sm hidden-xs">
  <br>
  <p>
    <i>Other activities by <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $advicePage->page->creator_id)); ?>"> <?php echo $advicePage->page->creator->profile->firstname . " " . $advicePage->page->creator->profile->lastname ?></a></i>
  </p>
  <div class="row">
    <h3 class="gb-heading-2">Mentorships</h3>
    <?php foreach ($mentorships as $mentorship): ?>
      <div class="row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
        <p class="gb-ellipsis">
          <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorship->id)); ?>"><?php echo $mentorship->title; ?></a>
        </p>
      </div>
    <?php endforeach; ?>
  </div>
  <br>
  <div class="row">
    <h3 class="gb-heading-2">Other Advice Pages</h3>
    <?php foreach ($otherAdvicePages as $otherAdvicePage): ?>
      <div class="row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
        <p class="gb-ellipsis">
          <a href="<?php echo Yii::app()->createUrl('pages/pages/advicePageDetail', array('advicePageId' => $otherAdvicePage->id)); ?>">
            <?php echo $otherAdvicePage->page->title; ?>
          </a>
        </p>
      </div>
    <?php endforeach; ?>
  </div>
</div>