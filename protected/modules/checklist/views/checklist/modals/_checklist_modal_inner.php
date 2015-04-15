<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-block-row row gb-checklist-row gb-checklist-row-lg " checklist-id="<?php echo $checklistItem->id; ?>"
     data-gb-source-pk="<?php echo $checklistItem->id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 gb-no-padding">
    <input type="checkbox">
  </div>
  <div class="col-lg-10 col-sm-10 col-xs-9 gb-no-padding gb-no-margin">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="row gb-panel-display">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
        <p class="gb-display-attribute">
          <?php echo $checklistItem->description; ?>
        </p> 
      </div>
    </div>
  </div>
  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 gb-no-padding">
    <div class="gb-hide btn-group pull-right">
      <?php if ($checklistItem->creator_id == Yii::app()->user->id): ?>
        <a class="gb-edit-form-show btn btn-sm btn-link"
           data-gb-target="#gb-checklist-form">
          <i class="glyphicon glyphicon-edit"></i>
        </a> 
        <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="row gb-modal-scrollable">
  <div class="row gb-box-7">   
    <h5 class="gb-heading-5 gb-heading-5-btn col-lg-4 col-sm-5 col-xs-12">
      Contributors
      <span class="pull-right">
        <small><?php echo '0' ?></small>
      </span>
    </h5> 
  </div>
  <div class="row gb-box-7"> 
    <div class="row">
      <h5 class="gb-heading-5 gb-heading-5-btn col-lg-4 col-sm-5 col-xs-12">
        Comments
        <span class="pull-right">
          <small><?php echo '0' ?></small>
        </span>
      </h5> 
    </div>
    <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
         gb-is-child-form="0"
         data-gb-target="#gb-comment-form"
         data-gb-url="<?php echo Yii::app()->createUrl("checklist/checklist/addChecklistComment", array("checklistItemId" => $checklistItem->id)); ?>"
         data-gb-prepend-to="#gb-checklist-comments"
         gb-form-description-input="#gb-comment-form-description-input">
      <textarea class="form-control"
                placeholder="Add a Comment"
                rows="1"></textarea>
      <div class="input-group-btn">
        <div class="input-group-btn">
          <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i></button>
        </div><!-- /btn-group -->
      </div>
    </div>
    <div id="gb-checklist-comments">
      <?php
      if ($checklistCommentsCount == 0):
        ?>
        <h5 class="text-center text-warning gb-no-information row">
          no comment(s) added.
        </h5>
      <?php endif; ?>

      <?php foreach ($checklistComments as $checklistCommentParent): ?>
        <?php
        $this->renderPartial('checklist.views.checklist.activity.comment._checklist_comment', array(
         "checklistCommentParent" => $checklistCommentParent,
        ));
        ?>
      <?php endforeach; ?>  
    </div>
  </div>
  <div class="row gb-box-7">  
    <div class="row">
      <h5 class="gb-heading-5 gb-heading-5-btn col-lg-4 col-sm-5 col-xs-12">
        Notes
        <span class="pull-right">
          <small><?php echo '0' ?></small>
        </span>
      </h5> 
    </div> <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
                gb-is-child-form="0"
                data-gb-target="#gb-note-form"
                data-gb-url="<?php echo Yii::app()->createUrl("checklist/checklist/addChecklistNote", array("checklistItemId" => $checklistItem->id)); ?>"
                data-gb-prepend-to="#gb-checklist-notes"
                gb-form-description-input="#gb-note-form-description-input">
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
    <div id="gb-checklist-notes">
      <?php
      if ($checklistNotesCount == 0):
        ?>
        <h5 class="text-center text-warning gb-no-information row">
          no note(s) added.
        </h5>
      <?php endif; ?>

      <?php foreach ($checklistNotes as $checklistNoteParent): ?>
        <?php
        $this->renderPartial('checklist.views.checklist.activity.note._checklist_note', array(
         "checklistNoteParent" => $checklistNoteParent,
        ));
        ?>
      <?php endforeach; ?>  
    </div>
  </div>
</div>