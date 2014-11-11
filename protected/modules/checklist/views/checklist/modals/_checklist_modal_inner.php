<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-checklist-list-item panel panel-default row gb-discussion-title-side-border" checklist-checklist-id="<?php echo $checklist->id; ?>"
     gb-source-pk-id="<?php echo $checklist->id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 gb-no-padding">
    <div class="checkbox">
      <label>
        <input type="checkbox">
      </label>
    </div>
  </div>
  <div class="col-lg-10 col-sm-10 col-xs-9 gb-no-padding gb-no-margin">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="row gb-panel-display">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
        <p class="gb-display-attribute">
          <?php echo $checklist->description; ?>
        </p> 
      </div>
    </div>
  </div>
  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 gb-no-padding">
    <div class="gb-hide btn-group pull-right">
      <?php if ($checklist->creator_id == Yii::app()->user->id): ?>
        <a class="gb-edit-form-show btn btn-sm btn-link"
           gb-form-target="#gb-checklist-form">
          <i class="glyphicon glyphicon-edit"></i>
        </a> 
        <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="row gb-box-3">      
  <h5 class="gb-heading-4 col-lg-4 col-sm-5 col-xs-12">
    Contributors
    <span class="pull-right badge badge-info">
      <?php echo '0' ?>
    </span>
  </h5> 
</div>
<div class="row gb-box-3">  
  <div class="row">
    <h5 class="gb-heading-4 col-lg-4 col-sm-5 col-xs-12">
      Comments
      <span class="pull-right badge badge-default">
        <?php echo '0' ?>
      </span>
    </h5> 
  </div>
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
       gb-is-child-form="0"
       gb-form-target="#gb-checklist-comment-form"
       gb-add-url="<?php echo Yii::app()->createUrl("checklist/checklist/addChecklistComment", array("checklistId" => $checklistChild->id)); ?>"
       gb-form-description-input="#gb-checklist-comment-form-description-input">
    <textarea class="form-control"
              placeholder="Add a Comment"
              rows="1"></textarea>
    <div class="input-group-btn">
      <div class="input-group-btn">
        <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i></button>
      </div><!-- /btn-group -->
    </div>
  </div>
  <div id="gb-comments">
    <?php
    if ($checklistCommentsCount == 0):
      ?>
      <h5 class="text-center text-warning gb-no-information row">
        no comment(s) added.
      </h5>
    <?php endif; ?>

    <?php foreach ($checklistComments as $checklistCommentParent): ?>
      <?php
      $this->renderPartial('checklist.views.checklist.activity.comment._checklist_comment_parent_list_item', array(
       "checklistCommentParent" => $checklistCommentParent,
      ));
      ?>
    <?php endforeach; ?>    
  </div>
</div>
<div class="row gb-box-3">   
  <div class="row">
    <h5 class="gb-heading-4 col-lg-4 col-sm-5 col-xs-12">
      Notes
      <span class="pull-right badge badge-info">
        <?php echo '0' ?>
      </span>
    </h5> 
  </div> <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
              gb-is-child-form="0"
              gb-form-target="#gb-checklist-note-form"
              gb-add-url="<?php echo Yii::app()->createUrl("checklist/checklist/addChecklistNote", array("checklistId" => $checklistChild->id)); ?>"
              gb-form-description-input="#gb-checklist-note-form-description-input">
    <textarea class="form-control"
              placeholder="Add a Note"
              rows="2"></textarea>
    <div class="input-group-btn">
      <div class="input-group-btn">
        <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i></button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Assign</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>
  </div>
  <div id="gb-notes">
    <?php
    if ($checklistNotesCount == 0):
      ?>
      <h5 class="text-center text-warning gb-no-information row">
        no note(s) added.
      </h5>
    <?php endif; ?>

    <?php foreach ($checklistNotes as $checklistNoteParent): ?>
      <?php
      $this->renderPartial('checklist.views.checklist.activity.note._checklist_note_parent_list_item', array(
       "checklistNoteParent" => $checklistNoteParent,
      ));
      ?>
    <?php endforeach; ?>    
  </div>
</div>


