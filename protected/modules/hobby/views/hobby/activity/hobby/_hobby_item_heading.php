<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-section-row-1 row"
     data-gb-source-pk="<?php echo $hobby->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_HOBBY; ?>"
     data-gb-del-message-key="">
 <div id="gb-hobby-form-edit-container" class="row gb-hide gb-panel-form col-lg-12 col-md-12 col-sm-10 col-xs-10">
  <?php
  $this->renderPartial('hobby.views.hobby.forms._hobby_form_edit', array(
    "formId" => "gb-hobby-form-edit",
    "actionUrl" => Yii::app()->createUrl("site/hobby/editHobby", array()),
    "prependTo" => "",
    "hobbyModel" => $hobby,
    "hobbyLevelList" => $hobbyLevelList,
    "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_EDIT
  ));
  ?>
 </div>
 <div class="row">
  <div class="gb-panel-display gb-heading row">
   <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
    <p class="gb-title gb-ellipsis">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/description_1.png"; ?>" class="gb-heading-img" alt="">
     DESCRIPTION
    </p>
    <div class="gb-subtitle gb-ellipsis">
     <a>
      <?php //echo date_format(date_create($hobby->created_date), 'M jS \a\t g:ia'); ?>
     </a>
    </div>
   </div>
   <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-2">
    <a class="gb-edit-form-show pull-right">
     <i class="fa fa-edit fa-2x"></i>
    </a>
   </div>
  </div>
  <div class="gb-panel-display col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
   <div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-11 ">
     <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 ">
      <strong><?php echo $hobby->title; ?></strong>
      <?php echo $hobby->description; ?>
     </p>
    </div>
   </div>
  </div>
 </div>
</div>
<div class="gb-block gb-section-row-1 row"
     data-gb-source-pk="<?php echo $hobby->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_HOBBY_CONTRIBUTOR; ?>"
     data-gb-del-message-key="">
 <div class="row">
  <div class="gb-panel-display gb-heading row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
    <p class="gb-title gb-ellipsis">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="gb-heading-img" alt="">
     CONTRIBUTORS
    </p>
    <div class="gb-subtitle gb-ellipsis">
     <a>
      <?php //echo date_format(date_create($hobby->created_date), 'M jS \a\t g:ia'); ?>
     </a>
    </div>
   </div>
  </div>
  <div class="row">
   <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
    <?php if ($mentorshipHobbysCount == 0): ?>
     <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-thinner">
      <div classs="alert alert-info">
       no contributers yet
      </div>
     </li>
    <?php endif; ?>
    <?php foreach ($mentorshipHobbys as $mentorshipHobby): ?>
     <li class="col-lg-1 col-md-1 col-sm-2 col-xs-3 gb-padding-thinner">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipHobby->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
     </li>
    <?php endforeach; ?>
    <?php if ($mentorshipHobbysCount > 6): ?>
     <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-thinner">
      <a><?php echo ($mentorshipHobbysCount - 6) . 'more'; ?></a>
     </li>
    <?php endif; ?>
   </ul>
   <ul class="list-unstyled">
    <li>
     <p class="gb-ellipsis gb-description">
      Created on
      <i>
       <a>
        <?php echo date_format(date_create($hobby->created_date), 'M jS \a\t g:ia'); ?>
       </a>
      </i>
     </p>
    </li>
    <li>
     <p class="gb-ellipsis gb-description">
      <a class="gb-faded-link"><i class="fa fa-share"></i> Share</a> •
      <a class="gb-faded-link"><i class="fa fa-clipboard"></i> Clone</a>
     </p>
    </li>
   </ul>
  </div>
 </div>
</div>