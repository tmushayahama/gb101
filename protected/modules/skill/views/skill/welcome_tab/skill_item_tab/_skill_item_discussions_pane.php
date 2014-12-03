<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <div class="row gb-panel-form gb-hide">
  </div>
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
    <p class="gb-ellipsis">Discussions</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 gb-no-padding">
    <i class="pull-right"><?php echo $skillDiscussionsCount; ?></i>
   </div>
  </h5>
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12 gb-no-padding"
       gb-is-child-form="0"
       gb-form-target="#gb-discussion-form"
       gb-add-url="<?php echo Yii::app()->createUrl("skill/skill/addSkillDiscussion", array("skillId" => $skillId)); ?>"
       gb-submit-prepend-to="#gb-skill-discussions"
       gb-form-description-input="#gb-discussion-form-description-input">
   <textarea class="form-control"
             placeholder="Add a discussion"
             rows="1"></textarea>
   <div class="input-group-btn">
    <div class="input-group-btn">
     <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus"></i></button>

    </div><!-- /btn-group -->
   </div>
  </div>
 </div>

 <div id="gb-skill-discussions">
  <?php
  $this->renderPartial('skill.views.skill.activity.discussion._skill_discussions', array(
    "skillDiscussions" => $skillDiscussions,
    "skillDiscussionsCount" => $skillDiscussionsCount,
    "skillId" => $skillId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

