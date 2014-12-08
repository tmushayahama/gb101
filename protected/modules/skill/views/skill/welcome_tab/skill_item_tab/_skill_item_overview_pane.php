<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-box-3">
 <div class="row">
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
    <p class="gb-ellipsis">Comments</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 gb-no-padding">
    <i class="pull-right"><?php echo $skillCommentsCount; ?></i>
   </div>
  </h5>
 </div>
 <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
      gb-is-child-form="0"
      data-gb-target="#gb-comment-form"
      data-gb-url="<?php echo Yii::app()->createUrl("skill/skill/addSkillComment", array("skillId" => $skill->id)); ?>"
      data-gb-prepend-to="#gb-skill-comments-overview"
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
 <div id="gb-skill-comments-overview">
  <?php
  $this->renderPartial('skill.views.skill.activity.comment._skill_comments', array(
    "skillComments" => $skillComments,
    "skillCommentsCount" => $skillCommentsCount,
    "offset" => 1
  ));
  ?>
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

