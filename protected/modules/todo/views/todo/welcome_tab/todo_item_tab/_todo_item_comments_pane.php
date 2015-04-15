<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-box-7">  
  <div class="row">
    <h5 class="gb-heading-4 gb-heading-4-btn col-lg-4 col-sm-5 col-xs-12 gb-margin-left-neg-thick">
      Comments
      <span class="pull-right">
        <small><?php echo '0' ?></small>
      </span>
    </h5> 
  </div>
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
       gb-is-child-form="0"
       data-gb-target="#gb-comment-form"
       data-gb-url="<?php echo Yii::app()->createUrl("todo/todo/addTodoComment", array("todoId" => $todoChild->id)); ?>"
       data-gb-prepend-to="#gb-todo-comments"
       gb-form-description-input="#gb-comment-form-description-input">
    <textarea class="form-control"
              placeholder="Add a Comment"
              rows="1"></textarea>
    <div class="input-group-btn">
      <div class="input-group-btn">
        <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus"></i></button>
      </div><!-- /btn-group -->
    </div>
  </div>
  <br>
  <div id="gb-todo-comments">
    <?php
    if ($todoCommentsCount == 0):
      ?>
      <h5 class="text-center text-warning gb-no-information row">
        no comment(s) added.
      </h5>
    <?php endif; ?>

    <?php foreach ($todoComments as $todoCommentParent): ?>
      <?php
      $this->renderPartial('todo.views.todo.activity.comment._todo_comment_parent', array(
       "todoCommentParent" => $todoCommentParent,
      ));
      ?>
    <?php endforeach; ?>    
  </div>
</div>

