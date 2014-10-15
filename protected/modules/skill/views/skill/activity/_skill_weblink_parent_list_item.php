<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-weblink-list-item panel panel-default row gb-background-light-grey-1" skill-weblink-id="<?php echo $skillWeblinkParent->id; ?>"
     gb-source-pk-id="<?php echo $skillWeblinkParent->weblink_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 panel panel-default gb-no-padding gb-no-margin gb-discussion-title-side-border">
    <div class="panel-body gb-padding-thin">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-weblink-form-title-input"><?php echo $skillWeblinkParent->weblink->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-weblink-form-description-input"><?php echo $skillWeblinkParent->weblink->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="panel-footer gb-no-padding">
      <div class="row gb-padding-left-1">
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillWeblinkParent->weblink->assigner->profile->avatar_url; ?>" class="gb-img-sm img-polariod pull-left" alt="">
        <div class="btn btn-sm pull-left">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillWeblinkParent->weblink->assigner_id)); ?>"><i><?php echo $skillWeblinkParent->weblink->assigner->profile->firstname . " " . $skillWeblinkParent->weblink->assigner->profile->lastname ?></i></a></div>
        <div class="btn-group pull-right">
          <a class="btn btn-sm btn-link gb-form-show"
             gb-is-child-form="1"
             gb-form-slide-target="<?php echo '#gb-skill-weblink-child-form-container-' . $skillWeblinkParent->id; ?>"
             gb-form-target="#gb-skill-weblink-form"
             gb-form-parent-id-input="#gb-skill-weblink-form-parent-weblink-id-input"
             gb-form-heading="Add Skill Weblink"
             gb-form-parent-id="<?php echo $skillWeblinkParent->id; ?>"
             <i class="glyphicon glyphicon-plus"></i>
            Add a Weblink 
          </a>
          <?php if ($skillWeblinkParent->weblink->assigner_id == Yii::app()->user->id): ?>
            <a class="gb-edit-form-show btn btn-sm btn-link"
               gb-form-target="#gb-skill-weblink-form">
              <i class="glyphicon glyphicon-edit"></i>
            </a> 
            <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          <?php endif; ?>
        </div> 
      </div>
    </div> 
    <div id="<?php echo 'gb-skill-weblink-child-form-container-' . $skillWeblinkParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div id="gb-weblink-children">
      <?php
      $skillWeblinkChildren = SkillWeblink::getSkillChildrenWeblinks($skillWeblinkParent->id);
      if (count($skillWeblinkChildren) == 0):
        ?>
        <h5 class="text-center text-warning gb-no-information row">
          no weblink(s) added.
        </h5>
      <?php endif; ?>

      <?php foreach ($skillWeblinkChildren as $skillWeblinkChild): ?>
        <?php
        $this->renderPartial('skill.views.skill.activity._skill_weblink_child_list_item', array(
         "skillWeblinkChild" => $skillWeblinkChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

