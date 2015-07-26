<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-link gb-box-7 row"
     data-gb-link-type="redirects"
     data-gb-url="<?php echo Yii::app()->createUrl("promise/promise/promise", array('promiseId' => $promise->id)); ?>">
 <div class="gb-indicator <?php echo 'gb-level-' . $promise->level->code; ?>"></div>
 <div class="gb-container row">
  <div class="col-lg-2 col-md-2 col-sm-1 col-xs-2 gb-padding-none">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $promise->creator->profile->avatar_url; ?>" class='pull-right gb-heading-img' alt="">
  </div>
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-padding-none text-left">
   <p class="gb-ellipsis gb-title">
    <a>
     <?php
     echo $promise->creator->profile->firstname . " " . $promise->creator->profile->lastname
     ?>
    </a>
   </p>
   <p class="gb-description">
    <strong><?php echo $promise->title; ?></strong>
    <?php
    echo $promise->description;
    ?>
   </p>
   <a class="gb-level">
    <small>
     <i>
      <?php echo $promise->level->name; ?>
     </i>
    </small>
   </a>
  </div>
 </div>
</div>