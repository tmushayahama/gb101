<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="<?php echo 'gb-level-' . $level->id; ?> row">
 <h3 class="gb-item-level-heading gb-ellipsis">
  <?php echo $level->name; ?>
 </h3>
</div>

<div class="row">
 <a class="btn btn-default btn-lg gb-form-show gb-backdrop-visible col-lg-5 col-md-5 col-sm-6 col-xs-6"
    data-gb-target-container="#gb-search-skill-form-container"
    data-gb-target="#gb-search-skill-form"
    data-gb-url = "<?php echo Yii::app()->createUrl('skill/skill/addskill', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
    data-gb-prepend-to="#gb-skills">
  <i class="glyphicon glyphicon-search"></i> Browse
 </a>
 <a class="btn btn-primary btn-lg gb-form-show gb-backdrop-visible col-lg-7 col-md-7 col-sm-6 col-xs-6"
    data-gb-target-container="#gb-skill-form-container"
    data-gb-target="#gb-skill-form"
    data-gb-url = "<?php echo Yii::app()->createUrl('skill/skill/addskill', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
    data-gb-prepend-to="#gb-skills">
  <i class="glyphicon glyphicon-plus-sign"></i> Add a Skill
 </a>
</div>
<div id="gb-skill-form-container" class="row gb-hide gb-panel-form">
 <?php
 $this->renderPartial('skill.views.skill.forms._skill_form_with_level', array(
   "formId" => "gb-skill-form",
   "actionUrl" => Yii::app()->createUrl("skill/skill/addSkill", array()),
   "prependTo" => "#gb-skills",
   'skillModel' => new Skill(),
   'levelId' => $level->id,
   "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
 ));
 ?>
</div>

<div id="gb-skills" class="gb-list">
 <?php
 $this->renderPartial('skill.views.skill.activity.skill._skill_list', array(
   "skills" => $skills,
   "skillsCount" => $skillsCount,
   "level" => $level->id,
   "offset" => 1,
 ));
 ?>
</div>