<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-block gb-block-row gb-block-row-sm"
     data-gb-source-pk="<?php echo $contributorChild->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_CONTRIBUTOR; ?>"
     data-gb-del-message-key="CONTRIBUTOR">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h5 class="gb-number"><?php echo $contributorChildCounter; ?></h5>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 ">
  <div class="row gb-row-display ">
   <div class="col-lg-1 col-md-1 col-sm-1 ">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $contributorChild->creator->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
   </div>
   <div class="col-lg-11 col-sm-11 col-xs-12  gb-no-margin">
    <div class="row">
     <h5 class="gb-heading">
      <span>
       <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $contributorChild->creator_id)); ?>">
        <?php echo $contributorChild->creator->profile->firstname . " " . $contributorChild->creator->profile->lastname ?>
       </a>
      </span>
      <span><i class="gb-small-text"><?php echo date_format(date_create($contributorChild->created_date), 'M jS \a\t g:ia'); ?></i></span>
      <div class="btn-group pull-right">
       <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-chevron-down"></i>
       </button>
       <ul class="dropdown-menu" role="menu">
        <li>
         <a class="gb-edit-form-show">
          <i class="glyphicon glyphicon-edit"></i> edit
         </a>
        </li>
        <li>
         <a class="gb-delete-me" data-gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">
          <i class="glyphicon glyphicon-trash"></i> delete
         </a>
        </li>
       </ul>
      </div>
     </h5>
     <div class="row gb-panel-form gb-hide">
      <div class="row">
       <?php
       $this->renderPartial('contributor.views.contributor.forms._contributor_child_form_edit', array(
         "formId" => "gb-contributor-form-edit-" . $contributorChild->id,
         "contributorModel" => $contributorChild,
       ));
       ?>
      </div>
     </div>
     <div class="row gb-panel-display gb-padding-left-2">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
       <p>
        <span class="gb-display-attribute" data-gb-control-target="#gb-contributor-form-description-input">
         <?php echo $contributorChild->description; ?></span>
       </p>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>