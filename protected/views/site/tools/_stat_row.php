<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-stat-row row">
 <div class="gb-heading col-lg-4 col-sm-3 col-xs-6 <?php echo $levelClass; ?>">
  <p class="gb-title gb-ellipsis"><?php echo $title; ?></p>
  <p class="gb-number">1</p>
  <a class="btn btn-default">Add More</a>
 </div>
 <div class="gb-body col-lg-8 col-sm-3 col-xs-6 gb-no-padding">
  <?php
  $count = 1;
  foreach ($posts as $post):
   ?>
   <div class="row gb-link-row">
    <div class="gb-number col-lg-1 col-sm-1 col-xs-1">
     <?php echo $count++; ?>
    </div>
    <div class="gb-link col-lg-11 col-sm-11 col-xs-11">
     <a><?php echo $post->title; ?></a>
    </div>
   </div>
  <?php endforeach; ?>
 </div>
</div>

