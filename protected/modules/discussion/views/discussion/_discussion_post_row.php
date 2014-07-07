<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry row gb-discussion-post-row" discussion-id="<?php echo $discussion->id; ?>"
     gb-source-pk-id="<?php echo $discussion->id; ?>" gb-data-source="<?php echo Type::$SOURCE_DISCUSSION_POST; ?>">
  <div class="row gb-title">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $discussion->creator->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default gb-no-padding">
      <div class="panel-heading">
        <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $discussion->creator_id)); ?>">
          <?php echo $discussion->creator->profile->firstname . " " . $discussion->creator->profile->lastname ?>
        </a>
      </div>
      <div class="panel-body">
        <p>
          <?php echo $discussion->description; ?>
        </p>
      </div>
      <?php if ($discussion->creator_id == Yii::app()->user->id): ?>
        <div class="panel-footer gb-no-padding">
          <div class="row">
            <?php //echo $discussion->created_date; ?>
            <div class="btn-group pull-right"> 
              <a class="gb-delete-me btn btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

