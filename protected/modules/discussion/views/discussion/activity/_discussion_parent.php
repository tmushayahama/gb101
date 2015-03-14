<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-block gb-block-row"
     data-gb-source-pk="<?php echo $discussion->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_DISCUSSION; ?>"
     data-gb-del-message-key="DISCUSSION">
 <div class="row gb-row-display ">
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
   <div class="row">
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-padding-left-2">
     <h4><?php echo $discussion->description; ?></h4>
    </div>
    <div class="btn-group pull-right">
     <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
      <i class="glyphicon glyphicon-chevron-down"></i>
     </button>
     <ul class="dropdown-menu" role="menu">
      <li>
       <a class="gb-edit-form-show"
          data-gb-target="" >
        <i class="glyphicon glyphicon-edit"></i> edit
       </a>
      </li>
      <li>
       <a class="gb-delete-me" data-gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">
        <i class="glyphicon glyphicon-trash"></i> delete
       </a>
      </li>
     </ul>
    </div>
   </div>
   <div class="row gb-panel-form gb-hide">
    <div class="row">
     <?php
     $this->renderPartial('discussion.views.discussion.forms._discussion_form_edit', array(
       "formId" => "gb-discussion-form-edit-" . $discussion->id,
       "discussionModel" => $discussion,
     ));
     ?>
    </div>
   </div>
   <div class="row gb-panel-display gb-padding-left-2">
    <div class="gb-no-padding">
     <span>
      <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $discussion->creator_id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $discussion->creator->profile->avatar_url; ?>" class="gb-img-xs" alt="">
       <?php echo $discussion->creator->profile->firstname . " " . $discussion->creator->profile->lastname ?>
      </a>
     </span>
     <span><i class="gb-small-text"><?php echo date_format(date_create($discussion->created_date), 'M jS \a\t g:ia'); ?></i></span>
    </div>
   </div>
   <div class="row">
    <?php
    $this->renderPartial('discussion.views.discussion.forms._discussion_child_form', array(
      "formId" => "gb-discussion-form-" . $discussion->id,
      "actionUrl" => Yii::app()->createUrl("discussion/discussion/addDiscussionReply", array()),
      "prependTo" => "#gb-skill-discussions-reply-" . $discussion->id,
      "discussionModel" => new Discussion(),
      "parentValue" => $discussion->id,
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
    ));
    ?>
   </div>
  </div>
  <div id="<?php echo "gb-skill-discussions-reply-" . $discussion->id; ?>" class="row">
   <?php
   $discussionChildren = Discussion::getChildrenDiscussions($discussion->id);
   $discussionChildCounter = 1;
   ?>
   <?php foreach ($discussionChildren as $discussionChild): ?>
    <?php
    $this->renderPartial('discussion.views.discussion.activity._discussion_child', array(
      "discussionChild" => $discussionChild,
      "discussionChildCounter" => $discussionChildCounter++)
    );
    ?>
   <?php endforeach; ?>
  </div>
 </div>
</div>