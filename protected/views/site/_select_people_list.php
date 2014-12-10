<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php foreach ($people as $person): ?>
 <div class="gb-person-badge panel panel-default" person-id="<?php echo $person->user_id; ?>">
  <div class="gb-discussion-title-side-border row">
   <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $person->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
   </div>
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding gb-no-margin">
    <h5 class="gb-parent-box-heading">
     <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $person->user_id)); ?>" class="gb-person-name">
      <?php echo $person->firstname . " " . $person->lastname; ?>
     </a>
    </h5>
    <div class="panel-body gb-no-padding">
     <div class="row">
      <?php $requestStatus = Notification::getRequestStatus($source, $sourcePkId, $person->user_id); ?>
      <?php if ($requestStatus == null): ?>
       <a class="gb-select-person-btn btn btn-xs btn-info"
          gb-type="<?php echo $modalType ?>"
          gb-selected=0>Select
       </a>
      <?php else: ?>
       <?php if ($requestStatus->status == Notification::$STATUS_PENDING): ?>
        <h6 class="text-warning pull-left gb-padding-medium"
            gb-type="<?php echo $modalType ?>" >Pending Request
        </h6>
       <?php elseif ($requestStatus->status == Notification::$STATUS_ACCEPTED): ?>
        <h6 class="text-success"
            gb-type="<?php echo $modalType ?>" >Enrolled
        </h6>
       <?php endif; ?>
      <?php endif; ?>
     </div>
    </div>
   </div>
  </div>
 </div>
<?php endforeach; ?>

