<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-box-3">
 <div class="row">
  <h5 class="gb-heading-4 gb-heading-4-btn col-lg-4 col-sm-5 col-xs-12">
   Comments
   <span class="pull-right">
    <small>
     <span class="gb-comments-count"><?php echo $skillCommentsCount; ?></span>
    </small>
   </span>
  </h5>
 </div>
 <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
      gb-is-child-form="0"
      gb-form-target="#gb-comment-form"
      gb-add-url="<?php echo Yii::app()->createUrl("skill/skill/addSkillComment", array("skillId" => $skill->id)); ?>"
      gb-submit-prepend-to="#gb-skill-comments-overview"
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
 <div id="gb-skill-comments-overview">
  <?php
  if ($skillCommentsCount == 0):
   ?>
   <h5 class="text-center text-warning gb-no-information row">
    no comment(s) added.
   </h5>
  <?php endif; ?>

  <?php foreach ($skillComments as $skillCommentParent): ?>
   <?php
   $this->renderPartial('skill.views.skill.activity.comment._skill_comments', array(
     "skillComments" => $skillComments,
     "skillCommentsCount" => $skillCommentsCount,
     "offset" => 1
   ));
   ?>
  <?php endforeach; ?>
  <?php
  if ($skillCommentsCount > Comment::$COMMENTS_PER_OVERVIEW_PAGE):
   ?>
   <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12 text-center text-info gb-see-more"
      gb-purpose="redirects"
      gb-target="a[href='#gb-skill-item-comments-pane']">
    see more comments
   </a>
  <?php endif; ?>
 </div>
</div>

