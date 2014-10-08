<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-post-entry gb-todo-list-item panel panel-default row gb-background-light-grey-1" skill-todo-id="<?php echo $skillTodoChild->id; ?>"
     gb-source-pk-id="<?php echo $skillTodoChild->todo_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 panel panel-default gb-no-padding gb-no-margin">
    <div class="panel-body gb-padding-thin">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-todo-form-title-input"><?php echo $skillTodoChild->todo->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-todo-form-description-input"><?php echo $skillTodoChild->todo->description; ?></span>
          </p>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
          <div class="gb-show-more-btn btn btn-link btn-sm"
               gb-closest-parent=".gb-todo-list-item">
            More
          </div>
        </div>
        
      </div>
    </div>
    <div class="gb-hide panel-footer gb-no-padding gb-show-more">
      <div class="row gb-padding-left-1">
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillTodoChild->todo->assigner->profile->avatar_url; ?>" class="gb-img-sm img-polariod pull-left" alt="">
        <div class="btn btn-sm pull-left">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillTodoChild->todo->assigner_id)); ?>"><i><?php echo $skillTodoChild->todo->assigner->profile->firstname . " " . $skillTodoChild->todo->assigner->profile->lastname ?></i></a></div>
        <div class="btn-group pull-right">
          <?php if ($skillTodoChild->todo->assigner_id == Yii::app()->user->id): ?>
            <a class="gb-edit-form-show btn btn-sm btn-link"
               gb-form-target="#gb-skill-todo-form">
              <i class="glyphicon glyphicon-edit"></i>
            </a> 
            <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <?php endif; ?>
        </div> 
      </div>
    </div> 
  </div>
</div> 



