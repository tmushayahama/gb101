<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-link gb-box-7 row"
     data-gb-link-type="redirects"
     data-gb-url="<?php echo Yii::app()->createUrl("hobby/hobby/hobby", array('hobbyId' => $hobby->id)); ?>">
 <div class="gb-indicator <?php echo 'gb-level-' . $hobby->level->code; ?>"></div>
 <div class="gb-container row">
  <div class="col-lg-2 col-md-2 col-sm-1 col-xs-2 gb-padding-none">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $hobby->creator->profile->avatar_url; ?>" class='pull-right gb-heading-img' alt="">
  </div>
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-padding-none text-left">
   <p class="gb-ellipsis gb-title">
    <a>
     <?php
     echo $hobby->creator->profile->firstname . " " . $hobby->creator->profile->lastname
     ?>
    </a>
   </p>
   <p class="gb-description">
    <strong><?php echo $hobby->title; ?></strong>
    <?php
    echo $hobby->description;
    ?>
   </p>
   <a class="gb-level">
    <small>
     <i>
      <?php echo $hobby->level->name; ?>
     </i>
    </small>
   </a>
  </div>
 </div>
</div>