<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-checklist-list-item panel panel-default row gb-discussion-title-side-border" todo-checklist-id="<?php echo $todoChecklistParent->id; ?>"
     gb-source-pk-id="<?php echo $todoChecklistParent->checklist_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

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
        <a class="gb-modal-trigger gb-display-attribute gb-ellipsis" 
           gb-modal-target="#gb-checklist-modal"
           gb-url="<?php echo Yii::app()->createUrl("checklist/checklist/populateChecklist", array("checklistItemId" => $todoChecklistParent->checklist_id)); ?>"
           gb-control-target="#gb-todo-todo-form-description-input">
             <?php echo $todoChecklistParent->checklist->description; ?>
        </a> 
      </div>
    </div>
  </div>
  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 gb-no-padding">
    <div class="gb-hide btn-group pull-right">
      <?php if ($todoChecklistParent->checklist->creator_id == Yii::app()->user->id): ?>
        <a class="gb-edit-form-show btn btn-sm btn-link"
           gb-form-target="#gb-todo-todo-form">
          <i class="glyphicon glyphicon-edit"></i>
        </a> 
        <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
    </div>
  </div>
</div>
