<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
 <div class="gb-block gb-box-6"
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
     "skillLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_EDIT
   ));
   ?>
  </div>
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
    <div id="myCarousel" class="carousel slide profile-carousel" data-ride="carousel">
     <div class="air air-bottom-right padding-10">
      <a class="btn btn-default gb-edit-form-show col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <i class="fa fa-edit"></i> Edit
      </a>
      <br>
      <a class="btn btn-primary col-lg-12 col-md-12 col-sm-12 col-xs-12"
         gb-purpose="gb-expandables-modal-trigger"
         data-gb-modal-target="#gb-contribute-modal">
       <i class="fa fa-user-plus"></i> Contribute
      </a>
     </div>
     <div class="gb-opacity-5 air air-top-left padding-10">
      <h4 class="gb-title gb-ellipsis">
       By: <a class="">
        <?php
        echo $skill->creator->profile->firstname . " " . $skill->creator->profile->lastname
        ?>
       </a>
      </h4>
      <p class="gb-ellipsis gb-description">
       <strong class="text-info"><?php echo $skill->level->name; ?></strong>
      </p>
     </div>
     <ol class="carousel-indicators" role="listbox">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1" class=""></li>
      <li data-target="#myCarousel" data-slide-to="2" class=""></li>
     </ol>
     <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="item active">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/placeholders/skill_cover_3.png"; ?>" alt="cover 1">
      </div>
      <!-- Slide 2 -->
      <div class="item">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/placeholders/skill_cover_2.png"; ?>" alt="cover 2">
      </div>
      <!-- Slide 3 -->
      <div class="item">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/placeholders/skill_cover_1.png"; ?>" alt="cover 3">
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="gb-body row">
   <div class="gb-panel-display col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
    <p class="">
     <strong><?php echo $skill->title; ?></strong>
     <?php echo $skill->description; ?>
    </p>
    <p class="gb-ellipsis gb-description">
     Created on
     <i>
      <a>
       <?php echo date_format(date_create($skill->created_date), 'M jS \a\t g:ia'); ?>
      </a>
     </i>
    </p>
   </div>
  </div>
 </div>
</div>