<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-stat-row row <?php echo $levelClass; ?>">
 <div class="gb-heading col-lg-4 col-sm-3 col-xs-6">
  <p class="gb-title gb-ellipsis"><?php echo $title; ?></p>
  <p class="gb-number"><?php echo $postsCount; ?></p>
 </div>
 <div class="gb-body col-lg-8 col-sm-3 col-xs-6 gb-no-padding">
  <?php
  $count = 1;
  foreach ($posts as $post):
   $this->renderPartial('skill.views.skill.activity.skill._skill_item', array(
     "skill" => $post,
     "count" => $count
   ));
   ?>
  <?php endforeach; ?>
 </div>
</div>

