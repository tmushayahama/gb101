<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-post-entry gb-post-entry-row gb-post-entry-row-lg"
     data-gb-source-pk="<?php echo $comment->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_COMMENT; ?>"
     data-gb-del-message-key="COMMENT">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h6 class="gb-number"><?php echo $commentCounter; ?></h6>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 gb-no-padding">
  <div class="row gb-row-display ">
   <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $comment->creator->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
   </div>
   <div class="col-lg-11 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
     <h5 class="gb-heading">
      <span>
       <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $comment->creator_id)); ?>">
        <?php echo $comment->creator->profile->firstname . " " . $comment->creator->profile->lastname ?>
       </a>
      </span>
      <span><i class="gb-small-text"><?php echo date_format(date_create($comment->created_date), 'M jS \a\t g:ia'); ?></i></span>
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
     </h5>
     <div class="row gb-panel-form gb-hide">
      <div class="row">
       <?php
       $this->renderPartial('comment.views.comment.forms._comment_form_edit', array(
         "formId" => "gb-comment-form-edit-" . $comment->id,
         "commentModel" => $comment,
       ));
       ?>
      </div>
     </div>
     <div class="row gb-panel-display gb-padding-left-2">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
       <p>
        <span class="gb-display-attribute" data-gb-control-target="#gb-comment-form-description-input">
         <?php echo $comment->description; ?></span>
       </p>
      </div>
     </div>
    </div>
    <div class="row">
     <?php
     $this->renderPartial('comment.views.comment.forms._comment_child_form', array(
       "formId" => "gb-comment-form-" . $comment->id,
       "actionUrl" => Yii::app()->createUrl("comment/comment/addCommentReply", array()),
       "prependTo" => "#gb-skill-comments-reply-" . $comment->id,
       "commentModel" => new Comment(),
       "parentValue" => $comment->id,
       "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
     ));
     ?>
    </div>
   </div>
   <div id="<?php echo "gb-skill-comments-reply-" . $comment->id; ?>" class="row">
    <?php
    $commentChildren = Comment::getChildrenComments($comment->id);
    $commentChildCounter = 1;
    ?>
    <?php foreach ($commentChildren as $commentChild): ?>
     <?php
     $this->renderPartial('comment.views.comment.activity._comment_child', array(
       "commentChild" => $commentChild,
       "commentChildCounter" => $commentChildCounter++)
     );
     ?>
    <?php endforeach; ?>
   </div>
  </div>
 </div>
</div>