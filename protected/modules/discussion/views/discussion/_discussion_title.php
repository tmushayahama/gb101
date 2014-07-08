<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-discussion-post-title" discussion-title-id="<?php echo $discussionTitle->id; ?>"
     has-expanded="0" gb-source-pk-id="<?php echo $discussionTitle->id; ?>" gb-data-source="<?php echo Type::$SOURCE_DISCUSSION_TITLE; ?>">
  <div class="row gb-title">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $discussionTitle->creator->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default gb-no-padding">
      <div class="panel-body">
        <p><strong><?php echo $discussionTitle->title; ?>  </strong>
          <?php echo $discussionTitle->description; ?>
        </p>
      </div>
      <div class="panel-footer gb-no-padding">
        <div class="row">
          <div class="pull-left gb-padding-thin">By: 
            <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $discussionTitle->creator_id)); ?>">
              <i><?php echo $discussionTitle->creator->profile->firstname . " " . $discussionTitle->creator->profile->lastname ?></i>
            </a>
          </div>
          <?php if ($discussionTitle->creator_id == Yii::app()->user->id): ?>
            <div class="btn-group pull-right"> 
              <a class="gb-delete-me btn btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
              <a class="gb-discussion-post-title-view btn btn-link"><i class=""></i>View</a>
            </div> 
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div id="<?php echo 'gb-mentorship-discussion-posts-' . $discussionTitle->id; ?>" class="row gb-hide"
       discussion-title-id="<?php echo $discussionTitle->id; ?>">
    <textarea class="gb-form-show col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="2" placeholder="Your Reply Here" readonly
              gb-form-slide-target="<?php echo '#gb-mentorship-discussion-form-container-' . $discussionTitle->id; ?>"
              gb-form-target="#gb-mentorship-discussion-form"
              gb-nested="1"
              gb-nested-submit-prepend-to="<?php echo '#gb-mentorship-discussion-posts-' . $discussionTitle->id; ?>"
              gb-add-url="<?php echo Yii::app()->createUrl("discussion/discussion/discussionReply", array("discussionTitleId" => $discussionTitle->id)); ?>">
    </textarea>
    <div id="<?php echo 'gb-mentorship-discussion-form-container-' . $discussionTitle->id; ?>" class="gb-panel-form gb-hide col-lg-12 col-sm-12 col-xs-12 gb-padding-thin">
      <!-- Hidden form will come here -->
    </div>
  </div>
  <br>
</div>
