<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/weblink_1.png"; ?>" class="gb-heading-img" alt="">
    WEBLINKS
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a>
     <?php echo $skillWeblinksCount . " web links"; ?>
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-2">
   <a class="gb-form-show pull-right"
      data-gb-target-container="#gb-weblink-form-container"
      data-gb-target="#gb-weblink-form">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-weblink-panel" class="row">
   <?php
   $this->renderPartial('skill.views.skill.activity.weblink._skill_weblinks_section', array(
     "weblinkModel" => new Weblink(),
     'skillWeblinks' => $skill->getSkillParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
     'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
     'skillId' => $skillId
   ));
   ?>
  </div>
 </div>
</div>
