<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry-row row" gb-source-pk-id="0" todo-list-id="<?php echo $todoListItem->id; ?>"
     gb-data-source="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>">
       <?php foreach ($todoObserverRequests as $todoObserverRequest): ?>
         <?php $status = ($todoObserverRequest->status == Notification::$STATUS_PENDING) ?>
    <div class="gb-post-entry-row col-lg-6 col-md-6 col-sm-6 col-xs-12 gb-padding-thin" gb-source-pk-id="<?php echo $todoObserverRequest->id; ?>" gb-data-source="<?php echo Type::$SOURCE_NOTIFICATION; ?>">
      <div class="panel panel-default gb-todo-observer-top-border gb-no-padding">
        <div class='panel-heading'>
          <div class="row">
            <div class="col-lg-2 col-sm-2 col-xs-2 gb-padding-thinner">
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $todoObserverRequest->recipient->profile->avatar_url; ?>" class="pull-left" alt="">
            </div>
            <div class="col-lg-10 col-sm-10 col-xs-10 gb-padding-thinner"> 
              <h5><?php echo Notification::getRequestTypeName($todoObserverRequest->type) . " Request"; ?></h5>
              <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $todoObserverRequest->recipient_id)); ?>"><?php echo $todoObserverRequest->recipient->profile->firstname . " " . $todoObserverRequest->recipient->profile->lastname ?></a>
            </div>
          </div>
        </div>
        <div class="panel-body gb-height-2">
          <p class="text-warning"><i>The link to the observer page will be available 
              after the request has been accepted.</i></p>

        </div>
        <div class="panel-footer">
          <?php if ($todoListItem->creator->id == Yii::app()->user->id): ?>
            <div class="row">
              <div class="pull-left">
                <h5 class="gb-padding-medium text-warning">Pending Request</h5>
              </div>
              <div class="pull-right">
                <a class="btn btn-link gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
              </div>
            </div>
          <?php else: ?>
            <div class="row">
              <div class="pull-right">
                <a class="btn btn-link"></a>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>        