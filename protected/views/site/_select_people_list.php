<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php foreach ($people as $person): ?>
 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 gb-padding-thinner">
  <div class="row gb-user-badge gb-user-badge-sm"
       data-gb-source-pk="<?php echo $person->user_id; ?>"
       data-gb-source="<?php echo Type::$SOURCE_PERSON; ?>"
       data-gb-del-message-key="PERSON">
   <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
    <h6 class="gb-number"><?php //echo $personCounter;             ?></h6>
   </div>
   <div class="col-lg-11 col-md-11 col-sm-11 gb-no-padding">
    <div class="row gb-row-display ">
     <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $person->avatar_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
     </div>
     <div class="col-lg-9 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
      <div class="row">
       <h6 class="gb-heading">
        <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $person->user_id)); ?>">
         <p class="gb-ellipsis gb-person-name">
          <?php echo $person->firstname . " " . $person->lastname ?>
         </p>
        </a>
       </h6>
       <div class="row gb-body">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
         <div class="row">
          <?php $requestStatus = Notification::getRequestStatus($source, $sourcePkId, $person->user_id); ?>
          <?php if ($requestStatus): ?>
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
     <div class="pull-right">
      <a class="gb-select-person-btn btn btn-sm btn-default"
         data-gb-selected=0>
       <i class="text-success glyphicon glyphicon-plus"></i>
      </a>
     </div>
    </div>
   </div>
  </div>
 </div>
<?php endforeach; ?>

