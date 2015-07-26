<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 gb-padding-thinner">
 <div class="row gb-block gb-block-row gb-user-badge gb-user-badge-sm"
      data-gb-source-pk="<?php echo $request->id; ?>"
      data-gb-source="<?php echo Type::$SOURCE_NOTIFICATION; ?>"
      data-gb-del-message-key="NOTIFICATION">
  <div class="gb-row-bullet col-lg-1 col-md-1 col-sm-1">
   <h6 class="gb-number"><?php echo $requestsCounter; ?></h6>
  </div>
  <div class="col-lg-11 col-md-11 col-sm-11 gb-padding-none">
   <div class="row gb-row-display ">
    <div class="col-lg-1 col-md-1 col-sm-1 gb-padding-none">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $request->recipient->profile->avatar_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
    </div>
    <div class="col-lg-9 col-sm-11 col-xs-12 gb-padding-none gb-no-margin">
     <div class="row">
      <h6 class="gb-heading">
       <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $request->recipient->profile->user_id)); ?>">
        <p class="gb-ellipsis gb-person-name">
         <?php echo $request->recipient->profile->firstname . " " . $request->recipient->profile->lastname ?>
        </p>
       </a>
      </h6>
     </div>
     <div class="row gb-body">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
       <div class="row">
        <p class="text-warning pull-left">
         <i>Pending Request</i>
        </p>
       </div>
      </div>
     </div>
    </div>
    <div class="pull-right ">
     <a class="btn btn-xs gb-delete-me" data-gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">
      <i class="text-danger glyphicon glyphicon-trash"></i>
     </a>
    </div>
   </div>
  </div>
 </div>
</div>