<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-block-row gb-weblink-list-item panel panel-default row gb-background-light-grey-1" todo-weblink-id="<?php echo $todoWeblinkParent->id; ?>"
     data-gb-source-pk="<?php echo $todoWeblinkParent->weblink_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 panel panel-default  gb-no-margin gb-discussion-title-side-border">
    <div class="panel-body gb-padding-thin">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-todo-weblink-form-title-input"><?php echo $todoWeblinkParent->weblink->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-todo-weblink-form-description-input"><?php echo $todoWeblinkParent->weblink->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="panel-footer ">
      <div class="row gb-padding-left-1">
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $todoWeblinkParent->weblink->creator->profile->avatar_url; ?>" class="gb-img-sm img-polariod pull-left" alt="">
        <div class="btn btn-sm pull-left">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $todoWeblinkParent->weblink->creator_id)); ?>"><i><?php echo $todoWeblinkParent->weblink->creator->profile->firstname . " " . $todoWeblinkParent->weblink->creator->profile->lastname ?></i></a></div>
        <div class="btn-group pull-right">
          <a class="btn btn-sm btn-link gb-form-show"
             gb-is-child-form="1"
             data-gb-target-container="<?php echo '#gb-todo-weblink-child-form-container-' . $todoWeblinkParent->id; ?>"
             data-gb-target="#gb-todo-weblink-form"
             gb-form-parent-id-input="#gb-todo-weblink-form-parent-weblink-id-input"
             gb-form-heading="Add Todo Weblink"
             gb-form-parent-id="<?php echo $todoWeblinkParent->id; ?>">
             <i class="glyphicon glyphicon-plus"></i>
            Add a Weblink 
          </a>
          <?php if ($todoWeblinkParent->weblink->creator_id == Yii::app()->user->id): ?>
            <a class="gb-edit-form-show btn btn-sm btn-link"
               data-gb-target="#gb-todo-weblink-form">
              <i class="glyphicon glyphicon-edit"></i>
            </a> 
            <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          <?php endif; ?>
        </div> 
      </div>
    </div> 
    <div id="<?php echo 'gb-todo-weblink-child-form-container-' . $todoWeblinkParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div>
      <?php
      $todoWeblinkChildren = TodoWeblink::getTodoChildrenWeblinks($todoWeblinkParent->id);
      if (count($todoWeblinkChildren) == 0):
        ?>
        <h5 class="text-center text-warning gb-no-information row">
          no weblink(s) added.
        </h5>
      <?php endif; ?>

      <?php foreach ($todoWeblinkChildren as $todoWeblinkChild): ?>
        <?php
        $this->renderPartial('todo.views.todo.activity._todo_weblink_child_list_item', array(
         "todoWeblinkChild" => $todoWeblinkChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

