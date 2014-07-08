<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry row" discussion-id="<?php echo $discussion->id; ?>"
     gb-source-pk-id="<?php echo $discussion->id; ?>" gb-data-source="<?php echo Type::$SOURCE_DISCUSSION_POST; ?>">
  <div class="row gb-title">
    <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-2 col-lg-2 col-sm-2 col-xs-2">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $discussion->creator->profile->avatar_url; ?>" class="gb-img-md img-polariod pull-right" alt="">
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 panel panel-default gb-no-padding gb-discussion-reply-side-border">
      <div class="panel-body">
        <p>
          <?php echo $discussion->description; ?>
        </p>
      </div>
      <div class="panel-footer gb-no-padding">
        <div class="row">
          <div class="pull-left gb-padding-thin">
            by: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $discussion->creator_id)); ?>">
              <i><?php echo $discussion->creator->profile->firstname . " " . $discussion->creator->profile->lastname ?></i>
            </a>
          </div>
          <?php if ($discussion->creator_id == Yii::app()->user->id): ?>
            <div class="btn-group pull-right"> 
              <a class="gb-delete-me btn btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

