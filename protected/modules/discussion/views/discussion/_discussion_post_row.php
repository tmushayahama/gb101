<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-discussion-post-row" discussion-id="<?php echo $discussion->id; ?>">
  <div class="row gb-title">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default">
      <a><h5><?php echo $discussion->creator->profile->firstname . " " . $discussion->creator->profile->lastname ?></h5></a>
      <p><?php echo $discussion->description; ?> </p>
      <small><?php echo $discussion->created_date ?> 12 posts </small>								
    </div>
  </div>
</div>

