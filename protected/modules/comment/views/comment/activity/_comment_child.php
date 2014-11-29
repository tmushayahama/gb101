<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-post-entry-row gb-post-entry-row-sm"
     data-gb-source-pk="<?php echo $commentChild->id; ?>"
     data-gb-source="<?php echo Type::$SOURCE_COMMENT; ?>"
     data-gb-del-message-key="COMMENT">
 <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
  <h5 class="gb-number"><?php echo $commentChildCounter; ?></h5>
 </div>
 <div class="col-lg-11 col-md-11 col-sm-11 gb-no-padding">
  <div class="row gb-row-display ">
   <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $commentChild->creator->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
   </div>
   <div class="col-lg-11 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
     <h5 class="gb-heading">
      <span>
       <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $commentChild->creator_id)); ?>">
        <?php echo $commentChild->creator->profile->firstname . " " . $commentChild->creator->profile->lastname ?>
       </a>
      </span>
      <span><i class="gb-small-text"><?php echo date_format(date_create($commentChild->created_date), 'M jS \a\t g:ia'); ?></i></span>
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
     <div class="row gb-panel-form gb-form-middleman gb-hide gb-padding-left-2"
          data-gb-form-target="#gb-comment-form">
      <textarea data-gb-control-target="#gb-comment-form-description-input" class="form-control" rows="2">
      </textarea>
      <div class="row">
       <div class="pull-right btn-group">
        <a class="btn btn-default gb-edit-form-hide">Cancel</a>
        <a class="gb-form-middleman-edit-submit btn btn-primary">Edit</a>
       </div>
      </div>
     </div>
     <div class="row gb-panel-display gb-padding-left-2">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
       <p>
        <span class="gb-display-attribute" data-gb-control-target="#gb-comment-form-description-input">
         <?php echo $commentChild->description; ?></span>
       </p>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>