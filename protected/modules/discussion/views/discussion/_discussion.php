<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row-fluid gb-discussion-post-title" discussion-title-id="<?php echo $discussionTitle->id; ?>">
  <div class="gb-title ">
    <span class="span1">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-user-img img-polariod" alt="">
    </span>
    <span class="span8">
      <a><h5><?php echo $discussionTitle->creator->profile->firstname . " " . $discussionTitle->creator->profile->lastname ?></h5></a>
      <h5><?php echo $discussionTitle->title; ?> </h5>
      <small><?php echo $discussionTitle->created_date ?> 12 posts </small>								
    </span>
    <span class="span1">

    </span> 
  </div>
  <div class="row offset1">
    
  </div>
</div>
<div id="<?php echo 'gb-discussion-posts-'.$discussionTitle->id; ?>" class="row-fluid hide">
  
</div>

