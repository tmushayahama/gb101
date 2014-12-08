<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry-row gb-discussion-list-item panel panel-default row gb-discussion-title-side-border" skill-discussion-id="<?php echo $skillDiscussionParent->id; ?>"
     data-gb-source-pk="<?php echo $skillDiscussionParent->discussion_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillDiscussionParent->discussion->creator->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-11 col-sm-10 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-parent-box-heading">
        <span> 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillDiscussionParent->discussion->creator_id)); ?>">
            <?php echo $skillDiscussionParent->discussion->creator->profile->firstname . " " . $skillDiscussionParent->discussion->creator->profile->lastname ?>
          </a>
        </span>
        <span><i>Skill Discussion</i></span>
      </h5>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-discussion-form-title-input"><?php echo $skillDiscussionParent->discussion->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-discussion-form-description-input"><?php echo $skillDiscussionParent->discussion->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           data-gb-target-container="<?php echo '#gb-skill-discussion-child-form-container-' . $skillDiscussionParent->id; ?>"
           data-gb-target="#gb-skill-discussion-form"
           gb-form-parent-id-input="#gb-skill-discussion-form-parent-discussion-id-input"
           gb-form-heading="Add Skill Discussion"
           gb-form-parent-id="<?php echo $skillDiscussionParent->id; ?>">
          <i class="glyphicon glyphicon-plus"></i>
          Reply
        </a>        
      </div>
      <div class="btn-group pull-right">
        <?php if ($skillDiscussionParent->discussion->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-sm btn-link"
             data-gb-target="#gb-skill-discussion-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <div id="<?php echo 'gb-skill-discussion-child-form-container-' . $skillDiscussionParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
  </div>
  <div>
    <?php
    $skillDiscussionChildren = SkillDiscussion::getSkillChildrenDiscussions($skillDiscussionParent->id);
    ?>

    <?php foreach ($skillDiscussionChildren as $skillDiscussionChild): ?>
      <?php
      $this->renderPartial('skill.views.skill.activity._skill_discussion_child_list_item', array(
       "skillDiscussionChild" => $skillDiscussionChild)
      );
      ?>
    <?php endforeach; ?>    
  </div>
</div>

