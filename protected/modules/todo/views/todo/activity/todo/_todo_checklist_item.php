<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-todo-list-item panel panel-default row gb-discussion-title-side-border" todo-todo-id="<?php echo $todoChecklistItem->id; ?>"
     gb-source-pk-id="<?php echo $todoChecklistItem->todo_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 gb-no-padding">
    <div class="checkbox">
      <label>
        <input type="checkbox"> Remember me
      </label>
    </div>
  </div>
  <div class="col-lg-10 col-sm-10 col-xs-9 gb-no-padding gb-no-margin">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="row gb-panel-display gb-padding-left-3">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
        <p>
          <span class="gb-display-attribute" gb-control-target="#gb-todo-todo-form-description-input"><?php echo $todoChecklistItem->todo->description; ?></span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 gb-no-padding">
    <div class="gb-hide btn-group pull-right">
      <?php if ($todoChecklistItem->todo->creator_id == Yii::app()->user->id): ?>
        <a class="gb-edit-form-show btn btn-sm btn-link"
           gb-form-target="#gb-todo-todo-form">
          <i class="glyphicon glyphicon-edit"></i>
        </a> 
        <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
    </div>
  </div>
</div> 

