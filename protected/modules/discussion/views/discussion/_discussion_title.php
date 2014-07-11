<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry" discussion-title-id="<?php echo $discussionTitle->id; ?>"
     has-expanded="0" gb-source-pk-id="<?php echo $discussionTitle->id; ?>" gb-data-source="<?php echo Type::$SOURCE_DISCUSSION_TITLE; ?>">
  <div class="row gb-title">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $discussionTitle->creator->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default gb-no-padding gb-discussion-title-side-border">
      <div class="panel-body">
        <p><strong><?php echo $discussionTitle->title; ?>  </strong>
          <?php echo $discussionTitle->description; ?>
        </p>
      </div>
      <?php if (!Yii::app()->user->isGuest): ?>
        <?php if (Mentorship::viewerPrivilege($mentorshipId, Yii::app()->user->id) != Mentorship::$IS_NOT_ENROLLED): ?>
          <textarea class="gb-form-show col-lg-12 input-sm col-md-12 col-sm-12 col-xs-12" rows="2" readonly
                    gb-form-slide-target="<?php echo '#gb-mentorship-discussion-form-container-' . $discussionTitle->id; ?>"
                    gb-form-target="#gb-mentorship-discussion-form"
                    gb-nested="1"
                    gb-nested-submit-prepend-to="<?php echo '#gb-mentorship-discussion-posts-' . $discussionTitle->id; ?>"
                    gb-add-url="<?php echo Yii::app()->createUrl("discussion/discussion/discussionReply", array("discussionTitleId" => $discussionTitle->id)); ?>">
            Reply to this discussion
          </textarea>
        <?php endif; ?>
      <?php endif; ?>
      <div id="<?php echo 'gb-mentorship-discussion-form-container-' . $discussionTitle->id; ?>" class="gb-panel-form gb-hide col-lg-12 col-sm-12 col-xs-12 gb-padding-thin">
        <!-- Hidden form will come here -->
      </div>
      <div class="panel-footer gb-no-padding">
        <div class="row">
          <div class="pull-left gb-padding-thin">
            by: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $discussionTitle->creator_id)); ?>">
              <i><?php echo $discussionTitle->creator->profile->firstname . " " . $discussionTitle->creator->profile->lastname ?></i>
            </a>
          </div>
          <div class="btn-group pull-right"> 
            <p class="gb-padding-thin pull-left">
              Replies: <span class="gb-discussion-reply-count"><?php echo Discussion::getDiscussionCount($discussionTitle->id) ?></span>
              - <a class="gb-discussion-post-title-view"><i class=""></i>View All
              </a>
            </p> 
            <?php if ($discussionTitle->creator_id == Yii::app()->user->id): ?>
              <a class="gb-delete-me btn btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <?php endif; ?>
          </div> 
        </div>
      </div>
    </div>
  </div>
  <div id="<?php echo 'gb-mentorship-discussion-posts-' . $discussionTitle->id; ?>" 
       class="row gb-scrollable"
       discussion-title-id="<?php echo $discussionTitle->id; ?>">
  </div>
  <br>
</div>
<script type="text/javascript">
  $("textarea.gb-form-show").each(function(e) {
    $(this).val($(this).val().trim());
  });
</script>

