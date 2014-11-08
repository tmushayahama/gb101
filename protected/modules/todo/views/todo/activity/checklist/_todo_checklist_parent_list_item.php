<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-checklist-list-item panel panel-default row gb-discussion-title-side-border" todo-checklist-id="<?php echo $todoChecklistParent->id; ?>"
     gb-source-pk-id="<?php echo $todoChecklistParent->checklist_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $todoChecklistParent->checklist->creator->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-11 col-sm-10 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-parent-box-heading">
        <span> 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $todoChecklistParent->checklist->creator_id)); ?>">
            <?php echo $todoChecklistParent->checklist->creator->profile->firstname . " " . $todoChecklistParent->checklist->creator->profile->lastname ?>
          </a>
        </span>
        <span><i>Todo Checklist</i></span>
      </h5>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p>
            <span class="gb-display-attribute" gb-control-target="#gb-todo-checklist-form-description-input"><?php echo $todoChecklistParent->checklist->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           gb-form-slide-target="<?php echo '#gb-todo-checklist-child-form-container-' . $todoChecklistParent->id; ?>"
           gb-form-target="#gb-todo-checklist-form"
           gb-form-parent-id-input="#gb-todo-checklist-form-parent-checklist-id-input"
           gb-form-heading="Reply"
           gb-form-parent-id="<?php echo $todoChecklistParent->id; ?>">
          Reply Checklist
        </a>        
      </div>
      <div class="btn-group pull-right">
        <?php if ($todoChecklistParent->checklist->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-sm btn-link"
             gb-form-target="#gb-todo-checklist-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <div id="<?php echo 'gb-todo-checklist-child-form-container-' . $todoChecklistParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div>
      <?php
      $todoChecklistChildren = TodoChecklist::getTodoChildrenChecklists($todoChecklistParent->id);
      ?>

      <?php foreach ($todoChecklistChildren as $todoChecklistChild): ?>
        <?php
        $this->renderPartial('todo.views.todo.activity._todo_checklist_child_list_item', array(
         "todoChecklistChild" => $todoChecklistChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

