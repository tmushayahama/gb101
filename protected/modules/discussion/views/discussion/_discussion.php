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
    <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default gb-no-padding">
      <div class="panel-heading">
        <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $discussionTitle->creator_id)); ?>">
          <?php echo $discussionTitle->creator->profile->firstname . " " . $discussionTitle->creator->profile->lastname ?>
        </a>
      </div>
      <div class="panel-body">
        <p><strong><?php echo $discussionTitle->title; ?>  </strong>
          <?php echo $discussionTitle->description; ?>
        </p>
      </div>
      <?php if ($discussionTitle->creator_id == Yii::app()->user->id): ?>
        <div class="panel-footer gb-no-padding">
          <div class="row">
            <?php //echo $discussionTitle->created_date; ?>
            <div class="btn-group pull-right"> 
              <a class="btn btn-link"><i class="glyphicon glyphicon-trash"></i></a>
              <a class="gb-discussion-post-title-view btn btn-link"><i class=""></i>View</a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<div id="<?php echo 'gb-discussion-posts-' . $discussionTitle->id; ?>" class="row gb-discussion-posts gb-hide"
     discussion-title-id="<?php echo $discussionTitle->id; ?>">
</div>
<br>

