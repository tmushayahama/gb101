<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row-fluid gb-discussion-post-row" discussion-id="<?php echo $discussion->id; ?>">
  <div class="gb-title ">
    <span class="span1">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-user-img img-polariod" alt="">
    </span>
    <span class="span9">
      <a><h5><?php echo $discussion->creator->profile->firstname . " " . $discussion->creator->profile->lastname ?></h5></a>
      <p><?php echo $discussion->description; ?> </p>
      <small><?php echo $discussion->created_date ?> 12 posts </small>								
    </span>
    <span class="span2">

    </span> 
  </div>
</div>
<div >
  
</div>

