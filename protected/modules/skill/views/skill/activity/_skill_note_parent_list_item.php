<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry-row gb-note-list-item panel panel-default row gb-discussion-title-side-border" skill-note-id="<?php echo $skillNoteParent->id; ?>"
     data-gb-source-pk="<?php echo $skillNoteParent->note_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillNoteParent->note->creator->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-11 col-sm-10 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-parent-box-heading">
        <span> 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillNoteParent->note->creator_id)); ?>">
            <?php echo $skillNoteParent->note->creator->profile->firstname . " " . $skillNoteParent->note->creator->profile->lastname ?>
          </a>
        </span>
        <span><i>Skill Note</i></span>
      </h5>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-note-form-title-input"><?php echo $skillNoteParent->note->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-note-form-description-input"><?php echo $skillNoteParent->note->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           data-gb-target-container="<?php echo '#gb-skill-note-child-form-container-' . $skillNoteParent->id; ?>"
           data-gb-target="#gb-skill-note-form"
           gb-form-parent-id-input="#gb-skill-note-form-parent-note-id-input"
           gb-form-heading="Add Skill Note"
           gb-form-parent-id="<?php echo $skillNoteParent->id; ?>">
           <i class="glyphicon glyphicon-plus"></i>
          Reply
        </a>        
      </div>
      <div class="btn-group pull-right">
        <?php if ($skillNoteParent->note->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-sm btn-link"
             data-gb-target="#gb-skill-note-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <div id="<?php echo 'gb-skill-note-child-form-container-' . $skillNoteParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div>
      <?php
      $skillNoteChildren = SkillNote::getSkillChildrenNotes($skillNoteParent->id);
      ?>

      <?php foreach ($skillNoteChildren as $skillNoteChild): ?>
        <?php
        $this->renderPartial('skill.views.skill.activity._skill_note_child_list_item', array(
         "skillNoteChild" => $skillNoteChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

