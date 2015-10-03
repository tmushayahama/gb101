<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-block-row gb-block-row -sm row" checklist-comment-id="<?php echo $checklistCommentParent->id; ?>"
     data-gb-source-pk="<?php echo $checklistCommentParent->comment_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 ">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $checklistCommentParent->comment->creator->profile->avatar_url; ?>" 
         class="gb-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-11 col-sm-10 col-xs-12  gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-heading">
        <span> 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $checklistCommentParent->comment->creator_id)); ?>">
            <?php echo $checklistCommentParent->comment->creator->profile->firstname . " " . $checklistCommentParent->comment->creator->profile->lastname ?>
          </a>
        </span>
        <span><i>Checklist Comment</i></span>
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-chevron-down"></i>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="gb-edit-form-show" data-gb-target="#gb-skill-form">edit</a></li>
            <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
          </ul>
        </div>
      </h5>
      <div class="row gb-panel-display gb-padding-left-1">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
          <p>
            <span class="gb-display-attribute" gb-control-target="#gb-comment-form-description-input"><?php echo $checklistCommentParent->comment->description; ?></span>
          </p>
        </div>
      </div>
    </div>
  </div> 
</div>

