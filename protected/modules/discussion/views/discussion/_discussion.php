<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-discussion-post-title" discussion-title-id="<?php echo $discussionTitle->id; ?>"
     has-expanded=0>
  <div class="row gb-title">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default">
      <a><h5><?php echo $discussionTitle->creator->profile->firstname . " " . $discussionTitle->creator->profile->lastname ?></h5></a>
      <h5><?php echo $discussionTitle->title; ?> </h5>
      <?php echo $discussionTitle->created_date ?> 12 posts							
    </div>
  </div>
</div>
<div id="<?php echo 'gb-discussion-posts-' . $discussionTitle->id; ?>" class="row gb-discussion-posts gb-hide"
     discussion-title-id="<?php echo $discussionTitle->id; ?>">

</div>

