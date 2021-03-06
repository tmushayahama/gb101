<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?> 
<div class="gb-block gb-block-row panel panel-default row gb-background-light-grey-1" todo-announcement-id="<?php echo $todoAnnouncement->id; ?>"
     data-gb-source-pk="<?php echo $todoAnnouncement->announcement_id; ?>" data-gb-source="<?php echo Type::$SOURCE_ANNOUNCEMENT; ?>">
  <div class="col-lg-2 col-sm-2 col-xs-2">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $todoAnnouncement->announcement->announcer->profile->avatar_url; ?>" class="gb-img-md pull-right img-polariod" alt="">
  </div>
  <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default  gb-discussion-title-side-border">
    <div class="panel-body">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="gb-panel-display row">
        <p><strong class="gb-display-attribute" gb-control-target="#gb-todo-announcement-form-title-input"><?php echo $todoAnnouncement->announcement->title; ?> </strong> 
          <span class="gb-display-attribute" gb-control-target="#gb-todo-announcement-form-description-input"> <?php echo $todoAnnouncement->announcement->description; ?></span>
        </p>
      </div>
    </div>
    <div class="panel-footer "> 
      <div class="row">
        <div class="pull-left gb-padding-thin">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $todoAnnouncement->announcement->announcer_id)); ?>"><i><?php echo $todoAnnouncement->announcement->announcer->profile->firstname . " " . $todoAnnouncement->announcement->announcer->profile->lastname ?></i></a></div>
        <?php if ($todoAnnouncement->announcement->announcer_id == Yii::app()->user->id): ?>
          <div class="btn-group pull-right">
            <a class="gb-edit-form-show btn btn-link"
               data-gb-target="#gb-todo-announcement-form">
              <i class="glyphicon glyphicon-edit"></i>
            </a>
            <a class="gb-delete-me btn btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>


