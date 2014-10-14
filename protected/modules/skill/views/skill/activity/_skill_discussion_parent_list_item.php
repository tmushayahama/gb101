<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-discussion-list-item panel panel-default row gb-background-light-grey-1" skill-discussion-id="<?php echo $skillDiscussionParent->id; ?>"
     gb-source-pk-id="<?php echo $skillDiscussionParent->discussion_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 panel panel-default gb-no-padding gb-no-margin gb-discussion-title-side-border">
    <div class="panel-body gb-padding-thin">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-discussion-form-title-input"><?php echo $skillDiscussionParent->discussion->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-discussion-form-description-input"><?php echo $skillDiscussionParent->discussion->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="panel-footer gb-no-padding">
      <div class="row gb-padding-left-1">
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillDiscussionParent->discussion->creator->profile->avatar_url; ?>" class="gb-img-sm img-polariod pull-left" alt="">
        <div class="btn btn-sm pull-left">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillDiscussionParent->discussion->creator_id)); ?>"><i><?php echo $skillDiscussionParent->discussion->creator->profile->firstname . " " . $skillDiscussionParent->discussion->creator->profile->lastname ?></i></a></div>
        <div class="btn-group pull-right">
          <a class="btn btn-sm btn-link gb-form-show"
             gb-is-child-form="1"
             gb-form-slide-target="<?php echo '#gb-skill-discussion-child-form-container-' . $skillDiscussionParent->id; ?>"
             gb-form-target="#gb-skill-discussion-form"
             gb-form-parent-id-input="#gb-skill-discussion-form-parent-discussion-id-input"
             gb-form-heading="Add Skill Discussion"
             gb-form-parent-id="<?php echo $skillDiscussionParent->id; ?>"
             <i class="glyphicon glyphicon-plus"></i>
            Reply
          </a>
          <?php if ($skillDiscussionParent->discussion->creator_id == Yii::app()->user->id): ?>
            <a class="gb-edit-form-show btn btn-sm btn-link"
               gb-form-target="#gb-skill-discussion-form">
              <i class="glyphicon glyphicon-edit"></i>
            </a> 
            <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          <?php endif; ?>
        </div> 
      </div>
    </div> 
    <div id="<?php echo 'gb-skill-discussion-child-form-container-' . $skillDiscussionParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div id="gb-discussion-children">
      <?php
      $skillDiscussionChildren = SkillDiscussion::getSkillChildrenDiscussions($skillDiscussionParent->id);
      if (count($skillDiscussionChildren) == 0):
        ?>
        <h5 class="text-center text-warning gb-no-information row">
          no discussion(s) added.
        </h5>
      <?php endif; ?>

      <?php foreach ($skillDiscussionChildren as $skillDiscussionChild): ?>
        <?php
        $this->renderPartial('skill.views.skill.activity._skill_discussion_child_list_item', array(
         "skillDiscussionChild" => $skillDiscussionChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

