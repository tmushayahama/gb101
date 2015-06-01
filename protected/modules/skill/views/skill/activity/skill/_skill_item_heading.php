<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-section-row-1 row"
     data-gb-source-pk="<?php echo $skill->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_SKILL; ?>"
     data-gb-del-message-key="">
 <div id="gb-skill-form-edit-container" class="row gb-hide gb-panel-form col-lg-12 col-md-12 col-sm-10 col-xs-10">
  <?php
  $this->renderPartial('skill.views.skill.forms._skill_form_edit', array(
    "formId" => "gb-skill-form-edit",
    "actionUrl" => Yii::app()->createUrl("site/skill/editSkill", array()),
    "prependTo" => "",
    "skillModel" => $skill,
    "skillLevelList" => $skillLevelList,
    "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_EDIT
  ));
  ?>
 </div>
 <div class="gb-panel-display gb-heading row">
  <div class="col-lg-10 col-md-10 col-sm-2 col-xs-12 gb-padding-none">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/description_1.png"; ?>" class="gb-heading-img" alt="">
    DESCRIPTION
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a>
     <?php //echo date_format(date_create($skill->created_date), 'M jS \a\t g:ia'); ?>
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-12">
   <a class="gb-edit-form-show pull-right">
    <i class="fa fa-edit fa-2x"></i>
   </a>
  </div>
 </div>
 <div class="gb-panel-display col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="row">
   <div class="col-lg-12 col-sm-12 col-xs-11 gb-padding-none">
    <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
     <strong><?php echo $skill->title; ?></strong>
     <?php echo $skill->description; ?>
    </p>
   </div>
  </div>
 </div>
</div>
